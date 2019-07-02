<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NavBar
 *
 * @author Dulon
 */
class NavBar {
   
    public function Worked(){
        echo '<aside class="bg-dark lter nav-xs aside hidden-print" id="nav"> 
    <section class="vbox"> <section class="w-f-md scrollable"> 
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2"> 
                <nav class="nav-primary hidden-xs"> 
                    <ul class="nav bg clearfix"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> Discover </li> 
                        
                        <li> <a href="songs.php"> <i class="icon-music-tone-alt icon "></i> 
                                <span class="font-bold">Songs</span> </a> </li>
                                <li> <a href="PicStory.php"> <i class="icon-grid icon "></i> 
                                <span class="font-bold">Photos</span> </a> </li>                                
                        <li> <a href="blog.php"> 
                                <i class="icon-drawer icon "></i> <b class="badge bg-primary pull-right">6</b> 
                                <span class="font-bold">Blog</span> </a> </li> 
                        <li> <a href="sms.php"> 
                                <i class="icon-list icon "></i> <span class="font-bold">SMS</span> </a> </li> 
                                <li> <a href="video.php"> 
                                <i class="icon-social-youtube icon "></i> <span class="font-bold">Videos</span> </a> </li> 
                        <li class="m-b hidden-nav-xs"></li> </ul>
                    <ul class="nav" data-ride="collapse"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> With Submenu </li> 
                        <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="icon-music-tone-alt icon "> </i>
                                <span>Songs</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="songs.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Assamese Songs</span>
                                </a> </li>
                                <li > <a href="scat.php?i=Bihu_Songs" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Bihu Songs</span> </a>
                                </li>
                                <li > <a href="scat.php?i=Album_Songs" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Album Songs</span> </a> 
                                </li> 
                                <li > <a href="scat.php?i=Movie_Songs" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Movie Songs</span> </a> 
                                </li>
                            </ul> </li>
                        <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="icon-disc icon "> </i>
                                <span>User</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="signin.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Signin</span> </a>
                                </li> 
                                <li > <a href="signup.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Signup</span> </a> 
                                </li> 
                                <li > <a href="...html" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>..</span> </a> </li>
                            </ul> </li>
                            <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="icon-bell icon"> </i>
                                <span>Pages</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="page.php?i=1" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>DCMA</span> </a> </li>
                                <li > <a href="page.php?i=2" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Contect Us</span> </a> </li>
                                <li > <a href="page.php?i=3" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>About Us</span> </a> </li> 
                                <li > <a href="page.php?i=4" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Mission</span> </a> </li> 
                                <li > <a href="page.php?i=5" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Privacy Policy</span> </a> </li>
                                <li > <a href="page.php?i=6" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Report Abuse File</span> </a> </li> 
                            </ul> </li>
                    </ul>
                </nav> 
            </div> </section> 
    </section> </aside>';
        
    }
    
    public function Admin(){
        echo '<aside class="bg-dark lter nav-xs aside hidden-print" id="nav"> 
    <section class="vbox"> <section class="w-f-md scrollable"> 
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2"> 
                <nav class="nav-primary hidden-xs"> 
                    <ul class="nav bg clearfix"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> Discover </li>                         
                                <li> <a href="../page/index.php"> <i class="fa fa-tags"></i> 
                                <span class="font-bold">Page</span> </a> </li>
                                                        
                        <li class="m-b hidden-nav-xs"></li> </ul>
                    <ul class="nav" data-ride="collapse"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> With Submenu </li> 
                        <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="fa fa-tag"> </i>
                                <span>Post</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="../post/index.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>View All Post</span>
                                </a> </li>
                                <li > <a href="../category/index.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Categorys</span> </a> 
                                </li> 
                                
                            </ul> </li>
                            
                            <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="fa  fa-picture-o"> </i>
                                <span>Gallery</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="../image/Slider.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Slider</span> </a> </li> 
                                <li > <a href="../image/Gallery.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Gallerys</span> </a> </li> 
                            </ul> </li>
                            
                            <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="fa fa-cogs"> </i>
                                <span>Appearance</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="../menu/index.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Menu</span> </a> </li> 
                                <li > <a href="../settings/index.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Settings</span> </a> </li> 
                            </ul> </li>
                            
                            
                            
                            
                            <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="fa fa-cogs"> </i>
                                <span>Groups</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="../menu/index.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Menu</span> </a> </li> 
                                <li > <a href="../settings/index.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Settings</span> </a> </li> 
                            </ul> </li>
                            
                            
<li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="fa fa-cogs"> </i>
                                <span>Groups</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="../../../group/New_Post.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Craete New</span> </a> </li> 
                                <li > <a href="../../../group/Gorups_List.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Settings</span> </a> </li> 
                            </ul> </li>
                            
                            
                            
                    </ul>
                </nav> 
            </div> </section> 
    </section> </aside>';
        
    }


    
    
    
    
}
