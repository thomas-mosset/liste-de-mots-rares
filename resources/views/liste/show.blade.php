@extends('base') <!-- fichier base.blade.php -->

@section('title', $word->word)

@section('content')
    <div>
        <div>
            <h1>{{ $word->word }}</h1>

            @if ($word->pronunciation !== null)
                <span>({{ $word->pronunciation }})</span>
            @endif
        </div>
        
        <span>{{ $word->type }}</span>

        <p>{{ $word->definition }}</p>

        @if ($word->exemple !== null)
            <p>Ex: {{ $word->exemple }}</p>
        @endif
    </div>
@endsection