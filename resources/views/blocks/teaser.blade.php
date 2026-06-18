<!-- teaser  -->
@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';

$bgImageUrl = !empty($g_teaser['image']['url']) ? $g_teaser['image']['url'] : '';
@endphp

<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    class="b-teaser relative -smt {{ $sectionClass }} {{ $section_class }}">

    <div class="c-main relative radius overflow-hidden py-6 px-6 md:px-16 z-10 bg-secondary-100">
        <div class="blur"></div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center"> 
            
            <div class="__content w-full flex flex-col items-start">
                <div class="__text w-full">
                    @if(!empty($g_teaser['title']))
                    <h5 data-gsap-element="header" class="text-primary mb-4 text-3xl md:text-4xl font-bold leading-tight">
                        {!! $g_teaser['title'] !!}
                    </h5>
                    @endif

                    @if(!empty($g_teaser['txt']))
                    <div data-gsap-element="txt" class="!text-carbon text-lg mb-8">
                        {!! $g_teaser['txt'] !!}
                    </div>
                    @endif
                </div>

                @if (!empty($g_teaser['button1']))
                <div class="flex w-full">
                    <a data-gsap-element="button" class="btn-primary btn"
                        href="{{ $g_teaser['button1']['url'] }}"
                        target="{{ $g_teaser['button1']['target'] ?? '_self' }}">
                        {{ $g_teaser['button1']['title'] }}
                    </a>
                </div>
                @endif
            </div>

            @if (!empty($g_teaser['image']))
            <div data-gsap-element="img" class="__img order-1 md:order-none w-full h-full min-h-[350px] md:min-h-[450px]">
                <img class="w-full h-full rounded-2xl object-cover aspect-[4/3] md:aspect-[3/2]"
                    src="{{ $g_teaser['image']['url'] }}"
                    alt="{{ $g_teaser['image']['alt'] ?? '' }}">
            </div>
            @endif
        </div>
    </div>
</section>