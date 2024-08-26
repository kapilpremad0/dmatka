


@extends('admin.layouts.app')

@section('content')


 <!-- BEGIN: Content-->
 <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">

                @include('admin.user.show.tab-bar')
            

                
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Update Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    
                                        @method('put')  

                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Name <span class="error"></span></label>
                                                    <input type="text" id="first-name-column" name="name" class="form-control" placeholder="Name"  value="{{ $user->name }}" />
                                                    @error('name')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Mobile <span class="error"></span></label>
                                                    <input type="text" readonly id="first-name-column" name="mobile" class="form-control" placeholder="Mobile"  value="{{ $user->mobile }}" />
                                                    @error('hindi_name')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Email <span class="error"></span></label>
                                                    <input type="text" readonly id="first-name-column" name="email" class="form-control" placeholder="Email"  value="{{ $user->email }}" />
                                                    @error('email')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">State<span class="error"></span></label>
                                                    <input type="text" id="first-name-column" name="state" class="form-control" placeholder="State"  value="{{ $user->state }}" />
                                                    @error('state')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-1">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label" for="login-password">Password</label>
                                                </div>
                                                <div class="input-group input-group-merge form-password-toggle">
                                                    <input type="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" value="{{ $user->password_2 }}" />
                                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <div class="d-flex flex-column">
                                                        <label class="form-check-label mb-50" for="customSwitch3">Status</label>
                                                        <div class="form-check form-check-primary form-switch">
                                                            <input type="checkbox" name="status" checked class="form-check-input" id="customSwitch3" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    
@endsection