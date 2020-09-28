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
		<table class="table table-striped table-hover" style="width: 1200; margin: 0 auto">
			<tr class="text-left">
				<td width="60" align="center">{{ trans('index.class') }}</td>
				<td colspan="6">
					<select class="browser-default custom-select" style="width: 100px;" name="class">
						@switch(session('searchClass'))
						    @case("")
						        <option value="" selected="">請選擇</option>
								<option value="系統">系統</option>
								<option value="生活">生活</option>
								<option value="美食">美食</option>
						        @break
							@case("系統")
								<option value="">請選擇</option>
								<option value="系統" selected="">系統</option>
								<option value="生活">生活</option>
								<option value="美食">美食</option>
						        @break
							@case("生活")
								<option value="">請選擇</option>
								<option value="系統">系統</option>
								<option value="生活" selected="">生活</option>
								<option value="美食">美食</option>
						        @break
							@case("美食")
								<option value="">請選擇</option>
								<option value="系統">系統</option>
								<option value="生活">生活</option>
								<option value="美食" selected="">美食</option>
						        @break
						    @default
						    	<option value="">請選擇</option>
								<option value="系統">系統</option>
								<option value="生活">生活</option>
								<option value="美食">美食</option>
						        @break
						@endswitch
					</select>
					<input type="submit" class="btn btn-success" name="search" value="搜尋">
					@if (session()->has("userID"))
						<input type="submit" class="btn btn-danger" name="multi_delete" value="多選刪除">
					@else
						<input type="submit" class="btn btn-danger" value="多選刪除" disabled="disabled">
					@endif
				</td>
			</tr>
			<tr class="bg-primary text-white text-center">
				<td>序</td>
				<td>選</td>
				<td width="173">{{ trans('index.function') }}</td>
				<td width="130">{{ trans('index.commentTime') }}</td>
				<td width="130">{{ trans('index.lastReplyTime') }}</td>
				<td width="60">{{ trans('index.class') }}</td>
				<td width="125">{{ trans('index.postMember') }}</td>
				<td>{{ trans('index.comment') }}</td>
			</tr>

			@foreach ($post as $key)
				<tr>
					<td align="center">{{ $loop->iteration }}</td>
					<td><input type="checkbox" name="select[]" value="{{ $key->id }}"></td>
					<td>
						@if (session()->has("userID"))
							@if ($edit == $key->id)
								<input type="submit" class="btn btn-success btn-sm" name="save[{{ $key->id }}]" value="儲存">
							@else
								<input type="submit" class="btn btn-success btn-sm" name="edit[{{ $key->id }}]" value="編輯">
							@endif
							<input type="submit" class="btn btn-danger btn-sm" name="delete[{{ $key->id }}]" value="刪除">
						@else
							<input type="submit" class="btn btn-success btn-sm" value="編輯" disabled="disabled">
							<input type="submit" class="btn btn-danger btn-sm" value="刪除" disabled="disabled">
						@endif
						<a class="btn btn-primary btn-sm" href="{{ url("reply/".$key->id) }}">{{ trans('index.reply') }}</a>
					</td>
					<td>{{ $key->created_at }}</td>
					<td>{{ $key->reply->first()->created_at }}</td>
					<td>{{ $key->post_class }}</td>
					@if ($edit == $key->id)
						<td><input type="text" style="width: 100px" name="edit_post_name" value="{{ $key->post_name }}"></td>
						<td>
							<div class="form-group">
    							<textarea class="form-control" name="edit_content" rows="3" style="resize: none;">{{ $key->post_content }}</textarea>
  							</div>
						</td>
					@else
						<td>{{ $key->post_name }}</td>
						<td>
							<div class="form-group">
    							<textarea class="form-control" name="content" readonly="readonly" rows="3" style="resize: none;">{{ $key->post_content }}</textarea>
  							</div>
						</td>
					@endif
				</tr>
			@endforeach
		</table>
	</form>
	<div class="text-center">
		{{$post->links("vendor.pagination.bootstrap-4")}}
	</div>
</div>
@endsection