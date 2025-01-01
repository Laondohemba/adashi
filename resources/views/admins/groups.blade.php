

    <x-admindashboard>

    <div class="container my-5">
        <h2 class="text-center">Groups</h2>

        @foreach ($groups as $group)
            <div class="card my-5 w-75 mx-auto">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                      <strong>Group name: {{ $group->name }}</strong>
                        <!-- Default dropstart button -->
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-light fs-5 dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                &#8942;
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('group.members', $group)}}">Members</a></li>
                              <li><a class="dropdown-item" href="#">Edit group info</a></li>
                              <li><a class="dropdown-item" href="#">Delete group</a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title"><strong>Amount: </strong> {{ $group->amount }}</h5>
                            </div>
                            <div class="col-6">
                                <p class="card-text"><strong>Interval: </strong> {{ $group->interval }}</p>
                            </div>
                            <div class="col-6">
                                <p class="card-text"><strong>Max number of members: </strong> {{ $group->max_members }}
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="card-text"><strong>Status: </strong> <span
                                        class="text-success">{{ $group->status }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</x-admindashboard>
