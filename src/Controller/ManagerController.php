<?php
/**
 * Date: 02/10/18
 * Time: 21:05
 */

namespace App\Controller;

use App\Controller\ControllerInterface\ControllerInterface;

final class ManagerController extends Controller implements ControllerInterface
{
    public function index()
    {
        $this->render('manager/index');
    }
}