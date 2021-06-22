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
        <h2>Products List</h2>

        <div class="row g-5">
            @foreach ($products as $product)
            <div class="col-md-3">
                <h6>{{ $product->category->name }}</h6>
                <img src="{{ $product->image_path }}" width="250" alt="">
                <h3><a href="{{ route('show', $product->id) }}">{{ $product->name }}</a></h3>
                <div>
                    {{ $product->price }}
                </div>
                <ul>
                    @foreach($product->tags as $tag)
                    <li>{{ $tag->name }}</li>
                    @endforeach
                </ul>
                
            </div>
            @endforeach
        </div>
    </div>
    
</body>
</html>