<nav id="toolbar" class="bg-white">

    <div class="row no-gutters align-items-center flex-nowrap">

        <div class="col">

            <div class="row no-gutters align-items-center flex-nowrap">

                <button type="button" class="toggle-aside-button btn btn-icon d-block d-lg-none" data-fuse-bar-toggle="aside">
                    <i class="icon icon-menu"></i>
                </button>

                <div class="toolbar-separator d-block d-lg-none"></div>

                <div class="shortcuts-wrapper row no-gutters align-items-center px-0 px-sm-2">

                    <div class="shortcuts row no-gutters align-items-center d-none d-md-flex">

                        <a href="../site/index.php" class="shortcut-button btn btn-icon mx-1">
                            <i class="icon icon-hangouts"></i>
                        </a>
                    </div>

                </div>


            </div>
        </div>

        <div class="col-auto">

            <div class="row no-gutters align-items-center justify-content-end">

                <div class="user-menu-button dropdown">

                    <div class="dropdown-toggle ripple row align-items-center no-gutters px-2 px-sm-4" role="button" id="dropdownUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-wrapper">
                            <img class="avatar" src="../assets/images/avatars/profile.jpg">
                            <i class="status text-green icon-checkbox-marked-circle s-4"></i>
                        </div>
                        <span class="username mx-3 d-none d-md-block"><?php echo $_SESSION['NAME'];?></span>
                    </div>

                    <div class="dropdown-menu" aria-labelledby="dropdownUserMenu">

                        <a class="dropdown-item" href="#">
                            <div class="row no-gutters align-items-center flex-nowrap">
                                <i class="icon-account"></i>
                                <span class="px-3">My Profile</span>
                            </div>
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="../users/logout.php">
                            <div class="row no-gutters align-items-center flex-nowrap">
                                <i class="icon-logout"></i>
                                <span class="px-3">Logout</span>
                            </div>
                        </a>

                    </div>
                </div>
<!----
                <div class="toolbar-separator"></div>

                <button type="button" class="quick-panel-button btn btn-icon" data-fuse-bar-toggle="quick-panel-sidebar">
                    <i class="icon icon-format-list-bulleted"></i>
                </button>
----->
            </div>
        </div>
    </div>
</nav>