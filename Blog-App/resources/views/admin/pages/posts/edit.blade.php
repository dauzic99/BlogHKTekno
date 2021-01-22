@extends('admin.layout.template')
@section('title')
    POST EDIT
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/selectric.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg=="
        crossorigin="anonymous" />
@endsection




@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="/posts" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Post</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/posts">Posts</a></div>
                    <div class="breadcrumb-item">Edit Post</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Post</h2>
                <p class="section-lead">
                    On this page u can edit your previously created post.
                </p>



                <div class="card">
                    <div class="card-header">
                        <h4>Edit Post About {{ $post->title }}</h4>
                    </div>
                    <div class="card-body">

                        <form method="post" action="/posts/update/{{ $post->slug }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    {{-- title --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left ">Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ $post->title }}">
                                                @error('title')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- genre --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left">Genre</label>
                                                <select class="form-control selectric" name="genre_id">
                                                    @foreach ($genre as $item)
                                                        <option value="{{ $item->id }}" @if ($post->genre_id == $item->id)
                                                            selected
                                                    @endif
                                                    >{{ $item->genre_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('genre_id')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- content --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left">Content</label>
                                                <textarea class="summernote" name="content">{{ $post->content }}</textarea>
                                                @error('content')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                    {{-- status --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group  mb-4">
                                                <label class="form-label text-md-left ">Status</label>
                                                <div class="">
                                                    <select class="form-control selectric" name="status">
                                                        <option @if ($post->status == 'Publish') selected @endif>Publish</option>
                                                        <option @if ($post->status == 'Draft') selected @endif>Draft</option>
                                                        <option @if ($post->status == 'Pending') selected @endif>Pending</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    {{-- tags --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left">Tags</label>
                                                <div class="">
                                                    <input type="text" class="inputtags form-control" name="tags"
                                                        value="{{ $post->tags }}">
                                                </div>
                                                @error('tags')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- cover --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label class="form-label text-md-left ">Cover</label>
                                                <div class="">

                                                    <input type="file" name="cover" placeholder="Choose image" id="image">

                                                </div>
                                                @error('cover')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <img id="preview-image-before-upload"
                                                src="{{ asset('/images/post/cover/' . $post->cover) }}" alt="preview image"
                                                style="max-height: 250px;" class="img-fluid">
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>
                    <div class="card-footer">
                        <div class="form-group mb-4">
                            <label class="form-label text-md-left "></label>
                            <div class="">
                                <button class="btn btn-primary" type="submit">Create Post</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/jquery.selectric.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"
        integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g=="
        crossorigin="anonymous"></script>
    <script src="{{ asset('stisla-master\assets\js\upload\jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('stisla-master/assets/js/page/features-post-create.js') }}"></script>
    <script>
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

    </script>
@endsection
