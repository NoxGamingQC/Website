@extends('layouts.app')
@section('title', trans('tools.demo_unit'))
@section('slogan', trans('tools.demo_unit_description'))
@section('content')

<div class="container-fluid">
    <h1>Unité de démonstration</h1>
    <hr />
    <div class="accordion" id="OS">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#amazon" aria-expanded="true" aria-controls="amazon" >
                    Amazon
                </button>
            </h2>
            <div id="amazon" class="accordion-collapse collapse show" data-bs-parent="#OS">
                <div class="accordion-body">
                    <ol>
                        <li>Configurer l'appareil, sans lier de compte.</li>
                        <li>Dans la barre de recherche, tapez <code>;demo</code>.</li>
                        <li>Une notification apparaîtra, vous demandant si vous voulez mettre l'appareil en mode démonstrateur.</li>
                        <li>Appuyez deçu.</li>
                        <li>Suivez les étapes à l'écran.</li>
                    </ol>
                    <br />
                    <i>N.B. Ceci fonctionne seulement avec les tablettes. Tous les autres produit amazon demanderons l'assistance du service pour entreprise.</i>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#apple" aria-expanded="true" aria-controls="apple" >
                    Apple
                </button>
            </h2>
            <div id="apple" class="accordion-collapse collapse" data-bs-parent="#OS">
                <div class="accordion-body">
                    <ol>
                        <li>Allez au <a href="https://demounit.apple.com/">demounit.apple.com</a> ou installez l'application <a href="https://demounit.apple.com/help/Apps/DemoUnit">DemoUnit</a></li>
                        <li>Connectez-vous à votre compte Apple</li>
                        <li>Trouvez votre magasin</li>
                        <li>Entrez le numéro de série de l'appareil</li>
                    </ol>
                    <h2>Paramètre</h2>
                    <div class="accordion" id="appleSettings">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#settingIpad" aria-expanded="true" aria-controls="settingIpad" >
                                    iPad
                                </button>
                            </h2>
                            <div id="settingIpad" class="accordion-collapse collapse" data-bs-parent="#appleSettings">
                                <div class="accordion-body">   
                                    <p>Appuyez avec 3 doigt en haut à droite de l'écran pendant que la vidéo de démonstration joue. Tenez jusqu'à ce que le menu apparaisse.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#settingAppleWatch" aria-expanded="true" aria-controls="settingAppleWatch" >
                                    Apple Watch
                                </button>
                            </h2>
                            <div id="settingAppleWatch" class="accordion-collapse collapse" data-bs-parent="#appleSettings">
                                <div class="accordion-body">   
                                    <ol>
                                        <li>Ouvrez Paramètre</li>
                                        <li>Tappez 3 fois avec 2 doigts au milieu de l'écran.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chromeOS" aria-expanded="true" aria-controls="chromeOS" >
                    Google ChromeOS
                </button>
            </h2>
            <div id="chromeOS" class="accordion-collapse collapse" data-bs-parent="#OS">
                <div class="accordion-body">
                    <div class="accordion" id="chromeIsEnable">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chromeEnable" aria-expanded="true" aria-controls="chromeEnable" >
                                    Activer le mode démonstration
                                </button>
                            </h2>
                            <div id="chromeEnable" class="accordion-collapse collapse show" data-bs-parent="#chromeIsEnable">
                                <div class="accordion-body">
                                    <ol>
                                        <li>Appuyez sur <code>CTRL+Alt+D</code> alors que vous êtes sur l'écran de configuration</li>
                                        <li>Suivez les étapes</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chromeDisable" aria-expanded="true" aria-controls="chromeDisable" >
                                    Désactiver le mode démonstration
                                </button>
                            </h2>
                            <div id="chromeDisable" class="accordion-collapse collapse" data-bs-parent="#chromeIsEnable">
                                <div class="accordion-body">
                                    <ol>
                                        <li>Appuyez sur <code>ESC+Refresh+Power</code></li>
                                        <li>Mettez l'appareil en mode développeur, ceci formattera l'appareil. (ou appuyez sur <code>CTRL+D</code>)</li>
                                        <li>Remettez en mode normal  (ou réappuyez sur <code>CTRL+D</code>)</li>
                                        <li>Redémarrez</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#windows" aria-expanded="true" aria-controls="windows" >
                    Microsoft Windows
                </button>
            </h2>
            <div id="windows" class="accordion-collapse collapse" data-bs-parent="#OS">
                <div class="accordion-body">
                    <ol>
                        <li>Ouvrez l'application <code>Paramètre (ms-settings:)</code></li>
                        <li>Ouvrez l'onglet <code>Système</code></li>
                        <li>Ouvrez l'onglet <code>Activation</code></li>
                        <li>Cliquez 5 fois sur le texte ou le logo <code>Windows</code></li>
                        <li>Suivez les étapes suivantes sur votre écran</li>
                    </ol>
                    <br />
                    <ul>
                        <li><i>N.B. Mot de passe pour éditez le mode démo: <code>trs10</code></i></li>
                        <li><i>N.B. Pour ouvrir le terminal, appuyez simultanément sur <key>Shift+F10</key> et entrez la commande entre parenthèse</i></li>
                        <li><i>N.B. Lors de la configuration initiale, si vous ne voulez pas ajouter de compte Microsoft entrez la commande <code>oobe\bypassNRO</code></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#samsung" aria-expanded="true" aria-controls="samsung" >
                    Samsung
                </button>
            </h2>
            <div id="samsung" class="accordion-collapse collapse" data-bs-parent="#OS">
                <div class="accordion-body">
                    <p>Allez au <a href="https://www.retailsamsung.com">retailsamsung.com</a> pour télécharger les fichiers nécessaire et suivre les instructions du manuel fourni (Compte marchand et approbation requise)</p>
                    <i>Mot de passe: <code>Reta!l-9102</code></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection