@extends('layouts.home')
@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
@endphp

@section('title', 'Yorumlarım | '.$setting->title)
@include('home._header')
@section ('content')
    <!--/ Testimonials Star /-->
    <section class="section-testimonials section-t8 nav-arrow-a">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Yorumlarım</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="testimonial-carousel" class="owl-carousel owl-arrow">
                <div class="carousel-item-a">
                    <div class="testimonials-box">

                        <div class="row">
                            @foreach($datalist as $rs)
                            <div class="col-sm-12 col-md-6">
                                {{$rs->house->title}}
                                <div class="testimonial-img">
                                    <img src="{{ Storage::url($rs->house->image) }}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-ico">
                                    <span class="ion-ios-quote"></span>
                                </div>
                                <div class="testimonials-content">
                                    <p class="testimonial-text">
                                        {{$rs->review}}
                                        {{$rs->created_at}}
                                    </p>
                                </div>
                                <div class="testimonial-author-box">
                                    <h5 class="testimonial-author">{{$rs->subject}}</h5>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/ Testimonials End /-->

@endsection

