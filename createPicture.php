<!-- Site fait avec ♥ par Eliaccess, merci Coco pour l'aide ♥ -->
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>IntegFev 2019</title>
        <link href="./css/bootstrap.css" rel="stylesheet">
        <link href="./css/style.css" rel="stylesheet">
        <link rel="icon" class="favicon" type="image/png" href="./Images/logo.png">
</head>
<?php

        $infosphoto = pathinfo($_FILES['photo']['name']);
        $extensionphoto = $infosphoto['extension'];
        $extensionsautorisees = array("jpg", "jpeg", 'JPG', "JPEG", "png", "PNG");
        $extjpg = array("jpg", "jpeg", "JPG", "JPEG");
        $extpng = array("png", "PNG");

        if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0){
                if ($_FILES['photo']['size'] <= 10000000){
                        if (in_array($extensionphoto, $extensionsautorisees)){
                                $uploadok = 1;
                        }else{
                                $uploadok = 0;
                        }
                }else{
                        $uploadok = 0;
                }
        }else{
                $uploadok = 0;
        }


        $clan = $_POST['clan'];
        ini_set ('memory_limit', '400M');

        if ($uploadok == 1){
                if (in_array($extensionphoto, $extpng)){
                        $photo = imagecreatefrompng($_FILES['photo']['tmp_name']);
                }
                if (in_array($extensionphoto, $extjpg)){
                        $photo = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
                }
                switch ($clan) {
                        case "DURI":
                                $logo = imagecreatefrompng("./Images/filters/logo_dl.png");
                                $btn = 'btn-warning';
                                break;
                        case "DAGUL":
                                $logo = imagecreatefrompng("./Images/filters/logo_dd.png");
                                $btn = 'btn-danger';
                                break;
                }

                $photowidth = imagesx($photo);
                $photoheight = imagesy($photo);

                $logoheight = imagesx($logo);
                $logowidth = imagesy($logo);
                $logodim = min($photowidth, $photoheight);
                $nlogo = imagecreatetruecolor($logodim, $logodim);
                imagealphablending($nlogo, false);
                imagesavealpha($nlogo, true);
                imagealphablending($logo, false);
                imagesavealpha($logo, true);

                imagecopyresampled($nlogo, $logo, 0, 0, 0, 0, $logodim, $logodim, $logoheight, $logowidth);

                if($clan == "OSSA"){
                        // Right bottom
                        $destx = $photowidth - $logodim;
                        $desty = $photoheight - $logodim;
                }else{
                        // Left Top
                        $destx = 0;
                        $desty = 0;
                }

                $path = './Images/gen/' . $_FILES['photo']['name'] . '_' . $_POST['clan'] . '_integ2019.png';
                $name = './Images/gen/' . $_FILES['photo']['name'] . '_' . $_POST['clan'] . '_integ2019.png';

                imagecopy($photo, $nlogo, $destx, $desty, 0, 0, $logodim, $logodim);
                imagepng($photo, $path);

                imagedestroy($photo);
                imagedestroy($logo);
                imagedestroy($nlogo);

                //print '<img src="'.$path.'" alt="texte alternatif" />';
                print '<a href="'.$path.'" download="tu-es-moche" role="button" class="btn '.$btn.' btn-large">Clique ici pour télécharger ta photo !</a>';
        }
        else
        {
                echo '<script>alert(\'Une erreur est survenue, vérifie que ton image est au format jpg, jpeg ou png et que sa taille ne dépasse pas 10 Mo.\')</script>';
        }
?>
