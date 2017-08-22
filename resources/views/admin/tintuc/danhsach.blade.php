@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{ $err }}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('delete-result'))
                    <div class="alert alert-success">
                        {{session('delete-result')}}
                    </div>
                @endif
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>TieuDe</th>
                        <th>TieuDeKhongDau</th>
                        <th>TomTat</th>
                        <th>NoiDung</th>
                        <th>Hinh</th>
                        <th>NoiBat</th>
                        <th>SoLuotXem</th>
                        <th>Id_LoaiTin</th>
                        <th>LoaiTin</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tintuc as $tt)
                        <tr class="odd gradeX" align="center">
                            <td>{{$tt->id}}</td>
                            <td>{{$tt->tieude}}</td>
                            <td>{{$tt->tieudekhongdau}}</td>
                            <td>{{$tt->tomtat}}</td>
                            <td>{{$tt->noidung}}</td>
                            <td>{{$tt->hinh}}</td>
                            <td>{{$tt->noibat}}</td>
                            <td>{{$tt->soluotxem}}</td>
                            <td>{{$tt->id_loaitin}}</td>
                            <td>{{$tt->loaitin->ten}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="{{url('admin/tintuc/xoa/'.$tt->id)}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                        href="{{url('admin/tintuc/sua/'.$tt->id)}}"> Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection