<table class="table table-responsive" id="imprints-table">
    <thead>
    <tr>
        <th>Text</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($imprints as $imprint)
        <tr>
            <td>{!! $imprint->text !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('imprints.show', [$imprint->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('imprints.edit', [$imprint->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>