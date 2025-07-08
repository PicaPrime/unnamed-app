@extends('layouts.withoutNav')
@section('title', 'Account Dashboard - HustleBTC | Manage Your Bitcoin Casino Account')
@section('content')
<div class="modern-user-container">
  <!-- Account Header -->
  <div class="modern-profile-header">
    <div class="profile-left">
      <div class="modern-avatar">
        <span style="font-size: 2rem; color: #000">₿</span>
      </div>
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
        <a href="/" class="modern-btn primary">
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
      <div class="joined-date">Joined: {{ $joinedDate ?? 'N/A' }}</div>
    </div>
  </div>
  <!-- Navigation Tabs -->
  <div class="account-nav-tabs">
    <a href="#" class="nav-tab active">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Overview</span>
    </a>
    <a href="/investment" class="nav-tab">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Investment</span>
    </a>
    <a href="/faucet" class="nav-tab">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Faucet</span>
    </a>
    <a href="/transfer" class="nav-tab">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Transfer</span>
    </a>
    <a href="/security" class="nav-tab">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Security</span>
    </a>
  </div>
  <!-- Main Dashboard Grid -->
  <div class="dashboard-grid">
    <!-- Left Column - Balance & Deposit -->
    <div class="stats-column">
      <!-- Balance Overview -->
      <div class="stats-section">
        <h2 class="section-title">Account Balance</h2>
        <div class="balance-card">
          <div class="balance-main">
            <div class="balance-crypto">
              <span class="balance-amount">{{ number_format($balance['btc'], 8) }}</span>
              <span class="balance-currency">₿</span>
            </div>
            <div class="balance-fiat">≈ ${{ number_format($balance['fiat'], 2) }} USD</div>
          </div>
          <div class="balance-actions">
            <a href="/deposit" class="balance-btn primary">
              <span><i class="fas fa-plus-circle"></i></span>
              Deposit
            </a>
            <a href="/withdraw" class="balance-btn secondary">
              <span><i class="fas fa-minus-circle"></i></span>
              Withdraw
            </a>
          </div>
        </div>
      </div>
      <!-- Deposit Address -->
      <div class="stats-section" style="padding-bottom:0px">
        <h2 class="section-title">Your Bitcoin Deposit Address</h2>
        <div class="deposit-card">
          <div class="qr-section">
            <div class="qr-code">
              <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $depositAddress }}&bgcolor=1a1a1a&color=00ffcc" alt="Bitcoin Deposit QR Code" class="qr-image" />
            </div>
          </div>
          <div class="address-section">
            <div class="address-label">Bitcoin Address (BTC Network)</div>
            <div class="address-container">
              <input type="text" value="{{ $depositAddress }}" readonly class="address-input" id="depositAddress" />
              <button class="copy-btn" onclick="copyAddress()">
                <span><i class="fas fa-copy"></i></span>
                Copy
              </button>
            </div>
            <div class="deposit-info">
              <div class="info-item">
                <span class="info-icon"><i class="fas fa-bolt"></i></span>
                <span class="info-text">Instant deposits after 1 confirmation</span>
              </div>
              <div class="info-item">
                <span class="info-icon"><i class="fas fa-lock"></i></span>
                <span class="info-text">Send only Bitcoin (BTC) to this address</span>
              </div>
              <div class="info-item">
                <span class="info-icon"><i class="fas fa-globe"></i></span>
                <span class="info-text">Use Bitcoin mainnet only</span>
              </div>
            </div>
          </div>
        </div>
        <div class="crypto-columns-grid">
          <div class="crypto-column-item">Bitcoin</div>
          <div class="crypto-column-item">Litecoin</div>
        </div>
      </div>
      <!-- Referral Section -->
      <div class="referral-section">
        <div class="referral-header">
          <div class="referral-icon"><i class="fas fa-handshake"></i></div>
          <h2 class="referral-title">Referral Program</h2>
        </div>
        <div class="referral-description">
          Invite friends to HustleBTC and earn 25% of the house edge from their bets! Share your unique referral link and start earning passive Bitcoin income from every game your referrals play.
        </div>
        <div class="referral-link-container">
          <input type="text" value="{{ $referral['link'] }}" readonly class="referral-input" id="referralLink" />
          <button class="copy-btn" onclick="copyReferralLink()">
            <span><i class="fas fa-copy"></i></span>
            Copy Link
          </button>
        </div>
        <div class="referral-stats">
          <div class="referral-stat">
          <div class="referral-stat-value">{{ $referral['total'] }}</div>
          <div class="referral-stat-label">Total Referrals</div>
          </div>
          <div class="referral-stat">
          <div class="referral-stat-value">{{ number_format($referral['earned'], 8) }} ₿</div>
          <div class="referral-stat-label">Total Earned</div>
          </div>
          <div class="referral-stat">
          <div class="referral-stat-value">{{ $referral['rate'] }}%</div>
          <div class="referral-stat-label">Commission Rate</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Right Column - Stats & Activity -->
    <div class="activity-column">
      <!-- Account Statistics -->
      <div class="stats-section">
        <h2 class="section-title">Account Statistics</h2>
        <div class="account-stats-grid">
          <div class="account-stat-item">
            <img src="https://hustlebtc.com/img/hustle13.png" alt="Deposits" style="width: 40px; height: 40px; object-fit: contain; border-radius: 10px;" />
            <div class="stat-content">
              <div class="stat-value">{{ number_format($stats['deposits'], 8) }} ₿</div>
              <div class="stat-label">Total Deposits</div>
            </div>
          </div>
          <div class="account-stat-item">
            <img src="https://hustlebtc.com/img/hustle14.png" alt="Withdrawals" style="width: 40px; height: 40px; object-fit: contain; border-radius: 10px;" />
            <div class="stat-content">
              <div class="stat-value">{{ number_format($stats['withdrawals'], 8) }} ₿</div>
              <div class="stat-label">Total Withdrawals</div>
            </div>
          </div>
          <div class="account-stat-item">
            <img src="https://hustlebtc.com/img/hustle36.png" alt="Free Bits" style="width: 40px; height: 40px; object-fit: contain; border-radius: 10px;" />
            <div class="stat-content">
              <div class="stat-value">{{ number_format($stats['faucet'], 8) }} ₿</div>
              <div class="stat-label">Free Bits Claimed</div>
            </div>
          </div>
          <div class="account-stat-item highlight">
            <img src="https://hustlebtc.com/img/hustle15.png" alt="Net Profit" style="width: 40px; height: 40px; object-fit: contain; border-radius: 10px;" />
            <div class="stat-content">
              <div class="stat-value">{{ $stats['net_profit'] >= 0 ? '+' : '' }}{{ number_format($stats['net_profit'], 8) }} ₿</div>
              <div class="stat-label">Net Profit</div>
            </div>
          </div>
        </div>
      </div>
      <!-- Quick Actions -->
      <div class="stats-section">
        <h2 class="section-title">Quick Actions</h2>
        <div class="quick-actions-grid">
          <a href="/user" class="quick-action-item">
            <img src="https://hustlebtc.com/img/hustle33.png" alt="View Stats" style="width: 36px; height: 36px; object-fit: contain; border-radius: 8px;" />
            <div class="action-content">
              <div class="action-title">View Stats</div>
              <div class="action-desc">Detailed gaming statistics</div>
            </div>
          </a>
          <a href="/investment" class="quick-action-item">
            <img src="https://hustlebtc.com/img/hustle21.png" alt="Upgrade Account" style="width: 36px; height: 36px; object-fit: contain; border-radius: 8px;" />
            <div class="action-content">
              <div class="action-title">Upgrade Account</div>
              <div class="action-desc">Unlock premium features</div>
            </div>
          </a>
          <a href="/faucet" class="quick-action-item">
            <img src="https://hustlebtc.com/img/hustle36.png" alt="Free Faucet" style="width: 36px; height: 36px; object-fit: contain; border-radius: 8px;" />
            <div class="action-content">
              <div class="action-title">Free Faucet</div>
              <div class="action-desc">Claim free Bitcoin</div>
            </div>
          </a>
          <a href="/support" class="quick-action-item">
            <img src="https://hustlebtc.com/img/hustle24.png" alt="Support" style="width: 36px; height: 36px; object-fit: contain; border-radius: 8px;" />
            <div class="action-content">
              <div class="action-title">Support</div>
              <div class="action-desc">Get help & assistance</div>
            </div>
          </a>
        </div>
      </div>
      <!-- Achievements Section -->
      <div class="stats-section">
        <h2 class="section-title">Achievements</h2>
        <div class="achievements-section">
          <div class="achievements-grid">
            @foreach($achievements as $ach)
              <div class="achievement-item {{ $ach['earned'] ? 'earned' : 'locked' }}">
                <div class="achievement-icon">{{ $ach['icon'] }}</div>
                <div class="achievement-content">
                  <div class="achievement-title">{{ $ach['title'] }}</div>
                  <div class="achievement-desc">{{ $ach['desc'] }}</div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Recent Transactions -->
  <div class="stats-section">
    <h2 class="section-title">Recent Transactions</h2>
    <div class="transactions-table">
      <div class="transaction-header">
        <div class="th-type">Type</div>
        <div class="th-amount">Amount</div>
        <div class="th-status">Status</div>
        <div class="th-date">Date</div>
      </div>
      @foreach($transactions as $tx)
        <div class="transaction-row">
          <div class="td-type">
            <div class="transaction-type {{ $tx['type'] }}">
              <span class="type-icon">
                @if($tx['type'] === 'deposit') 📥
                @elseif($tx['type'] === 'withdrawal') 📤
                @elseif($tx['type'] === 'faucet') 🚰
                @else ?
                @endif
              </span>
              <span class="type-text">{{ ucfirst($tx['type']) }}</span>
            </div>
          </div>
          <div class="td-amount">{{ $tx['amount'] > 0 ? '+' : '' }}{{ number_format($tx['amount'], 8) }} ₿</div>
          <div class="td-status">
            <span class="status-badge {{ $tx['status'] }}">{{ ucfirst($tx['status']) }}</span>
          </div>
          <div class="td-date">{{ $tx['date'] }}</div>
        </div>
      @endforeach
    </div>
    <div class="view-all-transactions">
      <a href="/transactions" class="view-all-btn">
        <span>📋</span>
        View All Transactions
      </a>
    </div>
  </div>
