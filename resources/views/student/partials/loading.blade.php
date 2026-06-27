<!-- AI Loading Overlay -->
<div id="ai-loading-overlay" class="fixed inset-0 z-[9999] hidden flex-col items-center justify-center bg-slate-900/60 dark:bg-black/75 backdrop-blur-md transition-all duration-300">
    <style>
        @keyframes loadingProgress {
            0% { width: 5%; }
            20% { width: 35%; }
            40% { width: 55%; }
            60% { width: 75%; }
            80% { width: 88%; }
            95% { width: 95%; }
        }
        .animate-loading-progress {
            animation: loadingProgress 20s cubic-bezier(0.1, 0.8, 0.1, 1) forwards;
        }
        #loading-subtitle {
            transition: opacity 0.3s ease-in-out;
        }
        @keyframes bounce-float-loader {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        .animate-bounce-float-loader {
            animation: bounce-float-loader 3s infinite ease-in-out;
        }
    </style>
    
    <!-- Modal Container -->
    <div class="relative w-[400px] max-w-[90%] pt-28 flex flex-col items-center transform transition-all duration-300">
        
        <!-- Floating Panda GIF (Popping out) -->
        <div class="absolute top-0 z-20 flex justify-center w-full pointer-events-none drop-shadow-[0_15px_15px_rgba(0,0,0,0.25)] animate-bounce-float-loader">
            <!-- Background Glow -->
            <div class="absolute top-10 bg-[#75cb50] w-32 h-32 blur-3xl opacity-40 rounded-full"></div>
            <!-- Animated Panda Working GIF -->
            <img src="{{ asset('images/panda-ambis.GIF') }}" alt="siPanda Loading" class="relative w-44 h-44 object-contain">
        </div>

        <!-- Speech Bubble Card Body -->
        <div class="relative bg-white/95 dark:bg-[#1a1b23]/95 backdrop-blur-xl border border-slate-200 dark:border-white/10 w-full p-8 pt-16 rounded-[2.5rem] shadow-2xl text-center">
            
            <!-- Speech Bubble Tail pointing to Panda -->
            <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-0 h-0 
                        border-l-[20px] border-l-transparent 
                        border-r-[20px] border-r-transparent 
                        border-b-[24px] border-b-white/95 dark:border-b-[#1a1b23]/95 z-10"></div>
            
            <!-- Border for the tail -->
            <div class="absolute -top-[21px] left-1/2 transform -translate-x-1/2 w-0 h-0 
                        border-l-[22px] border-l-transparent 
                        border-r-[22px] border-r-transparent 
                        border-b-[26px] border-b-slate-200 dark:border-b-white/10 z-0"></div>

            <h3 id="loading-title" class="relative z-20 font-heading font-black text-2xl text-slate-900 dark:text-white mb-4 tracking-wide">siPanda Sedang Bekerja...</h3>
            
            <!-- Message Bubble Area -->
            <div class="relative z-20 bg-slate-50 dark:bg-white/5 p-4 rounded-2xl mb-6 border border-slate-100 dark:border-white/5 h-[4.5rem] flex items-center justify-center">
                <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-medium m-0" id="loading-subtitle">
                    siPanda sedang membaca dan menganalisis materi belajarmu...
                </p>
            </div>

            <!-- Progress Bar -->
            <div class="relative z-20 w-full bg-slate-200 dark:bg-[#2a2a2a] rounded-full h-2.5 overflow-hidden border border-black/5 dark:border-white/5 mb-3 shadow-inner">
                <div class="bg-gradient-to-r from-[#10b981] to-[#75cb50] h-full rounded-full animate-loading-progress shadow-[0_0_10px_rgba(117,203,80,0.8)] relative">
                    <!-- Shimmer effect inside progress bar -->
                    <div class="absolute inset-0 bg-white/30 w-full animate-pulse"></div>
                </div>
            </div>

            <span class="relative z-20 text-[10px] uppercase font-extrabold tracking-wider text-[#75cb50] animate-pulse inline-block">Mohon tunggu sebentar</span>
        </div>
    </div>
</div>

<script>
    window.showSipandaLoader = function(customTitle = null, customSubtitles = null) {
        const overlay = document.getElementById('ai-loading-overlay');
        if (!overlay) return;

        // Set custom title if provided
        if (customTitle) {
            const titleEl = document.getElementById('loading-title');
            if (titleEl) titleEl.innerText = customTitle;
        }

        overlay.classList.remove('hidden');
        overlay.classList.add('flex');

        // Set subtitles rotating
        const subtitles = customSubtitles || [
            "siPanda sedang membaca dan menganalisis materi belajarmu...",
            "siPanda sedang mengekstrak teks penting...",
            "Menghubungi AI untuk memproses konten...",
            "Merumuskan rangkuman dan soal latihan khusus untukmu...",
            "Hampir selesai, sedang merapikan hasil..."
        ];
        
        let subIdx = 0;
        const subEl = document.getElementById('loading-subtitle');
        if (subEl && subtitles.length > 0) {
            subEl.innerText = subtitles[0];
            
            // Clear existing interval if any to prevent duplicates
            if (window.sipandaLoaderInterval) {
                clearInterval(window.sipandaLoaderInterval);
            }
            
            window.sipandaLoaderInterval = setInterval(() => {
                subEl.style.opacity = '0';
                setTimeout(() => {
                    subIdx = (subIdx + 1) % subtitles.length;
                    subEl.innerText = subtitles[subIdx];
                    subEl.style.opacity = '1';
                }, 300);
            }, 3500);
        }
    };

    window.hideSipandaLoader = function() {
        const overlay = document.getElementById('ai-loading-overlay');
        if (overlay) {
            overlay.classList.remove('flex');
            overlay.classList.add('hidden');
        }
        if (window.sipandaLoaderInterval) {
            clearInterval(window.sipandaLoaderInterval);
        }
    };
</script>
