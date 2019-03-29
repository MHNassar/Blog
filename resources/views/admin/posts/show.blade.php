@extends('admin/layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Post
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin/posts.show_fields')
                    <h3>Post History (Older version)</h3>
                    @if(count($post->history)>0)
                        @include('admin/posts.post_history')

                    @endif
                    <a href="{!! route('posts.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
