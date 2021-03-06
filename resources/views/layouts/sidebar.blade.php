<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                        class="right-nav-text">Dashboard</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        @if (auth()->user()->pegawai->jabatan == 'Bendahara')
        <li>
            <a href="{{ route('pegawai') }}">
                <div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Pegawai</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('user') }}">
                <div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">User</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('absensi') }}">
                <div class="pull-left"><i class="fa fa-american-sign-language-interpreting mr-20"></i><span
                        class="right-nav-text">Absensi</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('tunjangan') }}">
                <div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Data
                        Tunjangan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('potongan') }}">
                <div class="pull-left"><i class="fa fa-cut mr-20"></i><span class="right-nav-text">Data Potongan</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('jabatan') }}">
                <div class="pull-left"><i class="fa fa-university mr-20"></i><span class="right-nav-text">Data
                        Jabatan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('masa_kerja') }}">
                <div class="pull-left"><i class="fa fa-clock-o mr-20"></i><span class="right-nav-text">Lama Masa
                        Kerja</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('cuti') }}">
                <div class="pull-left"><i class="fa fa-sign-language mr-20"></i><span class="right-nav-text">Data
                        Cuti</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('gaji') }}">
                <div class="pull-left"><i class="fa fa-usd mr-20"></i><span class="right-nav-text">Data Gaji</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
                <div class="pull-left"><i class="fa fa-file mr-20"></i><span class="right-nav-text">Laporan</span></div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="ecom_dr" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('lap.cuti') }}">Cuti</a>
                </li>
                <li>
                    <a href="{{ route('lap.gaji') }}">Rekap Gaji</a>
                </li>
                <li>
                    <a href="{{ route('lap.lembur') }}">Lembur</a>
                </li>
                <li>
                    <a href="{{ route('lap.keterlambatan') }}">Keterlambatan</a>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->user()->pegawai->jabatan == 'Guru')
        <li>
            <a href="{{ route('absensi.guru') }}">
                <div class="pull-left"><i class="fa fa-american-sign-language-interpreting mr-20"></i><span
                        class="right-nav-text">Absensi</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('cuti.guru') }}">
                <div class="pull-left"><i class="fa fa-sign-language mr-20"></i><span class="right-nav-text">Data
                        Cuti</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('gaji.guru') }}">
                <div class="pull-left"><i class="fa fa-usd mr-20"></i><span class="right-nav-text">Data Gaji</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        @endif
        @if (auth()->user()->pegawai->jabatan == 'Kepala Sekolah')
        <li>
            <a href="{{ route('kepsek.gaji') }}">
                <div class="pull-left"><i class="fa fa-american-sign-language-interpreting mr-20"></i><span
                        class="right-nav-text">Laporan Rekap Gaji</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('kepsek.cuti') }}">
                <div class="pull-left"><i class="fa fa-sign-language mr-20"></i><span class="right-nav-text">Laporan
                        Cuti</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('kepsek.lembur') }}">
                <div class="pull-left"><i class="fa fa-usd mr-20"></i><span class="right-nav-text">Laporan Lembur</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('kepsek.terlambat') }}">
                <div class="pull-left"><i class="fa fa-universal-access mr-20"></i><span class="right-nav-text">Laporan Keterlambatan</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        @endif
    </ul>
</div>
