@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp

<!--- reviews --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-reviews relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main">
		<div class="__content">
			<div data-gsap-element="header" class="__wrapper block w-full md:w-1/2 pb-10">
				<h2 class="text-primary">{{ $g_reviews['title']}}</h2>
				<div class="">{!! $g_reviews['text'] !!}</div>
			</div>
			<div class="swiper reviews-swiper !overflow-visible">
				<div data-gsap-element="swiper" class="swiper-wrapper ">
					@foreach($r_reviews as $card)
					<div class="swiper-slide h-full items-stretch flex flex-col">
						<div class="__card relative bg-white radius px-8 py-8 h-full">
							<div class="relative z-10 flex flex-col gap-4 h-full ">
								@if(!empty($card['txt']))
								<div class="review-content-wrapper ">
									<div class="__txt line-clamp-6 text-carbon leading-6 ">{!! $card['txt'] !!}
									</div>
									<button class="btn-more underline text-[#8A8B8F] font-bold mt-2 cursor-pointer">Zobacz całość</button>
								</div>
								@endif

								<b class="font-header text-xl mt-auto">{{ $card['name'] }}</b>
								<div class="flex items-center gap-4 mt-auto">
									<img class="max-w-1/2" src="/wp-content/uploads/2026/05/stars.svg" />

									@php
									$iconUrl = '/wp-content/uploads/2026/05/google.svg';
									$targetUrl = $global_link_google ?? '';

									if (($card['source_platform'] ?? 'google') === 'znanylekarz') {
									$iconUrl = '/wp-content/uploads/2026/05/znanylekarz.svg';
									$targetUrl = $global_link_znanylekarz ?? '';
									}
									@endphp

									@if(!empty($targetUrl))
									<a href="{{ $targetUrl }}"
										target="_blank"
										rel="noopener noreferrer"
										title="Zobacz profil z opiniami"
										class="ml-auto inline-block transition-transform hover:scale-105">

										<img src="{{ $iconUrl }}"
											alt="{{ $card['source_platform'] ?? 'source' }}"
											class="h-6 w-auto object-contain" />
									</a>
									@else
									<img src="{{ $iconUrl }}" alt="Source" class="ml-auto h-6 w-auto object-contain" />
									@endif

								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div data-gsap-element="arrows" class="mt-10 flex justify-start items-center gap-4 pointer-events-none">
					<div class="__prev rounded-full bg-third h-14 w-14 flex items-center justify-center pointer-events-auto cursor-pointer transition-all duration-400 hover:scale-105 hover:bg-third-100">
						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
							<path d="M0.270429 5.31498C0.270706 5.31469 0.270937 5.31435 0.27126 5.31406L5.08882 0.281803C5.44973 -0.0951806 6.03348 -0.0937777 6.39273 0.285093C6.75194 0.663916 6.75055 1.27664 6.38964 1.65367L3.15514 5.03226L12.078 5.03226C12.5872 5.03226 13 5.46552 13 6C13 6.53448 12.5872 6.96774 12.078 6.96774L3.15518 6.96774L6.3896 10.3463C6.75051 10.7234 6.75189 11.3361 6.39269 11.7149C6.03344 12.0938 5.44963 12.0951 5.08877 11.7182L0.271213 6.68594C0.270936 6.68565 0.270706 6.68531 0.270383 6.68502C-0.0907122 6.30673 -0.08956 5.69202 0.270429 5.31498Z" fill="#FFF" />
						</svg>
					</div>
					<div class="__next rounded-full bg-third h-14 w-14 flex items-center justify-center pointer-events-auto cursor-pointer transition-all duration-300 hover:scale-105 hover:bg-third-100">
						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
							<path d="M12.7296 5.31498C12.7293 5.31469 12.7291 5.31435 12.7287 5.31406L7.91118 0.281803C7.55027 -0.0951806 6.96652 -0.0937777 6.60727 0.285093C6.24806 0.663916 6.24945 1.27664 6.61036 1.65367L9.84486 5.03226L0.921985 5.03226C0.412773 5.03226 0 5.46552 0 6C0 6.53448 0.412773 6.96774 0.921985 6.96774L9.84482 6.96774L6.6104 10.3463C6.24949 10.3463 6.24811 11.3361 6.60731 11.7149C6.96657 12.0938 7.55037 12.0951 7.91123 11.7182L12.7288 6.68594C12.7291 6.68565 12.7293 6.68531 12.7296 6.68502C13.0907 6.30673 13.0896 5.69202 12.7296 5.31498Z" fill="#FFF" />
						</svg>
					</div>
				</div>

			</div>
			<!--- swiper end --->

			<!-- <div class="mt-10">
				<img src="/wp-content/uploads/2025/12/google-1.svg" />
				<a class="!underline">Sprawdź wszystkie opinie</a> 
			</div> -->
		</div>
	</div>
	<div id="review-popup" class="review-popup fixed inset-0 bg-black/50 bg-opacity-70 z-[999] flex items-center justify-center p-4 hidden">
		<div class="review-popup__content bg-white rounded-lg shadow-xl p-8 md:p-12 max-w-3xl w-full relative">
			<button class="review-popup__close absolute top-4 right-4 text-gray-500 hover:text-gray-800 transition-colors">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
			<div id="review-popup-text" class="prose max-w-none mb-4">
				{{-- Treść opinii zostanie wstawiona tutaj --}}
			</div>
			<div class="flex items-center gap-4">
				<img src="/wp-content/uploads/2026/05/stars.svg" class="h-5" />
				<b id="review-popup-author" class="font-header text-xl ml-auto">
					{{-- Nazwa autora zostanie wstawiona tutaj --}}
				</b>
			</div>
		</div>
	</div>
</section>