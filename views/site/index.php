<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Bienvenido a TDUruapan';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- FontAwesome para iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .hero-section {
            background-image: url('<?= Url::to('@web/images/urupan-hero.jpg') ?>');
            /* Ruta de la imagen de fondo */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .tramite-card {
            max-width: 320px;
            /* Ancho máximo de las tarjetas */
            margin: 0 auto;
            /* Centrar las tarjetas */
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Sección Hero (Inicial) -->
    <div class="hero-section text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Dirección de Desarrollo Urbano de Uruapan</h1>
            <p class="text-xl mb-8">Gestionamos y regulamos el desarrollo urbano para construir una ciudad más ordenada y sostenible.</p>
            <a href="#tramites" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors duration-300">
                Ver trámites disponibles
            </a>
        </div>
    </div>

    <!-- Información General -->
    <div class="container mx-auto p-4">
        <div class="mt-8 p-6 bg-white rounded-2xl shadow-md">
            <h2 class="text-2xl font-semibold mb-4">¿Quiénes somos?</h2>
            <p class="text-gray-700">
                La Dirección de Desarrollo Urbano de Uruapan es la encargada de regular y administrar los trámites relacionados con el uso de suelo, construcción y ordenamiento urbano en nuestro municipio. Nuestro objetivo es garantizar un desarrollo urbano sostenible y ordenado para beneficio de todos los ciudadanos.
            </p>
        </div>

        <!-- Información de Contacto -->
         
        <!-- Mapa de Ubicación -->
        <div class="mt-8 p-6 bg-white rounded-2xl shadow-md">
            <h2 class="text-2xl font-semibold mb-4 text-center">¿Dónde estamos?</h2>
            <div class="w-full max-w-4xl mx-auto h-96 rounded-lg overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.369208671489!2d-102.05716852558577!3d19.396447281875222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842de28c1b6b0b93%3A0x61c5d5d3a56d90f0!2sDirecci%C3%B3n%20de%20desarrollo%20Urbano%20Municipal!5e0!3m2!1ses!2smx!4v1741988918632!5m2!1ses!2smx"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- Trámites Disponibles -->
        <div class="container mx-auto p-4" id="tramites">
            <h2 class="text-2xl font-semibold mb-6 text-center">Trámites Disponibles</h2>
            <!-- Campo de búsqueda -->
            <div class="mb-6 max-w-md mx-auto">
                <input type="text" id="search" placeholder="Buscar trámites..." class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <!-- Grid de trámites -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4" id="tramites-grid">
                <?php
                $tramites = [
                    [
                        'titulo' => 'Constancia de Alineamiento',
                        'descripcion' => 'Asigna alineamiento de la vía pública para facilitar su localización urbana.',
                        'tiempo' => '10 días hábiles',
                        'url' => ['tramite/inciar', 'tipo' => 1],
                        'imagen' => Url::to('@web/images/form-icon.png') // Ruta de la imagen
                    ],
                    [
                        'titulo' => 'Constancia de Número Oficial',
                        'descripcion' => 'Asigna el número oficial a un predio para su correcta identificación.',
                        'tiempo' => '10 días hábiles',
                        'url' => ['tramite/iniciar', 'tipo' => 2], // Corregido: 'tramite/iniciar' y agregado parámetro 'tipo'
                        'imagen' => Url::to('@web/images/form-icon.png')
                    ],

                    [
                        'titulo' => 'Licencia o Registro de Construcción',
                        'descripcion' => 'Autoriza la construcción de un inmueble.',
                        'tiempo' => '10 días hábiles',
                        'url' => ['tramite/construccion'],
                        'imagen' => Url::to('@web/images/form-icon.png')
                    ],
                    [
                        'titulo' => 'Licencia de Uso de Suelo',
                        'descripcion' => 'Acredita el uso permitido de un predio.',
                        'tiempo' => '10 días hábiles',
                        'url' => ['tramite/usosuelo'],
                        'imagen' => Url::to('@web/images/form-icon.png')
                    ],
                    [
                        'titulo' => 'Autorización de Fusión y/o Subdivisión',
                        'descripcion' => 'Divide o fusiona predios sin alterar la vía pública.',
                        'tiempo' => '10 días hábiles',
                        'url' => ['tramite/fusion'],
                        'imagen' => Url::to('@web/images/form-icon.png')
                    ],
                    [
                        'titulo' => 'Anuencia de Uso y Ocupación de Obra',
                        'descripcion' => 'Permite el uso de un inmueble después de construirse.',
                        'tiempo' => '10 días hábiles',
                        'url' => ['tramite/ocupacion'],
                        'imagen' => Url::to('@web/images/form-icon.png')
                    ],
                    [
                        'titulo' => 'Constancia de Zonificación Urbana',
                        'descripcion' => 'Indica los usos permitidos de un inmueble.',
                        'tiempo' => '10 días hábiles',
                        'url' => ['tramite/zonificacion'],
                        'imagen' => Url::to('@web/images/form-icon.png')
                    ],
                ];

                foreach ($tramites as $tramite): ?>
                    <div class="tramite-card p-6 bg-white shadow-md rounded-2xl hover:shadow-lg transition-shadow duration-300">
                        <!-- Imagen del trámite -->
                        <div class="w-full h-32 overflow-hidden rounded-lg mb-4 flex items-center justify-center">
                            <img src="<?= $tramite['imagen'] ?>" alt="<?= Html::encode($tramite['titulo']) ?>" class="w-24 h-24 object-contain">
                        </div>
                        <h3 class="text-xl font-semibold mb-2"><?= Html::encode($tramite['titulo']) ?></h3>
                        <p class="text-gray-700 mb-4"><?= Html::encode($tramite['descripcion']) ?></p>
                        <p class="text-gray-500 text-sm mb-4">Tiempo de respuesta: <?= Html::encode($tramite['tiempo']) ?></p>
                        <div class="mt-4">
                            <?= Html::a('Iniciar trámite', $tramite['url'], ['class' => 'bg-purple-500 hover:bg-purple-600 text-white px-6 py-2 rounded-lg text-sm transition-colors duration-300']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- Información de Contacto -->
    <div class="mt-8 p-6 bg-purple-50 rounded-2xl shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Información de Contacto</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <i class="fas fa-map-marker-alt text-3xl text-purple-600 mb-2"></i>
                <p class="text-gray-700">C. Atenas #2248, La Joyita, 60170, Uruapan, Michoacán.</p>
            </div>
            <div class="text-center">
                <i class="fas fa-phone-alt text-3xl text-purple-600 mb-2"></i>
                <p class="text-gray-700">(452) 123 4567</p>
            </div>
            <div class="text-center">
                <i class="fas fa-envelope text-3xl text-purple-600 mb-2"></i>
                <p class="text-gray-700">contacto@uruapan.gob.mx</p>
            </div>
        </div>
    </div>

    <!-- Script para búsqueda dinámica -->
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tramites = document.querySelectorAll('#tramites-grid > div');

            tramites.forEach(tramite => {
                const title = tramite.querySelector('h3').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    tramite.style.display = 'block';
                } else {
                    tramite.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>