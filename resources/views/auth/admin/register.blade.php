@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default" style="margin-top:8%;">
                <div class="panel-heading"><b>계정 생성</b></div>
                <div class="panel-body">
                    <form id="registerForm" class="form-horizontal" role="form" method="POST" onsubmit="return false;">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('userName') ? ' has-error' : '' }}">
                            <label for="userName" class="col-md-4 control-label">이름</label>

                            <div class="col-md-6">
                                <input id="userName" type="text" class="form-control" name="userName" value="{{ old('userName') }}" required autofocus>

                                @if ($errors->has('userName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('userId') ? ' has-error' : '' }}">
                            <label for="userId" class="col-md-4 control-label">아이디</label>

                            <div class="col-md-6">
                                <input id="userId" type="text" class="form-control" name="userId" value="{{ old('userId') }}" required>

                                @if ($errors->has('userId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">등급</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control" name="role" required>
                                	<option value="user">사용자</option>
                                	<option value="manager">관리자</option>
                                	<option value="administrator">최고 관리자</option>
                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">비밀번호</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-md-4 control-label">비밀번호 확인</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="registerBtn" type="button" class="btn btn_middle btn-primary">계정 생성</button>
                                <a href="{{ route('admin', $request->getQueryString()) }}" id="updateMember" class="btn btn_middle btn-default">리스트</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <script type="text/javascript">

 $(function() {
	 'use strict';

	 $("#registerBtn").click(function() {
		 var data = {};
		var formData = $('#registerForm').serializeArray();

		for (var idx in formData) {
			data[ formData[ idx ].name ] = formData[ idx ].value;
		}

		if (confirm("계정을 생성하시겠습니까?")) {
			 doAjax({
				data : data,
				url : '/isMember',
				error : function(data) {
					console.log(data);
					alert("시스템 에러 발생");
				},
				callback : function(rs) {
					if (rs) {
						var data = {};
						var formData = $('#registerForm').serializeArray();
	
						for (var idx in formData) {
							data[ formData[ idx ].name ] = formData[ idx ].value;
						}
						
						locationPage(data, "{{ route('register') }}", 'POST');
					} else {
						alert('존재하는 계정입니다.');
					}
				}
			});
		}
		
	 });
 });
</script>
@endsection