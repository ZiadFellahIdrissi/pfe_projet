<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$id_module  = $_GET["id_module"];
$my_id = $_GET["my_id"];
$sql = "SELECT Etudiant.id, Utilisateur.nom ,Utilisateur.prenom, Utilisateur.imagepath, Filiere.nom_filiere FROM `Etudiant`
                join Utilisateur on Utilisateur.id = Etudiant.id
                join dispose_de ON Etudiant.id_filiere = dispose_de.id_filiere 
                join Filiere on dispose_de.id_filiere = Filiere.id_filiere
                where dispose_de.id_module=  ?";
$resultat = DB::getInstance()->query($sql, [$id_module]);
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
                    <p><?php echo $row->nom_filiere ?></p>
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