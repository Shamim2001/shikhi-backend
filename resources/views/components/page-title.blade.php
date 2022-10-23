@props(['route', 'text', 'page', 'index'])

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $page }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ $route }}">{{ $text }}</a></li>
                    <li class="breadcrumb-item active">{{ $index }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
