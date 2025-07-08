@extends('layouts.withoutNav')
@section('title', 'Support - HustleBTC | Help & Support Center')
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
      <div class="joined-date">Joined: {{ $joinedDate ?? '' }}</div>
    </div>
  </div>
  <!-- Navigation Tabs -->
  <div class="account-nav-tabs">
    <a href="#" class="nav-tab active">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Overview</span>
    </a>
    <a href="{{ route('investment') }}" class="nav-tab">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Investment</span>
    </a>
    <a href="{{ route('faucet') }}" class="nav-tab">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Faucet</span>
    </a>
    <a href="{{ route('transfer') }}" class="nav-tab">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Transfer</span>
    </a>
    <a href="{{ route('security') }}" class="nav-tab">
      <span class="nav-tab-icon"></span>
      <span class="nav-tab-text">Security</span>
    </a>
  </div>
  <!-- Support Content Flex Container -->
  <div class="support-content-flex">
    <!-- Contact Form Section -->
    <div class="contact-form-section" id="contact-form">
      <h2 class="section-title">Send Us a Message</h2>
      <p class="section-subtitle">
        Fill out the form below and we'll get back to you as soon as
        possible. Please provide as much detail as possible to help us
        assist you better.
      </p>
      <form class="contact-form" action="/support-request" method="post">
        @csrf
        <div class="form-group">
          <label for="subject" class="form-label">Subject</label>
          <input style="padding: 16px 20px;" type="text" id="subject" name="subject" placeholder="Brief description of your issue" class="form-input" required />
        </div>
        <div class="form-group">
          <label for="message" class="form-label">Message</label>
          <textarea id="message" name="message" placeholder="Please provide detailed information about your issue, including any error messages, steps to reproduce the problem, and your browser/device information." class="form-textarea" required></textarea>
        </div>
        <button type="submit" class="submit-btn" id="submitBtn">
          <span>📤</span>
          Send Message
        </button>
      </form>
    </div>
    <!-- Support Tickets Section -->
    <div class="support-tickets-section">
      <h2 class="section-title">Your Support Tickets</h2>
      <div class="tickets-table">
        <div class="table-header">
          <div>ID</div>
          <div>Title</div>
          <div class="hide-mobile">Status</div>
          <div>Action</div>
        </div>
        @forelse($tickets as $ticket)
          <div class="table-row">
            <div class="table-cell">{{ sprintf('%03d', $ticket['id']) }}</div>
            <div class="table-cell">{{ $ticket['title'] }}</div>
            <div class="table-cell hide-mobile">
              <span class="status-{{ $ticket['status'] }}">{{ ucfirst($ticket['status']) }}</span>
            </div>
            <div class="table-cell">
              <a href="/support/show/{{ $ticket['id'] }}" class="reply-link">{{ $ticket['action'] }}</a>
            </div>
          </div>
        @empty
          <div class="empty-state">
            <div class="empty-icon">🎫</div>
            <div class="empty-text">No support tickets yet</div>
            <div class="empty-subtext">Create your first ticket using the form above</div>
          </div>
        @endforelse
      </div>
    </div>
  </div>
  <!-- Quick Links Section -->
  <div class="quick-links-section">
    <h2 class="section-title">Quick Help Links</h2>
    <div class="quick-links-grid">
      <a href="{{ route('faq') }}" class="quick-link-card">
        <div class="quick-link-header">
          <span class="quick-link-icon">❓</span>
          <h3 class="quick-link-title">FAQ</h3>
        </div>
        <p class="quick-link-description">
          Find answers to the most commonly asked questions about HustleBTC,
          deposits, withdrawals, and gameplay.
        </p>
      </a>
      <a href="{{ route('terms') }}" class="quick-link-card">
        <div class="quick-link-header">
          <span class="quick-link-icon">📋</span>
          <h3 class="quick-link-title">Terms of Service</h3>
        </div>
        <p class="quick-link-description">
          Read our complete terms of service, user agreements, and platform
          rules for HustleBTC.
        </p>
      </a>
      <a href="/stats" class="quick-link-card">
        <div class="quick-link-header">
          <span class="quick-link-icon">📊</span>
          <h3 class="quick-link-title">Platform Stats</h3>
        </div>
        <p class="quick-link-description">
          View real-time statistics about HustleBTC including total users,
          bets, and transparent performance data.
        </p>
      </a>
      <a href="{{ route('security') }}" class="quick-link-card">
        <div class="quick-link-header">
          <span class="quick-link-icon">🔒</span>
          <h3 class="quick-link-title">Security Center</h3>
        </div>
        <p class="quick-link-description">
          Learn about our security measures, enable 2FA, and manage your
          account security settings.
        </p>
      </a>
      <a href="/game/12345" class="quick-link-card">
        <div class="quick-link-header">
          <span class="quick-link-icon">🎲</span>
          <h3 class="quick-link-title">Game Verification</h3>
        </div>
        <p class="quick-link-description">
          Verify game fairness and check detailed game results with our
          provably fair system.
        </p>
      </a>
      <a href="{{ route('investment') }}" class="quick-link-card">
        <div class="quick-link-header">
          <span class="quick-link-icon">📈</span>
          <h3 class="quick-link-title">Investment Help</h3>
        </div>
        <p class="quick-link-description">
          Get help with bankroll investments, profit distributions, and
          investment management.
        </p>
      </a>
    </div>
  </div>
</div>
@push('scripts')
<script>
// Secure form validation and enhancement
// (You may want to adapt this for your backend or use Laravel validation instead)
</script>
@endpush
@endsection
