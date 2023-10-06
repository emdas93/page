@extends('../layouts.app')
@section('contents')
<div class="content-header">
    <h3>{{ $boardTitle }}</h3>
    <div class="board-select-area text-end">
      <span>게시판 선택 : </span>
      <select class="" id="boardSelect">
          <option value="{{route('board.index')}}" @if($currentBoardId == 0) selected @endif>전체보기</option>
        @foreach($boards as $board)
          <option value="{{route('board.index', ['boardId' => $board->id])}}" @if($board->id == $currentBoardId) selected @endif >{{$board->board_name}}</option>
        @endforeach
      </select>
    </div>
    <hr>
</div>

<div class="content">
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>

            <td><a href="{{route('board.postView', [
              'boardId' => $post->board_id,
              'pageNo' => $currentPage,
              'postId' => $post->id
            ])}}">{{$post->post_title}}</a></td>
            
            <td>{{$post->post_user_name}}</td>
            <td>{{$post->created_at}}</td>
          </tr>
          @endforeach
        </tbody>  
      </table>

      <nav class="" aria-label="Page navigation example">
        <ul class="pagination">
          
          @if($prevPageBlockEnd != -1)
            <li class="page-item">
              <a class="page-link" href="{{route('board.index', ['boardId' => $currentBoardId,'pageNo' => $prevPageBlockEnd])}}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only"></span>
              </a>
            </li>
          @endif

          @for($i = $currentPageBlockStart; $i <= $currentPageBlockEnd; ++$i)
           <li class="page-item @if($i == $currentPage) active @endif"><a class="page-link" href="{{route('board.index', ['boardId' => $currentBoardId,'pageNo' => $i]) }}">{{$i}}</a></li>
          @endfor

          @if($nextPageBlockStart != -1)
            <li class="page-item">
              <a class="page-link" href="{{route('board.index', ['boardId' => $currentBoardId,'pageNo' => $nextPageBlockStart])}}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only"></span>
              </a>
            </li>
          @endif
        </ul>
      </nav>

</div>
@endsection

@section('javascriptAssets')
<script src="{{asset('js/board/index.js')}}"></script>
@endsection