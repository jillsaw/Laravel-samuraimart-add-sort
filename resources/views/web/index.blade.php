@extends('layouts.app')

@section('content')
<div class="container pt-2">
    @if (session('flash_message'))
        <div class="row mb-2">
            <div class="col-12">
                <div class="alert alert-light">
                    {{ session('flash_message') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-2">
            @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
            @endcomponent
        </div>
        <div class="col">
            <div class="mb-4">
                <h2>おすすめ商品</h2>

                <!--カルーセル-->
                <div id="carouselExampleCaptions" class="carousel slide">
                  <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
       
                  <div class="carousel-inner">
                  @foreach ($recommend_products as $recommend_product)
                     <div class="carousel-item active">
                         <a href="{{ route('products.show', $recommend_product) }}">
                           @if ($recommend_product->image !== "")
                              <img src="{{ asset($recommend_product->image) }}" class="img-thumbnail samuraimart-product-img-recommend">
                           @else
                              <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail samuraimart-product-img-recommend">
                           @endif
                         </a>
                         <div class="carousel-caption d-none d-md-block">
                            <div class="col-12">
                                <h4 class="samuraimart-product-label mt-2">
                                  <a href="{{ route('products.show', $recommend_product) }}" class="link-dark">{{ $recommend_product->name }}</a>
                                  <br>     
                                  <label>￥{{ number_format($recommend_product->price) }}</label>
                               </h4>
                            </div>
                         </div>
                     </div>
                 @endforeach
                 </div>
                    
                 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Previous</span>
                 </button>
                 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Next</span>
                 </button>
               </div>
            
            </div>

            <div class="mb-4">
                <h2>新着商品</h2>
                <div class="row">
                    @foreach ($recently_products as $recently_product)
                        <div class="col-md-3">
                            <a href="{{ route('products.show', $recently_product) }}">
                                @if ($recently_product->image !== "")
                                    <img src="{{ asset($recently_product->image) }}" class="img-thumbnail samuraimart-product-img-products">
                                @else
                                    <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail samuraimart-product-img-products">
                                @endif
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <p class="samuraimart-product-label mt-2">
                                        <a href="{{ route('products.show', $recently_product) }}" class="link-dark">{{ $recently_product->name }}</a>
                                        <br>

                                        <!-- 平均評価の可視化 -->
                                        <span class="samuraimart-star-rating" data-rate="{{ round($recently_product->reviews->avg('score') * 2) / 2 }}">
                                        {{ round($recently_product->reviews->avg('score'), 1) }}</span><br>

                                        <label>￥{{ number_format($recently_product->price) }}</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <h2>注目商品</h2>
                <div class="row">
                    @foreach ($featured_products as $featured_product)
                        <div class="col-md-3">
                            <a href="{{ route('products.show', $featured_product) }}">
                                @if ($featured_product->image !== "")
                                    <img src="{{ asset($featured_product->image) }}" class="img-thumbnail samuraimart-product-img-products">
                                @else
                                    <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail samuraimart-product-img-products">
                                @endif
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <p class="samuraimart-product-label mt-2">
                                        <a href="{{ route('products.show', $featured_product) }}" class="link-dark">{{ $featured_product->name }}</a>
                                        <br>
                                        <label>￥{{ number_format($featured_product->price) }}</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection