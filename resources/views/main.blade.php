@extends('app')

@section('content')

<article class="content">
	<h2 class="section_title">통계 요약보기</h2>
    <section class="inner summary">
        <dl>
            <dt><strong>메일유입<br /><span>(SV)</span></strong></dt>
            <dd class="date">2/17(금)</dd>
            <dd class="value">000,000</dd>
            <dd class="comparison up">전일대비 00.0%</dd>
        </dl>
        <dl>
        	<dt><strong>유입비중<br /><span>(%)</span></strong></dt>
        	<dd class="value">00.0%</dd>
        </dl>
        <dl>
            <dt><strong>입사지원</strong></dt>
            <dd class="value">000,000</dd>
            <dd class="comparison down">전일대비 00.0%</dd>
        </dl>
    </section>
</article>


@endsection
