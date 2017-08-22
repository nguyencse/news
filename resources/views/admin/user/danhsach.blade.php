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
                    <h1 class="page-header">Người dùng
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Permission</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="odd gradeX" align="center">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->quyen}}</td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a
                                        href="{{url('admin/user/xoa/'.$user->id)}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                        href="{{url('admin/user/sua/'.$user->id)}}"> Edit</a></td>
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