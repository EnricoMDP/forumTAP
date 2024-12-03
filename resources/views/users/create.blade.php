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

            <form action="{{route('Register')}}" method="POST">
                <p style="margin-bottom: 25px;">Create your account</p>
                @csrf
                <h3 style="font-weight: 300;">Name</h3>
                <div class="containerUserInfo"> 
                    <input type="text" name="name" id="name" placeholder="Your name" class="emailInp" value="{{ old('name') }}" required>
                    @error('name') <span>{{$message}}</span> @enderror
                </div>

                <h3 style="font-weight: 300;">E-mail</h3>
                <div class="containerUserInfo">
                    <input type="email" name="email" id="email" placeholder="your@example.com" class="emailInp" value="{{ old('email') }}" required>
                    @error('email') <span>{{$message}}</span> @enderror
                </div>

                <h3 style="font-weight: 300;">Password</h3>
                <div class="containerUserInfo">
                    <input type="password" name="password" id="password" placeholder="8+ strong character" class="passInp">
                    @error('password') <span>{{$message}}</span> @enderror
                </div>
                
                <div class="registerInfo">
                    <input style="margin-right: 5px;" type="radio" name="" id="">
                    <p style="margin-right: 8.5vw;">Remember for 30 days</p>
                    <a href="{{ route('Login') }}" color:#A08A6A;"> Already have an account?</a>
                </div>
                <input type="submit" class="createBtn" value="Create account"></input>
            </form>
        </div>
        <img src="{{ asset('images/imgCadastro.png') }}" alt="" style="width: 50%; height:100%">
    </div>
    

</body>
</html>