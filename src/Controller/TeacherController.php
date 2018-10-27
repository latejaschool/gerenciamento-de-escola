<?php
/**
 * Date: 02/10/18
 * Time: 21:24
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
            'teachers' => $teachers
        ]);
    }

    public function new()
    {
        $this->render('teacher/new');
    }
    
    public function details()
    {
        $this->render('teacher/details');
    }

    public function insert()
    {
        $post = [
            'name' => 'Chiquim', //$_POST['name']
            'email' => 'ale123@email.com',
            'phone' => '(85) 9 8674-0502',
            'formation' => 'ADS',
        ];

        $user = new User();
        $user->setName($post['name']);
        $user->setEmail($post['email']);
        $user->setPhone($post['phone']);

        $teacher = new Teacher();
        $teacher->setUser($user);
        $teacher->setFormation($post['formation']);

        try {
            $this->repository->save($teacher);
        } catch (\Exception $exception) {
            die ($exception->getMessage());
        }

        echo 'Professor inserido';
    }
}
