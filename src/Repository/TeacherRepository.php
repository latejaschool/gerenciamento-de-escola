<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 23/10/18
 * Time: 19:30
 */

namespace App\Repository;


use App\Adapter\Connection;
use App\Entity\Teacher;
use Doctrine\ORM\EntityRepository;

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

    public function save(Teacher $teacher): void
    {
        $this->getEntityManager()->persist($teacher);
        $this->getEntityManager()->flush();
    }

    public function remove(Teacher $teacher): void
    {
        $this->getEntityManager()->remove($teacher);
        $this->getEntityManager()->flush();
    }

    public function findOneById($id): Teacher
    {
        /** @var Teacher $teacher */
        $teacher = $this->findOneBy(['user' => $id]);

        if (! $teacher) {
            die ('Professor não encontrado');
        }

        return $teacher;
    }
}