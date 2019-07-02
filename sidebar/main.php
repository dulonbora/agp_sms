

<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
                <div class="aside-content-wrapper">

                    <div class="aside-content bg-primary-700 text-auto">

                        <div class="aside-toolbar">

                            <div class="logo">
                                <span class="logo-icon">A</span>
                                <span class="logo-text">GP</span>
                            </div>

                            <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                                <i class="icon icon-backburger"></i>
                            </button>

                        </div>

                        <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

                            <li class="subheader">
                                <span>List</span>
                            </li>

                            <?php if($_SESSION['ROLE']=='A'){ ?>
                                <li class="nav-item">
                                <a class="nav-link ripple " href="../group/New_Post.php" data-url="../group/Gorups_List.php">

                                    <i class="icon s-4 icon-animation"></i>

                                    <span>Create New Group</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ripple " href="../group/My_Gorups_List.php" data-url="../group/Gorups_List.php">

                                    <i class="icon s-4 icon-animation"></i>

                                    <span>My Groups</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link ripple " href="../group/Gorups_List.php" data-url="../group/Gorups_List.php">

                                    <i class="icon s-4 icon-animation"></i>

                                    <span>All Groups</span>
                                </a>
                            </li>

                            

                            <li class="nav-item">
                                <a class="nav-link ripple " href="../address_book/New_Member.php" data-url="../address_book/Address_Book.php">

                                    <i class="icon s-4 icon-contacts"></i>

                                    <span>Add New Contact</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link ripple " href="../address_book/Address_Book.php" data-url="../address_book/Address_Book.php">

                                    <i class="icon s-4 icon-contacts"></i>

                                    <span>Address Book</span>
                                </a>
                            </li>
                            

                            <li class="nav-item">
                                <a class="nav-link ripple " href="../posts/Post_List.php" data-url="../posts/index.php">

                                    <i class="icon s-4 icon-email"></i>

                                    <span>Post List</span>
                                </a>
                            </li>
                            

                            <li class="nav-item">
                                <a class="nav-link ripple " href="../group/Gorups_List_Multi_Post.php" data-url="../posts/index.php">

                                    <i class="icon s-4 icon-email"></i>

                                    <span>Post Multi Group</span>
                                </a>
                            </li>
                            

                            <?php } else { ?>
                                
                            <li class="nav-item">
                                <a class="nav-link ripple " href="../group/Gorups_List.php" data-url="../group/Gorups_List.php">

                                    <i class="icon s-4 icon-email"></i>

                                    <span>Group List</span>
                                </a>
                            </li>
                            <?php } ?>

                            

                            
                        </ul>
                    </div>
                </div>
            </aside>