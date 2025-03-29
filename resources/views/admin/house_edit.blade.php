@extends('layouts.admin')

@section('title','Kiralık Ev Düzenle')

@section('javascript')
    <head>
        @FilemanagerScript
    </head>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div style="width:1000px; height: auto;">
                        <form action="{{route('admin_house_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table>

                                <tr><h4>Category:</h4> <select name="category_id" id="category_id" style="width: 1000px">
                                        @foreach($datalist as $rs)
                                            <option value="{{$rs->id}}" @if ($rs->id==$data->Category_id) selected="selected" @endif>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                        @endforeach


                                    </select></tr>
                                <tr><h4>Title:</h4> <input style="width: 1000px" id="title" value="{{$data->title}}" type="text" name="title" placeholder="Title"/></tr>
                                <tr><h4>Keywords: </h4><input style="width: 1000px" id="keywords" value="{{$data->keywords}}" type="text" name="keywords" placeholder="Keywords"/></tr>
                                <tr><h4>Description: </h4><input style="width: 1000px" id="description" value="{{$data->description}}" type="text" name="description" placeholder="Description"/></tr>
                                <tr><h4>Address: </h4><input style="width: 1000px" id="address" value="{{$data->address}}" type="text" name="address" placeholder="address"/></tr>
                                <tr><h4>Phone: </h4><input style="width: 1000px" id="phone" value="{{$data->phone}}" type="number" name="phone" placeholder="phone"/></tr>
                                <tr><h4>Metre Kare: </h4><input style="width: 1000px" id="metrekare" value="{{$data->metrekare}}" type="number" name="metrekare" placeholder="Metre Kare"/></tr>
                                <tr><h4>Isıtma: </h4><input style="width: 1000px" id="isitma" value="{{$data->isitma}}" type="text" name="isitma" placeholder="Isıtma"/></tr>
                                <tr><h4>Oda Sayısı: </h4><input style="width: 1000px" id="odasayisi" value="{{$data->odasayisi}}" type="number" name="odasayisi" placeholder="Oda Sayısı"/></tr>
                                <tr><h4>Kat Sayısı: </h4><input style="width: 1000px" id="katsayisi" value="{{$data->katsayisi}}" type="number" name="katsayisi" placeholder="Kat Sayısı"/></tr>
                                <tr><h4>Eşya: </h4><input style="width: 1000px" id="esya" value="{{$data->esya}}" type="text" name="esya" placeholder="Eşya"/></tr>
                                <tr><h4>Bina Yaşı: </h4><input style="width: 1000px" id="binayasi" value="{{$data->binayasi}}" type="number" name="binayasi" placeholder="Bina Yaşı"/></tr>
                                <tr><h4>Fiyat: </h4><input style="width: 1000px" id="price" value="{{$data->price}}" type="number" name="price" placeholder="Fiyat"/></tr>
                                <tr><h4>Aidat: </h4><input style="width: 1000px" id="aidat" value="{{$data->aidat}}" type="number" name="aidat" placeholder="Aidat"/></tr>
                                <tr><h4>Detail: </h4><textarea id="detail" name="detail">{{$data->detail}}</textarea></tr>
                                <script>
                                    window.onload = function () {
                                        CKEDITOR.replace('detail', {
                                            filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                                        });
                                    }
                                </script>
                                <tr><h4>Slug: </h4><input style="width: 1000px" id="slug" value="{{$data->slug}}" type="text" name="slug" placeholder="Slug"/></tr>
                                <tr><br><label for="image"><h4>Image:</h4></label><input type="file" name="image" id="image"  class="form-control">
                                    <br>
                                    @if($data->image)
                                        <img src="{{Storage::url($data->image)}}" height="100" alt=""/>
                                    @endif
                                    <br>
                                </tr>
                                <tr><label for="status"><h4>Status:</h4></label><br>

                                    <select name="status" id="status" style="width: 1000px">
                                        <option selected="selected">{{$data->status}}</option>
                                        <option value="true">True</option>
                                        <option value="false">False</option>

                                    </select></tr><br><br>
                                <tr><button type="submit" class="btn btn-primary">Düzenle</button></tr>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
