<h2 class="my-5 text-center fw-bold">Checkout</h2>

<div class="row justify-content-center align-items-center">
    <div class="col-md-6 mb-4">
        <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ Request::is('cart*') ? 'active' : '' }}" href="{{ route('ui.cart.index') }}"
                    role="tab">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 mr-2 p-2" style="font-size: 25px">
                            <span class="badge badge-primary rounded-circle">1</span>
                        </p>
                        Cart
                    </div>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link {{ Request::is('checkout/shipping-details*') ? 'active disabled' : '' }}"
                    href="{{ route('ui.checkout.shipping') }}" role="tab">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 mr-2 p-2" style="font-size: 25px">
                            <span class="badge badge-primary rounded-circle">2</span>
                        </p>
                        Shipping Details
                    </div>
                </a>

            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link {{ Request::is('checkout/payment-methods*') ? 'active disabled' : '' }}"
                    href="{{ route('ui.checkout.payment') }}" role="tab">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 mr-2 p-2" style="font-size: 25px">
                            <span class="badge badge-primary rounded-circle">3</span>
                        </p>
                        Payment Method
                    </div>
                </a>

            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link {{ Request::is('checkout/thank-you*') ? 'active disabled' : '' }}"
                    href="{{ route('ui.checkout.complete') }}" role="tab">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 mr-2 p-2" style="font-size: 25px">
                            <span class="badge badge-primary rounded-circle">4</span>
                        </p>
                        Order Success
                    </div>
                </a>

            </li>
        </ul>
    </div>
</div>
