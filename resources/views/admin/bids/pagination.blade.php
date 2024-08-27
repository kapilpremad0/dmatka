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

<script>
    feather.replace();
</script>