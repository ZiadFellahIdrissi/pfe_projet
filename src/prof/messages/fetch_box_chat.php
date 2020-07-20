<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
if (isset($_GET["id_prof"])) {
    $id_prof = $_GET["id_prof"];
    $my_id=$_GET["my_id"];
    $info = getPersonInfo($id_prof);

    make_conversation_readed($id_prof,$my_id);

?>
 
    <div class="au-chat__title">
        <div class="au-chat-info">
            <div class="avatar-wrap online">
                <div class="avatar avatar--small">
                    <img src="../../../img/profiles/<?php echo $info->imagepath ?>" alt="<?php echo strtoupper($info->nom . ' ' . $info->prenom); ?>">
                </div>
            </div>
            <span class="nick">
                <a href="#"><?php echo strtoupper($info->nom . ' ' . $info->prenom); ?></a>
            </span>
        </div>
    </div>
    <?php
    $resultat =getConversation($id_prof,$my_id);
    ?>
    <div class="au-chat__content js-scrollbar1">
        <div class="recei-mess-wrap">

            <?php
            foreach ($resultat->results() as $row) {
                if ($row->id == $id_prof) {
            ?>
                    <div class="recei-mess__inner">
                        <div class="avatar avatar--tiny">
                            <img src="../../../img/profiles/<?php echo $info->imagepath ?>" alt="<?php echo strtoupper($info->nom . ' ' . $info->prenom); ?>">
                        </div>
                        <div class="recei-mess-list">
                            <div class="recei-mess"><?php echo $row->body ?></div>
                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <div class="send-mess-wrap">
                        <div class="send-mess__inner">
                            <div class="send-mess-list">
                                <div class="send-mess"><?php echo $row->body ?></div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>


        </div>
    </div>
    <div class="au-chat-textfield">
        <div class="row">
            <div class="col-lg-10">
                <input class="au-input au-input--full au-input--h65 " id="messagewritten" type="text" placeholder="Ecrire un message">
                <input type="hidden" id="id_prof" value="<?php echo $id_prof ?>">
            </div>
            <div class="col">
                <input class="au-input " type="button" style="height: 65px; width: 90px; font-weight: bold; font-size:large" id="messageSend" value="send">
            </div>
        </div>
    </div>
<?php } ?>
<script>
    
    $('.au-chat__content').animate({scrollTop: 9999});
    // $('.au-chat__content').perfectScrollbar();
</script>