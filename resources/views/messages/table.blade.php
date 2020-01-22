<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="messages-table"
           style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('Ticket Id')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{!! $message->title !!}</td>
                <td>{!! $message->status ? 'فعال' : 'غیرفعال' !!}</td>
                <td>{!! $message->ticket->title !!}</td>
                <td>{!! $message->user->name !!}</td>
                <td>{!! $message->desc !!}</td>
                <td>
                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('messages.show', [$message->id]) !!}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>
                        <a href="{!! route('messages.edit', [$message->id]) !!}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>