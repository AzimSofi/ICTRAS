<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="previousInstitutionModal" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add previous institution information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('student.createPreviousInstitution') }}">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="degree_status" class="form-label">Degree or diploma</label>
                                <select class="form-select" id="degree_status" name="degree_status" required>
                                    <option value="1">Degree</option>
                                    <option value="0">Diploma</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="degree_or_diploma_name" class="form-label">Degre or diploma name</label>
                                <input type="text" class="form-control" id="degree_or_diploma_name" name="degree_or_diploma_name" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="year_of_study" class="form-label">Year of study</label>
                                <select name="year_of_study" id="year_of_study" class="form-control">
                                    @for ($year = date('Y'); $year >= 1999; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="reason_of_leaving" class="form-label">Reason of leaving</label>
                                <input type="text" class="form-control" id="reason_of_leaving" name="reason_of_leaving" required>
                            </div>
                            <div class="mb-3">
                                <label for="cgpa" class="form-label">CGPA</label>
                                <input type="number" class="form-control" id="cgpa" name="cgpa" min="0" max="4.0" step="0.01" placeholder="Enter CGPA" required>
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
    const myModal = new bootstrap.Modal(document.getElementById('previousInstitutionModal'), options)
</script>
