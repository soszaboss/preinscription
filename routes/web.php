<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\formationsResource;
use App\Models\Formations;
use App\Models\Documents;
use App\Models\User;
use App\Models\Preinscription;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentsRequest;
use App\Http\Requests\UserDataRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; // Add this if you want to use the base Request class

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::put('users/{users}', function (User $user, UserDataRequest $request) {
    $user->update($request->validated());
    return $user->id->toJson();
});

Route::post('documents/', function (Documents $document, DocumentsRequest $request) {
    $document->create($request->validated());
    return $document->id->toJson();
});

Route::post('preinscription', function (Request $request) { // Replace Requests with Request
    $data = $request->all();
    $preinscription = new Preinscription;
    $preinscription->user_id = $data['user_id'];
    $preinscription->formation = $data['formation'];
    $preinscription->documents = $data['documents'];
    $preinscription->feedback = $data['feedback'];
    return $preinscription->save();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/formations', function () {
    $records = Formations::select(
    'id',
    'nom_formation',
    'cout_formation',
    DB::raw("
        (CASE 
            WHEN cycle_periode = 1 THEN 'LICENCE 1'
            WHEN cycle_periode = 2 THEN 'LICENCE 2'
            WHEN cycle_periode = 3 THEN 'LICENCE 3'
            WHEN cycle_periode = 4 THEN 'MASTER 1'
            WHEN cycle_periode = 5 THEN 'MASTER 2'
            WHEN cycle_periode = 6 THEN 'INGENIEUR'
        END) AS cycle
    ")
)->get();
    return $records->toJson(JSON_UNESCAPED_UNICODE);
});
