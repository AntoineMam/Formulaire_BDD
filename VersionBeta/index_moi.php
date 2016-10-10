<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TP1_PDO</title>
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
//Liaison avec la class form//
        require 'Controler/ctrlr_tp1.php';
        $form = new form($_POST);
        ?>
        <form action="" method="post" class="row text-center">                      
            <div>
                <?php
                $dataUser = $form->searchUser();
                ?>
                <label for="Recherche" class="center-block">Recherche du Nom User :</label>
                <input type="text" name="Recherche" id="Recherche" maxlength="20">
                <input type="submit" name="searchUsr" value="Rechercher" class="btn-warning">                
            </div>
        </form>
        <div class="col-lg-3 text-center">        

            <!-- Formulaire de renseignement-->
            <div>
                <p class="lead">Utilisateur</p>  
                <label for="id" class="center-block"></label>
                <input type="text" disabled name="id" id="id" maxlength="5" value="<?php
                //Auto Incrément des Données nom
                echo $dataUser['id'];
                ?>">           
            </div>
            <form action="" method="post">
                <div>
                    <label for="Clients" class="center-block">Nom :</label>
                    <input type="text" name="lastName" id="lastName" maxlength="50" required value="<?php
                    //Auto Incrément des Données nom
                    echo $dataUser['lastName'];
                    ?>">
                </div>
                <div>
                    <label for="firstName" class="center-block">Prénom :</label>
                    <input type="text" name="firstName" id="firstName" maxlength="50" required value="<?php
                    //Auto Incrément des Données nom
                    echo $dataUser['firstName'];
                    ?>">
                </div>
                <div>
                    <label for="birthDate" class="center-block">Date de naissance :</label>
                    <input type="date" name="birthDate" id="birthDate" maxlength="10" required value="<?php
                    //Auto Incrément des Données nom
                    echo $dataUser['birthDate'];
                    ?>">
                </div>
                <div>
                    <label for="address" class="center-block">addresse :</label>
                    <input type="text" name="address" id="address" maxlength="100" required value="<?php
                    //Auto Incrément des Données nom
                    echo $dataUser['address'];
                    ?>">
                </div>
                <div>
                    <label for="postalCode" class="center-block">Code Postal :</label>
                    <input type="text" name="postalCode" id="postalCode" maxlength="5" required value="<?php
                    //Auto Incrément des Données nom
                    echo $dataUser['postalCode'];
                    ?>">
                </div>
                <div>
                    <label for="phone" class="center-block">Téléphone :</label>
                    <input type="text" name="phone" id="phone" maxlength="10" required value="<?php
                    //Auto Incrément des Données nom
                    echo $dataUser['phone'];
                    ?>">
                </div>
                <div>
                    <label for="service" class="center-block">service :</label>
                    <input type="text" name="service" id="service" maxlength="10" required value="<?php
                    //Auto Incrément des Données nom
                    echo $dataUser['service'];
                    ?>">
                </div>
                <div>
                    <?php
                    $form->submitUser();
                    ?>
                    <input type="submit" name="submitUser" value="Valider" class="btn-danger">           
                </div>
            </form>
            <form>
                <?php                
                //$dataUser = $form->modifyUser();
                ?>
                <input type = 'submit' name = 'modify' value = 'Modifier' class = 'btn-info'>

            </form>
        </div>
        <div class="col-lg-9">
            <p class="lead">Liste des utilisateurs</p>
            <div>
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
                    require 'Model/user.php';
                    $user = new user();
                    $list = $user->getData();
                    foreach ($list as $lists) {
                        ?>
                        <tr>
                            <td class="tabUserName"><?php echo $lists['lastName']; ?></td>
                            <td class="tabUserFname"><?php echo $lists['firstName']; ?></td>
                            <td class="tabUserBD"><?php echo $lists['birthDate']; ?></td>
                            <td class="tabUserAddress"><?php echo $lists['address']; ?></td>
                            <td class="tabUserCP"><?php echo $lists['postalCode']; ?></td>
                            <td class="tabUserPhone"><?php echo $lists['phone']; ?></td>
                            <td class="tabUserService"><?php echo $lists['service']; ?></td>
                        </tr>       
                    <?php }
                    ?>                               
                </table>
            </div>
        </div>
    </body>
</html>