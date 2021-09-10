@extends('student_area.layouts.app')

@section('title', $title)

@section('css')
<link rel="stylesheet" href="{!! asset('css/plugins/iCheck/custom.css')!!}" >
<link rel="stylesheet" href="{!! asset('css/animate.css') !!}">
@endsection

@section('content')
	@include($listView)
@endsection


