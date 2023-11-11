<div class="list-group">
    {{-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        The current link item
    </a> --}}
    <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action">Home</a>
    <a href="#" class="list-group-item list-group-item-action">Userlog</a>
    <a href="#" class="list-group-item list-group-item-action">History</a>
    <a href="{{ route('user_assignment.index') }}" class="list-group-item list-group-item-action">User Assignments</a>
    <a href="{{ route('endorsed_course.index') }}" class="list-group-item list-group-item-action">Endorsed Courses</a>
    <a href="#" class="list-group-item list-group-item-action">Student Management</a>
    <a href="#" class="list-group-item list-group-item-action">Print Out</a>
    {{-- <a class="list-group-item list-group-item-action disabled">A disabled link item</a> --}}
</div>

<style>
    .list-group-item-action:hover {
        background-color: #bdbdbd !important;
        /* color: #ffffff !important; */
    }
</style>
