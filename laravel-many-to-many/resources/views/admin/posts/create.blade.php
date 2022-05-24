@extends('layouts.admin')

@section('pageTitle', 'Create new posts')

@section('pageMain')
    <div class="container">

        <h2 class="fw-bold"> CREA UN NUOVO POST:</h2>
        <h3 class="mb-4">Inserisci qui il titolo, il relativo slug e il contenuto del tuo post!</h3>
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('admin.posts.store') }}">

                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                      </div>
                    @error('title')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                    </div>
                    <input type="button" class="btn btn-warning fw-bold mb-4" value="Generate slug" id="btn-slugger">
                    @error('slug')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold" style="color: rgb(255, 119, 0)">Content</label>
                        <textarea type="text" class="form-control" id="content" name="content"> {{ old('content') }} </textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror


                    <!-- CATEGORIE -->

                    <select class="form-select d-block mt-4 fw-bold" aria-label="Default select example" name="category_id" id="category">
                        <option class="fw-bold" value="" selected >CHOOSE A CATEGORY</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                

                    <button type="submit" class="btn btn-primary mt-4 fw-bold">SAVE</button>

                    <a class="btn btn-success mt-4 fw-bold ms-4" href="{{ url()->previous() }}" role="button">BACK</a>

                </form>
            </div>
        </div>
    </div>
@endsection