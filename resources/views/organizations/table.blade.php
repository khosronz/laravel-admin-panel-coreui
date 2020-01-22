<div class="table-responsive-sm">
    <table class="table table-striped" id="organizations-table" style="display: block;overflow-x: auto; white-space: nowrap;">
        <thead>
        <th>@lang('Id')</th>
        <th>@lang('Title')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
        </thead>
        <tbody>
        @foreach($organizations as $organization)
            <tr>
            <td>{!! $organization->id !!}</td>
            <td>{!! $organization->title !!}</td>
            <td>{!! $organization->desc !!}</td>
                <td>
                    {!! Form::open(['route' => ['organizations.destroy', $organization->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('organizations.show', [$organization->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('organizations.edit', [$organization->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>