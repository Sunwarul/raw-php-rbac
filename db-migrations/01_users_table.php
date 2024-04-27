<?php

require 'cli.php';

$sql = <<<SQL
    CREATE TABLE users(
        id int not null auto_increment primary key,
        name varchar(255) not null,
        email varchar(255) unique not null,
        password varchar(255) not null,
        created_at timestamp default current_timestamp,
        updated_at timestamp default current_timestamp
    )
SQL;

$conn = $app->dbConn();
$conn->exec($sql);