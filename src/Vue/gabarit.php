<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="contenu">
                <!-- Gestion des Erreurs -->
                <?php
                if(!empty($_SESSION['erreur'])){
                    ?>
                <div class="erreurs">
                    <?php foreach ($_SESSION['erreur'] as $key => $value){
                     ?>
                    <p style="color: red"><strong><?= $key; ?>: </strong><?= $value ?></p>
                    <?php } ?>
                </div>
                <?php
                $_SESSION['erreur'] = [];
                } ?>
                <!-- Fin de Gestion des Erreurs -->
                <!-- Gestion des confirmations -->
	            <?php
	            if(!empty($_SESSION['confirmation'])){
		            ?>
                    <div class="erreurs">
			            <?php foreach ($_SESSION['confirmation'] as $key => $value){
				            ?>
                            <p style="color: green"><strong><?= $key; ?>: </strong><?= $value ?></p>
			            <?php } ?>
                    </div>
		            <?php
		            $_SESSION['confirmation'] = [];
	            } ?>
                <!-- Fin de gestion des confirmations -->
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>