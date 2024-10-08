@extends('admin.layouts.app')
@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body" id="set_data">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <!-- Medal Card -->
                    {{-- <div class="col-xl-4 col-md-6 col-12">
                        <div class="card card-congratulation-medal">
                            <div class="card-body">
                                <h5>Congratulations 🎉 John!</h5>
                                <p class="card-text font-small-3">You have won gold medal</p>
                                <h3 class="mb-75 mt-2 pt-50">
                                    <a href="#">$48.9k</a>
                                </h3>
                                <button type="button" class="btn btn-primary">View Sales</button>
                                <img src="{{ asset('public/admin/app-assets/images/illustration/badge.svg')}}')}}" class="congratulation-medal" alt="Medal Pic" />
                            </div>
                        </div>
                    </div> --}}
                    <!--/ Medal Card -->

                    <!-- Statistics Card -->
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Statistics</h4>
                                {{-- <div class="d-flex align-items-center"> --}}
                                    {{-- <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p> --}}
                                {{-- </div> --}}
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-1 mb-2 mb-xl-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-primary me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $data['total_game'] }}</h4>
                                                <p class="card-text font-small-3 mb-0">Total Games</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-1 mb-2 mb-xl-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-info me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="users" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $data['total_user'] }}</h4>
                                                <p class="card-text font-small-3 mb-0">Users Count</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-1 mb-2 mb-sm-0">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-danger me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="user" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $data['today_bids'] }}</h4>
                                                <p class="card-text font-small-3 mb-0">Today Bids</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6 col-12 mb-1">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-success me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="trending-up" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $data['today_total_bids_amount'] }}</h4>
                                                <p class="card-text font-small-3 mb-0">Today Bids Amount</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6 col-12 mb-1">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-success me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="trending-up" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $data['today_winning'] }}</h4>
                                                <p class="card-text font-small-3 mb-0">Today Winning</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6 col-12 mb-1">
                                        <div class="d-flex flex-row">
                                            <div class="avatar bg-light-success me-2">
                                                <div class="avatar-content">
                                                    <i data-feather="trending-up" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="fw-bolder mb-0">{{ $data['total_winning'] }}</h4>
                                                <p class="card-text font-small-3 mb-0">Total Winning</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Statistics Card -->




                </div>
                
            </section>
            <!-- Dashboard Ecommerce ends -->


            <section id="ajax-datatable">
                <!-- Responsive tables start -->
                <div class="row" >
                    <div class="col-12">
                        <div class="card card-company-table">
                            <div class="card-header">
                                <h4 class="card-title">Latest Users</h4>
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
                                            <th scope="col" >Wallet Amount</th>
                                            <th scope="col" >Email</th>
                                            <th scope="col" >State</th>
                                            <th scope="col" >Password</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php  $i = 1; @endphp
                                        @foreach ($users as $item)
                                            <tr>
                                                <td >{{ $i }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="fw-bolder">
                                                                <a href="{{ route('admin.users.show',$item->id) }}">
                                                                    {{ $item->name ?? '' }}
                                                                </a>
                                                            </div>
                                                            <div class="font-small-2 text-muted">{{ $item->mobile ?? '' }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>₹{{ $item->wallet_amount ?? 0 }}</td>
                                                <td>{{ $item->email ?? ''}}</td>
                                                <td>{{ $item->state ?? ''}}</td>
                                                <td>{{ $item->password ?? '' }}</td>
                                                <td>{{ $item->created_at ?? '' }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            
                                                            <a class="dropdown-item" href="{{route('admin.users.show',$item->id)}}">
                                                                <i data-feather="edit-2" class="me-50"></i>
                                                                <span>Edit</span>
                                                            </a>
                                                            
                                                            {{-- <a class="dropdown-item" href="{{route('admin.users.show',$item->id)}}">
                                                                <i data-feather="eye" class="me-50"></i>
                                                                <span>View</span>
                                                            </a> --}}
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#danger_ke{{ $item->id }}">
                                                                <i data-feather="trash" class="me-50"></i>
                                                                <span>Delete</span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade modal-danger text-start" id="danger_ke{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myModalLabel120">Delete</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete !
                                                                    </div>
                                                                    <form action="{{route('admin.users.destroy',$item->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            {{-- <div class="table-responsive">
                                <table class="table mb-0">
                                    <!-- ... (your table structure) ... -->
                                </table>
                                {{ $users->links('admin._pagination') }}
                            </div> --}}
                        </div>
                    </div>
                </div>
           <!-- Responsive tables end -->
           </section>


           <section id="ajax-datatable">
            <!-- Responsive tables start -->
            <div class="row" >
                <div class="col-12">
                    <div class="card card-company-table">
                        <div class="card-header">
                            <h4 class="card-title">Withdrawl Request</h4>
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
                                        <th scope="col" >Amount</th>
                                        <th scope="col" >Description</th>
                                        <th scope="col" >Type</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php  $i = 1; @endphp
                                    @foreach ($withdrawls as $item)
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
                                            @if (!empty($item->upi_id))
                                                <ul>
                                                    <li>UPI ID : {{ $item->upi_id }}</li>
                                                </ul>
                                            @else
                                                <ul>
                                                    <li>Bank Name : {{ $item->bank_name }}</li>
                                                    <li>Bank Account Number : {{ $item->bank_account_number }}</li>
                                                    <li>Bank IFSC : {{ $item->bank_ifsc }}</li>
                                                    <li>Bank Holder Name : {{ $item->name }}</li>
                                                    <li>Mobile : {{ $item->mobile }}</li>
                                                </ul>    
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
                                                                <form action="{{route('admin.change_withdrawl_request')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" id="" value="{{ $item->id }}" name="id">
                                                                    <input type="hidden" id="" value="2" name="status">
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
                                                                <form action="{{route('admin.change_withdrawl_request')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" id="" value="{{ $item->id }}" name="id">
                                                                    <input type="hidden" id="" value="1" name="status">
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
                        </div>
                        
                        {{-- <div class="table-responsive">
                            <table class="table mb-0">
                                <!-- ... (your table structure) ... -->
                            </table>
                            {{ $users->links('admin._pagination') }}
                        </div> --}}
                    </div>
                </div>
            </div>
       <!-- Responsive tables end -->
       </section>

        </div>
    </div>
</div>



{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        
        let intervalId;
        intervalId = setInterval(fetch_data, 5000);

    

        document.body.addEventListener('click', function(event) {
            const clickedElement = event.target;
            if (clickedElement && clickedElement.classList.contains('btn')) {
                clearInterval(intervalId);
            }
        });

       

        function fetch_data() {
            
            $.ajax({
                url: "",
                method: 'GET',
                data: {},
                dataType: 'html',
                success: function (data) {
                    $('#set_data').html(data);
                }
            });
        }

    });




</script> --}}




{{-- <script>
    // Function to execute repeatedly
    function doSomething() {
        console.log('Interval is running...');
    }

    let intervalId;
    const button = document.getElementById('button');

    // Start interval when mouse is pressed down
    button.addEventListener('mousedown', function() {
        intervalId = setInterval(doSomething, 1000);
    });

    // Stop interval when mouse is released
    button.addEventListener('mouseup', function() {
        clearInterval(intervalId);
    });

    // Stop interval if mouse leaves the button
    button.addEventListener('mouseleave', function() {
        clearInterval(intervalId);
    });
</script> --}}


@endsection