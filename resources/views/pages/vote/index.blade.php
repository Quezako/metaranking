@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    vote
</li>
@endsection

@section('content')
<h3><i class="fa fa-list"></i> vote <a class="btn btn-secondary" href="{{route('vote.create')}}">
    <span class="fa fa-plus"></span>
</a></h3>
<div class="row">
    <div class="card card-default">
        <div class="card-block">
            <table class="table table-bordered table-striped">
                <tbody>
                        <tr>
                            <th>User</th>
                            <th>Tag</th>
                            <th>Mood</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($records as $record)
                            @include('cards.vote')
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endSection