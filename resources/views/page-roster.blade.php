@extends('layouts.app')

@section('content')
@php
  $cptSlug = 'player';

  // active team from URL (?team=17U)
  $activeTeam = isset($_GET['team']) ? sanitize_text_field($_GET['team']) : null;

  // Try to get choices from ACF settings (may be empty on a normal Page)
  $fieldObj = function_exists('acf_get_field') ? acf_get_field('team') : null;
  $teams = (is_array($fieldObj) && isset($fieldObj['choices'])) ? $fieldObj['choices'] : [];

  // Fallback (matches your ACF values exactly)
  if (empty($teams)) {
    $teams = [
      '17U' => '17U',
      '16U' => '16U',
      '15U' => '15U',
      '14U' => '14U',
    ];
  }

  $args = [
    'post_type'      => $cptSlug,
    'posts_per_page' => -1,
    'meta_key'       => 'jersey_number',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
  ];

  // ✅ Always filter if team is present in URL (no dependency on $teams)
  if (!empty($activeTeam)) {
    $args['meta_query'] = [
      [
        'key'     => 'team',
        'value'   => $activeTeam,
        'compare' => '=',
      ],
    ];
  }

  $playersList = get_posts($args);

  $teamTitle = $activeTeam ? strtoupper($activeTeam) . ' TEAM' : 'ALL TEAMS';
@endphp

<section class="bg-gradient-to-b from-[#1b2436] to-[#0b1323] py-16 text-center">
  <h1 class="text-6xl font-extrabold text-orange-500 tracking-wide">TEAM ROSTER</h1>
  <p class="text-gray-300 mt-4 text-lg">Meet the Athletes of OCYM Holy Hoops</p>
</section>

<section class="bg-[#101a2d] py-8 border-b border-orange-500/70">
  <div class="flex justify-center gap-4 flex-wrap">
    <a href="{{ get_permalink() }}"
       class="px-8 py-3 rounded-full border border-orange-500 {{ !$activeTeam ? 'bg-orange-500 text-white' : 'text-white hover:bg-orange-500' }}">
      All Teams
    </a>

    @foreach ($teams as $value => $label)
      <a href="{{ add_query_arg('team', $value, get_permalink()) }}"
         class="px-8 py-3 rounded-full border border-orange-500 {{ $activeTeam === $value ? 'bg-orange-500 text-white' : 'text-white hover:bg-orange-500' }}">
        {{ $label }}
      </a>
    @endforeach
  </div>
</section>

<section class="bg-[#0b1323] py-14 text-center">
  <h2 class="text-5xl font-extrabold text-orange-500 tracking-wide">{{ $teamTitle }}</h2>
  <div class="w-24 h-1 bg-orange-500 mx-auto mt-6"></div>
</section>

<section class="bg-[#0b1323] pb-20">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

    @if (empty($playersList))
      <p class="text-gray-200">No players found for this team yet.</p>
    @endif

    @foreach ($playersList as $post)
      @php
        setup_postdata($post);

        $img = get_field('player_image', $post->ID);
        $imgUrl = is_array($img) && isset($img['url']) ? $img['url'] : '';

        $jersey = get_field('jersey_number', $post->ID);
        $position = get_field('position', $post->ID);
        $height = get_field('height', $post->ID);
        $grade = get_field('grade', $post->ID);
        $ppg = get_field('ppg', $post->ID);
        $apg = get_field('apg', $post->ID);
        $rpg = get_field('rpg', $post->ID);
        $commitment = get_field('commitment', $post->ID);
        $status = get_field('status', $post->ID);
      @endphp

      <div class="rounded-2xl overflow-hidden border border-orange-500/30 bg-[#111a2c] shadow-lg relative">
        <div class="bg-[#2a1e25] h-56 flex items-center justify-center relative">

          <div class="absolute top-4 right-4 bg-orange-500 text-white font-bold px-4 py-3 rounded-lg text-xl">
            #{{ $jersey }}
          </div>

          @if ($imgUrl)
            <img src="{{ $imgUrl }}" alt="{{ get_the_title($post) }}"
                 class="h-32 w-32 object-cover rounded-full border-4 border-orange-500/40" />
          @else
            <div class="h-32 w-32 rounded-full bg-black/30 flex items-center justify-center text-white/70">
              No Photo
            </div>
          @endif
        </div>

        <div class="p-6 text-left">
          <h3 class="text-orange-500 text-2xl font-extrabold tracking-wide uppercase">
            {{ get_the_title($post) }}
          </h3>

          <p class="text-gray-200 mt-3 font-semibold">{{ $position }}</p>
          <p class="text-gray-300 text-sm mt-2">{{ $height }} • {{ $grade }}</p>

          <hr class="border-orange-500/20 my-5">

          <div class="text-gray-200 text-sm space-y-2">
            @if ($ppg) <p><span class="font-bold text-gray-100">PPG:</span> {{ $ppg }}</p> @endif
            @if ($apg) <p><span class="font-bold text-gray-100">APG:</span> {{ $apg }}</p> @endif
            @if ($rpg) <p><span class="font-bold text-gray-100">RPG:</span> {{ $rpg }}</p> @endif
            @if ($commitment) <p><span class="font-bold text-gray-100">Commitment:</span> {{ $commitment }}</p> @endif
            @if ($status) <p><span class="font-bold text-gray-100">Status:</span> {{ $status }}</p> @endif
          </div>
        </div>
      </div>

    @endforeach

    @php wp_reset_postdata(); @endphp
  </div>
</section>
@endsection