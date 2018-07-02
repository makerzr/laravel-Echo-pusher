<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
\Illuminate\Support\Facades\Auth::loginUsingId(5);
Route::get('/order', function () {
    $order = \App\Order::find(2);
    //触发事件的2个方式
    //\App\Events\OrderUpdated::dispatch();
    event(new \App\Events\OrderUpdated($order));
});

//Route::get('/tasks',function (){
//    return \App\Task::all()->pluck('body');
//});
//
//Route::post('/tasks',function (){
//   $task = \App\Task::forceCreate(['body'=>request('body')]);
//   event(new \App\Events\TaskCreated($task));
//});
//新的路由
Route::get('projects/{projectId}', function ($project) {
    $project = \App\Project::find($project);
    return view('projects.show', compact('project'));
});
Route::get('/api/projects/{projectId}/tasks', function ($project) {
    $project = \App\Project::find($project);
    return $project->tasks->pluck('body');
});

Route::post('/api/projects/{projectId}/tasks', function ($project) {
    $project = \App\Project::find($project);
    $task = $project->tasks()->create(['body' => request('body')]);
    event(new \App\Events\TaskCreated($task));
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

//Route::get('/', function (\App\Billing\Stripe $stripe) {
//    dd($stripe->charge());
//});

Route::get('/', function () {
//    $post = \App\Post::find(10);
//    $comment = $post->comments()->create(['user_id' => \Auth::id(), 'body' => 'use trait']);
//    return $comment;
//    $user = \Illuminate\Support\Facades\Auth::user();
//    $userRecord = $user->records;
//    return $userRecord;
    $post = \App\Post::create([
        'user_id' => 5,
        'title'   => '测试的文章标题',
        'body'    => '测试的内容信息',
    ]);
    return $post;
});