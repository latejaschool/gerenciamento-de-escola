<?php

namespace App\Service;

abstract class Route
{
    public static function create(string $controller, string $method): array
    {
        return [
            'controller' => $controller,
            'method' => $method,
        ];
    }

}
