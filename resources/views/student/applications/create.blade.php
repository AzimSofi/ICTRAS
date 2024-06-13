<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="applicationModal" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add a Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('applications.store') }}">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="course_code" class="form-label">Course code</label>
                                <input type="text" class="form-control" id="course_code" name="course_code" required pattern="[a-zA-Z0-9]+">
                            </div>
                            <div class="mb-3">
                                <label for="course_name" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" required pattern="[a-zA-Z0-9]+">
                            </div>
                            <div class="mb-3">
                                <label for="grade_obtained" class="form-label">Grade Obtained</label>
                                <select class="form-select" id="grade_obtained" name="grade_obtained" required>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    {{-- <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option> --}}
                                </select>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="department_id" class="form-label">Department</label>
                                <select id="department_id" name="department_id" class="form-select">
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="endorsed_course_code" class="form-label">IIUM Course code</label>
                                <input type="text" class="form-control" id="endorsed_course_code" name="endorsed_course_code" required pattern="[a-zA-Z]{4} \d{4}">
                            </div>
                            <div class="mb-3">
                                <label for="endorsed_course_name" class="form-label">IIUM Course Name</label>
                                <input type="text" class="form-control" id="endorsed_course_name" name="endorsed_course_name" required pattern="[a-zA-Z0-9 ]+">
                            </div>
                            <div class="mb-3">
                                <label for="credit_hours" class="form-label">Credit hours</label>
                                <input type="numer" class="form-control" id="credit_hours" name="credit_hours" required pattern="\d">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="course_description" class="form-label">Course description</label>
                            <textarea class="form-control" id="course_description" name="course_description" rows="5" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const myModal = new bootstrap.Modal(document.getElementById('applicationModal'), options)

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            const courseCodePattern = /^[a-zA-Z0-9]+$/;
            const courseNamePattern = /^[a-zA-Z0-9 ]+$/;
            const endorsedCourseCodePattern = /^\d{4} [A-Z]{4}$/;
            const endorsedCourseNamePattern = /^[a-zA-Z0-9 ]+$/;
            const creditHoursPattern = /^\d$/;

            const courseCode = document.getElementById('course_code').value;
            const courseName = document.getElementById('course_name').value;
            const endorsedCourseCode = document.getElementById('endorsed_course_code').value;
            const endorsedCourseName = document.getElementById('endorsed_course_name').value;
            const creditHours = document.getElementById('credit_hours').value;

            if (!courseCodePattern.test(courseCode)) {
                alert('Invalid course code. Please enter letters and numbers only.');
                event.preventDefault();
                return;
            }

            if (!courseNamePattern.test(courseName)) {
                alert('Invalid course name. Please enter letters and numbers only.');
                event.preventDefault();
                return;
            }

            if (!endorsedCourseCodePattern.test(endorsedCourseCode)) {
                alert('Invalid IIUM course code. Please enter in the format "#### XXXX".');
                event.preventDefault();
                return;
            }

            if (!endorsedCourseNamePattern.test(endorsedCourseName)) {
                alert('Invalid IIUM course name. Please enter letters and numbers only.');
                event.preventDefault();
                return;
            }

            if (!creditHoursPattern.test(creditHours)) {
                alert('Invalid credit hours. Please enter a single digit number.');
                event.preventDefault();
                return;
            }
        });
    });

</script>
