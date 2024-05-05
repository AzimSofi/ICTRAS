<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="courseOutlineModal" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Course outline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col">
                    <div class="mb-3">
                        Upload course outline (pdf):
                        <form action="{{ route('courseOutline.store', ['application' => $application->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="pdf" required>
                            <button type="submit">Upload</button>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
            </div>
            {{-- <form method="POST" action="{{ route('', $user) }}">
                @csrf
                @method('PUT')
                <div class="modal-body row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $user->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form> --}}
        </div>
    </div>
</div>

<script>
    const myModal = new bootstrap.Modal(document.getElementById('courseOutlineModal'), options)
</script>
