<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="bg-white rounded-xl shadow p-6">

            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                ✏️ Edit Newsletter
            </h1>

            <form method="POST" action="{{ route('newsletters.update', $newsletter->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Title
                    </label>
                    <input name="title"
                           value="{{ old('title', $newsletter->title) }}"
                           class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-indigo-200"
                           required>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Content
                    </label>
                    <textarea name="content"
                              rows="6"
                              class="w-full rounded-lg border px-4 py-2 focus:ring focus:ring-indigo-200"
                              required>{{ old('content', $newsletter->content) }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                        Update
                    </button>

                    <a href="{{ route('newsletters.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
