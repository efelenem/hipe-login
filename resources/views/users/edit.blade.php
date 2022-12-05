@extends('layout')

@section('page-header', 'USER')
@section('page-desc', 'Update user information.')

@section('content')
<div class="w-full">
	@if (session('success'))
		<div class="my-1 py-1 text-green-500 font-semibold uppercase">
			{{ session('success') }}
		</div>
	@endif
	<form action="{{ route('users.update') }}/{{ $user->enc_id }}" method="post" id="add-user-form">
		@csrf
		<div class="px-3 py-1 border border-gray-200 rounded-md hover:border-blue-500">
			<input type="text" name="name" id="name"
				value="{{ $user->name }}"
				autocomplete="off" placeholder="Name"
				class="p-1 w-full bg-transparent outline-none"
			>
		</div>
		@error('name')
			<div class="my-1 text-xs text-red-500 font-semibold">{{ $message }}</div>
		@enderror
		<div class="px-3 py-1 mt-3 border border-gray-200 rounded-md hover:border-blue-500">
			<input type="email" name="email" id="email"
				value="{{ $user->email }}"
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
		<select name="role" id="role"
			class="px-3 py-2 mt-3 w-full border border-gray-200 rounded-md hover:border-blue-500"
		>
			<option selected disabled> - select a role - </option>
			@forelse ($roles as $role)
				<option value="{{ $role->id }}">{{ ucfirst($role->role) }}</option>
			@empty
				<option disabled>No roles available.</option>
			@endforelse
		</select>
		@error('role')
			<div class="my-1 text-xs text-red-500 font-semibold">{{ $message }}</div>
		@enderror
		<div id="button-container" class="mt-3">
			<button form="add-user-form"
				class="w-full p-2 bg-blue-500 text-white text-center tracking-wide rounded-md outline-none hover:bg-blue-600 active:bg-blue-500"
			>UPDATE</button>
		</div>
	</form>
	<div class="mt-3 text-right">
		<a href="{{ route('users') }}" class="text-gray-400 hover:text-blue-500 font-semibold">GO BACK</a>
	</div>
</div>
@endsection

@section('js')
<script>
	document.getElementById('card-size').classList.remove('col-start-3', 'col-end-5');
	document.getElementById('card-size').classList.add('col-start-2', 'col-end-6');
</script>
@endsection
