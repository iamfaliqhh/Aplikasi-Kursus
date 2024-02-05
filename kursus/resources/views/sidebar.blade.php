@auth
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('dashboard') }}" style="pointer-events: none;">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role == 'Administrator')
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-book"></i>
                        <span class="nav-text">Data Master </span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('data-merek') }}">Merek</a></li>
                        <li><a href="{{ route('data-tipe') }}">Tipe</a></li>
                        <li><a href="{{ route('data-produk') }}">Produk</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Data History</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('data-pendaftaran') }}">Pendaftaran Garansi</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('data-registration') }}" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Pendaftaran Garansi</span>
                    </a>
                </li>
            @endif
        </ul>
    @endauth