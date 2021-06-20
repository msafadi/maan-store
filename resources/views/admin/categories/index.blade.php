@section('sidebar')
@parent
<ul>
    <li><a href="">Add Category</a></li>
</ul>

@endsection

<x-dashboard-layout page-title="Categories">

    <div class="container">
        <h2 class="mb-2">Categories List</h2>
        <div class="table-toolbar mb-4">
            <a href="/admin/categories/create" class="btn btn-sm btn-primary">Create</a>
        </div>

        <x-flash-message />

        <x-alert type="warning">
            <x-slot name="title">
                Alert Title
            </x-slot>
            <p>Alert body</p>
        </x-alert>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($entries) > 0)
                @foreach ($entries as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="/admin/categories/{{ $category->id }}">{{ $category->name }}</a></td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->status }}</td>
                    <td><a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-sm btn-dark">Edit</a></td>
                    <td>
                        <form action="/admin/categories/{{ $category->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No categories</td>
                </tr>
                @endif
            </tbody>
        </table>

        {{ $entries->links() }}

    </div>

</x-dashboard-layout>