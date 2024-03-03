@extends('layouts.app')

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
                        @foreach($votes as $record)
                            @include('cards.vote')
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>

<h3><i class="fa fa-list"></i> tag <a class="btn btn-secondary" href="{{route('tag.create')}}">
    <span class="fa fa-plus"></span>
</a></h3>
<div class="row">
    <div class="card card-default">
        <div class="card-block">
            <table class="table table-bordered table-striped">
                <tbody>
                        <tr>
                            <th>Label</th>
                            <th>Tag1</th>
                            <th>Tag2</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($tags as $record)
                            @include('cards.tag')
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>

<h3><i class="fa fa-list"></i> mood <a class="btn btn-secondary" href="{{route('mood.create')}}">
    <span class="fa fa-plus"></span>
</a></h3>
<div class="row">
    <div class="card card-default">
        <div class="card-block">
            <table class="table table-bordered table-striped">
                <tbody>
                        <tr>
                            <th>Label</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($moods as $record)
                            @include('cards.mood')
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endSection