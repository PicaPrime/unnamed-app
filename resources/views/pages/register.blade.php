@extends('layouts.withoutNav')
@section('title', 'Register - HustleBTC | Create Your Bitcoin Casino Account')
@section('content')
<div class="login-container">
  <h2>Create Account</h2>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="input-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Create a username" required />
      @error('username')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required />
      @error('email')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Create a password" required />
      @error('password')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="input-group">
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" id="confirm-password" name="password_confirmation" placeholder="Repeat your password" required />
    </div>
    <label class="checkbox-label">
      <input type="checkbox" name="tos" id="tos" required />
      <span>
        I have read and agree to
        <a href="{{ route('terms') }}" target="_blank" style="color: #00ffcc; text-decoration: underline">Terms of Service</a>
      </span>
    </label>
    <div class="recaptcha-container">
      <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE" data-theme="dark" data-callback="onRecaptchaSuccess"></div>
    </div>
    <button class="login-btn" id="registerBtn" type="submit" disabled>Create Account</button>
    <div class="footer-text">
      Already have an account?
      <a href="{{ route('login') }}" style="color: #00ffcc; text-decoration: none">Login here</a>
    </div>
  </form>
</div>
@push('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function validateForm() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const tosChecked = document.getElementById('tos').checked;
    const recaptchaResponse = grecaptcha && grecaptcha.getResponse();
    const isValid =
      username.length >= 3 &&
      email.includes('@') &&
      password.length >= 6 &&
      password === confirmPassword &&
      tosChecked &&
      recaptchaResponse;
    document.getElementById('registerBtn').disabled = !isValid;
  }
  document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
      input.addEventListener('input', validateForm);
      input.addEventListener('change', validateForm);
    });
    document.getElementById('confirm-password').addEventListener('input', function () {
      const password = document.getElementById('password').value;
      const confirmPassword = this.value;
      if (confirmPassword && password !== confirmPassword) {
        this.style.borderColor = '#ff4444';
        this.style.boxShadow = '0 0 5px #ff4444';
      } else {
        this.style.borderColor = '';
        this.style.boxShadow = '';
      }
      validateForm();
    });
  });
  function onRecaptchaSuccess() {
    validateForm();
  }
</script>
@endpush
@endsection
