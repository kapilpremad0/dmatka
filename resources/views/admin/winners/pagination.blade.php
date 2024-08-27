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



<script>
    feather.replace();
</script>