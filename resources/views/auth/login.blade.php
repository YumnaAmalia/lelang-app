<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | Sistem Lelang</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

    /* RESET */
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family:'Segoe UI',sans-serif;
        min-height:100vh;

        background:
            linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.7)),
            url('{{ asset("images/bg-login.jpg") }}');

        background-size:cover;
        background-position:center;

        display:flex;
        justify-content:center;
        align-items:center;
        padding:20px;
    }

    /* CARD */
    .login-card{
        width:100%;
        max-width:400px;

        background:rgba(255,255,255,0.08);

        backdrop-filter:blur(14px);

        border:1px solid rgba(255,255,255,0.1);

        border-radius:24px;

        padding:35px;

        box-shadow:0 20px 40px rgba(0,0,0,0.35);

        color:white;

        animation:fadeIn .4s ease;
    }

    /* LOGO */
    .logo{
        width:80px;
        height:80px;

        margin:auto;
        margin-bottom:20px;

        border-radius:20px;

        background:linear-gradient(135deg,#F2C94C,#D4A62A);

        display:flex;
        justify-content:center;
        align-items:center;

        font-size:36px;
        color:black;
    }

    /* TITLE */
    h2{
        text-align:center;
        margin-bottom:8px;
        font-size:28px;
    }

    .subtitle{
        text-align:center;
        color:#ddd;
        font-size:14px;
        margin-bottom:30px;
    }

    /* FORM */
    .form-group{
        margin-bottom:18px;
    }

    /* LABEL */
    label{
        display:block;
        margin-bottom:8px;
        font-size:13px;
        color:#ddd;
    }

    /* WRAPPER */
    .input-wrap{
        position:relative;
        width:100%;
    }

    /* ICON KIRI */
    .input-icon{
        position:absolute;

        left:16px;
        top:50%;

        transform:translateY(-50%);

        color:#aaa;
    }

    /* INPUT */
    .input-wrap input{
        width:100%;
        height:52px;

        border:none;
        outline:none;

        border-radius:14px;

        padding-left:46px;
        padding-right:50px;

        background:rgba(255,255,255,0.08);

        color:white;

        font-size:14px;
    }

    /* PASSWORD TOGGLE */
    /* TOGGLE PASSWORD */
    .toggle-password{
        position:absolute;

        right:16px;
        top:50%;

        transform:translateY(-50%);

        cursor:pointer;

        color:#aaa;

        z-index:10;
    }

    /* HOVER */
    .toggle-password:hover{
        color:#F2C94C;
    }

    /* EXTRA PADDING */
    #password{
        padding-right:45px;
    }

    /* PLACEHOLDER */
    input::placeholder{
        color:#bbb;
    }

    /* FOCUS */
    input:focus{
        background:rgba(255,255,255,0.12);

        box-shadow:
            0 0 0 4px rgba(242,201,76,.15);
    }

    /* BUTTON */
    button{
        width:100%;
        height:48px;

        border:none;
        border-radius:12px;

        background:linear-gradient(135deg,#F2C94C,#D4A62A);

        color:black;

        font-size:15px;
        font-weight:700;

        cursor:pointer;

        transition:.2s;
    }

    /* HOVER */
    button:hover{
        transform:translateY(-2px);

        box-shadow:
            0 10px 25px rgba(242,201,76,.3);
    }

    /* ERROR */
    .error{
        background:rgba(231,76,60,.15);

        border:1px solid rgba(231,76,60,.3);

        color:#ffb3b3;

        padding:12px;

        border-radius:10px;

        margin-bottom:18px;

        font-size:13px;
    }

    /* FOOTER */
    .footer{
        margin-top:24px;
        text-align:center;
        font-size:12px;
        color:#aaa;
    }

    /* ANIMATION */
    @keyframes fadeIn{
        from{
            opacity:0;
            transform:translateY(10px);
        }
        to{
            opacity:1;
            transform:translateY(0);
        }
    }

</style>

</head>

<body>

<div class="login-card">

    <!-- LOGO -->
    <div class="logo">
        <i class="bi bi-bank2"></i>
    </div>

    <!-- TITLE -->
    <h2>Sistem Lelang</h2>

    <div class="subtitle">
        Silakan login untuk melanjutkan
    </div>

    <!-- ERROR -->
    @if(session('error'))
        <div class="error">
            <i class="bi bi-exclamation-circle"></i>
            {{ session('error') }}
        </div>
    @endif

    <!-- FORM -->
    <form method="POST" action="/login">
        @csrf

        <!-- EMAIL -->
        <div class="form-group">

            <label>Email</label>

            <div class="input-wrap">
                <i class="bi bi-envelope  input-icon"></i>

                <input 
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required
                >
            </div>

        </div>

        <!-- PASSWORD -->
        <div class="form-group">

            <label>Password</label>

            <div class="input-wrap">

                <!-- ICON KIRI -->
                <i class="bi bi-lock input-icon"></i>

                <!-- INPUT -->
                <input 
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

                <!-- ICON MATA -->
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="bi bi-eye" id="eyeIcon"></i>
                </span>

            </div>

        </div>

        <!-- BUTTON -->
        <button type="submit">
            <i class="bi bi-box-arrow-in-right"></i>
            Masuk
        </button>

    </form>

    <!-- FOOTER -->
    <div class="footer">
        © {{ date('Y') }} Sistem Informasi Administrasi Lelang
    </div>

</div>

<script>

    function togglePassword(){

        let password = document.getElementById('password');

        let eye = document.getElementById('eyeIcon');

        if(password.type === 'password'){

            password.type = 'text';

            eye.classList.remove('bi-eye');
            eye.classList.add('bi-eye-slash');

        }else{

            password.type = 'password';

            eye.classList.remove('bi-eye-slash');
            eye.classList.add('bi-eye');

        }

    }

</script>

</body>
</html>