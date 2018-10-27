<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 23/10/18
 * Time: 19:15
 */

namespace App\Controller;

use App\Controller\ControllerInterface\ControllerInterface;
use App\Entity\Course;
use App\Repository\CourseRepository;

final class CourseController extends Controller implements ControllerInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new CourseRepository();
    }

    public function index()
    {
        $courses = $this->repository->findAll();

        $this->render('course/index', [
            'courses' => $courses,
        ]);
    }

    public function new()
    {
        $this->render('course/new');
    }

    public function insert()
    {
        $course = new Course();
        $course->setName($_POST['name']);
        $course->setDescription($_POST['description']);
        $course->setWorkload($_POST['workload']);

        $this->repository->save($course);

        header('location: /curso');
    }

    public function details()
    {
        $id = $_GET['id'];

        $course = $this->repository->findOneById($id);

        $this->render('course/details', [
            'course' => $course,
        ]);
    }

    public function remove()
    {
        $id = $_GET['id'];

        $course = $this->repository->findOneById($id);

        $this->repository->remove($course);

        header('location: /curso');
    }

    public function edit()
    {
        $id = $_GET['id'];

        $course = $this->repository->findOneById($id);

        $this->render('course/edit', [
            'course' => $course,
        ]);
    }

    public function update()
    {
        $id = $_GET['id'];

        $course = $this->repository->findOneById($id);
        $course->setName($_POST['name']);
        $course->setDescription($_POST['description']);
        $course->setWorkload($_POST['workload']);

        $this->repository->save($course);

        header('location: /curso');
    }
}