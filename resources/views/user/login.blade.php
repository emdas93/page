@extends('../layouts.app')
@section('contents')
	<div class="content-header">
		<h3>로그인</h3>
		<hr>
	</div>
	<div class="content">
		<form action="{{route('user.login')}}" method="post">
			@csrf
			<div class="mb-3">
				<label for="user_email" class="form-label">이메일</label>
				<input type="email" name="user_email" class="form-control" id="user_email" aria-describedby="emailHelp">
				<div id="emailHelp" class="form-text"></div>
			</div>
			<div class="mb-3">
				<label for="user_password" class="form-label">Password</label>
				<input type="password" name="user_password" class="form-control" id="user_password">
			</div>
			<button type="submit" class="btn btn-primary">로그인</button>
		</form>
	</div>
@endsection

