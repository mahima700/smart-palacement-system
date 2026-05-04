<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: #f4f6f8;
}

.login-section {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 400px;
    max-width: 90%;
}

.container h1 {
    text-align: center;
    font-size: 28px;
    margin-bottom: 25px;
    color: #333;
}

.login-form {
    display: flex;
    flex-direction: column;
}

.input-group {
    margin-bottom: 18px;
}

.input-group label {
    margin-bottom: 6px;
    font-weight: 600;
    color: #555;
}

.input-group input {
    width: 100%;
    padding: 10px 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 15px;
}

.input-group input:focus {
    border-color: #007BFF;
    outline: none;
}

/* BUTTON */
.btn-submit {
    padding: 12px;
    background: #007BFF;
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.btn-submit:hover {
    background: #0056b3;
}

/* ERROR */
.error-message {
    margin-bottom: 15px;
    padding: 10px;
    background: #fde2e2;
    border-radius: 6px;
    color: #b71c1c;
    text-align: center;
}

/* SUCCESS */
.success-message {
    margin-bottom: 15px;
    padding: 10px;
    background: #d1fae5;
    border-radius: 6px;
    color: #065f46;
    text-align: center;
}

.register-link {
    text-align: center;
    margin-top: 12px;
    font-size: 14px;
}
</style>

</head>
<body>

<section class="login-section">
    <div class="container">
        <h1>Admin Login</h1>

        <!-- SUCCESS -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR -->
        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}" class="login-form">
            @csrf

            <!-- EMAIL -->
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email" required>
            </div>

            <!-- PASSWORD -->
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password"
                    placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn-submit">Login</button>

            <p class="register-link">
                Don't have an account? 
                <a href="{{ url('/admin/register') }}">Register</a>
            </p>

        </form>
    </div>
</section>

</body>
</html>