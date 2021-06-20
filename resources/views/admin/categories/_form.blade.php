@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group mb-3">
    <x-input name="name" :value="$category->name" label="Category Name" />
</div>
<div class="form-group mb-3">
    <label for="parent_id">Parent</label>
    <div>
        <select id="parent_id" name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
            <option value="">No Parent</option>
            @foreach ($parents as $parent)
            <option value="{{ $parent->id }}" @if($parent->id == old('parent_id', $category->parent_id)) selected @endif>{{ $parent->name }}</option>
            @endforeach
        </select>
        @error('parent_id')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-group mb-3">
    <label for="description">Description</label>
    <div>
        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
        @error('description')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-group mb-3">
    <label for="status">Status</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="active" id="status_active" @if(old('status', $category->status) == 'active') checked @endif>
            <label class="form-check-label" for="status_active">
                Active
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="inactive" id="status_inactive" @if(old('status', $category->status) == 'inactive') checked @endif>
            <label class="form-check-label" for="status_inactive">
                Inactive
            </label>
        </div>
        @error('status')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>