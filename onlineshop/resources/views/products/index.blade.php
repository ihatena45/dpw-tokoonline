<!DOCTYPE html>
<html>
<head>
    <title>Online Shop</title>

    <style>
        body {
            font-family: Arial;
            margin: 30px;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            width: 220px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <h1>Product Catalog</h1>

    <form method="GET">

        <input type="text"
               name="search"
               placeholder="Search product">

        <select name="category">

            <option value="">All Categories</option>

            @foreach ($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

        <button type="submit">
            Search
        </button>

    </form>

    <br>

    <div class="products">

        @foreach ($products as $product)

            <div class="card">

                <img src="{{ asset('storage/' . $product->image) }}">

                <h3>
                    {{ $product->name }}
                </h3>

                <p>
                    Category:
                    {{ $product->category->name }}
                </p>

                <p>
                    Rp {{ number_format($product->price) }}
                </p>

                <a href="/product/{{ $product->id }}">
                    Detail
                </a>

            </div>

        @endforeach

    </div>

</body>
</html>