<?php

use App\Core\App;
use App\Core\Database\Connection;
use App\Core\Database\QueryBuilder;


require('./core/helpers.php');

App::bind('config', require './config.php');

$pdo = Connection::make(App::get('config')['database']);

App::bind('queryBuilder', new QueryBuilder($pdo));


