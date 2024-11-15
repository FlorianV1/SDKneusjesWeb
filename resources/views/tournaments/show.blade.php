<x-base-layout>
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center mb-8 text-white">{{ $tournament->name }} Bracket</h1>

    <div class="flex overflow-x-auto space-x-6">
        @foreach($rounds as $roundNumber => $matches)
            <div class="w-1/4 min-w-[200px]">
                <h2 class="text-xl font-semibold text-center mb-4">Round {{ $roundNumber }}</h2>
                <div class="space-y-6">
                    @foreach($matches as $match)
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="flex items-center justify-between">
                                <div class="text-center flex-1">
                                    <span class="{{ $match->winner_id == $match->team1_id ? 'text-green-600' : '' }}">
                                        {{ $match->team1->name }}
                                    </span>
                                </div>
                                <span class="text-gray-500">VS</span>
                                <div class="text-center flex-1">
                                    <span class="{{ $match->winner_id == $match->team2_id ? 'text-green-600' : '' }}">
                                        {{ $match->team2->name }}
                                    </span>
                                </div>
                            </div>
                            @if ($match->winner_id)
                                <div class="text-center mt-4 text-sm text-gray-600">
                                    Winner: <span class="font-semibold">{{ $match->winner->name }}</span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-base-layout>
