@extends('layouts/backend')
@section('connect-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">EDIT CONTRIBUTION</h4>
                        <a href="{{ url('student/contribution/list') }}" class="btn btn-primary">BACK</a>
                        {{-- <p class="text-muted mb-0">
                            By adding <code>.row</code> & <code>.g-2</code>, you can have control over the
                            gutter width in as well the inline as block direction.
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contribution/update', $contribution->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $contribution->name }}" placeholder="Please input Title">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5">{{ $contribution->content }}</textarea>
                                @error('content')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deadline</label>
                                <input type="text" class="form-control" disabled
                                    value="{{ $faculty->semester->end_date }}">
                            </div>

                            <div class="mb-3">
                                <label for="upload_file" class="form-label">Upload file-Required file: Doc, Docx</label>
                                @if ($contribution->upload_file)
                                    <div>{{ $contribution->upload_file }}</div>
                                @endif
                                <input type="file" id="upload_file" name="upload_file" class="form-control"
                                    value="{{ $contribution->upload_file }}">
                                @error('upload_file')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                <br>
                            </div>

                            <div class="mb-3">
                                <label for="upload_image" class="form-label">Upload image</label>
                                @if ($contribution->thumbnail)
                                    <div>{{ $contribution->thumbnail }}</div>
                                @endif
                                <input type="file" id="upload_image" name="upload_image" class="form-control"
                                    value="{{ $contribution->upload_image }}">
                                @error('upload_image')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                <br>
                            </div>

                            <div class="mb-3">
                                <label>Status</label>
                                @if ($contribution->status == 'approved')
                                    <input type="text" class="alert alert-success text-center form-control"
                                        id="title" name="title" value="{{ $contribution->status }}">
                                @elseif($contribution->status == 'rejected')
                                    <input type="text" class="alert alert-danger text-center form-control" id="title"
                                        name="title" value="{{ $contribution->status }}">
                                @else
                                    <input type="text" class="alert alert-info text-center form-control" id="title"
                                        name="title" value="{{ $contribution->status }}">
                                @endif

                                <div class=" mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="status" class="form-check-input" id="checkmeout0"
                                            value="pending">
                                        <label class="form-check-label" for="checkmeout0">I Agree with Term and
                                            Condition</label><br>
                                        @error('status')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="comment">Comment</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="5" disabled>{{$contribution->comment}}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">EDIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection