<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller;
use App\Http\Controllers\CategoryController;

Route::apiResource('categories', CategoryController::class);

Route::get('/categories', [CategoryController::class, 'index']);

