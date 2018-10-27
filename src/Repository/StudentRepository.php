<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 23/10/18
 * Time: 19:30
 */

namespace App\Repository;


use App\Adapter\Connection;
use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;

class StudentRepository extends EntityRepository
{
    public function __construct()
    {
        $entityManager = Connection::getEntityManager();

        parent::__construct(
            $entityManager,
            $entityManager->getClassMetadata(Student::class)
        );
    }

    public function save(Student $student): void
    {
        $this->getEntityManager()->persist($student);
        $this->getEntityManager()->flush();
    }

    public function remove(Student $student): void
    {
        $this->getEntityManager()->remove($student);
        $this->getEntityManager()->flush();
    }

    public function findOneById($id): Student
    {
        /** @var Student $student */
        $student = $this->findOneBy(['user' => $id]);

        if (! $student) {
            die ('Aluno não encontrado');
        }

        return $student;
    }
}