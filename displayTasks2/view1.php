<?php 

function display_tasks_view(array $tasks){
    echo '
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contactet</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
            }

            header {
                background-color: #007bff;
                color: #fff;
                padding: 10px 0;
                text-align: center;
            }

            main {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }

            h1 {
                font-size: 2.5em;
                margin-bottom: 10px;
            }

            p {
                font-size: 1.2em;
                line-height: 1.6;
            }

            footer {
                background-color: #000;
                color: #fff;
                padding: 10px 0;
                text-align: center;
            }

            a {
                color: #007bff;
                text-decoration: none;
            }

            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>

        <nav style="background-color: #333; padding: 10px; text-align: center;">
            <h1 style="color: white;">BIENVENUE DANS MON RESTAURANT</h1>
            <a href="/tutu" style="color: white; text-decoration: none; margin: 0 10px;">Accueil</a>
            <a href="/contacte" style="color: white; text-decoration: none; margin: 0 10px;">Contact</a>
            <a href="/reservation" style="color: white; text-decoration: none; margin: 0 10px;">Réservation</a>
        </nav>

        <div>
            <header>
                <a href="https://www.linkedin.com/in/abderrahmane-bessalah-25b086253/" target="_blank">
                    <img src="https://i.postimg.cc/RZC0kT37/Linked-In-icon.png" width=100 height=100° alt="LinkedIn" class="w-4  h-4" />
                </a>
            </header>

            <main>
                <h1>Abderrahmane Bessalah - Étudiant Développeur</h1>
                <p>
                    Je suis un étudiant en développement et en data à Efrei Paris, passionné par les nouvelles technologies
                    et déterminé à construire une carrière réussie dans ce domaine en constante évolution.
                </p>
            </main>

            <footer>
                <h2>Merci à vous</h2>
            </footer>
        </div>

    </body>

    </html>
    ';

}
?>
