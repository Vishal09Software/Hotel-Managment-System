@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Type Room</h4>
                            <a href="{{ url('admin/roomtype') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{url('admin/roomtype') }}" method="post" class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Price</label>
                                    <input type="number" name="price" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Details</label>
                                    <textarea name="detail" id="" class="form-control" rows="10"></textarea>
                                </div>
                                <div style="color: red">
                                    @error('detail')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gallery</label>
                                    <input type="file" multiple name="images[]" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
