<?php

namespace App\Models;

use App\Core\App;
use App\Core\Database\Connection;

abstract class Model {

    protected $pdo;
    protected $query;

    public function __construct(){

        $this->pdo = Connection::make(App::get('config')['database']);
        $this->query = App::get('queryBuilder');
    }

    public static function create($values){

        $fullPath = get_called_class();
        $pathToArray = explode('\\', $fullPath);
        $class = strtolower($pathToArray[count($pathToArray) - 1]).'s';
        App::get('queryBuilder')->insert($class, $values);
        
    }
    public static function all(){

        $fullPath = get_called_class();
        $pathToArray = explode('\\', $fullPath);
        $class = strtolower($pathToArray[count($pathToArray) - 1]).'s';
        return App::get('queryBuilder')->selectAll($class);
        
    }
}