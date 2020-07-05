<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <!-- <a href="#">
                    <img src="../../../img/Dashboard/mylogo1.png" width="200px" height="100px" alt="" />
                </a> -->
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li>
                        <a href="../pages/">
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
                    <li>
                        <a href="../Notes/">
                            <i class="fas fa-copy"></i>
                            <span class="bot-line"></span>Notes
                        </a>
                    </li>
                    <li>
                        <a href="../absences/">
                            <i class="far fa-clock"></i>
                            <span class="bot-line"></span>Absence</a>
                    </li>
                    <li>
                        <a href="../seances/">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span class="bot-line"></span>Emploi du temps
                        </a>
                    </li>
                    <li>
                        <a href="../Module/">
                            <i class="fab fa-stack-overflow"></i>
                            <span class="bot-line"></span>Modules
                        </a>
                    </li>
                </ul>
            </div>
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
                            <img src="../../../img/profiles/<?php echo $imagepath; ?>" alt=" <?php echo $nom . ' ' . $prenom ?>" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">
                                <?php echo $nom . ' ' . $prenom ?>
                            </a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="../../../img/profiles/<?php echo $imagepath; ?>" alt=" <?php echo $nom . ' ' . $prenom ?>" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#">
                                            <?php echo $nom . ' ' . $prenom ?>
                                        </a>
                                    </h5>
                                    <span class="email">
                                        <?php echo $email ?>
                                    </span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <?php if ($user->data()->role != 'responsable') {
                                ?>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="../account/">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="account-dropdown__item">
                                        <a href="../../responsable/">
                                            <i class="fas fa-user-tie"></i>Esapce Responsable</a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="../pages/logout.php">
                                    <i class="zmdi zmdi-power"></i>Logout
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>