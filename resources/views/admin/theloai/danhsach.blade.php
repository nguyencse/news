@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                @endif
                @if(session('results'))
                    <div class="alert alert-success">
                        {{session('results')}}
                    </div>
                @endif
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($theloai as $tl)
                        <tr class="odd gradeX" align="center">
                            <td>{{$tl->id}}</td>
                            <td>{{$tl->ten}}</td>
                            <td>{{$tl->tenkhongdau}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href={{url('admin/theloai/xoa/'.$tl->id)}}> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                        href={{url('admin/theloai/sua/'.$tl->id)}}> Edit</a></td>
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