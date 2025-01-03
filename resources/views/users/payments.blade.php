<x-layout>
    <x-user_nav></x-user_nav>

    @if (session('success'))
        <div class="p-2 text-bg-success mt-3">
            {{session('success')}}
        </div>
    @endif
    @if ($payments->count() > 0)
    <h3 class="text-center my-3">Payments</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">Group</th>
            <th scope="col">Amount</th>
            <th scope="col">Charges</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <th scope="row"> {{$loop->iteration}} </th>
                <td> {{ $payment->group->name }} </td>
                <td>&#8358; {{ number_format($payment->amount) }} </td>
                <td>&#8358; {{ number_format($payment->charges) }} </td>
                <td> {{ $payment->status }} </td>
                <td> {{ $payment->created_at->diffForHumans() }} </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    @else
        <h3 class="text-center my-3">No payments found</h3>
    @endif
</x-layout>