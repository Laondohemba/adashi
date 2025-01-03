<x-layout>
    <x-user_nav></x-user_nav>
    @if ($userGroups->count() > 0)
        <h3 class="text-center my-3">Your Groups</h3>
        @foreach ($userGroups as $userGroup)
            <div class="card my-4 mx-auto" style="width: 35rem;">
                @if (session('success'))
                    <div class="p-2 text-bg-success mb-2">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="p-2 text-bg-danger mb-2">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title"><strong>Name:</strong> {{ $userGroup->group->name }}</h5>
                        </div>
                        <div class="col-6">
                            <p class="card-text"><strong>Amount:</strong>&#8358;
                                {{ number_format($userGroup->group->amount, 2) }}</p>
                        </div>
                        <div class="col-6">
                            <p class="card-text"><strong>Interval:</strong> {{ $userGroup->group->interval }} days</p>
                        </div>
                        <div class="col-6">
                            <p class="card-text"><strong>Membership status:</strong> {{ $userGroup->status }}</p>
                        </div>
                        <div class="col-6">
                            <p class="card-text"><strong>Membership status:</strong> {{ $userGroup->payment_status }}</p>
                        </div>
                        @if ($userGroup->status == 'Approved')
                        
                            <div class="col-sm-12 my-3">
                                <hr>
                                <form action="{{ route('group.contribute', $userGroup->group) }}" method="post">
                                    @csrf
                                    <small class="text-muted">Input the round you want to contribute for e.g 1</small>
                                    @error('round')
                                        <p class="text-danger"> {{ $message }} </p>
                                    @enderror

                                    @error('insufficient_balance')
                                        <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                    <div class="d-flex">
                                        <input type="number" class="form-control" placeholder="Round" name="round">
                                        <button class="btn btn-sm btn-primary w-50">Make contribution</button>
                                    </div>
                                </form>
                                <hr>
                            </div>

                            {{-- request payment --}}
                            <div class="col-sm-12 my-3">
                                <form action="{{ route('payment.request', $userGroup->group) }}" method="post">
                                    @csrf

                                    @if (session()->has("alreadyRequested{$userGroup->group->id}"))
                                        <p class="text-danger">
                                            {{session()->get("alreadyRequested{$userGroup->group->id}")}}
                                        </p>
                                    @endif
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-success w-50 mx-auto">Request payment</button>
                                    </div>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h3 class="text-center my-3">You have not joined any group yet!</h3>

    @endif
</x-layout>
