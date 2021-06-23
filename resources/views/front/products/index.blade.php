<x-front-layout>
<form action="{{ URL::current() }}" method="get">
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            <div class="ps-product-action">
                <div class="ps-product__filter">
                    <select class="ps-select selectpicker" name="sort">
                        <option value="">Shortby</option>
                        <option value="name">Name</option>
                        <option value="price-low">Price (Low to High)</option>
                        <option value="price-high">Price (High to Low)</option>
                    </select>
                </div>
                <div class="ps-pagination">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="ps-product__columns">
                @foreach ($products as $product)
                <div class="ps-product__column">
                    <div class="ps-shoe mb-30">
                        <div class="ps-shoe__thumbnail">
                            <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                            <img src="{{ $product->image_path }}" alt="">
                            <a class="ps-shoe__overlay" href="{{ route('show', $product->id) }}"></a>
                        </div>
                        <div class="ps-shoe__content">
                            <div class="ps-shoe__variants">
                                <div class="ps-shoe__variant normal">
                                    @foreach ($product->images as $image)
                                    <img src="{{ $image->image_path }}" alt="">
                                    @endforeach
                                </div>
                                <select class="ps-rating ps-shoe__rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select>
                            </div>
                            <div class="ps-shoe__detail">
                                <a class="ps-shoe__name" href="{{ route('show', $product->id) }}">{{ $product->name }}</a>
                                <p class="ps-shoe__categories"><a href="#">{{ $product->category->name }}</a></p>
                                <span class="ps-shoe__price"> £ {{ $product->price }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="ps-product-action">
                <div class="ps-product__filter">
                    <select class="ps-select selectpicker">
                        <option value="1">Shortby</option>
                        <option value="2">Name</option>
                        <option value="3">Price (Low to High)</option>
                        <option value="3">Price (High to Low)</option>
                    </select>
                </div>
                <div class="ps-pagination">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ps-sidebar" data-mh="product-listing">
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Category</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        @foreach ($categories as $category)
                        <li><input type="checkbox" name="category[]" value="{{ $category->id }}"> {{ $category->name }} ({{ $category->products_count }})</li>
                        @endforeach
                    </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--filter">
                <div class="ps-widget__header">
                    <h3>Category</h3>
                </div>
                <div class="ps-widget__content">
                    <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
                    <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p>
                    <button type="submit" class="ac-slider__filter ps-btn" href="#">Filter</button>
                    <input type="text" name="min_price" value="">
                    <input type="text" name="max_price" value="">
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Sky Brand</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li class="current"><a href="product-listing.html">Nike(521)</a></li>
                        <li><a href="product-listing.html">Adidas(76)</a></li>
                        <li><a href="product-listing.html">Baseball(69)</a></li>
                        <li><a href="product-listing.html">Gucci(36)</a></li>
                        <li><a href="product-listing.html">Dior(108)</a></li>
                        <li><a href="product-listing.html">B&G(108)</a></li>
                        <li><a href="product-listing.html">Louis Vuiton(47)</a></li>
                    </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Width</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li class="current"><a href="product-listing.html">Narrow</a></li>
                        <li><a href="product-listing.html">Regular</a></li>
                        <li><a href="product-listing.html">Wide</a></li>
                        <li><a href="product-listing.html">Extra Wide</a></li>
                    </ul>
                </div>
            </aside>
            <div class="ps-sticky desktop">
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Size</h3>
                    </div>
                    <div class="ps-widget__content">
                        <table class="table ps-table--size">
                            <tbody>
                                <tr>
                                    <td class="active">3</td>
                                    <td>5.5</td>
                                    <td>8</td>
                                    <td>10.5</td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <td>3.5</td>
                                    <td>6</td>
                                    <td>8.5</td>
                                    <td>11</td>
                                    <td>13.5</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>6.5</td>
                                    <td>9</td>
                                    <td>11.5</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>4.5</td>
                                    <td>7</td>
                                    <td>9.5</td>
                                    <td>12</td>
                                    <td>14.5</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>7.5</td>
                                    <td>10</td>
                                    <td>12.5</td>
                                    <td>15</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Color</h3>
                    </div>
                    <div class="ps-widget__content">
                        <ul class="ps-list--color">
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
            <!--aside.ps-widget--sidebar-->
            <!--    .ps-widget__header: h3 Ads Banner-->
            <!--    .ps-widget__content-->
            <!--        a(href='product-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
            <!---->
            <!--aside.ps-widget--sidebar-->
            <!--    .ps-widget__header: h3 Best Seller-->
            <!--    .ps-widget__content-->
            <!--        - for (var i = 0; i < 3; i ++)-->
            <!--            .ps-shoe--sidebar-->
            <!--                .ps-shoe__thumbnail-->
            <!--                    a(href='#')-->
            <!--                    img(src="images/shoe/sidebar/"+(i+1)+".jpg" alt="")-->
            <!--                .ps-shoe__content-->
            <!--                    if i == 1-->
            <!--                        a(href='#').ps-shoe__title Nike Flight Bonafide-->
            <!--                    else if i == 2-->
            <!--                        a(href='#').ps-shoe__title Nike Sock Dart QS-->
            <!--                    else-->
            <!--                        a(href='#').ps-shoe__title Men's Sky-->
            <!--                    p <del> £253.00</del> £152.00-->
            <!--                    a(href='#').ps-btn PURCHASE-->
        </div>
    </div>
</form>

</x-front-layout>