<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $message->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $message->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $message->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- Ticket Id Field -->
<div class="form-group">
    {!! Form::label('ticket_id', __('Ticket Id').':') !!}
    <p>{!! $message->ticket->title !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $message->user->name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $message->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($message->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($message->updated_at) !!}</p>
</div>

