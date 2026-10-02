<!-- qualification -->
<section
	data-gsap-anim="section"
	@if (!empty($section_id)) id="{{ $section_id }}" @endif
	@class([
		'b-qualification relative py-16 md:py-24',
		$sectionClass => filled($sectionClass),
		$section_class => filled($section_class),
	])>
	<div class="__wrapper c-main">
		<div class="__layout grid grid-cols-1 items-start gap-10 lg:grid-cols-2 lg:gap-16">
			<div class="__content">
				@if (!empty($g_qualification['eyebrow']))
					<p data-gsap-element="eyebrow" class="__eyebrow !mb-4 text-xs font-bold uppercase leading-none tracking-[0.16em] text-third">
						{{ $g_qualification['eyebrow'] }}
					</p>
				@endif

				@if (!empty($g_qualification['header']))
					<h2 data-gsap-element="header" class="__title mb-6 text-primary">
						{{ $g_qualification['header'] }}
					</h2>
				@endif

				@if (!empty($g_qualification['txt']))
					<div data-gsap-element="txt" class="__txt text-base leading-relaxed text-primary [&_p:last-child]:mb-0 [&_p]:mb-5">
						{!! $g_qualification['txt'] !!}
					</div>
				@endif

				@if (!empty($r_benefits))
					<ul data-gsap-element="benefits" class="__benefits mt-6 space-y-3 p-0">
						@foreach ($r_benefits as $benefit)
							@if (!empty($benefit['text']))
								<li class="flex items-start gap-3 font-semibold leading-relaxed text-primary">
									<span aria-hidden="true" class="text-third">&check;</span>
									<span>{{ $benefit['text'] }}</span>
								</li>
							@endif
						@endforeach
					</ul>
				@endif
			</div>

			<div data-gsap-element="card" class="__price-card rounded-3xl bg-white p-6 b-shadow md:p-8">
				@if (!empty($r_prices))
				<h6 class="mb-4 text-lg font-bold text-primary">Co zawiera etap kwalifikacyjny?</h6>
					<div class="__price-list">
						@foreach ($r_prices as $item)
							<div @class([
								'__price-row flex items-center justify-between gap-5 border-b border-primary-lighter text-sm leading-normal text-primary md:text-base',
								'pb-5 pt-1' => $loop->first,
								'py-5' => ! $loop->first,
							])>
								@if (!empty($item['title']))
									<span>{{ $item['title'] }}</span>
								@endif
								@if (!empty($item['price']))
									<strong class="shrink-0 font-bold text-primary">{{ $item['price'] }}</strong>
								@endif
							</div>
						@endforeach
					</div>
				@endif

				@if (!empty($total_label) || !empty($total_price))
					<div class="__total flex flex-col items-start gap-3 pt-8 font-bold text-primary sm:flex-row sm:items-center sm:justify-between sm:gap-5">
						@if (!empty($total_label))
							<span>{{ $total_label }}</span>
						@endif
						@if (!empty($total_price))
							<strong class="font-header text-4xl font-medium leading-none whitespace-nowrap">{{ $total_price }}</strong>
						@endif
					</div>
				@endif
			</div>
		</div>
	</div>
</section>