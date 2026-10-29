<!--- extras preview --->

<div class="acf-preview" @if (!empty($nomt)) data-acf-nomt @endif>
  <div class="acf-preview__meta">
    <div class="acf-preview__heading">
      <div class="acf-preview__title">Pozostałe usługi</div>
      <span class="acf-preview__slug">acf/extras</span>
    </div>
  </div>
  <div class="acf-preview__content">
    @if (!empty($g_extras['header']))
      <p class="text-h5">{{ $g_extras['header'] }}</p>
    @endif
    @if (!empty($g_extras['text']))
      <div>{!! $g_extras['text'] !!}</div>
    @endif
    <div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2">
      @foreach (array_slice((array) ($extras ?? []), 0, 6) as $item)
        <div class="acf-preview__card flex flex-col gap-2">
          @if (!empty($item['title']))
            <p class="text-h6">{{ $item['title'] }}</p>
          @endif
          @if (!empty($item['price']))
            <p>{{ $item['price'] }}</p>
          @endif
        </div>
      @endforeach
    </div>
    @if (count((array) ($extras ?? [])) > 6)
      <p>+ {{ count((array) ($extras ?? [])) - 6 }} kolejnych elementów</p>
    @endif
  </div>
</div>
