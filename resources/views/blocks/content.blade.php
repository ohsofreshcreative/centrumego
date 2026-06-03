<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-content relative -smt' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>
<div class="blur"></div>
    <div class="__wrapper c-main">
        <div class="__col grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 items-center">
            
            @if (!empty($g_content['image']))
                <div data-gsap-element="img" class="__img order1 w-full">
                    <img class="object-cover w-full h-full  md:aspect-square rounded-2xl" 
                         src="{{ $g_content['image']['url'] }}" 
                         alt="{{ $g_content['image']['alt'] ?? '' }}">
                </div>
            @endif

            <div class="__content order2 flex flex-col justify-center w-full ">
                
                @if(!empty($g_content['header']))
                    <h2 data-gsap-element="header" class=" mb-6">
                        {{ $g_content['header'] }}
                    </h2>
                @endif

                @if(!empty($g_content['txt']))
                    <div data-gsap-element="txt" class="__txt text-carbon">
                        {!! $g_content['txt'] !!}
                    </div>
                @endif

                

                @if (!empty($g_content['button1']) || !empty($g_content['button2']))
                    <div class="inline-buttons m-btn flex gap-4 mt-2">
                        @if (!empty($g_content['button1']))
                            <x-button
                                :href="$g_content['button1']['url']"
                                variant="primary"
                                data-gsap-element="btn">
                                {{ $g_content['button1']['title'] }}
                            </x-button>
                        @endif
 @if (!empty($g_content['button2']))
                            <x-button
                                :href="$g_content['button2']['url']"
                                variant="primary"
                                data-gsap-element="btn"
								class="mt-16">
                                {{ $g_content['button2']['title'] }}
                            </x-button>
                        @endif
                     
                    </div>
                @endif

            </div> 

        </div> 
    </div> 
</section>