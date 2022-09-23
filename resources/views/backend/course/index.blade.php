@extends('backend.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Courses</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Courses</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="my-3 text-end">
                        <a href="{{ route('course.create') }}" class="btn btn-primary waves-effect waves-light">Add New</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Tables Without Borders -->
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col" class="w-25">Requirements</th>
                                <th scope="col" class="w-25">Audience</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                                <tr>
                                    <td>{{ $course->thumbnail }}</td>
                                    <td><a href="#">{{ $course->name }}</a></td>
                                    <td>{{ $course->slug }}</td>
                                    <td>{{ $course->requirements }}</td>
                                    <td>{{ $course->audience }}</td>
                                    <td>{{ $course->status }}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-15">
                                            <a href="javascript:void(0);" class="link-primary"><i
                                                    class="ri-edit-fill "></i></a>
                                            <a href="javascript:void(0);" class="link-success"><i
                                                    class="ri-eye-line "></i></a>
                                            <a href="javascript:void(0);" class="link-danger"><i
                                                    class="ri-delete-bin-5-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
