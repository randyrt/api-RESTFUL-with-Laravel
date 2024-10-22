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

### Réponse de la requête de l'inscription


Si tout se passe bien,  vous recevrez une réponse au format JSON. Voici un exemple de ce à quoi pourrait ressembler la réponse :
```json
{
    "status_code": "200",
    "success": true,
    "status_message": "user add with success",
    "data": {
        "name": "Votre nom",
        "email": "Votre email",
        "updated_at": "date de mis à jour",
        "created_at": "date de création",
        "id": "votre id"
    }
}
```

### Étape 2 : Obtention du Token : 
Pourquoi ? 
> Pour accéder aux endpoints protégés de l'API, vous devez d'abord faire une rêquette POST pour pouvoir obtenir un **Bearer Token** :

1. **Créez une nouvelle requête** dans Postman ou Insomnia.
2. **Méthode HTTP** : POST
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


### Réponse de la requête de vérification
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

Chaque endpoint offre des opérations spécifiques, et vous pouvez interagir avec eux en utilisant des méthodes HTTP telles que `GET`, `POST`, `PUT` et `DELETE`. Des instructions détaillées pour chaque endpoint sont fournies ci-dessous.

### URL de base : 
Méthode HTTP : GET

1. **Endpoint Clients**
   - Utilisé pour gérer les données liées aux clients, comme la création, la mise à jour et la récupération d'informations sur les clients.
   - URL de base: `api/v1/customers`

2. **Endpoint Factures**
   - Utilisé pour gérer les factures, y compris la génération, la mise à jour et la récupération des enregistrements de factures.
   - URL de base : `api/v1/invoices`

### Filtrer la rêquete pour obtenir une donnée distincte : 
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

### Créer un "customer" ou un 'invoice"
Methode HTTP : POST
- `api/v1/customers/create`
- `api/v1/invoices/create`

### Création d'un nouveau post
Il est important de ne pas inclure les champs id, created_at et updated_at et userId, car ils seront gérés automatiquement par le système.

###### body pour "un customer" :
 ```json
 {
    "name": "Nouveau nom",
    "type": ""company ou inviddiual",
    "address": "Nouvel addresse",
    "city": "Ville",
    "postal_code": "Nouvel code postal",
}    
```
Si tout se passe bien, voici un exemple de ce qui pourrait à quoi ressembler la réponse : 
```json
{
    "status_code": 200,
    "success": "true",
    "status_message": "customer add with success",
    "data": {
        "id": "reste inchageable" 
        "name": "nouveau nom",
        "type": "company ou individual",
        "address": "novueau address",
        "city": "ville",
        "postal_code": "nouveau postal code",
        "updated_at": "Générer automatiquement par le système",
        "created_at": "Générer automatiquement par le système",
        "user_id": "Générer automatiquement par le système, sert à idéntifer votre post"
    
}
```
Relation entre Customers et Invoices
Dans notre API, la colonne customerID dans la table invoices est une clé étrangère qui fait référence à un enregistrement unique dans la table customers. Cela signifie qu'une facture (représentée par customerID dans invoices) est associée à un seul client.

Détails de la relation :
Table Customers : Contient les informations des clients, identifiés par un ID unique.
Table Invoices : Contient les informations des factures, chaque facture ayant un champ customerID correspond à l'ID d'un client.
Cette relation permet d'assurer l'intégrité des données et de relier facilement les factures à leurs clients respectifs.
Donc logiquement, le "customerId" dans un "invoice" sera toujours l'id de votre nouveau "customer". Ce qui fait qu'il est récommendé de créer un nouveu "customer" avant de créer un nouveau "invoice".

###### body pour "un invoice" :
```json
 {
    "amount" : "Nouveu montant",
    "customerId : "clé étrangère qui se référe à un customer"
    "status"  : "Billed ou Cancel ou Paid",
    "billedDate" : "date de facturation",
    "paided_date" : "null, sauf si status: Paid"
}  
```
Si tout se passe bien, voici un exemple de ce qui pourrait à quoi ressembler la réponse : 
```json
{
    "status_code": 201,
    "success": "true",
    "status_message": "invoice add with success",
    "data": {
        "amount": 500,
        "customer_id": 139,
        "user_id": "Générer automatiquement par le système, sert à idéntifer votre post"
        "status": "Cancel",
        "billed_date": "2023-05-26 03:10:13",
        "paided_date": null,
        "updated_at": "Générer automatiquement par le système",
        "created_at": "Générer automatiquement par le système",
        "id": "Générer automatiquement par le système"
    }
```
### Editer un "customer" ou un "invoice" :
Méhode HTTP : PUT 


- endpoint :  `api/v1/customers/edit/id`
 ```json
 {
    "name": "Nouveau nom",
    "type": ""company ou inviddiual",
    "address": "Nouvel addresse",
    "city": "Ville",
    "postal_code": "Nouvel code postal",
}    
```
Si tout se passe bien, voici un exemple de ce qui pourrait à quoi ressembler la réponse : 
```json
{
    "status_code": 200,
    "success": "true",
    "status_message": "customer update with success",
    "data": {
        "amount": 500,
        "customer_id": 139,
        "user_id": "Générer automatiquement par le système, sert à identifier votre édition",
        "status": "Cancel",
        "billed_date": "2023-05-26 03:10:13",
        "paided_date": null,
        "updated_at": "Générer automatiquement par le système",
        "created_at": "Générer automatiquement par le système",
        "id": "Générer automatiquement par le système"
    }
```
- endpoint :  `api/v1/invoices/edit/id`
```json
 {
    "amount" : "Nouveu montant",
    "customerId : "clé étrangère qui se référe à un customer"
    "status"  : "Billed ou Cancel ou Paid",
    "billedDate" : "date de facturation",
    "paided_date" : "null, sauf si status: Paid"
}  
```
Si tout se passe bien, voici un exemple de ce qui pourrait à quoi ressembler la réponse : 
```json
{
    "status_code": 200,
    "success": "true",
    "status_message": "invoice update with success",
    "data": {
        "amount": 500,
        "customer_id": 139,
        "user_id": "Générer automatiquement par le systèment, sert à identifier votre édition",
        "status": "Cancel",
        "billed_date": "2023-05-26 03:10:13",
        "paided_date": null,
        "updated_at": "Générer automatiquement par le système",
        "created_at": "Générer automatiquement par le système",
        "id": "Générer automatiquement par le système"
    }
```

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

