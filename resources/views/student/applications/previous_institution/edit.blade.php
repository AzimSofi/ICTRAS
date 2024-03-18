<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="editPreviousInstitutionModal" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Edit previous institution information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('student.editPreviousInstitution', $user) }}">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    value="{{ $user->previousInstitution->name ?? "" }}">
                            </div>
                            <div class="mb-3">
                                <label for="degree_status" class="form-label">Degree or diploma</label>
                                <select class="form-select" id="degree_status" name="degree_status" required>
                                    <option value="1"
                                        {{ $user->previousInstitution && $user->previousInstitution->degree_status == 1 ? 'selected' : '' }}>
                                        Degree</option>
                                    <option value="0"
                                        {{ $user->previousInstitution && $user->previousInstitution->degree_status === 0 ? 'selected' : '' }}>
                                        Diploma</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="degree_or_diploma_name" class="form-label">Degree or diploma name</label>
                                <input type="text" class="form-control" id="degree_or_diploma_name"
                                    name="degree_or_diploma_name" required
                                    value="{{ $user->previousInstitution->degree_or_diploma_name ?? "" }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="year_of_study" class="form-label">Year of study</label>
                                <select name="year_of_study" id="year_of_study" class="form-control">
                                    @for ($year = date('Y'); $year >= 1999; $year--)
                                        <option value="{{ $year }}"
                                            {{ $user->previousInstitution && $user->previousInstitution->year_of_study == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="reason_of_leaving" class="form-label">Reason of leaving</label>
                                <input type="text" class="form-control" id="reason_of_leaving"
                                    name="reason_of_leaving" required
                                    value="{{ $user->previousInstitution->reason_of_leaving ?? "" }}">
                            </div>
                            <div class="mb-3">
                                <label for="cgpa" class="form-label">CGPA</label>
                                <input type="number" class="form-control" id="cgpa" name="cgpa" min="0"
                                    max="4.0" step="0.01" placeholder="Enter CGPA" required
                                    value="{{ $user->previousInstitution->cgpa ?? "" }}">
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
    const myModal = new bootstrap.Modal(document.getElementById('editPreviousInstitutionModal'), options)
</script>
