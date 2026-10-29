@if ($block->preview)
  @include('blocks.preview-services')
@else
<!--- services --->
<section
  data-gsap-anim="section"
  @if (!empty($section_id)) id="{{ $section_id }}" @endif
  @class([
    'b-services relative -smt',
    $sectionClass => filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
  ])>
  <div class="__wrapper c-main">

    {{-- Pakiety pierwszej konsultacji --}}
    @if (!empty($r_packages))
      <div class="__section __section--packages">
        @if (!empty($g_packages['header']))
          <h2 data-gsap-element="header" class="__header mb-8 text-center text-primary md:mb-12">{{ $g_packages['header'] }}</h2>
        @endif

        <div class="__grid grid grid-cols-1 items-start gap-6 md:grid-cols-2">
          @foreach ($r_packages as $package)
            <article
              data-gsap-element="card"
              @class([
                '__package relative flex h-full flex-col rounded-3xl border-2 border-transparent bg-white p-6 md:p-8',
                '__package--recommended border-third' => !empty($package['recommended']),
              ])>
              <div class="flex min-h-8 items-center justify-between gap-4">
                @if (!empty($package['label']))
                  <p class="__label text-xs font-bold uppercase leading-none tracking-wider text-third">{{ $package['label'] }}</p>
                @endif
                @if (!empty($package['recommended']))
                  <span class="__recommended rounded-full bg-third px-4 py-2 text-xs font-bold leading-none text-white">Polecany</span>
                @endif
              </div>

              <div class="__top mt-6 flex items-end justify-between gap-4">
                @if (!empty($package['title']))
                  <h3 class="__title !text-3xl leading-tight text-primary">{{ $package['title'] }}</h3>
                @endif
                @if (!empty($package['price']))
                  <strong class="__price font-header text-5xl font-medium leading-none whitespace-nowrap text-primary">{{ $package['price'] }}</strong>
                @endif
              </div>

              @if (!empty($package['r_features']))
                <ul class="__features mt-6 border-t border-primary-lighter pt-6">
                  @foreach ($package['r_features'] as $feature)
                    @if (!empty($feature['text']))
                      @php
                        [$feature_label, $feature_price] = array_pad(explode(': ', $feature['text'], 2), 2, null);
                      @endphp
                      <li @class([
                        '__feature flex items-start justify-between gap-4 text-sm leading-relaxed text-primary',
                        'mt-3' => ! $loop->first,
                        '__feature--off' => empty($feature_price),
                      ])>
                        <span>{{ $feature_label }}</span>
                        @if (!empty($feature_price))
                          <strong @class([
                            'shrink-0 text-right font-bold',
                            str_contains($feature_price, 'GRATIS') ? 'text-third' : 'text-primary',
                          ])>{{ $feature_price }}</strong>
                        @endif
                      </li>
                    @endif
                  @endforeach
                </ul>
              @endif

              @if (!empty($package['description']))
                <details class="__details">
                  <summary>Dowiedz się więcej</summary>
                  <div class="__details-txt">{!! $package['description'] !!}</div>
                </details>
              @endif

              @if (!empty($package['button']))
                <div class="__footer mt-auto pt-8">
                  <x-button
                    :href="$package['button']['url']"
                    :variant="!empty($package['recommended']) ? 'third' : 'secondary'"
                    class="w-full"
                    :target="$package['button']['target'] ?? '_self'">
                    {{ $package['button']['title'] }}
                  </x-button>
                </div>
              @endif
            </article>
          @endforeach
        </div>
      </div>
    @endif

    {{-- Co otrzymujesz w obu pakietach --}}
    @if (!empty($g_benefits['header']) || !empty($r_benefits))
      <div class="__section __section--benefits !mt-20">
        <div class="__intro grid grid-cols-1 items-start gap-6 md:grid-cols-2 md:gap-10">
          @if (!empty($g_benefits['header']))
            <h2 data-gsap-element="header" class="__title m-0 text-primary">{{ $g_benefits['header'] }}</h2>
          @endif
          @if (!empty($g_benefits['text']))
            <div data-gsap-element="txt" class="__txt text-lg leading-relaxed">{!! $g_benefits['text'] !!}</div>
          @endif
        </div>

        @if (!empty($r_benefits))
          <div class="__grid mt-8 grid grid-cols-1 gap-4 md:grid-cols-3">
            @foreach ($r_benefits as $benefit)
              @if (!empty($benefit['title']))
                <div data-gsap-element="card" class="__benefit flex items-center gap-4 rounded-xl bg-white px-6 py-5">
                  <span class="__icon inline-flex size-10 shrink-0 items-center justify-center rounded-full bg-primary text-white">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8.5 6.5 12 13 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <p class="text-base font-bold leading-normal text-primary">{{ $benefit['title'] }}</p>
                </div>
              @endif
            @endforeach
          </div>
        @endif
      </div>
    @endif
  </div>
</section>
@endif
