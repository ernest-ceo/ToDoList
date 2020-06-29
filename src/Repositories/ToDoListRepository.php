<?php
declare(strict_types=1);
namespace App\Repositories;
use App\Database;

class ToDoListRepository
{
    public Database $db;
    public $list;

    public function __construct()
    {
        $this->db=new Database;
    }

    public function getAll()
    {
        try
        {
            $query = 'SELECT * FROM '
            $this->db->pdo->prepare()
        }
    }
}