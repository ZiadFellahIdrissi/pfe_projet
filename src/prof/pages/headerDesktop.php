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
                            <span class="bot-line"></span>Absences</a>
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
                        <?php
                        include_once '../../../fonctions/tools.function.php';
                        $nbMessages = do_i_have_massages($id);
                        ?>
                        <div class="notifi__title">
                            <p>You have <?php echo $nbMessages ?> Messages</p>
                        </div>
                        <?php
                        if ($nbMessages) {
                            $newnbMessages = $nbMessages > 3 ? 3 : $nbMessages;
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
                                <div class="mess__item">
                                    <div class="image img-cir img-40">
                                        <img src="../../../img/profiles/<?php echo $row->imagepath ?>" alt="<?php echo strtoupper($row->nom . ' ' . $row->prenom); ?>">
                                    </div>
                                    <div class="content unread">
                                        <h6><?php echo strtoupper($row->nom . ' ' . $row->prenom); ?></h6>
                                        <p><?php echo substr($row->body, 0, 40) . '....'; ?></p>
                                        <span class="time"><?php $row->date ?></span>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                        <div class="notifi__footer">
                            <a href="#">Tout les messages</a>
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