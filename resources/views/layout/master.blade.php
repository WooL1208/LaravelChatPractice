<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>@yield("title")</title>
</head>
<style>
	body {
		background: #FFF
	}
	#topmenu a {
		font-size: 12px;
	}
	.pagination {
   		justify-content: center;
	}
</style>
<body>
	<div class="container">
    	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    	    <a class="navbar-brand" href="#">留言板</a>
    	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    	        <span class="navbar-toggler-icon"></span>
    	    </button>
    	    <div class="collapse navbar-collapse" id="navbarNav">
    	        <ul class="navbar-nav mr-auto">
    	            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
    	                <a class="nav-link" href="{{ url('/') }}">{{ trans('index.list') }}</a>
    	            </li>
    	            @if (session()->has("userID"))
    	            	<li class="nav-item {{ Request::is('add') ? 'active' : '' }}">
    	            	    <a class="nav-link" href="{{ url('add') }}">{{ trans('index.addPost') }}</a>
    	            	</li>
    	            @else
						<li class="nav-item disabled">
    	            	    <a class="nav-link" href="#">{{ trans('index.addPost') }}</a>
    	            	</li>
    	            @endif

                    @if (session('lang') == "zh-TW")
                        <li class="nav-item">
    	               	   <a class="btn btn-primary mr-1" href="{{ url('lang/zh-TW') }}" name="lang" value="zh-TW">繁體中文</a>
    	               	   <a class="btn btn-light mr-1" href="{{ url('lang/zh-CN') }}" name="lang" value="zh-CN">简体中文</a>
    	                </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-light mr-1" href="{{ url('lang/zh-TW') }}" name="lang" value="zh-TW">繁體中文</a>
                            <a class="btn btn-primary mr-1" href="{{ url('lang/zh-CN') }}" name="lang" value="zh-CN">简体中文</a>
                        </li>
                    @endif
    	        </ul>
    	        <ul class="navbar-nav">
    	        	@if (session()->has("userID"))
  						<li class="nav-item {{ Request::is('sign-out') ? 'active' : '' }}">
    	            	    <a class="nav-link" href="{{ url('sign-out') }}">{{ trans('index.signout') }}</a>
    	            	</li>
					@else
    	            	<li class="nav-item {{ Request::is('sign-in') ? 'active' : '' }}">
    	            	    <a class="nav-link" href="{{ url('sign-in') }}">{{ trans('index.signin') }}</a>
    	            	</li>
    	            	<li class="nav-item {{ Request::is('sign-up') ? 'active' : '' }}">
    	            	    <a class="nav-link" href="{{ url('sign-up') }}">{{ trans('index.signup') }}</a>
    	            	</li>
  					@endif
    	        </ul>
    	    </div>
    	</nav>
	</div>
	<div class="content m-0">
		@if ($errors AND count($errors))
			<ul  class="alert-danger">
				@foreach ($errors->all() as $err)
				<li>{{$err}}</li>
				@endforeach
			</ul>
		@endif
		@yield('content')
	</div>
</body>
</html>