create table Equipes(
équipe_ID int auto_increment ,
Nom_Équipe  varchar(200),
Date_de_Création date ,
project_ID  int,
FOREIGN KEY (project_ID) REFERENCES Projects (project_ID),
primary key (équipe_ID)
);
create table Projects(
project_ID int auto_increment,
Nom_project  varchar(200),
descrip varchar(3000),
Date_de_debut date ,
date_fin  date,
primary key (project_ID)
);
create table Users(
 Membre_ID  int auto_increment , 
 image varchar(1000), 
 nom  varchar(200),
 prénom  varchar(200),
 email   varchar(200) ,
 motdepasse varchar(255),
 téléphone int ,
 roleuser varchar(255) ,
 équipe_ID int   ,
 FOREIGN KEY (équipe_ID) REFERENCES Equipes (équipe_ID),
 primary key (Membre_ID ,email)
 );