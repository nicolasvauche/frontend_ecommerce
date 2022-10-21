<?php
session_start();
if (!$_SESSION['userid']) {
    // On redirige vers la page de connexion
    Header('Location: connexion.html');
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Ton compte SHOE</title>

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
                <a href="mon-compte.html" class="active">
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

        <!-- Application Alert -->
        <div class="app-alert info">
            <strong>Le savais-tu ?</strong>
            Si tu nous donnes ta date de naissance, on te souhaitera ton anniversaire
            <i class="fa-solid fa-face-smile-wink fa-lg"></i>
        </div>

        <!-- Application Main -->
        <main class="app-main">
            <div class="grid">
                <!-- Sub Menu Espace client -->
                <div class="app-subnavigation" role="navigation">
                    <a href="mon-compte.html" class="active">
                        <i class="fa-solid fa-user"></i>
                        <span>Mon compte</span>
                    </a>
                    <a href="mes-adresses.html">
                        <i class="fa-solid fa-address-book"></i>
                        <span>Mes adresses</span>
                    </a>
                    <a href="mon-courrier.html">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Mon courrier</span>
                    </a>
                    <a href="mon-panier.html" class="hide">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Mon panier</span>
                    </a>
                    <a href="mes-precommandes.html">
                        <i class="fa-solid fa-person-praying"></i>
                        <span>Mes précommandes</span>
                    </a>
                    <a href="mes-commandes.html">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <span>Mes commandes</span>
                    </a>
                    <hr />
                    <a href="./" onclick="return window.confirm('Tu veux partir ?');">
                        <i class="fa-solid fa-user-slash text-danger"></i>
                        <span>Déconnexion</span>
                    </a>
                </div>

                <!-- Page Card -->
                <section class="card">
                    <h2>Bienvenue chez toi Sophie</h2>
                    <p class="text-justify">
                        Tu as créé ton compte SHOE et tu as réussi à t'y connecter. Bravo !
                        Repère le petit menu supplémentaire sur la page, et navigue au sein
                        de ton espace douillet : tes infos
                        <small>(ici même)</small>
                        , tes
                        adresses, tes commandes, etc…
                    </p>
                    <p>
                        <small>
                            Ça
                            <span class="required">*</span>
                            , ça veut dire obligatoire !
                        </small>
                    </p>

                    <form class="app-form">
                        <div class="grid">
                            <div class="form-group">
                                <label for="userFirstname" title="Ton prénom">
                                    <i class="fa-solid fa-user"></i>
                                </label>
                                <input
                                        type="text"
                                        id="userFirstname"
                                        class="form-control"
                                        placeholder="ex: Sophie"
                                        value="Sophie"
                                        aria-labelledby="firstnameHelp"
                                />
                                <p id="firstnameHelp">
                                    <small>
                                        C'est ton prénom
                                        <br />
                                        On s'en souvient t'as vu
                                    </small>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="userLastname" title="Ton nom">
                                    <i class="fa-solid fa-user"></i>
                                </label>
                                <input
                                        type="text"
                                        id="userLastname"
                                        class="form-control"
                                        placeholder="ex: Dupont"
                                        value="Dupont"
                                        aria-labelledby="lastnameHelp"
                                />
                                <p id="lastnameHelp">
                                    <small>
                                        C'est ton nom
                                        <br />
                                        Très utile pour la livraison
                                    </small>
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                    for="userEmail"
                                    class="required"
                                    title="Ton adresse e-mail"
                            >
                                <i class="fa-solid fa-envelope"></i>
                            </label>
                            <input
                                    type="email"
                                    id="userEmail"
                                    class="form-control"
                                    placeholder="ex: sophie@dupont.com"
                                    value="sophie@dupont.com"
                                    required
                                    aria-required="true"
                                    aria-labelledby="emailHelp"
                            />
                            <p id="emailHelp">
                                <small>
                                    C'est ton adresse e-mail
                                    <br />
                                    C'est avec ça que tu te connectes
                                </small>
                            </p>
                        </div>
                        <div class="grid">
                            <div class="form-group">
                                <label for="userPassword" title="Modifie ton mot de passe">
                                    <i class="fa-solid fa-key"></i>
                                </label>
                                <input
                                        type="password"
                                        id="userPassword"
                                        class="form-control"
                                        aria-labelledby="passwordHelp"
                                />
                                <p id="passwordHelp">
                                    <small>
                                        Modifie ton mot de passe
                                        <br />
                                        Il doit contenir au moins 8 caractères
                                        <br />
                                        Il faut aussi des chiffres et des majuscules
                                    </small>
                                </p>
                            </div>
                            <div class="form-group">
                                <label
                                        for="userPasswordConfirm"
                                        title="Confirme ton mot de passe"
                                >
                                    <i class="fa-solid fa-key"></i>
                                </label>
                                <input
                                        type="password"
                                        id="userPasswordConfirm"
                                        class="form-control"
                                        aria-labelledby="passwordConfirmHelp"
                                />
                                <p id="passwordConfirmHelp">
                                    <small>
                                        Confirme ton mot de passe
                                        <br />
                                        il doit être identique au premier
                                        <br />
                                        avec des machins comme *, +, /, $, etc…
                                    </small>
                                </p>
                            </div>
                        </div>
                        <button type="submit" class="app-btn cta">
                            Enregistrer
                            <i class="fa-solid fa-play"></i>
                        </button>
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
