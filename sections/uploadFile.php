<!DOCTYPE html>
<html>
<body>
<fieldset>
    <legend>Subida de archivos(imagenes)</legend>

    <form action="?section=ejemplos/upload" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</fieldset>
</body>
</html>
<?php
include("includes/listados.php");
leerOrdenadoC1( "datos/ordenado.txt" );
?>