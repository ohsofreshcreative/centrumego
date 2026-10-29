<!--- nextsteps preview --->

<div class="acf-preview" @if (!empty($nomt)) data-acf-nomt @endif>
  <div class="acf-preview__meta">
    <div class="acf-preview__heading">
      <div class="acf-preview__title">Co dalej</div>
      <span class="acf-preview__slug">acf/nextsteps</span>
    </div>
  </div>
  <div class="acf-preview__content">
    @if (!empty($g_nextsteps['header']))
      <p class="text-h5">{{ $g_nextsteps['header'] }}</p>
    @endif
    <div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-3">
      @foreach (array_slice((array) ($nextsteps ?? []), 0, 6) as $item)
        <div class="acf-preview__card flex flex-col gap-2">
          @if (!empty($item['text']))
            <p>{{ $item['text'] }}</p>
          @endif
        </div>
      @endforeach
    </div>
    @if (!empty($g_program['header']))
      <p class="text-h6">{{ $g_program['header'] }}</p>
    @endif
    @if (!empty($g_program['text']))
      <div>{!! $g_program['text'] !!}</div>
    @endif
  </div>
</div>
