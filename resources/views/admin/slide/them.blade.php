@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('add-result'))
                        <div class="alert alert-success">
                            {{session('add-result')}}
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url('admin/slide/them/')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group {{$errors->has('ten')?'has-error':''}}">
                            <label>Tên slide</label>
                            <input class="form-control" name="ten"
                                   placeholder="Điền vào tên slide"
                                   value="{{session('add-result') ? '' : old('ten')}}"/>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="hinh">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" rows="3" name="noidung" id="summary-ckeditor"></textarea>
                        </div>
                        <div class="form-group {{$errors->has('link')?'has-error':''}}">
                            <label>Link</label>
                            <input class="form-control" name="link" placeholder="Điền vào link hình ảnh"/>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm lại</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('summary-ckeditor');
        CKEDITOR.config.extraAllowedContent = 'iframe[*]';
    </script>
@endsection