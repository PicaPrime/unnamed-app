@extends('layouts.withoutNav')
@section('title', 'Investment Dashboard - HustleBTC | Manage Your Bitcoin Casino Account')
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
      <div class="joined-date">Joined: {{ "date"}}</div>
    </div>
  </div>
  <!-- Navigation Tabs -->
  <div class="account-nav-tabs">
    <a href="{{ route('account') }}" class="nav-tab">
      <span class="nav-tab-text">Overview</span>
    </a>
    <a href="{{ route('investment') }}" class="nav-tab active">
      <span class="nav-tab-text">Investment</span>
    </a>
    <a href="{{ route('faucet') }}" class="nav-tab">
      <span class="nav-tab-text">Faucet</span>
    </a>
    <a href="{{ route('transfer') }}" class="nav-tab">
      <span class="nav-tab-text">Transfer</span>
    </a>
    <a href="{{ route('security') }}" class="nav-tab">
      <span class="nav-tab-text">Security</span>
    </a>
  </div>
  <!-- Investment Dashboard -->
  <div class="investment-dashboard">
    <!-- Investment Hero Section -->
    <div class="investment-hero">
      <div class="hero-content">
        <div class="hero-text">
          <h2 class="hero-title">
            <span class="hero-icon">📈</span>
            Bankroll Investment
          </h2>
          <p class="hero-description">
            Become part of the house and earn passive Bitcoin income by
            investing in HustleBTC's bankroll. Your investment helps fund
            player winnings while you earn a share of the house edge
            profits.
          </p>
          <div class="hero-benefits">
            <div class="benefit-item">
              <span class="benefit-icon">💰</span>
              <span>Daily Profit Distribution</span>
            </div>
            <div class="benefit-item">
              <span class="benefit-icon">🔒</span>
              <span>Secure & Transparent</span>
            </div>
            <div class="benefit-item">
              <span class="benefit-icon">📊</span>
              <span>Real-time Performance</span>
            </div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="investment-icon">
            <img src="https://hustlebtc.com/img/hustle22.png" alt="Investment" />
          </div>
        </div>
      </div>
    </div>
    <!-- Investment Stats Overview -->
    <div class="investment-stats-section">
      <h3 class="section-title">Investment Overview</h3>
      <div class="investment-stats-grid">
        <div class="investment-stat-card primary">
          <div class="stat-header">
            <span class="stat-icon">🏦</span>
            <span class="stat-name">Total Bankroll</span>
          </div>
          <div class="stat-value">38.5672 ₿</div>
          <div class="stat-description">Available for investments</div>
        </div>
        <div class="investment-stat-card success">
          <div class="stat-header">
            <span class="stat-icon">💎</span>
            <span class="stat-name">Your Investment</span>
          </div>
          <div class="stat-value">1.2345 ₿</div>
          <div class="stat-description">3.2% of total bankroll</div>
        </div>
        <div class="investment-stat-card profit">
          <div class="stat-header">
            <span class="stat-icon">📈</span>
            <span class="stat-name">Total Profit</span>
          </div>
          <div class="stat-value">+0.1234 ₿</div>
          <div class="stat-description">+10.0% return (30 days)</div>
        </div>
        <div class="investment-stat-card highlight">
          <div class="stat-header">
            <span class="stat-icon">⚡</span>
            <span class="stat-name">Daily Yield</span>
          </div>
          <div class="stat-value">0.33%</div>
          <div class="stat-description">Average daily return</div>
        </div>
      </div>
    </div>
    <!-- Investment Actions -->
    <div class="investment-actions-section">
      <h3 class="section-title">Make Investment</h3>
      <div class="actions-grid">
        <!-- Invest Form -->
        <div class="action-card invest-card">
          <div class="action-header">
            <h3 class="action-title">
              <span class="action-icon">💰</span>
              Invest in Bankroll
            </h3>
            <p class="action-description">
              Invest Bitcoin into the bankroll and start earning daily
              profits from house edge
            </p>
          </div>
          <form class="investment-form" action="/investment" method="POST">
            @csrf
            <div class="form-group">
              <label for="invest-amount" class="form-label">Investment Amount</label>
              <div class="input-wrapper">
                <input type="number" id="invest-amount" name="amount" placeholder="0.001" min="0.001" step="0.001" class="form-input" required />
                <span class="input-suffix">₿</span>
              </div>
              <div class="form-hint">Minimum investment: 0.001 ₿</div>
            </div>
            <div class="investment-preview">
              <div class="preview-item">
                <span class="preview-label">Expected Daily Return:</span>
                <span class="preview-value">~0.33%</span>
              </div>
              <div class="preview-item">
                <span class="preview-label">Monthly Projection:</span>
                <span class="preview-value">~10%</span>
              </div>
            </div>
            <button type="submit" class="action-btn primary">
              <span class="btn-icon">💎</span>
              Invest Now
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- How It Works Section -->
    <div class="how-it-works-section">
      <h3 class="section-title">How Bankroll Investment Works</h3>
      <div class="how-it-works-grid">
        <div class="how-step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h4 class="step-title">Invest Bitcoin</h4>
            <p class="step-description">Transfer Bitcoin from your balance to the bankroll investment pool</p>
          </div>
        </div>
        <div class="how-step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h4 class="step-title">Fund Player Winnings</h4>
            <p class="step-description">Your investment helps pay out winning players across all games</p>
          </div>
        </div>
        <div class="how-step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h4 class="step-title">Earn House Edge</h4>
            <p class="step-description">Receive your proportional share of profits from the house edge</p>
          </div>
        </div>
        <div class="how-step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h4 class="step-title">Daily Distributions</h4>
            <p class="step-description">Profits are automatically distributed to investors daily</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Investment Benefits -->
    <div class="benefits-section">
      <h3 class="section-title">Why Invest in HustleBTC Bankroll?</h3>
      <div class="benefits-grid">
        <div class="benefit-card">
          <div class="benefit-icon-large">💰</div>
          <h4 class="benefit-title">Passive Income</h4>
          <p class="benefit-description">Earn Bitcoin while you sleep. Your investment works 24/7 generating returns from every game played.</p>
        </div>
        <div class="benefit-card">
          <div class="benefit-icon-large">📊</div>
          <h4 class="benefit-title">Transparent Returns</h4>
          <p class="benefit-description">All profits and losses are transparent. Track your investment performance in real-time.</p>
        </div>
        <div class="benefit-card">
          <div class="benefit-icon-large">🔒</div>
          <h4 class="benefit-title">Secure Investment</h4>
          <p class="benefit-description">Your investment is secured by the same systems that protect player funds and casino operations.</p>
        </div>
        <div class="benefit-card">
          <div class="benefit-icon-large">⚡</div>
          <h4 class="benefit-title">Instant Liquidity</h4>
          <p class="benefit-description">Withdraw your investment anytime. No lock-up periods or withdrawal restrictions.</p>
        </div>
      </div>
    </div>
    <!-- Risk Disclaimer -->
    <div class="disclaimer-section">
      <div class="disclaimer-card">
        <div class="disclaimer-header">
          <span class="disclaimer-icon">⚠️</span>
          <h4 class="disclaimer-title">Investment Risk Disclaimer</h4>
        </div>
        <div class="disclaimer-content">
          <p>
            <strong>Important:</strong> Bankroll investments carry risk.
            While historically profitable, there's no guarantee of returns.
            Large player wins can result in temporary losses. Only invest
            what you can afford to lose.
          </p>
          <ul class="disclaimer-list">
            <li>Past performance does not guarantee future results</li>
            <li>Investment value can go up or down based on casino performance</li>
            <li>Large jackpots or winning streaks can impact short-term returns</li>
            <li>Long-term profitability depends on house edge and player volume</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#top" class="back-to-top" aria-label="Back to top">↑</a>
@endsection
