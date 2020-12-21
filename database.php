<?php
    $server = '127.0.0.1';
    $username = 'root';
    $password = 'vivify';
    $dbname = 'blog';

    try {
        $connection = new PDO(
            "mysql:host=$server;
            dbname=$dbname",
            $username,
            $password
        );
    } catch (PDOException $e) {
        echo $e->getMEssage();
    }
?> 