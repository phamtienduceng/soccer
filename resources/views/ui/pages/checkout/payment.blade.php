@extends('ui.layouts.app')
@section('title', 'Payment methods')

@section('content')

    <div class="mt-5">
        <main class="mt-5 pt-4">
            <div class="container">

                @include('ui.pages.checkout.stepper')

                <div class="row">
                    <div class="col-md-8 mb-4">
                        <div class="card p-4 mb-4">

                            <div class="card-header py-1">

                                @if (!session('customer_id'))
                                    <div class="nav-pills mb-3">
                                        <p class="nav-link active" aria-selected="true">
                                            Please log in to easily access your order and payment history.
                                        </p>
                                    </div>
                                @endif

                                <h5 class="card-title fw-bold text-center">Payment Method</h5>

                            </div>

                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST"
                                    action="{{ route('ui.checkout.confirm_payment') }}">
                                    @csrf

                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <div class="nav flex-column nav-pills text-center" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <a class="nav-link" id="cod-tab" data-mdb-toggle="pill" href="#cod"
                                                    role="tab" aria-controls="cod" aria-selected="true"
                                                    data-radio-id="cod-radio">
                                                    Cash on delivery (COD)
                                                </a>

                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <input type="radio" name="payment_method" id="cod-radio"
                                                        data-nav-id="cod-tab" hidden value="Cash on delivery (COD)">
                                                </div>

                                                <a class="nav-link" id="credit-tab" data-mdb-toggle="pill" href="#credit"
                                                    role="tab" aria-controls="credit" aria-selected="false"
                                                    data-radio-id="credit-radio">
                                                    Credit/Debit Card Payment
                                                </a>

                                                <div class="tab-content" id="v-pills-tabContent-2">
                                                    <div class="tab-pane fade" id="credit" role="tabpanel"
                                                        aria-labelledby="credit-tab">
                                                       
                                                    </div>
                                                    <input type="radio" name="payment_method" id="credit-radio"
                                                        data-nav-id="credit-tab" hidden value="Credit/Debit Card Payment">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-4">
                                    <button class="btn btn-warning btn-lg btn-block" type="submit">Complete your order</button>
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
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(navLink => {
        navLink.addEventListener('click', () => {
            const radioId = navLink.dataset.radioId;
            const radio = document.getElementById(radioId);
            if (radio) {
                radio.checked = true;
                const navLinks = document.querySelectorAll('.nav-link');
                navLinks.forEach(link => {
                    if (link.dataset.radioId !== radioId) {
                        const navLinkRadio = document.getElementById(link.dataset.radioId);
                        if (navLinkRadio) {
                            navLinkRadio.checked = false;
                            navLinkRadio.disabled = true;
                        }
                    } else {
                        radio.disabled = false;
                    }
                });
            }
        });
    });
</script>
@endsection
