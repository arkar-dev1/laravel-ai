<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RecipeController::class, 'index'])->name('recipe.index');
Route::post('/recipe', [RecipeController::class, 'generate'])->name('recipe.generate');
