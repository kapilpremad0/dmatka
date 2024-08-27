
@extends('admin.layouts.app')

@section('content')

 <!-- BEGIN: Content-->
<!-- BEGIN: Content-->
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Bid History</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{  route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.bids.index') }}">Bids</a>
                                    </li>
                                    <li class="breadcrumb-item active">List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="text-align: end">
                    {{-- <a href="{{ route('admin.bids.create') }}" class=" btn btn-primary btn-gradient round  ">Create</a> --}}
                </div>
            </div>
            <div class="content-body">

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                                            {{$error}}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
            @endif


                <!-- Ajax Sourced Server-side -->
                <section id="ajax-datatable">
                     <!-- Responsive tables start -->
                <div class="row" >
                    <div class="col-12">
                        <div class="card card-company-table">
                            <div class="card-header">
                                <div class="col-md-2">
                                    <label for="">Date From</label>
                                    <input type="date" class="form-control" id="date_from" value="{{ request()->input('date_from') }}">
                                </div>

                                <div class="col-md-2">
                                    <label for="">Date To</label>
                                    <input type="date" class="form-control" id="date_to" value="{{ request()->input('date_to') }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="">Game</label>
                                    <select name="game_id" id="game_id" class="form-select select2">
                                        <option value="">(Select Game)</option>
                                        @foreach ($games as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="">User</label>
                                    <select name="user_id" id="user_id" class="form-select select2">
                                        <option value="">(Select User)</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->mobile }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="table-responsive" id="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" >#</th>
                                            <th scope="col" >Name</th>
                                            <th scope="col" >Game</th>
                                            <th scope="col" >Bid Number</th>
                                            <th scope="col" >Bid Amount</th>
                                            <th scope="col" >Type</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php  $i = ($bids->currentPage() - 1) * $bids->perPage() + 1; @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td >{{ $i }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="fw-bolder">
                                                                <a href="{{ route('admin.bids.edit',$item->id) }}">
                                                                    {{ $item->user->name ?? '' }}
                                                                </a>
                                                            </div>
                                                            <div class="font-small-2 text-muted">{{ $item->user->mobile ?? '' }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->game->name ?? ''}}</td>
                                                <td>{{ $item->number ?? ''}}</td>
                                                <td><strong>₹{{ $item->amount ?? 0 }}</strong></td>
                                                <td class="uppercase">{{ $item->type ?? ''}}</td>
                                                <td>{{ $item->created_at ?? '' }}</td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                @include('admin._pagination', ['data' => $bids])
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->
                </section>

                <!--/ Ajax Sourced Server-side -->
                
                

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- END: Content-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#date_from , #date_to ,#game_id , #user_id').on('input', function () {
            fetch_data($(this).val());
        });

        function fetch_data(query = '') {
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();
            var game_id = $('#game_id').val();
            var user_id = $('#user_id').val();
            $.ajax({
                url: "?page=1",
                method: 'GET',
                data: {date_from: date_from , date_to:date_to ,game_id:game_id , user_id:user_id},
                dataType: 'html',
                success: function (data) {
                    $('#table-responsive').html(data);
                }
            });
        }


    });

</script>

@endsection