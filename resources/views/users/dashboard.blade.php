<x-layout>
    <x-user_nav></x-user_nav>
        @if ($userGroups->count() > 0)
        <h3 class="text-center my-3">Your Groups</h3>
            @foreach ($userGroups as $userGroup)
            <div class="card my-4 mx-auto" style="width: 25rem;">
                <div class="card-body">
                  <h5 class="card-title"><strong>Name:</strong> {{$userGroup->group->name}}</h5>
                  <p class="card-text"><strong>Amount:</strong>&#8358; {{number_format($userGroup->group->amount, 2)}}</p>
                  <p class="card-text"><strong>Interval:</strong> {{$userGroup->group->interval}} days</p>
                  <p class="card-text"><strong>Membership status:</strong> {{$userGroup->status}}</p>
                </div>
              </div>
            @endforeach
        @else
        <h3 class="text-center my-3">You have not joined any group yet!</h3>
            
        @endif
</x-layout>