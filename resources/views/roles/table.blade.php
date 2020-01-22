<div class="table-responsive-sm">
    <table class="table table-responsive table-bordered table-striped" id="roles-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Id')</th>
        <th>@lang('Title')</th>
        <th>@lang('Desc')</th>
            <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{!! $role->id !!}</td>
            <td>{!! $role->title !!}</td>
            <td>{!! $role->desc !!}</td>
                <td>
                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('roles.show', [$role->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('roles.edit', [$role->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>