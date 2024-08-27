<table class="table mb-0">
    <thead class="table-dark">
        <tr>
            <th scope="col" >#</th>
            <th scope="col" >Name</th>
            <th scope="col" >Amount</th>
            <th scope="col" >Description</th>
            <th scope="col" >Type</th>
            <th>Created at</th>
            {{-- <th>Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @php  $i = ($transactions->currentPage() - 1) * $transactions->perPage() + 1; @endphp
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
                <td>{{ $item->description ?? ''}}</td>
                <td>
                    @if ($item->type == 'credit')
                        
                        <span class="badge bg-light-success">Credit</span>
                    @else
                        <span class="badge bg-light-danger">Debit</span>
                    @endif
                </td>
                <td>{{ $item->created_at ?? '' }}</td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        
    </tbody>
</table>
@include('admin._pagination', ['data' => $transactions])