<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="severities-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Id')</th>
        <th>@lang('Title')</th>
        <th>@lang('Desc')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($severities as $severity)
            <tr>
                <td>{!! $severity->id !!}</td>
            <td>{!! $severity->title !!}</td>
            <td>{!! $severity->desc !!}</td>
                <td>
                    {!! Form::open(['route' => ['severities.destroy', $severity->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('severities.show', [$severity->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('severities.edit', [$severity->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>