<x-layout>
    <x-user_nav></x-user_nav>
    <div class="container-fluid my-5">
        @if ($deposits->count() > 0)
            <h3 class="text-center">Deposits history</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Amount deposited</th>
                        <th scope="col">Deposit slip</th>
                        <th scope="col">Status</th>
                        <th scope="col">Amount approved</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deposits as $deposit)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>&#8358;{{ number_format($deposit->amount_deposited, 2) }}</td>
                            <td>
                                @if ($deposit->proof_of_deposit === null)
                                <form action="{{route('deposits.proof', $deposit)}}" method="post" enctype="multipart/form-data" class="d-flex flex-column" style="width: 200px">
                                    @csrf
                                    <input type="file" placeholder="Upload proof" name="proof_of_deposit" class="form-control">
                                    @error('proof_of_deposit')
                                        <p class="text-danger"> {{$message}} </p>
                                    @enderror
                                    <button class="btn btn-sm btn-secondary">Submit</button>
                                </form>
                            @else
                            <p>Submitted</p>
                            @endif
                            </td>
                            <td>{{ $deposit->status }}</td>
                            <td> &#8358; {{ number_format($deposit->amount_approved, 2)}}</td>
                            <td>{{ $deposit->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-center">You have not made any deposit yet</h3>
        @endif
    </div>
</x-layout>
