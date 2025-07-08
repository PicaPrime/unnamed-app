@extends('layouts.withoutNav')
@section('title', 'Bitcoin Faucet - HustleBTC | Free Bitcoin Rewards & Referrals')
@section('content')
<div class="modern-user-container">
  <!-- Account Header -->
  <div class="modern-profile-header">
    <div class="profile-left">
      <div class="modern-avatar">
        <span style="font-size: 2rem; color: #000">₿</span>
      </div>
      <div class="profile-info">
        <h1 class="modern-username">{{ Auth::user()->name ?? 'Your Account' }}</h1>
        <div class="profile-badges">
          <span class="badge verified">✓ Verified</span>
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
      <div class="joined-date">Joined: {{ "date" }}</div>
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
    <a href="{{ route('faucet') }}" class="nav-tab active">
      <span class="nav-tab-text">Faucet</span>
    </a>
    <a href="{{ route('transfer') }}" class="nav-tab">
      <span class="nav-tab-text">Transfer</span>
    </a>
    <a href="{{ route('security') }}" class="nav-tab">
      <span class="nav-tab-text">Security</span>
    </a>
  </div>
  <!-- Faucet Dashboard -->
  <div class="faucet-dashboard">
    <!-- Info Alert -->
    <div class="info-alert">
      <span class="alert-icon">ℹ️</span>
      <div class="alert-text">
        <strong>Congratulations!</strong> You've earned
        <strong>0.00012345 ₿</strong>
        since registering with us. Increase your profits by upgrading your
        account or inviting friends to join the platform.
      </div>
    </div>
    <!-- Main Content Grid - Faucet Left, Referral Right -->
    <div class="main-content-grid">
      <!-- Left Column - Faucet Section -->
      <div class="stats-section">
        <h3 class="section-title">Bitcoin Faucet - Claim Your Reward</h3>
        <div class="faucet-claim-section">
          <!-- Available Claim -->
          <div class="claim-card primary">
            <!-- Faucet Image with Floating Effects -->
            <div class="faucet-image-container">
              <!-- Floating Bitcoin Symbols -->
              <div class="floating-bitcoin">₿</div>
              <div class="floating-bitcoin">₿</div>
              <div class="floating-bitcoin">₿</div>
              <div class="floating-bitcoin">₿</div>
              <!-- Floating Dots -->
              <div class="floating-dot"></div>
              <div class="floating-dot"></div>
              <div class="floating-dot"></div>
              <div class="floating-dot"></div>
              <div class="floating-dot"></div>
              <div class="floating-dot"></div>
              <!-- Main Faucet Image -->
              <img src="https://hustlebtc.com/img/hustle37.png" alt="Bitcoin Faucet" class="faucet-image" />
            </div>
            <div class="claim-header">
              <h3 class="claim-title">
                <span class="claim-icon">💰</span>
                Available Reward
              </h3>
              <div class="claim-amount">0.00001000 ₿</div>
              <p class="claim-description">
                Claim your hourly Bitcoin reward. Complete the verification
                below to receive your free Bitcoin instantly.
              </p>
            </div>
            <form action="/faucet-claim" method="post">
              @csrf
              <div style="margin-bottom: 16px">
                <!-- reCAPTCHA would go here in production -->
                <div
                  style="
                    background: rgba(0, 0, 0, 0.2);
                    padding: 20px;
                    border-radius: 8px;
                    text-align: center;
                    border: 1px solid rgba(255, 255, 255, 0.1);
                  "
                >
                  <span style="color: rgba(255, 255, 255, 0.6)">
                    reCAPTCHA Verification
                  </span>
                </div>
              </div>
              <button type="submit" class="claim-btn primary">
                <span>🎁</span>
                Claim Reward
              </button>
            </form>
          </div>
          <!-- Next Claim Info -->
          <div class="next-claim-info">
            <strong>⏳ Next Claim:</strong> You can claim your next Bitcoin
            reward in <strong>42 minutes</strong>. Set a reminder and come
            back to continue earning free Bitcoin.
          </div>
        </div>
      </div>
      <!-- Right Column - Referral Section -->
      <div class="referral-section">
        <div class="referral-header">
          <div class="referral-icon">🤝</div>
          <h2 class="referral-title">Referral Program</h2>
        </div>
        <div class="referral-description">
          <strong>Turn your network into Bitcoin!</strong> Share HustleBTC
          with friends and earn 25% commission from every bet they make. The
          more active your referrals, the more you earn - it's passive
          income that grows while you sleep!
        </div>
        <div class="referral-link-container">
          <input type="text" value="https://hustlebtc.com/r/{{ "username" }}" readonly class="referral-input" id="referralLink" />
          <button class="copy-btn" onclick="copyReferralLink()">
            <span>📋</span>
            Copy Link
          </button>
        </div>
        <div class="referral-stats">
          <div class="referral-stat">
            <div class="referral-stat-value">12</div>
            <div class="referral-stat-label">Total Referrals</div>
          </div>
          <div class="referral-stat">
            <div class="referral-stat-value">0.00456789 ₿</div>
            <div class="referral-stat-label">Total Earned</div>
          </div>
          <div class="referral-stat">
            <div class="referral-stat-value">25%</div>
            <div class="referral-stat-label">Commission Rate</div>
          </div>
        </div>
        <!-- Social Share Buttons -->
        <div class="social-share">
          <button class="social-btn twitter" onclick="shareOnTwitter()" type="button">
            <span>🐦</span>
            Twitter
          </button>
          <button class="social-btn telegram" onclick="shareOnTelegram()" type="button">
            <span>✈️</span>
            Telegram
          </button>
          <button class="social-btn whatsapp" onclick="shareOnWhatsApp()" type="button">
            <span>💬</span>
            WhatsApp
          </button>
          <button class="social-btn facebook" onclick="shareOnFacebook()" type="button">
            <span>📘</span>
            Facebook
          </button>
        </div>
      </div>
    </div>
    <!-- Faucet Rules Section -->
    <div class="stats-section">
      <h3 class="section-title">Faucet Rules & Guidelines</h3>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        <div style="background: rgba(0, 0, 0, 0.2); border-radius: 12px; padding: 20px; border: 1px solid rgba(255, 255, 255, 0.1);">
          <h4 style="color: #00ffcc; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
            <span>⏰</span>
            Claim Frequency
          </h4>
          <p style="color: rgba(255, 255, 255, 0.8); font-size: 14px; line-height: 1.5; margin: 0;">
            You can claim from the faucet once every hour. Attempting to
            claim more frequently will result in a cooldown period.
          </p>
        </div>
        <div style="background: rgba(0, 0, 0, 0.2); border-radius: 12px; padding: 20px; border: 1px solid rgba(255, 255, 255, 0.1);">
          <h4 style="color: #00ffcc; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
            <span>🚫</span>
            Account Limits
          </h4>
          <p style="color: rgba(255, 255, 255, 0.8); font-size: 14px; line-height: 1.5; margin: 0;">
            Only one account per person is allowed. Multiple accounts will
            result in permanent ban from the faucet system.
          </p>
        </div>
        <div style="background: rgba(0, 0, 0, 0.2); border-radius: 12px; padding: 20px; border: 1px solid rgba(255, 255, 255, 0.1);">
          <h4 style="color: #00ffcc; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
            <span>🤖</span>
            No Automation
          </h4>
          <p style="color: rgba(255, 255, 255, 0.8); font-size: 14px; line-height: 1.5; margin: 0;">
            Using bots, scripts, or automated tools to claim from the faucet
            is strictly prohibited and will result in account termination.
          </p>
        </div>
        <div style="background: rgba(0, 0, 0, 0.2); border-radius: 12px; padding: 20px; border: 1px solid rgba(255, 255, 255, 0.1);">
          <h4 style="color: #00ffcc; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
            <span>🔒</span>
            Fair Usage
          </h4>
          <p style="color: rgba(255, 255, 255, 0.8); font-size: 14px; line-height: 1.5; margin: 0;">
            The faucet is designed for fair distribution. Abuse of the
            system may result in reduced rewards or account restrictions.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#top" class="back-to-top" aria-label="Back to top">↑</a>
@push('scripts')
<script>
  function copyReferralLink() {
    const referralInput = document.getElementById('referralLink');
    if (!referralInput || !referralInput.value) {
      console.error('Referral link not found');
      return;
    }
    referralInput.select();
    referralInput.setSelectionRange(0, 99999);
    try {
      document.execCommand('copy');
      const copyBtn = event.target.closest('.copy-btn');
      if (copyBtn) {
        const originalText = copyBtn.innerHTML;
        copyBtn.innerHTML = '<span>✅</span>Copied!';
        copyBtn.style.background = 'linear-gradient(145deg, #2ecc71, #27ae60)';
        setTimeout(() => {
          copyBtn.innerHTML = originalText;
          copyBtn.style.background = '';
        }, 2000);
      }
    } catch (err) {
      console.error('Failed to copy: ', err);
    }
  }
  function shareOnTwitter() {
    const referralInput = document.getElementById('referralLink');
    if (!referralInput || !referralInput.value) {
      console.error('Referral link not found');
      return;
    }
    const shareText =
      'Join me on HustleBTC and start earning Bitcoin! Free faucet + 25% referral commission.';
    const url = referralInput.value;
    if (!url.startsWith('https://hustlebtc.com/')) {
      console.error('Invalid referral URL');
      return;
    }
    const twitterUrl =
      'https://twitter.com/intent/tweet?text=' +
      encodeURIComponent(shareText) +
      '&url=' +
      encodeURIComponent(url);
    window.open(twitterUrl, '_blank', 'noopener,noreferrer');
  }
  function shareOnTelegram() {
    const referralInput = document.getElementById('referralLink');
    if (!referralInput || !referralInput.value) {
      console.error('Referral link not found');
      return;
    }
    const shareText =
      'Join me on HustleBTC and start earning Bitcoin! Free faucet + 25% referral commission.';
    const url = referralInput.value;
    if (!url.startsWith('https://hustlebtc.com/')) {
      console.error('Invalid referral URL');
      return;
    }
    const telegramUrl =
      'https://t.me/share/url?url=' +
      encodeURIComponent(url) +
      '&text=' +
      encodeURIComponent(shareText);
    window.open(telegramUrl, '_blank', 'noopener,noreferrer');
  }
  function shareOnWhatsApp() {
    const referralInput = document.getElementById('referralLink');
    if (!referralInput || !referralInput.value) {
      console.error('Referral link not found');
      return;
    }
    const shareText =
      'Join me on HustleBTC and start earning Bitcoin! Free faucet + 25% referral commission.';
    const url = referralInput.value;
    if (!url.startsWith('https://hustlebtc.com/')) {
      console.error('Invalid referral URL');
      return;
    }
    const whatsappUrl =
      'https://wa.me/?text=' + encodeURIComponent(shareText + ' ' + url);
    window.open(whatsappUrl, '_blank', 'noopener,noreferrer');
  }
  function shareOnFacebook() {
    const referralInput = document.getElementById('referralLink');
    if (!referralInput || !referralInput.value) {
      console.error('Referral link not found');
      return;
    }
    const url = referralInput.value;
    if (!url.startsWith('https://hustlebtc.com/')) {
      console.error('Invalid referral URL');
      return;
    }
    const facebookUrl =
      'https://www.facebook.com/sharer/sharer.php?u=' +
      encodeURIComponent(url);
    window.open(facebookUrl, '_blank', 'noopener,noreferrer');
  }
</script>
@endpush
@endsection
