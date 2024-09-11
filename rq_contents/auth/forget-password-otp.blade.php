@php
$logo = App\Models\SystemInfo::first()->value('logo');
$favicon = App\Models\SystemInfo::first()->value('favicon');
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('storage/' .$favicon)}}">
    <title>OTP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: #020617;
            font-family: nunito;
            display: flex;
        }

        .container {
            display: flex;
            flex-flow: column;
            height: 100%;
            align-items: space-around;
            justify-content: center;
            background: #0f172a;
            width: fit-content;
            height: fit-content;
            margin: auto;
            padding: 35px;
            border-radius: 10px;
        }

        .userInput {
            display: flex;
            justify-content: center;
        }

        input {
            margin: 10px;
            height: 35px;
            width: 65px;
            border: none;
            border-radius: 5px;
            text-align: center;
            font-family: nunito;
            font-size: 1.2rem;
            background: #1b2335;
            color: #fff;
        }

        input:focus {
            outline: 1px solid #6366f1;
        }

        h1 {
            text-align: center;
            font-family: Nunito;
            color: honeydew;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }


        button {
            width: fit-content;
            height: 40px;
            margin: 25px auto 0;
            font-family: nunito;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: not-allowed;
            background: #6366f1;
            color: #fff;
            padding: 2px 15px;
        }

        button:enabled {
            cursor: pointer;
            background: #4f46e5;
        }
    </style>
</head>

<body>
    <form action="{{route('forget.password.otp.submit')}}" class="container" oninput="validateForm()" method="POST">
        @csrf
        <img src="{{asset('storage/'.$logo)}}" alt="" style="width: 150px;
        margin: auto;">
        <h1>ENTER OTP</h1>
        <div class="userInput">
            <input type="text" name="type" value="{{$type}}" hidden>
            <input type="text" id="ist" maxlength="1" onkeyup="clickEvent(this, 'sec')" onkeypress="return isNumber(event)">
            <input type="text" id="sec" maxlength="1" onkeyup="clickEvent(this, 'third')" onkeypress="return isNumber(event)">
            <input type="text" id="third" maxlength="1" onkeyup="clickEvent(this, 'fourth')" onkeypress="return isNumber(event)">
            <input type="text" id="fourth" maxlength="1" onkeyup="concatenateOtp()" onkeypress="return isNumber(event)">
        </div>
        <!-- Hidden input to hold the concatenated OTP value -->
        <input type="hidden" id="otp" name="otp">
        @error('otp')
        <div class="error-message" style="text-align: center;
            color: red;
            margin-top: 15px;">
            {{ $message }}
        </div>
        @enderror
        <button type="submit" id="confirmBtn" disabled>Confirm</button>
    </form>

    <script>
        function clickEvent(first, last) {
            if (first.value.length) {
                document.getElementById(last).focus();
            }
        }

        function validateForm() {
            const ist = document.getElementById('ist').value;
            const sec = document.getElementById('sec').value;
            const third = document.getElementById('third').value;
            const fourth = document.getElementById('fourth').value;

            // Enable button if all fields are filled
            const isFormValid = ist && sec && third && fourth;
            document.getElementById('confirmBtn').disabled = !isFormValid;

            // Concatenate the OTP and store it in the hidden input
            if (isFormValid) {
                concatenateOtp();
            }
        }

        function concatenateOtp() {
            const otp = document.getElementById('ist').value +
                document.getElementById('sec').value +
                document.getElementById('third').value +
                document.getElementById('fourth').value;

            document.getElementById('otp').value = otp;
        }

        // Function to allow only numbers
        function isNumber(evt) {
            var charCode = evt.which ? evt.which : evt.keyCode;
            // Only allow digits (0-9)
            if (charCode < 48 || charCode > 57) {
                return false;
            }
            return true;
        }
    </script>
</body>

</html>