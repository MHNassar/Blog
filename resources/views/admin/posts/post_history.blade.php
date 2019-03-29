<table class="table table-responsive" id="posts-table">
    <thead>
    <tr>
        <th>Title</th>
        <th>Text</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($post->history as $post)
        <tr>
            <td>{!! $post->title !!}</td>
            <td>{!! $post->text !!}</td>
            <td>{!! $post->date !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>