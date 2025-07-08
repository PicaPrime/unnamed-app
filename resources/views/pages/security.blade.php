@extends('layouts.withoutNav')
@section('title', 'Security Settings - HustleBTC | Account Security & 2FA')
@section('content')
<div class="modern-user-container">
  <!-- Account Header -->
  <div class="modern-profile-header">
    <div class="profile-left">
      <img src="https://hustlebtc.com/img/key.png" alt="" class="avatar-img" />
      <div class="profile-info">
        <h1 class="modern-username">{{ $user->name ?? 'Your Account' }}</h1>
        <div class="profile-badges">
          @if($user && $user->hasVerifiedEmail())
            <span class="badge verified">✓ Verified</span>
          @endif
          <span class="badge vip">⭐ Active</span>
        </div>
      </div>
    </div>
    <div class="profile-actions">
      <div style="display: flex; gap: 12px; margin-bottom: 12px">
        <a href="{{ route('home') }}" class="modern-btn primary">
          <span>🏠</span>
          Back to Casino
        </a>
        <a href="{{ route('logout') }}" class="modern-btn secondary"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span>🚪</span>
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
      <div class="joined-date">Joined: {{ $joined_date ?? '' }}</div>
    </div>
  </div>
  <!-- Navigation Tabs -->
  <div class="account-nav-tabs">
    <a href="{{ route('account') }}" class="nav-tab">
      <span class="nav-tab-text">Overview</span>
    </a>
    <a href="{{ route('investment') }}" class="nav-tab">
      <span class="nav-tab-text">Investment</span>
    </a>
    <a href="{{ route('faucet') }}" class="nav-tab">
      <span class="nav-tab-text">Faucet</span>
    </a>
    <a href="{{ route('transfer') }}" class="nav-tab">
      <span class="nav-tab-text">Transfer</span>
    </a>
    <a href="{{ route('security') }}" class="nav-tab active">
      <span class="nav-tab-text">Security</span>
    </a>
  </div>
  <!-- Security Dashboard -->
  <div class="security-dashboard">
    <!-- Two Column Layout: Change Password & 2FA -->
    <div class="security-two-column">
      <!-- Left Column: Change Password -->
      <div class="security-section">
        <h2 class="section-title">Change Password</h2>
        <div class="info-alert">
          <span class="alert-icon">🔒</span>
          <div class="alert-text">
            <strong>Security Tip:</strong> Use a strong password with at
            least 8 characters, including uppercase, lowercase, numbers, and
            special characters.
          </div>
        </div>
        <form class="security-form" action="/reset-password" method="post">
          @csrf
          <!-- Security fields -->
          <input style="display: none" type="text" name="fakeusernameremembered" />
          <input style="display: none" type="password" name="fakepasswordremembered" />
          <div class="form-group">
            <label for="old_password" class="form-label">
              <span>🔐</span>
              Current Password
            </label>
            <input type="password" id="old_password" name="old_password" placeholder="Enter your current password" class="form-input" autocomplete="off" required />
          </div>
          <div class="form-group">
            <label for="password" class="form-label">
              <span>🔑</span>
              New Password
            </label>
            <input type="password" id="password" name="password" placeholder="Enter your new password" class="form-input" pattern=".{7,50}" autocomplete="off" required />
            <div class="form-hint">Minimum 7 characters required</div>
          </div>
          <div class="form-group">
            <label for="confirmation" class="form-label">
              <span>✅</span>
              Confirm New Password
            </label>
            <input type="password" id="confirmation" name="confirmation" placeholder="Confirm your new password" class="form-input" pattern=".{7,50}" autocomplete="off" required />
          </div>
          <!-- 2FA Field (if enabled) -->
          <div class="form-group">
            <label for="otp" class="form-label">
              <span>📱</span>
              2FA Code (if enabled)
            </label>
            <input type="text" id="otp" name="otp" placeholder="Enter 6-digit 2FA code" class="form-input" pattern="[0-9]{6}" maxlength="6" autocomplete="off" />
            <div class="form-hint">Only required if you have 2FA enabled</div>
          </div>
          <button type="submit" class="submit-btn">
            <span>🔄</span>
            Change Password
          </button>
        </form>
      </div>
      <!-- Right Column: Two-Factor Authentication -->
      <div class="security-section">
        <h2 class="section-title">Two-Factor Authentication</h2>
        <!-- If 2FA is enabled (replace with server-side logic) -->
        <div style="display: none" id="disable-2fa-section">
          <div class="warning-alert">
            <span class="alert-icon">⚠️</span>
            <div class="alert-text">
              <strong>2FA Enabled:</strong> Your account is protected with
              two-factor authentication. To disable it, enter your current
              2FA code below.
            </div>
          </div>
          <form class="security-form" action="/disable-2fa" method="post">
            @csrf
            <div class="form-group">
              <label for="disable-otp" class="form-label">
                <span>📱</span>
                Two-Factor Authentication Code
              </label>
              <input type="text" id="disable-otp" name="otp" placeholder="Enter 6-digit 2FA code" class="form-input" pattern="[0-9]{6}" maxlength="6" autocomplete="off" required />
              <div class="form-hint">Enter the code from your authenticator app</div>
            </div>
            <button type="submit" class="submit-btn danger">
              <span>🚫</span>
              Disable 2FA
            </button>
          </form>
        </div>
        <!-- If 2FA is not enabled (default view) -->
        <div id="enable-2fa-section">
          <div class="info-alert">
            <span class="alert-icon">🛡️</span>
            <div class="alert-text">
              <strong>Enhance Security:</strong> Enable two-factor
              authentication to add an extra layer of security to your
              account.
            </div>
          </div>
          <!-- QR Code and Setup -->
          <div class="qr-container">
            <h3 style="color: #000; margin-bottom: 16px">Scan QR Code</h3>
            <div style="width: 180px; height: 180px; background: #f0f0f0; margin: 0 auto; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
              <span style="color: #666">QR Code Placeholder</span>
            </div>
            <div class="secret-code">
              <strong>Manual Entry Key:</strong><br />
              ABCD EFGH IJKL MNOP QRST UVWX YZ12 3456
            </div>
          </div>
          <form class="security-form" action="/enable-2fa" method="post">
            @csrf
            <input type="hidden" name="mfa_potential_secret" value="ABCDEFGHIJKLMNOPQRSTUVWXYZ123456" />
            <input type="hidden" name="sig" value="signature_placeholder" />
            <div class="form-group">
              <label for="enable-otp" class="form-label">
                <span>📱</span>
                Verification Code
              </label>
              <input type="text" id="enable-otp" name="otp" placeholder="Enter 6-digit code from your app" class="form-input" pattern="[0-9]{6}" maxlength="6" autocomplete="off" required />
              <div class="form-hint">Enter the 6-digit code from your authenticator app to confirm setup</div>
            </div>
            <button type="submit" class="submit-btn">
              <span>🔐</span>
              Enable 2FA
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- Security Tips Section (Full Width) -->
    <div class="security-section">
      <h2 class="section-title">Security Best Practices</h2>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        <div style="background: rgba(0, 0, 0, 0.2); border-radius: 12px; padding: 20px; border: 1px solid rgba(255, 255, 255, 0.1);">
          <h4 style="color: #00ffcc; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
            <span>🔒</span>
            Strong Passwords
          </h4>
          <p style="color: rgba(255, 255, 255, 0.8); font-size: 14px; line-height: 1.5; margin: 0;">
            Use unique passwords with a mix of uppercase, lowercase,
            numbers, and symbols. Never reuse passwords across multiple
            sites.
          </p>
        </div>
        <div style="background: rgba(0, 0, 0, 0.2); border-radius: 12px; padding: 20px; border: 1px solid rgba(255, 255, 255, 0.1);">
          <h4 style="color: #00ffcc; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
            <span>📱</span>
            Two-Factor Auth
          </h4>
          <p style="color: rgba(255, 255, 255, 0.8); font-size: 14px; line-height: 1.5; margin: 0;">
            Enable 2FA using apps like Google Authenticator or Authy for an
            additional security layer on your account.
          </p>
        </div>
        <div style="background: rgba(0, 0, 0, 0.2); border-radius: 12px; padding: 20px; border: 1px solid rgba(255, 255, 255, 0.1);">
          <h4 style="color: #00ffcc; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
            <span>🌐</span>
            Secure Browsing
          </h4>
          <p style="color: rgba(255, 255, 255, 0.8); font-size: 14px; line-height: 1.5; margin: 0;">
            Always access HustleBTC through the official website. Be wary of
            phishing attempts and suspicious links.
          </p>
        </div>
        <div style="background: rgba(0, 0, 0, 0.2); border-radius: 12px; padding: 20px; border: 1px solid rgba(255, 255, 255, 0.1);">
          <h4 style="color: #00ffcc; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
            <span>🔄</span>
            Regular Updates
          </h4>
          <p style="color: rgba(255, 255, 255, 0.8); font-size: 14px; line-height: 1.5; margin: 0;">
            Regularly update your password and review your account activity.
            Report any suspicious activity immediately.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#top" class="back-to-top" aria-label="Back to top">↑</a>
@endsection
