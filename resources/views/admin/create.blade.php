@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ Route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}">
                @if ($errors->has('title'))
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @elseif ($errors->any() && old('title'))
                    <p class="text-success">Campo inserito correttamente!</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione:</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" value="{{ old('description') }}">
                @if ($errors->has('description'))
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @elseif ($errors->any() && old('description'))
                    <p class="text-success">Campo inserito correttamente!</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Seleziona Tipologia:</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">

                    <option @selected(old('type_id') == '') value="">Nessuna Tipologia</option>

                    @foreach ($types as $type)
                        <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('type_id'))
                    @error('type_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @elseif ($errors->any() && old('type_id'))
                    <p class="text-success">Campo inserito correttamente!</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link progetto:</label>
                <input type="text" step=".01" class="form-control @error('link') is-invalid @enderror" id="link"
                    name="link" value="{{ old('link') }}">
                @if ($errors->has('link'))
                    @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @elseif ($errors->any() && old('link'))
                    <p class="text-success">Campo inserito correttamente!</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="preview_image" class="form-label">Immagine preview:</label>
                <input type="text" class="form-control @error('preview_image') is-invalid @enderror" id="preview_image"
                    name="preview_image" value="{{ old('preview_image') }}">
                @if ($errors->has('preview_image'))
                    @error('preview_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @elseif ($errors->any() && old('preview_image'))
                    <p class="text-success">Campo inserito correttamente!</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary my-4">Crea nuovo fumetto</button>

        </form>

    </div>
@endsection
