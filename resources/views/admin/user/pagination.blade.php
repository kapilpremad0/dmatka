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
        @php  $i = ($users->currentPage() - 1) * $users->perPage() + 1; @endphp
        @foreach ($data as $item)
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
                            <div class="font-small-2 text-muted">{{ $item->referral_code }} | {{ $item->mobile ?? '' }}</div>
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
@include('admin._pagination', ['data' => $users])

<script>
    feather.replace();
</script>