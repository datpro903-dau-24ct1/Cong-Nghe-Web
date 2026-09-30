@extends('layouts.app')

@section('title', 'Phòng')

@section('content')

<div class="content-header d-flex justify-content-between align-items-center">

    <div>
        <h2>Phòng</h2>

        <p>
            Quản lý tất cả phòng của khách sạn
        </p>
    </div>

    <a
        href="{{ route('rooms.create') }}"
        class="btn btn-gold"
    >
        <i class="bi bi-plus-lg me-1"></i>
        Thêm phòng
    </a>

</div>


<div class="card shadow-sm">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Số phòng</th>
                        <th>Loại phòng</th>
                        <th>Giá / đêm</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($rooms as $room)

                        <tr>

                            <td>
                                <strong>
                                    #{{ $room->id }}
                                </strong>
                            </td>


                            <td>
                                <strong>
                                    Phòng {{ $room->room_number }}
                                </strong>
                            </td>


                            <td>
                                {{ $room->roomType->name }}
                            </td>


                            <td>
                                <strong>
                                    {{ number_format($room->roomType->price, 0, ',', '.') }} ₫
                                </strong>
                            </td>


                            <td>

                                @if($room->status === 'available')

                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Phòng trống
                                    </span>

                                @elseif($room->status === 'occupied')

                                    <span class="badge bg-danger">
                                        <i class="bi bi-person-fill me-1"></i>
                                        Đang sử dụng
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-tools me-1"></i>
                                        Bảo trì
                                    </span>

                                @endif

                            </td>


                            <td>

                                <a
                                    href="{{ route('rooms.show', $room) }}"
                                    class="btn btn-sm btn-dark"
                                    title="Xem"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>


                                <a
                                    href="{{ route('rooms.edit', $room) }}"
                                    class="btn btn-sm btn-gold"
                                    title="Sửa"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <form
                                    action="{{ route('rooms.destroy', $room) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Bạn có chắc muốn xóa phòng này?')"
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
                                    Chưa có phòng
                                </h5>

                                <p class="text-muted">
                                    Hãy thêm phòng đầu tiên.
                                </p>

                                <a
                                    href="{{ route('rooms.create') }}"
                                    class="btn btn-gold"
                                >
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Thêm phòng
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