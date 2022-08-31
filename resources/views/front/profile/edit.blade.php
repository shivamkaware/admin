@extends('front.layouts.master')
@section('content')
<br><br><br>

                <div class="card">
                    <div class="header">
                        <h4 class="title"> edit profile</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('user.update',$user->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Name:</label>
                                        <input type="text" name="name" class="form-control border-input" value="{{$user->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text"  name="email" class="form-control border-input" value="{{$user->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password"  name="password" class="form-control border-input" value="" >
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password"  name="password" class="form-control border-input" value="" >
                                    </div>
                                    <div class="form-group">
                                        <label>address</label>
                                        <input type="text"  name="address" class="form-control border-input" value="{{$user->address}}" >
                                    </div>


                                </div>

                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update profile</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
