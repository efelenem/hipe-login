<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="{{ asset('storage/js/tailwindcss.js') }}"></script>
	<title>Hipe Login</title>
</head>
<body class="text-sm text-gray-900">
	<div class="grid grid-cols-6 gap-2 my-12">
		<div id="card-size" class="w-full col-start-2 col-end-6 shadow-md rounded-md">
			<div class="px-12 py-6 bg-white border border-gray-100 rounded-t-md">
				<div class="mb-4 space-y-2">
					<h1 class="text-xl">@yield('page-header')</h1>
					<p class="text-gray-500">@yield('page-desc')</p>
				</div>
				@yield('content')
			</div>
			<div class="py-6 w-full bg-gray-100 rounded-b-md"></div>
		</div>
	</div>
	@yield('js')
</body>
</html>
