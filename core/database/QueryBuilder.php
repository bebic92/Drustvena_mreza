<?php

namespace App\Core\Database;

class QueryBuilder{
    
    protected $pdo;

    public function __construct(\PDO $pdo){

        $this->pdo = $pdo;

    }
    public function querry($sql){

        $statment = $this->pdo->prepare($sql);
        $statment->execute();
        return $statment->fetchAll(\PDO::FETCH_OBJ); 

    }

    public function selectAll($table, $order = 'DESC') {

        $statment = $this->pdo->prepare("SELECT * FROM {$table} ORDER BY created_at {$order}");
        $statment->execute();
        return $statment->fetchAll(\PDO::FETCH_OBJ); 

    }

    public function insert($table, $parameters) {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', 
            $table,
            implode(', ', array_keys($parameters)),
            implode(', ', array_map(function($param){
                return ':'.$param;
            },array_keys($parameters)))
        );
        
        $statment= $this->pdo->prepare($sql);
        $statment->execute($parameters);
    }

    public function update($table, $parameters, $column, $condition) {
      
        $sql = sprintf("UPDATE %s SET %s WHERE %s = '%s'", $table, 
      
        implode(', ', array_map(function($param){
      
            return $param.' = :'.$param;
      
        }, array_keys($parameters))),
        $column,
        $condition
      );

      $statment= $this->pdo->prepare($sql);
      $statment->execute($parameters);
    
    }
    
    public function findAll($table, $column, $parameter){
        
        $statment = $this->pdo->prepare("SELECT * FROM {$table} where {$column} = '{$parameter}'");
        $statment->execute();

        return $statment->fetchAll(\PDO::FETCH_OBJ);

    }

    public function findOne($table, $column, $parameter){
     
        $statment = $this->pdo->prepare("SELECT * FROM {$table} where {$column} = '{$parameter}' LIMIT 1");
        $statment->execute();

        return $statment->fetch(\PDO::FETCH_OBJ);
    
    }
}