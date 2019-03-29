<li class="{{ Request::is('posts*') ? 'active' : '' }}">
    <a href="{!! route('posts.index') !!}"><i class="fa fa-edit"></i><span>Posts</span></a>
</li>

<li class="{{ Request::is('imprints*') ? 'active' : '' }}">
    <a href="{!! route('imprints.index') !!}"><i class="fa fa-edit"></i><span>Imprints</span></a>
</li>

