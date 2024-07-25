@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Profil | Sistem Report of Analysis')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img @if (Auth::user()->role == 'admin') src="{{ asset('argon/img/administrator.png') }}" @else src="{{ asset('argon/img/user.png') }}" @endif
                            alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm text-capitalize">
                            {{ Auth::user()->role }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow">
                    <form role="form" method="POST" action="{{ route('update-profil') }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control" type="text" name="nama"
                                            value="{{ old('nama', auth()->user()->name) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Role</label>
                                        <input class="form-control text-capitalize" type="text"
                                            value="{{ auth()->user()->role }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Your Password</label>
                                        <input class="form-control @if (\Session::has('error-password')) is-invalid @endif"
                                            type="password" name="password" required>
                                        @if (\Session::has('error-password'))
                                            <strong
                                                class="text-danger text-xxs">{{ \Session::get('error-password') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card shadow mt-4">
                    <form role="form" method="POST" action="{{ route('update-password') }}"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Change Password</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Your Password</label>
                                        <input class="form-control @if (\Session::has('current-password')) is-invalid @endif"
                                            type="password" name="current_password" required>
                                        @if (\Session::has('current-password'))
                                            <strong
                                                class="text-danger text-xxs">{{ \Session::get('current-password') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">New Password</label>
                                        <input class="form-control @error('new_password') is-invalid @enderror"
                                            type="password" name="new_password" required>
                                        @error('new_password')
                                            <strong class="text-danger text-xxs">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Confirm Password</label>
                                        <input class="form-control @error('confirm_password') is-invalid @enderror"
                                            type="password" name="confirm_password" required>
                                        @error('confirm_password')
                                            <strong class="text-danger text-xxs">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow card-profile">
                    <img src="{{ asset('argon/img/industries.jpeg') }}" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">

                                <img @if (Auth::user()->role == 'admin') src="{{ asset('argon/img/administrator.png') }}" @else src="{{ asset('argon/img/user.png') }}" @endif
                                    class="rounded-circle
                                            img-fluid border border-2 border-white bg-light">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-center mt-4">
                            <h5>
                                {{ Auth::user()->name }}
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ Auth::user()->email }}
                            </div>
                            <div class="h6 mt-4 text-capitalize">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ Auth::user()->role }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>PT. Surveyor Carbon Consulting Indonesia
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
