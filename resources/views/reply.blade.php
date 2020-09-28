@extends('layout.master')
@php
	$title = "留言表";
	$edit = "";
@endphp
@section('title', $title)
@section('content')
@php
	if (request()->has("edit")) {
		$edit = key(request()->input("edit"));
	}
	@endphp
	<div class="mt-1" style="width: 1200px; margin: 0 auto; margin-top: 5px">
	<form method="post">
		{{csrf_field()}}
		<center>
			<a class="btn btn-primary mb-1" href="{{ url('/') }}" name="backHome">{{ trans('index.backToList') }}</a>
		</center>
		<table class="table table-striped table-hover" style="width: 1200; margin: 0 auto">
			<tr>
				<td>
					{{ trans('index.postMember') }}<br>
					{{ $post->post_name }}
				</td>
				<td>
					<div class="row">
						<div class="col">{{ trans('index.comment') }}</div>
						<div class="col text-right">{{ trans('index.postTime') }}：{{ $post->created_at }}</div>
					</div>
					<textarea class="form-control" name="content" readonly="readonly" rows="3" style="resize: none;">{{ $post->post_content }}</textarea>
				</td>
			</tr>
			@foreach ($reply as $key)
				<tr>
					<td>
						@if (session()->has("userID"))
							@if ($edit == $key->id)
								<input type="text" class="form-control" style="width: 300px" name="edit_reply_name" value="{{ $key->reply_name }}"><br>
								<input type="submit" class="btn btn-success btn-sm" name="save[{{ $key->id }}]" value="儲存">
							@else
								{{ $key->reply_name }}<br>
								<input type="submit" class="btn btn-success btn-sm" name="edit[{{ $key->id }}]" value="編輯">
							@endif
							<input type="submit" class="btn btn-danger btn-sm" name="delete[{{ $key->id }}]" value="刪除">
						@else
							{{ $key->reply_name }}<br>
							<input type="submit" class="btn btn-success btn-sm" value="編輯" disabled="disabled">
							<input type="submit" class="btn btn-danger btn-sm" value="刪除" disabled="disabled">
						@endif
					</td>
					<td>
						<div align="right">{{ trans('index.time') }}：{{ $key->created_at }}</div>
						@if ($edit == $key->id)
							<textarea class="form-control" name="edit_content" style="resize: none;width: 850px" rows="3">{{ $key->reply_content }}</textarea>
						@else
							<textarea class="form-control" name="content" readonly="readonly" rows="3" style="resize: none;">{{ $key->reply_content }}</textarea>
						@endif
					</td>
				</tr>
			@endforeach
		</table>

		<div style="width: 500px; margin: 0 auto;">
		<table class="table table-bordered mt-1" align="center">
		  	<tbody>
		    	<tr>
		    		<td class="bg-primary text-center text-white" colspan="2">
		    			{{ trans('index.addReply') }}
		    			<input type="hidden" class="wole" name="post_id" value="{{ $post->id }}">
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>{{ trans('index.postMember') }}</td>
		    		<td>
		    			@if (session()->has("userID"))
		    				<input type="text" class="form-control" name="reply_name">
		    			@else
		    				<input type="text" class="form-control" name="reply_name" disabled="disabled">
		    			@endif
		    		</td>
		    	</tr>
		    	<tr>
		    		<td>{{ trans('index.comment') }}</td>
		    		<td>
		    			<div class="form-group">
		    				@if (session()->has("userID"))
    							<textarea class="form-control" name="reply_content" rows="3" style="resize: none;"></textarea>
		    				@else
		    					<textarea class="form-control" name="reply_content" rows="3" style="resize: none;" disabled="disabled"></textarea>
		    				@endif
  						</div>
		    		</td>
		    	</tr>
		  	</tbody>
		</table>
		<center>
			@if (session()->has("userID"))
				<input type="submit" class="btn btn-success" style="width: 60px" name="add_reply" value="增">
			@else
				<input type="submit" class="btn btn-success" style="width: 60px" name="add_reply" value="增" disabled="disabled">
			@endif
		</center>
		</div>
	</form>
	</div>
@endsection