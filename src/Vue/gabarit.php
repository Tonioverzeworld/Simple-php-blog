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
                <!-- gestion des erreurs -->
                <?php
                if (!empty($_SESSION['erreurs'])){ ?>
                    <div class="erreurs" style="border: 1px solid red; background-color: rgba(255,156,166,0.58)">
                    <?php
                    foreach ($_SESSION['erreurs'] as $key => $value){ ?>
                    <p style="color: red"><strong><?= $key ?>: </strong><?= $value ?></p>
                    <?php }
                    ?>
                </div>
                <?php
                    $_SESSION['erreurs'] = [];
                } ?>
                <!-- gestion des confirmations -->
	            <?php
	            if (!empty($_SESSION['confirmations'])){ ?>
                    <div class="confirmations" style="border: 1px solid green; background-color: greenyellow">
			            <?php
			            foreach ($_SESSION['confirmations'] as $key => $value){ ?>
                            <p style="color: green"><strong><?= $key ?>: </strong><?= $value ?></p>
			            <?php } ?>
                    </div>
		            <?php
		            $_SESSION['confirmations'] = [];
	                } ?>
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>