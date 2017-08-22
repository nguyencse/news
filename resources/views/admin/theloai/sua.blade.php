@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                @if(count($errors) > 0)
                    <div class="alert alert-danger result-notification">
                        @foreach($errors->all() as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                @if(session('results'))
                    <div class="alert alert-success result-notification">
                        {{session('results')}}
                    </div>
                @endif
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action={{url('admin/theloai/sua/'.$theloai->id)}} method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input class="form-control" name="ten" placeholder="Nhập vào tên thể loại"
                                   value="{{$theloai->ten}}"/>
                        </div>
                        <button type="submit" class="btn btn-default">Lưu</button>
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
    <script>
        $(document).ready(function () {
            $('.result-notification').fadeOut(5000);
        });
    </script>
@endsection