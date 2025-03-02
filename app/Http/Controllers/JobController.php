<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller {
    public function index() {
        return view('jobs.index', ["jobs" => Job::with('employer')->latest()->paginate(10)]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function store() {
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
    }

    public function show(Job $job) {
        return view('jobs.show', ["job" => $job]);
    }

    public function edit(Job $job) {
        return view('jobs.edit', ["job" => $job]);
    }

    public function update(Job $job) {
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'salary' => ['required', 'numeric', 'gt:1', 'lt:1000000000'],
            'description' => ['required', 'min:3', 'max:255'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
            'description' => request('description'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job) {
        $job->delete();
        return redirect('/jobs');
    }
}
