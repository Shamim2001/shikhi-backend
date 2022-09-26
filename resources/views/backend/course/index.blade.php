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
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Description</th>
                                <th scope="col" class="text-center">Requirements</th>
                                <th scope="col" class="text-center">Audience</th>
                                <th scope="col" class="text-center">Teacher</th>
                                <th scope="col" class="text-center">Category</th>
                                <th scope="col" class="text-center">Visibility</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                                <tr>
                                    <td >
                                        <img src="{{ $course->thumbnail }}" style="width: 70px"  alt="{{ $course->thumbnail }}">
                                    </td>
                                    <td><a href="{{ route('course.show', $course) }}">{{ $course->name }}</a></td>
                                    <td style="width: 25%">{!! $course->description !!}</td>
                                    <td style="width: 18%">{{ $course->requirements }}</td>
                                    <td style="width: 150px">{{ $course->audience }}</td>
                                    <td>{{ $course->teacher->name }}</td>
                                    <td> {{($course->category)->name }}</td>
                                    <td>{{ $course->visibility }}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-15 justify-content-center">
                                            <a href="{{ route('course.edit', $course) }}" class="link-primary fs-18"><i
                                                    class="ri-edit-fill "></i></a>
                                            <a href="javascript:void(0);" class="link-success fs-18"><i
                                                    class="ri-eye-line "></i></a>
                                            <form action="{{ route('course.destroy', $course) }}" method="post"
                                                onsubmit="return confirm('Do you really want to delete?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="link-danger fs-18"><i
                                                        class="ri-delete-bin-5-line"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $courses->links() }}
                    </div>

                </div>
            </div>
        </div>
        <!-- container-fluid -->

    </div>>
@endsection