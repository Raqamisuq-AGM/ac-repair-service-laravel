@php
$logo = App\Models\SystemInfo::first()->value('logo');
$favicon = App\Models\SystemInfo::first()->value('favicon');
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $favicon) }}">
    <title>Update Password</title>
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
            display: grid;
            gap: 10px;
        }

        input {
            width: 400px;
            height: 35px;
            border: none;
            border-radius: 5px;
            font-family: nunito;
            font-size: 1.2rem;
            background: #1b2335;
            color: #fff;
            padding: 10px;
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

        .error-message {
            text-align: center;
            color: red;
            margin-top: 35px;
        }
    </style>
</head>

<body>
    <form action="{{ route('update.password.submit') }}" class="container" method="POST">
        @csrf
        <img src="{{asset('storage/'.$logo)}}" alt="" style="width: 150px;
        margin: auto;">
        <h1>Update Your Password</h1>
        <div class="userInput">
            <input type="text" name="type" value="{{ $type }}" hidden>
            <label for="password" style="color:#fff">Password</label>
            <input type="text" name="password" required id="password">
            @error('password')
            <div class="error-message">
                {{ $message }}
            </div>
            @enderror
            <label for="confirm_password" style="display:block; margin-top:15px; color:#fff">Confirm Password</label>
            <input type="text" name="confirm_password" required id="confirm_password">
            @error('confirm_password')
            <div class="error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
        @error('otp')
        <div class="error-message">
            {{ $message }}
        </div>
        @enderror
        <button type="submit">Update Password</button>
    </form>
</body>

</html>