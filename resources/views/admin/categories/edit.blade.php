<x-dashboard-layout>

    <div class="container">
        
        <form action="/admin/categories/{{ $category->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            
            @include('admin.categories._form')

        </form>

    </div>

</x-dashboard-layout>