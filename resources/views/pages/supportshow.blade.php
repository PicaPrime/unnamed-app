@extends('layouts.withoutNav')
@section('title', 'Support Reply - HustleBTC | Bitcoin Casino Support Chat')
@section('content')
<div class="support-container">
  <!-- Support Header -->
  <div class="support-header">
    <div class="header-content">
      <div class="header-top">
        <a href="{{ route('support') }}" class="back-btn">
          <span>←</span>
          Back
        </a>
        <div class="ticket-info">
          <h1 class="ticket-title" id="ticket-subject">Withdrawal Issue - Bitcoin Transaction Delayed</h1>
          <div class="ticket-meta">
            <span class="status-badge status-open" id="ticket-status">
              <span>●</span>
              Open
            </span>
            <span id="ticket-id">Ticket #12345</span>
          </div>
        </div>
        <form id="close-ticket-form" action="#" method="post" style="display: block;">
          @csrf
          <input type="hidden" name="id" id="close-ticket-id" value="12345" />
          <button type="submit" class="close-ticket-btn">
            <span>✕</span>
            Close
          </button>
        </form>
      </div>
    </div>
  </div>
  <!-- Success Message -->
  <div class="success-message" id="success-message"></div>
  <!-- Chat Container -->
  <div class="chat-container">
    <!-- Messages Area -->
    <div class="messages-area" id="messages-area">
      <!-- Static sample messages -->
      <div class="message user">
        <div class="message-bubble">
          <div class="message-header">
            <span>You</span>
          </div>
          <div class="message-content">Hello, I initiated a Bitcoin withdrawal 2 hours ago but it hasn't been processed yet. Can you please check the status?</div>
        </div>
      </div>
      <div class="message support">
        <div class="message-bubble">
          <div class="message-header">
            <span>Support Team</span>
          </div>
          <div class="message-content">Thank you for contacting us. I've checked your withdrawal request and it's currently in our processing queue. Bitcoin withdrawals typically take 1-6 hours to process depending on network congestion.</div>
        </div>
      </div>
      <div class="message user">
        <div class="message-bubble">
          <div class="message-header">
            <span>You</span>
          </div>
          <div class="message-content">Thank you for the update. Is there any way to expedite this? I need the funds urgently.</div>
        </div>
      </div>
      <div class="message support">
        <div class="message-bubble">
          <div class="message-header">
            <span>Support Team</span>
          </div>
          <div class="message-content">I understand your urgency. I've escalated your withdrawal to our priority queue. You should receive your Bitcoin within the next 30 minutes. I'll monitor this personally and update you once it's sent.</div>
        </div>
      </div>
    </div>
    <!-- Reply Form -->
    <div class="reply-form" id="reply-form">
      <form id="message-form" action="#" method="post">
        @csrf
        <input type="hidden" name="id" id="reply-ticket-id" value="12345" />
        <div class="form-group" style="flex-direction: row;">
          <textarea name="message" id="message-input" class="message-input" placeholder="Type your message here..." maxlength="1000" required></textarea>
          <button type="submit" class="send-btn" id="send-btn" style="margin-top: 20px; max-height: 40px;">
            <span>Send</span>
          </button>
        </div>
        <div class="char-counter" id="char-counter">0/1000</div>
      </form>
    </div>
    <!-- Ticket Closed Message -->
    <div class="ticket-closed-message" id="closed-message" style="display: none;">
      <h3>✓ This Ticket is Solved</h3>
      <p>This support ticket has been closed and marked as resolved. If you need further assistance, please create a new ticket.</p>
    </div>
  </div>
</div>
@push('scripts')
<script>
// Character counter and form UI only (no sample data loading)
function updateCharCounter() {
  const input = document.getElementById('message-input');
  const counter = document.getElementById('char-counter');
  const length = input.value.length;
  const maxLength = 1000;
  counter.textContent = `${length}/${maxLength}`;
  if (length > maxLength * 0.9) {
    counter.className = 'char-counter error';
  } else if (length > maxLength * 0.8) {
    counter.className = 'char-counter warning';
  } else {
    counter.className = 'char-counter';
  }
}
document.addEventListener('DOMContentLoaded', function () {
  const messageInput = document.getElementById('message-input');
  messageInput.addEventListener('input', updateCharCounter);
  messageInput.addEventListener('input', function () {
    this.style.height = 'auto';
    this.style.height = Math.min(this.scrollHeight, 100) + 'px';
  });
});
</script>
@endpush
@endsection
