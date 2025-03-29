@extends('layouts.admin')

@section('title','Kategori Ekle')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Kategori Ekle</h5>

                </div>
                <div class="card-body">

                   <div style="width:1000px; height: auto;">
                       <form action="{{route('admin_category_create')}}" method="post">
                           @csrf
                       <table>

                           <tr><h4>Parent Id:</h4> <select name="parent_id" id="parent_id" style="width: 1000px">
                                   <option value="0" selected="selected">Ana Kategori</option>
                                   @foreach($datalist as $rs)
                                   <option value="{{$rs->id}}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                   @endforeach


                               </select></tr>
                           <tr><h4>Title:</h4> <input style="width: 1000px" id="title" type="text" name="title" placeholder="Title"/></tr>
                           <tr><h4>Keywords: </h4><input style="width: 1000px" id="keywords" type="text" name="keywords" placeholder="Keywords"/></tr>
                           <tr><h4>Description: </h4><input style="width: 1000px" id="description" type="text" name="description" placeholder="Description"/></tr>
                           <tr><h4>Slug: </h4><input style="width: 1000px" id="slug" type="text" name="slug" placeholder="Slug"/></tr>
                           <tr><label for="status"><h4>Status:</h4></label>

                               <select name="status" id="status" style="width: 1000px">
                                   <option value="true">True</option>
                                   <option value="false">False</option>

                               </select></tr><br><br>
                           <tr><button type="submit" class="btn btn-primary">Ekle</button></tr>
                       </table>
                       </form>
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
