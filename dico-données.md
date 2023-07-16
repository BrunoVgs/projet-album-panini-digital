# Dictionnaire de donées

# Team 

|Champ|Type|Spécificités|Description|
|--|--|--|--|
|code_team|INT|Primary Key, UNSIGNED, NOT NULL, AUTO INCREMENT|L’identifiant de l’équipe|
|name|VARCHAR (32)|NOT NULL|Le nom de l’équipe|
|country|VARCHAR (32)|NOT NULL |Le pays où évolue l’équipe|
|city|VARCHAR (32)|NOT NULL|La ville de l’équipe|
|created_at|DATETIME|NOT NULL|La date de création de l’équipe |
|updated_at|DATETIME| NULL|La date de la dernière modification|

# Player

|Champ|Type|Spécificités|Description|
|--|--|--|--|
|code_player|INT|Primary Key, UNSIGNED, NOT NULL, AUTO INCREMENT|L’identifiant du joueur|
|lastname|VARCHAR (120)|NOT NULL|Le nom du joueur|
|firstname|VARCHAR (120)|NOT NULL|Le prénom du joueur|
|nationality|VARCHAR (120)|NOT NULL|la nationalité du joueur|
|team|VARCHAR (120)|NOT NULL|L’équipe du joueur|
|position|VARCHAR (64)|NOT NULL|Le poste du joueur|
|age|INT|NOT NULL|l’âge du joueur|
|height|INT|NOT NULL|La taille du joueur|
|created_at|DATETIME|DEFAULT CURRENT_TIMESTAMP|La date de création du joueur|
|updated_at|DATETIME|NULL|La date dernière modification du joueur|

# User

|Champ|Type|Spécificités|Description|
|--|--|--|--|
|code_user|INT|Primary Key, UNSIGNED, NOT NULL, AUTO INCREMENT|L’identifiant de l’utilisateur|
|name|VARCHAR(250)|NOT NULL|le nom de l’utilisateur|
|role|LONGTEXT|NOT NULL|Le rôle de l’utilisateur|
|avatar|VARCHAR(250)|NOT NULLNOT NULL|La photo/avatar de l’utilisateur|
|email|VARCHAR(120)|NOT NULL|L’email de l’utilisateur|
|password|VARCHAR(250)|NOT NULL|Le mot de passe de l’utilisateur|
|created_at|DATETIME|DEFAULT CURRENT_TIMESTAMP|La date de création du compte|
|updated_at|DATETIME|NULL|La date de la dernière modification du compte|

# League

|Champ|Type|Spécificités|Description|
|--|--|--|--|
|code_league|INT|Primary Key, UNSIGNED, NOT NULL, AUTO INCREMENT|L’identifiant de la ligue|
|name|VARCHAR(64)|NOT NULL|Le nom de la ligue|
|country|VARCHAR(64)|NOT NULL|Le nom du pays|
|created_at|DATETIME|DEFAULT CURRENT_TIMESTAMP|La date de création de la ligue|
|updated_at|DATETIME|NULL|La date de la dernière modification de la ligue|

# Article

|Champ|Type|Spécificités|Description|
|--|--|--|--|
|code_article|INT|Primary Key, UNSIGNED, NOT NULL, AUTO INCREMENT|L’identifiant de l'article|
|title|VARCHAR(64)|NOT NULL|Le titre de l'article|
|content|VARCHAR(64)|NOT NULL|Le contenu de l'article|
|created_at|DATETIME|DEFAULT CURRENT_TIMESTAMP|La date de création de l'article|
|updated_at|DATETIME|NULL|La date de la dernière modification de l'article|