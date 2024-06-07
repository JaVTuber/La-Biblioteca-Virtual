<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/style.css">
        <script src="https://kit.fontawesome.com/f5052dcd71.js" crossorigin="anonymous"></script>
        <title>Biblioteca Virtual - Empleados</title>
    </head>
    <body>
        <?php
            // Incluye el menú y las funciones
            include('assets/menu.php');
            include('assets/vars.php');
            $empleados = new Database();
            $sesion = $empleados->login();

            if (isset($_GET["id"]) && (isset($_GET["mod"]) || isset($_GET["del"]))) {
                $id = $empleados->sanitize($_GET["id"]);
                $res = $empleados->buscarElemento('usuarios','ID', $id);

                if ($res) {
                    if (isset($_GET["mod"])) {
                        ?>
                        <article class="modEmpleado">
                            <h1>Modificar Cuenta del Empleado</h1>
                            <main>
                                <form action="empleados.php" method="POST">
                                    <label for="id">ID:</label>
                                    <input type="number" name="id" id="id" readonly="" required="" value="<?php echo $res->ID; ?>">

                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" id="nombre" required="" value="<?php echo $res->nombre; ?>">

                                    <label for="apellido">Apellido:</label>
                                    <input type="text" name="apellido" id="apellido" required="" value="<?php echo $res->apellido; ?>">

                                    <label for="correo">Correo electrónico:</label>
                                    <input type="email" name="correo" id="correo" required="" value="<?php echo $res->correoElectronico; ?>">

                                    <label for="dui">DUI:</label>
                                    <input type="number" name="dui" id="dui" required="" value="<?php echo $res->DUI; ?>">

                                    <label for="telefono">Número de teléfono:</label>
                                    <input type="number" name="telefono" id="telefono" required="" value="<?php echo $res->telefono; ?>">

                                    <label for="pass">Contraseña:</label>
                                    <input type="text" name="pass" id="pass" required="" value="<?php echo $res->contrasena; ?>">

                                    <label for="status">Estatus:</label>
                                    <select name="status" id="status">
                                        <option value="false">Empleado</option>
                                        <option value="true">Administrador</option>
                                    </select>

                                    <a class="submit" href="empleados.php">Regresar</a>
                                    <button type="submit" id="mod" name="mod" class="submit">Modificar Empleado</button>
                                </form>
                            </main>
                        </article>
                        <?php
                    } else if (isset($_GET["del"])) {
                        ?>
                        <article class="delEmpleado">
                            <h1>Eliminar Cuenta del Empleado</h1>
                            <main>
                                <form action="empleados.php" method="POST">
                                    <label for="id">ID:</label>
                                    <input type="number" name="id" id="id" disabled="" required="" value="<?php echo $res->ID; ?>">

                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" id="nombre" disabled="" required="" value="<?php echo $res->nombre; ?>">

                                    <label for="apellido">Apellido:</label>
                                    <input type="text" name="apellido" id="apellido" disabled="" required="" value="<?php echo $res->apellido; ?>">

                                    <label for="correo">Correo electrónico:</label>
                                    <input type="email" name="correo" id="correo" disabled="" required="" value="<?php echo $res->correoElectronico; ?>">

                                    <label for="dui">DUI:</label>
                                    <input type="number" name="dui" id="dui" disabled="" required="" value="<?php echo $res->DUI; ?>">

                                    <label for="telefono">Número de teléfono:</label>
                                    <input type="number" name="telefono" id="telefono" disabled="" required="" value="<?php echo $res->telefono; ?>">

                                    <label for="pass">Contraseña:</label>
                                    <input type="text" name="pass" id="pass" disabled="" required="" value="<?php echo $res->contrasena; ?>">

                                    <label for="del">ADVERTENCIA: ¿Estás seguro de borrar al usuario empleado <?php echo $res->nombre; ?>? Esta acción no se puede deshacer</label>
                                    <a class="submit" href="empleados.php">Regresar</a>
                                    <button type="submit" id="del" name="del" class="submit">Eliminar Empleado</button>
                                </form>
                            </main>
                        </article>
                        <?php
                    }
                }
            }
        ?>
    </body>
</html>
