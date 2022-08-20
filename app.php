<?php

require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . "/helpper/inputhelper.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/view/Todolistview.php";
require_once __DIR__ . '/config/database.php';

use Repository\TodolistRepositoryimpl;
use Service\TodolistServiceimpl;
use View\Todolistview;

echo "aplikasi ToDoList" . PHP_EOL;

$koneksi = \Config\Database::getKoneksi();
$todolistrepository = new TodolistRepositoryimpl($koneksi);
$todolistservice = new TodolistServiceimpl($todolistrepository);
$todolistview = new Todolistview($todolistservice);

$todolistview->showtodolist();
