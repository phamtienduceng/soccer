@extends('ui.layouts.app')
@section('title', 'Shipping details')

@section('content')
    <div class="mt-5">
        <main class="mt-5 pt-4">
            <div class="container">

                @include('ui.pages.checkout.stepper')

                <div class="row">
                    <div class="col-md-8 mb-4">
                        <div class="card p-4 mb-4">

                            <div class="card-header py-1">

                                @if (!session('user_id'))
                                    <div class="nav-pills mb-3">
                                        <p class="nav-link active" aria-selected="true">
                                            Please log in to easily access your order and payment history.
                                        </p>
                                    </div>
                                @endif

                                <h5 class="card-title fw-bold text-center">Shipping Details</h5>

                            </div>

                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST"
                                    action="{{ route('ui.checkout.confirm_shipping') }}">
                                    @csrf

                                    <div class="row g-3">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control @error('shipping_full_name') is-invalid @enderror md-form"
                                                    id="shipping_full_name" placeholder="First and last name"
                                                    name="shipping_full_name"
                                                    value="{{ isset($user_name) ? $user_name : old('shipping_full_name') }}"
                                                    required>
                                                <label for="shipping_full_name">First and last name</label>
                                                @error('shipping_full_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 mb-3">
                                                <div class="form-floating">
                                                    <input type="email"
                                                        class="form-control @error('shipping_email') is-invalid @enderror md-form"
                                                        id="shipping_email" placeholder="name@example.com"
                                                        name="shipping_email"
                                                        value="{{ isset($user_email) ? $user_email : old('shipping_email') }}"
                                                        required>
                                                    <label for="shipping_email">Email</label>
                                                    @error('shipping_email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-floating">
                                                    <input type="tel"
                                                        class="form-control @error('shipping_phone_number') is-invalid @enderror md-form"
                                                        id="shipping_phone_number" placeholder="0123456789"
                                                        name="shipping_phone_number"
                                                        value="{{ isset($user_phone) ? $user_phone : old('shipping_phone_number') }}"
                                                        required maxlength="10">
                                                    <label for="shipping_phone_number">Phone number</label>
                                                    @error('shipping_phone_number')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="mb-3">
                                                <div class="form-floating">
                                                    <input type="text"
                                                           class="form-control @error('shipping_address') is-invalid @enderror"
                                                           id="shipping_address"
                                                           placeholder="Address"
                                                           name="shipping_address"
                                                            value="{{ isset($user_address) ? $user_address : old('shipping_address') }}" required>
                                                           
                                                    <label for="shipping_address">Address</label>
                                                    @error('shipping_address')
        <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
    @enderror
                                                </div>
                                            </div>-->


                                        <div class="row">
                                            <div class="col-md mb-3">
                                                <div class="form-floating">
                                                    <select class="form-select md-form" id="provinceSelect"
                                                        name="shipping_province" value="{{ old('shipping_province') }}"
                                                        required>
                                                        <option selected disabled>Select province/city</option>
                                                    </select>
                                                    <label for="provinceSelect">Province/City</label>
                                                    <div class="invalid-feedback">
                                                        Please select your province/city.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md mb-3">
                                                <div class="form-floating">
                                                    <select class="form-select md-form" id="districtSelect"
                                                        name="shipping_district" value="{{ old('shipping_district') }}"
                                                        required>
                                                        <option selected disabled>Select district</option>
                                                    </select>
                                                    <label for="districtSelect">District</label>
                                                    <div class="invalid-feedback">
                                                        Please select your district.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-4">
                                    <button class="btn btn-warning btn-lg btn-block" type="submit">Continue to
                                        payment method</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="fw-bold list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Your Products Cart
                                    </li>
                                </ul>
                            </div>
                            @include('ui.pages.checkout.products')
                        </div>

                    </div>
                </div>
            </div>
        </main>

    </div>
    <script>
        const provinces = [{
                "name": "Hà Nội",
                "districts": [
                    "Ba Đình",
                    "Bắc Từ Liêm",
                    "Cầu Giấy",
                    "Đống Đa",
                    "Hai Bà Trưng",
                    "Hà Đông",
                    "Hoàn Kiếm",
                    "Hoàng Mai",
                    "Long Biên",
                    "Nam Từ Liêm",
                    "Tây Hồ",
                    "Thanh Xuân",
                ]
            },
            {
                "name": "Hồ Chí Minh",
                "districts": [
                    "Quận 1",
                    "Quận 2",
                    "Quận 3",
                    "Quận 4",
                    "Quận 5",
                    "Quận 6",
                    "Quận 7",
                    "Quận 8",
                    "Quận 9",
                    "Quận 10",
                    "Quận 11",
                    "Quận 12",
                    "Quận Bình Chánh",
                    "Quận Bình Tân",
                    "Quận Bình Thạnh",
                    "Quận Cần Giờ",
                    "Quận Củ Chi",
                    "Quận Gò Vấp",
                    "Quận Hóc Môn",
                    "Quận Nhà Bè",
                    "Quận Phú Nhuận",
                    "Quận Tân Bình",
                    "Quận Tân Phú",
                    "Quận Thủ Đức",
                ]
            }
        ];

        const provinceSelect = document.getElementById("provinceSelect");
        const districtSelect = document.getElementById("districtSelect");

        provinces.forEach((province) => {
            const option = document.createElement("option");
            option.text = province.name;
            provinceSelect.add(option);
        });

        provinceSelect.addEventListener("change", () => {
            const selectedProvince = provinceSelect.value;
            const districts = provinces.find((province) => province.name === selectedProvince).districts;

            districtSelect.innerHTML = '<option selected disabled>Select district</option>';

            districts.forEach((district) => {
                const option = document.createElement("option");
                option.text = district;
                districtSelect.add(option);
            });

            districtSelect.disabled = false;
        });
    </script>
@endsection
