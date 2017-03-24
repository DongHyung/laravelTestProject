@extends('app')

@section('content')
	<article class="content">
		<h2 class="section_title">권한 관리</h2>	
	    <section class="inner bg">
	    	<form id="saveForm" class="form-inline" role="form" method="POST" action="{{ route('admin.save') }}" >
	    		<input type="hidden" name="userId" value="{{ $request->get('userId', '') }}" />
	    		<input type="hidden" name="userName" value="{{ $request->get('userName', '') }}" />
	    		<input type="hidden" name="role" value="{{ $request->get('role', '') }}" />
	    		<input type="hidden" name="id" value="{{ $member->id }}" />
	    		{{ csrf_field() }}
		    	<table class="tbl_data">
		            <colgroup>
		                 <col width="80" />
		                 <col width="120" />
		                 <col width="*" />
		            </colgroup>
		            <tbody>
		            	<tr>
		            		<th scope="col" class="head" colspan="2">아이디</th>
		                    <td scope="col" class="left">{{ $member->userId }}</td>
		                    <td></td>
		            	</tr>
		            	<tr>
		            		<th scope="col" class="head" colspan="2">계정 명</th>
		                    <td scope="col" class="left">{{ $member->userName }}</td>
		                    <td></td>
		            	</tr>
		            	<tr>
		            		<th scope="col" class="head" rowspan="3">권한 범위</th>
		                    <th scope="col" class="head">캠페인</th>
		                    <td scope="col" class="left" colspan="2">
		                    	<label class="mr20">
		                    		<input type="checkbox" name="campaign[]" class="form-control" value="create" @if (in_array('create', $member->scope->campaign)) checked @endif />create
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="campaign[]" class="form-control" value="read" @if (in_array('read', $member->scope->campaign)) checked @endif  />read
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="campaign[]" class="form-control" value="update" @if (in_array('update', $member->scope->campaign)) checked @endif  />update
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="campaign[]" class="form-control" value="delete" @if (in_array('delete', $member->scope->campaign)) checked @endif  />delete
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="campaign[]" class="form-control" value="approve" @if (in_array('approve', $member->scope->campaign)) checked @endif  />approve
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="campaign[]" class="form-control" value="utmStats" @if (in_array('utmStats', $member->scope->campaign)) checked @endif  />utmStats
		                    	</label>
		                    </td>
		                </tr>
		                <tr>
		                    <th scope="col" class="head">템플릿</th>
		                    <td scope="col" class="left" colspan="2">
		                    	<label class="mr20">
		                    		<input type="checkbox" name="template[]" class="form-control" value="create" @if (in_array('create', $member->scope->template)) checked @endif />create
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="template[]" class="form-control" value="read" @if (in_array('read', $member->scope->template)) checked @endif />read
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="template[]" class="form-control" value="update" @if (in_array('update', $member->scope->template)) checked @endif />update
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="template[]" class="form-control" value="delete" @if (in_array('delete', $member->scope->template)) checked @endif />delete
		                    	</label>
		                    </td>
		                </tr>
		                <tr>
		                    <th scope="col" class="head">계정 권한</th>
		                    <td scope="col" class="left" colspan="2">
		                    	<label class="mr20">
		                    		<input type="checkbox" name="permission[]" class="form-control" value="create" @if (in_array('create', $member->scope->permission)) checked @endif />create
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="permission[]" class="form-control" value="read" @if (in_array('read', $member->scope->permission)) checked @endif />read
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="permission[]" class="form-control" value="update" @if (in_array('update', $member->scope->permission)) checked @endif />update
		                    	</label>
		                    	<label class="mr20">
		                    		<input type="checkbox" name="permission[]" class="form-control" value="delete" @if (in_array('delete', $member->scope->permission)) checked @endif />delete
		                    	</label>
		                    </td>
		                </tr>
		            </tbody>
				</table>
				<div class="text-right mt20">
					<button type="submit" id="updateMember" class="btn btn_middle btn-danger">수정</button>
					<a href="{{ route('admin', $request->getQueryString()) }}" id="updateMember" class="btn btn_middle btn-default">리스트</a>
				</div>
			</form>
	    </section>
	</article>
	
	@if ($errors->has('error'))
		<script type="text/javascript">
			alert("{{ $errors->first('error') }}");
		</script>
	@endif
@endsection