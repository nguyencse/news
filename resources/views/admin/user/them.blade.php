@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
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
                    <h1 class="page-header">Tài khoản
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url('admin/user/them')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input class="form-control" name="name" placeholder="Nhập tên đăng nhập"/>
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
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập email"/>
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input name="rdoLevel" value="1" type="radio">Quản trị viên
                            </label>
                            <label class="radio-inline">
                                <input name="rdoLevel" value="0" checked type="radio">Thành viên
                            </label>
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