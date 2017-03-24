@extends('app')

@section('content')
<article class="content">
	<h2 class="section_title">캠페인 리스트</h2>	
    <section class="inner bg">
    	<form id="searchForm" name="searchForm" class="form-inline" role="form" method="GET" action="{{ route('campaign') }}">
    		{{ csrf_field() }}
	    	<ul class="search search_condition w89per">
	    		<li><label>캠페인 명</label> <input type="text" id="title" name="title" class="form-control" value="{{ $request->get('title', '') }}" /></li>
	    		<li><label>메일 제목</label> <input type="text" id="mailSubject" name="mailSubject" class="form-control" value="{{ $request->get('mailSubject', '') }}" /></li>
	    		<li><label>발신주소</label> <input type="text" id="sendEmail" name="sendEmail" class="form-control" value="{{ $request->get('sendEmail', '') }}" /></li>
	    		<li>
	    			<label>대상</label> 
	    			<select id="target" name="target" class="form-control">
	    				<option value="">전체</option>
	    			</select>
	    		</li>
	    		<li>
	    			<label>배너여부</label> 
	    			<select id="footerBanner" name="footerBanner" class="form-control">
	    				<option value="">전체</option>
	    			</select>
	    		</li>
	    		<li>
	    			<label>수신 동의</label> 
	    			<select id="target" name="target" class="form-control">
	    				<option value="">전체</option>
	    			</select>
	    		</li>
	    		<li>
	    			<label>상태</label> 
	    			<select id="status" name="status" class="form-control">
	    				<option value="">전체</option>
	    			</select>
	    		</li>
	    	</ul>
	    	<ul class="search search_button">
	    		<li><button type="submit" class="btn arrow btn_primary">검색</button></li>
	    		<li><button type="button" class="btn arrow btn_init">초기화</button></li>
	    	</ul>
    	</form>
	</section>
	
	<section class="inner bg">
		<table class="tbl_data">
            <colgroup>
                 <col width="80" />
                 <col width="*" />
                 <col width="80" />
                 <col width="80" />
                 <col width="200" />
                 <col width="80" />
                 <col width="136" />
                 <col width="96" />
                 <col width="144" />
                 <col width="96" />
            </colgroup>
            <thead>
            	<tr class="head">
                    <th scope="col">ID</th>
                    <th scope="col">캠페인 명</th>
                    <th scope="col">대상</th>
                    <th scope="col">타입</th>
                    <th scope="col">스케쥴</th>
                    <th scope="col">배너 노출</th>
                    <th scope="col">수신동의</th>
                    <th scope="col">템플릿 버전</th>
                    <th scope="col">등록일<br />(최종 수정일)</th>
                    <th scope="col">상태</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campaigns as $campaign)
                	<tr>
                		<td>{{ $campaign->id }}</td>
                		<td class="left">{{ $campaign->title }}</td>
                		<td></td>
                		<td>{{ $campaign->sendType }}</td>
                		<td>{{ $campaign->schedule }}</td>
                		<td>{{ $campaign->footerBanner }}</td>
                		<td></td>
                		<td>{{ $campaign->templateVersion }}</td>
                		<td>{{ $campaign->regDate }}<br/>({{ $campaign->uptDate }})</td>
                		<td>{{ $campaign->status }}</td>
                	</tr>
				@endforeach
                
			</tbody>
		</table>
	</section>
</article>

<script type="text/javascript">
	$(function() {
		$('.btn_init').click(function() {
			$('form[name="searchForm"]')[ 0 ].reset();
		});
	});
</script>
@endsection
