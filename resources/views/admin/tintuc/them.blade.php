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
                    <h1 class="page-header">Tin tức
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url('admin/tintuc/them')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="tieude" placeholder="Điền vào tiêu đề"/>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <input class="form-control" name="tomtat" placeholder="Điền vào tóm tắt"/>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" rows="3" name="noidung"
                                      placeholder="Điền vào nội dung tin tức" id="summary-ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="hinh">
                        </div>
                        <div class="form-group">
                            <label>Nổi bật</label>
                            <input type="checkbox" class="checkbox-inline" checked value="1" name="chknoibat"
                                   style="margin-left: 5px;margin-bottom: 5px">
                        </div>
                        <div class="form-group">
                            <label>Số lượt xem</label>
                            <input class="form-control" name="soluotxem" placeholder="Điền vào số lượt xem" value="0"/>
                        </div>
                        <div class="form-group">
                            <label>Loại tin</label>
                            <select name="loaitin" id="input" class="form-control" required="required">
                                @foreach($loaitin as $lt)
                                    <option value="{{$lt->id}}">{{$lt->ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm lại</button>
                        <form>
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
        $('textarea#content').ckeditor({
            toolbar: 'Full',
            enterMode: CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P,
            height: '800px'
        });
    </script>
@endsection