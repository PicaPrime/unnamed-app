@extends('layouts.withoutNav')
@section('title', 'Register - HustleBTC')
@section('content')
<div class="login-container">
  <h2>Create Account</h2>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="input-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" required autofocus />
      @error('name')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required />
      @error('email')
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
    <div class="input-group">
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required />
      @error('password_confirmation')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <button class="login-btn" type="submit">Register</button>
    <div class="footer-text">
      <a href="{{ route('login') }}" style="color: #00ffcc; text-decoration: none">Already registered?</a>
    </div>
  </form>
</div>
@endsection
