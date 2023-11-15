<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\User;
use App\Exports\ChartDataExport;
use Maatwebsite\Excel\Facades\Excel;
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
        $data['kendaraan'] = Submission::where('status', 'approved_level_2')
            ->pluck('kendaraan')
            ->toArray();
        $counts = array_count_values($data['kendaraan']);
        $data['chartData'] = [
            'labels' => array_keys($counts),
            'datasets' => [
                [
                    'data' => array_values($counts),
                    'backgroundColor' => '#007bff',
                ],
            ],
        ];

        // dd($data['supervisors']);
        return view('dashboardAdmin', $data);
    }

    public function downloadExcel()
    {
        $data['kendaraan'] = Submission::where('status', 'approved_level_2')
            ->pluck('kendaraan')
            ->toArray();

        $counts = array_count_values($data['kendaraan']);
        $chartData = [
            ['Kendaraan', 'Jumlah'],
            ...array_map(fn ($k, $v) => [$k, $v], array_keys($counts), $counts),
        ];

        $fileName = 'chart_data_' . now()->format('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(new ChartDataExport($chartData), $fileName);
    }


    // public function order()
    // {

    //     return view('order', $data);
    // }
}
