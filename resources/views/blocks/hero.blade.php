<!-- hero --->



<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-hero relative pt-4 overflow-visible min-h-[600px] flex flex-col justify-between ' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>

    <div class="w-full grid grid-cols-1 lg:grid-cols-[4fr_6fr] items-stretch overflow-visible ">

        <div class="__content relative flex flex-col justify-center z-20 pt-16 pb-16 lg:py-0 px-4 sm:px-6 lg:pl-8 lg:pr-12 w-full box-border ml-auto max-w-[620px]">

            <div class="w-full">
                <h1 data-gsap-element="header" class="m-header font-bold text-primary mb-6">
                    {{ $g_hero['title'] }}
                </h1>

                <div data-gsap-element="txt" class="text-carbon mb-8 text-base leading-relaxed">
                    {!! $g_hero['txt'] !!}
                </div>

                <div class="inline-buttons m-btn flex flex-wrap gap-4">
                    @if (!empty($g_hero['button1']))
                    <x-button :href="$g_hero['button1']['url']" variant="primary" data-gsap-element="btn">
                        {{ $g_hero['button1']['title'] }}
                    </x-button>
                    @endif

                    @if (!empty($g_hero['button2']))
                    <x-button :href="$g_hero['button2']['url']" variant="secondary" data-gsap-element="btn">
                        {{ $g_hero['button2']['title'] }}
                    </x-button>
                    @endif
                </div>
            </div>

        </div>

        <div class="__img relative z-10 overflow-visible w-full min-h-[450px] lg:min-h-[650px] ">
            <img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] }}" class="w-full h-full object-cover object-center absolute inset-0 rounded-2xl" />
        </div>

    </div>


<!-- repeater -->

	@if(!empty($r_hero))
	<div class="w-full c-main z-30 -mt-15 lg:-mt-24 pb-12 h-full">
		<div class="grid grid-cols-1 -mt-15 md:grid-cols-2 lg:grid-cols-4 gap-6 items-start">

			<div class="pr-4 flex flex-col  h-full py-4 lg:py-0">
				@if(!empty($title))
				<h2 class="text-primary mb-3 tracking-tighter[-1px]">
					{{ $title }}
				</h2>
				@endif
				<p class="text-carbon text-base leading-normal">
					{{ $desc }}
				</p>
			</div>

			@foreach($r_hero as $tile)
			<div class="{{ $tile['tile_bg'] }} py-9 px-11 flex flex-col justify-between rounded-lg h-full ">
				<div>
					@if(!empty($tile['icon']))
					<img src="{{ $tile['icon']['url'] }}" alt="{{ $tile['icon']['alt'] }}" class="w-12 h-12 mb-6 object-contain" />
					@endif

					@if(!empty($tile['title_link']))
					<h4 class="mb-4">
						<a href="{{ $tile['title_link']['url'] }}" target="{{ $tile['title_link']['target'] ?: '_self' }}" class="hover:underline">
							{{ $tile['title_link']['title'] }}
						</a>
					</h4>
					@endif

					@if(!empty($tile['txt']))
					<p class="text-white mb-4">{{ $tile['txt'] }}</p>
					@endif
				</div>

			@if(!empty($tile['button']))
    <a href="{{ $tile['button']['url'] }}"
        target="{{ $tile['button']['target'] ?: '_self' }}"
        class="  hover:opacity-80 mt-4 inline-flex items-center gap-3">
        
        <span>{{ $tile['button']['title'] }}</span>

        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none" class="shrink-0">
            <path d="M0.190696 1.10947C-0.0631106 0.85566 -0.0637325 0.444215 0.190005 0.190366C0.443846 -0.063475 0.855956 -0.0634751 1.1098 0.190366L9.45471 8.53527L9.45471 1.1949C9.45495 0.836202 9.74578 0.545237 10.1045 0.545107C10.4635 0.545112 10.755 0.836605 10.755 1.19559L10.755 10.1049C10.7549 10.4636 10.4639 10.7543 10.1052 10.7547L1.19523 10.7553C0.836249 10.7553 0.54475 10.4638 0.544746 10.1049C0.544748 9.74588 0.836248 9.45438 1.19523 9.45438L8.5356 9.45437L0.190696 1.10947Z" fill="#FF3437" />
        </svg>
    </a>
@endif
			</div>
			@endforeach

		</div>
	</div>
	@endif

</section>