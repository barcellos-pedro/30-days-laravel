<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        // Avoid lazy loading and n+1
        // Eager loading on employers data
        $jobs = Job::with('employer')->latest()->simplePaginate(5);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);

    }

    public function store()
    {
        request()->validate([
            'title' => 'required|min:3',
            'salary' => 'required'
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        // authorize (on hold...)

        request()->validate([
            'title' => 'required|min:3',
            'salary' => 'required'
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect("/jobs/$job->id");
    }

    public function destroy(Job $job)
    {
        // authorize (on hold...)
        $job->delete();
        return redirect('/jobs');
    }
}

// Ways of doing Auth for edit/update

/* Auth done by Middleware (in routes) and Policy */

// if (Auth::guest()) {
//    return redirect('/login');
// }

// inline Auth without Gate
// if ($job->employer->user->isNot(Auth::user())) {
//    abort(403);
// }

// Can/cannot based on Gate (see show view)
// if (Auth::user()->cannot('edit-job', $job)) {
//    dd('failure');
// }

// Auth Gate defined in AppServiceProvider
// Gate::authorize('edit-job', $job);
