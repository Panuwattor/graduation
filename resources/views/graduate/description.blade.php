@extends('master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">รายชื่อบัณฑิต <a href="#">{{$description}}</a></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/graduate/branchs">ตาม สาขาปริญญา</a></li>
                    <li class="breadcrumb-item active">{{$description}}</li>
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
                    <h3 class="card-title">รายการรายชื่อบัณฑิต <a href="#">{{$description}}</a></h3>
                </div>
                <div class="card-body">
                    {{$graduates->links()}}
                    <form action="/graduate/branch/{{$description}}/prints" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-print"></i> Print</button>
                        <div class="table-responsive p-0">
                            <table id="example1" class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>
                                            <label>
                                                <input type="checkbox" id="select-all">
                                                ทั้งหมด
                                            </label>
                                        </th>
                                        <th>Img</th>
                                        <th>no</th>
                                        <th>name</th>
                                        <th>studentCode</th>
                                        <th>description</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($graduates as $graduate)
                                    <tr class="text-center">
                                        <td>
                                            <label>
                                                <input name="ids[]" class="checkbox_id" type="checkbox" value="{{$graduate->id}}">
                                                เลือก
                                            </label>
                                        </td>
                                        <td>
                                            <img class="direct-chat-img" src="{{$graduate->photo}}" alt="message user image">
                                        </td>
                                        <td>{{$graduate->numberGraduate}}</td>
                                        <td>{{$graduate->name}}</td>
                                        <td>{{$graduate->studentCode}}</td>
                                        <td>{{$graduate->description}}</td>
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
                    </form>
                    {{$graduates->links()}}
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
                        <label for="inputEmail3" class="col-sm-2 col-form-label">no</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="numberGraduate" value="{{$graduate->numberGraduate}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{$graduate->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">studentCode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="studentCode" value="{{$graduate->studentCode}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" value="{{$graduate->description}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">รูป URL</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="photo">
                                <option value="/student/58131110025.JPG" @if($graduate->photo == '/student/58131110025.JPG') selected @endif>/student/58131110025.JPG</option>
                                <option value="/student/58131110025.jpg" @if($graduate->photo == '/student/58131110025.jpg') selected @endif>/student/58131110025.jpg</option>
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
    $('#select-all').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.checkbox_id').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkbox_id').each(function() {
                this.checked = false;
            });
        }
    });
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