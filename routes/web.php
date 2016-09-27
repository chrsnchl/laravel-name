<?php

use App\Name;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    $names = Name::orderBy('created_at', 'asc')->get();

    return view('names', [
        'names' => $names
    ]);
});

/**
 * Add New Task
 */
Route::post('/name', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // Create The Task...
	$name = new Name;
    $name->name = $request->name;
    $name->save();

    return redirect('/');
});

/**
 * Delete Task
 */
Route::delete('/name/{name}', function (Name $name) {
    $name->delete();

    return redirect('/');
});
