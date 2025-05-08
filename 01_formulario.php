<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Envio formualrio phpmailer</title>
</head>
<body>
    <form action="02_procesar_formulario.php" method="post">
        <fieldset>
            <legend>Ingrese aqui sus datos Peronales : </legend>

           <div>
           <label for="nombre">Nombre : </label>
           <input type="text" name="nombre">
           </div>
            
            <div>
            <label for="apellido">Apellido : </label>
            <input type="text" name="apellido">
            </div>

            <div>
            <label for="email">Email : </label>
            <input type="text" name="email">
            </div>

            <div>
            <label for="telefono">Telefono : </label>
            <input type="text" name="telefono">
            </div>

            
           <div>
           <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" cols="40" rows="10"></textarea>
           </div>

           <div>
            <input class="submit" type="submit" value="Submit">
           </div>
        </fieldset>
    </form>
</body>
</html>