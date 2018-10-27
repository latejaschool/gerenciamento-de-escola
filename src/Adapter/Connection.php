<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 18/10/18
 * Time: 21:38
 */

namespace App\Adapter;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Connection
{
    public static function getEntityManager(): EntityManager
    {
        $params = [
            'driver'    => 'pdo_mysql',
            'user'      => 'alessandro',
            'password'  => 'livre',
            'dbname'    => 'db_escola',
        ];

        $paths = [
            dirname(__DIR__) . '/Entity',
        ];

        $config = Setup::createAnnotationMetadataConfiguration($paths, true);

        $entityManager = EntityManager::create($params, $config);

        return $entityManager;
    }
}