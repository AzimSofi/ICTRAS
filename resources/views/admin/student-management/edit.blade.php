<div class="card card-body">
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name{{ $user->id }}" class="form-label">Name</label>
                <input type="text" class="form-control" id="name{{ $user->id }}" name="name"
                    value="{{ $user->name }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="department{{ $user->id }}" class="form-label">Department</label>
                <select id="department{{ $user->id }}" name="department" class="form-select">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ $user->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="matric_no{{ $user->id }}" class="form-label">Matric No</label>
                <input type="text" class="form-control" id="matric_no{{ $user->id }}" name="matric_no"
                    value="{{ $user->matric_no }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone_number{{ $user->id }}" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number{{ $user->id }}" name="phone_number"
                    value="{{ $user->phone_number }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="email{{ $user->id }}" class="form-label">Email</label>
                <input type="email" class="form-control" id="email{{ $user->id }}" name="email"
                    value="{{ $user->email }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" data-bs-toggle="collapse" data-bs-target="#editUser{{ $user->id }}"
            class="btn btn-secondary">Cancel</button>
    </form>
</div>
