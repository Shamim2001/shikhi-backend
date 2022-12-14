@extends('backend.layouts.master')

@section('title', 'Course')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <x-page-title page="Course" text="Course" :route="route('course.index')" index="index" />
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
                                <th scope="col" class="text-center" style="width: 70px">Thumbnail</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Lessons</th>
                                <th scope="col" class="text-center">Visibility</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $key => $course)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td class="text-center">
                                        <img src="{{ getAssetUrl($course->thumbnail, 'storage/uploads/course') }}"
                                            class="avatar-xs rounded-circle" alt="{{ $course->name }}">

                                    </td>
                                    <td class="text-center"><a
                                            href="{{ route('course.show', $course) }}">{{ $course->name }}</a></td>
                                    <td class="text-center">

                                        <button type="button"
                                            class="btn btn-primary position-relative p-0 avatar-xs rounded">
                                            <span class="avatar-title bg-transparent">
                                                {{ count($course->lessons) }}
                                            </span>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1"><span
                                                    class="visually-hidden">unread lessons</span></span>
                                        </button>
                                    </td>
                                    <td class="text-center">{{ $course->visibility }}</td>
                                    <td class="text-center">
                                        <div class="hstack gap-3 fs-19 justify-content-center">
                                            <a href="{{ route('course.edit', $course) }}" class="link-primary fs-18"><i
                                                    class="ri-edit-fill "></i></a>
                                            <a href="{{ route('course.show', $course) }}" class="link-success fs-18"><i
                                                    class="ri-eye-line "></i></a>
                                            <form action="{{ route('course.destroy', $course) }}" method="post"
                                                onsubmit="return confirm('Do you really want to delete?');">
                                                @csrf
                                                @method('DELETE')

                                                <button style="border: none;" type="submit" class="link-danger"><i
                                                        class="ri-delete-bin-5-line"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="6" class="text-center text-danger fw-semibold fs-6">Courses Not Found!</td>
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
