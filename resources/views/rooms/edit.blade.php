@extends('layouts.app')

@section('title', 'Sửa phòng')

@section('content')

<div class="content-header">

    <h2>Sửa phòng</h2>

    <p>
        Cập nhật thông tin phòng
    </p>

</div>


<div class="card shadow-sm">

    <div class="card-body p-4">

        <form
            action="{{ route('rooms.update', $room) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="row">


                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Loại phòng
                    </label>

                    <select
                        name="room_type_id"
                        class="form-select @error('room_type_id') is-invalid @enderror"
                    >

                        @foreach($roomTypes as $roomType)

                            <option
                                value="{{ $roomType->id }}"
                                {{ old('room_type_id', $room->room_type_id) == $roomType->id ? 'selected' : '' }}
                            >
                                {{ $roomType->name }}
                                -
                                {{ number_format($roomType->price, 0, ',', '.') }} ₫
                            </option>

                        @endforeach

                    </select>

                    @error('room_type_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Số phòng
                    </label>

                    <input
                        type="text"
                        name="room_number"
                        value="{{ old('room_number', $room->room_number) }}"
                        class="form-control @error('room_number') is-invalid @enderror"
                    >

                    @error('room_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Trạng thái
                </label>

                <select
                    name="status"
                    class="form-select @error('status') is-invalid @enderror"
                >

                    <option
                        value="available"
                        {{ old('status', $room->status) === 'available' ? 'selected' : '' }}
                    >
                        Phòng trống
                    </option>

                    <option
                        value="occupied"
                        {{ old('status', $room->status) === 'occupied' ? 'selected' : '' }}
                    >
                        Đang sử dụng
                    </option>

                    <option
                        value="maintenance"
                        {{ old('status', $room->status) === 'maintenance' ? 'selected' : '' }}
                    >
                        Bảo trì
                    </option>

                </select>

                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-gold"
                >
                    <i class="bi bi-save me-1"></i>
                    Cập nhật
                </button>

                <a
                    href="{{ route('rooms.index') }}"
                    class="btn btn-dark"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Quay lại
                </a>

            </div>

        </form>

    </div>

</div>

@endsection