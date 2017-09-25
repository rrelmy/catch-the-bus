<?php
declare(strict_types=1);

/**
 * TODO
 *  - Caching
 *  - Error Handling
 */
ini_set('display_errors', '1');
error_reporting(E_ALL);

define('BASE_URL', 'http://www.mezi.ch/rbl');
define('API_DEPARTURES', '/departures/%d');

define('STATION_MAEGENWIL_GEWERBEPARK', 87230);

$id = $_GET['id'] ?? STATION_MAEGENWIL_GEWERBEPARK;

$url = BASE_URL . sprintf(API_DEPARTURES, $id);

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: http://localhost:8080');

//$url = __DIR__ . '/../data/sample/departures-78736-2.json';
$response = file_get_contents($url);

echo json_encode(json_decode($response)->response->departures, JSON_PRETTY_PRINT);

