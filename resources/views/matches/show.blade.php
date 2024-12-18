<x-base-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-6">Match Details</h2>

                <div class="mb-4">
                    <strong>Tournament:</strong> {{ $match->tournament->name }}
                </div>
                <div class="mb-4">
                    <strong>Round:</strong> {{ $match->round }}
                </div>
                <div class="mb-4">
                    <strong>Team 1:</strong> {{ $match->team1->name }}
                </div>
                <div class="mb-4">
                    <strong>Team 2:</strong> {{ $match->team2->name }}
                </div>
                <div class="mb-4">
                    <strong>Current Status:</strong> {{ $match->status }}
                </div>

                @if($match->status == 'Pending')
                    <div class="flex space-x-2">
                        <a href="{{ route('matches.editForReferee', $match->id) }}"
                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Edit Match Scores
                        </a>
                        <form action="{{ route('referee.matches.start', $match) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                Start Match
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-base-layout>
