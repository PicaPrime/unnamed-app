@extends('layouts.withoutNav')
@section('title', 'Transfer Bitcoin - HustleBTC | Send Bitcoin to Other Players')
@section('content')
<div class="modern-user-container">
  <!-- Account Header -->
  <div class="modern-profile-header">
    <div class="profile-left">
      <img src="https://hustlebtc.com/img/hustle75.png" alt="" class="avatar-img" />
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
      <div class="joined-date">Joined: {{ $joined_date }} [{{ $joined_ago }}]</div>
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
    <a href="{{ route('transfer') }}" class="nav-tab active">
      <span class="nav-tab-text">Transfer</span>
    </a>
    <a href="{{ route('security') }}" class="nav-tab">
      <span class="nav-tab-text">Security</span>
    </a>
  </div>
  <!-- Transfer Dashboard -->
  <div class="transfer-dashboard">
    <!-- Transfer Form Section -->
    <div class="transfer-form-section">
      <h2 class="section-title">Send Bitcoin to Player</h2>
      <!-- Warning Alert -->
      <div class="warning-alert">
        <span class="warning-icon">⚠️</span>
        <div class="warning-text">
          <strong>Important:</strong> Check the username carefully before completing the transfer. We cannot reverse any incorrect transfers.
        </div>
      </div>
      <!-- Transfer Form -->
      <form class="transfer-form" action="/transfer-request" method="post">
        @csrf
        <!-- Hidden fields for security -->
        <input style="display: none" type="text" name="fakeusernameremembered" />
        <input style="display: none" type="password" name="fakepasswordremembered" />
        <div class="form-group">
          <label for="amount" class="form-label">
            <span>💰</span>
            Amount (Satoshis)
          </label>
          <input type="number" id="amount" name="amount" placeholder="Enter amount in satoshis" min="100" step="1" class="form-input" required />
          <div class="form-hint">Minimum transfer: 100 satoshis</div>
        </div>
        <div class="form-group">
          <label for="to-user" class="form-label">
            <span>👤</span>
            Recipient Username
          </label>
          <input type="text" id="to-user" name="to-user" placeholder="Enter recipient's username" class="form-input" required />
          <div class="form-hint">Double-check the username before sending</div>
        </div>
        <div class="form-group">
          <label for="password" class="form-label">
            <span>🔒</span>
            Your Password
          </label>
          <input type="password" id="password" name="password" placeholder="Enter your account password" class="form-input" autocomplete="off" required />
        </div>
        <!-- 2FA Field (if enabled) -->
        <div class="form-group" id="mfa-group" style="display: none">
          <label for="otp" class="form-label">
            <span>🔐</span>
            2FA Code
          </label>
          <input type="text" id="otp" name="otp" placeholder="Enter 6-digit 2FA code" class="form-input" autocomplete="off" pattern="[0-9]{6}" maxlength="6" />
          <div class="form-hint">Enter the 6-digit code from your authenticator app</div>
        </div>
        <!-- Transfer Preview -->
        <div class="transfer-preview">
          <div class="preview-item">
            <span class="preview-label">Transfer Amount:</span>
            <span class="preview-value" id="preview-amount">0 sats</span>
          </div>
          <div class="preview-item">
            <span class="preview-label">Recipient:</span>
            <span class="preview-value" id="preview-recipient">-</span>
          </div>
          <div class="preview-item">
            <span class="preview-label">Transfer Fee:</span>
            <span class="preview-value">0 sats (Free)</span>
          </div>
        </div>
        <button type="submit" class="submit-btn">
          <span>💸</span>
          Send Transfer
        </button>
      </form>
    </div>
    <!-- Transfer History Section -->
    <div class="transfer-history-section">
      <h3 class="section-title">Transfer History</h3>
      <div class="transfer-history-table">
        <div class="table-header">
          <div>From</div>
          <div>Amount</div>
          <div>To</div>
          <div class="hide-mobile">Date</div>
        </div>
        @forelse($transfer_history as $transfer)
          <div class="table-row">
            <div class="table-cell">{{ $transfer['from'] }}</div>
            <div class="table-cell amount-cell {{ $transfer['amount'] < 0 ? 'amount-negative' : 'amount-positive' }}">
              {{ $transfer['amount'] < 0 ? '' : '+' }}{{ number_format($transfer['amount']) }} sats
            </div>
            <div class="table-cell">{{ $transfer['to'] }}</div>
            <div class="table-cell date-cell hide-mobile">{{ $transfer['date'] }}</div>
          </div>
        @empty
          <div class="empty-state">
            <div class="empty-icon">📤</div>
            <div class="empty-text">No transfers yet</div>
            <div class="empty-subtext">Your transfer history will appear here</div>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</div>
<!-- Back to Top Button -->
<a href="#top" class="back-to-top" aria-label="Back to top">↑</a>
@push('scripts')
<script>
// Update preview when form values change
  document.addEventListener('DOMContentLoaded', function () {
    const amountInput = document.getElementById('amount');
    const recipientInput = document.getElementById('to-user');
    const previewAmount = document.getElementById('preview-amount');
    const previewRecipient = document.getElementById('preview-recipient');
    function updatePreview() {
      const amount = amountInput.value || '0';
      const recipient = recipientInput.value || '-';
      previewAmount.textContent = `${amount} sats`;
      previewRecipient.textContent = recipient;
    }
    amountInput.addEventListener('input', updatePreview);
    recipientInput.addEventListener('input', updatePreview);
    // Show/hide 2FA field based on user settings
    // This would be determined by server-side data
    // For demo purposes, uncomment the line below to show 2FA field
    // document.getElementById('mfa-group').style.display = 'flex';
  });
</script>
@endpush
@endsection
