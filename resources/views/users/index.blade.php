@extends('layout')

@section('page-header', 'USER')
@section('page-desc', 'Add, update or remove user.')

@section('content')
<div class="w-full">
	@if (session('removed'))
		<div class="my-1 py-1 text-red-500 font-semibold uppercase">
			{{ session('removed') }}
		</div>
	@endif
	@if($users)
		@foreach ($users as $user)
			<div class="mt-1 p-4 border border-gray-200 rounded hover:border-gray-300 hover:shadow">
				<div class="flex space-x-2">
					<div class="w-1/2 px-1 flex space-x-2 items-center">
						<div>{{ $user->name }} <span class="text-gray-500 hover:underline">{{ $user->email }}</span></div>
						<div>({{ ucfirst($user->roles->role) }})</div>
					</div>
					<div class="w-1/2 flex justify-end space-x-3 items-center">
						<div><a href="{{ route('users.show') }}/{{ Crypt::encrypt($user->id) }}" class="text-blue-500 hover:underline font-semibold">Edit</a></div>
						@if (
							$user->id != auth()->user()->id &&
							auth()->user()->roles->id == 1 &&
							$user->roles->id != 1
						)
							<div class="text-gray-300">|</div>
							<div>
								<form action="{{ route('users.delete') }}/{{ Crypt::encrypt($user->id) }}" method="POST">
									@csrf
									<button class="text-gray-400 hover:text-red-500 font-semibold">Remove</button>
								</form>
							</div>
						@endif
					</div>
				</div>
			</div>
		@endforeach
		<div class="my-3">{{ $users->links() }}</div>
	@else
		No users yet.
	@endif
	<div class="py-3 mt-4 w-full border-t border-gray-300">
		<div class="flex space-x-2">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
				<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
			</svg>
			<h1 class="mb-3 font-semibold">ADD USER HERE</h1>
		</div>
		@if (session('success'))
			<div class="my-1 py-1 text-green-500 font-semibold uppercase">
				{{ session('success') }}
			</div>
		@endif
		<form action="{{ route('users.create') }}" method="post" id="add-user-form">
			@csrf
			<div class="px-3 py-1 border border-gray-200 rounded-md hover:border-blue-500">
				<input type="text" name="name" id="name"
					autocomplete="off" placeholder="Name"
					class="p-1 w-full bg-transparent outline-none"
				>
			</div>
			@error('name')
				<div class="my-1 text-xs text-red-500 font-semibold">{{ $message }}</div>
			@enderror
			<div class="px-3 py-1 mt-3 border border-gray-200 rounded-md hover:border-blue-500">
				<input type="email" name="email" id="email"
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
				>ADD USER</button>
			</div>
		</form>
	</div>
</div>
<div class="mt-3 text-right">
	<a href="{{ route('logout') }}" class="text-gray-400 hover:text-blue-500 font-semibold">SIGN OUT</a>
</div>
@endsection

@section('js')
<script>
	document.getElementById('card-size').classList.remove('col-start-3', 'col-end-5');
	document.getElementById('card-size').classList.add('col-start-2', 'col-end-6');
</script>
@endsection
