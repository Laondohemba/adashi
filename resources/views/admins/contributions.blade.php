<x-admindashboard>
    @if ($contributions->count() > 0)
    <h3 class="text-center">Contributions</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">User</th>
            <th scope="col">Group</th>
            <th scope="col">Amount</th>
            <th scope="col">Round</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($contributions as $contribution)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td> {{ucwords($contribution->user->username)}} </td>
                <td> {{ $contribution->group->name }} </td>
                <td>&#8358; {{ number_format($contribution->group->amount) }} </td>
                <td>{{$contribution->round}}</td>
                <td>{{ $contribution->created_at->diffForHumans() }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    @else
        <h3 class="text-center">No contributions found</h3>
    @endif
</x-admindashboard>