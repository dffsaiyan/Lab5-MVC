<?php
namespace App\Models;

use PDO;
use PDOException;

class BaseModel
{
    protected $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=localhost;dbname=lab5mvc;charset=utf8",
                "root",
                ""
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi DB: " . $e->getMessage());
        }
    }
}
