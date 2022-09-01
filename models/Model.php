<?php

abstract class Model
{
    protected $database;
    protected $table;

    public function __construct() {
        try {
            $this->database = new PDO(
                'mysql:host=localhost;dbname=hospitale2n;charset=utf8',
                'root',
                '',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Insert data method
    abstract public function insert(array $params);

    // Search all data method
    public function findAll(): ?array {
        try {
            $request = $this->database->query(
                "SELECT *
                FROM {$this->table}"
            );
            $result = $request->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $result ?? [];
    }
    
    // Delete method
    public function delete(string $id) :void{
        try {
            $request = $this->database->prepare(
                "DELETE
                FROM {$this->table}
                WHERE id = ?"
            );
            $request->execute([$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    // Search by id method
    public function findById($id) {
        try {
            $request = $this->database->prepare(
                "SELECT *
                FROM {$this->table}
                WHERE id = :id"
            );
            $request->execute([':id' => $id]);
            $result = $request->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $result;
    }

    // Search by email method
    public function findByMail($mail) {
        try {
            $request = $this->database->prepare(
                "SELECT mail
                FROM {$this->table}
                WHERE mail = :mail"
            );
            $request->execute([':mail' => $mail]);
            $result = $request->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $result;
    }
}