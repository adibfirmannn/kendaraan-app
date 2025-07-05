@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md">
                {!! $chart->container() !!}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md text-start">
                <a href="{{ route('admin.booking.export') }}">
                    <button class="btn btn-success">Export Excel</button>
                </a>
            </div>
            <div class="col-md text-end">
                <a href="{{ route('admin.booking') }}">
                    <button class="btn btn-primary">Booking</button>
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Admin Name</th>
                            <th scope="col">Vehicle Name</th>
                            <th scope="col">Driver Name</th>
                            <th scope="col">Approver Name 1</th>
                            <th scope="col">Approver Name 2</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $i => $booking)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $booking->user->name ?? '-' }}</td>
                                <td>{{ $booking->vehicle->name ?? '-' }}</td>
                                <td>{{ $booking->driver->name ?? '-' }}</td>
                                <td>{{ $booking->approver1->name ?? '-' }}</td>
                                <td>{{ $booking->approver2->name ?? '-' }}</td>
                                <td>{{ $booking->start_time }}</td>
                                <td>{{ $booking->end_time }}</td>
                                <td>{{ $booking->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $chart->script() }}
@endpush
