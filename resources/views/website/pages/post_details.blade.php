@extends("website.layouts.main")

@section('content')
    @include('website/pages.components.post_card',["from_page"=>"details"])
    @include('website/pages.components.comment')
@endsection
