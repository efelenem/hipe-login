@extends('layout')

@section('page-header', 'HOME')
@section('page-desc', 'Welcome, '. ucwords(auth()->user()->name) . '!')

@section('content')
<div class="w-full">
	@if (in_array(auth()->user()->role_id, [1, 2]))
		<div>
			Your role is {{ ucfirst(auth()->user()->roles->role) }}. See user management page <a href="{{ route('users') }}" class="text-blue-500 italic underline">click me</a>.
		</div>
	@else
		<div>
			This is the homepage. You are logged in.
		</div>
	@endif
	<div class="mt-3 text-right">
		<a href="{{ route('logout') }}" class="text-gray-400 hover:text-blue-500 font-semibold">SIGN OUT</a>
	</div>
</div>
@endsection

@section('js')
<script>
	document.getElementById('card-size').classList.remove('col-start-3', 'col-end-5');
	document.getElementById('card-size').classList.add('col-start-2', 'col-end-6');
</script>
@endsection
