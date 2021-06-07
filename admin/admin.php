<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../assets/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
        <title>Admin</title>
    </head>

    <body>
        <?php

        include __DIR__ . '/../connection/connect.php';
        include __DIR__ . '/../class/classlangue.php';

        $langue = new langue();

        if (!empty($_POST['button'])) {

            if ($_POST['button'] == "creer") {
                $name = $_POST['name']; 
                $translate = $_POST['translate'];

                $langue->createLangue($name,$translate);
            
            }

            if($_POST['button'] == "supprimer"){
            
                $id = $_POST['id'];
                $langue->deleteLangue($id);
            
            }

            // controler $etat avant modification
            if ($_POST['button'] == "open_modifier") {
                $etat = "ouvrir";
                $id_clique = $_POST['id'];

            }else{
                $etat = "";
                $id_clique = "";
            }

            // modification
            if ($_POST['button'] == "modifier"){

                $id = $_POST['id'];
                $name = $_POST['name'];
                $translate = $_POST['translate'];

                $langue->updateLangue($id,$name,$translate);

            }

        }

        $get_all_langue = $langue->getAllLangue();

        echo'<form action="admin.php" method="post" align="center">';

            echo'<input type="text" name="name" placeholder="langue">';
            echo'<input type="text" name="translate" placeholder="translate">';

            echo'<button type="submit" name="button" value="creer">';
            echo'enregistré';
            echo'</button>';

        echo'</form>';

        echo'<br>';

        echo'<table class="table">';
            echo'<thead  align="center">';
                echo'<tr>';
                    echo'<th >';
                        echo'id';
                    echo'</th>';
                    echo'<th >';
                        echo'Langue';
                    echo'</th>';
                    echo'<th >';
                        echo'Translate';
                    echo'</th>';

                    echo'<th >';
                        echo'Action';
                    echo'</th>';

            echo'</thead>';

            echo'<tbody>';
            foreach($get_all_langue as $k => $value){

                if((isset($etat)) && ($value['id'] == $id_clique )){

                echo'<form action="admin.php" method="post" align="center">';

                    echo'<tr>';
                        echo'<td>';
                            echo'<input type="number" name="id" value="'.$value['id'].'">';
                        echo'</td>';
                        echo'<td>';
                            echo'<input type="text" name="name"  value="'.$value['name'].'"placeholder="name">';
                        echo'</td>';
                        echo'<td>';
                            echo'<input type="text" name="translate"  value="'.$value['translate'].'" placeholder="translate">';
                        echo'</td>';   

                        echo'<td>';
                            echo'<button type="submit" class="btn btn-warning" name="button" value="modifier">';
                                echo'enregistré';
                            echo'</button>';
                        echo'</td>';
                    echo'</tr>';
                echo'</form>';

                
                }else{

                        echo'<tr align="center">';
                            echo'<td>';
                                echo$value['id'];
                            echo'</td>';
                            echo'<td>';
                                echo$value['name'];
                            echo'</td>';
                            echo'<td>';
                                echo$value['translate'];
                            echo'</td>';

                            echo'<td>';
                                // button - ouvrir modifier
                                echo'<form action="admin.php" method="post" align="center">';

                                    echo'<input type="hidden" name="id" value="'.$value['id'].'">';                    
                                    echo'<button class="btn btn-info" name="button" value="open_modifier" type="submit">';
                                        echo'modifier';
                                    echo'</button>';

                                echo'</form>';

                                // button - supprimer la ligne séléctionner
                                echo' <form action="admin.php" method="post" align="center">';
                                    echo'<input type="hidden" name="id" value="'.$value['id'].'">';
                                    echo' <button class="btn btn-danger" name="button" value="supprimer" type="submit">';
                                        echo'supprimer';
                                    echo'</button>';
                                echo' </form>';

                            echo'</td>';
                        echo'</tr>';
                    }
            }
            echo '</tbody>';
            echo '</table>';
        ?>
    </body>
</html>