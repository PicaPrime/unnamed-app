@extends('layouts.withoutNav')
@section('title', 'Withdraw Bitcoin - HustleBTC | Instant Bitcoin Withdrawals')
@section('meta')
    <meta name="title" content="Withdraw Bitcoin - HustleBTC | Instant Bitcoin Withdrawals" />
    <meta name="description" content="Withdraw your Bitcoin instantly from HustleBTC. Fast, secure withdrawals processed from our hot wallet with minimal fees." />
    <meta name="keywords" content="bitcoin withdrawal, crypto withdrawal, instant bitcoin, bitcoin casino withdrawal, fast bitcoin payout" />
    <meta name="author" content="HustleBTC" />
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://hustlebtc.com/withdraw" />
    <meta property="og:title" content="Withdraw Bitcoin - HustleBTC | Instant Bitcoin Withdrawals" />
    <meta property="og:description" content="Withdraw your Bitcoin winnings instantly from HustleBTC with secure, fast processing from our hot wallet." />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://hustlebtc.com/withdraw" />
    <meta property="twitter:title" content="Withdraw Bitcoin - HustleBTC | Instant Bitcoin Withdrawals" />
@endsection
@section('content')
<div class="modern-user-container">
  <div class="modern-profile-header">
    <div class="profile-left">
      <img src="https://hustlebtc.com/img/pot.png" alt="" class="avatar-img" />
      <div class="profile-info">
        <h1 class="modern-username">Your Account</h1>
        <div class="profile-badges">
          <span class="badge verified">✓ Verified</span>
          <span class="badge vip">⭐ Active</span>
        </div>
      </div>
    </div>
    <div class="profile-actions">
      <div style="display: flex; gap: 12px; margin-bottom: 12px">
        <a href="/" class="modern-btn primary"><span>🏠</span>Back to Casino</a>
        <a href="/logout" class="modern-btn secondary"><span>🚪</span>Logout</a>
      </div>
      <div class="joined-date">Joined: Sat Mar 29 2025 [3 months ago]</div>
    </div>
  </div>
  <div class="account-nav-tabs">
    <a href="/account" class="nav-tab"><span class="nav-tab-text">Overview</span></a>
    <a href="/investment" class="nav-tab"><span class="nav-tab-text">Investment</span></a>
    <a href="/withdraw" class="nav-tab active"><span class="nav-tab-text">Withdraw</span></a>
    <a href="/transfer" class="nav-tab"><span class="nav-tab-text">Transfer</span></a>
    <a href="/security" class="nav-tab"><span class="nav-tab-text">Security</span></a>
  </div>
  <div class="withdrawal-dashboard">
    <div class="withdrawal-form-section">
      <h2 class="section-title">Withdraw Bitcoin</h2>
      <div class="info-alert">
        <img src="https://hustlebtc.com/img/hustle36.png" alt="Info" class="info-icon" />
        <div class="info-text">
          Withdraw your Bitcoin instantly from our secure hot wallet. Fast processing with minimal fees - your funds are sent to the blockchain immediately upon confirmation.
        </div>
      </div>
      <form class="withdrawal-form" action="/withdraw-request" method="post">
        <input style="display: none" type="text" name="fakeusernameremembered" />
        <input style="display: none" type="password" name="fakepasswordremembered" />
        <div class="form-group">
          <label for="amount" class="form-label"><span>💰</span>Amount (Satoshis)</label>
          <input type="number" id="amount" name="amount" placeholder="Enter amount in satoshis (min: 200)" min="200" step="1" class="form-input" required />
          <div class="form-hint">Minimum withdrawal: 200 satoshis</div>
        </div>
        <div class="form-group">
          <label for="destination" class="form-label"><span>📍</span>Bitcoin Address</label>
          <input type="text" id="destination" name="destination" placeholder="Enter your Bitcoin address" class="form-input" required />
          <div class="form-hint">Double-check your Bitcoin address before submitting</div>
        </div>
        <div class="form-group">
          <label for="password" class="form-label"><span>🔒</span>Your Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your account password" class="form-input" autocomplete="off" required />
        </div>
        <div class="form-group" id="mfa-group" style="display: none">
          <label for="otp" class="form-label"><span>🔐</span>2FA Code</label>
          <input type="text" id="otp" name="otp" placeholder="Enter 6-digit 2FA code" class="form-input" autocomplete="off" pattern="[0-9]{6}" maxlength="6" />
          <div class="form-hint">Enter the 6-digit code from your authenticator app</div>
        </div>
        <div class="withdrawal-preview">
          <div class="preview-item"><span class="preview-label">Withdrawal Amount:</span><span class="preview-value" id="preview-amount">0 sats</span></div>
          <div class="preview-item"><span class="preview-label">Network Fee:</span><span class="preview-value">100 sats</span></div>
          <div class="preview-item"><span class="preview-label">You Will Receive:</span><span class="preview-value" id="preview-receive">0 sats</span></div>
        </div>
        <button type="submit" class="submit-btn"><span>💸</span>Process Withdrawal</button>
      </form>
    </div>
    <div class="withdrawal-history-section">
      <h3 class="section-title">Withdrawal History</h3>
      <div class="withdrawal-history-table">
        <div class="table-header">
          <div>Amount</div>
          <div>Status</div>
          <div class="hide-mobile">Address</div>
          <div class="hide-mobile">Date</div>
        </div>
        <div class="table-row">
          <div class="table-cell amount-cell">0.001 ₿</div>
          <div class="table-cell status-completed">✓ Completed</div>
          <div class="table-cell address-cell hide-mobile">bc1q...xyz123</div>
          <div class="table-cell date-cell hide-mobile">2 hours ago</div>
        </div>
        <div class="table-row">
          <div class="table-cell amount-cell">0.0005 ₿</div>
          <div class="table-cell status-completed">✓ Completed</div>
          <div class="table-cell address-cell hide-mobile">1A1z...abc789</div>
          <div class="table-cell date-cell hide-mobile">1 day ago</div>
        </div>
        <div class="table-row">
          <div class="table-cell amount-cell">0.002 ₿</div>
          <div class="table-cell status-pending">⏳ Processing</div>
          <div class="table-cell address-cell hide-mobile">3J98...def456</div>
          <div class="table-cell date-cell hide-mobile">3 days ago</div>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#top" class="back-to-top" aria-label="Back to top">↑</a>
@endsection
@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const amountInput = document.getElementById('amount');
    const addressInput = document.getElementById('destination');
    const previewAmount = document.getElementById('preview-amount');
    const previewReceive = document.getElementById('preview-receive');
    function updatePreview() {
      const amount = parseInt(amountInput.value) || 0;
      const fee = 100;
      const receive = Math.max(0, amount - fee);
      previewAmount.textContent = `${amount} sats`;
      previewReceive.textContent = `${receive} sats`;
    }
    amountInput.addEventListener('input', updatePreview);
    addressInput.addEventListener('input', updatePreview);
  });
</script>
@endsection
