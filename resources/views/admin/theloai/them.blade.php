@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                    @if(session('results'))
                        <div class="alert alert-success">
                            {{session('results')}}
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action={{url('admin/theloai/them')}} method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="ten" placeholder="Please enter category name"/>
                        </div>
                        <button type="submit" class="btn btn-default">Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection