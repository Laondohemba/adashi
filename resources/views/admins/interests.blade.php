<x-admindashboard>
    @if ($interests->count() > 0)
        <h3 class="text-center my-2">Interests</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">User</th>
                <th scope="col">Amount</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($interests as $interest)
                <tr>
                    <th scope="row"> {{$loop->iteration}} </th>
                    <td> {{ ucwords($interest->user->username) }} </td>
                    <td>&#8358; {{ number_format($interest->amount) }} </td>
                    <td> {{ $interest->created_at->diffForHumans() }} </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    @else
    <h3 class="text-center my-2">No interest found!</h3>
    @endif
</x-admindashboard>