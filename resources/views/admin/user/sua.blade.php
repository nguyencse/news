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
                    <h1 class="page-header">Tài khoản
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url('admin/user/sua/'.$user->id)}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input class="form-control" name="name" placeholder="Nhập tên đăng nhập"
                                   value="{{$user->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="pass"
                                   placeholder="Nhập mật khẩu"/>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="repass"
                                   placeholder="Nhập lại mật khẩu"/>
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input name="rdoLevel" value="1" {{$user->quyen == 1 ? 'checked' : ''}} type="radio">Quản
                                trị viên
                            </label>
                            <label class="radio-inline">
                                <input name="rdoLevel" value="0" {{$user->quyen == 0 ? 'checked' : ''}} type="radio">Thành
                                viên
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm lại</button>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection