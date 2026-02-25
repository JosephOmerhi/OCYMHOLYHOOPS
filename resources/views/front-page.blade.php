@extends('layouts.app')

@section('content')
  @include('partials.home.hero')
  @include('partials.home.stats')
  @include('partials.home.cards')
  @include('partials.home.news')
  @include('partials.home.cta')

  <section class="hero">
    <div class="hero__inner">
      <h1 class="hero__title">OCYM HOLY HOOPS</h1>
      <p class="hero__subtitle">AAU BASKETBALL EXCELLENCE</p>

      <div class="hero__actions">
        <a class="btn btn--primary" href="/tryouts">JOIN THE TEAM</a>
        <a class="btn btn--outline" href="/schedule">VIEW SCHEDULE</a>
      </div>
    </div>
  </section>

  <section class="welcome">
  <div class="welcome__inner">

    <div class="stats">
      <div class="stat">
        <div class="stat__num">15</div>
        <div class="stat__label">Years Experience</div>
      </div>
      <div class="stat">
        <div class="stat__num">100</div>
        <div class="stat__label">Players Trained</div>
      </div>
      <div class="stat">
        <div class="stat__num">25</div>
        <div class="stat__label">Championships</div>
      </div>
      <div class="stat">
        <div class="stat__num">50</div>
        <div class="stat__label">College Commits</div>
      </div>
    </div>

    <div class="welcome__heading">
      <h2 class="welcome__title">WELCOME TO OCYM HOLY HOOPS</h2>
      <span class="welcome__rule" aria-hidden="true"></span>
    </div>

    <div class="welcome__cards">

      <article class="feature-card">
        <div class="feature-card__icon" aria-hidden="true">🏀</div>
        <h3 class="feature-card__title">ELITE TRAINING</h3>
        <p class="feature-card__text">
          Professional-level coaching and training programs designed to elevate your game to the next level.
        </p>
        <a class="feature-card__link" href="/about">Learn More →</a>
      </article>

      <article class="feature-card">
        <div class="feature-card__icon" aria-hidden="true">🎯</div>
        <h3 class="feature-card__title">CHARACTER<br>DEVELOPMENT</h3>
        <p class="feature-card__text">
          Building champions on and off the court through discipline, teamwork, and spiritual growth.
        </p>
        <a class="feature-card__link" href="/about">Learn More →</a>
      </article>

      <article class="feature-card">
        <div class="feature-card__icon" aria-hidden="true">🏆</div>
        <h3 class="feature-card__title">COMPETITIVE<br>EXCELLENCE</h3>
        <p class="feature-card__text">
          Competing at the highest AAU levels against top teams across the region and nation.
        </p>
        <a class="feature-card__link" href="/schedule">View Schedule →</a>
      </article>

    </div>
  </div>
</section>

<section class="latest">
  <div class="latest__inner">

    <div class="section-heading">
      <h2 class="section-heading__title">LATEST NEWS</h2>
      <span class="section-heading__rule" aria-hidden="true"></span>
    </div>

    <div class="latest__grid">

      <article class="news-card">
        <time class="news-card__date" datetime="2026-01-10">Jan 10, 2026</time>
        <h3 class="news-card__title">Championship Victory!</h3>
        <p class="news-card__text">
          OCYM Holy Hoops claims first place at the Dallas Winter Classic, defeating top competitors in a thrilling final.
        </p>
        <a class="news-card__link" href="/news">Read More →</a>
      </article>

      <article class="news-card">
        <time class="news-card__date" datetime="2026-01-05">Jan 5, 2026</time>
        <h3 class="news-card__title">Spring Tryouts Announced</h3>
        <p class="news-card__text">
          Registration now open for Spring 2026 season tryouts. Limited spots available for dedicated athletes.
        </p>
        <a class="news-card__link" href="/tryouts">Read More →</a>
      </article>

      <article class="news-card">
        <time class="news-card__date" datetime="2025-12-28">Dec 28, 2025</time>
        <h3 class="news-card__title">Player Spotlight: Marcus Johnson</h3>
        <p class="news-card__text">
          Senior guard Marcus Johnson commits to Division I program, continuing Holy Hoops legacy of college placements.
        </p>
        <a class="news-card__link" href="/news">Read More →</a>
      </article>

    </div>
  </div>
</section>

<section class="cta">
  <div class="cta__inner">
    <h2 class="cta__title">READY TO JOIN THE TEAM?</h2>
    <p class="cta__subtitle">Take the first step towards basketball excellence</p>
    <a class="cta__button" href="/tryouts">Register for Tryouts</a>
  </div>
</section>

@endsection


  


