@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="content-header">

    <h2>
        Dashboard
    </h2>

    <p>
        Tổng quan hoạt động của khách sạn
    </p>

</div>

<div class="row g-4">

    {{-- Tổng phòng --}}
    <div class="col-md-3">

        <div class="card dashboard-card shadow-sm">

            <div class="card-body">

                <div class="text-muted">
                    Tổng số phòng
                </div>

                <div class="stat-number">
                    {{ $totalRooms }}
                </div>

                <div class="small text-muted">
                    Tất cả phòng
                </div>

            </div>

        </div>

    </div>

    {{-- Phòng trống --}}
    <div class="col-md-3">

        <div class="card dashboard-card shadow-sm">

            <div class="card-body">

                <div class="text-muted">
                    Phòng trống
                </div>

                <div class="stat-number text-success">
                    {{ $availableRooms }}
                </div>

                <div class="small text-muted">
                    Có thể đặt
                </div>

            </div>

        </div>

    </div>

    {{-- Phòng đang sử dụng --}}
    <div class="col-md-3">

        <div class="card dashboard-card shadow-sm">

            <div class="card-body">

                <div class="text-muted">
                    Đang sử dụng
                </div>

                <div class="stat-number text-danger">
                    {{ $occupiedRooms }}
                </div>

                <div class="small text-muted">
                    Khách đang ở
                </div>

            </div>

        </div>

    </div>

    {{-- Bảo trì --}}
    <div class="col-md-3">

        <div class="card dashboard-card shadow-sm">

            <div class="card-body">

                <div class="text-muted">
                    Đang bảo trì
                </div>

                <div class="stat-number text-warning">
                    {{ $maintenanceRooms }}
                </div>

                <div class="small text-muted">
                    Không sử dụng
                </div>

            </div>

        </div>

    </div>

</div>


<div class="row g-4 mt-1">

    {{-- Khách hàng --}}
    <div class="col-md-4">

        <div class="card dashboard-card shadow-sm">

            <div class="card-body">

                <div class="text-muted">
                    Khách hàng
                </div>

                <div class="stat-number">
                    {{ $totalCustomers }}
                </div>

            </div>

        </div>

    </div>

    {{-- Booking --}}
    <div class="col-md-4">

        <div class="card dashboard-card shadow-sm">

            <div class="card-body">

                <div class="text-muted">
                    Đặt phòng
                </div>

                <div class="stat-number">
                    {{ $totalBookings }}
                </div>

            </div>

        </div>

    </div>

    {{-- Dịch vụ --}}
    <div class="col-md-4">

        <div class="card dashboard-card shadow-sm">

            <div class="card-body">

                <div class="text-muted">
                    Dịch vụ
                </div>

                <div class="stat-number">
                    {{ $totalServices }}
                </div>

            </div>

        </div>

    </div>

</div>


<div class="row g-4 mt-1">

    {{-- Doanh thu --}}
    <div class="col-md-5">

        <div class="card dashboard-card shadow-sm">

            <div class="card-body">

                <h5>
                    Doanh thu
                </h5>

                <div class="display-6 fw-bold text-success">

                    {{ number_format($revenue, 0, ',', '.') }}

                    ₫

                </div>

                <p class="text-muted mb-0">
                    Tổng doanh thu từ các booking
                </p>

            </div>

        </div>

    </div>


    {{-- Booking gần đây --}}
    <div class="col-md-7">

        <div class="card dashboard-card shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <h5>
                        Booking gần đây
                    </h5>

                    <a
                        href="{{ route('bookings.index') }}"
                        class="btn btn-sm btn-outline-primary"
                    >
                        Xem tất cả
                    </a>

                </div>

                <div class="table-responsive mt-3">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th>
                                    ID
                                </th>

                                <th>
                                    Khách hàng
                                </th>

                                <th>
                                    Check-in
                                </th>

                                <th>
                                    Trạng thái
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($recentBookings as $booking)

                                <tr>

                                    <td>
                                        #{{ $booking->id }}
                                    </td>

                                    <td>
                                        {{ $booking->customer->name }}
                                    </td>

                                    <td>
                                        {{ $booking->check_in->format('d/m/Y') }}
                                    </td>

                                    <td>

                                        @if($booking->status === 'pending')

                                            <span class="badge bg-secondary">
                                                Chờ xác nhận
                                            </span>

                                        @elseif($booking->status === 'confirmed')

                                            <span class="badge bg-primary">
                                                Đã xác nhận
                                            </span>

                                        @elseif($booking->status === 'checked_in')

                                            <span class="badge bg-success">
                                                Đang ở
                                            </span>

                                        @elseif($booking->status === 'checked_out')

                                            <span class="badge bg-dark">
                                                Đã trả phòng
                                            </span>

                                        @else

                                            <span class="badge bg-danger">
                                                Đã hủy
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="4"
                                        class="text-center text-muted"
                                    >
                                        Chưa có booking
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection