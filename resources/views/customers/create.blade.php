@extends('layouts.app')

@section('title', 'Thêm khách hàng')

@section('content')

<div class="content-header">

    <h2>Thêm khách hàng</h2>

    <p>
        Nhập thông tin khách hàng mới
    </p>

</div>


<div class="card shadow-sm">

    <div class="card-body p-4">

        <form
            action="{{ route('customers.store') }}"
            method="POST"
        >

            @csrf


            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Họ và tên
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Nguyễn Văn A"
                    >

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Số điện thoại
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        class="form-control @error('phone') is-invalid @enderror"
                        placeholder="0901234567"
                    >

                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="email@example.com"
                    >

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        CCCD / CMND
                    </label>

                    <input
                        type="text"
                        name="identity_card"
                        value="{{ old('identity_card') }}"
                        class="form-control @error('identity_card') is-invalid @enderror"
                        placeholder="012345678901"
                    >

                    @error('identity_card')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Địa chỉ
                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="form-control @error('address') is-invalid @enderror"
                    placeholder="Nhập địa chỉ khách hàng..."
                >{{ old('address') }}</textarea>

                @error('address')
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
                    <i class="bi bi-check-lg me-1"></i>
                    Lưu khách hàng
                </button>

                <a
                    href="{{ route('customers.index') }}"
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