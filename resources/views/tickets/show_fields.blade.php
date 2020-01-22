<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $ticket->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $ticket->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $ticket->status ? 'باز' : 'بسته' !!}</p>
</div>

<!-- Severity Id Field -->
<div class="form-group">
    {!! Form::label('severity_id', __('Severity Id').':') !!}
    <p>{!! $ticket->severity->title !!}</p>
</div>

<!-- Organization Id Field -->
<div class="form-group">
    {!! Form::label('organization_id', __('Organization Id').':') !!}
    <p>{!! $ticket->organization->title !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $ticket->user->name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $ticket->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($ticket->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($ticket->updated_at) !!}</p>
</div>

