<!-- addon -->
<section
	data-gsap-anim="section"
	@if (!empty($section_id)) id="{{ $section_id }}" @endif
	@class([
		'b-addon relative py-16 md:py-20',
		$sectionClass => filled($sectionClass),
		$section_class => filled($section_class),
	])>
	<div class="__wrapper c-main">
		<div class="__layout grid grid-cols-1 gap-10 lg:grid-cols-2 items-center lg:gap-16">
			<div class="__content">
				@if (!empty($g_addon['label']))
					<span data-gsap-element="label" class="__label mb-6 inline-flex rounded-full bg-white px-4 py-2 text-xs font-bold leading-normal text-third">
						{{ $g_addon['label'] }}
					</span>
				@endif

				@if (!empty($g_addon['header']))
					<h2 data-gsap-element="header" class="__title mb-6 text-primary">
						{{ $g_addon['header'] }}
					</h4>
				@endif

				@if (!empty($g_addon['txt']))
					<div data-gsap-element="txt" class="__txt text-base leading-relaxed text-primary [&_p:last-child]:mb-0 [&_p]:mb-5">
						{!! $g_addon['txt'] !!}
					</div>
				@endif
			</div>

			@if (!empty($price_label) || !empty($price))
				<div data-gsap-element="card" class="__price-card flex flex-col items-center justify-center gap-4 rounded-3xl bg-white p-6 text-center md:p-8">
					@if (!empty($price_label))
						<span class="__price-label text-sm leading-normal">{{ $price_label }}</span>
					@endif
					@if (!empty($price))
						<strong class="__price font-header text-5xl font-medium leading-none whitespace-nowrap !text-primary md:text-6xl">{{ $price }}</strong>
					@endif
				</div>
			@endif
		</div>
	</div>
</section>