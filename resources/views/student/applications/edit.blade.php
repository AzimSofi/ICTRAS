<div class="card card-body">
    <form action="{{ route('applications.update', $application) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="course_code{{ $application->id }}" class="form-label">Course code</label>
                    <input type="text" class="form-control" id="course_code{{ $application->id }}" name="course_code"
                        required value="{{ $application->course_code ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="course_name{{ $application->id }}" class="form-label">Course name</label>
                    <input type="text" class="form-control" id="course_name{{ $application->id }}" name="course_name"
                        required value="{{ $application->course_name ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="grade_obtained{{ $application->id }}" class="form-label">Grade obtained</label>
                    <select class="form-select" id="grade_obtained{{ $application->id }}" name="grade_obtained"
                        required>
                        <option value="A" {{ $application->grade_obtained == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $application->grade_obtained == 'B' ? 'selected' : '' }}>B</option>
                        {{-- <option value="C" {{ $application->grade_obtained == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ $application->grade_obtained == 'D' ? 'selected' : '' }}>D</option>
                        <option value="E" {{ $application->grade_obtained == 'E' ? 'selected' : '' }}>E</option>
                        <option value="F" {{ $application->grade_obtained == 'F' ? 'selected' : '' }}>F</option> --}}
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="department{{ $application->id }}" class="form-label">Department</label>
                    <select id="department{{ $application->id }}" name="department_id" class="form-select">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ $application->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="endorsed_course_code{{ $application->id }}" class="form-label">IIUM Course code</label>
                    <input type="text" class="form-control" id="endorsed_course_code{{ $application->id }}" name="endorsed_course_code"
                        required value="{{ $application->endorsed_course_code ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="endorsed_course_name{{ $application->id }}" class="form-label">IIUM Course name</label>
                    <input type="text" class="form-control" id="endorsed_course_name{{ $application->id }}" name="endorsed_course_name"
                        required value="{{ $application->endorsed_course_name ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="credit_hours{{ $application->id }}" class="form-label">Credit hours</label>
                    <input type="text" class="form-control" id="credit_hours{{ $application->id }}" name="credit_hours"
                        required value="{{ $application->credit_hours ?? '' }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" data-bs-toggle="collapse" data-bs-target="#editCourse{{ $application->id }}"
            class="btn btn-secondary">Cancel</button>
    </form>
</div>
