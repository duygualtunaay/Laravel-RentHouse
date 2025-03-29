@extends('layouts.home')

@section('title', 'İlan Düzenle')

@include('home._header')

<head>
    @FilemanagerScript
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>

@section('content')
    <section id="maincontent" style="padding-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4>İlan Düzenle</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user_house_update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Kategori Seçimi -->
                                <div class="form-group">
                                    <label for="category_id">Kategori:</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach($datalist as $rs)
                                            <option value="{{ $rs->id }}"
                                                    @if($rs->id == $data->category_id) selected @endif>
                                                {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Metin Giriş Alanları -->
                                @php
                                    $fields = [
                                        'title' => 'Başlık',
                                        'keywords' => 'Anahtar Kelimeler',
                                        'description' => 'Açıklama',
                                        'address' => 'Adres',
                                        'phone' => 'Telefon',
                                        'metrekare' => 'Metrekare',
                                        'isitma' => 'Isıtma Türü',
                                        'odasayisi' => 'Oda Sayısı',
                                        'katsayisi' => 'Kat Sayısı',
                                        'esya' => 'Eşya Durumu',
                                        'binayasi' => 'Bina Yaşı',
                                        'price' => 'Fiyat',
                                        'aidat' => 'Aidat',
                                        'slug' => 'Slug'
                                    ];
                                @endphp

                                @foreach($fields as $key => $label)
                                    <div class="form-group">
                                        <label for="{{ $key }}">{{ $label }}:</label>
                                        <input type="{{ is_numeric($data->$key) ? 'number' : 'text' }}"
                                               class="form-control"
                                               id="{{ $key }}"
                                               name="{{ $key }}"
                                               value="{{ $data->$key }}"
                                               placeholder="{{ $label }}">
                                    </div>
                                @endforeach

                                <!-- Detay Alanı (CKEditor) -->
                                <div class="form-group">
                                    <label for="detail">Detay:</label>
                                    <textarea class="form-control" id="detail" name="detail">{{ $data->detail }}</textarea>
                                </div>

                                <script>
                                    window.onload = function () {
                                        CKEDITOR.replace('detail', {
                                            filebrowserBrowseUrl: filemanager.ckBrowseUrl
                                        });
                                    }
                                </script>

                                <!-- Görsel Yükleme -->
                                <div class="form-group">
                                    <label for="image">Resim:</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                    @if($data->image)
                                        <div class="mt-2">
                                            <img src="{{ Storage::url($data->image) }}" class="img-thumbnail" height="100">
                                        </div>
                                    @endif
                                </div>

                                <!-- Kaydet Butonu -->
                                <button type="submit" class="btn btn-success">Güncelle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
