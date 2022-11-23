<?php
$id = $title = $content = "";

if (isset($dataToView["data"]["id"])) {
$id = $dataToView["data"]["id"];
}
if (isset($dataToView["data"]["titulo"])) {
$titulo = $dataToView["data"]["titulo"];
}
if (isset($dataToView["data"]["contenido"])) {
$contenido = $dataToView["data"]["contenido"];
}


?>
<div class="row">
 <!--Solo se establece un campo "error" si se ha realizado un (save) exitoso o no-->
    <?php
    if(isset($dataToView["data"]["error"]) && ($dataToView["data"]["error"]===false )):
    ?>
    <div class="alert alert-success">
        Operación realizada correctamente. <a href="FrontController.php?controller=nota&action=list">Volver al listado</a>
    </div>
    <?php
   elseif(isset($dataToView["data"]["error"]) && ($dataToView["data"]["error"]===true )):
    ?>
    <div class="alert alert-danger">
        Ha ocurrido algún problema y no se ha podido guardar la nota. <a href="FrontController.php?controller=nota&action=list">Volver al listado</a>
    </div>
  <?php
   elseif(!isset($dataToView["data"]["error"])):
    ?>
    <form class="form" action="FrontController.php?controller=Nota&action=save" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="form-group">
            <label>Título</label>
            <input class="form-control" type="text" name="title" value="<?php echo $titulo; ?>" />
        </div>
        <div class="form-group mb-2">
            <label>Contenido</label>
            <textarea class="form-control" style="white-space: pre-wrap;" name="content"><?php echo $contenido; ?></textarea>
        </div>
        <input type="submit" value="Guardar" class="btn btn-primary"/>
        <a class="btn btn-outline-danger" href="FrontController.php?controller=Nota&action=list">Cancelar</a>
    </form>
    
    <?php endif;?>
</div>