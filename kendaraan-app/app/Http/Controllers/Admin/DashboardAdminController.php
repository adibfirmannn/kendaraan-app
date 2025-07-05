<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Vehicle;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'vehicle', 'driver', 'approver1', 'approver2'])->get();

        // Data untuk chart: jumlah booking per kendaraan
        $vehicles = Vehicle::all();
        $labels = $vehicles->pluck('name');
        $data = $vehicles->map(function($vehicle) {
            return $vehicle->bookings()->count();
        });

        $chart = (new LarapexChart)->setType('bar')
            ->setTitle('Vehicle Usage')
            ->setFontFamily('Arial')
            ->setXAxis($labels->toArray())
            ->setDataset([
                [
                    'name' => 'Total Booking',
                    'data' => $data->toArray()
                ]
            ]);

        return view('app.admin.dashboard', compact('bookings', 'chart'));
    }
}
