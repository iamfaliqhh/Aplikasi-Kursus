@auth
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('dashboard') }}">
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
                        <li><a href="{{ route('data-user') }}">Garansi</a></li>
                        <li><a href="{{ route('data-sekolah') }}">Merek & Tipe Mobil</a></li>
                        <li><a href="{{ route('data-produk') }}">Produk</a></li>
                        <li><a href="{{ route('data-merek') }}">Merek</a></li>

                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Data History</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('data-registration') }}">Pendaftaran</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('data-registration') }}" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Pendaftaran</span>
                    </a>
                </li>
            @endif
        </ul>
    @endauth