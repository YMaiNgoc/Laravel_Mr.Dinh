<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng</title>
    <link rel="stylesheet" href="{{ asset('assets/css/tong.css') }}">
</head>
<body>
    <form action="/tong" method="POST">
        @csrf
        <div class="container">
            <span class="number1">Số thứ nhất:</span><br>
            <input type="text" id="number1" name="number1" value="{{ old('number1') }}">
            <br>

            <span class="number2">Số thứ hai:</span><br>
            <input type="text" id="number2" name="number2" value="{{ old('number2') }}">
            <br>

            <button type="submit">Submit</button>
        </div>
    </form>

    @if(isset($sum))
        <p>Tổng: {{ $sum }}</p>
    @endif
</body>
</html>
