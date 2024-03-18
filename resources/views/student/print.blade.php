<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application for Transfer of Credit</title>
</head>

<body>
    <div class="page" style="page-break-after: always;">
        <div>
            <img src="{{ public_path('images/IIUM AMAD logo PG13 (2).png') }}" alt="PG13 header" style="width: 195mm;">
        </div>

        {{-- <div class="text-center mb-4">
            <img src="logo.png" alt="IIUM Logo" style="width: 100px;">
            <h1 class="mb-2">ACADEMIC MANAGEMENT AND ADMISSION DIVISION (AMAD)</h1>
            <h2>INTERNATIONAL ISLAMIC UNIVERSITY MALAYSIA</h2>
        </div> --}}
        <br>
        <div class="text-center mb-3 bg-black" style="padding-top: 5px; padding-bottom: 5px; font-style: ">
            <div class="form-title" style="font-size: 20px;">
                APPLICATION FOR TRANSFER OF CREDIT <br>
                (FROM OTHER UNIVERSITIES / COLLEGES)
            </div>
        </div>

        <div class="criteria-list mb-3">
            <strong>CRITERIA FOR TRANSFER OF CREDIT<br>
                Please read carefully the following criteria of transfer of credit:
            </strong>

        </div>

        <table class="checklist mb-4" style="margin-bottom: 0">
            <tr class="section-header" style="margin: 0">
                <th colspan="2" class="no-y">
                    <strong>CRITERIA FOR TRANSFER OF CREDIT<br>
                        <i>Please read carefully the following criteria of transfer of credit:</i></strong>
                </th>
            </tr>
            <tr>
                <td style="width: 50%">
                    <ol type="1">
                        <li>
                            The institutions/colleges must be recognized by
                            the Malaysian Government and IIUM.
                        </li>
                        <li>
                            Credit/Contact hours/Semester are based on 14
                            lecture weeks.
                        </li>
                        <li>
                            Minimum grade for credit transfer for diploma
                            holders shall be ‘B’ grade or its equivalent and a
                            good pass.
                        </li>
                        <li>
                            Comparability in terms of depth and content.
                        </li>
                        <li>
                            Maximum credits for transfer is 30% of the total
                            graduation requirements of the programme.
                        </li>
                        <li>
                            Courses taken within 5 years prior to admission to
                            IIUM/other maximum validity period accepted by
                            Kulliyyah.
                        </li>
                    </ol>
                    <div>
                        <strong>
                            This application form will ONLY be processed subject
                            to submission of the following documents:
                        </strong>
                    </div>

                    <ol type="1">
                        <li>
                            Transcript/result slips (showing course title and
                            grade); and
                        </li>
                        <li>
                            Course outline/syllabus/description/curricular; or
                        </li>
                        <li>
                            University/Institutional prospectus or catalogue
                        </li>
                    </ol>
                </td>
                <td style="width: 50%; vertical-align: top; padding-right: 7.5px; padding-left: 7.5px">
                    <div style="margin-top: 15px; margin-bottom: 15px">
                        <strong>
                            For Office Use Only
                        </strong>
                    </div>
                    <table>
                        <tr>
                            <td class="bg-black no-y">
                                <strong>
                                    CHECKLIST: (OFFICE USE)<br>
                                    *Please (/) which is applicable
                                </strong>
                            </td>
                            <td class="bg-black no-y">
                                <strong>*YES</strong>
                            </td>
                            <td class="bg-black no-y">
                                <strong>*NO</strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="no-y">
                                1. Course outline/syllabus
                            </td>
                            <td class="no-y">

                            </td>
                            <td class="no-y">

                            </td>
                        </tr>
                        <tr>
                            <td class="no-y">
                                2. Transcript/result slips
                            </td>
                            <td class="no-y">

                            </td>
                            <td class="no-y">

                            </td>
                        </tr>
                        <tr>
                            <td class="no-y">
                                3. Date submitted to AMAD
                                (By student)
                            </td>
                            <td class="no-y">

                            </td>
                            <td class="no-y">

                            </td>
                        </tr>
                        <tr>
                            <td class="no-y">
                                4. Date submitted to Kulliyyah
                                (By AMAD)
                            </td>
                            <td class="no-y">

                            </td>
                            <td class="no-y">

                            </td>
                        </tr>
                        <tr>
                            <td class="no-y">
                                5. Date received from AMAD
                            </td>
                            <td class="no-y">

                            </td>
                            <td class="no-y">

                            </td>
                        </tr>
                        <tr>
                            <td class="no-y">
                                6. Date submitted to HOD(s)
                            </td>
                            <td class="no-y">

                            </td>
                            <td class="no-y">

                            </td>
                        </tr>
                        <tr>
                            <td class="no-y">
                                7. Date received from HOD(s)
                            </td>
                            <td class="no-y">

                            </td>
                            <td class="no-y">

                            </td>
                        </tr>
                        <tr>
                            <td class="no-y">
                                8. Date submitted to AMAD
                            </td>
                            <td class="no-y">

                            </td>
                            <td class="no-y">

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="bg-grey no-y"><strong>PART A, B & C: TO BE FILLED IN BY THE
                        APPLICANT <i>(Please write clearly)</i></strong></td>
            </tr>
            <tr>
                <td colspan="2" class="bg-black no-y">PART A: PERSONAL DETAILS OF STUDENT</td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="margin-left: 22.5px">
                        <br>
                        {{-- Name --}}
                        <div style="width: 100%">
                            <div style="float: left; width: 20%">
                                1. <span style="margin-left: 20px;">Name</span>
                            </div>
                            <div style="float: right; width: 80%">
                                : {{ $user->name }}
                            </div>
                        </div><div style="clear: both;"></div>

                        {{-- Matric no. --}}
                        <div style="width: 100%">
                            <div style="float: left; width: 20%">
                                2. <span style="margin-left: 20px;">Matric No,</span>
                            </div>
                            <div style="float: right; width: 80%">
                                : {{ $user->matric_no }}
                            </div>
                        </div><div style="clear: both;"></div>

                        {{-- Programme --}}
                        <div style="width: 100%">
                            <div style="float: left; width: 20%">
                                3. <span style="margin-left: 20px;">Programme</span>
                            </div>
                            <div style="float: right; width: 80%">
                                : {{ $user->department->name }}
                            </div>
                        </div><div style="clear: both;"></div>

                        {{-- Email and phone no. --}}
                        <div style="width: 100%;">
                            {{-- <div style="float: left; width: 50%;"> --}}
                                <div style="float: left; width: 20%">
                                    4. <span style="margin-left: 20px;">Email</span>
                                </div>
                                <div style="float: left; width: 30%">
                                    : {{ $user->email }}
                                </div>
                            {{-- </div> --}}
                            <div style="float: right; width: 50%;">
                                5. Tel/Hp No.: {{ $user->phone_number }}
                            </div>
                        </div><div style="clear: both;"></div>

                        {{-- Postal Address --}}
                        <div style="width: 100%">
                            <div style="float: left; width: 20%">
                                6. <span style="margin-left: 20px;">Postal Address</span>
                            </div>
                            <div style="float: right; width: 80%">
                                :
                            </div>
                        </div><div style="clear: both;"></div>
                        <br>

                        {{-- Correspondance Address --}}
                        <div style="width: 100%">
                            <div style="float: left; width: 20%">
                                7. <span style="margin-left: 20px;">Correspondance<br><span style="margin-left: 35px;">Address</span></span>
                            </div>
                            <div style="float: right; width: 80%">
                                :
                            </div>
                        </div><div style="clear: both;"></div>
                        <br><br>
                    </div>
                </td>
            </tr>
        </table>
        <div class="text-center" style="margin-right: 70px; margin-left: 70px; font-size: 14px;">
            <strong><i>Note: Students who wish to apply for credit transfer must do so at the point of application
                    for<br>
                    admission or the latest by the fourth week of their first regular semester</i></strong>
        </div>

        <div class="footer text-center" style="font-family: Arial !important">
            <p>Academic Management and Admission Division<br>
                International Islamic University Malaysia Gombak Selangor Darul Ehsan<br>
                Tel: 03 6196 4045/4043 Fax: 03 6196 4724</p>
        </div>
    </div>

    <div class="page">
        <br>
        <br>
        <br>
        <br>
        <table>
            <tr>
                <td colspan="6" class="bg-black no-y"><strong>PART B: INFORMATION ON PREVIOUS INSTITUTION</strong>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <ol type="1">
                        <li>
                            Name of institution:
                        </li><br>
                        <li>
                            Name of Diploma: <br>
                            <div style="font-size: 12px">
                                <i>(for transfer students)</i>
                            </div>
                        </li>
                        <li>
                            Name of Degree/Year of study/ Reason for leaving:
                        </li><br>
                        <li>
                            Highest Qualification & CGPA <i style="font-size: 13px">(where applicable)</i>
                        </li>
                    </ol>
                </td>
            </tr>
            <tr class="bg-black">
                <td colspan="6" class="no-y">
                    PART C: LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER<br>
                    <div style="font-size: 12px">
                        <i>
                            (Please attach ALL copies of the relevant course outlines/syllabus/description)
                        </i>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="no-y">Subjects taken in previous institution (Please fill in the information
                    accordingly)</td>
            </tr>

            <tr class="bg-grey" style="font-weight: bold;">
                <td class="text-center no-y" style="vertical-align: text-top; width: 30px">
                    No
                </td>
                <td class="text-center no-y">
                    Course Code
                    <div style="font-size: 12px; font-style: italic; font-weight: normal; vertical-align: text-top;">
                        (as stated in theapplicant’s transcript)
                    </div>
                </td>
                <td class="text-center no-y">
                    Code Title
                    <div style="font-size: 12px; font-style: italic; font-weight: normal; vertical-align: text-top;">
                        (as stated in the applicant’s transcript)
                    </div>
                </td>
                <td class="text-center no-y" style="vertical-align: text-top;">
                    Credit Hours
                </td>
                <td class="text-center no-y" style="vertical-align: text-top;">
                    Grade Obtained
                </td>
                <td class="text-center no-y" style="vertical-align: text-top; width: 175px">
                    Course Code
                    <div style="font-size: 12px; font-style: italic; font-weight: normal; vertical-align: text-top;">
                        (as offered by IIUM)
                    </div>
                </td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @for ($i = 0; $i < 17; $i++)
                <tr>
                    <td><br></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endfor
        </table>
        <strong>
            NOTE: <i><u>Incomplete application will not be entertained</u></i>
        </strong>
        <br><br>
        I certify that the above and attached information is <strong>TRUE</strong>.
        <br><br>
        Applicant’s signature: ....................................<br>
        Date: .............................

        <div></div>
        <div class="footer text-center" style="font-family: Arial !important">
            <p>Academic Management and Admission Division<br>
                International Islamic University Malaysia Gombak Selangor Darul Ehsan<br>
                Tel: 03 6196 4045/4043 Fax: 03 6196 4724</p>
        </div>
    </div>
