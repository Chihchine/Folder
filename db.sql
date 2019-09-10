/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     10/09/2019 12:17:41                          */
/*==============================================================*/

drop table if exists UTILISATEURS_PARTICIPANT;

drop table if exists GROUPES_PARTICIPANT;

drop table if exists MEMBRES_GROUPE;

drop table if exists PHOTOS;

drop table if exists UTILISATEURS;

drop table if exists EVENNEMENTS;

drop table if exists GROUPES;

/*==============================================================*/
/* Table: EVENNEMENTS                                           */
/*==============================================================*/
create table EVENNEMENTS
(
   ID                   int not null auto_increment,
   NOM                  TEXT,
   DESCRIPTION          TEXT,
   DATE                 datetime,
   ID_UTILISATEUR_CREATEUR int,
   primary key (ID)
);

/*==============================================================*/
/* Table: GROUPES                                               */
/*==============================================================*/
create table GROUPES
(
   ID                   int not null auto_increment,
   ID_PHOTO_PROFIL      int,
   NOM                  text,
   DESCRIPTION          text,
   VISIBLE              bool,
   primary key (ID)
);

/*==============================================================*/
/* Table: GROUPES_PARTICIPANT                                   */
/*==============================================================*/
create table GROUPES_PARTICIPANT
(
   ID                   int not null auto_increment,
   ID_EVENNEMENT        INT,
   ID_GROUPE            INT,
   primary key (ID)
);

/*==============================================================*/
/* Table: MEMBRES_GROUPE                                        */
/*==============================================================*/
create table MEMBRES_GROUPE
(
   ROLE                 INT,
   ID_UTILISATEUR       INT,
   ID_GROUPE            INT,
   ID                   int not null auto_increment,
   primary key (ID)
);

/*==============================================================*/
/* Table: PHOTOS                                                */
/*==============================================================*/
create table PHOTOS
(
   ID                   int not null auto_increment,
   LIEN                 Text,
   primary key (ID)
);

/*==============================================================*/
/* Table: UTILISATEURS                                          */
/*==============================================================*/
create table UTILISATEURS
(
   ID                   int not null auto_increment,
   NOM                  Text,
   PRENOM               Text,
   MAIL                 Text,
   MDP                  Text,
   ECOLE                Text,
   PROMOTION            Text,
   ID_PHOTO_PROFIL      int,
   primary key (ID)
);

/*==============================================================*/
/* Table: UTILISATEURS_PARTICIPANT                              */
/*==============================================================*/
create table UTILISATEURS_PARTICIPANT
(
   ID                   int not null auto_increment,
   ID_EVENNEMENT        INT,
   ID_UTILISATEUR       INT,
   primary key (ID)
);

alter table EVENNEMENTS add constraint FK_REFERENCE_4 foreign key (ID_UTILISATEUR_CREATEUR)
      references UTILISATEURS (ID) on delete restrict on update restrict;

alter table GROUPES add constraint FK_REFERENCE_6 foreign key (ID_PHOTO_PROFIL)
      references PHOTOS (ID) on delete restrict on update restrict;

alter table GROUPES_PARTICIPANT add constraint FK_INVITE_G foreign key (ID_EVENNEMENT)
      references EVENNEMENTS (ID) on delete restrict on update restrict;

alter table GROUPES_PARTICIPANT add constraint FK_PARTICIPE_G foreign key (ID_GROUPE)
      references GROUPES (ID) on delete restrict on update restrict;

alter table MEMBRES_GROUPE add constraint FK_FAIT_PARTIE_DE foreign key (ID_UTILISATEUR)
      references UTILISATEURS (ID) on delete restrict on update restrict;

alter table MEMBRES_GROUPE add constraint FK_POSSEDE foreign key (ID_GROUPE)
      references GROUPES (ID) on delete restrict on update restrict;

alter table UTILISATEURS add constraint FK_DETIENT foreign key (ID_PHOTO_PROFIL)
      references PHOTOS (ID) on delete restrict on update restrict;

alter table UTILISATEURS_PARTICIPANT add constraint FK_INVITE_U foreign key (ID_EVENNEMENT)
      references EVENNEMENTS (ID) on delete restrict on update restrict;

alter table UTILISATEURS_PARTICIPANT add constraint FK_PARTICIPE_U foreign key (ID_UTILISATEUR)
      references UTILISATEURS (ID) on delete restrict on update restrict;

