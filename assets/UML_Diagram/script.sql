#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE `user`(
        ID_user       Int  Auto_increment  NOT NULL ,
        lastname      Varchar (50) NOT NULL ,
        firstname     Varchar (50) NOT NULL ,
        date_of_birth Date NOT NULL ,
        email         Varchar (50) NOT NULL ,
        pseudo        Varchar (20) NOT NULL ,
        password      Varchar (36) NOT NULL ,
        last_activity TimeStamp NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (ID_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: skin
#------------------------------------------------------------

CREATE TABLE `skin`(
        ID_skin    Int  Auto_increment  NOT NULL ,
        skin_name  Varchar (50) NOT NULL ,
        skin_image Varchar (50) NOT NULL
	,CONSTRAINT skin_PK PRIMARY KEY (ID_skin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: character
#------------------------------------------------------------

CREATE TABLE `character`(
        ID_character      Int  Auto_increment  NOT NULL ,
        pseudo            Varchar (50) NOT NULL ,
        class             Varchar (10) NOT NULL ,
        level             Int NOT NULL ,
        experience        Int NOT NULL ,
        money             Int NOT NULL ,
        strength          Int NOT NULL ,
        intelligence      Int NOT NULL ,
        agility           Int NOT NULL ,
        chance            Int NOT NULL ,
        wisdom            Int NOT NULL ,
        unused_statspoint Int ,
        ID_user           Int NOT NULL ,
        ID_skin           Int NOT NULL
	,CONSTRAINT character_PK PRIMARY KEY (ID_character)

	,CONSTRAINT character_user_FK FOREIGN KEY (ID_user) REFERENCES user(ID_user)
	,CONSTRAINT character_skin0_FK FOREIGN KEY (ID_skin) REFERENCES skin(ID_skin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE `message`(
        ID_message         Int  Auto_increment  NOT NULL ,
        message_content    Varchar (255) NOT NULL ,
        message_created_at TimeStamp NOT NULL ,
        ID_user            Int NOT NULL
	,CONSTRAINT message_PK PRIMARY KEY (ID_message)

	,CONSTRAINT message_user_FK FOREIGN KEY (ID_user) REFERENCES user(ID_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: experience_table
#------------------------------------------------------------

CREATE TABLE `experience_table`(
        level               Int NOT NULL ,
        required_exp        Int NOT NULL ,
        experience_per_kill Int NOT NULL
	,CONSTRAINT experience_table_PK PRIMARY KEY (level)
)ENGINE=InnoDB;

