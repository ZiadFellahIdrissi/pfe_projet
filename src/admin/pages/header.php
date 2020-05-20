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
            <div class="container-fluid ">
                <div class="header-wrap ">
                    <form class="form-header " action=" " method="POST ">
                        <input class="au-input au-input--xl " type="text " name="search " placeholder="Search for datas " />
                        <button class=" au-btn--submit " type="submit ">
                            <i class="zmdi zmdi-search "></i>
                        </button>
                    </form>
                    <div class="header-button ">
                        <div class="noti-wrap ">
                            <div class="noti__item js-item-menu ">
                                <i class="zmdi zmdi-email "></i>
                                <span class="quantity ">1</span>
                                <div class="email-dropdown js-dropdown ">
                                    <div class="email__title ">
                                        <p>You have 3 New Emails</p>
                                    </div>
                                    <div class="email__item ">
                                        <div class="image img-cir img-40 ">
                                            <img src="../../../img/Dashboard/profile.svg " alt="Cynthia Harvey " />
                                        </div>
                                        <div class="content ">
                                            <p>Demande de attestation </p>
                                            <span>etuiant 1, 3 min ago</span>
                                        </div>
                                    </div>
                                    <div class="email__item ">
                                        <div class="image img-cir img-40 ">
                                            <img src="../../../img/Dashboard/profile.svg " alt="Cynthia Harvey " />
                                        </div>
                                        <div class="content ">
                                            <p>Demande de attestation </p>
                                            <span>etuiant 2, 10 min ago</span>
                                        </div>
                                    </div>
                                    <div class="email__item ">
                                        <div class="image img-cir img-40 ">
                                            <img src="../../../img/Dashboard/profile.svg" alt="Cynthia Harvey " />
                                        </div>
                                        <div class="content ">
                                            <p>Demande de attestation </p>
                                            <span>etuiant 3, 25 min ago</span>
                                        </div>
                                    </div>
                                    <div class="email__footer ">
                                        <a href="# ">See all emails</a>
                                    </div>
                                </div>
                            </div>
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
                                    <img src="../../../img/Dashboard/profile.svg " alt="John Doe " />
                                </div>
                                <div class="content ">
                                    <a class="js-acc-btn " href="# ">
                                        <?php
                                        echo $nom;
                                        ?>
                                    </a>
                                </div>
                                <div class="account-dropdown js-dropdown ">
                                    <div class="info clearfix ">
                                        <div class="image ">
                                            <a href="# ">
                                                <img src="../../../img/Dashboard/profile.svg " alt="John Doe " />
                                            </a>
                                        </div>
                                        <div class="content ">
                                            <h5 class="name ">
                                                <a href="# ">
                                                    <?php
                                                    echo $nom;
                                                    ?>
                                                </a>
                                            </h5>
                                            <span class="email ">
                                                <?php
                                                echo $email;
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body ">
                                        <div class="account-dropdown__item ">
                                            <a href="# ">
                                                <i class="zmdi zmdi-account "></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item ">
                                            <a href="# ">
                                                <i class="zmdi zmdi-settings "></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item ">
                                            <a href="# ">
                                                <i class="fas fa-tachometer-alt "></i>Dashboard</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer ">
                                        <a href="logout.php">
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