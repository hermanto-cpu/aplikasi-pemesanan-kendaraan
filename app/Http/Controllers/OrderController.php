<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order()
    {
        $data['user_auth'] = Auth::user();
        // $data['user'] = User::pluck('name', 'role');
        $data['supervisor'] = User::where('role', 'supervisor')->get();
        $data['driver'] = User::where('role', 'user')->get();
        // dd($data);
        return view('order', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Submission::create([
            'destination' => $request->destination,
            'user_id' => Auth::user()->id,
            'driver_id' => $request->driver_id,
            'supervisor_id' => $request->supervisor_id,
            'supervisor_id_2' => $request->supervisor_id_2,
            'kendaraan' => $request->kendaraan,
            'description' => $request->description,
            'status' => 'pending'
        ]);
        return redirect('/dashboard')->with('success', 'Pemesanan kendaraan berhasil dibuat');
    }
}
