@extends('layouts.dashboard')

@section('content')

    <div class="container">
        
        <form action="/admin/categories/{{ $category->id }}" method="post">
            @csrf
            @method('put')
            
            @include('admin.categories._form')

        </form>

    </div>

@endsection
