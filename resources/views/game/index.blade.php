<!-- Standalone Blade file: Coin Carnival Game UI -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin Carnival 🎪</title>
    <!-- Tailwind CDN for styling (remove if you use your own build) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes coinFloat {
            0% {
                opacity: 1;
                transform: translate(-50%, -50%) translateY(0);
            }

            100% {
                opacity: 0;
                transform: translate(-50%, -50%) translateY(-100px);
            }
        }
    </style>
</head>

<body>
    <div class="bg-black">
        <div class="mx-auto max-w-[480px] bg-[#fff3e0] text-[#2d3436] shadow-xl">
            <header class="bg-gradient-to-r from-[#0c090a] to-[#00b38f] p-5 text-center text-white">
                <h1 class="text-xl font-bold">🎉 Coin Carnival 🎉</h1>
                {{-- <div>
                    Welcome, <strong>LuckyPlayer99</strong>!
                </div> --}}
            </header>
            <div class="flex justify-around border-b-2 border-[#fab1a0] bg-[#ffeaa7] p-2.5 text-base font-bold">
                <div>
                    💰 Points: <span id="points">12345</span>
                </div>
                <div>
                    🎟️ Tickets: <span id="tickets">5</span>
                </div>
                <div>
                    🌟 Level: <span id="level">8</span>
                </div>
            </div>
            <div class="text-center">
                <div id="main-content"></div>
                {{-- menu section --}}
                <div class="flex flex-wrap justify-center">
                    <a href="/">
                        <button
                            class="m-1 w-20 h-8 cursor-pointer rounded-md border-none bg-[#00b38f] text-xs text-white hover:bg-[#009e7a] flex items-center justify-center">🌾
                            Home</button>
                    </a>
                    <button onclick="setSection('farm')"
                        class="m-1 w-20 h-8 cursor-pointer rounded-md border-none bg-[#00b38f] text-xs text-white hover:bg-[#009e7a] flex items-center justify-center">🌾
                        Farm</button>
                    <button onclick="setSection('wallet')"
                        class="m-1 w-20 h-8 cursor-pointer rounded-md border-none bg-[#00b38f] text-xs text-white hover:bg-[#009e7a] flex items-center justify-center">🎰
                        Wallet</button>
                    <button onclick="setSection('events')"
                        class="m-1 w-20 h-8 cursor-pointer rounded-md border-none bg-[#00b38f] text-xs text-white hover:bg-[#009e7a] flex items-center justify-center">🎁
                        Events</button>
                    <button onclick="setSection('leaderboard')"
                        class="m-1 w-20 h-8 cursor-pointer rounded-md border-none bg-[#00b38f] text-xs text-white hover:bg-[#009e7a] flex items-center justify-center">🏅
                        Leaderboard</button>
                    <button onclick="setSection('my-profile')"
                        class="m-1 w-20 h-8 cursor-pointer rounded-md border-none bg-[#00b38f] text-xs text-white hover:bg-[#009e7a] flex items-center justify-center">🧙‍♂️
                        My Profile</button>
                </div>
            </div>
            <footer class="mt-8 bg-[#dfe6e9] p-4 text-center text-sm text-[#636e72]">
                🎁 Daily Bonus: <strong>Available!</strong> | 🕒 Next Mega Draw in <strong>5h 22m</strong>
                <br />
                💬 Parrot says: "Didn't get lucky? Try again after chai!"
            </footer>
        </div>
    </div>
    <script>
        // State
        let points = 12345;
        let tickets = 5;
        let level = 8;
        let currentSection = 'farm';
        let coins = [];
        let coinTimeouts = [];

        function setSection(section) {
            currentSection = section;
            renderContent();
        }

        function addPoints() {
            points += 10;
            document.getElementById('points').textContent = points.toLocaleString();
        }

        function renderContent() {
            const main = document.getElementById('main-content');
            if (!main) return;
            switch (currentSection) {
                case 'farm':
                    main.innerHTML = `
                <div id="bunny-container" class="relative h-[500px] w-full" style="background-image: url('/images/Panda Background.png'); background-size: contain; background-position: center; background-repeat: no-repeat;">
                    <p class="absolute bottom-4 left-0 right-0 text-center text-xs font-semibold text-gray-700">Tap the Panda to collect points! 🐰</p>
                    <div class="relative flex h-full w-full items-center justify-center">
                        <img src="/images/Shadow.png" alt="Character Shadow" class="absolute bottom-8 left-1/2 w-2/3 -translate-x-1/2 opacity-50" />
                        <img id="panda-img" src="/images/Panda Characters.svg" alt="Panda Character" class="h-2/3 w-2/3 cursor-pointer object-contain transition-transform duration-200 scale-100" />
                    </div>
                    <div id="coin-container"></div>
                </div>
            `;
                    setTimeout(() => setupBunny(), 0);
                    break;
                case 'wallet':
                    main.innerHTML =
                        `<div class="mb-8 flex min-h-[200px] flex-col items-center justify-center"><em>Wallet section placeholder</em></div>`;
                    break;
                case 'events':
                    main.innerHTML =
                        `<div class="mb-8 flex min-h-[200px] flex-col items-center justify-center"><h2 class="mb-4 text-2xl">🎁 Events</h2><p>Special events and rewards!</p></div>`;
                    break;
                case 'leaderboard':
                    main.innerHTML =
                        `<div class="mb-8 flex min-h-[200px] flex-col items-center justify-center"><h2 class="mb-4 text-2xl">🏅 Leaderboard</h2><p>See who's on top!</p></div>`;
                    break;
                case 'my-profile':
                    main.innerHTML =
                        `<div class="mb-8 flex min-h-[200px] flex-col items-center justify-center"><em>Profile section placeholder</em></div>`;
                    break;
            }
        }

        function setupBunny() {
            const panda = document.getElementById('panda-img');
            if (!panda) return;
            panda.addEventListener('click', handleBunnyClick);
        }

        function handleBunnyClick() {
            addPoints();
            animatePanda();
            spawnCoin();
        }

        function animatePanda() {
            const panda = document.getElementById('panda-img');
            if (!panda) return;
            panda.classList.remove('scale-100');
            panda.classList.add('scale-95');
            setTimeout(() => {
                panda.classList.remove('scale-95');
                panda.classList.add('scale-100');
            }, 200);
        }

        function spawnCoin() {
            const coinContainer = document.getElementById('coin-container');
            if (!coinContainer) return;
            const coinId = 'coin-' + Date.now();
            const x = Math.random() * 100 - 50;
            const delay = Math.random() * 200;
            const coin = document.createElement('div');
            coin.id = coinId;
            coin.className = 'absolute text-2xl font-bold text-yellow-400 transition-all duration-1000';
            coin.style.left = `calc(50% + ${x}px)`;
            coin.style.top = '40%';
            coin.style.transform = 'translate(-50%, -50%) translateY(0)';
            coin.style.animation = `coinFloat 1s ease-out ${delay}ms forwards`;
            coin.textContent = '+1';
            coinContainer.appendChild(coin);
            const timeout = setTimeout(() => {
                coin.remove();
            }, 1000 + delay);
            coinTimeouts.push(timeout);
        }
        document.addEventListener('DOMContentLoaded', function() {
            renderContent();
        });
    </script>
</body>

</html>
