<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // GET /api/jobs
    public function index()
    {
        return response()->json(Job::all());
    }

    // GET /api/jobs/{id}
    public function show($id)
    {
        $job = Job::find($id);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }
        return response()->json($job);
    }

    // POST /api/jobs
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'in:Open,Closed'
        ]);

        $job = Job::create($request->all());

        return response()->json($job, 201);
    }

    // PUT /api/jobs/{id}
    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        $job->update($request->all());

        return response()->json($job);
    }

    // DELETE /api/jobs/{id}
    public function destroy($id)
    {
        $job = Job::find($id);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        $job->delete();

        return response()->json(['message' => 'Job deleted successfully']);
    }
}

