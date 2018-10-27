<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 23/10/18
 * Time: 19:30
 */

namespace App\Repository;


use App\Adapter\Connection;
use App\Entity\Course;
use Doctrine\ORM\EntityRepository;

class CourseRepository extends EntityRepository
{
    public function __construct()
    {
        $entityManager = Connection::getEntityManager();

        parent::__construct(
            $entityManager,
            $entityManager->getClassMetadata(Course::class)
        );
    }

    public function save(Course $course): void
    {
        $this->getEntityManager()->persist($course);
        $this->getEntityManager()->flush();
    }

    public function remove(Course $course): void
    {
        $this->getEntityManager()->remove($course);
        $this->getEntityManager()->flush();
    }

    public function findOneById($id): Course
    {
        /** @var Course $course */
        $course = $this->findOneBy(['id' => $id]);

        if (! $course) {
            die ('Curso não encontrado');
        }

        return $course;
    }
}