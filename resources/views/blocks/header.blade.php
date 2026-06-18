@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp
<!-- header  -->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    class="b-header  relative overflow-hidden -mt-[72px] z-10 {{ $section_class }}"
    style="background: linear-gradient(180deg, rgba(244, 249, 255, 0.00) 0%, #F4F9FF 85%), url('{{ $g_header['image']['url'] ?? '' }}') lightgray 50% / cover no-repeat;">

    <div class="__wrapper c-wide relative z-20 w-full h-full min-h-[600px] md:min-h-[900px] flex items-end">
        <div class="__inside c-main relative w-full pb-10">
            
            <div class="__content w-full md:w-1/2">
                <div>
                    @if(!empty($g_header['title']))
                        <h1 data-gsap-element="header" class="text-primary font-bold">
                            {!! $g_header['title'] !!}
                        </h1>
                    @endif

                    @if(!empty($g_header['txt']))
                        <div data-gsap-element="txt" class="mt-4 mb-6 text-carbon font-medium">
                            {!! $g_header['txt'] !!}
                        </div>
                    @endif

                    <a href="#banner-next"
                        aria-label="Przewiń do następnej sekcji"
                        class="js-banner-next bg-third hover:bg-third-hover transition-all rounded-full w-16 h-16 flex items-center justify-center cursor-pointer animate-bounce mt-8">
                        <img src="/wp-content/uploads/2026/06/arrow-down.svg" alt="" />
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>