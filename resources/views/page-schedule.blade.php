@extends('layouts.app')

@section('content')
@php
  // If you want the tabs to switch via URL: ?tab=upcoming / results / tournaments
  $activeTab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'upcoming';

  // Starter stats (we can make these dynamic from posts later)
  $overallRecord = 18;
  $tournamentRecord = 12;
  $championships = 3;
  $stateRanking = 'N/A';

  // Season label
  $seasonLabel = '2025-2026 Season';
@endphp

{{-- HERO --}}
<section class="bg-gradient-to-b from-[#1b2436] to-[#0b1323] py-24 text-center">
  <h1 class="text-6xl md:text-7xl font-extrabold text-orange-500 tracking-widest">
    SCHEDULE &amp; RESULTS
  </h1>
  <p class="text-gray-200 mt-6 text-lg md:text-xl">
    {{ $seasonLabel }}
  </p>
</section>

{{-- STATS STRIP --}}
<section class="bg-[#101a2d] py-14">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

      {{-- Overall Record --}}
      <div class="rounded-xl border border-orange-500/40 bg-[#2a1e25] px-8 py-10 text-center">
        <div class="text-orange-500 text-5xl font-extrabold">{{ $overallRecord }}</div>
        <div class="text-gray-200 mt-3 text-sm">Overall Record</div>
      </div>

      {{-- Tournament Record --}}
      <div class="rounded-xl border border-orange-500/40 bg-[#2a1e25] px-8 py-10 text-center">
        <div class="text-orange-500 text-5xl font-extrabold">{{ $tournamentRecord }}</div>
        <div class="text-gray-200 mt-3 text-sm">Tournament Record</div>
      </div>

      {{-- Championships --}}
      <div class="rounded-xl border border-orange-500/40 bg-[#2a1e25] px-8 py-10 text-center">
        <div class="text-orange-500 text-5xl font-extrabold">{{ $championships }}</div>
        <div class="text-gray-200 mt-3 text-sm">Championships</div>
      </div>

      {{-- State Ranking --}}
      <div class="rounded-xl border border-orange-500/40 bg-[#2a1e25] px-8 py-10 text-center">
        <div class="text-orange-500 text-5xl font-extrabold">{{ $stateRanking }}</div>
        <div class="text-gray-200 mt-3 text-sm">State Ranking</div>
      </div>

    </div>
  </div>
</section>

{{-- TAB BUTTONS --}}
<section class="bg-[#0b1323] py-12 border-t border-orange-500/20">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex justify-center gap-5 flex-wrap">

      <a href="{{ add_query_arg('tab', 'upcoming', get_permalink()) }}"
         class="px-8 py-3 rounded-full border border-orange-500
         {{ $activeTab === 'upcoming' ? 'bg-orange-500 text-white' : 'text-white hover:bg-orange-500' }}">
        Upcoming Games
      </a>

      <a href="{{ add_query_arg('tab', 'results', get_permalink()) }}"
         class="px-8 py-3 rounded-full border border-orange-500
         {{ $activeTab === 'results' ? 'bg-orange-500 text-white' : 'text-white hover:bg-orange-500' }}">
        Recent Results
      </a>

      <a href="{{ add_query_arg('tab', 'tournaments', get_permalink()) }}"
         class="px-8 py-3 rounded-full border border-orange-500
         {{ $activeTab === 'tournaments' ? 'bg-orange-500 text-white' : 'text-white hover:bg-orange-500' }}">
        Tournaments
      </a>

    </div>
  </div>
</section>

@php
  $activeTab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'upcoming';

  // Today in Ymd to match ACF return format
  $today = (int) current_time('Ymd');

  // Upcoming games: status=upcoming AND game_date >= today
  $upcomingGames = get_posts([
    'post_type' => 'game',
    'posts_per_page' => -1,
    'meta_key' => 'game_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => [
      [
        'key' => 'status',
        'value' => 'upcoming',
        'compare' => '='
      ],
      [
        'key' => 'game_date',
        'value' => $today,
        'type' => 'NUMERIC',
        'compare' => '>='
      ],
    ],
  ]);

  // helper: format Ymd to "Saturday, January 25, 2026"
  $formatGameDate = function ($ymd) {
    if (!$ymd) return '';
    $dt = DateTime::createFromFormat('Ymd', $ymd);
    return $dt ? $dt->format('l, F j, Y') : '';
  };
