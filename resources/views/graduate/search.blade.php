@extends('master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ค้นหารายชื่อบัณฑิต</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">ค้นหารายชื่อบัณฑิต</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">รายการค้นหารายชื่อบัณฑิต <a href="#">{{$value}}</a></h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table id="example1" class="table table-hover text-nowrap">
                            <thead>
                                <tr class="text-center">
                                    <th>no</th>
                                    <th>name</th>
                                    <th>studentCode</th>
                                    <th>description</th>
                                    <th>รูป URL</th>
                                    <th>print</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($graduates as $graduate)
                                <tr class="text-center">
                                    <td>{{$graduate->numberGraduate}}</td>
                                    <td>{{$graduate->name}}</td>
                                    <td>{{$graduate->studentCode}}</td>
                                    <td>{{$graduate->description}}</td>
                                    <td>{{$graduate->photo}}</td>
                                    <td>
                                        <form action="/graduate/branch/{{$graduate->description}}/prints" method="post">
                                            @csrf
                                            <button type="submit" name="ids[]"  value="{{$graduate->id}}" class="btn btn-outline-success btn-sm"><i class="fa fa-print"></i> Print</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{$graduate->id}}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($graduates as $graduate)

<div class="modal fade" id="modal-edit{{$graduate->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขข้อมูล</h4>
            </div>
            <form action="/graduation/{{$graduate->id}}/update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">no</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="numberGraduate" value="{{$graduate->numberGraduate}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="{{$graduate->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">studentCode</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="studentCode" value="{{$graduate->studentCode}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">description</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="description" value="{{$graduate->description}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">รูป URL</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="photo">
                                <option value="/student/{{$graduate->studentCode}}.JPG" @if($graduate->photo == "/student/$graduate->studentCode.JPG") selected @endif>/student/{{$graduate->studentCode}}.JPG</option>
                                <option value="/student/{{$graduate->studentCode}}.jpg" @if($graduate->photo == "/student/$graduate->studentCode.jpg") selected @endif>/student/{{$graduate->studentCode}}.jpg</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
@endsection


@section('header')
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('footer')
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function() {
        $('#example1').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@endsection