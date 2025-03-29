@extends('layouts.home')


@section('title', 'Ev Kategorileri | '.$data->title)
@include('home._header')



@section('content')
    <!--/ Property Star /-->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">{{$data->title}}</h2>
                        </div>
                        <div class="title-link">

                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">
                @foreach($datalist as $rs)
                    <div class="carousel-item-b">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{ Storage::url($rs->image) }}" style="height: 400px;" alt="" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="{{route('house',['id' => $rs->id,'slug' => $rs->slug])}}">{{$rs->title}}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">₺ {{$rs->price}}</span>
                                        </div>
                                        <a href="{{route('house',['id' => $rs->id,'slug' => $rs->slug])}}" class="link-a">İncele
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Kategori</h4>
                                                <span>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Fiyat</h4>
                                                <span>₺ {{$rs->price}}</span>
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

@endsection



