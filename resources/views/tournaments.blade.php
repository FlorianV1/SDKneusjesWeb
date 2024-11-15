<x-base-layout>
    <h1 class="text-2xl font-bold mb-6 text-white">My Tournaments</h1>

    @if($tournaments->isEmpty())
        <p class="text-white">You haven't created any tournaments yet.</p>
    @else
        <ul class="space-y-4">
        @foreach($tournaments as $tournament)
            <li class="p-4 border border-gray-300 rounded-md">
            <h2 class="font-bold text-lg text-white">{{ $tournament->name }}</h2>
            <p class="text-white">{{ $tournament->description }}</p>
            <small class="text-white">Status: {{ ucfirst($tournament->status) }}</small>
            </li>
        @endforeach
        </ul>
    @endif
</x-base-layout>
