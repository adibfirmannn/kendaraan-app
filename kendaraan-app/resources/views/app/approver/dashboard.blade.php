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
                <a href="{{ route('approver.booking.export') }}">
                    <button class="btn btn-success">Export Excel</button>
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
                            <th scope="col">Action</th>
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
                                <td>
                                    @php
                                        $user = auth()->user();
                                        // Approver 1: bisa approve/reject jika status masih 'pending'
                                        $canApprove1 =
                                            optional($booking->approver1)->id == $user->id &&
                                            $booking->status === 'pending';
                                        // Approver 2: bisa approve/reject jika status sudah 'approved_lvl1'
                                        $canApprove2 =
                                            optional($booking->approver2)->id == $user->id &&
                                            $booking->status === 'approved_lvl1';
                                    @endphp
                                    @if ($canApprove1)
                                        <form action="{{ route('approver.booking.approve') }}" method="POST"
                                            style="display:inline;">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $booking->id }}">
                                            <button type="submit" name="action" value="approved_lvl1"
                                                class="btn btn-success btn-sm mb-2">Approve</button>
                                            <button type="submit" name="action" value="rejected"
                                                class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    @elseif($canApprove2)
                                        <form action="{{ route('approver.booking.approve') }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $booking->id }}">
                                            <button type="submit" name="action" value="approved_lvl2"
                                                class="btn btn-success btn-sm mb-3">Approve</button>
                                            <button type="submit" name="action" value="rejected"
                                                class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    @else
                                        <span class="text-muted">Tidak ada aksi</span>
                                    @endif
                                </td>
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
