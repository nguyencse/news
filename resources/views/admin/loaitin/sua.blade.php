@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif
                @if(session('update-result'))
                    <div class="alert alert-success">
                        {{session('update-result')}}
                    </div>
                @endif
                <div class="col-lg-12">
                    <h1 class="page-header">Loại tin
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url('admin/loaitin/sua/'.$loaitin->id)}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên loại tin</label>
                            <input class="form-control" name="ten" placeholder="Nhập tên loại tin"
                                   value="{{$loaitin->ten}}"/>
                        </div>
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select name="tentheloai" id="input" class="form-control" required="required">
                                @foreach($theloai as $tl)
                                    <option value="{{$tl->id}}"
                                            {{$tl->id == $loaitin->id_theloai ? 'selected':''}}>{{$tl->ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Lưu</button>
                        <button type="reset" class="btn btn-default">Làm lại</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection