<!DOCTYPE html>
<html>

<head>
    <title>{{ $product->name }}</title>
</head>

<body>

    <a href="/">
        Back
    </a>

    <h1>
        {{ $product->name }}
    </h1>

    <img src="{{ asset('storage/' . $product->image) }}" width="300">

    <p>
        Category:
        {{ $product->category->name }}
    </p>

    <p>
        Price:
        Rp {{ number_format($product->price) }}
    </p>

    <p>
        Stock:
        {{ $product->stock }}
    </p>

    @if ($product->stock > 0)

        <form action="/cart/add/{{ $product->id }}" method="POST">
            @csrf

            <button type="submit">
                Add to Cart
            </button>
        </form>

    @else

        <button disabled>
            Out of Stock
        </button>

    @endif

    <p>
        {{ $product->description }}
    </p>

</body>