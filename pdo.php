<?php


	$HOST = 'localhost';
    $PORT = '5432';
    $DB_NAME = 'covid';
    $DB_USER = 'postgres';
    $DB_PASSWORD = 'abc';
    $pdo = new PDO(
        //"mysql:host=$HOST;port=$PORT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD
        "pgsql:host=$HOST;port=$PORT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
