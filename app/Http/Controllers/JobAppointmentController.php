<?php

// app/Http/Controllers/JobAppointmentController.php
namespace App\Http\Controllers;

use App\Models\JobAppointment;
use Illuminate\Http\Request;

class JobAppointmentController extends Controller
{
    public function index()
    {
        return response()->json(JobAppointment::all());
    }

    public function store(Request $request)
    {
        $appointment = JobAppointment::create($request->all());
        return response()->json($appointment, 201);
    }

    public function show($id)
    {
        $appointment = JobAppointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
        return response()->json($appointment);
    }

    public function update(Request $request, $id)
    {
        $appointment = JobAppointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
        $appointment->update($request->all());
        return response()->json($appointment);
    }

    public function destroy($id)
    {
        $appointment = JobAppointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
        $appointment->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
