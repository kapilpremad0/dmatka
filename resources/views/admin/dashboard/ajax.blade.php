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
                    <div class="d-flex align-items-center">
                        {{-- <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p> --}}
                    </div>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <i data-feather="box" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $statistics['pending_leads'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">Pending Leads</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-info me-2">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $statistics['users'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">Users Count</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-danger me-2">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $statistics['vendors'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">Pandits Count</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-success me-2">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $statistics['pending_enquiries'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">Pending Enquires</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Card -->
    </div>

   

    <div class="row match-height">
        
        <div class="col-lg-12 col-12">
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" >#</th>
                                    <th scope="col" >Service Name</th>
                                    <th scope="col" >Booking Date-Time</th>
                                    <th scope="col" >City</th>
                                    <th scope="col" >Amount</th>
                                    <th>Mode of Payment</th>
                                    <th>Leads Accepted By</th>
                                    <th>Assigned to</th>
                                </tr>
                            </thead>
                            <tbody>


                                @php  $i =  1; @endphp
                                @foreach ($leads as $item)
                                    <tr>
                                        <td >{{ $i }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{-- <div class="avatar rounded"> --}}
                                                    {{-- <div class="avatar-content">
                                                        <img src="{{ asset('public/uploads/'.$item->service->name)}}" alt="Toolbar svg" width="100%" height="100%"/>
                                                    </div> --}}
                                                {{-- </div> --}}
                                                <div>
                                                    <div class="fw-bolder"><a href="{{ route('admin.leads.show',$item->id) }}" >{{ isset($item->service->name) ? $item->service->name :'' }}</a></div>
                                                    <div class="font-small-2 text-muted">{{ $item->add_ons }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td >
                                            {{ date('d-M-y h:i a',strtotime($item->date_time)) }}
                                        </td>
                                        <td >
                                            {{ $item->city_name }}
                                        </td>
                                        <td >
                                           <span class="text-bold"> ₹{{ $item->total_price }}</span>
                                        </td>
                                        <td>
                                            @if ($item->payment_status == 0)
                                                <span class="badge rounded-pill badge-light-danger">CASH</span>
                                            @elseif  ($item->payment_status == 1)
                                                <span class="badge rounded-pill badge-light-warning">PREPAID</span>
                                            @endif
                                        </td>
                                        <td >
                                            <span class="badge rounded-pill badge-light-warning">{{ $item->lead_accept_count }}</span>
                                            @if ($item->lead_accept_count >= 10 && $item->status == 0)
                                                <span class="badge rounded-pill badge-light-success">Ready to assign</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 0)
                                                <button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#danger_ke{{ $item->id }}">Assign</button>

                                                <div class="modal fade modal-success text-start" id="danger_ke{{ $item->id }}" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myModalLabel120">Assign to pandit</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @if ($item->lead_accept_count > 0)
                                                                        <table class="table">
                                                                            <head>
                                                                                <tr>
                                                                                    <th>Pandit Name</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </head>
                                                                            <tbody>
                                                                                @foreach ($item->accepted_vendors as $user_accepted)
                                                                                <tr>
                                                                                    <td>{{ $user_accepted->first_name }} {{ $user_accepted->last_name }}</td>
                                                                                    <td>
                                                                                        <form action="{{ route('admin.leads.lead_assign') }}" method="POST">
                                                                                                @csrf
                                                                                            <input type="hidden" name="vendor_id" value="{{ $user_accepted->id }}">
                                                                                            <input type="hidden" name="lead_id" value="{{ $item->id }}">
                                                                                            <button>Assign</button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>    
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    @else
                                                                        {{-- <span class="badge rounded-pill badge-light-danger">Ready to assign</span> --}}
                                                                    @endif
                                                                    
                                                                    <br>

                                                                    <form action="{{ route('admin.leads.lead_assign') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="lead_id" value="{{ $item->id }}">
                                                                    <div class="col-md-12 mb-2">
                                                                        <label for="">Select another pandit</label>
                                                                        <select name="vendor_id" id="" class="form-select select2" required>
                                                                            <option value="">Select Pandit</option>
                                                                            @foreach ($item->vendors as $vendor_assign)
                                                                                <option value="{{ $vendor_assign->id }}">{{ $vendor_assign->first_name }} {{ $vendor_assign->last_name }} ({{ $vendor_assign->mobile }}) ; Pincode : {{ $vendor_assign->pincode ?? '' }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger" >Assign</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                    </div>
                                                </div>
                                            @else
                                                <a href="{{ route('admin.vendors.show',$item->vendor_id) }}"><strong>{{ isset($item->vendor->first_name) ? $item->vendor->first_name  : '' }} {{ isset($item->vendor->last_name) ? $item->vendor->last_name  : '' }} </strong> </a>
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
                </div>
            </div>
        </div>
        
    </div> 
</section>



<script>
    feather.replace();
</script>
