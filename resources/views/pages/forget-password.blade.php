@extends('layouts.withoutNav')
@section('title', 'Forgot Password - HustleBTC | Reset Your Account Password')
@section('content')
<div class="login-container">
  <h2>Reset Password</h2>
  <p style="text-align: center; color: #bbb; font-size: 14px; margin-bottom: 20px; line-height: 1.4;">
    Enter your email address and we'll send you instructions to reset your password.
  </p>
  <form method="POST" action="{{ route('forget-password') }}">
    @csrf
    <div class="input-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="Enter your registered email" required />
      @error('email')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="recaptcha-container">
      <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE" data-theme="dark" data-callback="onRecaptchaSuccess"></div>
    </div>
    <button class="login-btn" id="submitBtn" type="submit" disabled>Send Reset Instructions</button>
    <div class="footer-text">
      Remember your password?
      <a href="{{ route('login') }}" style="color: #00ffcc; text-decoration: none">Login here</a>
      |
      <a href="{{ route('register') }}" style="color: #00ffcc; text-decoration: none">Create Account</a>
    </div>
  </form>
</div>
@push('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function validateForm() {
    const email = document.getElementById('email').value;
    const recaptchaResponse = grecaptcha && grecaptcha.getResponse();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const isValidEmail = emailRegex.test(email);
    const isValid = isValidEmail && recaptchaResponse;
    document.getElementById('submitBtn').disabled = !isValid;
  }
  document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
    emailInput.addEventListener('input', validateForm);
    emailInput.addEventListener('blur', validateForm);
    emailInput.addEventListener('input', function () {
      const email = this.value;
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email && !emailRegex.test(email)) {
        this.style.borderColor = '#ff4444';
        this.style.boxShadow = '0 0 5px #ff4444';
      } else {
        this.style.borderColor = '';
        this.style.boxShadow = '';
      }
    });
  });
  function onRecaptchaSuccess() {
    validateForm();
  }
</script>
@endpush
@endsection
