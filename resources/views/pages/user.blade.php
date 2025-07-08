<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Statistics - HustleBTC | Player Profile & Game Stats</title>
    <meta name="title" content="User Statistics - HustleBTC | Player Profile & Game Stats" />
    <meta name="description" content="View detailed user statistics including games played, rank, total wagered, net profit, and performance history on HustleBTC Bitcoin casino." />
    <meta name="keywords" content="bitcoin casino user stats, crypto gambling profile, player statistics, bitcoin betting history, cryptocurrency casino rank" />
    <meta name="author" content="HustleBTC" />
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://hustlebtc.com/user" />
    <meta property="og:title" content="User Statistics - HustleBTC | Player Profile & Game Stats" />
    <meta property="og:description" content="Track your Bitcoin casino performance with detailed statistics, rankings, and profit analysis on HustleBTC." />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://hustlebtc.com/user" />
    <meta property="twitter:title" content="User Statistics - HustleBTC | Player Profile & Game Stats" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    <link rel="stylesheet" href="{{ asset('styles.css') }}" />
  </head>
  <body>
    <div class="modern-user-container">
      <div class="modern-profile-header">
        <div class="profile-left">
          <div class="modern-avatar">
            <img src="https://hustlebtc.com/img/hustle10.png" alt="Player Avatar" class="avatar-img" />
          </div>
          <div class="profile-info">
            <h1 class="modern-username">{{ $user->name ?? 'Player' }}</h1>
            <div class="profile-badges">
              @if($user && $user->hasVerifiedEmail())
                <span class="badge verified">✓ Verified</span>
              @endif
              @if($user && isset($user->is_vip) && $user->is_vip)
                <span class="badge vip">⭐ VIP</span>
              @endif
            </div>
          </div>
        </div>
        <div class="profile-actions">
          <div style="display: flex; gap: 12px; margin-bottom: 12px">
            <a href="/tip" class="modern-btn primary"><span>💰</span>TIP</a>
            <a href="/" class="modern-btn secondary"><span>🏠</span>Back</a>
          </div>
          <div class="joined-date">Joined: {{ $joined_date }} [{{ $joined_ago }}]</div>
        </div>
      </div>
      <div class="dashboard-grid">
        <div class="stats-column">
          <div class="stats-section">
            <h2 class="section-title">Performance Overview</h2>
            <div class="stats-cards-grid-single-row">
              <div class="modern-stat-card primary">
                <div class="stat-content">
                  <div class="stat-value">{{ $stats['games_played'] }}</div>
                  <div class="stat-label">Games Played</div>
                </div>
              </div>
              <div class="modern-stat-card success">
                <div class="stat-content">
                  <div class="stat-value">{{ $stats['total_wagered'] }} ₿</div>
                  <div class="stat-label">Total Wagered</div>
                </div>
              </div>
              <div class="modern-stat-card profit">
                <div class="stat-content">
                  <div class="stat-value">{{ $stats['net_profit'] }} ₿</div>
                  <div class="stat-label">Net Profit </div>
                </div>
              </div>
              <div class="modern-stat-card highlight">
                <div class="stat-content">
                  <div class="stat-value">#{{ $stats['global_rank'] }}</div>
                  <div class="stat-label">Global Rank</div>
                </div>
              </div>
            </div>
          </div>
          <div class="metrics-section">
            <h3 class="subsection-title">Key Metrics</h3>
            <div class="metrics-grid">
              <div class="metric-item">
                <div class="metric-header">
                  <span class="metric-name">Win Rate</span>
                  <span class="metric-value">{{ $metrics['win_rate'] }}%</span>
                </div>
                <div class="metric-bar">
                  <div class="metric-fill" style="width: {{ $metrics['win_rate'] }}%"></div>
                </div>
              </div>
              <div class="metric-item">
                <div class="metric-header">
                  <span class="metric-name">Avg Multiplier</span>
                  <span class="metric-value">{{ $metrics['avg_multiplier'] }}x</span>
                </div>
                <div class="metric-bar">
                  <div class="metric-fill" style="width: {{ ($metrics['avg_multiplier'] / 5) * 100 }}%"></div>
                </div>
              </div>
              <div class="metric-item">
                <div class="metric-header">
                  <span class="metric-name">Best Streak</span>
                  <span class="metric-value">{{ $metrics['best_streak'] }} wins</span>
                </div>
                <div class="metric-bar">
                  <div class="metric-fill" style="width: {{ min($metrics['best_streak'] * 5, 100) }}%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="activity-column">
          <div class="activity-section-modern">
            <div class="section-header-inline">
              <h2 class="section-title">Recent Activity</h2>
            </div>
            <div class="activity-feed">
              @foreach($recent_activity as $activity)
                <div class="activity-item-modern {{ $activity['type'] }}">
                  <div class="activity-icon-modern">@if($activity['type']==='win')✓@else❌@endif</div>
                  <div class="activity-content">
                    <div class="activity-title-modern">{{ $activity['title'] }}</div>
                    <div class="activity-details-modern">{{ $activity['details'] }}</div>
                  </div>
                  <div class="activity-time-modern">{{ $activity['time'] }}</div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="achievements-section-modern">
            <div class="section-header-inline">
              <h2 class="section-title">Achievements</h2>
              <span class="achievement-count">3/6 Unlocked</span>
            </div>
            <div class="achievements-grid-2x3">
              @foreach($achievements as $achievement)
                <div class="achievement-item-detailed {{ $achievement['earned'] ? 'earned' : 'locked' }}">
                  <div class="achievement-header">
                    <span class="achievement-icon-small">{{ $achievement['icon'] }}</span>
                    <span class="achievement-name">{{ $achievement['name'] }}</span>
                  </div>
                  <div class="achievement-description">{{ $achievement['description'] }}</div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
