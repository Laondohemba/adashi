<x-admindashboard>

    @if ($deposits->count() > 0)
        <div class="d-flex mt-5 justify-content-between">
            <h3 class="text-center">Deposits</h3>
            <a href="{{ route('deposits.pending') }}" class="btn btn-sm btn-outline-secondary">Pending Deposits</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">User</th>
                    <th scope="col">Amount deposited</th>
                    <th scope="col">Amount approved</th>
                    <th scope="col">Time deposited</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deposits as $deposit)
                    <tr>
                        <th scope="row"> {{ $loop->iteration }} </th>
                        <td>{{ $deposit->userDeposits->username }}</td>
                        <td>&#8358; {{ number_format($deposit->amount_deposited) }}</td>
                        <td>&#8358; {{ number_format($deposit->amount_approved) }}</td>
                        <td>{{ $deposit->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center">No deposits have been made yet</h3>
    @endif

</x-admindashboard>
