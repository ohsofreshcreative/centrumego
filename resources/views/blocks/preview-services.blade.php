<!--- services preview --->

<div class="acf-preview" @if (!empty($nomt)) data-acf-nomt @endif>
  <div class="acf-preview__meta">
    <div class="acf-preview__heading">
      <div class="acf-preview__title">Usługi i ceny</div>
      <span class="acf-preview__slug">acf/services</span>
    </div>
  </div>
  <div class="acf-preview__content">
    <div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2">
      @foreach (array_slice((array) $r_packages, 0, 2) as $package)
        @if (!empty($package['title']))
          <div class="acf-preview__card">
            <p class="text-h6">{{ $package['title'] }}</p>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</div>
