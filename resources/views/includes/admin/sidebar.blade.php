<!-- Sidebar -->
      <!--
          Sidebar Mini Mode - Display Helper classes

          Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
          Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
              If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

          Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
          Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
          Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
      -->
      <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="content-header">
          <!-- Logo -->
          <a class="fw-semibold text-dual" href="{{route('dashboard')}}">
            <span class="smini-visible">
              <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span>
              <img src="{{url('gambar/logo.png')}}" alt="">
            </span>
            {{-- <span class="smini-hide fs-5 tracking-wider">One<span class="fw-normal">UI</span></span> --}}
          </a>
          <!-- END Logo -->

          <!-- Extra -->
          <div>

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
              <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
          </div>
          <!-- END Extra -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side Navigation -->
          <div class="content-side">
            <ul class="nav-main">
              <li class="nav-main-item">
                <a class="nav-main-link active" href="{{route('dashboard')}}">
                  <i class="nav-main-link-icon si si-speedometer"></i>
                  <span class="nav-main-link-name">Dashboard</span>
                </a>
              </li>
              <li class="nav-main-heading">User Interface</li>
              @if (auth()->user()->role == 'ADMIN')
                <li class="nav-main-item">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-folder"></i>
                    <span class="nav-main-link-name">Data Master</span>
                  </a>
                  <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('unit.index')}}">
                        <span class="nav-main-link-name">Unit</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('tahunajaran.index')}}">
                        <span class="nav-main-link-name">Tahun Ajaran</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('guru.index')}}">
                        <span class="nav-main-link-name">Guru</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('indikatornilai.index')}}">
                        <span class="nav-main-link-name">Indikator Nilai</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('penilai.index')}}">
                        <span class="nav-main-link-name">Penilai</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('user.index')}}">
                        <span class="nav-main-link-name">User</span>
                      </a>
                    </li>
                  </ul>
                </li>
              @endif
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon si si-bar-chart"></i>
                  <span class="nav-main-link-name">Penilaian</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('nilaiGuru')}}">
                      <span class="nav-main-link-name">Nilai</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    @if(!in_array(Auth::user()->role, ['GURU', 'RK', 'OS']))
                        <a class="nav-main-link" href="{{ route('nilai') }}">
                            <span class="nav-main-link-name">Rekap Nilai</span>
                        </a>
                    @endif
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
      </nav>
      <!-- END Sidebar -->