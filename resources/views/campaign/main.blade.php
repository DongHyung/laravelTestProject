@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">캠페인 등록</div>
                <div class="panel-body">
                    @foreach ($campaigns as $campaign)
					    <p>{{ $campaign->title }} || {{ $campaign->schedule }} || {{ $campaign->regDate }} || {{ $campaign->uptDate }}</p>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
