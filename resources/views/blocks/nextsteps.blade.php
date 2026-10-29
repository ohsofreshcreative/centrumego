@if ($block->preview)
  @include('blocks.preview-nextsteps')
@else
<!--- nextsteps --->
<section
  data-gsap-anim="section"
  @if (!empty($section_id)) id="{{ $section_id }}" @endif
  @class([
    'b-nextsteps relative -smt',
    $sectionClass => filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
  ])>
  <div class="__wrapper c-main">
    @if (!empty($nextsteps))
      <div class="__steps">
        @if (!empty($g_nextsteps['header']))
          <h2 data-gsap-element="header" class="__header mb-8 text-center text-primary md:mb-12">{{ $g_nextsteps['header'] }}</h2>
        @endif

        <ol class="__grid grid grid-cols-1 gap-4 md:grid-cols-3">
          @foreach ($nextsteps as $step)
            @if (!empty($step['text']))
              <li data-gsap-element="card" class="__card flex flex-col gap-5 rounded-xl bg-white px-6 py-6">
                <span class="__number inline-flex size-10 items-center justify-center rounded-full bg-primary text-lg font-bold leading-none text-white">{{ $loop->iteration }}</span>
                <p class="text-base font-bold leading-normal text-primary">{{ $step['text'] }}</p>
              </li>
            @endif
          @endforeach
        </ol>

        @if (!empty($g_nextsteps['button']))
          <div class="inline-buttons m-btn flex justify-center">
            <x-button
              :href="$g_nextsteps['button']['url']"
              variant="secondary"
              :target="$g_nextsteps['button']['target'] ?? '_self'">
              {{ $g_nextsteps['button']['title'] }}
            </x-button>
          </div>
        @endif
      </div>
    @endif

    @if (!empty($g_program['header']))
      <div @if (!empty($g_program['anchor'])) id="{{ $g_program['anchor'] }}" @endif class="__program-wrap mt-20">
        <div data-gsap-element="card" class="__program relative overflow-hidden rounded-3xl bg-primary p-8 md:p-12 lg:p-16">
          <div class="__blur"></div>
          <div class="relative z-10 grid grid-cols-1 items-center gap-8 lg:grid-cols-2 lg:gap-16">
            <h2 class="__title m-0 !text-white">{{ $g_program['header'] }}</h2>
            <div>
              @if (!empty($g_program['text']))
                <div class="__txt text-lg leading-relaxed text-white">{!! $g_program['text'] !!}</div>
              @endif
              @if (!empty($g_program['button']))
                <div class="inline-buttons m-btn">
                  <x-button
                    :href="$g_program['button']['url']"
                    variant="third"
                    :target="$g_program['button']['target'] ?? '_self'">
                    {{ $g_program['button']['title'] }}
                  </x-button>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
</section>
@endif
