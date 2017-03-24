@extends('app')

@section('content')

<article class="content">
            <h2 class="section_title">캠페인 등록</h2>
            <section class="inner bg">
                    <div class="row editLayer align-middle">
                        <form class="form-inline"  id="editForm" name="editForm" role="form" method="POST" action="{{ route('campaign') }}">
                            <div class="form-group col-md-12">
                                <p class="lead">기본 정보</p>
                                
		                        {{ csrf_field() }}
								<input type="hidden" name="id" value="">
                            </div>
                            <div class="form-group col-md-12 mtb10 required">
                                <label for="title" class="col-md-1">캠페인 명 <span class="colorRed">*</span></label>
                                <input type="text" id="title" name="title" class="form-control input-sm w350" value="" />
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="description" class="col-md-1">캠페인 설명<br/>(자유 입력)</label>
                                <textarea class="form-control input-sm" rows="3" cols="100" id="description" name="description"></textarea>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10 required">
                                <label for="register" class="col-md-1">담당자 <span class="colorRed">*</span></label>
                                <input type="text" id="register" name="register" class="form-control input-sm w350" value="{{ session('member')->userName }}" />
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10 required">
                                <label for="" class="col-md-1"></label><span class="colorRed">* 최종 등록/수정한 사람의 소속과 이름을 입력합니다.</span>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10 required">
                                <label for="sendType" class="col-md-1">발송 타입</label>
                                <select class="form-control input-sm w220" id="sendType" name="sendType">
                                    <option value="BATCH">배치(넷피온 발송)</option>
                                    <option value="OFTEN">수시</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10 required">
                                <label for="" class="col-md-1">발송 승인</label>
                                <label>
                                    <input type="radio" name="sendApprove" class="form-control input-sm" value="approve" checked=checked />승인 발송
                                    <input type="radio" name="sendApprove" class="form-control input-sm ml20" value="auto"  />자동 발송
                                </label>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10 required">
                                <label for="templateType" class="col-md-1">템플릿 타입 <span class="colorRed">*</span></label>
                                <select class="form-control input-sm w220" id="templateType" name="templateType">
                                    <option value="BATCH">배치(넷피온 발송)</option>
                                    <option value="OFTEN">수시</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10 required">
                                <label for="mailSubject" class="col-md-1">메일 제목 <span class="colorRed">*</span></label>
                                <input type="text" id="mailSubject" name="mailSubject" class="form-control input-sm w850" value="" />
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="headerTitle" class="col-md-1">헤더 타이틀 <span class="colorRed">*</span></label>
                                <input type="text" id="headerTitle" name="headerTitle" class="form-control input-sm w850" value="" />
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="sender" class="col-md-1">발신자 <span class="colorRed">*</span></label>
                                <input type="email" id="sender" name="sender" class="form-control input-sm w350" value="" />
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="sendEmail" class="col-md-1">발신자 주소 <span class="colorRed">*</span></label>
                                <input type="email" id="sendEmail" name="sendEmail" class="form-control input-sm w350" value="" />
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="replyEmail" class="col-md-1">회신 주소</label>
                                <input type="email" id="replyEmail" name="replyEmail" class="form-control input-sm w350" value="" />
                            </div>
                            <div class="form-group col-md-12">
                                <hr />
                            </div>
                            <div class="form-group col-md-12">
                                <p class="lead">발송 스케쥴</p>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10 required">
                                <label for="" class="col-md-1">발송 요일 <span style="color:red;">*</span></label>
                                <div class="input-group radio col-md-6" style="line-height:34px;">
                                    <label style="display:block;">
                                    	<input id="schedule[type]" type="radio" name="schedule[type]" class="form-control input-sm" value="daily" autofocus> 매일
                                    </label>
                                    <label style="display:block;">
                                        <input id="schedule[type]" type="radio" name="schedule[type]" class="form-control input-sm" value="day" autofocus > 요일
                                        <div class="checkbox">
			                                <label><input id="schedule[day][]" type="checkbox" name="schedule[day][]" class="form-control input-sm" value="mon" autofocus style="margin-left:16px;"> 월</label>
			                                <label><input id="schedule[day][]" type="checkbox" name="schedule[day][]" class="form-control input-sm" value="tue" autofocus style="margin-left:8px;"> 화</label>
			                                <label><input id="schedule[day][]" type="checkbox" name="schedule[day][]" class="form-control input-sm" value="wed" autofocus style="margin-left:8px;"> 수</label>
			                                <label><input id="schedule[day][]" type="checkbox" name="schedule[day][]" class="form-control input-sm" value="thu" autofocus style="margin-left:8px;"> 목</label>
			                                <label><input id="schedule[day][]" type="checkbox" name="schedule[day][]" class="form-control input-sm" value="fri" autofocus style="margin-left:8px;"> 금</label>
			                                <label><input id="schedule[day][]" type="checkbox" name="schedule[day][]" class="form-control input-sm" value="sat" autofocus style="margin-left:8px;"> 토</label>
			                                <label><input id="schedule[day][]" type="checkbox" name="schedule[day][]" class="form-control input-sm" value="sun" autofocus style="margin-left:8px;"> 일</label>
                                        </div>
                                    </label>
                                    <label style="display:block;">
                                    	<input id="schedule[type]" type="radio" name="schedule[type]" class="form-control input-sm" value="date" autofocus >
                                        <span class="pull-left">선택 날짜</span>
                                        <div class="col-md-6">
                                        	<input type="text"  id="schedule[date]" name="schedule[date]" class="form-control input-sm" value="" />
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10 required">
                                <label for="" class="col-md-1">발송 시간 <span class="colorRed">*</span></label>
	                            <input id="schedule[time]" type="text" class="form-control input-sm" name="schedule[time]" value="" autofocus require>
                            </div>
                            <div class="form-group col-md-12 group-sm">
                                <label for="" class="col-md-1"></label>
                                <p>※ <span style="color:red;">'HH:MM:SS'</span> 형식으로 입력해주세요. 시간 입력은 24시간 형식입니다.</p>
                            </div>
                            <div class="form-group col-md-12">
                                <hr />
                            </div>
                            <div class="form-group col-md-12">
                                <p class="lead">컨텐츠 입력</p>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="previewMessage" class="col-md-1">프리뷰 메시지<br/>(옵션)</label>
                                <textarea rows="3" cols="160" id="previewMessage" name="previewMessage" class="form-control input-sm"></textarea>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="contentsTemplate" class="col-md-1">
                                	본문 템플릿<br />
                                	<button type="button" class="btn btn-sm btn-primary">미리보기</button>
                                </label>
                                <textarea rows="24" cols="160" id="contentsTemplate" name="contentsTemplate" class="form-control input-sm"></textarea>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="" class="col-md-1">푸터 배너 <span class="colorRed">*</span></label>
                                <labe>
                                 	<input type="radio" name="footerBanner" class="form-control input-sm" value="Hide"checked=checked />비노출
                                   	<input type="radio" name="footerBanner" class="form-control input-sm ml20" value="Open"  />노출
                                </label>
                            </div>

                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="imageUrl" class="col-md-1">이미지 주소</label>
                                <input type="text" class="form-control input-sm w550" id="imageUrl" name="imageUrl" value="" />
                                <a id="btn-img-preview" class="btn btn_middle btn-default imgPreview">미리보기</a>
                                <div id="img-preview" class="imgPreview"><img src="" /></div>
                            </div>
                            <div class="form-group col-md-12 group-sm mtb10">
                                <label for="linkUrl" class="col-md-1">링크 주소</label>
                                <input type="text" class="form-control input-sm w550" id="linkUrl" name="linkUrl" value="" />
                            </div>
                            <div class="form-group col-md-12 text-center group-sm" style="margin-top:30px;margin-bottom:50px;">
                                <a class="btn btn_middle btn-default col-md-2 pull-right btn-cancel" style="cursor:pointer;">취소</a>
                                <button class="btn btn_middle btn-primary col-md-2 pull-right" style="margin-right:40px;" id="saveBtn">저장</button>
                            </div>
                        </form>
                    </div>
            </section>
        </article>


<style type="text/css">
	#img-preview {display:none;position :absolute;width : 600px;height : 90px;background:red;z-index:9999;}
</style>

@endsection
