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


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#questionModal">
        Edit Question
    </button>
  
</div>

<div class="modal" id="questionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="display_text">Display Text</label>
                    <input type="text" class="form-control" name="display_text" id="display_text" placeholder="Display Text" value="{{$question->display_text}}" />
                </div>
                <div class="form-group">
                    <label for="question_text">Question Text</label>
                    <textarea class="form-control" name="question_text" id="question_text" rows="3">{{ $question->question_text}}</textarea>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="required" id="required" value="{{ $question->required }}"> Required
                    </label>
                </div>
                <div class="form-group">
                <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="type" aria-describedby="helpId" placeholder="Type" value="{{ $question->type }}" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop