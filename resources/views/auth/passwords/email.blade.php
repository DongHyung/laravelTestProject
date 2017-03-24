@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default" style="margin-top:8%;">
                <div class="panel-heading">비밀번호 초기화</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">비밀번호 입력</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-warning">비밀번호 재설정</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
        .editLayer {/*
            padding-left:80px;
            padding-right: 80px;
            */
        }

        .mtb10 {
            margin-top:10px;
            margin-bottom:10px;
        }

        .w850 {
            width:850px !important;
        }

        .w550 {
            width:550px !important;
        }
        .w350 {
            width:350px !important;
        }

        .w220 {
            width:220px !important;
        }

        .imgPreview { display:none; }

        #img-preview {
            display:none;
            position :absolute;
            width : 600px;
            height : 90px;
            background:red;
            z-index:9999;
        }
    </style>

@endsection
