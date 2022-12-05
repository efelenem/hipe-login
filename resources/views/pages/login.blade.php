@extends('layout')

@section('page-header', 'SIGN IN')
@section('page-desc', 'Please enter your email and password.')

@section('content')
<div class="w-full">
	<form action="/login" method="post" id="login-form">
		@csrf
		<div class="px-3 py-1 border border-gray-200 rounded-md hover:border-blue-500">
			<input type="email" name="email" id="email"
				value="{{ @old('email') }}"
				autocomplete="off" placeholder="Email"
				class="p-1 w-full bg-transparent outline-none"
			>
		</div>
		@error('email')
			<div class="my-1 text-xs text-red-500 font-semibold">{{ $message }}</div>
		@enderror
		<div class="px-3 py-1 mt-3 border border-gray-200 rounded-md hover:border-blue-500">
			<input type="password" name="password" id="password"
				autocomplete="off" placeholder="Password"
				class="p-1 w-full bg-transparent outline-none"
			>
		</div>
		@error('password')
			<div class="my-1 text-xs text-red-500 font-semibold">{{ $message }}</div>
		@enderror
		<div id="button-container" class="mt-3">
			<button form="login-form"
				class="w-full p-2 bg-blue-500 text-white text-center tracking-wide rounded-md outline-none hover:bg-blue-600 active:bg-blue-500"
			>Sign In</button>
		</div>
	</form>
</div>
@endsection

@section('js')
<script>
	document.getElementById('card-size').classList.remove('col-start-2', 'col-end-6');
	document.getElementById('card-size').classList.add('col-start-3', 'col-end-5');
</script>
@endsection
