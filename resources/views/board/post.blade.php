@extends('../layouts.app')
@section('contents')
<div class="content-header">
    <h3>{{$post[0]->post_title}}</h3>
    <hr>
    
    <div class="author-area">
        <p class="text-end">{{__('board.author')}} : {{$post[0]->user_id}}</p>
    </div>
</div>

<div class="content">
    {{$post[0]->post_content}}
</div>

<div class="content-footer">
    <a href="{{route('board.index', [
        'boardId' => $boardId,
        'pageNo' => $pageNo
    ])}}" class="btn btn-primary">{{__('board.list')}}</a>
</div>

@endsection