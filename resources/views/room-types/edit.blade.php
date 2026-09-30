@extends('layouts.app')

@section('title', 'Sửa loại phòng')

@section('content')

<div class="content-header">
    <h2>Sửa loại phòng</h2>

    <p>
        Cập nhật thông tin loại phòng
    </p>
</div>

<div class="card shadow-sm">

    <div class="card-body p-4">

        <form
            action="{{ route('room-types.update', $roomType) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="form-label">
                    Tên loại phòng
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $roomType->name) }}"
                    class="form-control @error('name') is-invalid @enderror"
                >

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Giá phòng / đêm
                    </label>

                    <div class="input-group">

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price', $roomType->price) }}"
                            min="0"
                            step="1000"
                            class="form-control @error('price') is-invalid @enderror"
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
                            value="{{ old('capacity', $roomType->capacity) }}"
                            min="1"
                            class="form-control @error('capacity') is-invalid @enderror"
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

            <div class="mb-4">

                <label class="form-label">
                    Mô tả
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="form-control @error('description') is-invalid @enderror"
                >{{ old('description', $roomType->description) }}</textarea>

                @error('description')
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