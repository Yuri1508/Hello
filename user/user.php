<?php
    include __DIR__ . '/../class/classlangue.php';

    $langue = new langue();

    $alllangue = $langue->getAllLangue();

    if(isset($_POST['select_langue'])){

        $translate = $_POST['select_langue'];
        $prenom = $_POST['prenom'];
    }else{
        $translate = '';
        $prenom = '';
    };

?>


<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
        <title>User</title>
    </head>
    <body>
        <form action="user.php" method="post">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="justify-content: space-around;">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <select name="select_langue" id="select_langue">
                            <?php
                                foreach ($alllangue as $value) {
                                echo '<option value="'.$value['translate'].'">';
                                echo $value['name'];
                                echo '</option>';
                                }
                            ?>
                        </select>
                    </li>
                    <li class="nav-item">
                        <input type="text" name="prenom" id="prenom" placeholder="Name">
                    </li>
                    <li class="nav-item">
                        <button type="submit" >submit</button>
                    </li>
                </ul>
            </nav>
        </form>

        <?php
            echo $translate.' '.$prenom;
        ?>

        <div class="container" style="margin-top: 100px;">
            <div class="row justify-content-center">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h1 id="affiche"></h1>
                </div>
            </div>
        </div>

        <script src="../js/jquery.js"></script>

        <script language="javascript">
            $(document).ready(function(){

                // si je clique "langue"
                $('#select_langue').click('click',function(){
                    
                    //retiré element dans #affiche
                    $('#affiche').empty();

                    // je récupère la valeur "langue"
                    $select_langue = $('#select_langue').val();
                    
                    // je récupère la valeur "prenom"
                    $select_prenom = $('#prenom').val();
                    
                    // affiché || rajouter
                    $('#affiche').append($select_langue+' '+$select_prenom);


                });


            });
        </script>
    </body>
</html>