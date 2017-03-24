@extends('app')

@section('content')
<article class="content">
	<h2 class="section_title">캠페인 상세 정보</h2>	
    <section class="inner bg">
    	<h2 class="section_title">1. 유입 통계 <span class="sub">기간 (2017-03-21)</span></h2>
    	<table class="tbl_data">
            <caption></caption>
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
                                
			</tbody>
		</table>
		
		<hr>
		
		<h2 class="section_title">2. 검토 요청 관리</h2>
    	<table class="tbl_data">
            <thead>
            	<tr class="head">
                    <th scope="col">버전</th>
                    <th scope="col">업데이트</th>
                    <th scope="col">상태</th>
                    <th scope="col">작업</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($campaigns as $campaign)
            		<tr>
            			<td>{{ $campaign->majorVersion }}.{{ $campaign->minorVersion }}.{{ $campaign->patchVersion }}@if(isset($campaign->patchName)) - {{ $campaign->patchName }} @endif</td>
            			<td>{{ $campaign->regDate }}</td>
            			<td>{{ $campaign->status }}</td>
            			<td>{{ $campaign->status }}</td>
            		</tr>
            	@endforeach
            	<!-- <td colspan="4" style="height:160px">데이터가 없습니다.</td> -->
			</tbody>
		</table>
		
		<hr>
		
		<h2 class="section_title">3. 캠페인 상세 정보</h2>
    	<table class="tbl_data">
            <caption></caption>
            <colgroup>
                 <col width="200" />
                 <col width="*" />
                 <col width="160" />
            </colgroup>
            <tbody>
            	<tr>
                    <th scope="col" class="head">메일 제목</th>
                    <td scope="col" class="left"><input type="text" value="{{ $campaign->emailSubject }}" /></td>
                    <td scope="col">바로수정</td>
                </tr>
                <tr>
                    <th scope="col" class="head">발신자 명</th>
                    <td scope="col" class="left"><input type="text" value="{{ $campaign->sender }}" /></td>
                    <td scope="col">바로수정</td>
                </tr>
                <tr>
                    <th scope="col" class="head">발신 주소</th>
                    <td scope="col" class="left"><input type="text" value="{{ $campaign->sendEmail }}" /></td>
                    <td scope="col">바로수정</td>
                </tr>
                <tr>
                    <th scope="col" class="head">회신 주소</th>
                    <td scope="col" class="left"><input type="text" value="{{ $campaign->replyEmail }}" /></td>
                    <td scope="col">바로수정</td>
                </tr>
            </tbody>
		</table>
    </section>
</article>

@endsection
