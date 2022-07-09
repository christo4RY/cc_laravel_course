<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h1 class="text-center text-primary my-3">Register Form</h1>
                <div class="card my-3 p-3">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" required value="{{old('name')}}" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" name="username" required value="{{old('username')}}" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('username')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" required class="form-control" value="{{old('email')}}" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" required name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
