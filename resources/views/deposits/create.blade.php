<x-layout>
    <x-user_nav></x-user_nav>
    <div class="container-fluid my-5">
        <div class="card w-75 mx-auto">
            <div class="card-header d-flex justify-content-between">
                <h4>Make deposit</h4>
                <a href="{{route('deposits.history')}}" class="btn btn-outline-secondary btn-sm">Deposit history</a>
            </div>
            <div class="card-body">
                <p class="card-text">
                <ol>
                    <li>Deposit the amount you want to deposit into the account below
                        <ul>
                            <li><strong>Account number: </strong>1111111111</li>
                            <li><strong>Bank: </strong>Access Bank</li>
                            <li><strong>Name: </strong>Adashi</li>
                        </ul>
                    </li>
                    <li>Input the deposited amount below and click continue</li>
                    <li>Upload the proof of payment</li>
                </ol>
                </p>
                <form action="{{ route('deposits.store') }}" method="post">
                    @csrf
                    <label for="amount" class="form-label">Amount (&#8358;)</label>
                    <input type="number" class="form-control" id="amount" name="amount_deposited"
                        value="{{ old('amount_deposited') }}">
                    @error('amount_deposited')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button class="btn btn-secondary btn-sm w-100 my-2" type="submit">Continue</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
