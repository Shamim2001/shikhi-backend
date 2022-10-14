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
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Review Create</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('review.index') }}">Review</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
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
                                <div class="col-lg-12 position-relative mb-5">
                                    <h5 class="fw-semibold ">Courses</h5>
                                    <select class="js-example-basic-single p-3" name="state">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
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

@section('script')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endsection
