@extends('layouts.app')

@section('content')
<div class="container">
    <h1>TechnologyAdvice</h1>

    <question-component :question-data='{!! json_encode($question) !!}' :answer-data='{!! json_encode($question->answers) !!}'>
    </question-component>
</div>
@stop