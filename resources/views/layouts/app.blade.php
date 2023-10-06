<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{asset('/css/app.css')}}">
	@yield('styleAssets')
	<title>Index Page</title>

	<style>
		/* html{
			width: 100%;
			height: 100%;
		}
		body {
			width: 100%;
			height: 100%;
		} */

	</style>
</head>

<body>
	<header>
		{{-- 글로벌 네비게이션 시작 --}}
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><i class="bi bi-list" id="sideBarToggleBtn"></i></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link @if (url()->current() == route('home.index')) active @endif" aria-current="page" href="{{route('home.index')}}">홈</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @if (url()->current() == route('board.index')) active @endif" href="{{route('board.index')}}">게시판</a>
					</li>
				</ul>
				<ul class="navbar-nav col-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							메뉴
						</a>
						<ul class="dropdown-menu dropdown-menu-lg-end">
							@auth
							<form action="{{route('user.logout')}}" method="post">
								<li>
									@csrf
									<input class="dropdown-item" type='submit' value="로그아웃"/>
								</li>
							</form>		
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="{{route('user.infoView')}}">내 정보</a></li>
							@else
							<li><a class="dropdown-item" href="{{route('user.loginView')}}">로그인</a></li>
							<li><a class="dropdown-item" href="{{route('user.registerView')}}">회원가입</a></li>
							@endauth
						</ul>
					</li>
				</ul>
				</div>
			</div>
		</nav>
		{{-- 글로벌 네비게이션 끝 --}}
		
		{{-- 사이드바 시작 --}}
		{{-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
			Link with href
		</a>
		<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
			Button with data-bs-target
		</button>
		
		<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<div>
					Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
				</div>
				<div class="dropdown mt-3">
					<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
						Dropdown button
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</div>
			</div>
		</div> --}}
		{{-- 사이드바 끝 --}}
	</header>

	<div class="wrap d-flex flex-row">

		<nav class="sidebar w-25" id="sideBar">
			<div class="sidebar-header">
				Name
			</div>
			<div class="list-group list-group-flush">
				<a href="#" class="list-group-item list-group-item-action active" aria-current="true">
					The current link item
				</a>
				<a href="#" class="list-group-item list-group-item-action">A second link item</a>
				<a href="#" class="list-group-item list-group-item-action">A third link item</a>
				<a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
				<a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
			</div>
		</nav>

		<section class="container contents">
			@yield('contents')
		</section>
	</div>

	<script src="{{asset('/js/app.js')}}"></script>
	@yield('javascriptAssets')
</body>
</html>