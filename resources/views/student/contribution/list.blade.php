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
                        <form action="{{ url('student/contribution/zipfile') }}" method="POST">
                            @csrf
                            <h2>Faculty: {{ $student->faculty->name }}</h2>
                            <h3>Name: {{ $student->name }}</h3>
                            <a href="{{ url('student/contribution/add') }}" class="btn btn-primary">ADD CONTRIBUTION</a>
                            <input type="submit" name="btn-search" value="Download" class="btn btn-primary">
                            <a href="{{ url('student/contribution/history/list') }}" class="btn btn-primary">MY HISTORY</a>
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
                                                    <th data-priority="3">Semester</th>
                                                    <th data-priority="1">Title</th>
                                                    {{-- <th data-priority="1">Content</th> --}}
                                                    <th data-priority="3">File</th>
                                                    <th data-priority="3">Image</th>
                                                    <th data-priority="3">Action</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $t = 1;
                                                @endphp
                                                @foreach ($contributions as $contribution)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="list_check" name="list_check[]"
                                                                value="{{ $contribution->id }}">
                                                        </td>
                                                        <td scope="row">{{ $t++ }}</td>
                                                        <td>{{ $contribution->semester->name }}</td>
                                                        <td>{{ $contribution->name }}</td>
                                                        {{-- <td>{{$contribution->content}}</td> --}}
                                                        {{-- <td><a href="{{asset($contribution->upload_file) }}" download>{{ $contribution->upload_file }}</a></td> --}}
                                                        <td><a
                                                                href="{{ route('studentinfo/showfile', ['contribution' => $contribution]) }}">{{ $contribution->upload_file }}</a>
                                                        </td>
                                                        <td><img src="{{ asset($contribution->thumbnail) }}"
                                                                style="width:100px; height:auto;" alt=""></td>
                                                        <td>
                                                            <a href="{{ route('contribution/edit', $contribution->id) }}"
                                                                class="btn btn-success btn-sm rounded-0 text-white"
                                                                type="button" data-toggle="tooltip" data-placement="top"
                                                                title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('contribution/delete', $contribution->id) }}"
                                                                onclick="return confirm('Do you want to delete it???')"
                                                                class="btn btn-danger btn-sm rounded-0 text-white"
                                                                type="button" data-toggle="tooltip" data-placement="top"
                                                                title="Delete"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- end .table-responsive -->
                                    {{ $contributions->links() }}
                                </div> <!-- end .table-rep-plugin-->
                            </div> <!-- end .responsive-table-plugin-->
                        </form>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
    </div>
@endsection
