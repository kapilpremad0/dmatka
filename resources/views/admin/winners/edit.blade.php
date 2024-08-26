


@extends('admin.layouts.app')

@section('content')


 <!-- BEGIN: Content-->
 <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Game</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.games.index') }}">Game</a>
                                    </li>
                                    <li class="breadcrumb-item active">Create
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

            {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                                            {{$error}}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
            @endif --}}

                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- <h4 class="card-title">Create</h4> --}}
                                </div>
                                <div class="card-body">
                                    <form class="form" action="{{ route('admin.games.update',$game->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                    {{ csrf_field() }}
                                    
                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Name <span class="error"></span></label>
                                                    <input type="text" id="first-name-column" name="name" class="form-control" placeholder="Name"  value="{{ $game->name }}" />
                                                    @error('name')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Hindi Name <span class="error"></span></label>
                                                    <input type="text" id="first-name-column" name="hindi_name" class="form-control" placeholder="Hindi Name"  value="{{ $game->hindi_name }}" />
                                                    @error('hindi_name')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Open Time <span class="error"></span></label>
                                                    <input type="time" id="first-name-column" name="open_time" class="form-control" placeholder="Open Time"  value="{{ $game->open_time }}" />
                                                    @error('open_time')<span class="error text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Close Time <span class="error"></span></label>
                                                    <input type="time" id="first-name-column" name="close_time" class="form-control" placeholder="Close Time"  value="{{ $game->close_time }}" />
                                                    @error('close_time')<span class="error text-danger">{{ $message }}</span>@enderror
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