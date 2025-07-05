<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking::with('vehicle', 'driver', 'approver1', 'approver2', 'user')
            ->get()
            ->map(function ($booking) {
                return [
                    'Admin Name' => $booking->user->name ?? '-',
                    'Vehicle Name' => $booking->vehicle->name ?? '-',
                    'Driver Name' => $booking->driver->name ?? '-',
                    'Approver Name 1' => $booking->approver1->name ?? '-',
                    'Approver Name 2' => $booking->approver2->name ?? '-',
                    'Start Time' => $booking->start_time,
                    'End Time' => $booking->end_time,
                    'Status' => $booking->status,
                ];
            });
    }
}
