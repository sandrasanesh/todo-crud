<div class="form-group">
    <label class="form-label" for="title">Title</label>
    <input class="form-input" id="title" name="title" type="text" value="{{ old('title', $todo?->title) }}" required maxlength="255" autofocus>
    @error('title') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label class="form-label" for="description">Description</label>
    <textarea class="form-textarea" id="description" name="description">{{ old('description', $todo?->description) }}</textarea>
    @error('description') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label class="form-label" for="status">Status</label>
    <select class="form-select" id="status" name="status" required>
        <option value="pending" @selected(old('status', $todo?->status ?? 'pending') === 'pending')>Pending</option>
        <option value="completed" @selected(old('status', $todo?->status) === 'completed')>Completed</option>
    </select>
    @error('status') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label class="form-label" for="due_date">Due Date</label>
    <input class="form-input" id="due_date" name="due_date" type="date" value="{{ old('due_date', $todo?->due_date?->format('Y-m-d')) }}">
    @error('due_date') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="form-actions">
    <button class="button button-primary" type="submit">{{ $submitLabel }}</button>
    <a class="button button-secondary" href="{{ route('todos.index') }}">Cancel</a>
</div>
