<div class="form-group mb-3">
    <label for="name">Name</label>
    <div>
        <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control">
    </div>
</div>
<div class="form-group mb-3">
    <label for="parent_id">Parent</label>
    <div>
        <select id="parent_id" name="parent_id" class="form-control">
            <option value="">No Parent</option>
            @foreach ($parents as $parent)
            <option value="{{ $parent->id }}" @if($parent->id == $category->parent_id) selected @endif>{{ $parent->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group mb-3">
    <label for="description">Description</label>
    <div>
        <textarea id="description" name="description" class="form-control">{{ $category->description }}</textarea>
    </div>
</div>
<div class="form-group mb-3">
    <label for="status">Status</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="active" id="status_active" @if($category->status == 'active') checked @endif>
            <label class="form-check-label" for="status_active">
                Active
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="inactive" id="status_inactive" @if($category->status == 'inactive') checked @endif>
            <label class="form-check-label" for="status_inactive">
                Inactive
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>