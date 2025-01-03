<x-admindashboard>
  @if (session('success'))
      <div class="p-2 text-bg-success my-2">
        {{session('success')}}
      </div>
  @endif
    @if ($payments->count() > 0)
        <h3 class="text-center">Payments</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">Name</th>
                <th scope="col">Group</th>
                <th scope="col">Amount</th>
                <th scope="col">Charges</th>
                <th scope="col">Time</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <th scope="row"> {{$loop->iteration}} </th>
                    <td> {{ ucwords($payment->user->username) }} </td>
                    <td> {{ $payment->group->name }} </td>
                    <td>&#8358; {{ number_format($payment->amount) }} </td>
                    <td>&#8358; {{ number_format($payment->charges) }} </td>
                    <td> {{ $payment->created_at->diffForHumans() }} </td>
                    <td>
                      @if ($payment->status == 'pending')
                      <form action="{{route('payment.approve', $payment)}}" method="post">
                        @csrf
                        <button class="btn btn-primary btn-sm">Approve</button>
                    </form>
                      @else
                          Approved
                      @endif
                    </td>
                  </tr> 
                @endforeach
            </tbody>
          </table>
    @else
    <h3 class="text-center">No payment found</h3>
    @endif
</x-admindashboard>