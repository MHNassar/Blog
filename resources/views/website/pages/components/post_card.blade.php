@if(date_checker($post->date))
    <div class="card col-sm-12 mb-4">
        <div class="card-body">
            <h5 class="card-title">{{date_converter($post->date)}} | <a href="{{url("post/".$post->id)}}"
                                                                        class="card-link"> {{$post->title}} </a></h5>
            <p class="card-text">
                @isset($from_page)
                    {{$post->text}}
                @endisset
                {{text_filter($post->text)}}
            </p>
            <a href="{{url("post/".$post->id)}}" class="card-link">More</a>
            <a href="{{url("author/".$post->author->id)}}" class="card-link">{{$post->author->name}}</a>
        </div>
    </div>
@endif
