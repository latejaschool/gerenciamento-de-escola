<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 23/10/18
 * Time: 21:29
 */

namespace App\Controller\Api;

abstract class ApiController
{
    public function jsonResponse($message, $data = null)
    {
        header('Content-Type: application/json');

        echo json_encode([
            'message' => $message,
            'data' => $data,
        ]);
    }
}