<x-base-layout>
    @extends('layouts.coach')

    @section('content')
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('teams.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Team Name:</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <button type="submit">Create Team</button>
                </form>
            </div>
        </div>
    @endsection
</x-base-layout>
