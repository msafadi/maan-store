@section('sidebar')
@parent
<ul>
    <li><a href="">Add Category</a></li>
</ul>

@endsection

<x-dashboard-layout page-title="Trashed Categories">

    <div class="container">
        <h2 class="mb-2">Trashed Categories</h2>
        <div class="table-toolbar mb-4">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">Create</a>
        </div>

        <x-flash-message />

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Deleted At</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($categories) > 0)
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a></td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->deleted_at }}</td>
                    <td>{{ $category->status }}</td>
                    <td>
                        <form action="{{ route('admin.categories.restore', $category->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-sm btn-success">Restore</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.categories.force-delete', $category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete Forever</button>
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

        {{ $categories->links() }}

    </div>

</x-dashboard-layout>