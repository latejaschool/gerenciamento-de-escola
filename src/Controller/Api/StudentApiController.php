<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 23/10/18
 * Time: 21:30
 */

namespace App\Controller\Api;


use App\Entity\Student;
use App\Entity\User;
use App\Repository\StudentRepository;

final class StudentApiController extends ApiController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new StudentRepository();
    }

    public function findAll()
    {
        if (isset($_GET['id'])) {
            return $this->findOne();
        }


        $students = $this->repository->findAll();

        $return = [];
        /** @var Student $student */
        foreach ($students as $student) {
            $return[] = [
                'id' => $student->getUser()->getId(),
                'name' => $student->getUser()->getName(),
                'email' => $student->getUser()->getEmail(),
                'phone' => $student->getUser()->getPhone(),
                'registeredAt' => $student->getUser()->getRegisteredAt(),
                'updatedAt' => $student->getUser()->getUpdatedAt(),
                'sex' => $student->getSex(),
                'birth' => $student->getBirth(),
            ];
        }

        $this->jsonResponse('Alunos Encontrados', $return);
    }

    public function findOne()
    {
        $student = $this->repository->findOneById($_GET['id']);

        $return = [
            'id' => $student->getUser()->getId(),
            'name' => $student->getUser()->getName(),
            'email' => $student->getUser()->getEmail(),
            'phone' => $student->getUser()->getPhone(),
            'registeredAt' => $student->getUser()->getRegisteredAt(),
            'updatedAt' => $student->getUser()->getUpdatedAt(),
            'sex' => $student->getSex(),
            'birth' => $student->getBirth(),
        ];

        $this->jsonResponse('Aluno Encontrado', $return);
    }

    public function insert()
    {
        $request = json_decode(
            file_get_contents('php://input')
        );

        $user = new User();
        $user->setName($request->name);
        $user->setEmail($request->email);
        $user->setPhone($request->phone);

        $student = new Student();
        $student->setUser($user);
        $student->setSex($request->sex);
        $student->setBirth(new \DateTime($request->birth));

        $this->repository->save($student);

        $this->jsonResponse('Novo Aluno cadastrado');
    }

    public function remove()
    {
        $id = $_GET['id'];

        $student = $this->repository->findOneById($id);

        $this->repository->remove($student);

        $this->jsonResponse('Aluno Excluido');
    }
}