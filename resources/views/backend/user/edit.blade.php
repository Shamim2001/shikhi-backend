@extends('backend.layouts.master')

@section('title', 'Edit')
@section('css')

@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <x-page-title page="Edit User" text="User" :route="route('user.index')" index="index" />
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data"
                        class="row g-3 needs-validation">
                        @csrf
                        @method('PUT')
                        <div class=" col-md-6 position-relative mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="type course name" required value="{{ $user->name }}">
                            <div class="">
                                @error('name')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class=" col-md-6 position-relative mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="type course name" value="{{ $user->username }}" required>
                            <div class="">
                                @error('username')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class=" col-md-6 position-relative mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="type course name" value="{{ $user->password }}" required>
                            <div class="">
                                @error('password')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class=" col-md-6 position-relative mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="type course name" value="{{ $user->email }}" required>
                            <div class="">
                                @error('email')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class=" col-md-6 position-relative mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="type course name" value="{{ $user->phone }}" required>
                            <div class="">
                                @error('phone')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- image upload-->
                        <div class="col-md-6 position-relative mb-3">
                            <label for="thumbnail" class="form-label" style="font-size: 1rem">Thumbnail</label>
                            <div class="card">
                                <input type="file" name="thumbnail" id="thumbnail" value="{{ $user->thumbnail }}">
                            </div>
                            <div class="">
                                @error('thumbnail')
                                    <p class="text-denger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-2 text-end">
                            <button class="btn btn-primary" type="submit">Update</button>
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
        // register the plugins with FilePond
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageTransform,
            FilePondPluginFilePoster,
        );

        const inputElement = document.querySelector('#thumbnail');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            storeAsFile: true,
            files: [{
                // the server file reference
                source: '{{ rand(12, 1232333) }}',

                // set type to local to indicate an already uploaded file
                options: {
                    type: 'local',

                    // optional stub file information
                    file: {
                        name: '{{ $user->thumbnail }}',
                        size: {{ \File::size(public_path('storage/uploads/course/' . $user->thumbnail)) }},
                        type: 'image/png',
                    },

                    // pass poster property
                    metadata: {
                        poster: '{{ getAssetUrl($user->thumbnail, 'storage/uploads/course') }}',
                    },
                },
            }, ],
        });
    </script>
@endsection
