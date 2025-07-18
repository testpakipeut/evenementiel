<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>évènements</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- GSAP CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', Arial, sans-serif; }
    .menu-link { transition: color 0.2s; }
    .menu-link:hover { color: #00e6d8; }
    .glass {
      background: rgba(255,255,255,0.10);
      box-shadow: 0 8px 32px 0 rgba(31,38,135,0.15);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border-radius: 1rem;
      border: 1.5px solid rgba(0,230,216,0.25);
    }
    .halo-btn {
      position: relative;
      z-index: 1;
      overflow: visible;
    }
    .halo-btn::before {
      content: '';
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 140%;
      height: 140%;
      border-radius: 9999px;
      background: radial-gradient(circle, #00e6d8 0%, transparent 80%);
      opacity: 0.4;
      filter: blur(16px);
      z-index: -1;
      animation: halo 2s infinite alternate;
    }
    @keyframes halo {
      0% { opacity: 0.4; }
      100% { opacity: 0.7; filter: blur(24px); }
    }
    .animated-bg {
      background: linear-gradient(120deg, #0f2027, #2c5364, #00e6d8 80%);
      background-size: 200% 200%;
      animation: gradientMove 8s ease-in-out infinite;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .kenburns {
      animation: kenburns 8s ease-in-out infinite alternate;
    }
    @keyframes kenburns {
      0% { transform: scale(1) translate(0,0); }
      100% { transform: scale(1.08) translate(-10px, -10px); }
    }
    .tilt-card {
      transition: transform 0.2s cubic-bezier(.25,.8,.25,1), box-shadow 0.2s;
      will-change: transform;
    }
    .tilt-card:hover {
      transform: rotateY(8deg) scale(1.04) translateY(-4px);
      box-shadow: 0 8px 32px 0 #00e6d880, 0 2px 8px #0002;
      border-color: #00e6d8;
    }
    @media (max-width: 640px) {
      .why-cards, .prestations-cards { flex-direction: column; gap: 1.5rem; }
      .menu-link { font-size: 1rem; }
      html, body { scroll-snap-type: y mandatory; }
      section, .snap-section { scroll-snap-align: start; }
    }
    .glass {
      background: rgba(255,255,255,0.18);
      box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 1rem;
      border: 2px solid rgba(0,230,216,0.35);
    }
    .halo-btn {
      position: relative;
      z-index: 1;
      overflow: visible;
    }
    .halo-btn::before {
      content: '';
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 140%;
      height: 140%;
      border-radius: 9999px;
      background: radial-gradient(circle, #00e6d8 0%, transparent 80%);
      opacity: 0.4;
      filter: blur(16px);
      z-index: -1;
      animation: halo 2s infinite alternate;
    }
    @keyframes halo {
      0% { opacity: 0.4; }
      100% { opacity: 0.7; filter: blur(24px); }
    }
    .animated-bg {
      background: linear-gradient(120deg, #0f2027, #2c5364, #00e6d8 80%);
      background-size: 200% 200%;
      animation: gradientMove 8s ease-in-out infinite;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .lightbox-bg {
      position: fixed; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.8); z-index:1000; display:flex; align-items:center; justify-content:center;
    }
    .lightbox-img { max-width:90vw; max-height:80vh; border-radius:1rem; box-shadow:0 8px 32px #00e6d880; }
  </style>
</head>
<body class="animated-bg min-h-screen">
  <!-- Ajout du menu burger et du switch dark/light mode dans le header -->
  <nav class="fixed top-0 left-0 w-full z-20 flex flex-col items-center bg-transparent backdrop-blur-md">
    <div class="flex w-full items-center justify-between px-4 md:px-8 py-5">
      <div class="flex items-center gap-3">
        <img src="images/logo.jpg" alt="Logo" style="width:64px;height:64px;object-fit:contain;background:#fff8;padding:2px;border-radius:12px;box-shadow:0 2px 8px #0002;" />
      </div>
      <ul id="mainMenu" class="hidden md:flex gap-4 md:gap-10 list-none m-0 p-0">
        <li><a href="#hero" class="menu-link text-white text-lg font-medium">Accueil</a></li>
        <li><a href="#prestations" class="menu-link text-white text-lg font-medium">Prestations</a></li>
        <li><a href="#pourquoi" class="menu-link text-white text-lg font-medium">Pourquoi nous ?</a></li>
        <li><a href="#contact" class="menu-link text-white text-lg font-medium">Contact</a></li>
      </ul>
      <!-- Burger menu -->
      <button id="burgerBtn" class="md:hidden flex flex-col gap-1 items-center justify-center w-10 h-10 bg-[#00e6d8] rounded-full shadow-lg focus:outline-none">
        <span class="block w-6 h-0.5 bg-[#24243e] rounded"></span>
        <span class="block w-6 h-0.5 bg-[#24243e] rounded"></span>
        <span class="block w-6 h-0.5 bg-[#24243e] rounded"></span>
      </button>
      <!-- Switch dark/light mode -->
      <button id="themeSwitch" class="ml-4 flex items-center justify-center w-10 h-10 rounded-full bg-white/20 hover:bg-white/40 transition">
        <svg id="sunIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.66-8.66l-.71.71M4.05 19.07l-.71.71M21 12h-1M4 12H3m16.95-7.07l-.71.71M4.05 4.93l-.71-.71M12 5a7 7 0 100 14 7 7 0 000-14z" /></svg>
        <svg id="moonIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-200 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" /></svg>
      </button>
    </div>
    <!-- Menu mobile -->
    <ul id="mobileMenu" class="md:hidden hidden flex-col gap-6 bg-[#24243e]/90 w-full py-8 px-4 absolute top-full left-0 text-center rounded-b-2xl shadow-xl">
      <li><a href="#hero" class="menu-link text-white text-lg font-medium block py-2">Accueil</a></li>
      <li><a href="#prestations" class="menu-link text-white text-lg font-medium block py-2">Prestations</a></li>
      <li><a href="#pourquoi" class="menu-link text-white text-lg font-medium block py-2">Pourquoi nous ?</a></li>
      <li><a href="#contact" class="menu-link text-white text-lg font-medium block py-2">Contact</a></li>
    </ul>
  </nav>

  <!-- Parallax hero -->
  <section id="hero" class="flex flex-col items-center justify-center min-h-screen w-full pt-32 pb-12 relative overflow-hidden snap-section">
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#00e6d8]/20 rounded-full blur-3xl animate-pulse z-0"></div>
    <h1 id="hero-title" class="relative z-10 text-5xl md:text-7xl font-extrabold text-white text-center drop-shadow-lg mb-6 tracking-tight">
      <span class="split-text">L'événementiel <span class="text-[#00e6d8]">d'exception</span></span>
    </h1>
    <p id="hero-desc" class="relative z-10 text-xl md:text-2xl text-white/80 text-center max-w-xl mb-10">
      Tentes élégantes, planchers, climatisation, sanitaires : tout pour sublimer vos événements professionnels & privés.
    </p>
    <a
      href="#contact"
      id="hero-btn"
      class="halo-btn relative z-10 px-10 py-4 rounded-full bg-[#00e6d8] text-[#24243e] font-bold text-lg shadow-xl hover:bg-white transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-[#00e6d8] focus:ring-offset-2"
    >
      Demander un devis
    </a>
  </section>

  <!-- Ajout du bouton CTA sticky en bas sur mobile -->
  <a href="#contact" class="fixed bottom-4 left-1/2 -translate-x-1/2 z-50 md:hidden px-8 py-3 rounded-full bg-[#00e6d8] text-[#24243e] font-bold text-lg shadow-xl hover:bg-white transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-[#00e6d8] focus:ring-offset-2 animate-bounce">
    Demander un devis
  </a>

  <!-- Pourquoi choisir ÉVÉNEMENTS ? -->
  <section id="pourquoi" class="w-full flex flex-col items-center py-20 bg-white/5 snap-section">
    <h2 class="text-3xl md:text-4xl font-bold text-white mb-12 text-center">
      Pourquoi choisir <span class="text-[#00e6d8]">ÉVÉNEMENTS</span> ?
    </h2>
    <div id="why-cards" class="why-cards flex flex-wrap justify-center gap-8 max-w-5xl w-full mb-12">
      <div class="why-card glass tilt-card flex flex-col items-center text-center px-6 py-5 text-lg font-semibold text-white shadow-lg transition cursor-pointer">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><path d="M12 2l2.09 6.26L20 9.27l-5 3.64L16.18 20 12 16.9 7.82 20 9 12.91l-5-3.64 5.91-.01L12 2z" fill="#00e6d8"/></svg>
        Une expertise reconnue
      </div>
      <div class="why-card glass tilt-card flex flex-col items-center text-center px-6 py-5 text-lg font-semibold text-white shadow-lg transition cursor-pointer">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><path d="M4 4h16v2H4zm0 4h16v2H4zm0 4h16v2H4zm0 4h16v2H4zm0 4h16v2H4z" fill="#00e6d8"/></svg>
        Un service clé en main
      </div>
      <div class="why-card glass tilt-card flex flex-col items-center text-center px-6 py-5 text-lg font-semibold text-white shadow-lg transition cursor-pointer">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><path d="M21.7 13.35l-2.06-2.06a2.5 2.5 0 00-3.54 0l-.35.35-1.06-1.06.35-.35a2.5 2.5 0 000-3.54l-2.06-2.06a2.5 2.5 0 00-3.54 0l-2.06 2.06a2.5 2.5 0 000 3.54l.35.35-1.06 1.06-.35-.35a2.5 2.5 0 00-3.54 0l-2.06 2.06a2.5 2.5 0 000 3.54l2.06 2.06a2.5 2.5 0 003.54 0l.35-.35 1.06 1.06-.35.35a2.5 2.5 0 000 3.54l2.06 2.06a2.5 2.5 0 003.54 0l2.06-2.06a2.5 2.5 0 000-3.54l-.35-.35 1.06-1.06.35.35a2.5 2.5 0 003.54 0l2.06-2.06a2.5 2.5 0 000-3.54z" fill="#00e6d8"/></svg>
        Un partenaire local de confiance pour des événements mémorables
      </div>
      <div class="why-card glass tilt-card flex flex-col items-center text-center px-6 py-5 text-lg font-semibold text-white shadow-lg transition cursor-pointer">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><path d="M7 17l5-5 5 5H7z" fill="#00e6d8"/></svg>
        Un matériel haut de gamme
      </div>
      <div class="why-card glass tilt-card flex flex-col items-center text-center px-6 py-5 text-lg font-semibold text-white shadow-lg transition cursor-pointer">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><circle cx="8" cy="12" r="3" fill="#00e6d8"/><circle cx="16" cy="12" r="3" fill="#00e6d8"/><circle cx="12" cy="16" r="3" fill="#00e6d8"/></svg>
        Une équipe passionnée
      </div>
    </div>
    <!-- Slider photos réalisations -->
    <div class="relative w-full max-w-md mx-auto mt-8">
      <div id="slider" class="overflow-hidden rounded-2xl shadow-xl">
        <img src="images/image01.jpg" alt="Réalisation 1" class="kenburns" style="width:100%;height:356px;object-fit:cover;" />
        <img src="images/image02.jpg" alt="Réalisation 2" class="kenburns" style="width:100%;height:356px;object-fit:cover;display:none;" />
        <img src="images/image03.jpg" alt="Réalisation 3" class="kenburns" style="width:100%;height:356px;object-fit:cover;display:none;" />
        <img src="images/image04.jpg" alt="Réalisation 4" class="kenburns" style="width:100%;height:356px;object-fit:cover;display:none;" />
      </div>
      <div class="flex justify-center gap-2 mt-3">
        <span class="dot w-3 h-3 rounded-full bg-[#00e6d8] opacity-50 cursor-pointer" data-idx="0"></span>
        <span class="dot w-3 h-3 rounded-full bg-[#00e6d8] opacity-50 cursor-pointer" data-idx="1"></span>
        <span class="dot w-3 h-3 rounded-full bg-[#00e6d8] opacity-50 cursor-pointer" data-idx="2"></span>
        <span class="dot w-3 h-3 rounded-full bg-[#00e6d8] opacity-50 cursor-pointer" data-idx="3"></span>
      </div>
    </div>
    <!-- Lightbox -->
    <div id="lightbox" class="lightbox-bg hidden"><img id="lightboxImg" class="lightbox-img" src="" alt="Réalisation agrandie" /></div>
  </section>

  <!-- Prestations Section -->
  <section id="prestations" class="w-full flex flex-col items-center py-24 snap-section">
    <h2 class="text-3xl md:text-4xl font-bold text-white mb-12 text-center">Nos prestations</h2>
    <div class="prestations-cards grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 w-full max-w-6xl">
      <div class="glass bg-white/10 rounded-2xl p-8 flex flex-col items-center text-center shadow-lg border border-white/10 hover:border-[#00e6d8] transition">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><rect x="3" y="7" width="18" height="10" rx="2" fill="#00e6d8"/><rect x="7" y="11" width="10" height="2" rx="1" fill="#24243e"/></svg>
        <span class="text-2xl font-bold text-[#00e6d8] mb-2">Tentes élégantes</span>
        <span class="text-white/80">Pagodes, VIP, classiques</span>
      </div>
      <div class="glass bg-white/10 rounded-2xl p-8 flex flex-col items-center text-center shadow-lg border border-white/10 hover:border-[#00e6d8] transition">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><rect x="4" y="16" width="16" height="2" rx="1" fill="#00e6d8"/><rect x="6" y="6" width="12" height="8" rx="2" fill="#24243e"/></svg>
        <span class="text-2xl font-bold text-[#00e6d8] mb-2">Planchers & Gazon</span>
        <span class="text-white/80">Sol stable et élégant</span>
      </div>
      <div class="glass bg-white/10 rounded-2xl p-8 flex flex-col items-center text-center shadow-lg border border-white/10 hover:border-[#00e6d8] transition">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><rect x="7" y="7" width="10" height="10" rx="5" fill="#00e6d8"/><rect x="11" y="11" width="2" height="2" rx="1" fill="#24243e"/></svg>
        <span class="text-2xl font-bold text-[#00e6d8] mb-2">Climatisation</span>
        <span class="text-white/80">Confort optimal en toute saison</span>
      </div>
      <div class="glass bg-white/10 rounded-2xl p-8 flex flex-col items-center text-center shadow-lg border border-white/10 hover:border-[#00e6d8] transition">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><rect x="8" y="8" width="8" height="8" rx="2" fill="#00e6d8"/><rect x="10" y="10" width="4" height="4" rx="1" fill="#24243e"/></svg>
        <span class="text-2xl font-bold text-[#00e6d8] mb-2">Sanitaires</span>
        <span class="text-white/80">Hygiène et standing</span>
      </div>
      <div class="glass bg-white/10 rounded-2xl p-8 flex flex-col items-center text-center shadow-lg border border-white/10 hover:border-[#00e6d8] transition">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" class="mb-2"><rect x="6" y="6" width="12" height="12" rx="3" fill="#00e6d8"/><rect x="9" y="9" width="6" height="6" rx="1" fill="#24243e"/></svg>
        <span class="text-2xl font-bold text-[#00e6d8] mb-2">Mobilier complet</span>
        <span class="text-white/80">Tables, chaises, nappes & couverts</span>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="w-full flex flex-col items-center py-24 bg-[#0f2027]/80 snap-section">
    <h2 class="text-3xl md:text-4xl font-bold text-white mb-8 text-center">Contact & Devis</h2>
    <form id="contactForm" class="flex flex-col gap-6 w-full max-w-md bg-white/10 p-8 rounded-2xl shadow-lg">
      <input type="text" placeholder="Nom" class="rounded px-4 py-3 bg-white/80 text-[#24243e] placeholder:text-[#24243e]/60 focus:outline-none" required />
      <input type="tel" placeholder="Téléphone" class="rounded px-4 py-3 bg-white/80 text-[#24243e] placeholder:text-[#24243e]/60 focus:outline-none" required />
      <div class="flex flex-col gap-2">
        <span class="text-white font-semibold mb-1">Prestations souhaitées <span class="text-[#00e6d8]">*</span></span>
        <label class="flex items-center gap-2 text-white"><input type="checkbox" name="prestations" value="Tentes élégantes" class="accent-[#00e6d8]" /> Tentes élégantes</label>
        <label class="flex items-center gap-2 text-white"><input type="checkbox" name="prestations" value="Planchers & Gazon" class="accent-[#00e6d8]" /> Planchers & Gazon</label>
        <label class="flex items-center gap-2 text-white"><input type="checkbox" name="prestations" value="Climatisation" class="accent-[#00e6d8]" /> Climatisation</label>
        <label class="flex items-center gap-2 text-white"><input type="checkbox" name="prestations" value="Sanitaires" class="accent-[#00e6d8]" /> Sanitaires</label>
        <label class="flex items-center gap-2 text-white"><input type="checkbox" name="prestations" value="Mobilier complet" class="accent-[#00e6d8]" /> Mobilier complet</label>
      </div>
      <input type="email" placeholder="Email (facultatif)" class="rounded px-4 py-3 bg-white/80 text-[#24243e] placeholder:text-[#24243e]/60 focus:outline-none" />
      <textarea placeholder="Votre demande..." class="rounded px-4 py-3 bg-white/80 text-[#24243e] placeholder:text-[#24243e]/60 focus:outline-none" rows="4"></textarea>
      <button type="submit" class="px-8 py-3 rounded-full bg-[#00e6d8] text-[#24243e] font-bold text-lg shadow-xl hover:bg-white transition-colors duration-300">Envoyer</button>
      <div id="confirmationMsg" class="hidden text-green-400 text-center font-semibold mt-4">Merci ! Nous vous répondrons dans les plus brefs délais.</div>
      <div id="errorMsg" class="hidden text-red-400 text-center font-semibold mt-4">Veuillez sélectionner au moins une prestation.</div>
    </form>
  </section>

  <!-- Footer -->
  <footer class="w-full py-8 text-center text-white/60 text-sm relative">
    © <?php echo date('Y'); ?> évènements . Tous droits réservés.
    <span class="absolute right-8 bottom-8 text-[#00e6d8] text-lg font-bold bg-[#24243e]/80 px-4 py-2 rounded-full shadow-lg">
      +241 74 64 64 54
    </span>
    <div class="w-full flex justify-center mt-4">
      <a href="https://www.instagram.com/evenements2024/" target="_blank" rel="noopener" class="flex items-center gap-2 text-white hover:text-[#00e6d8] font-medium text-base">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram" style="width:24px;height:24px;" />
        @evenements2024
      </a>
    </div>
  </footer>

  <script>
    // Animation GSAP sur le hero
    gsap.from("#hero-title", { duration: 1, y: -60, opacity: 0, ease: "power3.out" });
    gsap.from("#hero-desc", { duration: 1, y: 40, opacity: 0, delay: 0.3, ease: "power3.out" });
    gsap.from("#hero-btn", { duration: 0.7, scale: 0.8, opacity: 0, delay: 0.6, ease: "back.out(1.7)" });
    // Parallax hero
    window.addEventListener('scroll', function() {
      const scrollY = window.scrollY;
      document.getElementById('hero-title').style.transform = `translateY(${scrollY * 0.2}px)`;
      document.getElementById('hero-desc').style.transform = `translateY(${scrollY * 0.1}px)`;
    });
    // Split text animation sur le titre principal
    window.addEventListener('DOMContentLoaded', () => {
      const split = document.querySelector('.split-text');
      if(split) {
        const words = split.textContent.split(' ');
        split.innerHTML = words.map(w => `<span class='inline-block opacity-0'>${w}</span>`).join(' ');
        gsap.to('.split-text span', {
          opacity: 1,
          y: 0,
          stagger: 0.08,
          duration: 0.7,
          ease: 'power3.out',
          delay: 0.2
        });
      }
    });
    // Animation GSAP sur les cartes "Pourquoi" (fade-in + montée, toujours visibles)
    gsap.from('#why-cards .why-card', {
      y: 40,
      opacity: 0,
      stagger: 0.15,
      duration: 0.8,
      ease: "power3.out"
    });
    gsap.to('#why-cards .why-card', {
      opacity: 1,
      duration: 0.1,
      delay: 1,
      overwrite: true
    });
    // Reveal au scroll sur les cartes prestations
    gsap.utils.toArray('.prestations-cards > div').forEach(card => {
      gsap.from(card, {
        scrollTrigger: {
          trigger: card,
          start: 'top 80%',
          toggleActions: 'play none none none'
        },
        y: 40,
        opacity: 0,
        duration: 0.7,
        ease: 'power3.out'
      });
    });

    // Debug JS : log visibilité et opacité des cartes "Pourquoi"
    setTimeout(() => {
      document.querySelectorAll('#why-cards .why-card').forEach((el, i) => {
        const style = window.getComputedStyle(el);
        console.log(`Carte #${i+1} : '${el.textContent.trim()}' | display: ${style.display} | opacity: ${style.opacity}`);
      });
    }, 1200);

    // Slider automatique
    const images = document.querySelectorAll('#slider img');
    const dots = document.querySelectorAll('.dot');
    let idx = 0;
    function showSlide(i) {
      images.forEach((img, j) => img.style.display = j === i ? '' : 'none');
      dots.forEach((dot, j) => dot.style.opacity = j === i ? '1' : '0.5');
    }
    function nextSlide() {
      idx = (idx + 1) % images.length;
      showSlide(idx);
    }
    let sliderInterval = setInterval(nextSlide, 3000);
    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        idx = i;
        showSlide(idx);
        clearInterval(sliderInterval);
        sliderInterval = setInterval(nextSlide, 3000);
      });
    });
    showSlide(0);

    // Ken Burns + lightbox sur slider
    const sliderImgs = document.querySelectorAll('#slider img');
    sliderImgs.forEach(img => {
      img.addEventListener('click', () => {
        document.getElementById('lightboxImg').src = img.src;
        document.getElementById('lightbox').classList.remove('hidden');
      });
    });
    document.getElementById('lightbox').addEventListener('click', () => {
      document.getElementById('lightbox').classList.add('hidden');
    });

    // Confirmation message on form submit + log JS côté client
    const form = document.getElementById('contactForm');
    const confirmationMsg = document.getElementById('confirmationMsg');
    const errorMsg = document.getElementById('errorMsg');
    if(form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        // Vérifier qu'au moins une prestation est cochée
        const checked = form.querySelectorAll('input[name="prestations"]:checked');
        if (checked.length === 0) {
          errorMsg.classList.remove('hidden');
          confirmationMsg.classList.add('hidden');
          return;
        } else {
          errorMsg.classList.add('hidden');
        }
        // Récupérer les valeurs du formulaire
        const inputs = form.querySelectorAll('input, textarea');
        const data = {};
        inputs.forEach(input => {
          if(input.type === 'checkbox') {
            if(input.checked) {
              if(!data.prestations) data.prestations = [];
              data.prestations.push(input.value);
            }
          } else {
            data[input.name || input.placeholder] = input.value;
          }
        });
        console.log('Formulaire envoyé :', data);
        confirmationMsg.classList.remove('hidden');
        form.reset();
        setTimeout(() => confirmationMsg.classList.add('hidden'), 5000);
      });
    }

    // Debug images chargement
    const debugImages = [
      document.querySelector('img[alt="Logo"]'),
      ...document.querySelectorAll('#slider img')
    ];
    debugImages.forEach(img => {
      if (!img) return;
      console.log('Tentative de chargement image :', img.src);
      img.onload = () => console.log('Image chargée :', img.src);
      img.onerror = () => console.error('Erreur chargement image :', img.src);
    });

    // Menu burger mobile
    const burgerBtn = document.getElementById('burgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    burgerBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
    // Fermer le menu mobile au clic sur un lien
    mobileMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
    });
    // Switch dark/light mode
    const themeSwitch = document.getElementById('themeSwitch');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    themeSwitch.addEventListener('click', () => {
      document.body.classList.toggle('dark');
      sunIcon.classList.toggle('hidden');
      moonIcon.classList.toggle('hidden');
      if(document.body.classList.contains('dark')) {
        document.body.style.background = '#181c24';
      } else {
        document.body.style.background = '';
      }
    });
  </script>
</body>
</html> 