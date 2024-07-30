<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <!-- <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8"> -->
    <span class="brand-text font-weight-light">BoxOffice Buddies</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">Movies</li>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link primary">
            <i class="fas fa-film"></i>
            <p>
              Manage Movies
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="add_movie.php" class="nav-link">
                <i class="fas fa-plus-circle"></i>
                <p>Add Movies</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="view_movie.php" class="nav-link">
                <i class="fas fa-eye"></i>
                <p>View Movies</p>
              </a>
            </li>
          </ul>

        <li class="nav-header">Screen</li>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link primary">
            <i class="fas fa-desktop"></i>
            <p>
              Manage screen
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="add_screen.php" class="nav-link">
              <i class="fas fa-plus-square"></i>
                <p>Add screen</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="view_screen.php" class="nav-link">
              <i class="fas fa-tv"></i>
                <p>View screen</p>
              </a>
            </li>
          </ul>

        <li class="nav-header">Screening</li>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link primary">
            <i class="fas fa-calendar-alt"></i>
            <p>
              Manage showdetails
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="add_showdetails.php" class="nav-link">
                <i class="fas fa-plus-circle"></i>
                <p>Add showdetails</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="view_showdetails.php" class="nav-link">
              <i class="fas fa-eye"></i>
                <p>View showdetails</p>
              </a>
            </li>
          </ul>


        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>