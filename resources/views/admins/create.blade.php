<x-layout>
        <!-- sign up -->
        <div class="whole_page">
            <div class="x-small my-container text-center mb-0" id="contact">
                <h3>Add Admin</h3>
    
                <div class="text-center">
                    <!-- contact form -->
                    <div class="col-md-7 mt-3 mb-5 mx-auto bg-light py-3">
    
                        <form action="{{route('createadmin')}}" method="post" id="contactform">
                            @csrf
                            <div class="text-start p-3">
                                <label for="name" class="form-label mb-0">Username:</label>
                                <input type="text" placeholder="Username..." id="name" name="username" value="{{old('username')}}" 
                                class="form-control mb-3 @error('username') border-danger @enderror">
                                @error('username')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                                <label for="email" class="form-label mb-0">Email:</label>
                                <input type="text" placeholder="Email..." id="email" name="email" value="{{old('email')}}"
                                class="form-control mb-3 @error('email') border-danger @enderror">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                                <label for="phone" class="form-label mb-0">Phone:</label>
                                <input type="tel" placeholder="Phone..." id="phone" name="phone" value="{{old('phone')}}"
                                class="form-control mb-3 @error('phone') border-danger @enderror">
                                @error('phone')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                                <label for="password" class="form-label mb-0">Password:</label>
                                <input type="password" placeholder="Password..." id="password" name="password"
                                class="form-control mb-3 @error('password') border-danger @enderror">
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                                <label for="confirmpassword" class="form-label mb-0">Confirm Password:</label>
                                <input type="password" placeholder="Confirm Password..." class="form-control mb-3 @error('password') border-danger @enderror" id="confirmpassword" name="password_confirmation">
                            </div>
                        
                            <button type="submit" class="btn btn_color w-75">
                                Add admin
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-layout>