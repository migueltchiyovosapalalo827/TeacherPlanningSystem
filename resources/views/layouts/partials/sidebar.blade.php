      <!-- ========== Left Sidebar Start ========== -->
      <div class="leftside-menu">

          <!-- LOGO -->
          <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
              <span class="logo-lg">
                  <img src="{{ Vite::asset('resources/assets/images/logo.png') }}" alt="" height="16">
              </span>
              <span class="logo-sm">
                  <img src="{{ Vite::asset('resources/assets/images/logo_sm.png') }}" alt="" height="16">
              </span>
          </a>

          <!-- LOGO -->
          <a href="{{ route('dashboard') }}" class="logo text-center logo-dark">
              <span class="logo-lg">
                  <img src="{{ Vite::asset('resources/assets/images/logo-dark.png') }}" alt="" height="16">
              </span>
              <span class="logo-sm">
                  <img src="{{ Vite::asset('resources/assets/images/logo_sm_dark.png') }}" alt=""
                      height="16">
              </span>
          </a>

          <div class="h-100" id="leftside-menu-container" data-simplebar>

              <!--- Sidemenu -->
              <ul class="side-nav">

                  <li class="side-nav-title side-nav-item">Navigation</li>
                  <li class="side-nav-item">
                      <a href="{{ route('dashboard') }}" class="side-nav-link">
                          <i class="uil-home-alt"></i>
                          <span> Dashboards </span>
                      </a>
                  </li>

                  <li class="side-nav-title side-nav-item">Apps</li>

                  <li class="side-nav-item">
                      <a data-bs-toggle="collapse" href="#users"
                          aria-expanded="{{ request()->routeIs('user.*') ? 'true' : 'false' }}"
                          aria-controls="sidebarMultiLevel" class="side-nav-link">
                          <i class="uil-users-alt"></i>
                          <span> Utilizadores </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="users">
                          <ul class="side-nav-second-level">
                              <li>
                                  <a href="{{ route('user.index') }}">Lista de Utilizadores</a>
                              </li>
                              <li>
                                  <a href="{{ route('user.create') }}"> Cadastrar Utilizadores</a>
                              </li>

                          </ul>
                      </div>

                  </li>


                  <li class="side-nav-item">
                      <a data-bs-toggle="collapse" href="#lesson-plan"
                          aria-expanded="{{ request()->routeIs('lesson-plan.*') ? 'true' : 'false' }}"
                          aria-controls="sidebarMultiLevel" class="side-nav-link">
                          <i class="uil-clipboard-notes"></i>
                          <span> Planos de aulas </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="lesson-plan">
                          <ul class="side-nav-second-level">
                              <li>
                                  <a href="{{ route('lesson-plan.index') }}">Lista de planos</a>
                              </li>
                              <li>
                                  <a href="{{ route('lesson-plan.create') }}"> Cadastrar plano de aula</a>
                              </li>

                          </ul>
                      </div>

                  </li>

                  <li class="side-nav-item">
                      <a href="{{ route('resource.index') }}" class="side-nav-link">
                          <i class="uil-home-alt"></i>
                          <span> Recursos </span>
                      </a>
                  </li>
                  <li class="side-nav-item @if (Route::is('roles.*')) active @endif">
                    <a href="{{ route('roles.index') }}"
                       class="side-nav-link"
                       data-toggle="dropdown">
                        <i class="fas fa-lock"></i> <span>Função</span>
                    </a>
                </li>


              </ul>


              <!-- end Help Box -->
              <!-- End Sidebar -->

              <div class="clearfix"></div>

          </div>
          <!-- Sidebar -left -->

      </div>
      <!-- Left Sidebar End -->
