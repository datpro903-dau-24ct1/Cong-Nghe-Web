@extends('layouts.app')

@section('title', 'Loại phòng')

@section('content')

<div class="content-header d-flex justify-content-between align-items-center">

    <div>
        <h2>Loại phòng</h2>

        <p>
            Quản lý các loại phòng của khách sạn
        </p>
    </div>

    <a
        href="{{ route('room-types.create') }}"
        class="btn btn-gold"
    >
        <i class="bi bi-plus-lg me-1"></i>
        Thêm loại phòng
    </a>

</div>


<div class="card shadow-sm">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead>

                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Tên loại phòng</th>
                        <th>Mô tả</th>
                        <th>Giá / đêm</th>
                        <th>Sức chứa</th>
                        <th style="width: 180px;">Thao tác</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse($roomTypes as $roomType)

                        <tr>

                            <td>
                                <strong>
                                    #{{ $roomType->id }}
                                </strong>
                            </td>


                            <td>
                                <strong>
                                    {{ $roomType->name }}
                                </strong>
                            </td>


                            <td>
                                {{ $roomType->description ?: 'Chưa có mô tả' }}
                            </td>


                            <td>
                                <strong>
                                    {{ number_format($roomType->price, 0, ',', '.') }} ₫
                                </strong>
                            </td>


                            <td>
                                <span class="badge badge-gold">
                                    <i class="bi bi-people-fill me-1"></i>
                                    {{ $roomType->capacity }} người
                                </span>
                            </td>


                            <td>

                                <a
                                    href="{{ route('room-types.show', $roomType) }}"
                                    class="btn btn-sm btn-dark"
                                    title="Xem"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>


                                <a
                                    href="{{ route('room-types.edit', $roomType) }}"
                                    class="btn btn-sm btn-gold"
                                    title="Sửa"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <form
                                    action="{{ route('room-types.destroy', $roomType) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Bạn có chắc muốn xóa loại phòng này?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        title="Xóa"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5"
                            >

                                <i
                                    class="bi bi-door-closed"
                                    style="font-size: 50px; color: #d4af37;"
                                ></i>

                                <h5 class="mt-3">
                                    Chưa có loại phòng
                                </h5>

                                <p class="text-muted">
                                    Database hiện chưa có dữ liệu loại phòng.
                                </p>

                                <a
                                    href="{{ route('room-types.create') }}"
                                    class="btn btn-gold"
                                >
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Thêm loại phòng
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection