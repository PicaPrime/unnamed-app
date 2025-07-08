@extends('layouts.app')
@section('title', 'HustleBTC - Premium Bitcoin Casino | Provably Fair Gaming')
@section('content')
<!-- Hero Section -->
<section id="home" class="hero">
  <div class="hero-background">
    <div class="floating-elements">
      <div class="floating-bitcoin">₿</div>
      <div class="floating-bitcoin">₿</div>
      <div class="floating-bitcoin">₿</div>
      <div class="floating-bitcoin">₿</div>
      <div class="floating-bitcoin">₿</div>
      <div class="floating-bitcoin">₿</div>
    </div>
    <div class="gradient-orbs">
      <div class="orb orb-1"></div>
      <div class="orb orb-2"></div>
      <div class="orb orb-3"></div>
    </div>
  </div>
  <div class="hero-container">
    <div class="hero-content">
      <div class="hero-badge">
        <span class="badge-icon"><i class="fas fa-trophy"></i></span>
        <span>Premium Bitcoin Casino</span>
      </div>
      <h1 class="hero-title">
        The Future of
        <span class="gradient-text">Crypto Gaming</span>
        is Here
      </h1>
      <p class="hero-description">
        Experience provably fair gaming with instant Bitcoin payouts. Join
        thousands of players winning big on the most trusted crypto casino
        platform.
      </p>
      <div class="hero-stats">
        <div class="stat-item">
          <div class="stat-value">50,000+</div>
          <div class="stat-label">Active Players</div>
        </div>
        <div class="stat-item">
          <div class="stat-value">₿2,847</div>
          <div class="stat-label">Total Winnings</div>
        </div>
        <div class="stat-item">
          <div class="stat-value">99.9%</div>
          <div class="stat-label">Uptime</div>
        </div>
      </div>
      <div class="hero-actions">
        <a href="/register" class="btn-hero-primary"> Start Playing Now </a>
        <a href="#games" class="btn-hero-secondary"> Explore Games </a>
      </div>
    </div>
    <div class="hero-visual">
      <div class="casino-card">
        <div class="card-glow"></div>
        <div class="card-content">
          <div class="card-header"></div>
          <div class="casino-card-image-container">
            <div class="casino-floating-bitcoin">₿</div>
            <div class="casino-floating-bitcoin">₿</div>
            <div class="casino-floating-bitcoin">₿</div>
            <div class="casino-floating-bitcoin">₿</div>
            <div class="casino-floating-dot"></div>
            <div class="casino-floating-dot"></div>
            <div class="casino-floating-dot"></div>
            <div class="casino-floating-dot"></div>
            <div class="casino-floating-dot"></div>
            <div class="casino-floating-dot"></div>
            <img src="https://hustlebtc.com/img/hustle8.png" alt="HustleBTC Casino" />
          </div>
          <div class="card-balance">
            <div class="balance-label">Your Balance</div>
            <div class="card-amount">0.12345678 ₿</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- How it Works Section -->
<section id="how-it-works" class="how-it-works">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">How it Works?</h2>
      <p class="section-description">
        Master the Crash game in 4 simple steps and start winning big
      </p>
    </div>
    <div class="steps-container">
      <div class="step-item">
        <div class="step-number">1</div>
        <h3 class="step-title">Place Your Bet</h3>
        <p class="step-description">
          Choose your bet amount and watch the multiplier start climbing
          from 1.00x
        </p>
      </div>
      <div class="step-connector"></div>
      <div class="step-item">
        <div class="step-number">2</div>
        <h3 class="step-title">Watch it Rise</h3>
        <p class="step-description">
          The multiplier increases rapidly - 1.5x, 2x, 5x, 10x and beyond!
        </p>
      </div>
      <div class="step-connector"></div>
      <div class="step-item">
        <div class="step-number">3</div>
        <h3 class="step-title">Cash Out</h3>
        <p class="step-description">
          Hit cash out before it crashes to secure your winnings at the
          current multiplier
        </p>
      </div>
      <div class="step-connector"></div>
      <div class="step-item">
        <div class="step-number">4</div>
        <h3 class="step-title">Win Big</h3>
        <p class="step-description">
          Your bet is multiplied by the cash-out value. The higher you go,
          the bigger you win!
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Games Section -->
<div class="container">
  <div class="section-header">
    <h2 class="section-title">Why Choose HustleBTC?</h2>
    <p class="section-description">
      Experience the most advanced crypto gaming platform with cutting-edge
      features
    </p>
  </div>
  <div class="games-grid">
    <div class="game-card">
      <div class="game-image">
        <img src="https://hustlebtc.com/img/hustle8.png" alt="Provably Fair Gaming" class="game-icon-large" />
      </div>
      <div class="game-content">
        <h3 class="game-title">Provably Fair</h3>
        <p class="game-description">
          Every game is cryptographically verified for fairness. Check the
          results yourself with our transparent algorithms.
        </p>
      </div>
    </div>
    <div class="game-card">
      <div class="game-image">
        <img src="https://hustlebtc.com/img/hustle9.png" alt="Instant Payouts" class="game-icon-large" />
      </div>
      <div class="game-content">
        <h3 class="game-title">Instant Payouts</h3>
        <p class="game-description">
          Withdraw your winnings instantly to your Bitcoin wallet. No
          delays, no hassles, just pure speed.
        </p>
      </div>
    </div>
    <div class="game-card">
      <div class="game-image">
        <img src="https://hustlebtc.com/img/hustle18.png" alt="Bank-Grade Security" class="game-icon-large" />
      </div>
      <div class="game-content">
        <h3 class="game-title">Bank-Grade Security</h3>
        <p class="game-description">
          Your funds are protected with military-grade encryption and cold
          storage security protocols.
        </p>
      </div>
    </div>
    <div class="game-card">
      <div class="game-image">
        <img src="https://hustlebtc.com/img/hustle41.png" alt="Generous Bonuses" class="game-icon-large" />
      </div>
      <div class="game-content">
        <h3 class="game-title">Generous Bonuses</h3>
        <p class="game-description">
          Get welcome bonuses, daily rewards, and exclusive VIP perks that
          boost your gaming experience.
        </p>
      </div>
    </div>
    <div class="game-card">
      <div class="game-image">
        <img src="https://hustlebtc.com/img/hustle61.png" alt="24/7 Support" class="game-icon-large" />
      </div>
      <div class="game-content">
        <h3 class="game-title">24/7 Support</h3>
        <p class="game-description">
          Our dedicated support team is available around the clock to assist
          you with any questions or issues.
        </p>
      </div>
    </div>
    <div class="game-card">
      <div class="game-image">
        <img src="https://hustlebtc.com/img/hustle58.png" alt="VIP Program" class="game-icon-large" />
      </div>
      <div class="game-content">
        <h3 class="game-title">VIP Program</h3>
        <p class="game-description">
          Join our exclusive VIP program for higher limits, personal account
          managers, and premium rewards.
        </p>
      </div>
    </div>
  </div>
</div>
<!-- Biggest Hustlers Leaderboard Section -->
<section id="leaderboard" class="leaderboard">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">
        <img src="https://hustlebtc.com/img/hustle81.png" alt="Trophy" style="width: 80px; height: 80px; vertical-align: middle; margin-right: 12px;" />
        Biggest Hustlers
      </h2>
      <p class="section-description">
        Top players who are dominating the leaderboard with their incredible
        wins
      </p>
    </div>
    <div class="tickets-table">
      <div class="table-header">
        <div>Rank</div>
        <div>Hustler</div>
        <div>Profit</div>
      </div>
      <div class="table-row">
        <div class="table-cell rank-cell">
          <img src="https://hustlebtc.com/img/hustle57.png" alt="Rank #1" class="rank-image" />
        </div>
        <div class="table-cell player-cell">
          <div class="player-info">
            <span class="player-name">Mike</span>
            <span class="player-level">VIP Diamond</span>
          </div>
        </div>
        <div class="table-cell profit-cell">
          <span class="profit-amount">0.71060880 ₿</span>
        </div>
      </div>
      <div class="table-row">
        <div class="table-cell rank-cell">
          <img src="https://hustlebtc.com/img/hustle56.png" alt="Rank #2" class="rank-image" />
        </div>
        <div class="table-cell player-cell">
          <div class="player-info">
            <span class="player-name">BitcoinBeast</span>
            <span class="player-level">VIP Gold</span>
          </div>
        </div>
        <div class="table-cell profit-cell">
          <span class="profit-amount">0.32156700 ₿</span>
        </div>
      </div>
      <div class="table-row">
        <div class="table-cell rank-cell">
          <img src="https://hustlebtc.com/img/hustle56.png" alt="Rank #3" class="rank-image" />
        </div>
        <div class="table-cell player-cell">
          <div class="player-info">
            <span class="player-name">HustleHero</span>
            <span class="player-level">VIP Silver</span>
          </div>
        </div>
        <div class="table-cell profit-cell">
          <span class="profit-amount">0.28923400 ₿</span>
        </div>
      </div>
      <div class="table-row">
        <div class="table-cell rank-cell">
          <img src="https://hustlebtc.com/img/hustle58.png" alt="Rank #4" class="rank-image" />
        </div>
        <div class="table-cell player-cell">
          <div class="player-info">
            <span class="player-name">SatoshiSlayer</span>
            <span class="player-level">VIP Bronze</span>
          </div>
        </div>
        <div class="table-cell profit-cell">
          <span class="profit-amount">0.19784500 ₿</span>
        </div>
      </div>
      <div class="table-row">
        <div class="table-cell rank-cell">
          <img src="https://hustlebtc.com/img/hustle58.png" alt="Rank #5" class="rank-image" />
        </div>
        <div class="table-cell player-cell">
          <div class="player-info">
            <span class="player-name">CrashMaster</span>
            <span class="player-level">Regular</span>
          </div>
        </div>
        <div class="table-cell profit-cell">
          <span class="profit-amount">0.15342100 ₿</span>
        </div>
      </div>
    </div>
  </div>
  <div class="leaderboard-footer">
    <p class="leaderboard-note">
      Rankings update every 5 minutes • Join the competition and climb the
      leaderboard!
    </p>
  </div>
</section>
<!-- CTA Section -->
<section class="cta">
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-title">Ready to Start Your Winning Journey?</h2>
      <p class="cta-description">
        Join thousands of players who trust HustleBTC for their crypto
        gaming experience
      </p>
      <div class="cta-actions">
        <a href="/register" class="btn-cta-primary">
          <span class="btn-icon"></span>
          Create Account
        </a>
        <a href="/faucet" class="btn-cta-secondary">
          <span class="btn-icon"></span>
          Try Free Faucet
        </a>
      </div>
    </div>
  </div>
</section>
@include('components.footer')
@endsection
@push('scripts')
<script src="{{ asset('balance-animation.js') }}"></script>
@endpush
