<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@include('site.shared.head')
	<script>
	</script>
</head>
<body>
	<main>
		@yield('menu')
		<div class="container">@yield('content')</div>
	</main>
	@include('site.shared.footer')
</body>
</html>