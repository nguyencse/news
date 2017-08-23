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
                    <h1 class="page-header">Slide
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Hình</th>
                        <th>Nội dung</th>
                        <th>Link</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($slides as $sl)
                        <tr class="odd gradeX" align="center">
                            <td>{{$sl->id}}</td>
                            <td>{{$sl->ten}}</td>
                            <td>{{$sl->hinh}}</td>
                            <td>{{$sl->noidung}}</td>
                            <td>{{$sl->link}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="{{url('admin/slide/xoa/'.$sl->id)}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="#"> Edit</a></td>
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