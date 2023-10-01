@extends('layouts.app')
@section('contents')

@auth
    Logined
@else
    UnLogined
@endauth

@endsection
