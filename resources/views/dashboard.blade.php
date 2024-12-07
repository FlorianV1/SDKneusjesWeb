<x-base-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        Welcome to your team management dashboard, {{ auth()->user()->name }}!
                    </div>
                    <div class="mt-6 text-gray-500">
                        @if(Auth::user()->role === 'coach')
                        Here you can manage your team and players.
                        @elseif (Auth::user()->role === 'referee')
                        Here you can manage your tournaments.
                        @elseif (Auth::user()->role === 'admin')
                        Here you can manage the system.
                        @endif
                    </div>
                </div>
                <div class="p-6">
                    <!-- Display Team Name -->
                @if(Auth::user()->role === 'coach')
                        @if(Auth::user()->team)
                            <h3 class="text-lg font-semibold mb-4">Your Team: {{ $team->name }}</h3>

                            <!-- Player List -->
                            <div class="bg-gray-100 rounded-lg shadow-md p-4">
                                <h3 class="text-lg font-semibold mb-4">Team Players</h3>
                                <ul>
                                    @foreach($players as $player)
                                        <li class="flex justify-between items-center bg-white px-4 py-2 mb-2 rounded-md shadow-sm">
                                            <span>{{ $player->name }}</span>
                                            <div class="flex gap-2">
                                                <!-- Edit Button -->
                                                <form method="GET" action="{{ route('team.editPlayer', $player->id) }}">
                                                    @csrf
                                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
                                                        Edit
                                                    </button>
                                                </form>
                                                <!-- Delete Button -->
                                                <form method="POST" action="{{ route('team.deletePlayer', $player->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p>No team found. Please create a team.</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-base-layout>
