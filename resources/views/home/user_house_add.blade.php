@extends('layouts.home')

@php
    $setting = \App\Http\Controllers\HomeController::getsetting();
@endphp

@section('title', 'User Profile ' . $setting->title)

@include('home._header')

@section('content')

    <head>
        @FilemanagerScript
        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    </head>

    <section id="maincontent" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Yeni Ev Ekle</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user_house_store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="category_id" class="form-label"><strong>Kategori:</strong></label>
                                    <select name="category_id" id="category_id" class="form-select">
                                        <option value="0" selected>Ana Mekan</option>
                                        @foreach($datalist as $rs)
                                            <option value="{{ $rs->id }}">
                                                {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label"><strong>Başlık:</strong></label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Başlık giriniz">
                                </div>

                                <div class="mb-3">
                                    <label for="keywords" class="form-label"><strong>Anahtar Kelimeler:</strong></label>
                                    <input type="text" id="keywords" name="keywords" class="form-control" placeholder="Anahtar kelimeleri giriniz">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label"><strong>Açıklama:</strong></label>
                                    <input type="text" id="description" name="description" class="form-control" placeholder="Açıklama giriniz">
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label"><strong>Adres:</strong></label>
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Adres giriniz">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label"><strong>Telefon:</strong></label>
                                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Telefon numarası">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="metrekare" class="form-label"><strong>Metrekare:</strong></label>
                                        <input type="number" id="metrekare" name="metrekare" class="form-control" placeholder="Metrekare">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="isitma" class="form-label"><strong>Isıtma:</strong></label>
                                        <input type="text" id="isitma" name="isitma" class="form-control" placeholder="Isıtma türü">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="odasayisi" class="form-label"><strong>Oda Sayısı:</strong></label>
                                        <input type="number" id="odasayisi" name="odasayisi" class="form-control" placeholder="Oda sayısı">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="katsayisi" class="form-label"><strong>Kat Sayısı:</strong></label>
                                        <input type="number" id="katsayisi" name="katsayisi" class="form-control" placeholder="Kat sayısı">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="binayasi" class="form-label"><strong>Bina Yaşı:</strong></label>
                                        <input type="number" id="binayasi" name="binayasi" class="form-control" placeholder="Bina yaşı">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="esya" class="form-label"><strong>Eşya Durumu:</strong></label>
                                    <input type="text" id="esya" name="esya" class="form-control" placeholder="Eşya bilgisi">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label"><strong>Fiyat:</strong></label>
                                        <input type="number" id="price" name="price" class="form-control" placeholder="Fiyat">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="aidat" class="form-label"><strong>Aidat:</strong></label>
                                        <input type="number" id="aidat" name="aidat" class="form-control" placeholder="Aidat">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="detail" class="form-label"><strong>Detaylar:</strong></label>
                                    <textarea id="detail" name="detail" class="form-control"></textarea>
                                    <script>
                                        window.onload = function () {
                                            CKEDITOR.replace('detail', {
                                                filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                                            });
                                        }
                                    </script>
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label"><strong>Slug:</strong></label>
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug">
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label"><strong>Görsel Yükle:</strong></label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success px-4">Ekle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
