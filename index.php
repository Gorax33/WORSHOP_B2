<?php 
     require_once("connexion.php");

    //$query = $db->prepare("SELECT * FROM article");
   // $query->execute();

    //$result = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $db->prepare("SELECT * FROM article WHERE validite = 1");
    $query->execute();

    $article_vrai = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $db->prepare("SELECT * FROM article WHERE validite = 0");
    $query->execute();

    $article_faux = $query->fetchAll(PDO::FETCH_ASSOC);

    $index_vrai = rand(0,sizeof($article_vrai) - 1);
    $index_faux = rand(0,sizeof($article_faux) - 1);

 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>SheepPeople</title>
</head>
<body>

    <header>
        <div class="display">
        <img class="logo" src="asset/img/2.png" alt="">
        <H1>Sheepeoples</H1>
        <nav>
        </nav>
    </div>
    </header>
    <main>
        
        <div class="container">

            <?php $pos = rand(0,100);
            
                if($pos <= 49){
                    $first_article = $article_faux[$index_faux];
                    $second_article = $article_vrai[$index_vrai];
                }
                else{
                    $second_article = $article_faux[$index_faux];
                    $first_article = $article_vrai[$index_vrai];
                }
            ?>
            <form action="#" method="post" class="form-example" >
                <button value=<?= $first_article['validite']?> type="submit" name="button">
                    <div class="card">
                        <div class="content">
                            <h2 class=""><?php echo $first_article['title'] ?></h2>
                            <p class=""><?php echo $first_article['text'] ?></p>
                        </div>
                    </div>
                </button>
                <button value=<?= $second_article['validite']?> type="submit" name="button">
                    <div class="card">
                        <div class="content">
                            <h2 class=""><?php echo $second_article['title'] ?></h2>
                            <p class=""><?php echo $second_article['text'] ?></p>
                        </div>
                    </div>
                </button>
            </form>
            
        </div>
        
    </main>
    <footer>
        
    </footer>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST["button"] == 0){
                echo "ta faux fils de pute";
            }
            elseif($_POST["button"] == 1){
                echo "ta juste bg";
            }
            else{
                echo "ERROR";
            };

            unset($article_vrai[$index_vrai]);
            unset($article_faux[$index_faux]);

            $index_vrai = rand(0,sizeof($article_vrai) - 1);
            $index_faux = rand(0,sizeof($article_faux) - 1);
        }
    
    ?>
    
</body>
</html>
