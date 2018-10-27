<?php

use App\Service\Route;
use App\Controller\StudentController;
use App\Controller\IndexController;
use App\Controller\TeacherController;
use App\Controller\Api\StudentApiController;


return [
    '/api/aluno' => Route::create(StudentApiController::class, 'findAll'),
    '/api/aluno/inserir' => Route::create(StudentApiController::class, 'insert'),
    '/api/aluno/remover' => Route::create(StudentApiController::class, 'remove'),





    '/' => Route::create(IndexController::class, 'index'),

    '/login' => Route::create(IndexController::class, 'login'),

    '/professor' => Route::create(TeacherController::class, 'index'),
    '/professor/detalhes' => Route::create(TeacherController::class, 'details'),
    '/professor/novo' => Route::create(TeacherController::class, 'new'),
    '/professor/inserir' => Route::create(TeacherController::class, 'insert'),
    '/professor/remover' => Route::create(TeacherController::class, 'remove'),
    '/professor/editar' => Route::create(TeacherController::class, 'edit'),
    '/professor/atualizar' => Route::create(TeacherController::class, 'update'),

    //Aluno
    '/aluno' => Route::create(StudentController::class, 'index'),
    '/aluno/detalhes' => Route::create(StudentController::class, 'details'),
    '/aluno/novo' => Route::create(StudentController::class, 'new'),
    '/aluno/inserir' => Route::create(StudentController::class, 'insert'),
    '/aluno/remover' => Route::create(StudentController::class, 'remove'),
    '/aluno/editar' => Route::create(StudentController::class, 'edit'),
    '/aluno/atualizar' => Route::create(StudentController::class, 'update'),


];