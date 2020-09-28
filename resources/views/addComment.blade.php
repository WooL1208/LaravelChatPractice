@extends('layout.master')
@php($title = "新增留言")
@section('title', $title)
@section('content')
<form method="post">
	{{csrf_field()}}
	<div style="width: 500px; margin: 0 auto;">
		<table class="table table-bordered" align="center">
		  <tbody>
		    <tr>
		    	<td class="bg-primary text-center text-white" colspan="2">{{ trans('index.addPost') }}</td>
		    </tr>
		    <tr>
		    	<td>{{ trans('index.postMember') }}</td>
		    	<td><input type="text" class="form-control" name="post_name"></td>
		    </tr>
		    <tr>
		    	<td>{{ trans('index.class') }}</td>
		    	<td>
		    		<select class="browser-default custom-select" name="post_class">
						<option value="">請選擇</option>
						<option value="系統">系統</option>
						<option value="生活">生活</option>
						<option value="美食">美食</option>
					</select>
		    	</td>
		    </tr>
		    <tr>
		    	<td>{{ trans('index.comment') }}</td>
		    	<td>
		    		<div class="form-group">
    					<textarea class="form-control" name="post_content" rows="3" style="resize: none;"></textarea>
  					</div>
		    	</td>
		    </tr>
		  </tbody>
		</table>
		<center>
			<input type="submit" class="btn btn-success" style="width: 60px" name="add_post" value="增">
		</center>
	</div>
</form>
@endsection