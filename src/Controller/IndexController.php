<?php
/**
 * Date: 02/10/18
 * Time: 19:23
 */

namespace App\Controller;

use App\Controller\ControllerInterface\ControllerInterface;
use App\Repository\CourseRepository;
use App\Repository\StudentRepository;
use App\Repository\TeacherRepository;

final class IndexController extends Controller implements ControllerInterface
{
    private $courseRepository;
    private $studentRepository;
    private $teacherRepository;

    public function __construct()
    {
        $this->courseRepository = new CourseRepository();
        $this->studentRepository = new StudentRepository();
        $this->teacherRepository = new TeacherRepository();
    }

    public function index()
    {
        $this->render('index/index', [
            'students' => $this->studentRepository->count([]),
            'teachers' => $this->teacherRepository->count([]),
            'courses' => $this->courseRepository->count([]),
        ]);
    }

    public function login()
    {
        $this->render('index/login');
    }
}