<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
</head>
<body>

    <h1>Your Cart</h1>

    <a href="/">
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

            <a href="/cart/remove/{{ $cart->id }}">
                Remove
            </a>

        </div>

        <hr>

    @endforeach

    <h2>
        Total:
        Rp {{ number_format($total) }}
    </h2>

</body>
</html>