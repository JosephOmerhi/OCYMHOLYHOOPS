@extends('layouts.app')

@section('content')
  <section class="page-hero">
    <div class="page-hero__inner">
      <h1 class="page-hero__title">ABOUT US</h1>
      <p class="page-hero__subtitle">Building Champions On &amp; Off The Court</p>
    </div>
  </section>

  <section class="mission">
  <div class="mission__inner">

    <div class="mission__text">
      <h2 class="mission__title">OUR MISSION</h2>

      <p>
        OCYM Holy Hoops is dedicated to developing young athletes into champions both on and off the basketball court.
        We believe that athletic excellence and character development go hand in hand.
      </p>

      <p>
        Our program provides players with elite-level training, competitive opportunities, and mentorship that prepares them
        not just for basketball success, but for success in life.
      </p>

      <p>
        Through dedication, discipline, and faith, we help our players reach their full potential as athletes, students,
        and individuals.
      </p>
    </div>

    <div class="mission__media" aria-label="Mission Image">
      <div class="mission__frame">
        <div class="mission__panel">
          <div class="mission__ball" aria-hidden="true">🏀</div>
          <div class="mission__label">Mission Image</div>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="values">
  <div class="values__inner">

    <div class="section-heading">
      <h2 class="section-heading__title">OUR CORE VALUES</h2>
      <span class="section-heading__rule" aria-hidden="true"></span>
    </div>

    <div class="values__grid">

      <article class="value-card">
        <div class="value-card__icon" aria-hidden="true">💪</div>
        <h3 class="value-card__title">EXCELLENCE</h3>
        <p class="value-card__text">
          We pursue excellence in everything we do, from practice to competition to classroom performance.
        </p>
      </article>

      <article class="value-card">
        <div class="value-card__icon" aria-hidden="true">🤝</div>
        <h3 class="value-card__title">TEAMWORK</h3>
        <p class="value-card__text">
          Success comes from working together, supporting each other, and putting the team first.
        </p>
      </article>

      <article class="value-card">
        <div class="value-card__icon" aria-hidden="true">🎯</div>
        <h3 class="value-card__title">DISCIPLINE</h3>
        <p class="value-card__text">
          Championship performance requires dedication, hard work, and unwavering commitment.
        </p>
      </article>

      <article class="value-card">
        <div class="value-card__icon" aria-hidden="true">❤️</div>
        <h3 class="value-card__title">CHARACTER</h3>
        <p class="value-card__text">
          We build integrity, respect, and leadership skills that last a lifetime.
        </p>
      </article>

      <article class="value-card">
        <div class="value-card__icon" aria-hidden="true">📚</div>
        <h3 class="value-card__title">EDUCATION</h3>
        <p class="value-card__text">
          Academic success is just as important as athletic achievement in our program.
        </p>
      </article>

      <article class="value-card">
        <div class="value-card__icon" aria-hidden="true">🙏</div>
        <h3 class="value-card__title">FAITH</h3>
        <p class="value-card__text">
          We ground our program in spiritual values and personal growth.
        </p>
      </article>

    </div>
  </div>
</section>

