<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<body>
<fieldset>
    <legend>Subida de archivos(imagenes)</legend>

    <form action="?section=ejemplos/upload" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</fieldset>
</br>
<h2>Listar datos del ordenado.txt</h2>
</body>
</html>
<?php
include("includes/listados.php");
leerOrdenadoC1( "datos/ordenado.txt" );
?>