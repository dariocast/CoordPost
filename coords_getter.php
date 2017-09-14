<?php
/**
 * Created by PhpStorm.
 * User: dariocastellano
 * Date: 13/09/17
 * Time: 12:30
 */
// If you installed via composer, just use this code to requrie autoloader on the top of your projects.
require 'vendor/autoload.php';

// Using Medoo namespace
use Medoo\Medoo;

// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'Map',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '232323'
]);

$data = $database->select('Coordinates',
    ['lat', 'long', 'location_name'],
    ['location_type' => $_POST['tipo']]);

echo json_encode($data);
?>
