<x-layout>

      <x-admindashboard></x-admindashboard>

      <div class="container my-5">
        <h2 class="text-center">Groups</h2>

        @foreach ($groups as $group)
        <div class="card my-5 w-75 mx-auto">
          <div class="card-header">
            <strong>Group name: </strong>{{$group->name}}
          </div>
          <div class="card-body">
            <h5 class="card-title"><strong>Amount: </strong> {{$group->amount}}</h5>
            <p class="card-text"><strong>Interval: </strong> {{$group->interval}}</p>
            <p class="card-text"><strong>Max number of members: </strong> {{$group->max_members}}</p>
            <p class="card-text"><strong>Status: </strong> <span class="text-success">{{$group->status}}</span></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        @endforeach
      </div>
</x-layout>