<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Lecture d'un fichier JSON
$productsString = file_get_contents("src/data/products.json");
$products = json_decode($productsString, true);


// Écriture d'un fichier JSON
$content = [
    'prenom' => 'Nicolas',
    'nom' => 'Vauche',
];
$contentJson = json_encode($content);
file_put_contents('src/data/test.json', $contentJson);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Habille tes pieds avec SHOE</title>

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
        <link rel="manifest" href="site.webmanifest" />
        <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5" />
        <meta name="msapplication-TileColor" content="#00aba9" />
        <meta name="theme-color" content="#ffffff" />

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
                href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap"
                rel="stylesheet"
        />

        <!-- Fontawesome -->
        <script
                src="https://kit.fontawesome.com/b916232238.js"
                crossorigin="anonymous"
        ></script>

        <link rel="stylesheet" href="assets/css/styles.min.css" />

        <script src="assets/js/index.js" type="module" defer></script>
    </head>
    <body>
        <!-- Application Header -->
        <header class="app-header">
            <a href="./" class="app-brandname">
                Habille tes
                <span>pieds</span>
                avec
                <img src="assets/img/logo_w.png" alt="Logo SHOE" />
            </a>

            <!-- Application Navigation -->
            <nav class="app-navigation">
                <a href="./" class="active">
                    <i class="fa-solid fa-house"></i>
                    <span>Accueil</span>
                </a>
                <a href="mon-compte.php">
                    <i class="fa-solid fa-user"></i>
                    <span>Compte</span>
                </a>
                <a href="connexion.html">
                    <i class="fa-solid fa-user-lock"></i>
                    <span>Connexion</span>
                </a>
                <a href="inscription.php">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Inscription</span>
                </a>
                <a href="mon-panier.html" class="hide">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Panier</span>
                </a>
            </nav>
        </header>

        <!-- Application Main -->
        <main class="app-main">
            <!-- Page Cover -->
            <section class="cover">
                <div class="app-slider" id="slider">
                    <!-- Slider Controls -->
                    <div class="controls"></div>

                    <!-- Slider Slides -->
                </div>
            </section>

            <!-- Application Alert -->
            <div class="app-alert info">
                <strong>Le savais-tu ?</strong>
                En fait, SHOE se prononce &laquo;&nbsp;choé&nbsp;&raquo;
                <i class="fa-solid fa-face-smile-wink fa-lg"></i>
            </div>

            <!-- Page Card -->
            <section class="card">
                <h2>Découvre ta nouvelle marque</h2>
                <p class="text-justify">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero dicta
                    iste blanditiis architecto omnis exercitationem dignissimos.
                    Laboriosam, sequi. Quisquam quaerat saepe velit est quos hic quasi
                    dolorum optio porro consequatur!
                </p>
                <div class="flex">
                    <figure class="app-img">
                        <img src="assets/img/handmade.jpg" alt="Fabrication artisanale" />
                        <figcaption>
                            Nos SHOE sont toutes fabriquées 100% artisanalement.
                            <br />
                            &laquo;&nbsp;a la mano&nbsp;&raquo; comme on dit
                        </figcaption>
                    </figure>
                    <p>
                        <img src="assets/img/made_in_france.png" alt="Fabriqué en France" />
                    </p>
                </div>
                <p class="text-justify">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero dicta
                    iste blanditiis architecto omnis exercitationem dignissimos.
                    Laboriosam, sequi. Quisquam quaerat saepe velit est quos hic quasi
                    dolorum optio porro consequatur!
                </p>
                <a href="inscription.php" class="app-btn cta"> Je crée mon compte</a>
            </section>

            <section class="card">
                <h2>Nos chaussures</h2>

                <div class="products grid">
                    <?php foreach ($products as $product): ?>
                        <div class="product grid-item">
                            <img src="assets/img/catalog/shoes/<?php echo $product['img']['src']; ?>" alt="<?php echo $product['img']['alt']; ?>" />
                            <h3><?php echo $product['title']; ?></h3>
                            <p class="description"><?php echo $product['description']; ?></p>
                            <p class="price">
                                <?php echo NumberFormatter::create('fr-FR', NumberFormatter::CURRENCY)->format($product['price']); ?>
                            </p>
                            <?php if ($product['stock'] === 0): ?>
                                <p class="stock nul">En précommande</p>
                            <?php else: ?>
                                <p class="stock">Il en reste <?php echo $product['stock']; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>

        <!-- Application Footer -->
        <footer class="app-footer">
            <!-- Footer Icons -->
            <div class="prefoot">
                <div class="icon">
                    <i class="fa-solid fa-igloo"></i>
                    <h3>Achète au chaud</h3>
                    <p class="text-justify">
                        De chez toi, sur le canapé de tes amis, aux toilettes, dans le bus,
                        ou pendant ta pause déjeuner : avec nous c'est où tu veux, quand tu
                        veux.
                    </p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-money-bill-wave"></i>
                    <h3>Paie content</h3>
                    <p class="text-justify">
                        Chez nous, le paiement en ligne c'est comme d'habitude chez les gens
                        sérieux : c'est sécurisé et c'est selon TES habitudes : carte
                        bancaire, Paypal, etc…
                    </p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-truck-fast"></i>
                    <h3>Attends un peu</h3>
                    <p class="text-justify">
                        Tu vas bientôt recevoir tes nouvelles chaussures SHOE ! Tu n'en peux
                        plus d'attendre, et oh oui, on te comprend teeeellement&nbsp;!
                    </p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-rotate-left"></i>
                    <h3>Renvoie-les</h3>
                    <p class="text-justify">
                        Si nous, ou toi, ou tout le monde s'est trompé, hé bien pas de souci
                        ! Les retours sont rapides et gratuits, on ne va pas s'embrouiller
                        non plus…
                    </p>
                </div>
            </div>

            <!-- Footer Newsletter -->
            <div class="newsletter">
                <a href="./" class="app-brandname">
                    <img src="assets/img/logo.png" alt="Logo SHOE" />
                    Habille tes
                    <span>pieds</span>
                </a>

                <form class="app-form">
                    <h3>Tu veux du courrier ?</h3>
                    <div class="form-group">
                        <label
                                for="newsletterEmail"
                                class="icon"
                                title="Ton adresse e-mail"
                        >
                            <i class="fa-solid fa-envelope"></i>
                        </label>
                        <input
                                type="email"
                                name="email"
                                id="newsletterEmail"
                                class="form-control"
                                placeholder="ex: sophie@dupont.com"
                                required
                                aria-required="true"
                        />
                        <button type="submit" class="app-btn" title="Abonne-toi">
                            <i class="fa-solid fa-play"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer Legals -->
            <div class="legals">
                <p>
                    <a href="#">Mentions légales
                    </a
                    >
                    <span class="divider">&nbsp;|&nbsp;</span>
                    <a href="#">Protection des données
                    </a
                    >
                    <span class="divider">&nbsp;|&nbsp;</span>
                    <a href="#">Conditions Générales de vente</a>
                </p>
                <p>© 2022 SHOE. Tous Droits Réservés.</p>
            </div>
        </footer>
    </body>
</html>
