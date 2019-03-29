@extends("website.layouts.main")

@section('content')

    @foreach($posts as $post)
        @include("website/pages.components.post_card")
    @endforeach

    {{ $posts->links() }}
@endsection
