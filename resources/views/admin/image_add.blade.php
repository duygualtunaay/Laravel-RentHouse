<html>
<head>
    <title>Resim Galerisi</title>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets')}}/admin/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('assets')}}/admin/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{asset('assets')}}/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/admin/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets')}}/admin/demo/demo.css" rel="stylesheet" />
</head>

</html>
<body>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Ev: {{$data->title}}</h5>

                </div>
                <div class="card-body">

                   <div style="width:1000px; height: auto;">
                       <form action="{{route('admin_image_store',['house_id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                           @csrf
                       <table>

                           <tr><h4>Title:</h4> <input style="width: 1000px" id="title" type="text" name="title" placeholder="Title"/></tr>

                           <tr><label for="image"><h4>Image:</h4></label><input type="file" name="image" id="image" class="form-control">
<br><br>
                           <tr><button type="submit" class="btn btn-primary">Ekle</button></tr>
                       </table>
                       </form>
<br><br>
                       <table class="table" style="width: 1000px">
                           <thead class=" text-primary">
                           <th>Id</th>
                           <th>Title</th>
                           <th>Image</th>
                           <th>Actions</th>

                           </thead>


                           <tbody>
                           @foreach($images as $rs)
                               <tr>
                                   <td>
                                       {{$rs->id}}
                                   </td>
                                   <td>
                                       {{$rs->title}}
                                   </td>
                                   <td>
                                       @if($rs->image)
                                           <img src="{{Storage::url($rs->image)}}" height="60" width="120" alt=""/>
                                       @endif
                                   </td>
                                   <td>
                                       <a href="{{route('admin_image_delete',['id'=>$rs->id,'house_id'=>$data->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="30"></a>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>

                       </table>
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
