
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
                            <h2 class="content-header-title float-start mb-0">Fund Request</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{  route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.transactions.index') }}">Fund Request</a>
                                    </li>
                                    <li class="breadcrumb-item active">List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="text-align: end">
                    {{-- <a href="{{ route('admin.transactions.create') }}" class=" btn btn-primary btn-gradient round  ">Create</a> --}}
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
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-select select2">
                                        <option value="">(Select Status)</option>
                                        <option value="0" {{ request()->status == '0' ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ request()->status == '1' ? 'selected' : '' }}>Approved</option>
                                        <option value="2" {{ request()->status == '2' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="">User</label>
                                    <select name="user_id" id="user_id" class="form-select select2">
                                        <option value="">(Select User)</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}" {{ request()->user_id == $item->id ? 'selected' : '' }} >{{ $item->name }} ({{ $item->mobile }})</option>
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
                                            <th scope="col" >Amount</th>
                                            <th scope="col" >Image</th>
                                            <th scope="col" >Type</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php  $i = ($funds->currentPage() - 1) * $funds->perPage() + 1; @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td >{{ $i }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="fw-bolder">
                                                                <a href="#">
                                                                    {{ $item->user->name ?? '' }}
                                                                </a>
                                                            </div>
                                                            <div class="font-small-2 text-muted">{{ $item->user->mobile ?? '' }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>₹{{ $item->amount ?? 0 }}</td>
                                                <td>
                                                    @if (!empty($item->image))
                                                        <a href="{{ $item->image }}" target="_blank">
                                                            <i data-feather="eye"></i>
                                                        </a>    
                                                    @endif
                                                </td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->created_at ?? '' }}</td>

                                                <td>
                                                    @if ($item->status == 'Pending')
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#accept_{{ $item->id }}">
                                                                    <i data-feather="plus"></i>
                                                                    <span>Accept</span>
                                                                </a>
        
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reject_{{ $item->id }}">
                                                                    <i data-feather='x'></i>
                                                                    <span>Reject</span>
                                                                </a>
        
                                                            </div>
                                                        </div>
        
                                                        <div class="modal fade modal-danger text-start" id="reject_{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel120">Reject</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to reject !
                                                                        </div>
                                                                        <form action="{{route('admin.fund.index')}}" method="GET">
                                                                            @csrf
                                                                            <input type="hidden" id="" value="{{ $item->id }}" name="id">
                                                                            <input type="hidden" id="" value="2" name="status">
                                                                            <input type="hidden" name="change_status" value="true">
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-danger">Reject</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                            </div>
                                                        </div>
        
                                                        <div class="modal fade modal-danger text-start" id="accept_{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel120">Accept</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to accept !
                                                                        </div>
                                                                        <form action="{{route('admin.fund.index')}}" method="GET">
                                                                            @csrf
                                                                            <input type="hidden" id="" value="{{ $item->id }}" name="id">
                                                                            <input type="hidden" id="" value="1" name="status">
                                                                            <input type="hidden" name="change_status" value="true">
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-danger">Accept</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                            </div>
                                                        </div>

                                                    @else
                                                        {{ $item->status }}
                                                    @endif
    
    
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                        
                                    </tbody>
                                </table>

                                @include('admin._pagination', ['data' => $funds])


                            </div>
                            
                            {{-- <div class="table-responsive">
                                <table class="table mb-0">
                                    <!-- ... (your table structure) ... -->
                                </table>
                                {{ $transactions->links('admin._pagination') }}
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
        $('#date_from , #date_to , #user_id , #status').on('input', function () {
            fetch_data();
        });

        function fetch_data() {
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();
            var user_id = $('#user_id').val();
            var status = $('#status').val();

            $.ajax({
                url: "?page=1",
                method: 'GET',
                data: {date_from: date_from , date_to:date_to ,status:status , user_id:user_id},
                dataType: 'html',
                success: function (data) {
                    $('#table-responsive').html(data);
                }
            });
        }


    });

</script>

@endsection