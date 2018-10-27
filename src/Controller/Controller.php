<?php
/**
 * Date: 02/10/18
 * Time: 21:06
 */

namespace App\Controller;

abstract class Controller
{
    private $viewName;
    private $data;

    protected function render(string $viewName, $data = [])
    {
        $this->viewName = $viewName;
        $this->data = $data;

        $this->partial('layout/main');
    }

    private function content()
    {
        $this->partial($this->viewName);
    }

    private function partial(string $partialName)
    {
        $data = $this->data;
        $fileName = "../src/View/$partialName.phtml";

        if (! file_exists($fileName)) {
            die ("Erro: View $fileName não encontrada");
        }

        include_once $fileName;
    }

    private function navbar()
    {
        $this->partial('layout/navbar');
    }
}