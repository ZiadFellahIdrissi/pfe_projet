<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
function getLastMessage($id_prof,$my_id){
    $sql = "SELECT messages.body
            FROM `message_list` 
            join messages on message_list.id_message = messages.id_message 
            where message_list.user_id = ? and messages.sender_id=?
            or messages.sender_id = ? and message_list.user_id=?
            order by messages.date desc";

$resultat = DB::getInstance()->query($sql, [$id_prof,$my_id,$id_prof,$my_id]);
return $resultat;
}

$id_filiere  = $_GET["id_filiere"];
$my_id = $_GET["my_id"];
$sql = "SELECT * 
        from etudiant 
        join utilisateur on etudiant.id = utilisateur.id
        where etudiant.id_filiere =  ?";
$resultat = DB::getInstance()->query($sql, [$id_filiere]);
foreach ($resultat->results() as $row) {
?>
    <div class="au-message__item <?php if (isRead($row->id, $my_id)) echo 'unread'; ?> " id="<?php echo $row->id ?>">
        <div class="au-message__item-inner">
            <div class="au-message__item-text">
                <div class="avatar-wrap online">
                    <div class="avatar">
                        <img src="../../../img/profiles/<?php echo $row->imagepath ?>" alt="<?php echo $row->nom . ' ' . $row->prenom; ?>">
                    </div>
                </div>
                <div class="text">
                    <h5 class="name"><?php echo strtoupper($row->nom . ' ' . $row->prenom);  ?></h5>
                    <p><?php
                    if(getLastMessage($row->id,$my_id)->results()){
                    foreach(getLastMessage($row->id,$my_id)->results() as $row){
                     echo $row->body; 
                    break;}
                }else{
                    echo "Envoie un message ";
                }

                    ?></p>
                </div>
            </div>
        </div>

    </div>
<?php
}
?>
<script>
    try {
        var inbox_wrap = $('.js-inbox');
        var message = $('.au-message__item');
        message.each(function() {
            var that = $(this);

            that.on('click', function() {
                console.log($(this).parent().parent().parent());
                $(this).parent().parent().parent().toggleClass('show-chat-box');
                var id_prof = $(this).attr("id");
                var my_id = $("#my_id").val();
                $.ajax({
                    url: "fetch_box_chat.php",
                    method: 'GET',
                    data: {
                        id_prof: id_prof,
                        my_id: my_id
                    },
                    dataType: 'text',
                    beforeSend: function() {
                        $("#spinner").show();
                    },
                    complete: function() {
                        $("#spinner").hide();
                    },
                    success: function(data) {
                        $('.fetchChat').html(data);
                    },
                    error: function() {
                        alert('failure');
                    }
                });
            });
        });
    } catch (error) {
        console.log(error);
    }
</script>