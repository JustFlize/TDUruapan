<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
]);

?>

<!-- Datos del Propietario -->
<fieldset>
    <legend>Datos del Propietario</legend>
    <?= $form->field($detalleModel, 'propietario_nombre')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'propietario_apellidos')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'propietario_identificacion')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'telefono')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'correo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'domicilio')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'colonia')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'entre_calles')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'codigo_postal')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'aprovechamiento_predio')->textarea(['rows' => 3]) ?>
    <?= $form->field($detalleModel, 'escritura_numero')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'registro_numero')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'tomo_numero')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'folio_electronico')->textInput(['maxlength' => true]) ?>
    <?= $form->field($detalleModel, 'objeto_tramite')->textarea(['rows' => 3]) ?>
</fieldset>

<!-- Documentos Requeridos -->
<fieldset>
    <legend>Documentos Requeridos</legend>
    <input type="file" name="documentos[]" multiple>
</fieldset>

<div class="form-group">
    <?= Html::submitButton('Enviar Solicitud', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>