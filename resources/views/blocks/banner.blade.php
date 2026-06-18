@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- banner  -->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    class="b-banner relative overflow-visible {{ $sectionClass }} {{ $section_class }}">

    <div class="w-full grid grid-cols-1 lg:grid-cols-2 items-stretch overflow-visible">

        <div class="__content relative flex flex-col justify-center items-start z-20 lg:py-2 px-4 sm:px-6 lg:pr-12 w-full box-border mr-auto ml-0 lg:ml-auto max-w-[620px] my-10 lg:my-0 ">
            <div class="w-full text-left">
                <h1 data-gsap-element="header" class="text-primary">
                    {!! $g_banner['title'] !!}
                </h1>
                <div data-gsap-element="txt" class="text-lg text-carbon mt-6">
                    {!! $g_banner['txt'] !!}
                </div>
                
                @if (!empty($g_banner['button1']) || !empty($g_banner['button2']))
                    <div class="inline-buttons m-btn flex flex-wrap gap-4 mt-8">
                        @if (!empty($g_banner['button1']))
                            <x-button 
                                :href="$g_banner['button1']['url']" 
                                variant="third" 
                                data-gsap-element="btn"
                                :target="$g_banner['button1']['target'] ?? '_self'">
                                {{ $g_banner['button1']['title'] }}
                            </x-button>
                        @endif

                        @if (!empty($g_banner['button2']))
                            <x-button 
                                :href="$g_banner['button2']['url']" 
                                variant="secondary" 
                                data-gsap-element="btn"
                                :target="$g_banner['button2']['target'] ?? '_self'">
                                {{ $g_banner['button2']['title'] }}
                            </x-button>
                        @endif
                    </div>
                @else
                    <a href="#banner-next"
                        aria-label="Przewiń do następnej sekcji"
                        class="js-banner-next bg-third hover:bg-third-hover transition-all rounded-full w-16 h-16 flex items-center justify-center cursor-pointer animate-bounce mt-8">
                        <img src="/wp-content/uploads/2026/06/arrow-down.svg" alt="" />
                    </a>
                @endif
            </div>
        </div>

        <div class="__img relative z-10 overflow-visible w-full min-h-[300px] lg:min-h-[650px] px-4 sm:px-6 lg:px-0 lg:mt-4 flex items-center justify-center">
            @if(!empty($g_banner['image']['url']))
                <img src="{{ $g_banner['image']['url'] }}" 
                     alt="{{ $g_banner['image']['alt'] ?? '' }}" 
                     class="w-full h-full object-cover object-center rounded-2xl mt-0 lg:mt-2 lg:absolute lg:inset-y-0 lg:w-full" />
            @endif
        </div>

    </div>
</section>