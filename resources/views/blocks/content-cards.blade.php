<!--- content -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-content-cards relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 md:grid-cols-[4fr_6fr]  gap-8 lg:gap-20">
			@if (!empty($g_content['image']))
			<div data-gsap-element="img" class="__img  order1">
				<img class="object-cover w-full h-full aspect-[3/2] __img radius-img" src="{{ $g_content['image']['url'] }}" alt="{{ $g_content['image']['alt'] ?? '' }}">
			</div>
			@endif

			<div class="__content order2 grid grid-cols-1 md:grid-cols-[4fr_6fr] gap-8 lg:gap-12">
				@if(!empty($g_content['header']))
    <h2 data-gsap-element="header" class="text-primary">
        {{ $g_content['header'] }}
    </h2>
@endif

				<div class="inline-buttons m-btn">
					@if (!empty($g_content['button1']))
					<x-button
						:href="$g_content['button1']['url']"
						variant="primary"
						class=""
						data-gsap-element="btn">
						{{ $g_content['button1']['title'] }}
					</x-button>
					@endif

					@if (!empty($g_content['button2']))
					<x-button
						:href="$g_content['button2']['url']"
						variant="secondary"
						class=""
						data-gsap-element="btn">
						{{ $g_content['button2']['title'] }}
					</x-button>
					@endif
				</div>



			</div>
@if(!empty($g_content['txt']))
    <div data-gsap-element="txt" class="__txt ">
        {!! $g_content['txt'] !!}
    </div>
@endif

		</div>




		@if(!empty($r_content))
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-14">

    @foreach($r_content as $card)

    <div class="group relative   bg-white pl-8 py-8 radius shadow-sm hover:shadow-md transition-all duration-300 flex flex-col text-left ">

        @if(!empty($card['card_image']['url']))
        <div class="w-16 h-16 mb-5 flex items-center justify-center bg-primary rounded-full text-white overflow-hidden">
            <img src="{{ $card['card_image']['url'] }}"
                 alt="{{ $card['card_title'] }}"
                 class="w-8 h-8 object-contain" />
        </div>
        @endif

        @if(!empty($card['card_title']))
        <h6 class="text-primary mb-4 line-clamp-2">
            {{ $card['card_title'] }}
        </h6>
        @endif

        @if(!empty($card['card_text']))
        <p class="text-gray-600 ">
            {{ $card['card_text'] }}
        </p>
        @endif

        @if(!empty($card['card_link']))
        <a href="{{ $card['card_link']['url'] }}"
           target="{{ $card['card_link']['target'] ?: '_self' }}"
           class="text-primary font-semibold inline-flex items-center gap-2.5 mt-8 transition-colors after:absolute after:inset-0 after:z-10">

            <span>{{ $card['card_link']['title'] }}</span>

            <svg xmlns="http://www.w3.org/2000/svg"
                 width="11"
                 height="11"
                 viewBox="0 0 11 11"
                 fill="none"
                 class="shrink-0 transform group-hover:translate-x-1 transition-transform">

                <path d="M0.190696 1.10947C-0.0631106 0.85566 -0.0637325 0.444215 0.190005 0.190366C0.443846 -0.063475 0.855956 -0.0634751 1.1098 0.190366L9.45471 8.53527L9.45471 1.1949C9.45495 0.836202 9.74578 0.545237 10.1045 0.545107C10.4635 0.545112 10.755 0.836605 10.755 1.19559L10.755 10.1049C10.7549 10.4636 10.4639 10.7543 10.1052 10.7547L1.19523 10.7553C0.836249 10.7553 0.54475 10.4638 0.544746 10.1049C0.544748 9.74588 0.836248 9.45438 1.19523 9.45438L8.5356 9.45437L0.190696 1.10947Z"
                      fill="#FF3437" />
            </svg>
        </a>
        @endif

    </div>

    @endforeach

</div>
@else



@endif
	</div>

</section> 