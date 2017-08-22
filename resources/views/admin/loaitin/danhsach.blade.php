@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                @if(session('delete-result'))
                    <div class="alert alert-success">
                        {{session('delete-result')}}
                    </div>
                @endif
                <div class="col-lg-12">
                    <h1 class="page-header">Loại tin
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>ID_Category</th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loaitin as $lt)
                        <tr class="odd gradeX" align="center">
                            <td>{{$lt->id}}</td>
                            <td>{{$lt->id_theloai}}</td>
                            <td>{{$lt->ten}}</td>
                            <td>{{$lt->tenkhongdau}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="{{url('admin/loaitin/xoa/'.$lt->id)}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                        href="{{url('admin/loaitin/sua/'.$lt->id)}}">
                                    Edit</a></td>
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