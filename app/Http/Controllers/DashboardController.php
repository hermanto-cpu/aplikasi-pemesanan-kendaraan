<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['submissions'] = Submission::all();
        $data['supervisors_1'] = User::whereIn('id', $data['submissions']->pluck('supervisor_id')->toArray())
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
        // dd($data['supervisors']);
        return view('dashboardAdmin', $data);
    }

    // public function order()
    // {

    //     return view('order', $data);
    // }
}
