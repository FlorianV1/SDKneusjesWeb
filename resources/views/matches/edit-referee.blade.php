<x-base-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-6">Edit Match Scores</h2>

                <form action="{{ route('matches.updateForReferee', $match->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            {{ $match->team1->name }} Score
                        </label>
                        <input type="number" name="team1_score"
                               value="{{ $match->team1_score ?? 0 }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            {{ $match->team2->name }} Score
                        </label>
                        <input type="number" name="team2_score"
                               value="{{ $match->team2_score ?? 0 }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Match Status
                        </label>
                        <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Pending" {{ $match->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Completed" {{ $match->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Match
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-base-layout>
