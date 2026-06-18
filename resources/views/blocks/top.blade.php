<!-- top  -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-top relative overflow-hidden pt-20 -mt-[72px] z-10 {{ $section_class }}"
	style="background: linear-gradient(180deg, rgba(244, 249, 255, 0.00) 0%, #F4F9FF 85%), url('{{ $g_top['image']['url'] ?? '' }}') lightgray 50% / cover no-repeat;">

	<div class="__wrapper c-wide relative z-20 w-full h-full min-h-[600px] md:min-h-[650px] flex items-end pt-10 md:pt-0 ">
		<div class="__inside c-main relative w-full">
			<div class="__content w-full  text-center">
				<div>
					@if(!empty($g_top['title']))
					<h1 data-gsap-element="top" class="text-primary font-bold">
						{!! $g_top['title'] !!}
					</h1>
					@endif
					@if(!empty($g_top['txt']))
					<div data-gsap-element="txt" class="mt-4 mb-6 text-carbon font-medium">
						{!! $g_top['txt'] !!}
					</div>
					@endif
				</div>
			</div>
			@if(!empty($r_top))
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-14">
				@foreach($r_top as $card)
				<div class="group relative bg-white px-8 py-8 radius">

					@if(!empty($card['top_image']['url']))
					<div class="flex gap-4 items-center">
						<img src="{{ $card['top_image']['url'] }}"
							alt="{{ $card['top_title'] ?? '' }}"
							class="w-8 h-8 object-contain" />
						@if(!empty($card['top_title']))
						<h6 class="text-primary ">
							{{ $card['top_title'] }}
						</h6>
						@endif
					</div>
					@endif
					@if(!empty($card['top_text']))
					<p class="mt-4 text-carbon text-lg">
						{{ $card['top_text'] }}
					</p>
					@endif
				</div>
				@endforeach
			</div>
			@endif
		</div>
	</div>
</section>