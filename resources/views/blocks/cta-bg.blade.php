<!-- cta  -->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-cta-bg -smt relative py-16 md:py-46 overflow-hidden bg-primary',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
        $background => filled($background) && $background !== 'none',
    ])
>
    @if(!empty($cta_bg['image']['url']))
        <div class="absolute top-0 right-0 h-full w-full md:w-1/2 block z-0 ">
            <img 
                src="{{ $cta_bg['image']['url'] }}" 
                alt="" 
                class="w-full h-full object-cover object-center"
            />
            <div class="absolute inset-0" style="background: linear-gradient(90deg, #0A397C 0%, rgba(10, 57, 124, 0.4) 60%, rgba(10, 57, 124, 0) 100%);"></div>
        </div>
    @endif
    <div class="blur"></div>
	<div class="blur-top"></div>
	<div class="blur-bottom"></div>
    <div class="c-main px-6 md:px-12 relative z-10">
        <div class="__content w-full md:max-w-2xl flex flex-col gap-6 ">
            <div class="__text">
                @if (!empty($cta_bg['header']))
                <h2 data-gsap-element="header" class="mb-6 text-white">
                    {{ $cta_bg['header'] }}
                </h2>
                @endif

                @if (!empty($cta_bg['txt']))
                <div data-gsap-element="txt" class="text-white text-2lg font-header">
                    {!! $cta_bg['txt'] !!}
                </div>
                @endif
            </div>
            @if (!empty($cta_bg['button']['url']) || !empty($cta_bg['button2']['url']))
            <div class="inline-buttons m-btn flex flex-wrap gap-4">
                @if (!empty($cta_bg['button']['url']))
                <x-button :href="$cta_bg['button']['url']" variant="third" data-gsap-element="btn">
                    {{ $cta_bg['button']['title']}}
                </x-button>
                @endif
                @if (!empty($cta_bg['button2']['url']))
                <x-button :href="$cta_bg['button2']['url']" variant="secondary" data-gsap-element="btn-secondary" class="btn">
                    {{ $cta_bg['button2']['title'] }}
                </x-button>
                @endif

            </div>
            @endif
        </div> 
    </div>
</section>