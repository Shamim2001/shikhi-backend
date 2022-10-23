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
            <x-page-title page="Add New User" text="User"  :route="route('user.index')" index="index" />
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
                        class="row g-3 needs-validation">
                        @csrf
                        <div class=" col-md-6 position-relative mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="type course name" required>
                            <div class="">
                                @error('name')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class=" col-md-6 position-relative mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control lowercase" name="username" id="username"
                                placeholder="type heree" required>
                            <div class="">
                                @error('username')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class=" col-md-6 position-relative mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="type course name" required>
                            <div class="">
                                @error('password')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class=" col-md-6 position-relative mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="type course name" required>
                            <div class="">
                                @error('email')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class=" col-md-6 position-relative mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="type course name" required>
                            <div class="">
                                @error('phone')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- image upload-->
                        <div class=" col-md-6 position-relative mb-3">
                            <label for="thumbnail" class="form-label" style="font-size: 1rem">Thumbnail</label>
                            <div class="">
                                 <input class="filepond" type="file" name="thumbnail">
                            </div>

                            <div class="mt-2">
                                @error('phone')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2 text-end my-2">
                            <button class="btn btn-primary" type="submit">Create</button>
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

        // register the plugins with FilePond
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageTransform
        );

        const inputElement = document.querySelector('#thumbnail');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            storeAsFile: true
        });
    </script>
@endsection
