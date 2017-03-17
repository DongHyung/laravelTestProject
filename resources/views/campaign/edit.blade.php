@extends('app')

@section('content')

@can('update', App\Model\Campaign::class)
update!
@endcan


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">캠페인 등록</div>
                <div class="panel-body">                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('campaign') }}">
                		@if ($campaign->id)
                        	<input type="hidden" name="_method" value="PUT">
                        @endif
                        
                        {{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $campaign->id }}">

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">메일 명</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $campaign->title }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">메일 설명</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description">{{ $campaign->description }}</textarea> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="userId" class="col-md-4 control-label">담당자</label>

                            <div class="col-md-6">
                                <input id="userId" type="text" class="form-control" name="userId" value="{{ $campaign->userId }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="sendType" class="col-md-4 control-label">발송 타입</label>

                            <div class="col-md-6">
                                <input id="sendType" type="text" class="form-control" name="sendType" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="sendApprove" class="col-md-4 control-label">발송 승인</label>

                            <div class="col-md-6">
                                <input id="sendApprove" type="text" class="form-control" name="sendApprove" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="templateType" class="col-md-4 control-label">템플릿 타입</label>

                            <div class="col-md-6">
                                <input id="templateType" type="text" class="form-control" name="templateType" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="mailSubject" class="col-md-4 control-label">메일 제목</label>

                            <div class="col-md-6">
                                <input id="mailSubject" type="text" class="form-control" name="mailSubject" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="headerTitle" class="col-md-4 control-label">헤더 타이틀</label>

                            <div class="col-md-6">
                                <input id="headerTitle" type="text" class="form-control" name="headerTitle" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="sender" class="col-md-4 control-label">발신자 명</label>

                            <div class="col-md-6">
                                <input id="sender" type="text" class="form-control" name="sender" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="sendEmail" class="col-md-4 control-label">발신 주소</label>

                            <div class="col-md-6">
                                <input id="sendEmail" type="text" class="form-control" name="sendEmail" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="replyEmail" class="col-md-4 control-label">회신 주소</label>

                            <div class="col-md-6">
                                <input id="replyEmail" type="text" class="form-control" name="replyEmail" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" style="height:66px;">발송 요일</label>

                            <div class="col-md-6">
                                <input id="schedule[type]" type="radio" name="schedule[type]" value="daily" autofocus> 매일
                            </div>
                            <div class="col-md-7">
                                <input id="schedule[type]" type="radio" name="schedule[type]" value="day" autofocus > 요일
                                <input id="schedule[day][]" type="checkbox" name="schedule[day][]" value="mon" autofocus style="margin-left:24px;"> 월
                                <input id="schedule[day][]" type="checkbox" name="schedule[day][]" value="tue" autofocus style="margin-left:12px;"> 화
                                <input id="schedule[day][]" type="checkbox" name="schedule[day][]" value="wed" autofocus style="margin-left:12px;"> 수
                                <input id="schedule[day][]" type="checkbox" name="schedule[day][]" value="thu" autofocus style="margin-left:12px;"> 목
                                <input id="schedule[day][]" type="checkbox" name="schedule[day][]" value="fri" autofocus style="margin-left:12px;"> 금
                                <input id="schedule[day][]" type="checkbox" name="schedule[day][]" value="sat" autofocus style="margin-left:12px;"> 토
                                <input id="schedule[day][]" type="checkbox" name="schedule[day][]" value="sun" autofocus style="margin-left:12px;"> 일
                            </div>
                            <div class="col-md-6">
                                <input id="schedule[type]" type="radio" name="schedule[type]" value="date" autofocus> 날짜
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">발송 시간</label>

                            <div class="col-md-6">
                                <input id="schedule[time]" type="text" class="form-control" name="schedule[time]" value="" autofocus require>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="previewMessage" class="col-md-4 control-label">프리뷰 메시지</label>

                            <div class="col-md-6">
                                <textarea id="previewMessage" class="form-control" name="previewMessage"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contentsTemplate" class="col-md-4 control-label">본문 템플릿</label>

                            <div class="col-md-6">
                                <textarea id="contentsTemplate" class="form-control" name="contentsTemplate"></textarea>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="footerBanner" class="col-md-4 control-label">푸터 배너</label>

                            <div class="col-md-6">
                                <input id="footerBanner" type="text" class="form-control" name="footerBanner" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="imageUrl" class="col-md-4 control-label">이미지 주소</label>

                            <div class="col-md-6">
                                <input id="imageUrl" type="text" class="form-control" name="imageUrl" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="linkUrl" class="col-md-4 control-label">링크 주소</label>

                            <div class="col-md-6">
                                <input id="linkUrl" type="text" class="form-control" name="linkUrl" value="{{ old('title') }}" autofocus>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="button" class="btn btn-success">미리보기</button>
                                <button type="submit" class="btn btn-primary">승인요청</button>
                                <button type="button" class="btn btn-warning">취소</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
