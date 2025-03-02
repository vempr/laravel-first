<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/jobs', function () {
    return view('jobs.index', ["jobs" => Job::with('employer')->latest()->paginate(10)]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'salary' => ['required', 'numeric', 'gt:1', 'lt:1000000000'],
        'description' => ['required', 'min:3', 'max:255'],
    ]);

    Job::create([
        'title' => request('title'),
        'description' => request('description'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    if (!$job) abort(404);

    return view('jobs.show', ["job" => $job]);
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    if (!$job) abort(404);

    return view('jobs.edit', ["job" => $job]);
});

Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'salary' => ['required', 'numeric', 'gt:1', 'lt:1000000000'],
        'description' => ['required', 'min:3', 'max:255'],
    ]);

    Job::findOrFail($id)->update([
        'title' => request('title'),
        'salary' => request('salary'),
        'description' => request('description'),
    ]);

    return redirect('/jobs/' . $id);
});

Route::delete('/jobs/{id}', function ($id) {
    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});
