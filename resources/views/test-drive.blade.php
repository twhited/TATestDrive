@extends('layouts.app')

@section('content')
<div class="container">
    <h1>TechnologyAdvice</h1>

    <h3>{{ $question->display_text}}</h3>
    <p>
        {{ $question->question_text}}
    </p>

    @foreach ($question->answers as $item)
        <div class="form-check">
            <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
            {{ $item->value }}
            </label>
        </div>
    @endforeach
</div>
@stop