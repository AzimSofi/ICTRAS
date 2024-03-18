<div class="list-group">
    {{-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        The current link item
    </a> --}}
    <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action">Home</a>
    <a href="{{ route('userlogs.index') }}" class="list-group-item list-group-item-action">Userlog</a>
    <a href="{{ route('endorsed_courses.index') }}" class="list-group-item list-group-item-action">Endorsed Courses</a>
    <a href="{{ route('student_management.index') }}" class="list-group-item list-group-item-action">Student
        Management</a>
    <a href="{{ route('admin.student-application.index') }}" class="list-group-item list-group-item-action">Student's Application</a>
    {{-- <a class="list-group-item list-group-item-action disabled">A disabled link item</a> --}}
</div>
<style>
    .list-group-item-action:hover {
        background-color: #bdbdbd !important;
        /* color: #ffffff !important; */
    }
</style>
