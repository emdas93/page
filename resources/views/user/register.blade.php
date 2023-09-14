@extends('../layouts.app')
@section('contents')
	<div class="content-header">
		<h3>회원가입</h3>
		<hr>
	</div>
	<div class="content">
		<form action="{{route('user.register')}}" method="post">
			@csrf
            <div class="mb-3">
				<label for="user_name" class="form-label">이름</label>
				<input type="text" name="user_name" class="form-control" id="user_name" aria-describedby="nameHelp">
				<div id="nameHelp" class="form-text text-danger">@error('user_name') {{ $message }}	@enderror</div>
			</div>

			<div class="mb-3">
				<label for="user_email" class="form-label">이메일</label>
				<input type="email" name="user_email" class="form-control" id="user_email" aria-describedby="emailHelp">
				<div id="emailHelp" class="form-text text-danger">@error('user_email') {{ $message }}	@enderror</div>
			</div>
			
            <div class="mb-3">
				<label for="user_password" class="form-label">비밀번호</label>
				<input type="password" name="user_password" class="form-control" id="user_password">
				<div id="passwordHelp" class="form-text text-danger">@error('user_password') {{ $message }}	@enderror</div>
			</div>

            <div class="mb-3">
				<label for="user_password" class="form-label">비밀번호 확인</label>
				<input type="password" name="user_password_confirm" class="form-control" id="user_password">
				<div id="passwordConfirmHelp" class="form-text text-danger">@error('user_password_confirm') {{ $message }}	@enderror</div>
			</div>
			<button type="submit" class="btn btn-primary">회원가입</button>

		</form>
		
	</div>
@endsection

