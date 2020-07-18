<?php
require_once '../../../fonctions/tools.function.php';
?>
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar2">
    <div class="logo" style="background-color: #2f3542;">
        <a href="#">
            <!-- <img src="mylogo.png" alt="" /> -->
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="../../../img/profiles/<?php echo $imagepath ?>" title="Photo de profile" draggable="false" />
            </div>
            <h4 class="name"><?php echo strtoupper($nom) . ' ' . $prenom ?></h4>
            <a href="../pages/logout.php">Sign out</a>
        </div>
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active">
                    <a href="../pages/">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="../seances/">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span class="bot-line"></span>Emploi du temps
                    </a>
                </li>
                <li>
                    <a href="../controles/">
                        <i class="fa fa-file"></i>Controles</a>
                    <?php
                    $resultat = controles($id);
                    $count = $resultat->count();
                    if ($count) {
                        echo '<span class="inbox-num">' . $count . '</span>';
                    }
                    ?>
                </li>
                <li>
                    <a href="../examens">
                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>Calendrier des exams
                    </a>
                </li>
                <li class="">
                    <a href="../notes/">
                        <i class="zmdi zmdi-bookmark"></i>Notes et resultats
                    </a>
                </li>
                <li class="">
                    <a href="../support/">
                        <i class="fab fa-stack-overflow"></i>Support de cours
                    </a>
                </li>
                <li class="">
                    <a href="../inscription">
                        <i class="zmdi zmdi-turning-sign"></i>Inscription
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <i class="zmdi zmdi-laptop"></i>Stages
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

<!-- PAGE CONTAINER-->
<div class="page-container2">
    <?php
    require_once 'headerDesktop.php';
    ?>
    <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
        <div class="logo">
            <a href="#">
                <img src="" alt="logo" />
            </a>
        </div>
        <div class="menu-sidebar2__content js-scrollbar2">
            <div class="account2">
                <div class="image img-cir img-120">
                    <img src="../../../img/profiles/<?php echo $imagepath ?>" alt="<?php echo $nom . ' ' . $prenom ?>" />
                </div>
                <h4 class="name"><?php echo $nom . ' ' . $prenom ?></h4>
                <a href="../pages/logout.php">Sign out</a>
            </div>
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list">
                    <li class="active">
                        <a href="../pages/">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="../seances/">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span class="bot-line"></span>Emploi du temps
                        </a>
                    </li>
                    <li>
                        <a href="../controles/">
                            <i class="fa fa-file-text"></i>Controles</a>
                        <?php
                        if ($count) {
                            echo '<span class="inbox-num">' . $count . '</span>';
                        }
                        ?>
                    </li>
                    <li>
                        <a href="../examens">
                            <i class="fas fa-calendar-alt" aria-hidden="true"></i>Calendrier des exams
                        </a>
                    </li>
                    <li class="">
                        <a href="../notes/">
                            <i class="zmdi zmdi-bookmark"></i>Notes et resultats
                        </a>
                    </li>
                    <li class="">
                        <a href="../support/">
                            <i class="fab fa-stack-overflow"></i>Support de cours
                        </a>
                    </li>
                    <li class="">
                        <a href="../inscription">
                            <i class="zmdi zmdi-turning-sign"></i>Inscription
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            <i class="zmdi zmdi-laptop"></i>Stages
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END HEADER DESKTOP-->