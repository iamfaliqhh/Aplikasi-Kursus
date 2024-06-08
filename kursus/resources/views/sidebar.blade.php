@auth
        <ul class="metismenu" id="menu">
            @if (auth()->user()->role == 'Administrator')
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-book"></i>
                        <span class="nav-text">Data Utama</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('data-merek') }}">Merek Mobil</a></li>
                        <li><a href="{{ route('data-tipe') }}">Tipe Mobil</a></li>
                        <li><a href="{{ route('data-kategori') }}">Kategori Produk</a></li>
                        <li><a href="{{ route('data-produk') }}">Produk</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Histori Data</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('data-pendaftaran') }}">Histori Pendaftaran</a></li>
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