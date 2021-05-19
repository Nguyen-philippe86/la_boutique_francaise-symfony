symfony new myproject --full                            --> Installer Symfony 
                                                        --> Changer la DATA_URL sur sqlite dans le fichier .env
symfony console make:controller                         --> Créer un Controller

########## ESPACE MEMBRES ##########

symfony console make:user                               --> Créer une entité user pour stocker ses informations
                                                        --> Modifier les info du serveur mysql = root:root@127.0.0.1:8889/myproject?serverVersion=5.7
symfony console doctrine:database:create                --> Créer la database
symfony console make:migration                          --> Créer un fichier de migration qui contient la requête sql
symfony console doctrine:migrations:migrate             --> Lance la migration pour créer la table

symfony console make:entity->migration->migrate         --> Mettre à jour une entité

symfony console make:form                               --> Créer un Formulaire
                                                        --> Gérer le hashage des mots de passe



********************************************************************************************************************************************************

form_themes: ['bootstrap_4_layout.html.twig']           --> Ajouter le style form bootstrap dans le fichier config/twig.yaml 