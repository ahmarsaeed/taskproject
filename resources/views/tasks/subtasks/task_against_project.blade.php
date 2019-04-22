
    <div class="form-group">
        <label>Tasks:</label><br>
        <select name="task_id" id="task_id" class="admin-panel">
            <option value="0" > Select Tasks </option>
            @foreach($tasks as $t)

                <option value="{{ $t->id }}" >  {{ $t->task_name }} </option>

            @endforeach
        </select>

    </div>

