<!-- about -->

<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-about relative -smt -smb' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>
<div class="blur"></div>
    <div class="__wrapper c-main relative">
        <div class="__col grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-stretch">
            
            @if (!empty($g_content['image']))
                <div data-gsap-element="img" class="__img order-1 w-full h-full flex flex-col ">
                    <img class="object-cover w-full h-auto aspect-square max-h-[400px] md:max-h-[600px] md:aspect-[4/3] rounded-2xl" 
                         src="{{ $g_content['image']['url'] }}" 
                         alt="{{ $g_content['image']['alt'] ?? '' }}">

                    @if (!empty($g_content['button1']))
                        <div class=" flex inline-buttons mt-10 lg:mt-22">
                            <x-button
                                :href="$g_content['button1']['url']"
                                variant="third"
                                data-gsap-element="btn">
                                {{ $g_content['button1']['title'] }}
                            </x-button>
                        </div>
                    @endif
                </div>
            @endif

            <div class="__content order-2 flex flex-col justify-end w-full">
                @if(!empty($g_content['header']))
                    <h2 data-gsap-element="header" class="mb-6">
                        {{ $g_content['header'] }}
                    </h2>
                @endif

                @if(!empty($g_content['txt']))
                    <div data-gsap-element="txt" class="__txt text-carbon">
                        {!! $g_content['txt'] !!}
                    </div>
                @endif
            </div> 

        </div> 
    </div> 
</section>