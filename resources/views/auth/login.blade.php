@extends('layouts.withoutNav')
@section('title', 'Login - HustleBTC')
@section('content')
<div class="login-container">
  <h2>Welcome Back</h2>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="input-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Enter username" required autofocus />
      @error('username')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter password" required />
      @error('password')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <label class="checkbox-label">
      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
      <span>Remember me</span>
    </label>
    <div class="recaptcha-container">
      <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE" data-theme="dark" data-callback="onRecaptchaSuccess"></div>
    </div>
    <button class="login-btn" id="loginBtn" type="submit" disabled>Login</button>
    <div class="footer-text">
      {{-- <a href="{{ route('password.request') }}" style="color: #00ffcc; text-decoration: none">Forgot your password</a>? | --}}
      <a href="{{ route('register') }}" style="color: #00ffcc; text-decoration: none">Create Account</a>
    </div>
  </form>
</div>
@push('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function validateLoginForm() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const recaptchaResponse = grecaptcha && grecaptcha.getResponse();
    const isValid = username.length >= 3 && password.length >= 6 && recaptchaResponse;
    document.getElementById('loginBtn').disabled = !isValid;
  }
  document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
    inputs.forEach((input) => {
      input.addEventListener('input', validateLoginForm);
    });
  });
  function onRecaptchaSuccess() {
    validateLoginForm();
  }
</script>
@endpush
@endsection
