<?php

    /*$mails=["admin@educem.com","donald@educem.com","gilete@educem.com","gon@educem.com"];*/
    /*$contraseñas=["$2y$10$9hOQ.N9mdHZ5.QkRlk/Ad.YdXFPEqBaP0/aF4wwp7x/zM8mhCGmPi",
                    '$2y$10$A5GF9JgUAL.UQ5BYq.lEauURVdzdSwV/DF6s55OFYUjGXtZlPCgXq',
                    '$2y$10$r58Que0ucWZbM6YUP0YU3ufr.EaBudEEppeYSEwH9r5MiGyNrrnQC',
                    '$2y$10$S3wxHU8.jpmb0IHzGh7HV.BrlUfTbgel46jGghR.mCwAIY44rnGO.'];*/

    define('MAILS', array("admin@educem.com","donald@educem.com","gilete@educem.com","gon@educem.com"));
    define('CONTRASEÑAS', array("$2y$10$9hOQ.N9mdHZ5.QkRlk/Ad.YdXFPEqBaP0/aF4wwp7x/zM8mhCGmPi",
    '$2y$10$A5GF9JgUAL.UQ5BYq.lEauURVdzdSwV/DF6s55OFYUjGXtZlPCgXq',
    '$2y$10$r58Que0ucWZbM6YUP0YU3ufr.EaBudEEppeYSEwH9r5MiGyNrrnQC',
    '$2y$10$S3wxHU8.jpmb0IHzGh7HV.BrlUfTbgel46jGghR.mCwAIY44rnGO.'));
    /*$i=0;
    while($i<sizeof($contraseñas))
    {
        echo password_hash($contraseñas[$i], PASSWORD_DEFAULT)."<br>";
        $i++;
    }*/
    if(isset($_POST['nombre']))
    {
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];
        $nombre = base64_decode($nombre);
        $pass = base64_decode($pass);
        ComprobarUsuarioContraseña($pass,$nombre);
        
    }
    

    function ComprobarUsuarioContraseña($pass,$nombre)
    {
        $i=0;
        while($i<sizeof(MAILS))
        {
            if(password_verify($pass,CONTRASEÑAS[$i]) && MAILS[$i] == $nombre){
                echo'he entrado';
                header("Location: https://educem.com");
            }
            $i++;
        }
        echo "<script>
        alert('Usuario/contraseña erroneos')
        document.getElementById('nombre_usuario').value='$nombre';
        document.getElementById('contraseña').value='$pass';
        
        </script>";
    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<script>
    function codificar_contraseñas(){
        var nombre = document.getElementById("nombre_usuario").value;
        var contraseña = document.getElementById("contraseña").value;

        nombre = window.btoa(nombre);
        contraseña = window.btoa(contraseña);
        /*alert("nombre en base64: "+nombre+"\n"+"contraseña en base64: "+contraseña);*/
        
        enviarPost(nombre,contraseña);
        
    }

    function enviarPost(nombre,contraseña){


        document.getElementById("nombre_usuario").value=nombre;
        document.getElementById("contraseña").value=contraseña;
        document.getElementById("nombre_usuario").type="hidden";
        document.getElementById("contraseña").type="hidden";

    }


        
</script>
    <!--dust particel-->
    <div>
        <div class="starsec"></div>
        <div class="starthird"></div>
        <div class="starfourth"></div>
        <div class="starfifth"></div>
    </div>
    <!--Dust particle end--->

    <div class="container text-center text-dark mt-5">
        <div class="row">
            <div class="col-lg-4 d-block mx-auto mt-5">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-md-12">
                        <div class="card">
                            <div class="card-body wow-bg" id="formBg">
                            <form name="login" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
                            <!--<form name="login" action="" method="POST">-->
                                    <h3 class="colorboard">Inicio de sesión</h3>
                                    <div class="input-group mb-3"> <input type="text" class="form-control textbox-dg"
                                            placeholder="Nombre de usuario" id="nombre_usuario" name="nombre" 
                                            <?php if(isset($nombre))
                                            
                                            echo "value='$nombre'"
                                            
                                            ?> > </div>
                                    <div class="input-group mb-4"> <input type="password"
                                            class="form-control textbox-dg" placeholder="Contraseña"id="contraseña" name="pass"
                                            <?php if(isset($nombre))
                                            
                                            echo "value='$pass'"
                                            
                                            ?>>
                                             </div>

                                    <div class="row">
                                        <div class="col-12"> <input type="submit" value="Iniciar sesión"
                                                class="btn btn-primary btn-block logn-btn"onclick="codificar_contraseñas()"></input>
                                        </div>
                                        <div class="col-12"> <a href="forgot-password.html"
                                                class="btn btn-link box-shadow-0 px-0">Has olvidado la contraseña?</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>