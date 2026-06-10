@php

    $ajuste = App\Models\Ajuste::first();
    $imagen_logo = $ajuste ? $ajuste->logo : './assets/compiled/svg/logo.svg';
    $imagen_login = ($ajuste && !empty($ajuste->imagen_login)) ? 'storage/'.$ajuste->imagen_login : null;
    @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{$ajuste->nombre ?? env('APP_NAME')}}</title>



    <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAACo1BMVEX////9/v684ee74Ofp9few2+Oc0tsdma0gm6/T6+/h8vROr78Gj6UFjqUAjKM2pLbf8PNNr78CjaQOkqi64OYSlKnM6O1xv8z1+/xuvsvx+fr3+/xetsXc7/Lw+Prt9/k0pLbS6+9PsMB1wc34/P2Z0dra7vIQk6my3OP5/P1IrL2BxtLi8vU0o7ZDqrvv+Pn9/v/+///3/Pys2eELkacKkKav2+L6/f656PJszuPU8Pfr9vj8/v7z+ftLrr5ft8X8/f6o4u4TsNIKrdDC6/Py+fovobSPzdf7/f2e09wDjaQqn7Ln9Pbx+vw/v9oAqs7J5+sPk6knnrHl8/bQ6u4UlaoPk6jI5uvi9fknt9YJrdDE6/Tj8vU7prgMkadbtcT0+vvq9vguobMEjqSo2OD0+/yr4Oqf3Oei3OjR7PHg8fTC4+ml1t7k8/X7/f71+vs9qLnq9fdCqrsfmq49p7n6/f1svcpmusjo9fcrn7IDjqSn19/0+/3C5+5Ws8IRlKkKkKcHj6YBjaMJkKZTssHe8PPN6O0TlKoNkqjG5erh9flLw9yS2eim2+W44OeRztgIj6YXlqup2ODL5+yX0NomnbHg9fkftNQFrM8jttXJ7fUKkaei1d3G5evq+PsuudctoLOw2+Kh1N0Rk6mC1ecGrM9+xdA6prg1pLaOzNbL6Ozw+vx91OYzu9jJ5+wzo7V8xNBluced09z2+/xqvMllusfp+Pv4/f74/PxnushctsTz+vtKrb4BjKNAqbq33+W74OY/qLrf8fTY7fFFq7xVssKk1t7X7fDZ7vGq2eBdtsTS6u/i8vQEjqUZl6w2pbcbmK1juMea0ts8p7n1+/vm9PZQsMAgmq4onrFctcSm19/s9vi03eSQzdeLy9WY0dq+4uisPBg1AAACIklEQVQ4y32TZ1sTQRSFTzRi2xxlI2hQIworBpEExY6CJFHEgoq9IHZNjMQgii2U2LD3QmxYsaJix14QNfbe0J/iBwHZ6HK+zbzvM3PvPHcAxajq1VcpU6gbBDRs1FiZN2kqaNisuTIPFElti7o5g4Lr5kLLVnVzXYgCb93mD2+rVxDahZIUdO07hIUrPJCkpaDrGChGdFI4whAQ2TkkqgsZbfyHmUwAENNVBXSLZfcefrhnr959YOgbBwDo15+MT5ALAxLNFmvYwEFJAIDByRwyVMaHDU8xW0aM5KhUAMDoMRw7TiaMnzAxcdLkKWlT0wEA06ZzxkyZMGv2nLnzbPb5wTabzbEAGU5SkgkLXZk1camRvshfyFossirikixkL+Wy5TJhxUp3Tm4eme/JWbUaWLOW6wpkwvoNGzdt3rKV27bvsALYKXKXQybs3rN3X6Hdy0wbAFgjSXcWAPV+SZIk6UAMDh5KMVvsXh5WA0BRGoUjAFB0VCCpcRtgOnbcbLF7NSdUAKJOksXZAGAtOBVLFp8GcObsucLzJReMAPQXRXouVd1delmkcMUBIO7qtevZcQBSbwgUb5ZVV+e4dZvinbul1evwe9Eief/B3/ofPhLJiMflT4wZGfqKp8+CSNH1vHaHvngPyRcvQ53OV68FkrFvfPJRKHtbomFN8t6Vv/cftpgP0sdPuflksvbzl6/f/v8hKr7/qKz8+cuXVGvzN3L9jqc5Y06VAAAAAElFTkSuQmCC"
        type="image/png">
    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="./assets/compiled/css/auth.css">
  
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-4 col-12">
                <div id="auth-left">
                    <div class="auth-logo1">
                        <a href="index.html">
                            @if ($ajuste)
                                <img src="{{ url('storage/' . $ajuste->logo) }}" style="width: auto; height: 130px;" alt="Logo">
                            @else
                                <img src="./assets/compiled/svg/logo.svg" style="width: auto; height: 130px;" alt="Logo">
                            @endif
                            
                        </a>
                    </div>
                <br>
                <br>
                    <p class="auth-subtitle mb-5">Ingreso al Sistema</p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                                                required autocomplete="current-password">
                                                            
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div id="auth-right" style="height: 100%; width: 100%;">
                    <div style="background-image: url('{{ asset($imagen_login) }}');
                        background-size: 100% 100%;
                        background-position: center;
                        background-repeat: no-repeat;
                        height: 100%;
                        width: 100%;">
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>



