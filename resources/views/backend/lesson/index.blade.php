@extends('backend.layouts.master')

@section('title', 'Lessons')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <x-page-title page="Lessons" text="Lesson"  :route="route('lesson.index')" index="index" />
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="my-3 text-end">
                        <a href="{{ route('lesson.create') }}" class="btn btn-primary waves-effect waves-light">Add New</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Tables Without Borders -->
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Content</th>
                                <th scope="col" class="text-center">Course Name</th>
                                <th scope="col" class="text-center">Visibility</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lessons as $key => $lesson)
                                <tr>
                                    <td >{{ ++$key }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('lesson.show', $lesson) }}">{{ $lesson->name }}</a>
                                    </td>
                                    <td class="text-center" style="width: 40%">{!! $lesson->content !!}</td>
                                    <td class="text-center">{{ optional($lesson->course)->name }}</td>
                                    <td class="text-center">{{ $lesson->visibility }}</td>
                                    <td class="text-center">
                                        <div class="hstack gap-3 fs-19 justify-content-center">
                                            <a href="{{ route('lesson.edit', $lesson) }}" class="link-primary fs-18"><i
                                                    class="ri-edit-fill "></i></a>
                                            <form action="{{ route('lesson.destroy', $lesson) }}" method="post"
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
                                <td colspan="6" class="text-center text-danger fw-semibold fs-6">Lessons Not Found!</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $lessons->links() }}
                    </div>

                </div>
            </div>
        </div>
        <!-- container-fluid -->

    </div>
@endsection
