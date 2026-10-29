<!--- prepare preview --->

<div class="acf-preview" @if (!empty($nomt)) data-acf-nomt @endif>
  <div class="acf-preview__meta">
    <div class="acf-preview__heading">
      <div class="acf-preview__title">Przygotowanie do wizyty</div>
      <span class="acf-preview__slug">acf/prepare</span>
    </div>
  </div>
  <div class="acf-preview__content">
    @if (!empty($g_prepare['header']))
      <p class="text-h5">{{ $g_prepare['header'] }}</p>
    @endif
    @if (!empty($g_prepare['text']))
      <div>{!! $g_prepare['text'] !!}</div>
    @endif
    @if (!empty($g_prepare['note']))
      <p>{{ $g_prepare['note'] }}</p>
    @endif
    @if (!empty($g_prepare['button']['title']))
      <div class="acf-preview-actions">
        <span class="acf-preview-button">{{ $g_prepare['button']['title'] }}</span>
      </div>
    @endif
  </div>
</div>
