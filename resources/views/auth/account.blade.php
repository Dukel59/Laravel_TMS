@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <span class="h4">Profile</span>
            <p class="text-muted">Change your account information</p>
        </div>
        <div class="card-body">
            <form action="{{ route('account.update') }}" method="POST">
                @csrf
                <div class="tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tabProfile" role="tab" aria-controls="home" aria-selected="true">Profile information</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabProfile" role="tabpanel" aria-labelledby="tab-profile">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{ $user->information?->first_name }}" placeholder="Enter your first name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $user->information?->last_name }}" placeholder="Enter your last name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="gender">Date of Birth</label>
                                    <input class="form-control" type="date" value="{{ $user->information?->birthday }}" name="birthday">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sex">Gender</label>
                                    <select class="form-control" name="sex">
                                        <option value="">Select your gender</option>
                                        <option value="female" @if($user->information?->sex == 'female') selected @endif>Female</option>
                                        <option value="male"@if($user->information?->sex == 'male') selected @endif>Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Telephone</label>
                                    <input class="form-control" type="tel" value="{{ $user->information?->phone }}" name="phone" placeholder="Enter your phone number">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="description">About me</label>
                                    <textarea name="description" class="form-control" placeholder="About me" rows="9" cols="50">
                                        {{ $user->information?->description }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($errors->all() as $key => $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                @endforeach
                <div class="mt-4">
                    <button type="submit" class="btn btn-sm">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
