<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                📬 Newsletters
            </h1>

        <a href="{{ route('newsletters.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
            + Create
        </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($newsletters as $news)

                <div class="bg-white rounded-xl shadow p-5 border">

                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        {{ $news->title }}
                    </h3>

                    @if($news->deleted_at)
                        <span class="inline-block mb-3 px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                            Deleted
                        </span>
                    @else
                        <span class="inline-block mb-3 px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                            Active
                        </span>
                    @endif

                    <div class="flex flex-wrap gap-2 mt-4">

                        <a href="{{ route('newsletters.show', $news->id) }}"
                           class="px-3 py-1 bg-blue-100 text-blue-700 rounded">
                            View
                        </a>

                        @if(!$news->deleted_at)
                            <a href="{{ route('newsletters.edit', $news->id) }}"
                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('newsletters.destroy', $news->id) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this newsletter?')"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-gray-700">
                                    Delete
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('newsletters.restore', $news->id) }}">
                                @csrf
                                <button class="px-3 py-1 bg-green-100 text-green-700 rounded hover:bg-green-200">
                                    Restore
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</x-app-layout>
