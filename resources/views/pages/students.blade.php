@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-12 col-md-12">
            <a href="{{ route('student.add') }}" class="btn btn-warning">Add Student</a>
        </div>
        <div class="col-12 col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Address</td>
                            <td>School</td>
                            <td>Phone</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $students as $key => $student )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $student->name }}</td>
                            <td scope="col">{{ $student->address }}</td>
                            <td scope="col">{{ $student->school }}</td>
                            <td scope="col">{{ $student->phone }}</td>
                            <td scope="col">
                                <a href="{{ route('student.edit', $student->id) }}">Edit</a>
                                |
                                <a href="{{ route('student.delete', $student->id) }}">Delete</a>
                                |
                                <a href="{{ route('student.manage', $student->id) }}"> Manage</a>
                            </td>
                          </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@push('css')
    <style>
    </style>
@endpush

@push('scripts')
    <script>
        // alert();
    </script>
@endpush

