@if ($block->preview)
  @include('blocks.preview-extras')
@else
<!--- extras --->
<section
  data-gsap-anim="section"
  @if (!empty($section_id)) id="{{ $section_id }}" @endif
  @class([
    'b-extras relative -smt',
    $sectionClass => filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
  ])>
  <div class="__wrapper c-main">
    <div class="__intro grid grid-cols-1 items-start gap-6 md:grid-cols-2 md:gap-10">
      @if (!empty($g_extras['header']))
        <h2 data-gsap-element="header" class="__title m-0 text-primary">{{ $g_extras['header'] }}</h2>
      @endif
      @if (!empty($g_extras['text']))
        <div data-gsap-element="txt" class="__txt text-lg leading-relaxed">{!! $g_extras['text'] !!}</div>
      @endif
    </div>

    @if (!empty($extras))
      <div class="__grid mt-8 grid grid-cols-1 items-start gap-6 md:grid-cols-2">
        @foreach ($extras as $extra)
          <article data-gsap-element="card" class="__card flex h-full flex-col rounded-3xl bg-white p-6 md:p-8">
            <div class="flex items-start justify-between gap-6">
              @if (!empty($extra['title']))
                <h3 class="__card-title !text-xl leading-snug text-primary">{{ $extra['title'] }}</h3>
              @endif
              @if (!empty($extra['price']))
                <strong class="__price font-header text-3xl font-medium leading-none whitespace-nowrap text-primary">{{ $extra['price'] }}</strong>
              @endif
            </div>

            @if (!empty($extra['description']))
              <details class="__details">
                <summary>Dowiedz się więcej</summary>
                <div class="__details-txt">{!! $extra['description'] !!}</div>
              </details>
            @endif

            @if (!empty($extra['button']))
              <div class="__footer mt-auto pt-6">
                <x-button
                  :href="$extra['button']['url']"
                  variant="secondary"
                  :target="$extra['button']['target'] ?? '_self'">
                  {{ $extra['button']['title'] }}
                </x-button>
              </div>
            @endif
          </article>
        @endforeach
      </div>
    @endif
  </div>
</section>
@endif
