<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Latest News</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .fade-in {
            animation: fadeIn 0.4s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-slate-100 min-h-screen">

<!-- HEADER -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
        <h1 class="text-3xl font-extrabold text-slate-600">
            📰 Daily Updates
        </h1>
        <span class="text-slate-500 text-sm">
            Live News Feed
        </span>
    </div>
</header>

<!-- HERO -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-slate">
    <div class="max-w-7xl mx-auto px-6 py-16 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
            Latest News & Announcements
        </h1>
        <p class="text-slate-100 text-lg max-w-2xl mx-auto">
            Stay updated with real-time announcements!
            News will be refreshed automatically.
        </p>
    </div>
</section>

<!-- CONTENT -->
<main class="max-w-7xl mx-auto px-6 py-12">

    <div id="news" class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3"></div>

    <p id="empty" class="hidden text-center text-gray-500 mt-12 text-lg">
        No active news at the moment.
    </p>

</main>

<script>
function loadNews() {
    fetch('/api/newsletters')
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById('news');
            const empty = document.getElementById('empty');

            container.innerHTML = '';

            if (data.length === 0) {
                empty.classList.remove('hidden');
                return;
            }

            empty.classList.add('hidden');

            data.forEach(n => {
                container.innerHTML += `
                    <div class="fade-in rounded-2xl shadow-lg bg-white overflow-hidden border">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">
                                ${n.title}
                            </h2>

                            <p class="text-gray-600 whitespace-pre-line">
                                ${n.content}
                            </p>

                            <div class="flex justify-end mt-4">
                                <span class="text-xs uppercase tracking-wide text-indigo-500 font-semibold">
                                    🔴 Live Update
                                </span>
                            </div>
                        </div>
                    </div>
                `;
            });
        })
        .catch(() => {
            console.error('Failed to load news');
        });
}

// Initial load
loadNews();

// Auto refresh every 30 seconds
setInterval(loadNews, 30000);
</script>
