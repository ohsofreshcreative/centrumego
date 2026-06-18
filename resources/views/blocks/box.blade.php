<!-- box  -->

@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$bgImageUrl = !empty($g_box['image']['url']) ? $g_box['image']['url'] : '';
@endphp

<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    class="b-box relative c-main -smt my-6 md:my-12 {{ $sectionClass }} {{ $section_class }}">
    
    <div class="relative bg-primary radius overflow-hidden px-10 py-16 md:p-18 w-full z-10">
        
        @if($bgImageUrl)
            <div class="absolute top-0 right-0 h-full w-full md:w-1/2 block z-0 overflow-hidden">
                <img 
                    src="{{ $bgImageUrl }}" 
                    alt="{{ $g_box['image']['alt'] ?? '' }}" 
                    class="w-full h-full object-cover object-center"
                />
                <div class="absolute inset-0" style="background: linear-gradient(90deg, #0A397C 0%, rgba(10, 57, 124, 0.6) 50%, rgba(10, 57, 124, 0) 100%);"></div>
            </div>
        @endif

        <div class="__content w-full lg:w-1/2 flex flex-col items-start relative z-10">
            <div class="__text w-full">
                @if(!empty($g_box['title']))
                <p data-gsap-element="header" class="__header block m-header font-header text-h3 !text-3xl !text-white !mt-0">
                    {!! $g_box['title'] !!}
                </p>
                @endif
                
                @if(!empty($g_box['txt']))
                <div data-gsap-element="txt" class="__txt !text-white text-lg w-full mb-6">
                    {!! $g_box['txt'] !!}
                </div>
                @endif
            </div>
            
            @if (!empty($g_box['button1']))
            <div class="flex w-full">
                <a data-gsap-element="button" class="btn-third btn"
                    href="{{ $g_box['button1']['url'] }}"
                    target="{{ $g_box['button1']['target'] ?? '_self' }}">
                    {{ $g_box['button1']['title'] }}
                </a>
            </div>
            @endif
        </div>

    </div>
</section>