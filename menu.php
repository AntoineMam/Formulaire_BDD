<html>
    <?php
    require_once 'Models/connectDB.php';
    require_once 'Models/user.php';
    require_once 'Models/service.php';
    require_once 'Controllers/userList.php';
    ?>
    <div class="col-lg-offset-2 col-lg-9">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"> <a href="index.php">Accueil</a> </li>
                    <li> <a href="ajout.php">Ajouter utlisateur</a> </li>
                </ul>
                <form class="navbar-form navbar-right inline-form" action="ajout.php" method="POST">
                    <div class="form-group">
                        <input type="search" class="input-sm form-control" placeholder="Recherche" name="lastNameSearch">
                        <a type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</a>
                        <?php
                       
                        ?>
                    </div>
                </form>
                <form class="navbar-form navbar-right inline-form" action="#" method="GET">
                    <div class="form-group">                        
                        <select class="selectpicker" data-style="btn-primary" name="serviceId" onchange="this.form();">
                            <?php foreach ($serviceList as $serviceDetail) { ?>
                                <option value="<?php echo $serviceDetail['id'] ?>" <?php echo ($serviceId == $serviceDetail['id']? 'selected' : ''); ?>><?php echo $serviceDetail['serviceName'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" class="btn btn-primary btn-sm">
                    </div>
                </form>
            </div>
        </nav>
    </div>
</html>