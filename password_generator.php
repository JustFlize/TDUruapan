<?php

$password = 'admin123'; // Cambia esto por la contraseña que quieras encriptar

$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Contraseña: " . $password . "\n";
echo "Hash generado: " . $hash . "\n";
?>

//php password_generator.php