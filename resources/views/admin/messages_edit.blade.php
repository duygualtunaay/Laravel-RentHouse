
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Mesaj Detayı</h5>
                        <p class="place">Mesajı Gönderen : {{$data->name}}</p>
                    </div>
                    <div class="card-body">
                        @include('home.message')
                        <form action="{{route('admin_message_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                            <tr><th><b>Id</b></th><td>{{$data->id}}</td></tr>
                                            <tr><th><b>Name</b></th><td>{{$data->name}}</td></tr>
                                            <tr><th><b>Email</b></th><td>{{$data->email}}</td></tr>
                                            <tr><th><b>Phone</b></th><td>{{$data->phone}}</td></tr>
                                            <tr><th><b>Subject</b></th><td>{{$data->subject}}</td></tr>
                                            <tr><th><b>Message</b></th><td>{{$data->message}}</td></tr>
                                            <tr><th><b>Admin Note</b></th><td><textarea id="note" name="note">{{$data->note}}</textarea></td></tr>
                                            <tr><th><b>Status</b></th>
                                                <td>
                                                    <select name="status">
                                                        <option selected>{{$data->status}}</option>
                                                        <option>Accepted</option>
                                                        <option>Cancelled</option>
                                                    </select>
                                                </td></tr>
                                            <tr><th><button type="submit" class="btn btn-dark">Update Message</button></th></tr>
                                            </thead>


                                        </table>
                                    </div>
                                </div>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