</div>
<a href="#top" class="back-to-top" aria-label="Back to top">↑</a>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" crossorigin="anonymous"></script>
<script>
  function copyAddress() {
    const addressInput = document.getElementById('depositAddress');
    addressInput.select();
    addressInput.setSelectionRange(0, 99999);
    try {
      document.execCommand('copy');
      const copyBtn = document.querySelector('.copy-btn');
      const originalText = copyBtn.innerHTML;
      copyBtn.innerHTML = '<span>✅</span>Copied!';
      copyBtn.style.background = 'linear-gradient(145deg, #2ecc71, #27ae60)';
      setTimeout(() => {
        copyBtn.innerHTML = originalText;
        copyBtn.style.background = '';
      }, 2000);
    } catch (err) {
      console.error('Failed to copy: ', err);
    }
  }
  function copyReferralLink() {
    const referralInput = document.getElementById('referralLink');
    referralInput.select();
    referralInput.setSelectionRange(0, 99999);
    try {
      document.execCommand('copy');
      const copyBtn = event.target.closest('.copy-btn');
      const originalText = copyBtn.innerHTML;
      copyBtn.innerHTML = '<span>✅</span>Copied!';
      copyBtn.style.background = 'linear-gradient(145deg, #2ecc71, #27ae60)';
      setTimeout(() => {
        copyBtn.innerHTML = originalText;
        copyBtn.style.background = '';
      }, 2000);
    } catch (err) {
      console.error('Failed to copy: ', err);
    }
  }
</script>
@endpush
@endsection
