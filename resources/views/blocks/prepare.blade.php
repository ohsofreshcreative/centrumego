@if ($block->preview)
  @include('blocks.preview-prepare')
@else
<!--- prepare --->
<section
  data-gsap-anim="section"
  @if (!empty($section_id)) id="{{ $section_id }}" @endif
  @class([
    'b-prepare relative -smt',
    $sectionClass => filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
  ])>
  <div class="__wrapper c-main">
    <div data-gsap-element="card" class="__card grid grid-cols-1 items-center gap-8 rounded-3xl bg-white p-6 md:p-10 lg:grid-cols-5 lg:gap-12">
      <div class="__content lg:col-span-3">
        @if (!empty($g_prepare['header']))
          <h2 class="__title mb-6 text-primary">{{ $g_prepare['header'] }}</h2>
        @endif
        @if (!empty($g_prepare['text']))
          <div class="__txt text-base leading-relaxed text-primary">{!! $g_prepare['text'] !!}</div>
        @endif
      </div>

      @if (!empty($g_prepare['button']) || !empty($g_prepare['note']))
        <div class="__aside flex flex-col items-start gap-5 rounded-xl bg-section-light p-6 md:p-8 lg:col-span-2">
          @if (!empty($g_prepare['note']))
            <div class="flex items-start gap-4">
              <span class="__icon inline-flex size-10 shrink-0 items-center justify-center rounded-full bg-third text-white">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16v12H4z M4 7l8 6 8-6" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
              </span>
              <p class="text-sm leading-relaxed text-primary">{{ $g_prepare['note'] }}</p>
            </div>
          @endif
          @if (!empty($g_prepare['button']))
            <x-button
              :href="$g_prepare['button']['url']"
              variant="third"
              :target="$g_prepare['button']['target'] ?? '_self'">
              {{ $g_prepare['button']['title'] }}
            </x-button>
          @endif
        </div>
      @endif
    </div>
  </div>
</section>
@endif
