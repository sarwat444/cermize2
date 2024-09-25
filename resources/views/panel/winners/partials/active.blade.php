<td>
    <div class="form-check-size">
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input check-size active_status" id="{{ $winner->id }}" type="checkbox" role="switch" {{ $winner->is_active != 0 ? 'checked' : '' }}>
        </div>
    </div>
</td>
