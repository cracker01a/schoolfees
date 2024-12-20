<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
<base href="{{asset('/')}}">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <style>
        .logo-link {
    display: flex;
    justify-content: center; /* Centre horizontalement */
    align-items: center; /* Centre verticalement */
    text-decoration: none; /* Supprime le soulignement */
}

.logo-name {
    color: blue; /* Texte en violet */
    font-size: 24px; /* Augmente la taille du texte */
    font-weight: bold; /* Met le texte en gras */
    margin: 0; /* Supprime les marges par défaut */
    text-transform: uppercase; /* Transforme le texte en majuscules (optionnel) */
}

    </style>
    <!-- Page Title  -->
    <title>Login | schoolfees</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.2.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.2.3">
</head>

<body class="nk-body bg-white npc-general pg-auth">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-split nk-split-page nk-split-lg">
                    <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                        <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                            <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                        </div>
                        <div class="nk-block nk-block-middle nk-auth-body">
                            <div class="brand-logo pb-2">
                            <a href="html/index.html" class="logo-link text-center">
                                <h6 class="logo-name">schoolfees</h6>
                            </a>

                            </div>

                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Connexion</h5>
                                    <div class="nk-block-des">
                                        <p>Acceder a votre dashbord en entrant vos informations.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <form action="{{ route('login') }}" method="POST" class="form-validate is-alter" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="email-address">Email</label>
                                        <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input autocomplete="off" type="text" class="form-control form-control-lg" required id="email-address" name="email" placeholder="Enter your email address or username">
                                    </div>
                                </div><!-- .form-group -->
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Mot de passe</label>
                                        <a class="link link-primary link-sm" tabindex="-1" href="html/pages/auths/auth-reset.html">Forgot Code?</a>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input autocomplete="new-password" type="password" class="form-control form-control-lg" required id="password" name="password" placeholder="Enter your passcode">
                                    </div>
                                </div><!-- .form-group -->

                                <!-- Si le mot de passe n'est pas défini, afficher un champ de confirmation -->
                                @if ($showConfirmPassword ?? false)
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="confirm-password">Confirm Passcode</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="password" class="form-control form-control-lg" required id="confirm-password" name="confirm_password" placeholder="Confirm your passcode">
                                    </div>
                                </div><!-- .form-group -->
                                @endif

                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                </div>
                            </form><!-- form -->
                            <div class="form-note-s2 pt-4"> New on our platform? <a href="html/pages/auths/auth-register.html">Create an account</a>
                            </div>
                            
                        
                        </div><!-- .nk-block -->
                       
                    </div><!-- .nk-split-content -->
                    <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                        <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                            <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                <div class="slider-item">
                                    <div class="nk-feature nk-feature-center">
                                        <div class="nk-feature-img">
                                            <img class="round" src="pay.webp" s alt="">
                                        </div>
                                        <div class="nk-feature-content py-4 p-sm-5">
                                            <h4>schoolfees</h4>
                                            <p> assurez l'avenir de vos enfants .</p>
                                        </div>
                                    </div>
                                </div><!-- .slider-item -->
                                <div class="slider-item">
                                    <div class="nk-feature nk-feature-center">
                                        <div class="nk-feature-img">
                                            <img class="round" src="pay.webp" srcset="./images/slides/promo-b2x.png 2x" alt="">
                                        </div>
                                        <div class="nk-feature-content py-4 p-sm-5">
                                            <h4>schoolfees</h4>
                                            <p>plus de soucis pour le paiement de vos enfants.</p>
                                        </div>
                                    </div>
                                </div><!-- .slider-item -->
                                <div class="slider-item">
                                    <div class="nk-feature nk-feature-center">
                                        <div class="nk-feature-img">
                                            <img class="round" src="pay2.webp" srcset="./images/slides/promo-c2x.png 2x" alt="">
                                        </div>
                                        <div class="nk-feature-content py-4 p-sm-5">
                                            <h4>schoolfees</h4>
                                            <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                                        </div>
                                    </div>
                                </div><!-- .slider-item -->
                            </div><!-- .slider-init -->
                            <div class="slider-dots"></div>
                            <div class="slider-arrows"></div>
                        </div><!-- .slider-wrap -->
                    </div><!-- .nk-split-content -->
                </div><!-- .nk-split -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>

    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.2.3"></script>
    <script src="./assets/js/scripts.js?ver=3.2.3"></script>
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        <ul class="country-list text-center gy-2">
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/arg.png" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/aus.png" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/bangladesh.png" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/canada.png" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/french.png" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/germany.png" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/iran.png" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/italy.png" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/mexico.png" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/philipine.png" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/portugal.png" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/s-africa.png" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/spanish.png" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/switzerland.png" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/uk.png" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/english.png" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->

</html>