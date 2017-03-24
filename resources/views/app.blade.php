<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>사람인 메일 Back-Office</title>
	<!-- style -->
	<link href="/css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	<link href="/css/bootstrap/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" />
	
	<link href="/css/jquery/jquery-ui.min.css" type="text/css" rel="stylesheet" />
	<link href="/css/jquery/jquery-ui.theme.min.css" type="text/css" rel="stylesheet" />
	<link href="/css/jquery/jquery.timepicker.css" type="text/css" rel="stylesheet" />
	
    <link href="/css/common.css?20170321" type="text/css" rel="stylesheet" />
    
    <!-- init scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script type="text/javascript" src="/js/jquery-3.0.0.min.js"></script>
    <script src="/js/common.js"></script>
</head>
<body>
@if (!Auth::guest())
	<header>
		<span><a href="/">사람인 메일 <span>Back-Office</span></a></span>
		@if (!Auth::guest())
			<span class="logout">
				<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">로그아웃</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
	            </form>
			</span>
			@if (Auth::user()->isAdministrator())
				<span class="pull-right" style="margin-right:16px;">
					<a href="{{ route('admin') }}">계정 관리</a>
				</span>
			@endif
		@endif
	</header>
@endif
	<div id="container">
		<div id="loading">
			<div id="loadingImg"></div>
		</div>
		@if (!Auth::guest())
			<nav id="gnb">
		        <div class="inner">
		            <h3>통계 대시보드</h3>
		            <ul>
		                <li class="selected"><a href="##">KPI 통계 대시보드</a></li>
		                <li><a href="##">GOOGLE ANALYTICS</a></li>
		            </ul>
		            <h3>캠페인 관리</h3>
		            <ul>
		                <li><a href="{{ route('campaign') }}">캠페인 리스트</a></li>
		                <li><a href="{{ route('campaign.register') }}">신규 캠페인 등록</a></li>
		                <li><a href="##">공통 템플릿 관리</a></li>
		                <li><a href="##">A/B 테스트</a></li>
		            </ul>
		            <h3>플랫폼 운영 관리</h3>
		            <ul>
		                <li><a href="##">테스트 계정 관리</a></li>
		                <li><a href="##">넷피온(대량 메일)</a></li>
		                <li><a href="##">넷피온(이벤트 메일)</a></li>
		                <li><a href="##">넷피온(테스트)</a></li>
		                <li><a href="##">LETS</a></li>
		                <li><a href="##">메일 현황 관리(WIKI)</a></li>
		            </ul>
		        </div>
		    </nav>
	    @endif
		
		<div id="wrapper">
        	@yield('content')
		</div>
	</div>

	<script type="text/javascript">
	    var $win = $(window),
	        $gnb = $('#gnb'),
	        $container = $('#container'),
	        $wrapper = $('#wrapper');
	    $win.on('resize', function() {
	        var winH = $win.height()- 70,
	            docH = $wrapper.outerHeight();
	        if(winH > docH){
	            $container.height(winH + 'px');
	            $gnb.height(winH + 'px');
	        } else {
	            $container.height(docH + 'px');
	            $gnb.height(docH + 'px');
	        }
	    }).trigger('resize');
	</script>
		
</body>
</html>
