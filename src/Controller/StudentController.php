<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 23/10/18
 * Time: 19:15
 */

namespace App\Controller;

use App\Controller\ControllerInterface\ControllerInterface;
use App\Entity\Student;
use App\Entity\User;
use App\Repository\StudentRepository;

final class StudentController extends Controller implements ControllerInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new StudentRepository();
    }

    public function index()
    {
        $students = $this->repository->findAll();

        $this->render('student/index', [
            'students' => $students,
        ]);
    }

    public function new()
    {
        $this->render('student/new');
    }

    public function insert()
    {
        $user = new User();
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setPhone($_POST['phone']);

        $student = new Student();
        $student->setUser($user);
        $student->setSex($_POST['sex']);
        $student->setBirth(
            new \DateTime($_POST['birth'])
        );

        $this->repository->save($student);

        header('location: /aluno');
    }

    public function details()
    {
        $id = $_GET['id'];

        $student = $this->repository->findOneById($id);

        $this->render('student/details', [
            'student' => $student,
        ]);
    }

    public function remove()
    {
        $id = $_GET['id'];

        $student = $this->repository->findOneById($id);

        $this->repository->remove($student);

        header('location: /aluno');
    }

    public function edit()
    {
        $id = $_GET['id'];

        $student = $this->repository->findOneById($id);

        $this->render('student/edit', [
            'student' => $student,
        ]);
    }

    public function update()
    {
        $id = $_GET['id'];

        $student = $this->repository->findOneById($id);
        $student->setSex($_POST['sex']);
        $student->setBirth(new \DateTime($_POST['birth']));
        $student->getUser()->setName($_POST['name']);
        $student->getUser()->setEmail($_POST['email']);
        $student->getUser()->setPhone($_POST['phone']);

        $this->repository->save($student);

        header('location: /aluno');
    }
}