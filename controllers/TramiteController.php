<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Tramite;
use app\models\TramiteDetalle;
use app\models\Documento;
use yii\web\UploadedFile;

class TramiteController extends Controller
{
    public function actionIniciar($tipo)
    {
        // Verificar si el usuario está autenticado
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $model = new Tramite();
        $detalleModel = new TramiteDetalle();

        if ($model->load(Yii::$app->request->post())) {
            // Asignar valores al modelo Tramite
            $model->tipo_tramite_id = $tipo;
            $model->usuario_id = Yii::$app->user->id;
            $model->fecha_solicitud = date('Y-m-d H:i:s');

            // Iniciar una transacción
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {
                    // Guardar detalles del trámite
                    $detalleModel->tramite_id = $model->id;
                    if ($detalleModel->load(Yii::$app->request->post())) {
                        if ($detalleModel->save()) {
                            // Manejar la carga de documentos
                            $this->handleDocumentUpload($model->id);
                            $transaction->commit();
                            Yii::$app->session->setFlash('success', 'Trámite iniciado correctamente.');
                            return $this->redirect(['tramite/seguimiento', 'id' => $model->id]);
                        }
                    }
                }
                // Si algo falla, hacer rollback
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Hubo un error al guardar el trámite.');
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Error: ' . $e->getMessage());
            }
        }

        return $this->render('iniciar', [
            'model' => $model,
            'detalleModel' => $detalleModel,
            'tipo' => $tipo,
        ]);
    }

    private function handleDocumentUpload($tramiteId)
    {
        $documentos = UploadedFile::getInstancesByName('documentos');
        foreach ($documentos as $documento) {
            // Validar tipo y tamaño del archivo
            if ($documento->size > 5 * 1024 * 1024) { // 5 MB
                Yii::$app->session->setFlash('error', 'El archivo ' . $documento->name . ' excede el tamaño permitido.');
                continue;
            }
            if (!in_array($documento->extension, ['pdf', 'jpg', 'png'])) {
                Yii::$app->session->setFlash('error', 'El archivo ' . $documento->name . ' no tiene un formato válido.');
                continue;
            }

            // Guardar el archivo en el servidor
            $ruta = 'uploads/' . $tramiteId . '/' . $documento->baseName . '.' . $documento->extension;
            if (!is_dir(dirname($ruta))) {
                mkdir(dirname($ruta), 0777, true); // Crear directorio si no existe
            }
            if ($documento->saveAs($ruta)) {
                // Guardar en la tabla de documentos
                $documentoModel = new Documento();
                $documentoModel->tramite_id = $tramiteId;
                $documentoModel->nombre_archivo = $documento->baseName;
                $documentoModel->ruta_archivo = $ruta;
                $documentoModel->tipo_documento = $documento->extension;
                $documentoModel->save();
            }
        }
    }

    public function actionPrueba()
    {
        return "¡La acción de prueba funciona!";
    }
}