@endphp

@if($activeTab === 'upcoming')
  <section class="bg-[#0b1323] py-14 text-center">
    <h2 class="text-5xl md:text-6xl font-extrabold text-orange-500 tracking-widest">
      UPCOMING GAMES
    </h2>
    <div class="w-24 h-1 bg-orange-500 mx-auto mt-6"></div>
  </section>

  <section class="bg-[#0b1323] pb-24">
    <div class="max-w-6xl mx-auto px-6 space-y-10">

      @if(empty($upcomingGames))
        <p class="text-gray-200 text-center">No upcoming games scheduled yet.</p>
      @endif

      @foreach($upcomingGames as $game)
        @php
          setup_postdata($game);

          $leagueLabel = get_field('league_label', $game->ID) ?: 'League Game';

          $gameDateYmd = get_field('game_date', $game->ID);
          $prettyDate = $formatGameDate($gameDateYmd);

          $gameTime = get_field('game_time', $game->ID) ?: 'TBD';
          $location = get_field('location', $game->ID) ?: 'Location TBA';

          $opponentName = get_field('opponent_name', $game->ID) ?: 'Opponent TBA';
          $opponentAbbr = get_field('opponent_abbr', $game->ID) ?: 'OP';
          $opponentRecord = get_field('opponent_record', $game->ID) ?: '';

          $ourRecord = get_field('our_record', $game->ID) ?: '';

          // OCYM initials for left badge (match your design)
          $ourAbbr = 'HH';
          $statusPill = 'UPCOMING';
        @endphp

        <div class="rounded-2xl border border-orange-500/30 bg-[#101a2d] px-8 py-8">
          {{-- top row: pill + league label --}}
          <div class="flex items-center justify-between">
            <span class="inline-flex items-center px-5 py-2 rounded-full border border-orange-500 text-orange-500 text-xs font-extrabold tracking-widest">
              {{ $statusPill }}
            </span>

            <span class="text-gray-300 text-xs font-semibold">
              {{ $leagueLabel }}
            </span>
          </div>

          {{-- matchup row --}}
          <div class="mt-10 grid grid-cols-1 md:grid-cols-3 items-center text-center gap-8">

            {{-- left team --}}
            <div class="space-y-3">
              <div class="w-16 h-16 mx-auto rounded-full border border-orange-500/60 flex items-center justify-center text-orange-500 font-extrabold tracking-widest">
                {{ $ourAbbr }}
              </div>

              <div class="text-gray-200 font-extrabold tracking-widest uppercase">
                OCYM HOLY HOOPS
              </div>

              @if($ourRecord)
                <div class="text-gray-400 text-sm">{{ $ourRecord }}</div>
              @endif
            </div>

            {{-- middle --}}
            <div class="space-y-3">
              <div class="text-orange-500 font-extrabold tracking-widest">VS</div>
              <div class="text-gray-300 text-sm font-semibold">{{ $gameTime }}</div>
            </div>

            {{-- right team --}}
            <div class="space-y-3">
              <div class="w-16 h-16 mx-auto rounded-full border border-orange-500/60 flex items-center justify-center text-orange-500 font-extrabold tracking-widest uppercase">
                {{ $opponentAbbr }}
              </div>

              <div class="text-gray-200 font-extrabold tracking-widest uppercase">
                {{ $opponentName }}
              </div>

              @if($opponentRecord)
                <div class="text-gray-400 text-sm">{{ $opponentRecord }}</div>
              @endif
            </div>
          </div>

          {{-- divider --}}
          <div class="border-t border-orange-500/20 mt-10"></div>

          {{-- bottom row: date + location --}}
          <div class="mt-6 flex flex-col md:flex-row md:items-center gap-4 md:gap-8 text-gray-300 text-sm">
            <div class="flex items-center gap-3">
              <span class="text-orange-500">📅</span>
              <span>{{ $prettyDate }}</span>
            </div>

            <div class="flex items-center gap-3">
              <span class="text-orange-500">📍</span>
              <span>{{ $location }}</span>
            </div>
          </div>
        </div>
      @endforeach

      @php wp_reset_postdata(); @endphp
    </div>
  </section>
@endif


@endsection