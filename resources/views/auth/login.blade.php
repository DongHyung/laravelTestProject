@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default" style="margin-top:8%;">
            	<div class="panel-heading">로그인</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="loginForm" onsubmit="return false;">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="userId" class="col-md-4 control-label">아이디</label>

                            <div class="col-md-6">
                                <input id="userId" type="text" class="form-control" name="userId" value="{{ old('userId') }}" required autofocus>

                                @if ($errors->has('userId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userId') }}</strong>
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
                        <!-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn_primary" id="loginBtn">로그인</button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
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
		$('#loginBtn').click(function() {
			doAjax({
				data : {
					'_token' : $('input[name="_token"]').val(),
					'userId' : $('input[name="userId"]').val(),
					'password' : $('input[name="password"]').val()
				},
				url : '/checkMember',
				error : function(data) {
					console.log(data);
					alert("시스템 에러 발생");
				},
				callback : function(rs) {
					if (rs.result == 0) {
						var data = {};
						var formData = $('#loginForm').serializeArray();

						for (var idx in formData) {
							data[ formData[ idx ].name ] = formData[ idx ].value;
						}
						
						locationPage(data, "{{ route('login') }}", 'POST');
					} else {
						alert(rs.message);
					}
				}
			});
		});
	});

</script>

@endsection
