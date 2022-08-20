<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../config/database.php";

use Entity\Todolist;
use Service\TodolistServiceimpl;
use Repository\TodolistRepositoryimpl;

function testShowTodolist(): void
{
    $koneksi = \Config\Database::getKoneksi();
    $todolistrepository = new TodolistRepositoryimpl($koneksi);

    $todolistservice = new TodolistServiceimpl($todolistrepository);
    $todolistservice->addTodolist("belajar php");
    $todolistservice->addTodolist("belajar php oop");
    $todolistservice->addTodolist("belajar php database");

    $todolistservice->showTodolist();
}
function testAddTodolist(): void
{
    $koneksi = \Config\Database::getKoneksi();
    $todolistrepository = new TodolistRepositoryimpl($koneksi);

    $todolistservice = new TodolistServiceimpl($todolistrepository);
    $todolistservice->addTodolist("belajar php");
    $todolistservice->addTodolist("belajar php oop");
    $todolistservice->addTodolist("belajar php database");

    //$todolistservice->showTodolist();
}
function testRemoveTodolist(): void
{
    $koneksi = \Config\Database::getKoneksi();
    $todolistrepository = new TodolistRepositoryimpl($koneksi);

    $todolistservice = new TodolistServiceimpl($todolistrepository);
    echo $todolistservice->removeTodolist(5) . PHP_EOL;
    echo $todolistservice->removeTodolist(4) . PHP_EOL;
    echo $todolistservice->removeTodolist(3) . PHP_EOL;
    echo $todolistservice->removeTodolist(2) . PHP_EOL;
    echo $todolistservice->removeTodolist(1) . PHP_EOL;
}
testShowTodolist();
