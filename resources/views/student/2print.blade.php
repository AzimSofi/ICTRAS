<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application for Transfer of Credit</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .application-form {
            font-size: 0.9em;
        }
        .footer {
            font-size: 0.8em;
            text-align: center;
            margin-top: 40px;
        }
        .note {
            font-size: 0.8em;
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="{{ public_path('images/Student print form/footer.png') }}" alt="IIUM header">
    <img src="{{ public_path('path_to_logo.png') }}" alt="IIUM logo">
    <h1>ACADEMIC MANAGEMENT AND ADMISSION DIVISION (AMAD)</h1>
    <h2>INTERNATIONAL ISLAMIC UNIVERSITY MALAYSIA</h2>
    <h3>APPLICATION FOR TRANSFER OF CREDIT (FROM OTHER UNIVERSITIES / COLLEGES)</h3>
</div>

<div class="application-form">
    <p>CRITERIA FOR TRANSFER OF CREDIT</p>
    <p>Please read carefully the following criteria of transfer of credit:</p>
    <ul>
    </ul>
    <h4>APPLICATION FORM</h4>
    <table>
        <tr>
            <th colspan="2">PART A: PERSONAL DETAILS OF STUDENT</th>
        </tr>
        <tr>
            <td>Student Name:</td>
            <td>{{-- $student->name --}}</td>
        </tr>
        <tr>
            <th colspan="2">PART B: INFORMATION ON PREVIOUS INSTITUTION</th>
        </tr>
        <tr>
            <td>Name of Institution:</td>
            <td>{{-- $previous_institution->name --}}</td>
        </tr>
        <tr>
            <th colspan="4">PART C: LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</th>
        </tr>
        <tr>
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Credit Hours</th>
            <th>Grade Obtained</th>
        </tr>
        {{-- @foreach($courses as $course) --}}
            <tr>
                <td>a {{-- {{ $course->code }} --}} </td>
                <td>a {{-- {{ $course->title }} --}} </td>
                <td>a {{-- {{ $course->credit_hours }} --}} </td>
                <td>a {{-- {{ $course->grade }} --}} </td>
            </tr>
        {{-- @endforeach --}}
    </table>
</div>
<div class="footer">
    <img src="{{ public_path('images/Student print form/footer.png') }}" alt="IIUM footer">
</div>
</body>
</html>
