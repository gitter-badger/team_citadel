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
                {{ Form::open(['route' => ['comment.store'], 'class' => 'comment-form']) }}
                    {{ Form::textarea('comment', null, [
                        'class' => 'form-control',
                        'size'  => '30x5',
                        'id'    => 'comment-form-comment'
                        ]); }}
                    {{ Form::hidden('id', $type->id,  ['id'=>'comment-form-id']) }}
                    {{ Form::hidden('type', get_class($type),  ['id'=>'comment-form-type']) }}
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
        <table class="table table-striped" id="comment-table">
            <tbody>

            @foreach($comments as $comment)
                <tr>
                    <td>
                        {{ link_to_route('user.show', $comment->user['username'], [$comment->user['username']]) }}:
                        {{{ $comment->comment }}}
                        <small>
                            <p>Posted {{{ $comment->created_at->diffForHumans() }}}</p>
                        </small>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>