@extends('backend.layouts.master')

@section('title', 'Create')
@section('css')
    <style>
        .visibility_ {
            width: 100%;
            padding: 180px;
            padding: 1rem;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ced4da;
            box-shadow: 0 7px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <x-page-title page="Add new Review" text="Review"  :route="route('review.index')" index="index" />
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data"
                        class="row g-3 needs-validation">
                        @csrf
                        <div class="d-flex justify-content-between gap-4">
                            <div class="flex-1">
                                <div class="position-relative mb-5">
                                    <label for="star" class="form-label fs-17">Star</label>
                                    <input type="number" class="form-control" name="star" id="star"
                                        value="{{ old('star') }}" placeholder="type here" required>
                                    <div class="">
                                        @error('star')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Courses -->
                                <div class="col-lg-12 mb-5">
                                    <h5 class="fw-semibold ">Courses</h5>
                                    <select class="w-100 p-2 fs-5" name="course_id">
                                        <option value="none" class="mt-3">Select here</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Contents -->
                                <div class="mb-5 position-relative">
                                    <label for="content" class="form-label fs-17">Content</label>
                                    <x-tinymce-editor name="content"></x-tinymce-editor>
                                    <div class="mt-2">
                                        @error('content')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-25 mt-4">
                                <!-- Visibility -->
                                <div class="col-md-3 position-relative mb-4 visibility_">
                                    <div class="mt-2">
                                        <button class="btn btn-primary w-100" type="submit">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection

