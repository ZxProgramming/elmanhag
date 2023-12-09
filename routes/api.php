<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
$controller_path = 'App\Http\Controllers';
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/lesson_data', $controller_path . '\MaterialController@lesson_data')->name('lesson_data');
Route::post('/lesson_history_data', $controller_path . '\MaterialController@history_data')->name('history_data');
Route::post('/Teachers/teacher_lesson_data', $controller_path . '\Teacher\MaterialsController@teacher_lesson_data')->name('Tteacher_lesson_data');

Route::post('/lesson_user_data', $controller_path . '\video_editor\VideoEditorController@lesson_user_data')->name('lesson_user_data');
Route::post('/videoEditorLead/lesson_v_data', $controller_path . '\VideoLead\VideoController@lesson_v_data')->name('lesson_v_data');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});