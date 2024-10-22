# API Documentation

## Installation et utilisation locale de l'API

### Prérequis
- PHP >= 8.x
- Composer
- MySQL (ou une autre base de données compatible)
- Git

### Étapes pour cloner et tester l'API

1. **[Cloner le projet depuis GitHub](#1-cloner-le-projet-depuis-github)**
2. **[Naviguer dans le répertoire du projet](#2-naviguer-dans-le-répertoire-du-projet)**
3. **[Installer les dépendances](#3-installer-les-dépendances)**
4. **[Configurer l'environnement](#4-configurer-lenvironnement)**
5. **[Générer une clé d'application](#5-générer-une-clé-dapplication)**
6. **[Démarrer le serveur local](#6-démarrer-le-serveur-local)**   
7. **[Exécuter les migrations de base de données](#7-exécuter-les-migrations-de-base-de-données)**


## Étapes pour l'installation de l'API			

### 1. Cloner le projet depuis GitHub

Pour cloner le projet, exécutez la commande suivante :
```bash
git clone https://github.com/randyrt/api-RESTFUL-with-Laravel.git
```

### 2. Naviguer dans le répertoire du projet
Ensuite, accédez au répertoire cloné avec la commande suivante :
```bash
cd nom-du-projet
```

### 3. Installer les dépendances
 Pour installer les dépendances, Vuillez tapez la commande suivante : 
 ```bash
composer install
```

### 4. Configurer l'environnement
Renommez le fichier .env.example en .env :
 ```bash
cp .env.example .env
```

### 5. Générer une clé d'application
```bash
php artisan key:generate
```

### 6. Démarrer le serveur local
```bash
php artisan serve
```

### 7. Exécuter les migrations de base de données
```bash
php artisan migrate 
php artisan db:seed
```

## Tester l'API

Pour tester cette API, vous pouvez utiliser des outils comme [Postman](https://www.postman.com/) ou [Insomnia](https://insomnia.rest/). Ces outils vous permettent d'envoyer des requêtes HTTP, de visualiser les réponses, et de gérer facilement les en-têtes et les paramètres d'authentification.

### Utilisation avec Postman ou Insomnia
 
### Étape 1 : Effectuer une requête POST pour l'inscription

1. **Créez une nouvelle requête** dans Postman ou Insomnia.
2. **Méthode HTTP** : POST
3. **Entrez l'URL de l'API pour la connexion** :  ```api/register  ```
4. **Ajoutez les en-têtes nécessaires** pour l'authentification et les informations utilisateur. Dans l'en-tête, vous pouvez inclure les informations suivantes en format JSON :
```json

{
    "name": "VotreNom",
    "email": "votre.email@example.com",
    "password": "VotreMotDePasse"
}
```

### Étape 2 : Obtention du Token : 
Pourquoi ? 
> Pour accéder aux endpoints protégés de l'API, vous devez d'abord faire une rêquette POST pour pouvoir obtenir un **Bearer Token** :

1. **Créez une nouvelle requête** dans Postman ou Insomnia.
2. **Choisissez la méthode HTTP** : POST.
3. **Entrez l'URL de l'API pour la connexion** :  ```api/login  ```

###### Body :
   ```json
    {
        "email": "Votre email",
        "password": "Votre mot de passe"
    }
   ```

### Réponse de la requête de connexion
Après avoir envoyé la requête POST pour l'obtention de "Token", vous recevrez une réponse au format JSON. Voici un exemple de ce à quoi pourrait ressembler la réponse :

```json
{
    "status_code": 200,
    "status-message: "Operation completed successfully",
    "success": true,
    "token": "{votre_token}"
}
```

### Étape 3 : Faire une autre requête avec le Bearer Token
Une fois que vous avez obtenu votre Bearer Token, vous devez effectuer une autre requête sur le même endpoint pour accéder aux ressources protégées. Voici comment procéder :

1. **Créez une nouvelle requête** dans Postman ou Insomnia.
2. **Choisissez la méthode HTTP** : POST 
3. **Entrez l'URL de l'API pour le même endpoint** que précédemment : ```api/login ```

Remarque importante : L'opération est la même, mais cette fois-ci, vous devez inclure dans l'en tête du rêquete POST le Token d'autorisation. 
Voici un exemple de ce à quoi pourrait ressembler cela : 
En tête dans la section Authorization:
- Type : Bearer Token
- Token : "(Votre token)"
###### Body : 
 ```json
    {
        "email": "Votre email",
        "password": "Votre mot de passe"
    }
 ```

### Réponse de la requête avec le Bearer Token
Si tout se passe bien, après avoir envoyé votre requête avec le Bearer Token, Vous aurez la même réponse, Voici un exemple de ce à quoi pourrait ressembler la réponse :
```json
{
    "status_code": 200,
    "status-message: "Operation completed successfully",
    "success": true,
    "token": "{votre_token}"
}
```

### Étape 4 : Vérifier que vous êtes réellement connecté : 

1. **Créez une nouvelle requête** dans Postman ou Insomnia.
2. **Méthode HTTP** : GET
3. **Entrez l'URL de l'API : ```api/protected ```
Si tout se passe bien, Voici un exemple de ce à quoi pourrait ressembler la réponse :
```json
{
    "status_code": 200,
    "success": true,
    "status-message: "You're connected",
    "user": {
       "id": "Votre id",
      "name": "Votre nom",
      "email": "Votre email"
   }
}
```


## Test du Premier Endpoint
### Vue d'ensemble de l'API

Cette API comporte deux endpoints majeurs pour la gestion de vos données :

1. **Endpoint Clients**
   - Utilisé pour gérer les données liées aux clients, comme la création, la mise à jour et la récupération d'informations sur les clients.
   - URL de base : `api/v1/customers`

2. **Endpoint Factures**
   - Utilisé pour gérer les factures, y compris la génération, la mise à jour et la récupération des enregistrements de factures.
   - URL de base : `api/v1/invoices`

Chaque endpoint offre des opérations spécifiques, et vous pouvez interagir avec eux en utilisant des méthodes HTTP telles que `GET`, `POST`, `PUT` et `DELETE`. Des instructions détaillées pour chaque endpoint sont fournies ci-dessous.

### Filtrer les rêquetes GET par ID : 
- `api/v1/customers/id`
- `api/v1/invoices/id`

### Requêtes Avancées :

L'API prend également en charge des requêtes avancées pour filtrer les données. Vous pouvez utiliser des opérateurs pour affiner les résultats selon vos besoins, tels que :

- `equal` : pour rechercher des valeurs égales à une certaine donnée.
- `greater_than` : pour rechercher des valeurs supérieures à un seuil donné.
- `less_than` : pour rechercher des valeurs inférieures à un seuil donné.
- `greater_than_equal` : rechercher des valeurs supérieures et égales à un seuil donné.
- `less_than_equal` : rechercher des valeurs inférieures et égales à un seuil donné.

#### Exemple d'utilisation 1 : 
- `api/v1/customers?type[equal]=company`
- `api/v1/invoices?status[equal]=Billed`

#### Exemple d'utilisation 2 : 
- `api/v1/customers?type[equal]=company&postal_code[less_than]=30000`
- `api/v1/invoices?status[equal]=Billed&amount[greater_than]=350`

### Editer un "customer" ou un "invoice" :
Méhode HTTP : PUT 
- `api/v1/customers/edit/id`
- `api/v1/invoices/edit/id`

### Supprimer un "customer" ou un "invoice":
Méhode HTTP : DELETE
- `api/v1/customers/delete/id`
- `api/v1/invoices/delete/id`


## Remerciements

Merci d'avoir testé mon API ! Si vous rencontrez des problèmes ou si vous avez des suggestions pour améliorer ce projet, n'hésitez pas à ouvrir une issue ou à proposer une pull request.

## Contribuer

Les contributions sont les bienvenues ! Si vous souhaitez contribuer à ce projet, veuillez suivre ces étapes :
1. Fork le projet.
2. Créez une branche pour votre fonctionnalité (`git checkout -b nouvelle-fonctionnalité`).
3. Commitez vos modifications (`git commit -m 'Ajout de nouvelle fonctionnalité'`).
4. Poussez votre branche (`git push origin nouvelle-fonctionnalité`).
5. Ouvrez une pull request.

## Support

Si vous avez besoin d'aide, ou si vous rencontrez des bugs, veuillez consulter la section [Issues](https://github.com/randyrt/api-RESTFUL-with-Laravel/issues) du projet pour signaler un problème ou poser une question.

## Licence

Ce projet est sous licence [MIT](LICENSE). Vous êtes libre de l'utiliser, le modifier et le distribuer tant que vous respectez les termes de la licence.

## Contact

Pour toute question ou suggestion, vous pouvez me contacter via [mon site web officiel ](https://randyporfolio.netlify.app/).

