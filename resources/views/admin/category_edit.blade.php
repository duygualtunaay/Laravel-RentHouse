@extends('layouts.admin')

@section('title','Kategoriyi Düzenle')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Kategori Düzenle</h5>

                </div>
                <div class="card-body">

                   <div style="width:1000px; height: auto;">
                       <form action="{{route('admin_category_update',['id'=>$data->id])}}" method="post">
                           @csrf
                       <table>

                           <tr><h4>Parent Id:</h4> <select name="parent_id" id="parent_id" style="width: 1000px">

                                   <option value="0">Ana Kategori</option>
                                   @foreach($datalist as $rs)
                                   <option value="{{$rs->id}}" @if ($rs->id==$data->parent_id) selected="selected" @endif>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                   @endforeach


                               </select></tr>
                           <tr><h4>Title:</h4> <input style="width: 1000px" id="title" type="text" value="{{$data->title}}" name="title" placeholder="Title"/></tr>
                           <tr><h4>Keywords: </h4><input style="width: 1000px" id="keywords" type="text" value="{{$data->keywords}}" name="keywords" placeholder="Keywords"/></tr>
                           <tr><h4>Description: </h4><input style="width: 1000px" id="description" type="text" value="{{$data->description}}" name="description" placeholder="Description"/></tr>
                           <tr><h4>Slug: </h4><input style="width: 1000px" id="slug" type="text" value="{{$data->slug}}" name="slug" placeholder="Slug"/></tr>
                           <tr><label for="status"><h4>Status:</h4></label>

                               <select name="status" id="status" style="width: 1000px">
                                   <option selected="selected">{{$data->status}}</option>
                                   <option value="true">True</option>
                                   <option value="false">False</option>

                               </select></tr><br><br>
                           <tr><button type="submit" class="btn btn-primary" onclick="return confirm('Kategoriyi Güncellemek istediğinize emin misiniz?')">Kategoriyi Güncelle</button></tr>
                       </table>
                       </form>
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
