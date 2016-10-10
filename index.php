<?php
include_once 'Models/connectDB.php';
include_once 'Models/service.php';
include_once 'Models/user.php';
include_once 'Controllers/userList.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TP1_PDO</title>
        <script src="Assets/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>
        <link href="Assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="Assets/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1 class="text-center">Liste des utilisateurs</h1>
        <?php require 'menu.php'; ?>
        <div class="col-lg-offset-2 col-lg-9">     
            <table>                    
                <tr>
                    <td class="tabUserName"> Nom </td>
                    <td class="tabUserFname"> Prénom </td>
                    <td class="tabUserBD"> Date de Naissance </td>
                    <td class="tabUserAddress"> Adresse </td>
                    <td class="tabUserCP"> Code postale </td>
                    <td class="tabUserPhone"> Phone </td>
                    <td class="tabUserService"> Service </td>                                                
                </tr>
                <?php
                foreach ($userList as $lists) {
                    ?>
                    <tr>
                        <td class="tabUserName"><?php echo $lists['lastName']; ?></td>
                        <td class="tabUserFname"><?php echo $lists['firstName']; ?></td>
                        <td class="tabUserBD"><?php echo $lists['age']; ?></td>
                        <td class="tabUserAddress"><?php echo $lists['address']; ?></td>
                        <td class="tabUserCP"><?php echo $lists['postalCode']; ?></td>
                        <td class="tabUserPhone"><?php echo $lists['phone']; ?></td>
                        <td class="tabUserService"><?php echo $lists['serviceName']; ?></td>
                        <td class="tabUserService"><a href="?id=<?php echo $lists['id'] ?>" type = "submit" name = "suprimer" value = "suprimer" class = "btn-danger">Suprimer</a>
                        </td>
                        <td class="tabUserService"><a href="ajout.php?id=<?php echo $lists['id'] ?>" type = "submit" name = "modifier" value = "modifier" class = "btn-group">Modifier</a>
                        </td>
                    </tr>       
                <?php }
                ?>                               
            </table>            
        </div>
    </body>
</html>