<section class="offer">
  <div class="offer__inner">

    <div class="section-heading">
      <h2 class="section-heading__title">WHAT WE OFFER</h2>
      <span class="section-heading__rule" aria-hidden="true"></span>
    </div>

    <div class="offer__grid">

      <article class="offer-card">
        <div class="offer-card__top">
          <span class="offer-card__icon" aria-hidden="true">🏆</span>
          <h3 class="offer-card__title">ELITE COMPETITION</h3>
        </div>
        <p class="offer-card__text">
          Compete against top AAU teams across Texas and the nation at premier tournaments and showcases.
        </p>
      </article>

      <article class="offer-card">
        <div class="offer-card__top">
          <span class="offer-card__icon" aria-hidden="true">👨‍🏫</span>
          <h3 class="offer-card__title">PROFESSIONAL<br>COACHING</h3>
        </div>
        <p class="offer-card__text">
          Learn from experienced coaches with college and professional playing backgrounds.
        </p>
      </article>

      <article class="offer-card">
        <div class="offer-card__top">
          <span class="offer-card__icon" aria-hidden="true">🎓</span>
          <h3 class="offer-card__title">COLLEGE PREPARATION</h3>
        </div>
        <p class="offer-card__text">
          Get exposure to college scouts and recruiters through our extensive network and tournament schedule.
        </p>
      </article>

      <article class="offer-card">
        <div class="offer-card__top">
          <span class="offer-card__icon" aria-hidden="true">💯</span>
          <h3 class="offer-card__title">SKILL DEVELOPMENT</h3>
        </div>
        <p class="offer-card__text">
          Advanced training programs focused on fundamentals, basketball IQ, and position-specific skills.
        </p>
      </article>

      <article class="offer-card">
        <div class="offer-card__top">
          <span class="offer-card__icon" aria-hidden="true">🏋️</span>
          <h3 class="offer-card__title">STRENGTH &amp;<br>CONDITIONING</h3>
        </div>
        <p class="offer-card__text">
          Comprehensive athletic development including strength training, speed work, and injury prevention.
        </p>
      </article>

      <article class="offer-card">
        <div class="offer-card__top">
          <span class="offer-card__icon" aria-hidden="true">🧠</span>
          <h3 class="offer-card__title">MENTAL TOUGHNESS</h3>
        </div>
        <p class="offer-card__text">
          Sports psychology and leadership training to develop champions' mindsets.
        </p>
      </article>

    </div>
  </div>
</section>

<section class="history">
  <div class="history__inner">

    <div class="section-heading">
      <h2 class="section-heading__title">OUR HISTORY</h2>
      <span class="section-heading__rule" aria-hidden="true"></span>
    </div>

    <div class="timeline">

      <div class="timeline-item">
        <div class="timeline-year">2010</div>
        <div class="timeline-content">
          <h3>FOUNDATION</h3>
          <p>
            OCYM Holy Hoops was founded with a vision to provide elite basketball training grounded in faith and character development.
          </p>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-year">2015</div>
        <div class="timeline-content">
          <h3>FIRST CHAMPIONSHIP</h3>
          <p>
            Our 15U team won the Texas AAU State Championship, marking our arrival as a competitive force.
          </p>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-year">2018</div>
        <div class="timeline-content">
          <h3>NATIONAL RECOGNITION</h3>
          <p>
            Multiple teams qualified for AAU Nationals, with our 17U team finishing in the Elite Eight.
          </p>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-year">2022</div>
        <div class="timeline-content">
          <h3>PROGRAM EXPANSION</h3>
          <p>
            Added multiple age divisions and launched our girls' program to serve more young athletes.
          </p>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-year">2026</div>
        <div class="timeline-content">
          <h3>CONTINUED EXCELLENCE</h3>
          <p>
            Over 50 players have gone on to play college basketball, with our program continuing to grow and succeed.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="numbers">
  <div class="numbers__inner">

    <div class="section-heading">
      <h2 class="section-heading__title">BY THE NUMBERS</h2>
      <span class="section-heading__rule" aria-hidden="true"></span>
    </div>

    <div class="numbers__grid">
      <div class="num-card">
        <div class="num-card__num">15</div>
        <div class="num-card__label">Years of<br>Excellence</div>
      </div>

      <div class="num-card">
        <div class="num-card__num">100</div>
        <div class="num-card__label">Players Trained</div>
      </div>

      <div class="num-card">
        <div class="num-card__num">25</div>
        <div class="num-card__label">Championships<br>Won</div>
      </div>

      <div class="num-card">
        <div class="num-card__num">50</div>
        <div class="num-card__label">College<br>Commitments</div>
      </div>

      <div class="num-card">
        <div class="num-card__num">95</div>
        <div class="num-card__label">College Acceptance<br>Rate</div>
      </div>

      <div class="num-card">
        <div class="num-card__num">10</div>
        <div class="num-card__label">Professional<br>Coaches</div>
      </div>
    </div>

  </div>
</section>

<section class="join-cta">
  <div class="join-cta__inner">

    <h2 class="join-cta__title">JOIN THE HOLY HOOPS FAMILY</h2>

    <p class="join-cta__subtitle">
      Become part of a program that develops champions
    </p>

    <a href="/tryouts" class="join-cta__button">
      Learn About Tryouts
    </a>

  </div>
</section>


@endsection
