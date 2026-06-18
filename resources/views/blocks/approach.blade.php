<!-- Approach -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-approach relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="blur"></div>
	<div class="blur-right"></div>
	<div class="__wrapper c-main relative">
			@if(!empty($g_approach['header']))
			<h2 data-gsap-element="header" class="text-primaryv text-center">
				{{ $g_approach['header'] }}
			</h2>
			@endif
		
		@if(!empty($r_approach))
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-14">
			@foreach($r_approach as $card)
			<div class="relative bg-white px-8 py-8 radius text-left ">
				@if(!empty($card['card_image']['url']))
				<div class="w-16 h-16 mb-5 flex items-center justify-center bg-primary rounded-full text-white relative overflow-visible">
					<span class="absolute top-1 left-1 w-3 h-3 bg-[#037AC2] rounded-full"></span>
					<img src="{{ $card['card_image']['url'] }}"
						alt="{{ $card['card_title'] }}"
						class="w-8 h-8 object-contain" />
				</div>
				@endif
				@if(!empty($card['card_title']))
				<h6 class="text-primary mb-4 ">
					{{ $card['card_title'] }}
				</h6>
				@endif
				@if(!empty($card['card_text']))
				<p class="text-gray-600 ">
					{{ $card['card_text'] }}
				</p>
				@endif
			
			</div>
			@endforeach
		</div>
		@endif
	</div>
</section>