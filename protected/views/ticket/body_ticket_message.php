


<h1> <?php echo $title ?></h1>
<p>
    <?php echo $body ?><?php echo CHtml::link("Haga clic aqui ",$_SERVER["SERVER_NAME"]."/ticket/view?id=".$model->id_ticket);  ?> para revisar.
</p>


