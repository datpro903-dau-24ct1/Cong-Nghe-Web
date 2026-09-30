@extends('layouts.app')

@section('title', 'Chi tiết phòng')

@section('content')

<div class="content-header">

    <h2>Chi tiết phòng</h2>

    <p>
        Thông tin chi tiết của phòng
    </p>

</div>


<div class="card shadow-sm">

    <div class="card-body p-4">

        <div class="row g-4">


            <div class="col-md-8">

                <div class="mb-4">

                    <div class="text-muted small">
                        Số phòng
                    </div>

                    <h2 class="mt-1">
                        Phòng {{ $room->room_number }}
                    </h2>

                </div>


                <div class="mb-4">

                    <div class="text-muted small mb-1">
                        Loại phòng
                    </div>

                    <div class="fw-semibold">
                        {{ $room->roomType->name }}
                    </div>

                </div>


                <div class="mb-4">

                    <div class="text-muted small mb-1">
                        Sức chứa
                    </div>

                    <div>
                        <i
                            class="bi bi-people-fill me-1"
                            style="color: #d4af37;"
                        ></i>

                        {{ $room->roomType->capacity }} người
                    </div>

                </div>


                <div>

                    <div class="text-muted small mb-1">
                        Giá phòng
                    </div>

                    <div class="fw-bold fs-5">

                        {{ number_format($room->roomType->price, 0, ',', '.') }}

                        ₫ / đêm

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div
                    class="rounded-3 p-4"
                    style="background: #111; color: white;"
                >

                    <div class="text-secondary mb-2">
                        Trạng thái
                    </div>


                    @if($room->status === 'available')

                        <span class="badge bg-success fs-6">
                            <i class="bi bi-check-circle me-1"></i>
                            Phòng trống
                        </span>

                    @elseif($room->status === 'occupied')

                        <span class="badge bg-danger fs-6">
                            <i class="bi bi-person-fill me-1"></i>
                            Đang sử dụng
                        </span>

                    @else

                        <span class="badge bg-warning text-dark fs-6">
                            <i class="bi bi-tools me-1"></i>
                            Bảo trì
                        </span>

                    @endif


                    <hr style="border-color: #333;">


                    <div class="text-secondary mb-2">
                        Số lần sử dụng trong đặt phòng
                    </div>

                    <div
                        class="fs-4 fw-bold"
                        style="color: #d4af37;"
                    >
                        {{ $room->bookingRooms()->count() }}
                    </div>

                </div>

            </div>

        </div>


        <hr>


        <div class="d-flex gap-2">

            <a
                href="{{ route('rooms.edit', $room) }}"
                class="btn btn-gold"
            >
                <i class="bi bi-pencil me-1"></i>
                Sửa
            </a>

            <a
                href="{{ route('rooms.index') }}"
                class="btn btn-dark"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Quay lại
            </a>

        </div>

    </div>

</div>

@endsection