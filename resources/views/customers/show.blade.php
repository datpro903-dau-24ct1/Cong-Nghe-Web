@extends('layouts.app')

@section('title', 'Chi tiết khách hàng')

@section('content')

<div class="content-header">

    <h2>Chi tiết khách hàng</h2>

    <p>
        Thông tin khách hàng
    </p>

</div>


<div class="card shadow-sm">

    <div class="card-body p-4">

        <div class="row g-4">

            <div class="col-md-8">

                <h3 class="mb-4">
                    {{ $customer->name }}
                </h3>


                <div class="mb-3">

                    <strong>
                        <i class="bi bi-telephone me-1"></i>
                        Số điện thoại:
                    </strong>

                    {{ $customer->phone }}

                </div>


                <div class="mb-3">

                    <strong>
                        <i class="bi bi-envelope me-1"></i>
                        Email:
                    </strong>

                    {{ $customer->email ?: 'Chưa cập nhật' }}

                </div>


                <div class="mb-3">

                    <strong>
                        CCCD / CMND:
                    </strong>

                    {{ $customer->identity_card ?: 'Chưa cập nhật' }}

                </div>


                <div class="mb-3">

                    <strong>
                        <i class="bi bi-geo-alt me-1"></i>
                        Địa chỉ:
                    </strong>

                    <div class="text-muted mt-1">
                        {{ $customer->address ?: 'Chưa cập nhật' }}
                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div
                    class="rounded-3 p-4"
                    style="background: #111; color: white;"
                >

                    <div class="text-secondary mb-2">
                        Số lượt đặt phòng
                    </div>

                    <div
                        class="fs-2 fw-bold"
                        style="color: #d4af37;"
                    >
                        {{ $customer->bookings->count() }}
                    </div>

                    <hr style="border-color: #333;">

                    <div class="text-secondary">
                        Khách hàng
                    </div>

                    <div class="mt-2">
                        {{ $customer->name }}
                    </div>

                </div>

            </div>

        </div>


        @if($customer->bookings->count() > 0)

            <hr class="my-4">

            <h5 class="mb-3">
                Lịch sử đặt phòng
            </h5>

            <div class="table-responsive">

                <table class="table">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Trạng thái</th>
                            <th>Tổng tiền</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($customer->bookings as $booking)

                            <tr>

                                <td>
                                    #{{ $booking->id }}
                                </td>

                                <td>
                                    {{ $booking->check_in->format('d/m/Y') }}
                                </td>

                                <td>
                                    {{ $booking->check_out->format('d/m/Y') }}
                                </td>

                                <td>
                                    {{ $booking->status }}
                                </td>

                                <td>
                                    {{ number_format($booking->total_amount, 0, ',', '.') }} ₫
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif


        <hr>


        <div class="d-flex gap-2">

            <a
                href="{{ route('customers.edit', $customer) }}"
                class="btn btn-gold"
            >
                <i class="bi bi-pencil me-1"></i>
                Sửa
            </a>

            <a
                href="{{ route('customers.index') }}"
                class="btn btn-dark"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Quay lại
            </a>

        </div>

    </div>

</div>

@endsection