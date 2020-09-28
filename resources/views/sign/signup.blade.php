@php($title = "會員註冊")
@extends('layout.master')
@section('title', $title)
@section('content')
@if(isset($success))
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">訊息</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        註冊成功
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<script>
	$("#register").modal();
</script>
@endif

<form method="post">
	{{csrf_field()}}
	<div class="" style="width: 600px; margin: 0 auto; margin-top: 10px">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th align="center" colspan="2" class="bg-primary text-white">{{ trans('index.signup') }}</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{ trans('index.account') }}</td>
					<td><input type="text" name="user_account" value="{{ old('user_account') }}" class="form-control"></td>
				</tr>
				<tr>
					<td>{{ trans('index.password') }}</td>
					<td><input type="text" name="user_pw" class="form-control"></td>
				</tr>
				<tr>
					<td>{{ trans('index.repassword') }}</td>
					<td><input type="text" name="user_repw" class="form-control"></td>
				</tr>
			</tbody>
		</table>
		<center>
			<input type="submit" class="btn btn-success" name="register" value="註冊">
		</center>
	</div>
</form>
@endsection