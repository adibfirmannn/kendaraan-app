<?php

namespace App\Http\Controllers\Approver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardApproverController extends Controller
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

        return view('app.approver.dashboard', compact('bookings', 'chart'));
    }

    public function approve(Request $request)
    {
        $booking = Booking::find($request->id);
        $booking->status = $request->action;
        $booking->save();
        return redirect()->back();
    }

    public function export_excel()
    {
        return Excel::download(new BookingExport, 'bookings.xlsx');
    }
}
