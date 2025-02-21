<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>
    <link rel="stylesheet" href="{{ asset('assets/css/student.css') }}">
</head>
<body>
    <form action="{{ url('/student') }}" method ='post'>
        @csrf 
        <div class="form-group">
            <span>Name</span>
            <input type="text" class = "form-control" name="name">
        </div>
        <div class="form-group">
            <span>Age</span>
            <input type="text" class = "form-control" name="age">
        </div>
        <div class="form-group">
            <span>Date</span>
            <input type="text" class = "form-control" name="date">
        </div>
        <div class="form-group">
            <span>Phone</span>
            <input type="text" class = "form-control" name="phone">
        </div>
        <div class="form-group">
            <span>Web</span>
            <input type="text" class = "form-control" name="web">
        </div>
        <div class="form-group">
            <span>Address</span>
            <input type="text" class = "form-control" name="address">
        </div>
        <div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <button type ="submit" class="submit">OK </button>
        <div class="display-infor">
            @if(session('users'))
                @foreach(session('users') as $user)
                    <div class="user-info">
                        <p>Name: {{ $user['name'] }}</p>
                        <p>Age: {{ $user['age'] }}</p>
                        <p>Date: {{ $user['date'] }}</p>
                        <p>Phone: {{ $user['phone'] }}</p>
                        <p>Website: {{ $user['web'] }}</p>
                        <p>Address: {{ $user['address'] }}</p>
                        <hr>
                    </div>
                @endforeach
            @endif
        </div>
    </form>
</body>
</html>