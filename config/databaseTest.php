<?php 
require_once __DIR__ . '/database.php';

$db = \Config\Database::getKoneksi();
echo "success connect to database";
