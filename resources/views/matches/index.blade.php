<x-base-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold mb-6">Matches Requiring Referee Attention</h2>

            @if($tournaments->isEmpty())
                <p class="text-gray-500">No matches currently require your attention.</p>
            @endif

            @foreach($tournaments as $tournament)
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-xl font-semibold mb-4">{{ $tournament->name }}</h3>

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tournament</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Round</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Team 1</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Team 2</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($tournament->matches as $match)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $tournament->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $match->round }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $match->team1->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $match->team2->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('matches.editForReferee', $match->id) }}"
                                                   class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white rounded-md text-xs hover:bg-blue-700">
                                                    Edit Scores
                                                </a>
                                                <a href="{{ route('referee.matches.show', $match) }}"
                                                   class="inline-flex items-center px-3 py-1.5 bg-green-600 text-white rounded-md text-xs hover:bg-green-700">
                                                    View Details
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-base-layout>
