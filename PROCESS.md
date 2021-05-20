symfony new myproject --full                            --> Installer Symfony 
                                                        --> Changer la DATA_URL sur sqlite dans le fichier .env
symfony console make:controller                         --> Créer un Controller

########## INSCRIPTION ##########

symfony console make:user                               --> Créer une entité user pour stocker ses informations
                                                        --> Modifier les info du serveur mysql = root:root@127.0.0.1:8889/myproject?serverVersion=5.7
symfony console doctrine:database:create                --> Créer la database
symfony console make:migration                          --> Créer un fichier de migration qui contient la requête sql
symfony console doctrine:migrations:migrate             --> Lance la migration pour créer la table

symfony console make:entity->migration->migrate         --> Mettre à jour une entité

symfony console make:form                               --> Créer un Formulaire, puis créer la condition dans le controller
                                                        --> Gérer le hashage des mots de passe

########## CONNEXION ##########

symfony console make:auth                               --> Créer une page de connexion, Gerer la route après l'athentification dans le security

########## ESPACE MEMBRE ##########

                                                        --> Créer un controller dédié

########## EASY ADMIN ##########         

symfony console make:form                               --> Installer le bundle EasyAdmin3

********************************************************************************************************************************************************

form_themes: ['bootstrap_4_layout.html.twig']           --> Ajouter le style form bootstrap dans le fichier config/twig.yaml 