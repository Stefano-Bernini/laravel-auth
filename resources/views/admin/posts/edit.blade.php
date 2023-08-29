@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center my-5">
                    <div>
                        <h1>Modifica post</h1>
                    </div>
                    <div>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary">Ritorna alla lista dei post</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @if($errors->any)
                    <div class="alerrt alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.posts.update', $post->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-4">
                        <label class="control-label">Titolo</label>
                        <input class="form-control @error('title')is-invalid @enderror" type="text" name="title" id="title" placeholder="Titolo" value="{{ old('title') ?? $post->title }} " required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label class="control-label">Contenuto</label>
                        <textarea class="form-control" name="content" id="content" placeholder="Contenuto">{{ old('content') ?? $post->title }}</textarea>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-sm btn-success">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection