@extends('layout')

@section('page-header', 'USER')
@section('page-desc', 'Edit user information.')

@section('content')
<div>
	This is the show user page.
</div>
@endsection

@section('js')
<script>
	document.getElementById('card-size').classList.remove('col-start-3', 'col-end-5');
	document.getElementById('card-size').classList.add('col-start-2', 'col-end-6');
</script>
@endsection