</body>

</html>

<style>
    @page {
        margin-top: 0px;
        margin-bottom: 0px;
    }

    body {
        font-family: "Times New Roman", Times, serif;
        font-size: 15px;
        margin: 0;
        padding: 0;
    }

    .page {
        width: 100%;
        /* page-break-after: always; */
    }

    .container {
        width: 100%;
        padding: 20px;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .mb-2 {
        margin-bottom: 0.5rem;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }

    .bg-black {
        background-color: black;
        color: white;
    }

    .bg-grey {
        background-color: #DFDFDF;
        color: black;
    }

    .criteria-list li {
        margin-bottom: 0.25rem;
    }

    .checklist {
        margin-top: 1rem;
    }

    .checklist td {
        padding: 0.25rem;
    }

    .checklist td:first-child {
        width: 80%;
    }

    .form-title {
        font-weight: bold;
    }

    .section-header {
        background-color: #e0e0e0;
    }

    .footer {
        margin-top: 2rem;
        font-size: 10px;

        position: absolute;
        bottom: 0;
        /* Anchors footer to the bottom */
        width: 100%;
        /* Ensures it spans the width of the page */
        text-align: center;
        /* Center text */
        margin-bottom: 20px;
    }

    .input-group {
        margin-bottom: 10px;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
    }

    .input-group input[type="text"],
    .input-group textarea {
        width: 100%;
        padding: 0.5rem;
    }

    .no-y {
        margin-top: 0px !important;
        margin-bottom: 0px !important;

        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }
</style>
