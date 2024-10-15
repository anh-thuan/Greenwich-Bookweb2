@extends('layouts/backend')
@section('connect-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif (session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('manager/contribution/zipfile') }}" method="POST">
                            @csrf
                            <a href="" class="btn btn-primary">ARTICLE</a>
                            <input type="submit" name="btn-search" value="Download" class="btn btn-primary">
                            <div class="responsive-table-plugin">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" name="checkall" id="checkall">
                                                    </th>
                                                    <th>Num</th>
                                                    <th data-priority="1">Student</th>
                                                    <th data-priority="3">Title</th>
                                                    <th data-priority="3">Info</th>
                                                    <th data-priority="1">Faculty</th>
                                                    <th data-priority="3">Status</th>
                                                    <th data-priority="3">File</th>
                                                    <th data-priority="3">Image</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $t = 1;
                                                @endphp
                                                @foreach ($managements as $management)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="list_check" name="list_check[]"
                                                                value="{{ $management->id }}">
                                                        </td>
                                                        <td>{{ $t++ }}</td>
                                                        <td>{{ $management->user->name }}</td>
                                                        <td>{{ $management->name }}</td>
                                                        <td><a href="{{ route('student/info', $management->id) }}"
                                                                class="btn btn-warning btn-sm rounded-0 text-white"
                                                                type="button" data-toggle="tooltip" data-placement="top"
                                                                title="Edit"><i class="fa-solid fa-circle-info"></i></a>
                                                        </td>
                                                        <td>{{ $management->faculty->name }}</td>
                                                        @if ($management->status == 'approved')
                                                            <td><span
                                                                    class="badge bg-success">{{ $management->status }}</span>
                                                            </td>
                                                        @elseif($management->status == 'rejected')
                                                            <td><span
                                                                    class="badge bg-danger">{{ $management->status }}</span>
                                                            </td>
                                                        @else
                                                            <td><span
                                                                    class="badge bg-warning">{{ $management->status }}</span>
                                                            </td>
                                                        @endif
                                                        <td><a href="{{route('studentinfo/showfile', ['contribution' => $management]) }}">{{ $management->upload_file }}</a>
                                                        </td>
                                                        <td><img src="{{ asset($management->thumbnail) }}"
                                                                style="width:100px; height:auto;" alt=""></td>


                                                        {{-- <td>{{$management->created_at}}</td>
                                            <td>{{$management->updated_at}}</td> --}}
                                                        {{-- <td>
                                                <a href="{{route('manager/edit', $management->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                @if (Auth::id() != $management->id)
                                                <a href="{{route('manager/delete', $management->id)}}" onclick="return confirm('Do you want to delete it???')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                @endif
                                            </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- end .table-responsive -->
                                    {{-- {{$managements->links()}} --}}

                                </div> <!-- end .table-rep-plugin-->
                            </div> <!-- end .responsive-table-plugin-->
                        </form>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
    </div>
@endsection
