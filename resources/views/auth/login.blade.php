<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #f5af19, #f12711);
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 1rem; /* เพิ่ม padding ให้กับ body */
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            background-color: #ffffff;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .login-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .login-container::before {
            content: '';
            position: absolute;
            top: -30px;
            left: -30px;
            width: 100px;
            height: 100px;
            background: rgba(241, 39, 17, 0.2);
            border-radius: 50%;
            z-index: -1;
        }
        .login-container::after {
            content: '';
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 100px;
            height: 100px;
            background: rgba(241, 39, 17, 0.2);
            border-radius: 50%;
            z-index: -1;
        }
        .login-container h1 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            color: #333;
        }
        .form-label {
            font-weight: 700;
            color: #333;
        }
        .form-control {
            padding: 0.75rem;
            border: 1px solid #dddddd;
            border-radius: 10px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #f12711;
            box-shadow: 0 0 0 0.2rem rgba(241, 39, 17, 0.25);
        }
        .btn-primary {
            background-color: #f12711;
            border: none;
            padding: 0.75rem;
            font-weight: 700;
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #d1170a;
            transform: translateY(-2px);
        }
        .form-control::placeholder {
            color: #999;
        }
        .input-group {
            position: relative;
        }
        .input-group .form-control {
            padding-right: 2.5rem;
            border-radius: 10px;
        }
        .input-group .toggle-password {
            position: absolute;
            top: 50%;
            right: 0.75rem;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.2rem;
            display: none;
        }
        .input-group-text {
            border: none;
            background: none;
        }
        @media (max-width: 576px) {
            .login-container {
                padding: 1.5rem;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }
            .login-container h1 {
                font-size: 1.5rem;
            }
            .form-control {
                padding: 0.5rem;
            }
            .btn-primary {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                    <span class="input-group-text toggle-password">
                        <i class="bi bi-eye-slash" id="toggle-password-icon"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.querySelector('.toggle-password');
        const togglePasswordIcon = document.getElementById('toggle-password-icon');

        passwordInput.addEventListener('input', function () {
            if (passwordInput.value) {
                togglePassword.style.display = 'flex';
            } else {
                togglePassword.style.display = 'none';
            }
        });

        togglePassword.addEventListener('click', function (e) {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordIcon.classList.remove('bi-eye-slash');
                togglePasswordIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                togglePasswordIcon.classList.remove('bi-eye');
                togglePasswordIcon.classList.add('bi-eye-slash');
            }
        });
    </script>
</body>
</html>
