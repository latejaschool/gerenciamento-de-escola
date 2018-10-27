<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 23/10/18
 * Time: 19:15
 */

namespace App\Controller;

use App\Controller\ControllerInterface\ControllerInterface;
use App\Entity\Teacher;
use App\Entity\User;
use App\Repository\TeacherRepository;

final class TeacherController extends Controller implements ControllerInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new TeacherRepository();
    }

    public function index()
    {
        $teachers = $this->repository->findAll();

        $this->render('teacher/index', [
            'teachers' => $teachers,
        ]);
    }

    public function new()
    {
        $this->render('teacher/new');
    }

    public function insert()
    {
        $user = new User();
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setPhone($_POST['phone']);

        $teacher = new Teacher();
        $teacher->setUser($user);
        $teacher->setFormation($_POST['formation']);

        $this->repository->save($teacher);

        header('location: /professor');
    }

    public function details()
    {
        $id = $_GET['id'];

        $teacher = $this->repository->findOneById($id);

        $this->render('teacher/details', [
            'teacher' => $teacher,
        ]);
    }

    public function remove()
    {
        $id = $_GET['id'];

        $teacher = $this->repository->findOneById($id);

        $this->repository->remove($teacher);

        header('location: /professor');
    }

    public function edit()
    {
        $id = $_GET['id'];

        $teacher = $this->repository->findOneById($id);

        $this->render('teacher/edit', [
            'teacher' => $teacher,
        ]);
    }

    public function update()
    {
        $id = $_GET['id'];

        $teacher = $this->repository->findOneById($id);
        $teacher->setFormation($_POST['formation']);
        $teacher->getUser()->setName($_POST['name']);
        $teacher->getUser()->setEmail($_POST['email']);
        $teacher->getUser()->setPhone($_POST['phone']);

        $this->repository->save($teacher);

        header('location: /professor');
    }
}