<x-dashboard-layout>

    <div class="container">
        
        <form action="/admin/categories" method="post">
            @csrf

            @include('admin.categories._form')
            
        </form>

    </div>

</x-dashboard-layout>