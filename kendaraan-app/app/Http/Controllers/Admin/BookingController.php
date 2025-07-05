<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Booking;
use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $approvers = User::where('role', 'approver')->get();
        return view('app.admin.booking', compact('drivers', 'vehicles', 'approvers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'approver_lvl_1' => 'required|different:approver_lvl_2|exists:users,id',
            'approver_lvl_2' => 'required|different:approver_lvl_1|exists:users,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'approver_lvl_1' => $request->approver_lvl_1,
            'approver_lvl_2' => $request->approver_lvl_2,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Booking created successfully');
    }

    public function export_excel()
    {
        return Excel::download(new BookingExport, 'bookings.xlsx');
    }
}
