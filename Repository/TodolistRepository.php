<?php

namespace Repository {

    use Entity\Todolist;

    interface TodolistRepository
    {
        function Save(Todolist $todolist): void;
        function remove(int $number): bool;
        function findAll(): array;
    }

    class TodolistRepositoryimpl implements TodolistRepository
    {
        public  array $todolist = array();
        private \PDO $koneksi;

        public function __construct(\PDO $koneksi)
        {
            $this->koneksi = $koneksi;
        }

        function Save(Todolist $todolist): void
        {
            // $number = sizeof($this->todolist) + 1;
            // $this->todolist[$number] = $todolist;

            $sql = "INSERT INTO todolist(todo) VALUES (?)";
            $statement = $this->koneksi->prepare($sql);
            $statement->execute([$todolist->getTodo()]);
        }

        function remove(int $number): bool
        {
            // global $todolist;

            // if ($number > sizeof($this->todolist)) {
            //     return false;
            // }

            // for ($i = $number; $i > sizeof($this->todolist); $i++) {
            //     $this->todolist[$i] = $this->todolist[$i + 1];
            // }

            // unset($this->todolist[sizeof($this->todolist)]);

            // return true;
            $sql = "SELECT id FROM todolist WHERE id = ? ";
            $statement = $this->koneksi->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                //jika todolist ada
                $sql = "DELETE FROM todolist WHERE id = ? ";
                $statement = $this->koneksi->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else {
                return false;
            }
        }

        function findAll(): array
        {
            //return $this->todolist;
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->koneksi->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row) {
                $todolist = new Todolist();
                $todolist->setId($row['id']);
                $todolist->setTodo($row['todo']);
                $result[] = $todolist;
            }
            return $result;
        }
    }
}
