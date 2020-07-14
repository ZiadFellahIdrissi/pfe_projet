<header class="header-desktop2" style="background-color: #2f3542">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap2">
                <div class="logo d-block d-lg-none">
                    <a href="#">
                        <!-- <img src="images/icon/logo-white.png" alt="" /> -->
                    </a>
                </div>
                <div class="header-button2">
                    <div class="header-button-item js-item-menu">
                        <i class="zmdi zmdi-search"></i>
                        <div class="search-dropdown js-dropdown">
                            <form action="">
                                <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                <span class="search-dropdown__icon">
                                    <i class="zmdi zmdi-search"></i>
                                </span>
                            </form>
                        </div>
                    </div>
                    <div class="header-button-item has-noti js-item-menu">
                        <i class="zmdi zmdi-notifications"></i>
                        <div class="notifi-dropdown js-dropdown">
                            <?php
                            include_once '../../../fonctions/tools.function.php';
                            $nbMessages = do_i_have_massages($id);
                            ?>
                            <div class="notifi__title">
                                <p>You have <?php echo $nbMessages ?> Messages</p>
                            </div>
                            <?php
                            if ($nbMessages) {
                                $newnbMessages=$nbMessages>3 ? 3 : $nbMessages; 
                                $sql = "SELECT message_list.id_message,messages.date,messages.body,
                                 Utilisateur.id ,Utilisateur.nom , Utilisateur.prenom,Utilisateur.imagepath
                                FROM `message_list` 
                                join Messages on message_list.id_message = Messages.id_message 
                                join Utilisateur on Utilisateur.id = Messages.sender_id 
                                where message_list.user_id = ? 
                                and message_list.isread=?
                                GROUP BY Utilisateur.id order by messages.date desc limit $newnbMessages";
                                $resultat = DB::getInstance()->query($sql, [$id,0]);

                                foreach ($resultat->results() as $row) {
                            ?>
                                    <div class="notifi__item">
                                        <div class="image img-cir img-40">
                                        <img src="../../../img/profiles/<?php echo $row->imagepath ?>" alt="<?php echo strtoupper($row->nom . ' ' . $row->prenom); ?>">
                                        </div>
                                        <div class="content">
                                            <p><?php echo strtoupper($row->nom . ' ' . $row->prenom); ?></p>
                                            <p><?php echo substr($row->body, 0, 40) . '....'; ?></p>
                                            <span class="date"><?php echo $row->date; ?></span>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="notifi__footer">
                                <a href="#">All massages</a>
                            </div>
                        </div>
                    </div>
                    <div class="header-button-item mr-0 js-sidebar-btn">
                        <i class="zmdi zmdi-menu"></i>
                    </div>
                    <div class="setting-menu js-right-sidebar d-none d-lg-block">
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="../pages/">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="../profile/">
                                    <i class="zmdi zmdi-account"></i>Profile</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="../account">
                                    <i class="zmdi zmdi-settings"></i>Compte</a>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-email"></i>Email</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-notifications"></i>Notifications</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="../pages/logout.php">
                                    <i class="zmdi zmdi-pin"></i>Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>