
<table class="table mb-0">
    <thead class="table-dark">
        <tr>
            <th scope="col" >#</th>
            <th scope="col" >Description</th>
            <th scope="col" >Amount</th>
            <th scope="col" >Type</th>
            <th>Created at</th>
        </tr>
    </thead>
    <tbody>
        @php  $i = ($transactions->currentPage() - 1) * $transactions->perPage() + 1; @endphp
        @foreach ($data as $item)
            <tr>
                <td >{{ $i }}</td>
                <td>{{ $item->description ?? ''}}</td>
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
@include('admin._pagination', ['data' => $transactions])

<script>
    feather.replace();
</script>