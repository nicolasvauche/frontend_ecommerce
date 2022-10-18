<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Crée ton compte SHOE</title>

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
                <a href="./">
                    <i class="fa-solid fa-house"></i>
                    <span>Accueil</span>
                </a>
                <a href="mon-compte.html">
                    <i class="fa-solid fa-user"></i>
                    <span>Compte</span>
                </a>
                <a href="connexion.html">
                    <i class="fa-solid fa-user-lock"></i>
                    <span>Connexion</span>
                </a>
                <a href="inscription.php" class="active">
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
            Si tu crées ton compte, à chaque fois que tu te connecteras
            <small>(si tu te souviens de ton mot de passe)</small>
            , tu retrouveras
            tout comme avant
            <i class="fa-solid fa-face-smile-wink fa-lg"></i>
        </div>

        <!-- Application Main -->
        <main class="app-main">
            <!-- Page Card -->
            <section class="card">
                <h2>Crée ton compte SHOE</h2>
                <p class="text-justify">
                    Avec ton compte SHOE, tu pourras te connecter
                    <small>(déjà c'est cool)</small>
                    , et retrouver tes anciennes
                    commandes, ton panier, tes adresses et plein d'autres choses bien
                    douillettes. On te choye chez SHOE !
                </p>

                <p>
                    <small>
                        Ça
                        <span class="required">*</span>
                        , ça veut dire obligatoire !
                    </small>
                </p>

                <form class="app-form" action="php/inscription.php" method="post">
                    <div class="grid">
                        <div class="form-group">
                            <label for="userFirstname" title="Ton prénom">
                                <i class="fa-solid fa-user"></i>
                            </label>
                            <input
                                    type="text"
                                    id="userFirstname"
                                    name="firstname"
                                    class="form-control"
                                    placeholder="ex: Sophie"
                                    aria-labelledby="firstnameHelp"
                            />
                            <p id="firstnameHelp">
                                <small>
                                    Entre ton prénom
                                    <br />
                                    On s'en souviendra
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
                                    name="lastname"
                                    class="form-control"
                                    placeholder="ex: Dupont"
                                    aria-labelledby="lastnameHelp"
                            />
                            <p id="lastnameHelp">
                                <small>
                                    Entre ton nom
                                    <br />
                                    C'est utile pour la livraison
                                </small>
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userEmail" class="required" title="Ton adresse e-mail">
                            <i class="fa-solid fa-envelope"></i>
                        </label>
                        <input
                                type="email"
                                id="userEmail"
                                name="email"
                                class="form-control"
                                placeholder="ex: sophie@dupont.com"
                                required
                                aria-required="true"
                                aria-labelledby="emailHelp"
                        />
                        <p id="emailHelp">
                            <small>
                                Entre ton adresse e-mail
                                <br />
                                Et rappelle-t-en s'il te plaît
                            </small>
                        </p>
                    </div>
                    <div class="grid">
                        <div class="form-group">
                            <label
                                    for="userPassword"
                                    class="required"
                                    title="Ton mot de passe"
                            >
                                <i class="fa-solid fa-key"></i>
                            </label>
                            <input
                                    type="password"
                                    id="userPassword"
                                    name="password"
                                    class="form-control"
                                    required
                                    aria-required="true"
                                    aria-labelledby="passwordHelp"
                            />
                            <p id="passwordHelp">
                                <small>
                                    Entre ton mot de passe
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
                                    class="required"
                                    title="Confirme ton mot de passe"
                            >
                                <i class="fa-solid fa-key"></i>
                            </label>
                            <input
                                    type="password"
                                    id="userPasswordConfirm"
                                    name="passwordconfirm"
                                    class="form-control"
                                    required
                                    aria-required="true"
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
                        Inscription
                        <i class="fa-solid fa-play"></i>
                    </button>
                </form>

                <hr />

                <p>
                    <small>
                        <a href="connexion.html">
                            Ah mince
                            <i class="fa-regular fa-face-rolling-eyes"></i>
                            J'ai déjà
                            un compte SHOE, je veux me connecter plutôt
                        </a>
                    </small>
                </p>
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