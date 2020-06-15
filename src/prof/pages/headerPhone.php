<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <!-- <a class="logo" href="index.html">
                    <img src="../../../img/Dashboard/mylogo1.png " alt="" />
                </a> -->
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                        <span class="bot-line"></span>
                    </a>
                </li>
                <li>
                    <a href="../Controle/">
                        <i class="fas fa-user-graduate"></i>
                        <span class="bot-line"></span>Controles
                    </a>
                </li>
                <li class="has-sub">
                    <a href="#">
                        <i class="fas fa-copy"></i>
                        <span class="bot-line"></span>Notes</a>
                    <ul class="header3-sub-list list-unstyled">
                        <li>
                            <a href="">Afficher Notes</a>
                        </li>
                        <li>
                            <a href="">Affecter Notes</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="#">
                        <i class="far fa-clock"></i>
                        <span class="bot-line"></span>Absence</a>
                    <ul class="header3-sub-list list-unstyled">
                        <li>
                            <a href="">Afficher Absences</a>
                        </li>
                        <li>
                            <a href="">Affecter Absences</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="../Module/">
                        <i class="fab fa-stack-overflow"></i>
                        <span class="bot-line"></span>Modules
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="sub-header-mobile-2 d-block d-lg-none">
    <div class="header__tool">
        <div class="header-button-item has-noti js-item-menu">
            <i class="zmdi zmdi-notifications"></i>
            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                <div class="notifi__title">
                    <p>You have 3 Notifications</p>
                </div>
                <div class="notifi__item">
                    <div class="bg-c1 img-cir img-40">
                        <i class="zmdi zmdi-email-open"></i>
                    </div>
                    <div class="content">
                        <p>You got a email notification</p>
                        <span class="date">April 12, 2018 06:50</span>
                    </div>
                </div>
                <div class="notifi__item">
                    <div class="bg-c2 img-cir img-40">
                        <i class="zmdi zmdi-account-box"></i>
                    </div>
                    <div class="content">
                        <p>Your account has been blocked</p>
                        <span class="date">April 12, 2018 06:50</span>
                    </div>
                </div>
                <div class="notifi__item">
                    <div class="bg-c3 img-cir img-40">
                        <i class="zmdi zmdi-file-text"></i>
                    </div>
                    <div class="content">
                        <p>You got a new file</p>
                        <span class="date">April 12, 2018 06:50</span>
                    </div>
                </div>
                <div class="notifi__footer">
                    <a href="#">All notifications</a>
                </div>
            </div>
        </div>

        <div class="account-wrap">
            <div class="account-item account-item--style2 clearfix js-item-menu">
                <div class="image">
                    <img src="../../img/Dashboard/profile.svg " alt="<?php echo $nom . ' ' . $prenom ?>" />
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#"><?php echo $nom . ' ' . $prenom ?></a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <img src="../../img/Dashboard/profile.svg " alt="<?php echo $nom . ' ' . $prenom ?>" />
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="name">
                                <a href="#"><?php echo $nom . ' ' . $prenom ?></a>
                            </h5>
                            <span class="email"><?php echo $email ?></span>
                        </div>
                    </div>
                    <div class="account-dropdown__body">
                        <div class="account-dropdown__item">
                            <a href="#">
                                <i class="zmdi zmdi-account"></i>Account</a>
                        </div>
                        <div class="account-dropdown__item">
                            <a href="#">
                                <i class="zmdi zmdi-settings"></i>Setting</a>
                        </div>
                    </div>
                    <div class="account-dropdown__footer">
                        <a href="logout.php">
                            <i class="zmdi zmdi-power"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>