<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 18/10/18
 * Time: 21:16
 */

namespace App\Repository;

use App\Adapter\Connection;
use App\Entity\Teacher;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;

class TeacherRepository extends EntityRepository
{
    public function __construct()
    {
        $entityManager = Connection::getEntityManager();

        parent::__construct(
            $entityManager,
            $entityManager->getClassMetadata(Teacher::class)
        );
    }

    public function save(Teacher $teacher): Teacher
    {
        $this->getEntityManager()->persist($teacher);
        $this->getEntityManager()->flush();

        return $teacher;
    }
}