<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="bg-white rounded-xl shadow p-6">

            <h1 class="text-2xl font-bold text-gray-800 mb-4">
                {{ $newsletter->title }}
            </h1>

            <div class="text-gray-700 leading-relaxed whitespace-pre-line mb-6">
                {{ $newsletter->content }}
            </div>

            <div class="flex gap-3">
                <a href="{{ route('newsletters.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
                    Back
                </a>

                <a href="{{ route('newsletters.edit', $newsletter->id) }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                    Edit
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
