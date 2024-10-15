@extends('layouts/backend')
@section('connect-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session ('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <a href="{{url('admin/faculty/add')}}" class="btn btn-primary">ADD FACULTY</a>
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th data-priority="1">ID</th>
                                        <th data-priority="3">Name</th>
                                        <th data-priority="1">Description</th>
                                        <th data-priority="3">Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                        $t=1;
                                        @endphp
                                        @foreach($faculty as $facultylist)
                                            <tr>
                                                <td>{{$t++}}</td>
                                                <td>{{$facultylist->name}}</td>
                                                <td>{{$facultylist->description}}</td>
                                                <td>{{$facultylist->semester->name}}</td>
                                                <td>
                                                    <a href="{{route('faculty/edit', $facultylist->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('faculty/delete', $facultylist->id)}}" onclick="return confirm('Do you want to delete it???')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end .table-responsive -->

                        </div> <!-- end .table-rep-plugin-->
                    </div> <!-- end .responsive-table-plugin-->
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
</div>

@endsection