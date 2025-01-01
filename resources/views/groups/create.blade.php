
    <x-admindashboard>

    <div class="container my-5">
        <h2 class="text-center">Create group</h2>

        <form action="{{ route('admincreategroup') }}" method="post" class="w-75 bg-light mx-auto p-5">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Group name</label>
                <input type="text" class="form-control" id="name" placeholder="Group name" name="name" value="{{old('name')}}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Contribution amount</label>
                <input type="number" id="amount" placeholder="Contribution amount" name="amount" value="{{old('amount')}}" class="form-control">
                @error('amount')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="interval" class="form-label">Contribution interval in days</label>
                <input type="number" id="date" placeholder="Contribution interval" name="interval"               class="form-control" value="{{old('interval')}}" >
                @error('interval')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="max_members" class="form-label">Maximum number of members</label>
                <input type="number" id="max_members" placeholder="Maximum number of members" name="max_members"
                    class="form-control" value="{{old('max_members')}}">
                @error('max_members')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn_color w-100" type="submit">Create group</button>
            </div>
        </form>
    </div>
</x-admindashboard>
