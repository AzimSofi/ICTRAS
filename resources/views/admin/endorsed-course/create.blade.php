<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="endorseCourseModal" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Endorse a Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('endorsed_courses.store') }}">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="university" class="form-label">University</label>
                                <input type="text" class="form-control" id="university" name="university" required>
                            </div>
                            <div class="mb-3">
                                <label for="department_id" class="form-label">Department</label>
                                {{-- <input type="text" class="form-control" id="department" name="department" required> --}}
                                <select id="department_id" name="department_id" class="form-select">
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="course_name" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="endorsed_course_name" class="form-label">Endorsed Course Name</label>
                                <input type="text" class="form-control" id="endorsed_course_name" name="endorsed_course_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="1">APPROVED</option>
                                    <option value="0">DISAPPROVED</option>
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


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('endorseCourseModal'), options)

</script>
