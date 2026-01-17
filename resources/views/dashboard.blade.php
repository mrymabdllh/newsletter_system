<x-app-layout>
    {{-- Page Content --}}
    <div class="max-w-7xl mx-auto px-6 py-6">
        <div class="bg-white rounded-xl shadow p-6">
            <h1 class="text-lg font-semibold text-gray-800 mb-2">
                Welcome, {{ Auth::user()->name }} 👋
            </h1>

            <p class="text-gray-500 mb-4">
                Manage your newsletters and publish updates for users.
            </p>

            <a href="{{ route('newsletters.index') }}"
               class="inline-flex items-center px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                📬 Manage Newsletters
            </a>
        </div>
    </div>
</x-app-layout>
