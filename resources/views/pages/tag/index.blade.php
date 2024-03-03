@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    tag
</li>
@endsection

@section('content')

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
                            <th>Tag1 Id</th>
                            <th>Tag2 Id</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($records as $record)
                            @include('cards.tag')
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endSection