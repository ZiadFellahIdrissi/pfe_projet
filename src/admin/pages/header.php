<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <!-- <a class="log0o" href="index.html">
                            <img src="mylogo.png" alt="" width="200px" height="100px" />
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
                <li class="active">
                    <a href="./">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="./Etudiants.php">
                        <i class="fas fa-user-graduate"></i>Etudiants</a>
                </li>
                <li>
                    <a href="./Filiere.php">
                        <i class="fas fa-university"></i>Filiere
                    </a>
                </li>
                <li>
                    <a href="./Enseignant.php">
                        <i class="fas fa-chalkboard-teacher"></i>Enseignant</a>
                </li>
                <li>
                    <a href="./Modules.php">
                        <i class="fab fa-stack-overflow"></i>Modules</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Notes <i class="fas fa-angle-down"></i> </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="#">Consulter Notes</a>
                        </li>
                        <li>
                            <a href="#">Gestion des Notes</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Absences <i class="fas fa-angle-down"></i></a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="consulter_absences.php">Consulter Absences</a>
                        </li>
                        <li>
                            <a href="ajouter_absences.php">Gestion des Absences</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block js-scrollbar1" style="overflow: auto;">
    <div class="lgo ">
        <a href="# ">
            <img src="../../../img/Dashboard/mylogo.png " height="10px " alt=" " style="border-radius: 50%; " />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list ">
                <li class="active ">
                    <a href="./">
                        <i class="fas fa-tachometer-alt "></i>Dashboard</a>
                </li>
                <li>
                    <a href="./Etudiants.php">
                        <i class="fas fa-user-graduate "></i> Etudiants
                    </a>
                </li>
                <li>
                    <a href="./Filiere.php">
                        <span><i class="fas fa-university "></i></span> Filiere
                    </a>
                </li>
                <li>
                    <a href="./Enseignant.php">
                        <span><i class="fas fa-chalkboard-teacher "></i></span> Enseignant
                    </a>
                </li>
                <li>
                    <a href="./Modules.php">
                        <span><i class="fab fa-stack-overflow "></i></span> Modules
                    </a>
                </li>
                <li class="has-sub ">
                    <a class="js-arrow " href="#">
                        <i class="fas fa-copy "></i>Notes <i class="fas fa-angle-down "></i> </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="# ">Consulter Notes</a>
                        </li>
                        <li>
                            <a href="# ">Gestion des Notes</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub ">
                    <a class="js-arrow " href="#">
                        <i class="fas fa-copy "></i>Absences <i class="fas fa-angle-down "></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list ">
                        <li>
                            <a href="consulter_absences.php">Consulter Absences</a>
                        </li>
                        <li>
                            <a href="ajouter_absences.php">Gestion des Absences</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

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
                                    <a class="js-acc-btn " href="# ">Mohamed Reda</a>
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
                                                <a href="# ">Mohamed Reda</a>
                                            </h5>
                                            <span class="email ">mohamedReda@gmail.com</span>
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
                                        <a href="../../../index.php">
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