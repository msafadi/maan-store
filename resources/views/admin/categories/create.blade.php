@extends('layouts.dashboard')

@section('content')

    <div class="container">
        
        <form action="/admin/categories" method="post">
            @csrf

            @include('admin.categories._form')
            
        </form>

    </div>

@endsection