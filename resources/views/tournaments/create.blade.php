<x-base-layout>
    <h1 class="text-3xl font-bold mb-6">Create Tournament</h1>

    <form method="POST" action="{{ route('tournaments.store') }}" class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        @csrf

        <!-- Tournament Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Tournament Name</label>
            <input
                type="text"
                name="name"
                id="name"
                placeholder="Enter Tournament Name"
                required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
            >
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea
                name="description"
                id="description"
                rows="4"
                placeholder="Enter Tournament Description"
                required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
            ></textarea>
        </div>

        <!-- Select Teams -->
        <div class="mb-4">
            <label for="teams" class="block text-sm font-medium text-gray-700">Select Teams</label>
            <select
                name="teams[]"
                id="teams"
                multiple
                required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
            >
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
            <small class="text-gray-500">Hold down Ctrl (or Cmd on Mac) to select multiple teams.</small>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 text-right">
            <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                Create Tournament
            </button>
        </div>
    </form>
</x-base-layout>
