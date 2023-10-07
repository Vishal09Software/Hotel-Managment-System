@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit {{$data->title}}</h4>
                            <a href="{{ url('admin/roomtype') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{ url('admin/roomtype/' . $data->id) }}" method="post" class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input type="text" name="title" value="{{ $data->title }}" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Price</label>
                                    <input type="number" name="price" value="{{ $data->price }}" class="form-control">
                                </div>
                                <div style="color: red">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Details</label>
                                    <textarea name="detail" id="" class="form-control" rows="10">{{ $data->detail }}</textarea>
                                </div>
                                <div style="color: red">
                                    @error('detail')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gallery </label>
                                    <input type="file" multiple name="images[]" class="form-control">
                                    @foreach ($data->roomtypeimages as $gallery)
                                    <span class="imgcol{{$gallery->id}}">
                                        <img src="{{ asset($gallery->images) }}" alt="img" width="150px"
                                            height="150px">
                                        <button type="button" class="btn btn-danger btn-sm delete-img"
                                            data-image-id="{{ $gallery->id }}" style="margin-top: 7rem"
                                            onclick="return confirm('are you delete this image')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                    @endforeach


                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $(".delete-img").on('click', function() {
            var _img_id = $(this).attr('data-image-id'); // Use $(this) to access the clicked element and fix the attribute syntax
            var _vm = $(this);
            $.ajax({
                url: '{{ url('/roomtypeimage/') }}' + '/' + _img_id + '/delete', // Concatenate the URL parts correctly
                dataType: 'json',
                beforeSend: function() {
                    _vm.addClass('disabled');
                },
                success: function(res) {
                   if(res.bool == true){
                    $(".imgcol" + _img_id).remove();
                   }
                   _vm.removeClass('disabled');


                }
            });
        });
    });
</script>

@endsection
@endsection
