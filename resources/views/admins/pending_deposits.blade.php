<x-layout>
    <x-admindashboard></x-admindashboard>
    @if ($pendingDeposits->count() > 0)
    <h3 class="text-center my-4">Pending Deposits</h3>

        <div class="row">
            @foreach ($pendingDeposits as $deposit)
                <div class="col-md-6">
                    <div class="card" style="width: 22rem;">
                        <img src="{{asset('storage/' . $deposit->proof_of_deposit)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Depositor: {{$deposit->userDeposits->username}} </h5>
                            <p class="card-text">Amount deposited: &#8358; {{number_format($deposit->amount_deposited, 2)}} </p>
                            <p class="card-text">Status: {{$deposit->status}} </p>
                            <p class="card-text">Amount approved: &#8358; {{$deposit->amount_approved}} </p>
                            <p class="card-text">Time: {{$deposit->created_at->diffForHumans()}} </p>
                            @if ($deposit->status === 'pending')
                            <form action="{{route('deposits.approve', $deposit)}}" method="post" class="d-flex">
                                @csrf
                                <div>
                                    <input type="number" class="form-control" placeholder="Approved amout" name="amount_approved">
                                    @error('amount_approved')
                                        <p class="text-danger"> {{$message}} </p>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-sm">Approve</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
    <h3 class="text-center mt-5">No pending deposits available</h3>
    @endif

</x-layout>
