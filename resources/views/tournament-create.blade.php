<x-base-layout>
    <h1 class="text-3xl font-bold mb-6">Tournaments</h1>

    <form method="POST" action="{{ route('tournaments.store') }}" class="mb-6">
        @csrf
        <input type="text" name="name" placeholder="Tournament Name" required class="border p-2 mb-2 w-full">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Tournament</button>
    </form>

</x-base-layout>
