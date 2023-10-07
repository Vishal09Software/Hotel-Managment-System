@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit {{$data->title}}</h4>
                            <a href="{{url('admin/department')}}" >
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{url('admin/department/'.$data->id)}}" method="post" class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputUsername1" placeholder="Username"  value=" {{ $data->title }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Details </label>
                                    <textarea name="details" id="" class="form-control" rows="10">{{ $data->details }}</textarea>
                                  </div>

                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
