{{-- resources/views/page-coaches.blade.php --}}

@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-b from-[#1b2436] to-[#0b1323] py-24 text-center">
  <h1 class="text-6xl md:text-7xl font-extrabold text-orange-500 tracking-widest">
    COACHING STAFF
  </h1>

  <p class="text-gray-200 mt-6 text-lg md:text-xl">
    Meet the Leaders Behind Our Success
  </p>
</section>

{{-- ============================= --}}
{{-- HEAD COACH --}}
{{-- ============================= --}}

@php
$headCoach = get_posts([
  'post_type' => 'coach',
  'posts_per_page' => 1,
  'meta_key' => 'role_type',
  'meta_value' => 'head'
]);
@endphp

@if(!empty($headCoach))
@foreach($headCoach as $coach)

@php
setup_postdata($coach);

$subtitle = get_field('subtitle', $coach->ID);
$experience = get_field('experience', $coach->ID);
$background = get_field('background', $coach->ID);
$specialization = get_field('specialization', $coach->ID);
$quote = get_field('quote', $coach->ID);
$achievements = get_field('achievements', $coach->ID);

$imgUrl = get_the_post_thumbnail_url($coach->ID,'large');
@endphp


<section class="bg-[#0b1323] py-20 text-center">
  <h2 class="text-5xl font-extrabold text-orange-500 tracking-wide">
    HEAD COACH
  </h2>

  <div class="w-24 h-1 bg-orange-500 mx-auto mt-6"></div>
</section>


<section class="bg-[#0b1323] pb-24">
<div class="max-w-6xl mx-auto px-6">

<div class="rounded-2xl border border-orange-500/40 bg-[#101a2d] p-12 grid md:grid-cols-2 gap-12 items-center">

{{-- Coach Image --}}
<div class="flex justify-center">

<div class="w-[260px] h-[320px] border border-orange-500 rounded-xl flex items-center justify-center bg-[#2a1e25] overflow-hidden">

@if($imgUrl)
<img src="{{ $imgUrl }}" class="w-full h-full object-cover">
@else
<span class="text-5xl text-white/50">👤</span>
@endif

</div>

</div>


{{-- Coach Info --}}
<div class="text-left">

<h3 class="text-4xl font-extrabold text-orange-500 uppercase tracking-wide">
{{ get_the_title($coach) }}
</h3>

@if($subtitle)
<p class="text-orange-400 font-semibold mt-2">
{{ $subtitle }}
</p>
@endif


<div class="mt-6 space-y-3 text-gray-200">

@if($experience)
<p><span class="font-bold">Experience:</span> {{ $experience }}</p>
@endif

@if($background)
<p><span class="font-bold">Background:</span> {{ $background }}</p>
@endif

@if($specialization)
<p><span class="font-bold">Specialization:</span> {{ $specialization }}</p>
@endif

</div>


@if($quote)
<p class="italic text-orange-400 mt-6 leading-relaxed">
“{{ $quote }}”
</p>
@endif


{{-- Achievements --}}
@if($achievements)

<h4 class="text-orange-500 font-bold mt-8">
ACHIEVEMENTS:
</h4>

<ul class="mt-4 space-y-2 text-gray-200">

@foreach(preg_split("/\r\n|\n|\r/", $achievements) as $item)
@if(trim($item) != "")
<li class="flex gap-3">
<span class="text-orange-500">🏆</span>
<span>{{ $item }}</span>
</li>
@endif
@endforeach

</ul>

@endif

</div>

</div>
</div>
</section>

@endforeach
@endif

@php wp_reset_postdata(); @endphp



{{-- ============================= --}}
{{-- ASSISTANT COACHES --}}
{{-- ============================= --}}

@php
$assistants = get_posts([
'post_type' => 'coach',
'posts_per_page' => -1,
'meta_key' => 'role_type',
'meta_value' => 'assistant'
]);
@endphp


<section class="bg-[#101a2d] py-20 text-center">

<h2 class="text-5xl font-extrabold text-orange-500 tracking-wide">
ASSISTANT COACHES
</h2>

<div class="w-24 h-1 bg-orange-500 mx-auto mt-6"></div>

</section>


<section class="bg-[#101a2d] pb-24">

<div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 lg:grid-cols-4 gap-10">


@if(empty($assistants))
<p class="text-gray-200 col-span-full text-center">
No assistant coaches added yet.
</p>
@endif


@foreach($assistants as $coach)

@php
setup_postdata($coach);

$subtitle = get_field('subtitle',$coach->ID);
$experience = get_field('experience',$coach->ID);
$background = get_field('background',$coach->ID);
$specialization = get_field('specialization',$coach->ID);
$quote = get_field('quote',$coach->ID);

$imgUrl = get_the_post_thumbnail_url($coach->ID,'medium');
@endphp


<div class="rounded-2xl border border-orange-500/30 bg-[#0f1830] p-8 text-center">

{{-- Coach Avatar --}}
<div class="w-24 h-24 mx-auto rounded-full border border-orange-500 overflow-hidden flex items-center justify-center bg-[#2a1e25]">

@if($imgUrl)
<img src="{{ $imgUrl }}" class="w-full h-full object-cover">
@else
<span class="text-3xl text-white/60">👤</span>
@endif

</div>


<h3 class="text-orange-500 font-bold uppercase tracking-wider mt-5">
{{ get_the_title($coach) }}
</h3>


@if($subtitle)
<p class="text-orange-400 text-sm mt-2 font-semibold">
{{ $subtitle }}
</p>
@endif


<div class="text-gray-200 text-xs mt-6 space-y-3 text-left leading-6">

@if($background)
<p><span class="font-bold text-white">Background:</span> {{ $background }}</p>
@endif

@if($specialization)
<p><span class="font-bold text-white">Specialization:</span> {{ $specialization }}</p>
@endif

@if($experience)
<p><span class="font-bold text-white">Experience:</span> {{ $experience }}</p>
@endif

</div>


@if($quote)
<div class="mt-6 pt-4 border-t border-orange-500/30">
<p class="italic text-orange-400 text-xs">
“{{ $quote }}”
</p>
</div>
@endif

</div>

@endforeach

@php wp_reset_postdata(); @endphp

</div>
</section>

@php
  $supportStaff = get_posts([
    'post_type' => 'staff',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
  ]);
@endphp

<section class="bg-[#0b1323] py-20 text-center">
  <h2 class="text-5xl md:text-6xl font-extrabold text-orange-500 tracking-widest">
    SUPPORT STAFF
  </h2>
  <div class="w-24 h-1 bg-orange-500 mx-auto mt-6"></div>
</section>

<section class="bg-[#0b1323] pb-24">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

    @if(empty($supportStaff))
      <p class="text-gray-200 col-span-full text-center">No support staff added yet.</p>
    @endif

    @foreach($supportStaff as $person)
      @php
        setup_postdata($person);

        $role = get_field('role', $person->ID);
        $background = get_field('background', $person->ID);
        $responsibilities = get_field('responsibilities', $person->ID);
        $quote = get_field('quote', $person->ID);

        $imgUrl = get_the_post_thumbnail_url($person->ID, 'medium');
      @endphp

      <div class="rounded-2xl border border-orange-500/30 bg-[#101a2d] p-8 text-center shadow-lg">

        <div class="w-24 h-24 mx-auto rounded-full border border-orange-500/70 bg-[#2a1e25] overflow-hidden flex items-center justify-center">
          @if($imgUrl)
            <img src="{{ $imgUrl }}" alt="{{ get_the_title($person) }}" class="w-full h-full object-cover">
          @else
            <span class="text-3xl text-white/60">👤</span>
          @endif
        </div>

        <h3 class="mt-5 text-orange-500 font-extrabold tracking-widest uppercase">
          {{ get_the_title($person) }}
        </h3>

        @if($role)
          <p class="text-orange-400 text-sm mt-2 font-semibold">
            {{ $role }}
          </p>
        @endif

        <div class="text-gray-200 text-xs mt-6 space-y-3 text-left leading-6">
          @if($background)
            <p><span class="font-bold text-white">Background:</span> {{ $background }}</p>
          @endif

          @if($responsibilities)
            <p class="font-bold text-white mt-2">Responsibilities:</p>
            <ul class="mt-2 space-y-2">
              @foreach(preg_split("/\r\n|\n|\r/", $responsibilities) as $item)
                @php $item = trim($item); @endphp
                @if($item !== '')
                  <li class="flex gap-2">
                    <span class="text-orange-500">•</span>
                    <span class="text-gray-200">{{ $item }}</span>
                  </li>
                @endif
              @endforeach
            </ul>
          @endif
        </div>

        @if($quote)
          <div class="mt-6 pt-4 border-t border-orange-500/30">
            <p class="italic text-orange-400 text-xs leading-5">
              “{{ $quote }}”
            </p>
          </div>
        @endif
      </div>

    @endforeach

    @php wp_reset_postdata(); @endphp
  </div>
</section>

<section class="bg-[#101a2d] py-20 text-center">
  <h2 class="text-5xl md:text-6xl font-extrabold text-orange-500 tracking-widest">
    COACHING PHILOSOPHY
  </h2>
  <div class="w-24 h-1 bg-orange-500 mx-auto mt-6"></div>
</section>

<section class="bg-[#101a2d] pb-24">
  <div class="max-w-5xl mx-auto px-6">
    <div class="rounded-2xl border border-orange-500/30 bg-[#0f1830] p-10 md:p-14 text-left text-gray-200 leading-8 space-y-6">

      <p>
        At OCYM Holy Hoops, our coaching philosophy is built on developing complete athletes — on the court and in life.
        We focus on fundamentals, discipline, accountability, and confidence while building a winning team culture.
      </p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
        <div class="rounded-xl border border-orange-500/20 bg-[#101a2d] p-6">
          <h3 class="text-orange-500 font-extrabold tracking-widest uppercase">Fundamentals First</h3>
          <p class="mt-3 text-gray-200">
            Shooting, footwork, ball-handling, spacing, and defensive principles — we build the base that makes elite players.
          </p>
        </div>

        <div class="rounded-xl border border-orange-500/20 bg-[#101a2d] p-6">
          <h3 class="text-orange-500 font-extrabold tracking-widest uppercase">Basketball IQ</h3>
          <p class="mt-3 text-gray-200">
            We teach players how to read the game, make smart decisions, and understand team concepts in real time.
          </p>
        </div>

        <div class="rounded-xl border border-orange-500/20 bg-[#101a2d] p-6">
          <h3 class="text-orange-500 font-extrabold tracking-widest uppercase">Character & Leadership</h3>
          <p class="mt-3 text-gray-200">
            Respect, effort, coachability, and leadership matter. We expect players to represent the program with pride.
          </p>
        </div>

        <div class="rounded-xl border border-orange-500/20 bg-[#101a2d] p-6">
          <h3 class="text-orange-500 font-extrabold tracking-widest uppercase">Player Development</h3>
          <p class="mt-3 text-gray-200">
            Every athlete gets a growth plan — skill work, conditioning, and mindset training to reach the next level.
          </p>
        </div>
      </div>

      <div class="mt-8 border-l-4 border-orange-500 pl-6 italic text-orange-300">
        “We’re not just building basketball players — we’re building disciplined young leaders with confidence, purpose, and opportunity.”
      </div>

    </div>
  </div>
</section>
            

       
@endsection