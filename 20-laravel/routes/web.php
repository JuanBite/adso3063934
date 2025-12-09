<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Pet;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    // return "This is a Route: 😊";
    return view('welcome');
});

Route::get('Hello', function () {
    return "<h1>Hello folks, have a nice day 😁</h1>";
});

Route::get('Hello/{name}', function () {
    return "<h1>Hello " . request()->name . "</h1>";
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'admin'], function(){

        Route::resources([
            'users'    => UserController::class,
            'pets'     => PetController::class,
            // 'adoptions' => AdoptionController::class
        ]);
        Route::get('adoptions', [AdoptionController::class, 'index']);
        Route::get('adoptions/{id}', [AdoptionController::class, 'show']);
        // Search Users
        Route::post('search/users', [UserController::class, 'search']);
        Route::post('search/pets', [PetController::class, 'search']);
        Route::post('search/adoptions', [AdoptionController::class, 'search']);
        // Export
        Route::get('export/users/pdf', [UserController::class, 'pdf']);
        Route::get('export/users/excel', [UserController::class, 'excel']);
        Route::post('import/users', [UserController::class, 'import']);
        
        Route::get('export/pets/pdf', [PetController::class, 'pdf']);
        Route::get('export/pets/excel', [PetController::class, 'excel']);
        Route::post('import/pets', [PetController::class, 'import']);
        
        Route::get('export/adoptions/pdf', [AdoptionController::class, 'pdf']);
        Route::get('export/adoptions/excel', [AdoptionController::class, 'excel']);
        Route::post('import/adoptions', [AdoptionController::class, 'import']);
        
    });

    //Customer
    Route::get('myprofile/', [CustomerController::class, 'myprofile']);
    Route::put('myprofile/{id}', [CustomerController::class, 'updatemyprofile']);

    Route::get('myadoptions/', [CustomerController::class, 'myadoptions']);
    Route::get('myadoptions/{id}', [CustomerController::class, 'showadoptions']);

    Route::get('makeadoption/', [CustomerController::class, 'listpets']);
    Route::get('makeadoption/{id}', [CustomerController::class, 'confirmadoption']);
    Route::post('makeadoption/{id}', [CustomerController::class, 'makeadoption']);
    Route::post('search/makeadoption', [CustomerController::class, 'search']);




});

Route::get('show/users', function() {
    $users = App\Models\User::all();
    dd($users->toArray());
});

Route::get('challenge', function () {
    $users = \App\Models\User::take(20)->get();
    
    $html = '<table border="1" style="border-collapse: collapse; width: 50%; justify-content: center; margin: auto;">
        <tr style="background-color: #f2f2f2;">
            <th>ID</th>
            <th>Photo</th>
            <th>Full Name</th>
            <th>Age</th>
            <th>Created</th>
        </tr>';
    
    foreach ($users as $user) {
        $html .= '<tr>
            <td style="text-align: center;">' . $user->id . '</td>
            <td style="text-align: center;"><img src="' . $user->photo . '" width="50"></td>
            <td style="padding: 10px;">' . $user->fullname . '</td>
            <td style="text-align: center;">' . \Carbon\Carbon::parse($user->birthdate)->age . '</td>
            <td style="padding: 10px;">' . $user->created_at->diffForHumans() . '</td>
        </tr>';
    }
    
    $html .= '</table>';
    
    return $html;
});
Route::get('show/pets', function() {
    $pets = App\Models\Pet::all();
    dd($pets->toArray()); // Dump and Die
});
Route::get('view/pet/{id}', function($id) {
    $pets = App\Models\Pet::find($id);
    return view('view-pet')->with('pet', $pets);
    // dd($pets->toArray()); // Buscar por ID
});
Route::get('view/pets', function() {
    $pets = Pet::paginate(10);
    return view('view-pets')->with('pets', $pets);
});

require __DIR__.'/auth.php';