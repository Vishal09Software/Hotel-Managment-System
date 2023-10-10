@extends('backend.layouts.main')
@section('main-container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit {{$data->title}}</h4>
                            <a href="{{ url('admin/service') }}">
                                <button class="btn btn-primary float-right" style="margin-top: -43px">View All</button>
                            </a>
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif

                            @if ($errors->any())
                            @endif
                            <form action="{{ url('admin/service/' . $data->id) }}" method="post" class="forms-sample" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1">Short Desc</label>
                                    <textarea name="small_desc" id="" class="form-control" rows="10">{{ $data->small_desc }}</textarea>
                                </div>
                                <div style="color: red">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Long Details</label>
                                    <textarea name="long_details" id="" class="form-control" rows="10">{{ $data->long_details }}</textarea>
                                </div>
                                <div style="color: red">
                                    @error('detail')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image </label>
                                    <input type="file"  name="images" class="form-control">
                                    <img src="{{ asset('backend/images/services/' . $data->images) }}" alt="img" width="50px" height="50px">

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
                url: '{{ url('/serviceimage/') }}' + '/' + _img_id + '/delete', // Concatenate the URL parts correctly
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
