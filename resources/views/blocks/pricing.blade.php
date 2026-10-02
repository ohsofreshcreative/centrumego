<!-- pricing -->
<section
	data-gsap-anim="section"
	@if (!empty($section_id)) id="{{ $section_id }}" @endif
	@class([
		'b-pricing relative py-16 md:py-24',
		$sectionClass => filled($sectionClass),
		$section_class => filled($section_class),
	])>
	<div class="__wrapper c-main">
		@if (!empty($g_pricing['header']))
			<h2 data-gsap-element="header" class="__header mb-8 text-center text-primary md:mb-12">
				{{ $g_pricing['header'] }}
			</h2>
		@endif

		@if (!empty($r_plans))
			<div data-gsap-element="grid-layout" class="__grid grid grid-cols-1 gap-6 md:grid-cols-2">
				@foreach ($r_plans as $plan)
					<article
						data-gsap-element="card"
						@class([
							'__plan relative flex flex-col rounded-3xl border-2 border-transparent bg-white p-6 md:p-8',
							'border-primary' => !empty($plan['recommended']),
						])>
						<div class="flex justify-between items-center min-h-8">
							@if (!empty($plan['label']))
								<p class="__label mb-6 text-xs font-bold uppercase leading-none tracking-wider text-third">{{ $plan['label'] }}</p>
							@endif
							@if (!empty($plan['recommended']))
								<span class="__recommended rounded-full bg-third px-4 py-2 text-xs font-bold leading-none text-white">Polecane</span>
							@endif
						</div>

						@if (!empty($plan['title']))
							<h5 class="__title mb-6 text-2xl leading-tight text-primary md:text-3xl">{{ $plan['title'] }}</h5>
						@endif

						@if (!empty($plan['r_features']))
							<div class="__features mb-6">
								@foreach ($plan['r_features'] as $feature)
									<div @class([
										'__feature flex items-start justify-between gap-4 text-sm leading-relaxed text-primary',
										'mt-3' => ! $loop->first,
									])>
										@if (!empty($feature['label']))
											<span>{{ $feature['label'] }}</span>
										@endif
										@if (!empty($feature['price']))
											<strong @class([
												'shrink-0 whitespace-nowrap text-right font-bold',
												!empty($feature['included']) ? 'text-third' : 'text-primary',
											])>
												{{ $feature['price'] }}
											</strong>
										@endif
									</div>
								@endforeach
							</div>
						@endif

						<div class="__footer mt-8 flex flex-col items-start gap-6 border-t border-primary-lighter pt-6 sm:flex-row sm:items-center sm:justify-between">
							@if (!empty($plan['total_price']))
								<strong class="__total-price font-header text-4xl font-medium leading-none whitespace-nowrap text-primary">{{ $plan['total_price'] }}</strong>
							@endif
							@if (!empty($plan['button']))
								<x-button
									:href="$plan['button']['url']"
									variant="third"
									data-gsap-element="btn"
									:target="$plan['button']['target'] ?? '_self'">
									{{ $plan['button']['title'] }}
								</x-button>
							@endif
						</div>
					</article>
				@endforeach
			</div>
		@endif
	</div>
</section>