<div class="card-body">
    <ul class="list-group list-group-light mb-3">
        @foreach ($content as $contents)
            <li class="list-group-item d-flex justify-content-center">
                <div>

                    <div class="d-flex align-items-center">
                        <img src="{{ asset($contents->options->image) }}" style="width: 20%" alt="{{ $contents->name }}">
                        <div class="ms-3">
                            <p class="mb-1"><span class="fw-bold ">Model:</span>
                                {{ $contents->name }}
                            </p>
                            <p class="mb-1"><span class="fw-bold ">Quantity:</span>
                                {{ $contents->qty }}</p>
                            <p class="mb-1"><span class="fw-bold ">Total Pirce:</span>
                                {{ number_format($contents->price * $contents->qty, 0, '.', ',') }}
                            </p>
                        </div>
                    </div>

                </div>
            </li>
        @endforeach
    </ul>
    
</div>

<div class="card-footer py-3">

    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
            <span class="fw-bold ">Product</span>
            <span>{{ number_format((float)str_replace(',', '', Cart::subtotal()), 0, '.', ',') }} VND</span>
        </li>
    </ul>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
            <span class="fw-bold ">Tax</span>
            <span>{{ number_format((float)str_replace(',', '', Cart::tax()), 0, '.', ',') }} VND</span>
        </li>
    </ul>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
            <span class="fw-bold ">Total amount</span>
            <span>{{ number_format((float)str_replace(',', '', Cart::total()), 0, '.', ',') }} VND</span>
        </li>
    </ul>

</div>  
