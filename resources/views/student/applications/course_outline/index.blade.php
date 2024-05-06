<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="courseOutlineModal{{ $application->id }}" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Course outline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('courseOutline.store', ['application' => $application->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body row">
                    <div class="col">
                        <div class="mb-3">
                            <strong>Upload course outline (pdf):</strong>
                            <div class="mt-3">
                                <input type="file" name="pdf" required>
                            </div>
                            {{-- <button type="submit">Upload</button> --}}
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const myModal = new bootstrap.Modal(document.getElementById('courseOutlineModal'), options)
</script>
