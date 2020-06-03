<!-- MOBILE HEADER -->
<?php
    include 'mobile_header.php';
?>
<!-- END MOBILE HEADER -->

<!-- PAGE CONTAINER-->
<div class="page-container ">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop ">
        <div class="section__content section__content--p30 ">
            <div class="container-fluid">
                <div class="header-wrap">
                    <div class="header-button ml-auto">
                        <div class="noti-wrap ">
                            <div class="noti__item js-item-menu ">
                                <i class="zmdi zmdi-notifications "></i>
                                <span class="quantity ">3</span>
                                <div class="notifi-dropdown js-dropdown ">
                                    <div class="notifi__title ">
                                        <p>You have 3 Notifications</p>
                                    </div>
                                    <div class="notifi__item ">
                                        <div class="bg-c1 img-cir img-40 ">
                                            <i class="zmdi zmdi-email-open "></i>
                                        </div>
                                        <div class="content ">
                                            <p>You got a email notification</p>
                                            <span class="date ">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__item ">
                                        <div class="bg-c2 img-cir img-40 ">
                                            <i class="zmdi zmdi-account-box "></i>
                                        </div>
                                        <div class="content ">
                                            <p>Your account has been blocked</p>
                                            <span class="date ">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__item ">
                                        <div class="bg-c3 img-cir img-40 ">
                                            <i class="zmdi zmdi-file-text "></i>
                                        </div>
                                        <div class="content ">
                                            <p>You got a new file</p>
                                            <span class="date ">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__footer ">
                                        <a href="# ">All notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-wrap ">
                            <div class="account-item clearfix js-item-menu ">
                                <div class="image ">
                                    <img src="../../../img/Dashboard/profile.svg "/>
                                </div>
                                <div class="content ">
                                    <a class="js-acc-btn " href="# ">
                                        <?php echo $username; ?>
                                    </a>
                                </div>
                                <div class="account-dropdown js-dropdown ">
                                    <div class="info clearfix ">
                                        <div class="image ">
                                            <a href="# ">
                                                <img src="../../../img/Dashboard/profile.svg "/>
                                            </a>
                                        </div>
                                        <div class="content ">
                                            <h5 class="name ">
                                                <a href="# ">
                                                    <?php echo $username; ?>
                                                </a>
                                            </h5>
                                            <span class="email ">
                                                admin@h2c.fsac
                                            </span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body ">
                                        <div class="account-dropdown__item ">
                                            <a href="#"> <!-- hani raje3 -->
                                                <i class="zmdi zmdi-account "></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer ">
                                        <a href="../pages/logout.php">
                                            <i class="zmdi zmdi-power "></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
        include 'sidebar.php';
    ?>
    <script type="text/javascript" src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>
    <link href="../../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">