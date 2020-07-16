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
                        <span class="bot-line"></span>Gestion Des Notes
                    </a>
                </li>
                <li>
                    <a href="../absences/">
                        <i class="far fa-clock"></i>
                        <span class="bot-line"></span>Absences</a>
                </li>
                <li>
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
        <div class="header-button-item <?php if ($nbMessages) echo 'has-noti'; ?> js-item-menu">
            <i class="zmdi zmdi-email"></i>

            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                <div class="notifi__title">
                    <p>You have <?php echo $nbMessages ?> Messages</p>
                </div>
                <?php
                if ($nbMessages) {
                    $newnbMessages = $nbMessages > 3 ? 3 : $nbMessages;
                    $query = "SELECT messages.sender_id,messages.body,messages.date
                                        FROM `message_list` 
                                        join messages on message_list.id_message = messages.id_message
                                        where message_list.user_id =  '$id'
                                        and message_list.isread= 0
                                        and message_list.id_message in (
                                                SELECT max(messages.id_message)
                                                FROM `message_list` 
                                                join Messages on message_list.id_message = Messages.id_message 
                                                join Utilisateur on Utilisateur.id = Messages.sender_id 
                                                where message_list.user_id =  '$id'
                                                GROUP by Utilisateur.id )
                                        ORDER by messages.date desc limit $newnbMessages";
                    $resultat = mysqli_query($conn, $query);
                    // echo DB::getInstance()->query($query, [$id, $id, 0])->error();
                    if ($resultat) {
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            $info = getPersonInfo($row["sender_id"]);
                ?>
                            <div class="notifi__item" onclick="location.href='../messages/'">
                                <div class="image img-cir img-40">
                                    <img src="../../../img/profiles/<?php echo $info->imagepath ?>" alt="<?php echo strtoupper($info->nom . ' ' . $info->prenom); ?>">
                                </div>
                                <div class="content">
                                    <p><?php echo strtoupper($info->nom . ' ' . $info->prenom); ?></p>
                                    <p><?php echo substr($row['body'], 0, 40) . '....'; ?></p>
                                    <span class="date"><?php echo $row['date']; ?></span>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>
                <div class="notifi__footer">
                    <a href="../messages">Tout les messages</a>
                </div>
            </div>
        </div>

        <div class="account-wrap">
            <div class="account-item account-item--style2 clearfix js-item-menu">
                <div class="image">
                    <img src="../../../img/profiles/<?php echo $imagepath ?>" alt="<?php echo $nom . ' ' . $prenom ?>" />
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#"><?php echo $nom . ' ' . $prenom ?></a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <img src="../../../img/profiles/<?php echo $imagepath ?>" alt="<?php echo $nom . ' ' . $prenom ?>" />
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