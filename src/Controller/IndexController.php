<?php
/**
 * Date: 02/10/18
 * Time: 19:23
 */

namespace App\Controller;

use App\Controller\ControllerInterface\ControllerInterface;

final class IndexController extends Controller implements ControllerInterface
{
    public function index()
    {
        $this->render('index/index');
    }

    public function login()
    {
        $this->render('index/login');
    }
}