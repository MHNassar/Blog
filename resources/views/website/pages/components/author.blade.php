<div class="col-sm-12 mb-4">
    <h3>Authors List</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->name}}</td>
                <td>{{$author->email}}</td>
                <td><a href="{{url('admin/home')}}"> Enter</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
