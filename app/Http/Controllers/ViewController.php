<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Submission;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        // dd([$_POST]);
        // dd([$_GET]);
        $submissionId = $request->query('submission_id');
        $data['submissions'] = Submission::find($submissionId);
        $data['supervisors_1'] = User::whereIn('id', $data['submissions']->pluck('supervisor_id')->toArray())
            ->select('id', 'name')
            ->get();
        $data['users'] = User::whereIn('id', $data['submissions']->pluck('user_id')->toArray())
            ->select('id', 'name')
            ->get();
        $data['supervisors_2'] = User::whereIn('id', $data['submissions']->pluck('supervisor_id_2')->toArray())
            ->select('id', 'name')
            ->get();
        $data['pemesan'] = User::whereIn('id', $data['submissions']->pluck('user_id')->toArray())
            ->select('id', 'name')
            ->get();
        $data['drivers'] = User::whereIn('id', $data['submissions']->pluck('driver_id')->toArray())
            ->select('id', 'name')
            ->get();

        // Melakukan sesuatu dengan data submission...

        return view('action', $data);
    }

    public function first_approve(Request $request, Submission $submission)
    {
        $submissionId = $request->input('submission_id');

        $submission = Submission::find($submissionId);
        if ($request->supervisor_id == auth()->user()->id) {
            $submission->update([
                'destination' => $request->destination,
                'user_id' => $request->user_id,
                'driver_id' => $request->driver_id,
                'supervisor_id' => $request->supervisor_id,
                'supervisor_id_2' => $request->supervisor_id_2,
                'kendaraan' => $request->kendaraan,
                'description' => $request->description,
                'status' => 'approved_level_1'
            ]);
        } else {
            $submission->update([
                'destination' => $request->destination,
                'user_id' => $request->user_id,
                'driver_id' => $request->driver_id,
                'supervisor_id' => $request->supervisor_id,
                'supervisor_id_2' => $request->supervisor_id_2,
                'kendaraan' => $request->kendaraan,
                'description' => $request->description,
                'status' => 'approved_level_2'
            ]);
        }
        return redirect('/dashboard');
        // dd($request->all());
    }
}
