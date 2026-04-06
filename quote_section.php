<?php
// We use a slider using quotes from assets/quotes.js
// If $quoteId is set by the parent page, we start at that quote.
$initialQuoteId = isset($quoteId) ? (int)$quoteId : 'null';
?>
<section class="py-12 relative overflow-hidden bg-gradient-to-br from-slate-50 via-blue-50/30 to-purple-50/20 shadow-inner">
    <div class="container mx-auto px-4 relative">
        <div class="max-w-4xl mx-auto relative text-center">
            <!-- Decorative Quote Marks -->
            <div class="hidden sm:block absolute -top-4 -left-6 text-medical-blue opacity-10 text-6xl font-serif leading-none select-none pointer-events-none">
                "
            </div>
            <div class="hidden sm:block absolute -bottom-4 -right-6 text-medical-blue opacity-10 text-6xl font-serif leading-none select-none pointer-events-none rotate-180">
                "
            </div>
            
            <div id="quote-container" class="transition-opacity duration-500 opacity-100 flex flex-col justify-center min-h-[220px]">
                <blockquote class="text-center relative z-10 my-auto cursor-grab active:cursor-grabbing">
                    <p id="quote-text" class="text-xl md:text-2xl lg:text-3xl text-gray-800 font-light leading-relaxed mb-6 italic transition-all duration-300">
                        <!-- Quote will go here -->
                    </p>

                    <!-- Decorative Divider -->
                    <div class="flex items-center justify-center mb-4 transition-all duration-300">
                        <div class="h-px w-10 bg-gradient-to-r from-transparent via-medical-blue to-transparent"></div>
                        <div class="mx-3 w-1.5 h-1.5 rounded-full bg-medical-blue"></div>
                        <div class="h-px w-10 bg-gradient-to-l from-transparent via-medical-blue to-transparent"></div>
                    </div>

                    <!-- Author Attribution -->
                    <footer>
                        <cite id="quote-theme" class="text-medical-blue font-semibold text-lg not-italic block mb-1">
                            <!-- Theme -->
                        </cite>
                        <p id="quote-name" class="text-gray-700 font-medium text-base mb-1">
                            <!-- Name -->
                        </p>
                        <p id="quote-author" class="text-gray-500 text-sm font-light italic">
                            <!-- Original Author if available -->
                        </p>
                    </footer>
                </blockquote>
            </div>

            <!-- Controls -->
            <div class="flex justify-center items-center mt-6 gap-4 opacity-50 hover:opacity-100 transition-opacity duration-300">
                <button id="quote-prev" class="bg-white/80 hover:bg-medical-blue hover:text-white text-medical-blue border border-medical-blue/30 rounded-full w-10 h-10 flex items-center justify-center shadow-sm transition-all hover:scale-105" aria-label="Previous Quote">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <div class="text-sm text-gray-400 select-none">Swipe or Click</div>
                <button id="quote-next" class="bg-white/80 hover:bg-medical-blue hover:text-white text-medical-blue border border-medical-blue/30 rounded-full w-10 h-10 flex items-center justify-center shadow-sm transition-all hover:scale-105" aria-label="Next Quote">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
            
        </div>
    </div>
</section>

<script type="module">
    import survivorQuotes from './assets/quotes.js';

    document.addEventListener('DOMContentLoaded', () => {
        const initialQuoteId = <?= $initialQuoteId ?>;
        
        // Start randomly or with initial
        let currentIndex = Math.floor(Math.random() * survivorQuotes.length);
        if (initialQuoteId !== null) {
            const foundIndex = survivorQuotes.findIndex(q => q.id === initialQuoteId);
            if (foundIndex !== -1) currentIndex = foundIndex;
        }

        const quoteTextElement = document.getElementById('quote-text');
        const quoteThemeElement = document.getElementById('quote-theme');
        const quoteNameElement = document.getElementById('quote-name');
        const quoteAuthorElement = document.getElementById('quote-author');
        const quoteContainer = document.getElementById('quote-container');

        let isAnimating = false;

        function updateQuote(index) {
            if (isAnimating) return;
            isAnimating = true;
            
            const currentQuote = survivorQuotes[index];
            quoteContainer.classList.remove('opacity-100');
            quoteContainer.classList.add('opacity-0');

            setTimeout(() => {
                quoteTextElement.textContent = `"${currentQuote.quote}"`;
                quoteThemeElement.textContent = currentQuote.theme ? currentQuote.theme : 'Survivor Quote';
                quoteNameElement.textContent = currentQuote.name || '';
                quoteAuthorElement.textContent = currentQuote.author ? `- ${currentQuote.author}` : '';
                
                quoteContainer.classList.remove('opacity-0');
                quoteContainer.classList.add('opacity-100');
                
                setTimeout(() => {
                    isAnimating = false;
                }, 500);
            }, 500); // Matches Tailwind's duration-500
        }

        // Initialize purely synchronously so it doesn't wait for fade if first time
        const firstQuote = survivorQuotes[currentIndex];
        quoteTextElement.textContent = `"${firstQuote.quote}"`;
        quoteThemeElement.textContent = firstQuote.theme ? firstQuote.theme : 'Survivor Quote';
        quoteNameElement.textContent = firstQuote.name || '';
        quoteAuthorElement.textContent = firstQuote.author ? `- ${firstQuote.author}` : '';

        // Next/Prev functionality
        function nextQuote() {
            currentIndex = (currentIndex + 1) % survivorQuotes.length;
            updateQuote(currentIndex);
        }

        function prevQuote() {
            currentIndex = (currentIndex - 1 + survivorQuotes.length) % survivorQuotes.length;
            updateQuote(currentIndex);
        }

        document.getElementById('quote-next').addEventListener('click', () => {
            nextQuote();
            resetTimer();
        });

        document.getElementById('quote-prev').addEventListener('click', () => {
            prevQuote();
            resetTimer();
        });

        // Swipe Support
        let touchStartX = 0;
        let touchEndX = 0;
        
        quoteContainer.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, {passive: true});
        
        quoteContainer.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, {passive: true});
        
        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                nextQuote();
                resetTimer();
            }
            if (touchEndX > touchStartX + 50) {
                prevQuote();
                resetTimer();
            }
        }

        // Auto-play
        let autoPlayTimer;
        function startTimer() {
            autoPlayTimer = setInterval(nextQuote, 6000);
        }

        function resetTimer() {
            clearInterval(autoPlayTimer);
            startTimer();
        }

        startTimer();
    });
</script>
