
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
                            <h2 class="content-header-title float-start mb-0">Winner History</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{  route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.winners.index') }}">winners</a>
                                    </li>
                                    <li class="breadcrumb-item active">List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="text-align: end">
                    {{-- <a href="{{ route('admin.winners.create') }}" class=" btn btn-primary btn-gradient round  ">Create</a> --}}
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
                                <h4 class="card-title"></h4>
                                {{-- <div class="col-md-3" style="text-align: end">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                </div> --}}
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
                                            <th scope="col" >Winning Amount</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php  $i = ($winners->currentPage() - 1) * $winners->perPage() + 1; @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td >{{ $i }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="fw-bolder">
                                                                <a href="{{ route('admin.winners.edit',$item->id) }}">
                                                                    {{ $item->user->name ?? '' }}
                                                                </a>
                                                            </div>
                                                            <div class="font-small-2 text-muted">{{ $item->user->mobile ?? '' }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->game->name ?? ''}}</td>
                                                <td>{{ $item->bid->number ?? ''}}</td>
                                                <td>₹{{ $item->bid->amount ?? 0 }}</td>
                                                <td class="uppercase">{{ $item->bid->type ?? ''}}</td>
                                                <td><strong>₹{{ $item->amount ?? 0 }}</strong></td>
                                                <td>{{ $item->created_at ?? '' }}</td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                @include('admin._pagination', ['data' => $winners])
                            </div>
                            
                            {{-- <div class="table-responsive">
                                <table class="table mb-0">
                                    <!-- ... (your table structure) ... -->
                                </table>
                                {{ $winners->links('admin._pagination') }}
                            </div> --}}
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
        $('#searchInput').on('input', function () {
            fetch_data($(this).val());
        });

        function fetch_data(query = '') {
            $.ajax({
                url: "",
                method: 'GET',
                data: {search: query},
                dataType: 'html',
                success: function (data) {
                    $('#table-responsive').html(data);
                }
            });
        }


    });

</script>

@endsection