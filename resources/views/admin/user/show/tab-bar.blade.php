<ul class="nav nav-pills mb-2">
    <!-- account -->
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('admin.users.show') ? 'active' : '' }}" href="{{ route('admin.users.show',$user->id) }}">
            <i data-feather="user" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Detail</span>
        </a>
    </li>
    <!-- security -->
    
    <!-- billing and plans -->
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('admin.users.bids') ? 'active' : '' }}" href="{{ route('admin.users.bids',$user->id) }}">
            <i data-feather="bookmark" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Bid History</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('admin.users.transactions') ? 'active' : '' }}" href="{{ route('admin.users.transactions',$user->id) }}">
            <i data-feather="bookmark" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Wallet Transaction</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('admin.users.winners') ? 'active' : '' }}" href="{{ route('admin.users.winners',$user->id) }}">
            <i data-feather="bookmark" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Winner</span>
        </a>
    </li>
</ul>