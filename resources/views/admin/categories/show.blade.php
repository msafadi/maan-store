@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>{{ $category->name }}</h2>

        <dl class="row">
            <dt class="col-md-3">Name:</dt>
            <dd class="col-md-9">{{ $category->name }}</dd>
            <dt class="col-md-3">Slug:</dt>
            <dd class="col-md-9">{{ $category->slug }}</dd>
            <dt class="col-md-3">Parent:</dt>
            <dd class="col-md-9">{{ $category->parent_id }}</dd>
            <dt class="col-md-3">Description:</dt>
            <dd class="col-md-9">{{ $category->description }}</dd>
            <dt class="col-md-3">Status:</dt>
            <dd class="col-md-9">{{ $category->status }}</dd>
            <dt class="col-md-3">Created At:</dt>
            <dd class="col-md-9">{{ $category->created_at }}</dd>
            <dt class="col-md-3">Update At:</dt>
            <dd class="col-md-9">{{ $category->updated_at }}</dd>
        </dl>

    </div>

@endsection