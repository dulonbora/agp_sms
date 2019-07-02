<?php include '../../include/AHeader.php';
include '../../classes/UI.php';
include '../../classes/NavBar.php';
include '../../classes/Menu.php';
include '../../classes/Images.php';
$UI = new UI;
$N = new NavBar;
$menu = new Menu();
$image = new Images();
$id = filter_input(INPUT_GET, 'i');
$menu->loadvalue($id);
$image->LoadValue($menu->getIMAGE_ID());
?>
<body class="">
    <section class="vbox">
        <?php echo $UI->Work("View"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php $N->Admin() ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox animated animated fadeInUp">
                        <section class="scrollable wrapper-lg">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <div class="blog-post">
                                        <div class="post-item">
                                            <div class="post-media"> 
                                                <img class="img-full" src="../../images/<?php echo $image->getIMAGE_LINK(); ?>" height="300px">
                                                <div class="btn-group-justified">
                                                    <a href="Post_Edit.php?i=<?php echo $id; ?>" class="btn btn-success">Edit Post</a>
                                                </div>
                                            </div>
                                            <div class="caption wrapper-lg">
                                                <h2 class="post-title"><?php echo $menu->getNAME() ?></h2>
                                                <div class="post-sum"><p><?php echo $menu->getCONTENT(); ?></p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 hidden-sm hidden-xs"> 
                                    <h5 class="bg-info wrapper-md r">Categories</h5>
                                    <ul class="list-group"><?php $menu->LoadPostCategory(); ?></ul>
                                    <section class="panel panel-default portlet-item">
                                        <header class="panel-heading">Related Posts</header>
                                        <section class="panel-body"><?php $menu->LoadRelatedPostsInAdmin($id); ?></section> </section>
                                </div>
                            </div>
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
        </section>
    </section>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../../js/app.v1.js"></script>
    <script src="../../js/app.plugin.js"></script>
</body>
</html>