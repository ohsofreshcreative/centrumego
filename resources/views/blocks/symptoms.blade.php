<!-- symptoms  -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-symptoms relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="c-wide">
		<div class="c-main text-carbon">
			@if(!empty($g_symptoms['title']))
			<div class="text-center mb-8">
				<h2 class="mb-4">{!! esc_html($g_symptoms['title']) !!}</h2>
				@if(!empty($g_symptoms['txt']))
				<div class="max-w-3xl mx-auto">{!! $g_symptoms['txt'] !!}</div>
				@endif
			</div>
			@endif
			@if(!empty($r_symptoms))
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
				@foreach($r_symptoms as $index => $item)
				<button
					type="button"
					class="symptoms-tab-btn flex items-center gap-3 p-4 radius cursor-pointer transition-all hover:bg-section-light duration-300  text-left focus:outline-none w-full {{ $index === 0 ? 'active bg-section-light' : 'bg-white' }}"
					data-tab="symptom-{{ $index }}">
					@if(!empty($item['icon']))
					<img src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] ?? $item['tab_title'] }}" class="w-8 h-8 object-contain flex-shrink-0" />
					@endif
					<span class=" text-xl">{!! esc_html($item['tab_title']) !!}</span>
				</button>
				@endforeach
			</div>
			<div class="bg-section-light radius p-6 md:p-8 relative ">
				@foreach($r_symptoms as $index => $item)
				<div
					id="symptom-{{ $index }}"
					class="symptoms-tab-content transition-opacity duration-300 {{ $index === 0 ? 'block' : 'hidden opacity-0' }}">
					@if(!empty($item['content_title']))
					<h6 class="mb-4 ">
						{!! esc_html($item['content_title']) !!}
					</h6>
					@endif
					@if(!empty($item['content_txt']))
					<div class="">
						{!! $item['content_txt'] !!}
					</div>
					@endif
				</div>
				@endforeach
			</div>
			@endif
		</div>
	</div>
</section>