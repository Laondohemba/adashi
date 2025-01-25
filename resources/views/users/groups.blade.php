<x-layout>
    <x-user_nav>
        <div class="container-fluid">
            @if ($groups)
                <h4 class="my-5 text-center">Available groups</h4>
                @foreach ($groups as $group)
                    <div class="card my-4 mx-auto" style="width: 25rem;">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Name:</strong> {{ $group->name }}</h5>
                            <p class="card-text"><strong>Amount:</strong>&#8358; {{ number_format($group->amount, 2) }}
                            </p>
                            <p class="card-text"><strong>Interval:</strong> {{ $group->interval }} days</p>
                            {{-- <p class="card-text"><strong>Slots left:</strong> {{}}</p> --}}
                            <form action="{{ route('user.joinGroup', $group) }}" method="POST">
                                @csrf

                                @if (session()->has("alreadyjoined{$group->id}"))
                                    <div class="text-danger">{{ session()->get("alreadyjoined{$group->id}") }}</div>
                                @endif
                                <button class="btn btn-primary btn-sm" type="submit">Join group</button>
                            </form>

                        </div>
                    </div>
                @endforeach
            @else
                <h1>No groups available!</h1>
            @endif
        </div>
    </x-user_nav>
</x-layout>
