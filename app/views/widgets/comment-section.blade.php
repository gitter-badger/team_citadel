<div class="well">

    <!-- Create new comment section -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h3>Comment on this deck:</h3>
                {{ Form::open(['route' => ['comment.show']]) }}
                    {{ Form::textarea('comment', null, [
                        'class' => 'form-control',
                        'size' => '30x5'
                        ]); }}
                    {{ Form::submit('Save', ['class' => 'btn btn-primary pull-right'])}}
                    {{ Form::hidden('id', $type->id) }}
                    {{ Form::hidden('type', get_class($type)) }}
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
                        {{{ $comment->comment }}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>