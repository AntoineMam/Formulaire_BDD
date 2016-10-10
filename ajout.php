<?php
require_once 'Models/connectDB.php';
require_once 'Models/user.php';
require_once 'Models/service.php';
//require_once 'Controllers/userAdd.php';
require_once 'Controllers/userAdd_MIKA.php'
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>TP1_PDO</title>
        <link href="Assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css.css" rel="stylesheet" type="text/css"/>
    </head>
    <h1 class="text-center">Utilisateur :</h1>  
    <?php require 'menu.php'; ?>
    <div class="col-lg-offset-3 col-lg-6">        
        <form action="ajout.php" method="post">
            <?php
            $dataUser = $user->searchUser();
            ?>
            <!-- Formulaire de renseignement-->              
            <div class="form-group <?php /* class has-error de l'input bootstrap */ echo $lastNameError ? 'has-error' : '' ?>">
                <label for="lastName" class="center-block control-label">Nom :</label> <div class="input-group">
                    <input type="text" class="form-control" name="lastName" id="lastName" maxlength="50" value="<?php /* ternaire qui garde le champ rempli en cas d'erreur */ echo isset($lastName) ? $lastName : '' ?> <?php
                    //Auto Incrément des Données nom
                    //echo $dataUser['lastName'];
                    ?>">
                </div></div>
            <div class="form-group <?php echo $firstNameError ? 'has-error' : '' ?>">
                <label for="firstName" class="center-block control-label">Prénom :</label> 
                <div class="input-group">
                    <input type="text" class="form-control" name="firstName" id="firstName" maxlength="50" value="<?php echo isset($firstName) ? $firstName : '' ?>">
                </div></div>
            <div class="form-group <?php echo $addressError ? 'has-error' : '' ?>">
                <label for="birthDate" class="center-block control-label">Date de naissance :</label>
                <div class="input-group">
                    <input type="date" class="form-control" name="birthDate" id="birthDate" maxlength="10" value="<?php echo isset($birthDate) ? $birthDate : '' ?>">
                </div></div>
            <div class="form-group <?php echo $addressError ? 'has-error' : '' ?>">
                <label for="address" class="center-block control-label">addresse :</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="address" id="address" maxlength="100" value="<?php echo isset($address) ? $address : '' ?>">
                </div></div>
            <div class="form-group <?php echo $postalCodeError ? 'has-error' : '' ?>">
                <label for="postalCode" class="center-block control-label">Code Postal :</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="postalCode" id="postalCode" maxlength="5" value="<?php echo isset($postalCode) ? $postalCode : '' ?>">
                </div></div>
            <div class="form-group <?php echo $phoneError ? 'has-error' : '' ?>">
                <label for="phone" class="center-block control-label">Téléphone :</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="phone" id="phone" maxlength="10" value="<?php echo isset($phone) ? $phone : '' ?>">
                </div></div>

            <div class="form-group">                        
                <select class="selectpicker" data-style="btn-primary" name="serviceId" onchange="this.form();">
                    <?php foreach ($serviceList as $serviceDetail) { ?>
                        <option value="<?php echo $serviceDetail['id'] ?>" <?php echo ($serviceIdList == $serviceDetail['id'] ? 'selected' : ''); ?>><?php echo $serviceDetail['serviceName'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>                
                <input type="submit" name="submitUser" value="Valider" class="btn-danger">
            </div>
        </form>        
    </div>
</html>