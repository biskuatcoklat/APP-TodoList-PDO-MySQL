<?php

namespace Config {

    class Database
    {
        static function getKoneksi(): \PDO
        {
            $host = "localhost";
            $database = "aplikasi_todolist";
            $username = "root";
            $password = "";
            return new \PDO("mysql:host=$host;dbname=$database", $username, $password);
        }
    }
}
