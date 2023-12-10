<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Credit Transfer and Letter of Permission</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .header, .footer {
            text-align: center;
        }
        .content {
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .signature {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="{{ public_path('images/Admin student management print/KOE.png') }}" alt="IIUM logo">
</div>

<div class="content">
    <p>Reference: IIUM/306/12/1/1</p>
    <p>Date: {{ date('Y-m-d H:i:s') }}</p>
    <br>
    <p>Assalamualaikum wrt. wrb.</p>
    <p>Dear Br./Sr.,</p>
    <br>
    <p><strong>CREDIT TRANSFER AND LETTER OF PERMISSION</strong></p>
    <p>May this letter reach you while you are in the best of health by the grace of Allah SWT. The above matter is kindly referred.</p>
    <br>
    <p><strong>PART B: INFORMATION ON PREVIOUS INSTITUTION</strong></p>
    <p><strong>PART C: LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</strong></p>
    <br>
    <!-- Table for courses -->
    <table>
        <tr>
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Credit Hours</th>
            <th>Grade Obtained</th>
            <th>Status</th>
        </tr>
        <!-- Loop through courses -->
        {{-- @foreach($courses as $course) --}}
            <tr>
                <td>a {{-- {{ $course->code }} --}}</td>
                <td>a {{-- {{ $course->title }} --}}</td>
                <td>a {{-- {{ $course->credit_hours }} --}}</td>
                <td>a {{-- {{ $course->grade }} --}}</td>
                <td>a {{-- {{ $course->status }} --}}</td>
            </tr>
        {{-- @endforeach --}}
    </table>
    <br>
    <p>For further information kindly contact us at +603-61964000- ext. 3390 or e-mail us at dean.unit@iium.edu.my.</p>
    <p>Thank you. Wassalam.</p>
    <p>Sincerely,</p>
    <div class="signature">
        <p>ASSOC. PROF. DR SANY IZAN IHSAN</p>
        <p>Dean</p>
        <p>Kulliyyah of Engineering, International Islamic University Malaysia (IIUM)</p>
    </div>
</div>

<div class="footer">
    <!-- Footer content if needed -->
</div>

</body>
</html>
