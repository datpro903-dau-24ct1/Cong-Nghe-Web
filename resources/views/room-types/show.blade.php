@extends('layouts.app')

@section('title', 'Chi tiết loại phòng')

@section('content')

<div class="content-header">
    <h2>Chi tiết loại phòng</h2>

    <p>
        Thông tin chi tiết của loại phòng
    </p>
</div>

<div class="card shadow-sm">

    <div class="card-body p-4">

        <div class="row">

            <div class="col-md-8">

                <h3 class="mb-4">
                    {{ $roomType->name }}
                </h3>

                <div class="mb-3">
                    <strong>Mô tả:</strong>

                    <div class="text-muted mt-1">
                        {{ $roomType->description ?: 'Chưa có mô tả' }}
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Sức chứa:</strong>
                    {{ $roomType->capacity }} người
                </div>

                <div class="mb-3">
                    <strong>Số phòng thuộc loại này:</strong>
                    {{ $roomType->rooms()->count() }}
                </div>

            </div>

            <div class="col-md-4">

                <div
                    class="rounded-3 p-4"
                    style="background: #111; color: white;"
                >

                    <div class="text-secondary mb-2">
                        Giá phòng / đêm
                    </div>

                    <div
                        class="fs-3 fw-bold"
                        style="color: #d4af37;"
                    >
                        {{ number_format($roomType->price, 0, ',', '.') }} ₫
                    </div>

                </div>

            </div>

        </div>

        <hr>

        <div class="d-flex gap-2">

            <a
                href="{{ route('room-types.edit', $roomType) }}"
                class="btn btn-gold"
            >
                <i class="bi bi-pencil me-1"></i>
                Sửa
            </a>

            <a
                href="{{ route('room-types.index') }}"
                class="btn btn-dark"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Quay lại
            </a>

        </div>

    </div>

</div>

@endsection