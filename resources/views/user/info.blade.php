@extends('../layouts.app')
@section('contents')
	<div class="content-header">
		<h3>유저 정보</h3>
		<hr>
	</div>
	<div class="content">
        <img src="{{asset('image/profile/다운로드.jpeg')}}" alt="t">
        <p>회원번호 : {{ $userData[0]->id }}</p>
		<p>이름 : {{ $userData[0]->user_name }}</p>
        <p>이메일 : {{ $userData[0]->user_email }}</p>
        <p>유저등급 : {{ $userData[0]->user_grade }}</p>
        <p>가입일자 : {{ $userData[0]->created_at }}</p>
	</div>
@endsection

