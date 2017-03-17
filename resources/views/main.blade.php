@extends('app')

@section('content')

@can('view', App\Model\Member::class)
view!
@endcan

@can('update', App\Model\Member::class)
update!
@endcan


@endsection
