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
                                <input type="text" class="form-control" id="course_code" name="course_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="course_name" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="credit_hours" class="form-label">Credit hours</label>
                                <input type="numer" class="form-control" id="credit_hours" name="credit_hours" required>
                            </div>
                            <div class="mb-3">
                                <label for="grade_obtained" class="form-label">Grade Obtained</label>
                                <select class="form-select" id="grade_obtained" name="grade_obtained" required>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
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
</script>
