@extends('layouts.admin')

@section('title', 'Admin Panel Home Page')


@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="text-align: center">
                        <p style="font-size: 75px;">ADMIN PANELİNE HOŞGELDİNİZ!</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin._content')


@endsection
