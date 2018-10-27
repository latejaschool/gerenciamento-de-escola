<?php

namespace App;

use App\Adapter\Connection;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

include_once dirname(__DIR__) . '/vendor/autoload.php';

$entityManager = Connection::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);