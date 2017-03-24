@extends('app')

@section('content')
<article class="content">
	<h2 class="section_title">계정 관리</h2>	
    <section class="inner bg">
    	<form id="searchForm" class="form-inline" name="searchForm" role="form" method="GET" action="{{ route('admin') }}">
    		{{ csrf_field() }}
	    	<ul class="search search_condition">
	    		<li class="mr20"><label>아이디</label> <input type="text" id="userId" class="form-control input-sm" name="userId" value="{{ $request->get('userId', '') }}" /></li>
	    		<li class="mr20"><label>계정명</label> <input type="text" id="userName" class="form-control input-sm" name="userName" value="{{ $request->get('userName', '') }}" /></li>
	    		<li>
	    			<label>등급</label> 
	    			<select id="role" name="role" class="form-control input-sm">
	    				<option value="">전체</option>
	    				<option value="user" @if ($request->get('role', '') == 'user') selected @endif >사용자</option>
	    				<option value="manager" @if ($request->get('role', '') == 'manager') selected @endif >관리자</option>
	    				<option value="administrator" @if ($request->get('role', '') == 'administrator') selected @endif >최고 관리자</option>
	    			</select>
	    		</li>
	    	</ul>
	    	<ul class="search search_button">
	    		@can('update', App\Model\Member::class) <li><button type="submit" class="btn btn_middle btn_primary">검색</button></li> @endcan
	    		<li><button type="button" class="btn btn_middle btn_init">초기화</button></li>
	    	</ul>
    	</form>
	</section>
	
	<section class="inner bg">
		<table class="tbl_data">
            <colgroup>
                 <col width="80" />
                 <col width="*" />
                 <col width="160" />
                 <col width="160" />
                 <col width="480" />
                 <col width="160" />
            </colgroup>
            <thead>
            	<tr class="head">
                    <th scope="col">순번</th>
                    <th scope="col">아이디</th>
                    <th scope="col">계정 명</th>
                    <th scope="col">등급</th>
                    <th scope="col">권한</th>
                    <th scope="col">등록일</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($members as $member) 
            		<tr>
            			<td>{{ $member[ 'id' ] }}</td>
            			<td><a href="{{ route('admin.view', $member[ 'id' ].'?'.$request->getQueryString()) }}">{{ $member[ 'userId' ] }}</a></td>
            			<td>{{ $member[ 'userName' ] }}</td>
            			<td>
            				@if ($member[ 'role' ] == 'administrator')
            					최고 관리자
            				@elseif ($member[ 'role' ] == 'manager')
            					매니저
            				@else
            					사용자
            				@endif
            			</td>
            			<td>
            				{!! $member[ 'scopeString' ] !!}
            			</td>
            			<td>{{ $member[ 'regDate' ] }}</td>
            		</tr>
            	@endforeach
			</tbody>
		</table>
	</section>
	<section class="inner bg text-center">
		{{ $members->appends($request->all())->links() }}
	</section>
	<section class="inner bg">
		<div class="text-right"><a href="{{ route('register') }}" id="createMember" class="btn btn_middle btn-success">계정 생성</a></div>
	</section>
</article>

<script type="text/javascript">
	$(function() {
		$(function() {
			$('.btn_init').click(function() {
				$('form[name="searchForm"]')[ 0 ].reset();
			});

		});
	});
</script>
@endsection

