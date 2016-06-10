@include('layouts/user/header')

<div id="sidenav" class="sidenav">
	@include('partials.userSidebar')
</div>
<div id="main">
	@include('partials.userAlerts')
	<!-- - Content - -->
	@yield('content')
	<!-- - End Content - -->
</div>

@include('layouts/user/footer')
