<!-- breakdown -->
<section
	data-gsap-anim="section"
	@if (!empty($section_id)) id="{{ $section_id }}" @endif
	@class([
		'b-breakdown relative py-16 md:py-24',
		$sectionClass => filled($sectionClass),
		$section_class => filled($section_class),
	])>
	<div class="__wrapper c-main">
		<div class="__intro grid grid-cols-1 items-start gap-6 md:grid-cols-2 md:gap-10">
			<div>
				@if (!empty($g_breakdown['eyebrow']))
					<p data-gsap-element="eyebrow" class="__eyebrow !mb-4 text-xs font-bold uppercase leading-none tracking-wider text-third">
						{{ $g_breakdown['eyebrow'] }}
					</p>
				@endif

				@if (!empty($g_breakdown['header']))
					<h2 data-gsap-element="header" class="__title m-0 text-primary">
						{{ $g_breakdown['header'] }}
					</h2>
				@endif
			</div>

			@if (!empty($g_breakdown['txt']))
				<div data-gsap-element="txt" class="__intro-txt pt-6 text-lg leading-relaxed">
					{!! nl2br(e($g_breakdown['txt'])) !!}
				</div>
			@endif
		</div>

		@if (!empty($r_items))
			<div data-gsap-element="grid-layout" class="__grid mt-8 grid grid-cols-1 gap-4 md:grid-cols-2">
				@foreach ($r_items as $item)
					<article data-gsap-element="card" class="__card rounded-xl bg-white px-6 py-5">
						<div class="__card-top flex items-center justify-between gap-4">
							<span class="__number inline-flex size-10 items-center justify-center rounded-full bg-primary text-lg font-bold leading-none text-white">{{ $loop->iteration }}</span>
							@if (!empty($item['price']))
								<strong class="__card-price font-header text-h5 font-medium leading-none whitespace-nowrap !text-primary">{{ $item['price'] }}</strong>
							@endif
						</div>

						@if (!empty($item['title']))
							<p class="__card-title text-h5 mt-5 mb-3 text-base leading-normal text-primary">{{ $item['title'] }}</p>
						@endif

						@if (!empty($item['calculation']))
							<div class="__calculation mt-2 mb-3 rounded-md bg-section-light px-3 py-2 text-base leading-normal text-primary">{!! nl2br(e($item['calculation'])) !!}</div>
						@endif

						@if (!empty($item['txt']))
							<div class="__card-txt text-xs leading-relaxed text-primary">{!! nl2br(e($item['txt'])) !!}</div>
						@endif
					</article>
				@endforeach
			</div>
		@endif

		@if (!empty($total_label) || !empty($total_price))
			<div data-gsap-element="total" class="__total mt-4 flex flex-col items-start gap-3 rounded-xl bg-primary px-6 py-5 text-md font-bold leading-normal text-white sm:flex-row sm:items-center justify-center sm:gap-5">
				@if (!empty($total_label))
					<span>{{ $total_label }}</span>
				@endif
				@if (!empty($total_price))
					<strong class="font-header text-3xl font-medium leading-none whitespace-nowrap">{{ $total_price }}</strong>
				@endif
			</div>
		@endif
	</div>
</section>