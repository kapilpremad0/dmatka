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
        @php  $i = ($withdrawls->currentPage() - 1) * $withdrawls->perPage() + 1; @endphp
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
@include('admin._pagination', ['data' => $withdrawls])


<script>
    feather.replace();
</script>