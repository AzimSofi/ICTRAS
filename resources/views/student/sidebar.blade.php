<div class="list-group">
    {{-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        The current link item
    </a> --}}
    <a href="{{ route('student.index') }}" class="list-group-item list-group-item-action">Home</a>
    <a href="{{ route('applications.index') }}" class="list-group-item list-group-item-action">Application</a>
    <a href="#" class="list-group-item list-group-item-action">Status</a>
    <a href="{{ route('student.print') }}" class="list-group-item list-group-item-action">Print Form</a>
    {{-- <a class="list-group-item list-group-item-action disabled">A disabled link item</a> --}}
</div>

<style>
    .list-group-item-action:hover {
        background-color: #bdbdbd !important;
        /* color: #ffffff !important; */
    }
</style>
