<section class="b-whyus relative -smt" @if(!empty($section_id)) id="{{ $section_id }}" @endif>
    <div class="c-main ">
        
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-8 mb-12">
            
            <div class="max-w-2xl">
                @if(!empty($title))
                    <h2 class="text-primary mb-4">
                        {{ $title }}
                    </h2>
                @endif
                
                @if(!empty($description))
                    <p class="text-base leading-relaxed">
                        {{ $description }}
                    </p>
                @endif
            </div>

            @if(!empty($counters))
                <div class="flex flex-wrap gap-4 sm:gap-6">
                    @foreach($counters as $counter)
                        <div class="bg-white radius py-6 pl-8 shadow-sm  flex flex-col   flex-1 min-w-[300px]">
                            <span class="block text-4xl md:text-5xl font-bold text-primary">
                                {{ $counter['number'] }}
                            </span>
                            <span class="text-2xl  text-primary font-semibold pt-2">
                                {{ $counter['label'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>

        @if(!empty($cards))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($cards as $card)
                    @php
                        $bgUrl = !empty($card['image']['url']) ? $card['image']['url'] : '';
                    @endphp
                    
                    <div class="relative group rounded-3xl overflow-hidden aspect-[3/4] flex flex-col justify-end p-6 shadow-md transition-transform duration-300 hover:-translate-y-1 bg-cover bg-center"
                         style="background-image: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.72) 100%), url('{{ $bgUrl }}');">
                        
                        <div class="relative z-10 text-white ">
                            <h6 class="text-lg  mb-2">
                                {{ $card['title'] }}
                            </h6>
                            @if(!empty($card['txt']))
                                <div class="text-base text-white ">
                                    {!! $card['txt'] !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>