<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
</head>
<body>

    <h1>Your Cart</h1>

    <a href="/products">
        Back To Shop
    </a>

    <hr>

    @php
        $total = 0;
    @endphp

    @foreach ($carts as $cart)

        @php
            $subtotal = $cart->product->price * $cart->quantity;
            $total += $subtotal;
        @endphp

        <div>

            <h3>
                {{ $cart->product->name }}
            </h3>

            <p>
                Quantity:
                {{ $cart->quantity }}
            </p>

            <p>
                Price:
                Rp {{ number_format($cart->product->price) }}
            </p>

            <p>
                Subtotal:
                Rp {{ number_format($subtotal) }}
            </p>

            <form action="/cart/add/{{ $cart->product->id }}" method="POST">
                @csrf

                <button type="submit">
                    +
                </button>
            </form>

            <form action="/cart/remove/{{ $cart->id }}" method="POST">
                @csrf

                <button type="submit">
                    -
                </button>
            </form>

        </div>

        <hr>

    @endforeach

    <h2>
        Total:
        Rp {{ number_format($total) }}
    </h2>

</body>
</html>