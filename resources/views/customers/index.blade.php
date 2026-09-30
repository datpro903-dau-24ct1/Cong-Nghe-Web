@extends('layouts.app')

@section('title', 'Khách hàng')

@section('content')

<div class="content-header d-flex justify-content-between align-items-center">

    <div>
        <h2>Khách hàng</h2>

        <p>
            Quản lý thông tin khách hàng của khách sạn
        </p>
    </div>

    <a
        href="{{ route('customers.create') }}"
        class="btn btn-gold"
    >
        <i class="bi bi-plus-lg me-1"></i>
        Thêm khách hàng
    </a>

</div>


<div class="card shadow-sm">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>CCCD</th>
                        <th>Thao tác</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse($customers as $customer)

                        <tr>

                            <td>
                                <strong>
                                    #{{ $customer->id }}
                                </strong>
                            </td>


                            <td>
                                <strong>
                                    {{ $customer->name }}
                                </strong>
                            </td>


                            <td>
                                <i class="bi bi-telephone me-1"></i>
                                {{ $customer->phone }}
                            </td>


                            <td>
                                {{ $customer->email ?: '—' }}
                            </td>


                            <td>
                                {{ $customer->identity_card ?: '—' }}
                            </td>


                            <td>

                                <a
                                    href="{{ route('customers.show', $customer) }}"
                                    class="btn btn-sm btn-dark"
                                    title="Xem"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>


                                <a
                                    href="{{ route('customers.edit', $customer) }}"
                                    class="btn btn-sm btn-gold"
                                    title="Sửa"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <form
                                    action="{{ route('customers.destroy', $customer) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Bạn có chắc muốn xóa khách hàng này?')"
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
                                    class="bi bi-people"
                                    style="font-size: 50px; color: #d4af37;"
                                ></i>

                                <h5 class="mt-3">
                                    Chưa có khách hàng
                                </h5>

                                <p class="text-muted">
                                    Hãy thêm khách hàng đầu tiên.
                                </p>

                                <a
                                    href="{{ route('customers.create') }}"
                                    class="btn btn-gold"
                                >
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Thêm khách hàng
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