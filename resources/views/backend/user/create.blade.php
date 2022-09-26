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
                        <h4 class="mb-sm-0">Courses</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data"
                        class="row g-3 needs-validation">
                        @csrf
                        <div class="d-flex justify-content-between gap-4">
                            <div class="flex-1">
                                <div class="position-relative mb-5">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="type course name" required>
                                    <div class="">
                                        @error('name')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- description -->
                                <div class="mb-5 position-relative">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description"></textarea>
                                    <div class="valid-tooltip">
                                        @error('description')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- image upload-->
                                <div class="mb-5 position-relative">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <div class="">
                                        <input type="file" name="thumbnail" id="thumbnail">
                                    </div>
                                </div>
                            </div>
                            <div class="w-25 mt-4">
                                <!-- requirements -->
                                <div class="col-md-4 position-relative mb-4 visibility_">
                                    <div class="border-bottom text-center ">
                                        <h4 class="text-black">Requirements</h4>
                                    </div>
                                    <input type="text" class="form-control py-5" name="requirements" id="requirements"
                                        placeholder="type requirement" required>
                                    <div class="valid-tooltip">
                                        @error('requirements')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Visibility -->
                                <div class="col-md-3 position-relative mb-4 visibility_">
                                    <div class="border-bottom text-center ">
                                        <h4 class="text-black">Visibility</h4>
                                    </div>
                                    <!-- Custom Radio Color -->
                                    <div class="form-check form-radio-primary py-2">
                                        <label class="form-check-label" for="public">
                                            <input class="form-check-input" type="radio" name="visibility" id="public"
                                                value="public" checked>
                                            <label for="public">public</label>
                                        </label>
                                    </div>

                                    <!-- Custom Radio Color -->
                                    <div class="form-check form-radio-primary">
                                        <label class="form-check-label" for="private">
                                            <input class="form-check-input" type="radio" name="visibility" id="private"
                                                value="private" checked>
                                            <label for="private">Private</label>
                                        </label>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-primary w-100" type="submit">Create</button>
                                    </div>

                                    @error('visibility')
                                        <p class="text-denger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="col-md-4 position-relative mb-4 visibility_">
                                    <div class="border-bottom text-center ">
                                        <h4 class="text-black">Category</h4>
                                    </div>

                                    @foreach ($categories as $category)
                                        <div class="form-check py-2">
                                            <input class="form-check-input" type="checkbox" name="category_id"
                                                id="category_id" value="{{ $category->id }}">
                                            <label class="form-check-label" for="category_id">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                    <div class="mt-3 text-center">
                                        <a href="#">Add New Category</a>
                                    </div>
                                    <div class="valid-tooltip">
                                        @error('category_id')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- audience -->
                                <div class="col-md-4 position-relative mb-4 visibility_">
                                    <div class="border-bottom text-center ">
                                        <h4 class="text-black">Audience</h4>
                                    </div>
                                    <input type="text" class="form-control py-5" name="audience" id="audience"
                                        placeholder="type requirement" required>
                                    <div class="valid-tooltip">
                                        @error('audience')
                                            <p class="text-denger">{{ $message }}</p>
                                        @enderror
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
