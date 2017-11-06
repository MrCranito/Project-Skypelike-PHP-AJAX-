
<section class="col-xs-8 col-xs-offset-2">
    <h2>Créer un channel</h2>
    <?php if (isset($_GET['invalid'])): ?>
        <div class="alert alert-danger">
            Le nom de channel est déjà prit !
        </div>
    <?php endif; ?>
    <div>
        <form name="createChannel" method="post" action="../functions/channelController.php?createChannel=1">
            <label> Nom channel : </label>
            <input type="text" name="nameChannel" class="form-control" placeholder="Ex: Groupe Supinfo"/> <br/>
            <label> Détails : </label>
            <input type="text" name="detailsChannel" class="form-control" placeholder="Ex: Les étudiants de supinfo"/> <br/>
            <label>
                Ce groupe est il privé ? <br>
                <input type="radio" name="private" value="0"> Non<br>
                <input type="radio" name="private" value="1"> Oui<br>
            </label><br/>
            <input type="submit" name="createChannel" value="Créer"/><br/>
        </form>
    </div>
</section>
<?php
include 'footer.php';
?>