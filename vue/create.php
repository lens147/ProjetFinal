<!DOCTYPE html>
<html lang="en">
    <?php $titre = "Création"; include('./layout/head.php');?>

    <body>
        <?php include('./layout/header.php');?>
        <form action="../traitement/article.php" method="post">
            <label for="title">titre</label>
            <input type="text" name="title" id="title">
            <label for="content">contenu</label>
            <textarea id="content" name="content" rows="10" cols="60"></textarea>
            <input type="submit" value="submit">
        </form>
        
        <?php include('./layout/footer.php');?>
    </body>
</html>