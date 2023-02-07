<?php

namespace OOP\POLIMORFIZM;

use InvalidArgumentException;
use PDO;

abstract class Publications
{
    // таблица, в которой хранятся данные по элементу
    protected string $Table;
    protected array $db_data_holder;

    public function __construct(protected array $ids)
    {
        try {
            $host = 'localhost';
            $userNAme = 'root';
            $db = 'db';
            $connection = new PDO(
                "mysql:host=$host;dbname=$db", $userNAme, "",
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false #dont allow duplicate VALUES(:data,:data) => error
                ]
            );
            foreach ($this->ids as $id)
            {
                // обратите внимание, мы не знаем,
                // из какой таблицы нам нужно получить данные
                $query = "SELECT * FROM {$this->Table} where
                        {$this->Table}.id = {$id}";
                $connection->query($query);
                $connection->beginTransaction();
                $connection->prepare($query);
                $users = $connection->query($query)->fetch();
                //var_dump($users);
                $connection->commit();
                $this->db_data_holder = $users;
            }
        } catch (InvalidArgumentException $exception) {
            exit(
                $exception->getFile() .
                $exception->getMessage() .
                $exception->getLine()
            );
        }
    }

    public function set_table(string $name):self
    {
        $this->Table = $name;
        return $this;
    }

    public function get_all_data():array
    {
        return $this->db_data_holder;
    }

    // метод, одинаковый для любого типа публикаций,
    // возвращает значение свойства

    public function get_DB_Value(string $key)
    {
        try {
            if (isset($this->db_data_holder [$key])) {
                return $this->db_data_holder[$key];
            }
        } catch (InvalidArgumentException) {
            exit(
                $exception->getFile() .
                $exception->getMessage() .
                $exception->getLine()
            );
        }
    }
    // метод, одинаковый для любого типа публикаций,
    // устанавливает значение свойства
    public function set_db_datum(string $key, string|int $value): self
    {
            $this->db_data_holder[$key] = $value;
            return $this;
    }

    // а этот метод должен напечатать публикацию, но мы не знаем,
    // как именно это сделать, и потому объявляем его абстрактным
    abstract public function do_print();
}
