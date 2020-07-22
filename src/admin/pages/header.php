<!-- MOBILE HEADER -->
<?php
include 'mobile_header.php';
$db = DB::getInstance();
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
                                <span class="quantity ">
                                    <?php
                                    $sql = "SELECT *
                                            FROM Demandes
                                            JOIN Utilisateur ON Demandes.id_etudiant = Utilisateur.id
                                            WHERE etat = -1";
                                    $db->query($sql, []);
                                    echo $db->count();
                                    ?>
                                </span>
                                <div class="notifi-dropdown js-dropdown ">
                                    <div class="notifi__title ">
                                        <p>You have <?php echo $db->count(); ?> Notifications</p>
                                    </div>
                                    <?php
                                    foreach ($db->results() as $row) {
                                    ?>
                                        <div class="notifi__item" onclick="location.href='../Demandes'">
                                            <div class="bg-c2 img-cir img-40 ">
                                                <i class="zmdi zmdi-account-box "></i>
                                            </div>
                                            <div class="content ">
                                                <p>
                                                    <?php echo strtoupper($row->nom) . ' ' . $row->prenom ?> a demandé <?php echo $row->type ?>.
                                                </p>
                                                <span class="date ">
                                                    <?php echo $row->date ?>
                                                </span>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="account-wrap ">
                            <div class="account-item clearfix js-item-menu ">
                                <div class="image ">
                                    <img src="../../../img/profiles/<?php echo $imagepath ?>" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn " href="">
                                        <?php echo $nom.' '.$prenom; ?>
                                    </a>
                                </div>
                                <div class="account-dropdown js-dropdown ">
                                    <div class="info clearfix ">
                                        <div class="image ">
                                            <a href="# ">
                                                <img src="../../../img/profiles/<?php echo $imagepath ?> " />
                                            </a>
                                        </div>
                                        <div class="content ">
                                            <h5 class="name ">
                                                <a href="# ">
                                                    <?php echo $nom.' '.$prenom; ?>
                                                </a>
                                            </h5>
                                            <span class="email ">
                                            <?php echo $email; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="../account">
                                                <i class="zmdi zmdi-account"></i>Compte</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="../Supprime">
                                                <i class="fa fa-times-circle"></i>Réinitialiser la base
                                            </a>
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