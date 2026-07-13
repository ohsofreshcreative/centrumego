<!--- partnership --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-partnership relative -smt -smb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])> 

	<div class="__wrapper c-main">
		<div class="grid grid-cols-1 md:grid-cols-[4fr_6fr]  items-start gap-10 z-10 relative">

			<div class="__content  py-0 lg:sticky lg:top-36 z-20 ">
				@if (!empty($g_partnership['title']))
				<h2 data-gsap-element="title" class="text-h2 text-primary mb-6 ">{{ $g_partnership['title'] }}</h2>
				@endif
				@if(!empty($g_partnership['image']['url']))
				<div data-gsap-element="" imgclass="overflow-visible w-10 h-10 max-h-[300px]">
					<img class=" object-cover max-h-80 w-full rounded-2xl" src="{{ $g_partnership['image']['url'] }}" alt="{{ $g_partnership['image']['alt'] ?? '' }}" loading="lazy" decoding="async">
				</div>
				@endif
				@if (!empty($g_partnership['txt']))
				<div data-gsap-element="txt" class="mt-6 text-xl text-carbon ">
					{!! $g_partnership['txt'] !!}
				</div>
				@endif
				@if (!empty($g_partnership['button']))
				<a data-gsap-element="btn" class="btn-third btn m-btn second-btn mt-6 inline-block" href="{{ $g_partnership['button']['url'] }}">{{ $g_partnership['button']['title'] }}</a>
				@endif
			</div>
			<div class=" w-full z-10 relative lg:pt-0">
				@if(!empty($r_partnership))
				<div class="__cards-repeater flex flex-col gap-5 w-full h-full relative z-10 ">
					@foreach($r_partnership as $card)

					<div data-gsap-element="stagger" class="flex-grow p-6 md:p-8 pr-6 md:pr-16 flex flex-col justify-center bg-white radius">
						@if(!empty($card['card_image']))
						<div class="mb-6">
							<img src="{{ $card['card_image']['url'] }}" alt="{{ $card['card_title'] }}" class=" inset-0  h-14 w-14 object-cover  ">
						</div>
						@endif
						<h4 class="text-primary mb-2 md:mb-5 tracking-normal leading-tight">
							{{ $card['card_title'] }}
						</h4>
						@if(!empty($card['card_text']))
						<p class="text-lg text-carbon leading-snug m-0">
							{{ $card['card_text'] }}
						</p>
						@endif

						<div class="flex flex-wrap gap-2 mt-6">
	@if(!empty($card['card_text_bottom']))
    <div class="flex items-start  gap-2 ">
        
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="19" viewBox="0 0 22 19" fill="none" class="shrink-0 mt-1">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20 6.93182C20 6.50758 19.6441 6.13636 19.1711 6.13636L8.68451 6.13636C8.37941 6.13636 8.10481 5.95163 7.98981 5.66911C7.87481 5.38659 7.94241 5.06257 8.16071 4.84956L9.87161 3.18015C10.2955 2.76658 10.2599 2.09107 9.78711 1.72206C9.41751 1.43353 8.88951 1.42516 8.51001 1.70285L4.28071 4.79787C3.29361 5.5202 2.89381 5.81784 2.58731 6.16514C2.10081 6.71637 1.76361 7.3753 1.60441 8.0822C1.50431 8.5264 1.50001 9.0132 1.50001 10.2181C1.50001 11.344 1.50041 12.1525 1.54211 12.7915C1.58341 13.4241 1.66301 13.8384 1.79751 14.1804C2.25261 15.3373 3.19241 16.258 4.39011 16.7066C4.74661 16.8401 5.17701 16.9183 5.82831 16.9588C6.48541 16.9997 7.31611 17 8.46931 17H11.0719C11.7469 17 12.3032 16.5241 12.4091 15.9023L12.4692 15.5495C12.4786 15.4942 12.4347 15.4091 12.329 15.4091H11.2763C10.8621 15.4091 10.5263 15.0733 10.5263 14.6591C10.5263 14.2449 10.8621 13.9091 11.2763 13.9091H12.329C13.0927 13.9091 13.6842 13.3072 13.6842 12.5985C13.6842 12.4588 13.564 12.3182 13.3816 12.3182H12.329C11.9147 12.3182 11.579 11.9824 11.579 11.5682C11.579 11.154 11.9147 10.8182 12.329 10.8182H13.3816C14.0314 10.8182 14.5614 10.379 14.7005 9.8113C14.7138 9.757 14.7099 9.6353 14.5967 9.4137L14.5015 9.2273H12.329C11.9147 9.2273 11.579 8.8915 11.579 8.4773C11.579 8.0631 11.9147 7.7273 12.329 7.7273L19.1711 7.7273C19.6441 7.7273 20 7.3561 20 6.93182ZM16.1297 9.2273H19.1711C20.4421 9.2273 21.5 8.2146 21.5 6.93182C21.5 5.64899 20.4421 4.63636 19.1711 4.63636L10.5271 4.63636L10.9192 4.25377C11.9967 3.2024 11.8954 1.46484 10.7101 0.539641C9.81111 -0.162109 8.54451 -0.181089 7.62421 0.492351L3.31851 3.64322C2.43141 4.29225 1.89001 4.68834 1.46271 5.17257C0.811005 5.91092 0.356305 6.7973 0.141105 7.7526C-0.000194669 8.3796 -9.46377e-05 9.0431 5.3151e-06 10.1228L5.30977e-06 10.2447C5.26197e-06 11.3383 6.66082e-06 12.1957 0.0453066 12.8893C0.0914066 13.595 0.186606 14.1829 0.401706 14.7296C1.01561 16.2902 2.27661 17.5167 3.86401 18.1113C4.41811 18.3188 5.01501 18.4111 5.73521 18.4559C6.44431 18.5 7.32151 18.5 8.44381 18.5H11.0719C12.455 18.5 13.6553 17.5194 13.8878 16.1541L13.9479 15.8013C13.9983 15.5054 13.9655 15.2203 13.869 14.9651C14.6568 14.4679 15.1842 13.5993 15.1842 12.5985C15.1842 12.3179 15.1193 12.0544 15.0041 11.8205C15.5703 11.4352 15.9897 10.8526 16.1574 10.1681C16.2406 9.8283 16.2079 9.5063 16.1297 9.2273Z" fill="#FF3437" />
        </svg>
        
        <span class="text-lg text-secondary font-semibold m-0">
            {{ $card['card_text_bottom'] }}
        </span>

    </div>
    @endif


						</div>
					</div>

					@endforeach
				</div>
				@endif

			</div>

		</div>

	</div>

</section>