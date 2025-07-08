@extends('layouts.withoutNav')
@section('title', 'Game #12345 - HustleBTC | Bitcoin Casino Game Details')
@section('content')
<div class="game-container" style="padding-top: 70px;">
  <!-- Game Header -->
  <div class="game-header-card">
    <div class="game-header-content">
      <div class="game-info-left">
        <h1 class="game-title hide-on-small">{{ $game['title'] }}</h1>
        <h2 class="game-multiplier">{{ $game['multiplier'] }}x</h2>
        <div class="game-meta">
          <div class="game-id">
            <span>🎮</span>
            Game #{{ $game['id'] }}
          </div>
          <div class="game-time">{{ $game['time_ago'] }}</div>
          <div class="game-date">{{ $game['date'] }}</div>
        </div>
      </div>
      <div class="game-visual">
        <div class="game-icon">
          <img src="https://hustlebtc.com/img/loop1.png" alt="Game Icon" />
        </div>
      </div>
    </div>
  </div>
  <!-- Players Section -->
  <div class="players-section">
    <h2 class="section-title">Game Players</h2>
    <table class="players-table">
      <thead>
        <tr>
          <th>Player</th>
          <th>Bet</th>
          <th>Cashed Out</th>
          <th>Bonus</th>
          <th>Profit</th>
        </tr>
      </thead>
      <tbody>
        @foreach($players as $player)
          <tr class="{{ $player['profit'] < 0 ? 'lose' : '' }}">
            <td><a href="/user/{{ $player['name'] }}" class="player-name">{{ $player['name'] }}</a></td>
            <td class="bet-amount">{{ number_format($player['bet']) }} bits</td>
            <td class="{{ $player['cashed_out'] ? 'cash-out-win' : 'cash-out-lose' }}">
              {{ $player['cashed_out'] ? number_format($player['cashed_out'], 2) . 'x' : 'Lose' }}
            </td>
            <td class="bonus-amount">
              {{ $player['bonus'] !== null ? number_format($player['bonus'], 2) . '%' : '-' }}
            </td>
            <td class="{{ $player['profit'] < 0 ? 'profit-negative' : 'profit-positive' }}">
              {{ $player['profit'] < 0 ? '' : '+' }}{{ number_format($player['profit'], 1) }} bits
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- Provably Fair Hash -->
  <div class="hash-section">
    <h3 class="hash-title">Provably Fair Hash:</h3>
    <div class="hash-value">
      <a href="{{ route('faq') }}#fair" class="hash-link">
        {{ $game['hash'] }}
      </a>
    </div>
  </div>
  <!-- Action Buttons -->
  <div class="action-buttons">
    <a href="{{ route('home') }}" class="action-btn primary">
      <span>🎮</span>
      Play Another Game
    </a>
    <a href="/games" class="action-btn secondary">
      <span>📊</span>
      View All Games
    </a>
  </div>
</div>
<a href="#top" class="back-to-top" aria-label="Back to top">↑</a>
@endsection
