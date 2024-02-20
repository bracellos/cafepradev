<?php

use App\Http\Controllers\api\ArticlesController;
use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post("/auth", [AuthController::class, "auth"]);

//grupo de api autenticada
Route::middleware("auth:sanctum")->group(function(){
    //listar todos
    //Route::get("/articles", [ArticlesController::class, "index"]);
    //listar um pelo id
    //Route::get("/articles/{id}", [ArticlesController::class, "show"]);
    
    //adicionar novo
    //Route::post("/articles", [ArticlesController::class, "store"]);
    //atualizar registro usar put ou patch
    //Route::put("/articles/{id}", [ArticlesController::class, "update"]);

    //deletar um item
    //Route::delete("/articles/{id}", [ArticlesController::class, "destroy"]);

    Route::apiResource("/articles", ArticlesController::class);

});
