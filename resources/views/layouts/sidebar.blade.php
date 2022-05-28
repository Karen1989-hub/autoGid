<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/logo.svg')}}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">                
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Auto Gid</h5>
                  <span></span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Изменить пароль</p>
                  </div>
                </a>
                <a href="{{route('showCheckEstablishment')}}" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Проверить по карте</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Навигация</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              
              <span class="menu-title">Экскурсии</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('showAdminHomePage')}}">Добовление экскурсии</a></li>                
                <li class="nav-item"> <a class="nav-link" href="{{route('showAddDostoprimToExcursPage')}}">Прикрепить <br>достопримечательность</a></li>  
                <li class="nav-item"> <a class="nav-link" href="{{route('showEditExcursionPage')}}">Редоктировать <br>экскурсии</a></li>              
              </ul>
            </div>
          </li>          
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Достопримечательности</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('showDostoprimCreateForm')}}">Добовление<br> достопримечательности</a></li>                
              </ul>
               <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('showDeletDostoprimPage')}}">Удаление<br> достопримечательностей</a></li>                
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('showEditDostoprimPage')}}">Редоктировать<br> достопримечательност</a></li>                
              </ul>              
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" id='clientObjs' href="#auth" aria-expanded="false" aria-controls="auth">
              
              <span class="menu-title">Завeдения клиентов</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('showAddEstablishmentPage')}}">Добавление завeдения</a></li>                
                <li class="nav-item"> <a class="nav-link" href="{{route('showDeleteEstablishmentPage')}}">Удаление<br>заведения</a></li>  
                <li class="nav-item"> <a class="nav-link" href="{{route('showEditEstablishmentPage')}}">Редактировать <br>заведения</a></li>              
              </ul>
            </div>
          </li>
             
        </ul>        
      </nav>