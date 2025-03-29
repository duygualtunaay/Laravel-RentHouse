@extends('layouts.home')
@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
@endphp

@section('title', 'User Profile '.$setting->title)
@include('home._header')
@section('content')

    <section id="maincontent" style="padding-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">


                    <div class="clearfix">
                    </div>
                    <div class="row">
                        <div class="col-md-9">

                            <div class="card">
                                <div class="card-header">
                                    <h2>Kiralık Evler Listesi</h2>
                                    <a href="{{route('user_house_create')}}" class="btn btn-danger square-btn-adjust" style="padding: 15px 50px 5px 50px; float: right;">Kiralık Ev Ekle</a>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                            <th><b>Kategori</b></th>
                                            <th><b>Başlık</b></th>
                                            <th><b>Fotoğraf</b></th>
                                            <th><b>Fotoğraf Galerisi</b></th>
                                            <th><b>Oda Sayısı</b></th>
                                            <th><b>Metre Kare</b></th>
                                            <th><b>Fiyat</b></th>
                                            <th><b>Durum</b></th>
                                            <th><b>Düzenle</b></th>
                                            <th><b>Sil</b></th>
                                            </thead>


                                            <tbody>
                                            @foreach($datalist as $rs)
                                                <tr>
                                                    <td>
                                                        {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}
                                                    </td>
                                                    <td>
                                                        {{$rs->title}}
                                                    </td>
                                                    <td>
                                                        @if($rs->image)
                                                            <img src="{{Storage::url($rs->image)}}" height="60" width="120" alt=""/>
                                                        @endif

                                                    </td>
                                                    <td><a href="{{route('user_image_add',['house_id'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><img src="{{asset('assets/admin/images')}}/gallery.png" height="30"></a></td>
                                                    <td>
                                                        {{$rs->odasayisi}}
                                                    </td>
                                                    <td>
                                                        {{$rs->metrekare}}
                                                    </td>
                                                    <td>
                                                        {{$rs->price}} ₺
                                                    </td>
                                                    <td>
                                                        {{$rs->status}}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('user_house_edit',['id'=>$rs->id])}}"><img src="{{asset('assets/admin/images')}}/edit.png" height="30"></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('user_house_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="30"></a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <aside>
                                <div class="widget">
                                    <div class="project-widget">
                                       @include('home.user_panel')
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

