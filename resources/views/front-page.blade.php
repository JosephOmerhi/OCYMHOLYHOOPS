@extends('layouts.app')

@section('content')

  {{-- HERO SECTION --}}
  <section class="hero">
    <div class="container">
      <h1>HOLY HOOPS</h1>
      <p>AAU Basketball Excellence</p>

      <div class="hero-buttons">
        <a href="/tryouts" class="btn btn-primary">Join the Team</a>
        <a href="/schedule" class="btn btn-outline">View Schedule</a>
      </div>
    </div>
  </section>

  {{-- STATS --}}
  <section class="stats">
    <div class="container stats-grid">
      <div><strong>15</strong><span>Years Experience</span></div>
      <div><strong>100</strong><span>Players Trained</span></div>
      <div><strong>25</strong><span>Championships</span></div>
      <div><strong>50</strong><span>College Commits</span></div>
    </div>
  </section>

  {{-- SERVICES --}}
  <section class="services">
    <div class="container services-grid">
      <div class="card">
        <h3>Elite Training</h3>
        <p>Professional-level coaching to elevate your game.</p>
      </div>

      <div class="card">
        <h3>Character Development</h3>
        <p>Building discipline, teamwork, and leadership.</p>
      </div>

      <div class="card">
        <h3>Competitive Excellence</h3>
        <p>Competing at the highest AAU levels.</p>
      </div>
    </div>
  </section>

@endsection
