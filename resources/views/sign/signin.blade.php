@php($title = "會員登入")
@extends('layout.master')
@section('title', $title)
@section('content')
@if (isset($tryAgain))
	<ul  class="alert-danger">
		<li>{{$tryAgain}}</li>
	</ul>
@endif
<form method="post">
	{{csrf_field()}}
	<div style="width: 500px; margin: 0 auto;">
		<table class="table table-bordered" align="center">
		  <tbody>
		    <tr>
		    	<td class="bg-primary text-center text-white" colspan="2">{{ trans('index.signin') }}</td>
		    </tr>
		    <tr>
		    	<td>{{ trans('index.account') }}</td>
		    	<td><input type="text" class="form-control" value="{{ $oldAccount ?? ""}}" name="account"></td>
		    </tr>
		    <tr>
		    	<td>{{ trans('index.password') }}</td>
		    	<td><input type="text" class="form-control" name="passwd"></td>
		    </tr>
		  </tbody>
		</table>
		<center>
			<input type="submit" class="btn btn-success" width="60" name="login" value="登入">
		</center>
	</div>
</form>
@endsection