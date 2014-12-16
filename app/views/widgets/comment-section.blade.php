@if(Auth::check())
<div class="well">
@else
<div class="well disabled">
@endif
    <!-- Create new comment section -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h3>Comment on this deck:</h3>
                {{ Form::open(['route' => ['comment.store']]) }}
                    {{ Form::textarea('comment', null, [
                        'class' => 'form-control',
                        'size' => '30x5'
                        ]); }}
                    {{ Form::hidden('id', $type->id) }}
                    {{ Form::hidden('type', get_class($type)) }}
                    <br>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary pull-right'])}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

<!-- show all comments -->
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            @foreach($comments as $comment)
                <tr>
                    <td>
                        Posted {{{ $comment->created_at->diffForHumans() }}} by:

                        {{{ $comment->comment }}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>