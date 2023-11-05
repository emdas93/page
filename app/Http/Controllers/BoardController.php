<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /** TODOLIST
     * 게시판 ID에 따라 표시하도록
     * 유저가 가지고 있는 게시판만 보일 수 있도록
     * 관리자계정의 경우 모든 게시판을 다 볼 수 있도록
     * */

     public function index(Request $request, $board_id = 0, $page_no = 1) {
        $data = [];

        $paginate = 15;
        $currentPage = $page_no;

        $boards = new Board();
        $posts = new Post();

        $data['boards'] = $boards->get();
        $data['posts'] = $posts->addSelect(['post_user_name' => User::select('user_name')->whereColumn('user_id', 'users.id')])
                               ->orderBy('id', 'DESC')
                               ->paginate($paginate, ['*'], 'page', $page_no);

        if ($board_id == 0) {
            $data['current_board_id'] = 0;
            $data['board_title'] = '전체게시판';
        } else if ($board_id != 0) {
            $data['board_title'] = 'a';
            $data['current_board_id'] = $board_id;
            $data['posts'] = $posts->addSelect(['post_user_name' => User::select('user_name')->whereColumn('user_id', 'users.id')])
                                ->where('board_id', $board_id)            
                                ->orderBy('id', 'DESC')
                                ->paginate($paginate, ['*'], 'page', $currentPage);
        }

        

        // 페이지네이션을 위한 계산
        $pageBlockCount = 0;        // 총 블록 수
        $blockPerPage = 10;         // 한 블록당 표시할 페이지 수
        $currentPageBlockStart = 0; // 표시하고자 하는 페이지 블록 시작 인덱스
        $currentPageBlockEnd = 0;   // 표시하고자 하는 페이지 블록 끝 인덱스

        // 페이지 링크를 생성할 인덱스를 구한다.
        // 시작 인덱스 = 올림(현재페이지 / 블록당표시페이지수) * 블록당표시페이지수 - (블록당표시페이지수-1)
        // 끝 인덱스 = 올림(현재페이지 / 블록당표시페이지수) * 블록당표시페이지수
        $currentPageBlockStart = ceil(($currentPage / $blockPerPage)) * $blockPerPage - ($blockPerPage - 1);
        $currentPageBlockEnd = ceil(($currentPage / $blockPerPage)) * $blockPerPage;
        
        $data['currentPage'] = $currentPage;
        $data['currentPageBlockStart'] = $currentPageBlockStart;
        $data['currentPageBlockEnd'] = $currentPageBlockEnd;
        $data['nextPageBlockStart'] = $currentPageBlockEnd + 1;
        $data['prevPageBlockEnd'] = $currentPageBlockStart - 1;

        if($data['currentPageBlockStart'] == 1) {
            $data['prevPageBlockEnd'] = -1;
        }

        // 마지막 블록 인덱스가 계산에 의해 없는 블록이 나올 수 있으므로
        if($data['currentPageBlockEnd'] > $data['posts']->lastPage()) {
            $data['currentPageBlockEnd'] = $data['posts']->lastPage();
            $data['nextPageBlockStart'] = -1;
        }





        return view('board.index', $data);
     }

    public function postView(Request $request, $board_id, $page_no, $post_id) {
        
        $post = new Post();

        $data['board_id'] = $board_id;
        $data['page_no'] = $page_no;

        $data['post'] = $post->where([
            'id' => $post_id])->get();

        return view('board.post', $data);
    }

    // public function index(Request $request, $boardId = null, $pageNo = 1)
    // {
    //     $data = [];

    //     /**
    //      * 페이지네이션
    //      * */
    //     $paginate = 15; // 한 페이지에 표시할 게시글 수
    //     $currentPage = $pageNo; // 현재 표시하고자 하는 페이지

    //     $data['board_title'] = __('board.allPost');

    //     // Post GET
    //     $posts = new Post();

    //     // 쿼리문 조건 분기 (게시판 번호가 파라메터로 들어온지 확인)
    //     $data['posts'] = $posts->addSelect(['post_user_name' => User::select('user_name')->whereColumn('user_id', 'users.id')])
    //                     ->orderBy('id', 'DESC')
    //                     ->paginate($paginate, ['*'], 'page', $currentPage);
        
    //     if($boardId != null) {
    //         $data['posts'] = $posts->addSelect(['post_user_name' => User::select('user_name')->whereColumn('user_id', 'users.id')])
    //                     ->where('board_id', $boardId)            
    //                     ->orderBy('id', 'DESC')
    //                     ->paginate($paginate, ['*'], 'page', $currentPage);
    //     }
                        
    //     // 페이지네이션을 위한 계산
    //     $pageBlockCount = 0;        // 총 블록 수
    //     $blockPerPage = 10;         // 한 블록당 표시할 페이지 수
    //     $currentPageBlockStart = 0; // 표시하고자 하는 페이지 블록 시작 인덱스
    //     $currentPageBlockEnd = 0;   // 표시하고자 하는 페이지 블록 끝 인덱스

    //     // 페이지 링크를 생성할 인덱스를 구한다.
    //     // 시작 인덱스 = 올림(현재페이지 / 블록당표시페이지수) * 블록당표시페이지수 - (블록당표시페이지수-1)
    //     // 끝 인덱스 = 올림(현재페이지 / 블록당표시페이지수) * 블록당표시페이지수
    //     $currentPageBlockStart = ceil(($currentPage / $blockPerPage)) * $blockPerPage - ($blockPerPage - 1);
    //     $currentPageBlockEnd = ceil(($currentPage / $blockPerPage)) * $blockPerPage;
        
    //     $data['currentPage'] = $currentPage;
    //     $data['currentPageBlockStart'] = $currentPageBlockStart;
    //     $data['currentPageBlockEnd'] = $currentPageBlockEnd;
    //     $data['nextPageBlockStart'] = $currentPageBlockEnd + 1;
    //     $data['prevPageBlockEnd'] = $currentPageBlockStart - 1;

    //     if($data['currentPageBlockStart'] == 1) {
    //         $data['prevPageBlockEnd'] = -1;
    //     }

    //     // 마지막 블록 인덱스가 계산에 의해 없는 블록이 나올 수 있으므로
    //     if($data['currentPageBlockEnd'] > $data['posts']->lastPage()) {
    //         $data['currentPageBlockEnd'] = $data['posts']->lastPage();
    //         $data['nextPageBlockStart'] = -1;
    //     }

    //     /**
    //      * 게시판 리스트 로드
    //      * */
    //     $boards = new Board();
    //     $data['boards'] = $boards->get();
    //     if($boardId != null)
    //         $data['current_board_id'] = $boardId;
    //     else
    //         $data['current_board_id'] = 0;

    //     return view('board.index', $data);
    // }

    // public function postView(Request $request, $boardId, $pageNo, $postId) {
    //     $data['post'] = Post::where([
    //         'id' => $postId,
    //         'board_id' => $boardId])->get();
    //     $data['boardId'] = $boardId;
    //     $data['pageNo'] = $pageNo;
        
    //     $paginate = 15; // 한 페이지에 표시할 게시글 수

    //     $posts = new Post();
    //     $targetData = $posts
    //                 ->orderBy('id', 'DESC')
    //                 ->paginate($paginate, ['*'], 'page');

    //     return view('board.post', $data);
    // }

}
