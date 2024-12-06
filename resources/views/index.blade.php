<x-base-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Tournaments</h1>
        <ul>
      {{--       @foreach ($tournaments as $tournament)
                <li class="mb-4">
                    <a href="{{ route('tournaments.show', $tournament->id) }}" class="text-blue-500">
                        {{ $tournament->name }}
                    </a>
                </li>
            @endforeach --}}
        </ul>
    </div>
</x-base-layout>
