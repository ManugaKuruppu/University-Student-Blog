<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of jobs.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Paginate jobs with 10 per page
        $jobs = Job::paginate(10);

        // Check if the request has a 'search' parameter
        if ($request->has('search')) {
            // Filter jobs based on search criteria
            $jobs = Job::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('type', 'like', '%' . $request->search . '%')
                ->orWhere('location', 'like', '%' . $request->search . '%')
                ->paginate(10);
        }

        // Return the jobs.index view with the list of jobs
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Store a newly created job in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        // Create a new job using the validated data
        $job = Job::create($validatedData);

        // Redirect to the jobs index page with a success message
        return redirect('/jobs')->with('success', 'Job posted successfully!');
    }

    /**
     * Display the specified job.
     *
     * @param Job $job
     * @return \Illuminate\View\View
     */
    public function show(Job $job)
    {
        // Return the jobs.show view with the specified job
        return view('jobs.show', compact('job'));
    }
}
