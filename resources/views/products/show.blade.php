<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <h5>{{ $product->category->name }}</h5>
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>

        <img src="{{ $product->image_path }}" width="250" alt="">
        <div>
            {{ $product->price }}
        </div>

        <ul>
            @foreach($product->tags as $tag)
            <li>{{ $tag->name }}</li>
            @endforeach
        </ul>

        <div class="p-5">
        <section>
                @foreach($product->reviews as $review)
                <div>
                    <h3>{{ $review->user->name }}</h3>
                    <div>{{ $review->rating }}</div>
                </div>
                @endforeach
            </section>

            <form action="{{ route('review') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" min="1" max="5" name="rating" class="form-control">
                <textarea name="review" id="" cols="30" rows="3" class="form-control"></textarea>
                <button type="submit" class="btn btn-primary">Rate!</button>
            </form>
        </div>

    </div>

    
    
</body>
</html>