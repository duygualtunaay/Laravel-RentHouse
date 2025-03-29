<html>
<head>
    <title>User Roles</title>
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
                    <h5 class="title">User: {{$data->title}}</h5>

                </div>
                <div class="card-body">

                    <div style="width:200px; height: 600px;">

                        <table class="table" style="width: 800px">

                            <tr><th>Photo</th><td><td>
                                    @if($data->profile_photo_path)
                                        <img src="{{Storage::url($data->profile_photo_path)}}" height="100" style="border-radius: 10px">
                                    @endif
                                </td></tr>
                            <tr><th>Name</th><td>{{$data->name}}</td></tr>
                            <tr><th>Email</th><td>{{$data->email}}</td></tr>
                            <tr><th>Phone</th><td>{{$data->phone}}</td></tr>
                            <tr><th>Address</th><td>{{$data->address}}</td></tr>
                            <tr><th>Date</th><td>{{$data->created_at}}</td></tr>
                            <tr><th>Roles</th>
                                <td>
                                    <table>
                                        @foreach($data->roles as $row)
                                            <tr>
                                                <td>{{$row->name}}</td>
                                                <td>
                                                    <a href="{{route('admin_user_role_delete',['userid'=>$data->id,'roleid'=>$row->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="30"></a>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </table>

                                </td>


                            </tr>
                            <tr>
                                <th>Add Role</th>
                                <td>
                                    <form role="form" action="{{route('admin_user_role_add',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <select name="roleid">
                                            @foreach($datalist as $rs)
                                                <option value="{{$rs->id}}">{{$rs->name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-theme">Add Role</button>
                                    </form>


                                </td>
                            </tr>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
