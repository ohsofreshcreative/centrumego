<!-- Problems  -


<section class="py-16 lg:py-24 b-problems">
    <div class="container mx-auto px-4">
        
        @if(!empty($subtitle))
            <h2 class="text-center text-primary text-3xl lg:text-4xl font-bold mb-12">
                {{ $subtitle }}
            </h2>
        @endif

        @if(!empty($features))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                @foreach($features as $item)
                    <div class="">
                        
                        @if(!empty($item['feature_icon']))
                            <div class="w-16 h-16 mb-6 flex items-center justify-center bg-secondary/10 rounded-full text-secondary">
                                <img src="{{ $item['feature_icon']['url'] }}" 
                                     alt="{{ $item['feature_icon']['alt'] ?: $item['feature_title'] }}" 
                                     class="w-8 h-8 object-contain" />
                            </div>
                        @endif

                        @if(!empty($item['feature_title']))
                            <h3 class="text-primary font-bold text-lg mb-4">
                                {{ $item['feature_title'] }}
                            </h3>
                        @endif

                        @if(!empty($item['feature_button']))
                            <a href="{{ $item['feature_button']['url'] }}"
                               target="{{ $item['feature_button']['target'] ?: '_self' }}"
                               class="text-secondary text-sm font-semibold inline-flex items-center gap-2 mt-auto hover:text-secondary-600 transition-colors after:absolute after:inset-0 after:z-10">
                                
                                <span>{{ $item['feature_button']['title'] ?: 'Dowiedz się więcej' }}</span>

                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none" class="shrink-0 transform group-hover:translate-x-1 transition-transform">
                                    <path d="M0.190696 1.10947C-0.0631106 0.85566 -0.0637325 0.444215 0.190005 0.190366C0.443846 -0.063475 0.855956 -0.0634751 1.1098 0.190366L9.45471 8.53527L9.45471 1.1949C9.45495 0.836202 9.74578 0.545237 10.1045 0.545107C10.4635 0.545112 10.755 0.
