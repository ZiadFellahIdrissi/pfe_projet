<?php
    include_once '../../core/init.php';
    if (isset($_POST['reset'])) {
        $cin      = $_POST['cin'];
        $password = $_POST['password'];
        $activer = new ActiveCompte();
        $activer->setPassword($cin, $password);
        ?>
        <script>window.location.replace("./?resetsuccess");</script>
        <?php
        
        // header("Location: ./?resetsuccess");
    }
?>