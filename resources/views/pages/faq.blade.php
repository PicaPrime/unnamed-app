@extends('layouts.withoutNav')
@section('title', 'FAQ - HustleBTC | Bitcoin Casino Help & Support Center')
@section('content')
<div class="faq-container">
  <!-- Header Section -->
  <div class="faq-header">
    <h1>{{ $faqTitle ?? 'Frequently Asked Questions' }}</h1>
    <p>
      Find comprehensive answers to common questions about HustleBTC Bitcoin
      casino, cryptocurrency deposits, instant withdrawals, provably fair
      gameplay, and crypto gambling security.
    </p>
    <div style="margin-top: 20px">
      <a href="{{ route('home') }}" class="contact-btn">
        <span style="margin-right: 8px">🏠</span>
        Back to Casino
      </a>
    </div>
  </div>
  <!-- FAQ Accordion -->
  <div class="faq-accordion" id="faqAccordion">
    @foreach($faqs as $i => $faq)
      <div class="faq-item">
        <input type="checkbox" id="faq{{ $i+1 }}" class="faq-toggle" />
        <label for="faq{{ $i+1 }}" class="faq-question">
          <h3>{{ $faq['question'] }}</h3>
          <span class="faq-icon">+</span>
        </label>
        <div class="faq-answer">
          <div class="faq-answer-content">
            {!! nl2br(e($faq['answer'])) !!}
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <!-- Contact Section -->
  <div class="contact-section">
    <h2>Still Have Bitcoin Casino Questions?</h2>
    <p>
      Can't find what you're looking for about our cryptocurrency gambling
      platform? Our HustleBTC Bitcoin casino support team is here to help
      you 24/7 with all your crypto gambling questions.
    </p>
    <a href="{{ route('support') }}" class="contact-btn" rel="noopener">
      Contact Bitcoin Casino Support
    </a>
  </div>
</div>
<a href="#top" class="back-to-top" aria-label="Back to top">↑</a>
@endsection
