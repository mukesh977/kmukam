<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link" target="_blank">
    <img src="{{ asset('backend/layout/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Khabar - Mukam</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('backend/layout/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <?php $authUser = Auth::user(); //dd(Auth::user()->roles); ?>
        <a href="#"
          class="d-block">{{ (!empty($authUser)? $authUser->name : '') .' ('. (!empty($authUser->roles)? $authUser->roles[0]->description : '') .')' }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <?php
          $dashboardOpen = '';
          $dashboardMain = '';
          
          if((\Request::is('admin/dashboard/*')) || (\Request::is('admin/dashboard')))
          {
            $dashboardOpen = 'menu-open';
            $dashboardMain = 'active';
          }
         
        ?>

        <li class="nav-item {{ $dashboardOpen }}">
          <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ $dashboardMain }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <?php
          $advertisementOpen = '';
          $advertisementMain = '';
          $homeAdBranch = '';
          $catAdBranch = '';
          $newsDetailBranch = '';

          if((\Request::is('admin/home-advertisement')) || (\Request::is('admin/home-advertisement/*')))
          {
            $advertisementOpen = 'menu-open';
            $advertisementMain = 'active';
            $homeAdBranch = 'active';
          }
          else if((\Request::is('admin/category-advertisement')) || (\Request::is('admin/category-advertisement/*')))
          {
            $advertisementOpen = 'menu-open';
            $advertisementMain = 'active';
            $catAdBranch = 'active';
          }
          else if((\Request::is('admin/news-detail-advertisement')) || (\Request::is('admin/news-detail-advertisement/*')))
          {
            $advertisementOpen = 'menu-open';
            $advertisementMain = 'active';
            $newsDetailBranch = 'active';
          }
        ?>
        <li class="nav-item has-treeview {{ $advertisementOpen }}">
          <a href="#" class="nav-link {{ $advertisementMain }}">
            <i class="nav-icon fas fa-ad nav-icon"></i>
            <p>
              Advertisement
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('backend.home-advertisement.index') }}" class="nav-link {{ $homeAdBranch }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Home Advertisement</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('backend.category-advertisement.index') }}" class="nav-link {{ $catAdBranch }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Category Advertisement</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('backend.news-detail-advertisement.index') }}" class="nav-link {{ $newsDetailBranch }}">
                <i class="far fa-circle nav-icon"></i>
                <p>News Detail Advertisement</p>
              </a>
            </li>

          </ul>
        </li>

        <?php
          $authorOpen = '';
          $authorMain = '';
          
          if((\Request::is('admin/author/*')) || (\Request::is('admin/author')))
          {
            $authorOpen = 'menu-open';
            $authorMain = 'active';
          }
         
        ?>
        <li class="nav-item {{ $authorOpen }}">
          <a href="{{ route('backend.author.index') }}" class="nav-link {{ $authorMain }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Author</p>
          </a>
        </li>

        <?php
          $categoryOpen = '';
          $categoryMain = '';
          
          if((\Request::is('admin/category/*')) || (\Request::is('admin/category')))
          {
            $categoryOpen = 'menu-open';
            $categoryMain = 'active';
          }
         
        ?>
        <li class="nav-item {{ $categoryOpen }}">
          <a href="{{ route('backend.category.index') }}" class="nav-link {{ $categoryMain }}">
            <i class="nav-icon fas fa-tag"></i>
            <p>Category</p>
          </a>
        </li>

        <?php
          $chooseCategoryOpen = '';
          $chooseCategoryMain = '';
          
          if(\Request::is('admin/choose-category'))
          {
            $chooseCategoryOpen = 'menu-open';
            $chooseCategoryMain = 'active';
          }
         
        ?>
        <li class="nav-item {{ $chooseCategoryOpen }}">
          <a href="{{ route('backend.choose-category.index') }}" class="nav-link {{ $chooseCategoryMain }}">
            <i class="nav-icon fas fa-tags"></i>
            <p>Choose Category</p>
          </a>
        </li>

        <?php
          $homepageSeoOpen = '';
          $homepageSeoMain = '';
          
          if(\Request::is('admin/homepage/seo'))
          {
            $homepageSeoOpen = 'menu-open';
            $homepageSeoMain = 'active';
          }
         
        ?>
        <li class="nav-item {{ $homepageSeoOpen }}">
          <a href="{{ url('/admin/homepage/seo') }}" class="nav-link {{ $homepageSeoMain }}">
            <i class="fas fa-search nav-icon"></i>
            <p>Homepage Seo</p>
          </a>
        </li>

        <?php
          $mediaLibraryOpen = '';
          $mediaLibraryMain = '';
          $newsMediaLibraryBranch = '';
          $adMediaLibraryBranch = '';

          if((\Request::is('admin/media-library')) || (\Request::is('admin/media-library/*')))
          {
            $mediaLibraryOpen = 'menu-open';
            $mediaLibraryMain = 'active';
            $newsMediaLibraryBranch = 'active';
          }
          else if((\Request::is('admin/ad-media-library')) || (\Request::is('admin/ad-media-library/*')))
          {
            $mediaLibraryOpen = 'menu-open';
            $mediaLibraryMain = 'active';
            $adMediaLibraryBranch = 'active';
          }
        ?>
        <li class="nav-item has-treeview {{ $mediaLibraryOpen }}">
          <a href="#" class="nav-link {{ $mediaLibraryMain }}">
            <i class="nav-icon far fa-images nav-icon"></i>
            <p>
              Media Library
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('backend.media-library.index') }}" class="nav-link {{ $newsMediaLibraryBranch }}">
                <i class="far fa-circle nav-icon"></i>
                <p>News Media Library</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('backend.ad-media-library.index') }}" class="nav-link {{ $adMediaLibraryBranch }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Ad Media Library</p>
              </a>
            </li>

          </ul>
        </li>

        <?php
          $newsOpen = '';
          $newsMain = '';
          $newsListBranch = '';
          $newsAddBranch = '';

          if(\Request::is('admin/news/create'))
          {
            $newsOpen = 'menu-open';
            $newsMain = 'active';
            $newsAddBranch = 'active';
          }
          else if((\Request::is('admin/news')) || (\Request::is('admin/news/*')))
          {
            $newsOpen = 'menu-open';
            $newsMain = 'active';
            $newsListBranch = 'active';
          }
        ?>
        <li class="nav-item has-treeview {{ $newsOpen }}">
          <a href="#" class="nav-link {{ $newsMain }}">
            <i class="nav-icon far fa-newspaper nav-icon"></i>
            <p>
              News
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('backend.news.index') }}" class="nav-link {{ $newsListBranch }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List News</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('backend.news.create') }}" class="nav-link {{ $newsAddBranch }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add News</p>
              </a>
            </li>

          </ul>
        </li>

        <?php
          $pageOpen = '';
          $pageMain = '';
          
          if((\Request::is('admin/page/*')) || (\Request::is('admin/page')))
          {
            $pageOpen = 'menu-open';
            $pageMain = 'active';
          }
         
        ?>
        <li class="nav-item {{ $pageOpen }}">
          <a href="{{ route('backend.page.index') }}" class="nav-link {{ $pageMain }}">
            <i class="nav-icon far fa-file"></i>
            <p>Page</p>
          </a>
        </li>

        <?php
          $settingOpen = '';
          $settingMain = '';
          
          if(\Request::is('admin/setting'))
          {
            $settingOpen = 'menu-open';
            $settingMain = 'active';
          }
         
        ?>
        <li class="nav-item {{ $settingOpen }}">
          <a href="{{ route('backend.setting.index') }}" class="nav-link {{ $settingMain }}">
            <i class="nav-icon fas fa-cog"></i>
            <p>Setting</p>
          </a>
        </li>

        <?php
          $teamOpen = '';
          $teamMain = '';
          $teamBranch = '';
          $teamCategoryBranch = '';

          if((\Request::is('admin/team/category')) || (\Request::is('admin/team/category/*')))
          {
            $teamOpen = 'menu-open';
            $teamMain = 'active';
            $teamCategoryBranch = 'active';
          }
          else if((\Request::is('admin/team')) || (\Request::is('admin/team/*')))
          {
            $teamOpen = 'menu-open';
            $teamMain = 'active';
            $teamBranch = 'active';
          }
        ?>
        <li class="nav-item has-treeview {{ $teamOpen }}">
          <a href="#" class="nav-link {{ $teamMain }}">
            <i class="fas fa-users nav-icon"></i>
            <p>
              Team
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ url('/admin/team') }}" class="nav-link {{ $teamBranch }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Team</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('/admin/team/category') }}" class="nav-link {{ $teamCategoryBranch }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Team Category</p>
              </a>
            </li>

          </ul>
        </li>

        <?php
          $trendOpen = '';
          $trendMain = '';

          if(\Request::is('admin/trend/*'))
          {
            $trendOpen = 'menu-open';
            $trendMain = 'active';
            $trendCategoryBranch = 'active';
          }          
        ?>        
        <li class="nav-item {{ $trendOpen }}">
          <a href="{{ route('backend.trend.index') }}" class="nav-link {{ $trendMain }}">
            <i class="fas fa-fire"></i>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trend</p>
          </a>
        </li>

        <?php
          $userOpen = '';
          $userMain = '';
          
          if((\Request::is('admin/user/*')) || (\Request::is('admin/user')))
          {
            $userOpen = 'menu-open';
            $userMain = 'active';
          }
        ?>

        <li class="nav-item {{ $userOpen }}">
          <a href="{{ url('/admin/user') }}" class="nav-link {{ $userMain }}">
            <i class="nav-icon fas fa-users"></i>
            <p>User Management</p>
          </a>
        </li>

        <li class="nav-item {{ $userOpen }}">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i> logout
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>