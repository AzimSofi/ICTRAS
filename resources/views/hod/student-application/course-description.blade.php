<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="courseDescriptionModal{{ $application->id }}" tabindex="-1" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Course description by student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body row">
                    <p>
                        {{ $application->course_description }}
                    </p>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-primary">Upload</button> --}}
            </div>
        </div>
    </div>
</div>

<script>
    const myModal = new bootstrap.Modal(document.getElementById('courseDescriptionModal'), options)
</script>
