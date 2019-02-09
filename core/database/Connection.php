<?php 

namespace App\Core\Database;

class Connection {

    public static function make($configDatabase){
        try {
            
            return new \PDO(

                $configDatabase['type'].':host='.$configDatabase['host'].';dbname='.$configDatabase['name'],
                $configDatabase['username'],
                $configDatabase['password'],
                $configDatabase['options']);

        } catch(PDOException $e){

            die('Nuespješno spajanje s bazom podataka');

        }
    }
}  