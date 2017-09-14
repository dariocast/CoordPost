<?php
// If you installed via composer, just use this code to requrie autoloader on the top of your projects.
require 'vendor/autoload.php';

// Using Medoo namespace
use Medoo\Medoo;

if (!isset($_POST['nome']) || !isset($_POST['lat']) || !isset($_POST['long']) || !isset($_POST['tipo'])) {
    header("location: index.html");
}

$lat = $_POST['lat'];
$long = $_POST['long'];
$name = $_POST['nome'];
$type = $_POST['tipo'];
/**
 * Created by PhpStorm.
 * User: dariocastellano
 * Date: 13/09/17
 * Time: 11:25
 */

// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'Map',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '232323'
]);

$database->delete('Coordinates',
    [
        'location_type' => $type
    ]
    );

$database->insert('Coordinates',[
    'lat' => $lat,
    'long' => $long,
    'location_name' => $name,
    'location_type' => $type
]);

header("location: index.html?success=true");

?>