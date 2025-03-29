@extends('layouts.home')

@section('title', 'Ana Sayfa | ' . $setting->title)
@section('description')
@endsection

@include('home._header')
@include('home._slider')

@section('content')

    <!-- En Son Eklenen İlanlar -->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">En Son Eklenen İlanlar</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">
                @foreach($last as $rs)
                    <div class="carousel-item-b">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{ Storage::url($rs->image) }}" style="height: 400px;" alt="" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="{{ route('house', ['id' => $rs->id, 'slug' => $rs->slug]) }}">{{ $rs->title }}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">₺ {{ $rs->price }}</span>
                                        </div>
                                        <a href="{{ route('house', ['id' => $rs->id, 'slug' => $rs->slug]) }}" class="link-a">İncele
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Kategori</h4>
                                                <span>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category, $rs->category->title) }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Fiyat</h4>
                                                <span>₺ {{ $rs->price }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Rastgele İlanlar -->
    <section class="section-news section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Rastgele İlanlar</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="new-carousel" class="owl-carousel owl-theme">
                @foreach($picked as $rs)
                    <div class="carousel-item-c">
                        <div class="card-box-b card-shadow news-box">
                            <div class="img-box-b">
                                <img src="{{ Storage::url($rs->image) }}" style="height: 400px;" alt="" class="img-b img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-header-b">
                                    <div class="card-category-b">
                                        <a href="{{ route('house', ['id' => $rs->id, 'slug' => $rs->slug]) }}" class="category-b">
                                            {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category, $rs->category->title) }}
                                        </a>
                                    </div>
                                    <div class="card-title-b">
                                        <h2 class="title-2">
                                            <a href="{{ route('house', ['id' => $rs->id, 'slug' => $rs->slug]) }}">{{ $rs->title }}</a>
                                        </h2>
                                    </div>
                                    <div class="card-date">
                                        <span class="date-b">₺ {{ $rs->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
