<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once 'php/classes/User.php';
$user = new User($_SESSION['userid']);

if (!$user) {
    var_dump('Aucun utilisateur trouvé');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Ta Newsletter - Ton compte SHOE</title>

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
    </head>
    <body class="compte">
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
                <a href="./">
                    <i class="fa-solid fa-house"></i>
                    <span>Accueil</span>
                </a>
                <?php if (isset($_SESSION['userid'])): ?>
                    <a href="mon-compte.php" class="active">
                        <i class="fa-solid fa-user"></i>
                        <span>Compte</span>
                    </a>
                    <a href="php/deconnexion.php" onclick="return window.confirm('Tu pars ?')">
                        <i class="fa-solid fa-person-running"></i>
                        <span>Déconnexion</span>
                    </a>
                <?php else: ?>
                    <a href="connexion.php">
                        <i class="fa-solid fa-user-lock"></i>
                        <span>Connexion</span>
                    </a>
                    <a href="inscription.php">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Inscription</span>
                    </a>
                <?php endif; ?>
                <a href="mon-panier.php" class="hide">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Panier</span>
                </a>
            </nav>
        </header>

        <!-- Application Alert -->
        <div class="app-alert info">
            <strong>Le savais-tu ?</strong>
            Si tu t'abonnes à notre newsletter, tu recevras du courrier intéressant
            <small>(pour une fois)</small>
            <i class="fa-solid fa-face-smile-wink fa-lg"></i>
        </div>

        <!-- Application Main -->
        <main class="app-main">
            <div class="grid">
                <!-- Sub Menu Espace client -->
                <div class="app-subnavigation" role="navigation">
                    <a href="mon-compte.php">
                        <i class="fa-solid fa-user"></i>
                        <span>Mon compte</span>
                    </a>
                    <a href="mes-adresses.php">
                        <i class="fa-solid fa-address-book"></i>
                        <span>Mes adresses</span>
                    </a>
                    <a href="mon-courrier.php" class="active">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Mon courrier</span>
                    </a>
                    <a href="mon-panier.php" class="hide">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Mon panier</span>
                    </a>
                    <a href="mes-precommandes.php">
                        <i class="fa-solid fa-person-praying"></i>
                        <span>Mes précommandes</span>
                    </a>
                    <a href="mes-commandes.php">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <span>Mes commandes</span>
                    </a>
                    <hr />
                    <a href="./" class="text-secondary" onclick="return window.confirm('Tu veux partir ?');">
                        <i class="fa-solid fa-person-running text-secondary"></i>
                        <span>Déconnexion</span>
                    </a>
                </div>

                <!-- Page Card -->
                <section class="card">
                    <h2>Ta Newsletter</h2>
                    <p class="text-justify">
                        Mais enfin ? Tu n'es pas encore abonné à la Newsletter SHOE
                        <i class="fa-regular fa-face-surprise"></i>
                        Fais-le vite ! Et va
                        checker tes mails, parce qu'il faudra que tu confirmes ton
                        abonnement
                        <small>(hé oui, c'est sécurisé ça aussi)</small>
                    </p>

                    <p>
                        <small>
                            Ça
                            <span class="required">*</span>
                            , ça veut dire obligatoire !
                        </small>
                    </p>

                    <form class="app-form">
                        <div class="form-group flex">
                            <label
                                    for="newsletterEmail"
                                    class="required"
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
                                    value="<?php echo $user->getEmail(); ?>"
                                    required
                                    aria-required="true"
                                    aria-labelledby="emailHelp"
                            />
                            <button type="submit" class="app-btn" title="Abonne-toi">
                                <i class="fa-solid fa-play"></i>
                            </button>
                        </div>
                        <p id="emailHelp">
                            <small>
                                Nous n'utilisons tes données que pour te servir au mieux.
                                <br />
                                On ne les revend pas, on ne les donne à personne. Promis !
                            </small>
                        </p>
                    </form>
                </section>
            </div>
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