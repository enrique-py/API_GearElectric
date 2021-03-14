<?php
//header('Content-Type: application/json');
//header('Access-Control-Allow-Origin: *'); //reemplazr * por mi dominio

$link = 'mysql:host=localhost;dbname=api_formulario';
$usuario = 'root';
$pass = '';

try
{
    $pdo = new PDO($link,$usuario,$pass);
    //echo 'Conectado';
    //foreach($pdo->query('SELECT * FROM `datos`') as $fila) {
    //    print_r($fila);
    //}
}
catch (PDOException $e) 
{
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}