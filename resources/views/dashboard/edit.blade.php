@extends('dashboard.templates.layout')

@section('container')
    <h1>Create Post</h1>

    <div class="col-lg-8 mb-3">
        <form action="/dashboard/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" placeholder="Title"
                    required value="{{ old('title', $post->title) }}" name="title">
                @error('title')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug"
                    required value="{{ old('slug', $post->slug) }}" name="slug">
                @error('slug')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) === $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Imgae</label>
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid col-sm-5 my-3 d-block">
                @else
                    <img class="img-preview img-fluid col-sm-5 my-3 ">
                @endif
                @error('image')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="summary-ckeditor" class="form-label">Body</label>
                <textarea class="form-control" id="summary-ckeditor" name="body" rows="3">
                @if (old('body'))
                    {{ old('body') }}
                @elseif ($post->body)
                    {{ $post->body }}
                @endif
                </textarea>
            </div>

            <button type=" submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/post/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
