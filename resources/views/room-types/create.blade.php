@extends('layouts.app')

@section('title', 'Thêm loại phòng')

@section('content')

<div class="content-header">

    <h2>Thêm loại phòng</h2>

    <p>
        Tạo một loại phòng mới cho khách sạn
    </p>

</div>

<div class="card shadow-sm">

    <div class="card-body p-4">

        <form
            action="{{ route('room-types.store') }}"
            method="POST"
        >

            @csrf

            {{-- Tên loại phòng --}}
            <div class="mb-4">

                <label class="form-label">
                    Tên loại phòng
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Ví dụ: Phòng Standard"
                >

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Giá và sức chứa --}}
            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Giá phòng / đêm
                    </label>

                    <div class="input-group">

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price') }}"
                            min="0"
                            step="1000"
                            class="form-control @error('price') is-invalid @enderror"
                            placeholder="500000"
                        >

                        <span class="input-group-text">
                            ₫
                        </span>

                    </div>

                    @error('price')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Sức chứa
                    </label>

                    <div class="input-group">

                        <input
                            type="number"
                            name="capacity"
                            value="{{ old('capacity', 2) }}"
                            min="1"
                            class="form-control @error('capacity') is-invalid @enderror"
                            placeholder="2"
                        >

                        <span class="input-group-text">
                            người
                        </span>

                    </div>

                    @error('capacity')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- Mô tả --}}
            <div class="mb-4">

                <label class="form-label">
                    Mô tả
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Nhập thông tin mô tả về loại phòng..."
                >{{ old('description') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Nút --}}
            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-gold"
                >
                    <i class="bi bi-check-lg me-1"></i>
                    Lưu loại phòng
                </button>

                <a
                    href="{{ route('room-types.index') }}"
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