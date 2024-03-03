@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    mood
</li>
@endsection

@section('content')
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
                        @foreach($records as $record)
                            @include('cards.mood')
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endSection