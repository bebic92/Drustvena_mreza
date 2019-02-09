<?php

namespace App\Core\Database;

class QueryBuilder{
    
    protected $pdo;

    public function __construct(\PDO $pdo){

        $this->pdo = $pdo;

    }

    public function selectAll($table) {

        $statment = $this->pdo->prepare('SELECT * FROM '.$table);
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


}