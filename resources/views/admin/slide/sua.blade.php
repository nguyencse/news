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
                    @if(session('update-result'))
                        <div class="alert alert-success">
                            {{session('update-result')}}
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url('admin/slide/sua/'.$slide->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group {{$errors->has('ten')?'has-error':''}}">
                            <label>Tên slide</label>
                            <input class="form-control" name="ten"
                                   placeholder="Điền vào tên slide"
                                   value="{{$slide->ten}}"/>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="hinh">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" rows="3" name="noidung"
                                      id="summary-ckeditor">{{$slide->noidung}}</textarea>
                        </div>
                        <div class="form-group {{$errors->has('link')?'has-error':''}}">
                            <label>Link</label>
                            <input class="form-control" name="link" placeholder="Điền vào link hình ảnh"
                                   value="{{$slide->link}}"/>
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