@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row my-3 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Booking Vehicle</h5>
                        <form method="POST" action="{{ route('admin.booking.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="vehicle_id" class="form-label">Vehicle Name</label>
                                <select class="form-select @error('vehicle_id') is-invalid @enderror" id="vehicle_id" name="vehicle_id" required>
                                    <option value="">Pilih Kendaraan</option>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                    @endforeach
                                </select>
                                @error('vehicle_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="driver_id" class="form-label">Driver Name</label>
                                <select class="form-select @error('driver_id') is-invalid @enderror" id="driver_id" name="driver_id" required>
                                    <option value="">Pilih Supir</option>
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                    @endforeach
                                </select>
                                @error('driver_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="approver_lvl_1" class="form-label">Approver Lvl 1</label>
                                <select class="form-select @error('approver_lvl_1') is-invalid @enderror" id="approver_lvl_1" name="approver_lvl_1" required>
                                    <option value="">Pilih Approver 1</option>
                                    @foreach ($approvers as $approver)
                                        <option value="{{ $approver->id }}">{{ $approver->name }}</option>
                                    @endforeach
                                </select>
                                @error('approver_lvl_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="approver_lvl_2" class="form-label">Approver Lvl 2</label>
                                <select class="form-select @error('approver_lvl_2') is-invalid @enderror" id="approver_lvl_2" name="approver_lvl_2" required>
                                    <option value="">Pilih Approver 2</option>
                                    @foreach ($approvers as $approver)
                                        <option value="{{ $approver->id }}">{{ $approver->name }}</option>
                                    @endforeach
                                </select>
                                @error('approver_lvl_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="start_time" class="form-label">Start Time</label>
                                <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                                @error('start_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="end_time" class="form-label">End Time</label>
                                <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
                                @error('end_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">
                                    Back
                                </a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
