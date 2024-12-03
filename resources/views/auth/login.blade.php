<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="containerLogin">
        <div class="containerInfo">
            <h2 style="margin-bottom: 10px; font-size: 30px">Welcome To Prody</h2>
            <p style="margin-bottom: 25px;">Enter your account</p>

            <form action="{{ route('Login')}}" method="POST" >
                <h3 style="font-weight: 300;">E-mail</h3>
                @csrf
                <div class="containerUserInfo">
                    <input type="email" name="email" id="email" placeholder="your@example.com" class="emailInp" value="{{ old('email') }}" required>
                    @error('email') <span>{{$message}}</span> @enderror
                </div>

                <h3 style="font-weight: 300;">Password</h3>
                <div class="containerUserInfo">
                    <input type="password" name="password" id="password" placeholder="6+ strong character" class="passInp">
                    @error('email') <span>{{$message}}</span> @enderror
                </div>
                
                <input type="submit" class="createBtn" value="Login"></input>
            </form>
            <a href="{{ route('Register') }}">Create account</a>
        </div>
        <img src="{{ asset('images/imgCadastro.png') }}" alt="" style="width: 50%; height:100%">
    </div>
    

</body>
</html>