<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Bienvenido a TDUruapan';
?>
<div class="container mx-auto p-4">
    <!-- Bienvenida -->
    <div class="bg-blue-500 text-white text-center py-6 rounded-2xl shadow-md">
        <h1 class="text-3xl font-bold">Bienvenido</h1>
        <p class="text-lg">Sistema de Trámites de la Dirección de Desarrollo Urbano</p>
    </div>

    <!-- Información General -->
    <div class="mt-6 p-4 bg-gray-100 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold">Información General</h2>
        <p class="text-gray-700">
            La Dirección de Desarrollo Urbano se encarga de regular y administrar los trámites relacionados con el uso de suelo, construcción y ordenamiento urbano en Uruapan.
        </p>
    </div>

    <!-- Notificaciones -->
    <div class="mt-6 p-4 bg-yellow-100 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold">Notificaciones</h2>
        <ul class="list-disc list-inside text-gray-700">
            <li>No hay notificaciones recientes.</li>
        </ul>
    </div>

    <!-- Trámites Disponibles -->
    <div class="mt-6">
        <h2 class="text-xl font-semibold">Trámites Disponibles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            <?php 
            $tramites = [
                [
                    'titulo' => 'Constancia de Alineamiento',
                    'descripcion' => 'Asigna alineamiento de la vía pública para facilitar su localización urbana.',
                    'tiempo' => '10 días hábiles',
                    'url' => ['tramite/alineamiento']
                ],
                [
                    'titulo' => 'Constancia de Número Oficial',
                    'descripcion' => 'Asigna el número oficial a un predio para su correcta identificación.',
                    'tiempo' => '10 días hábiles',
                    'url' => ['tramite/numerooficial']
                ],
                [
                    'titulo' => 'Licencia o Registro de Construcción',
                    'descripcion' => 'Autoriza la construcción de un inmueble.',
                    'tiempo' => '10 días hábiles',
                    'url' => ['tramite/construccion']
                ],
                [
                    'titulo' => 'Licencia de Uso de Suelo',
                    'descripcion' => 'Acredita el uso permitido de un predio.',
                    'tiempo' => '10 días hábiles',
                    'url' => ['tramite/usosuelo']
                ],
                [
                    'titulo' => 'Autorización de Fusión y/o Subdivisión',
                    'descripcion' => 'Divide o fusiona predios sin alterar la vía pública.',
                    'tiempo' => '10 días hábiles',
                    'url' => ['tramite/fusion']
                ],
                [
                    'titulo' => 'Anuencia de Uso y Ocupación de Obra',
                    'descripcion' => 'Permite el uso de un inmueble después de construirse.',
                    'tiempo' => '10 días hábiles',
                    'url' => ['tramite/ocupacion']
                ],
                [
                    'titulo' => 'Constancia de Zonificación Urbana',
                    'descripcion' => 'Indica los usos permitidos de un inmueble.',
                    'tiempo' => '10 días hábiles',
                    'url' => ['tramite/zonificacion']
                ],
            ];

            foreach ($tramites as $tramite): ?>
                <div class="p-4 bg-white shadow-md rounded-2xl">
                    <h3 class="text-lg font-semibold"><?= Html::encode($tramite['titulo']) ?></h3>
                    <p class="text-gray-700"><?= Html::encode($tramite['descripcion']) ?></p>
                    <p class="text-gray-500 text-sm">Tiempo de respuesta: <?= Html::encode($tramite['tiempo']) ?></p>
                    <div class="mt-2">
                        <?= Html::a('Iniciar trámite', $tramite['url'], ['class' => 'bg-blue-500 text-white px-4 py-2 rounded-lg text-sm']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
