@extends('front.layouts.master')
@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <h2 class="card-title">Login</h2>
                    <hr>

                    <form action="{{route('user.login')}}" method="get">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control" value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="passowrd" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Login</button>
                        </div>

                    </form>

                </div>
            </div>


        </div>

    </div>

</div>

@endsection
