#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        ID_user   Int  Auto_increment  NOT NULL ,
        lastname  Varchar (50) NOT NULL ,
        firstname Varchar (50) NOT NULL ,
        email     Varchar (50) NOT NULL ,
        pseudo    Varchar (50) NOT NULL ,
        password  Varchar (50) NOT NULL ,
        connected Bool NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (ID_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: skin
#------------------------------------------------------------

CREATE TABLE skin(
        ID_skin    Int  Auto_increment  NOT NULL ,
        skin_name  Varchar (50) NOT NULL ,
        skin_image Text NOT NULL
	,CONSTRAINT skin_PK PRIMARY KEY (ID_skin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: character
#------------------------------------------------------------

CREATE TABLE character(
        ID_character      Int  Auto_increment  NOT NULL ,
        pseudo            Varchar (50) NOT NULL ,
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
# Table: chat
#------------------------------------------------------------

CREATE TABLE chat(
        ID_chat   Int  Auto_increment  NOT NULL ,
        name_chat Varchar (50) NOT NULL
	,CONSTRAINT chat_PK PRIMARY KEY (ID_chat)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        ID_message         Int  Auto_increment  NOT NULL ,
        message_content    Varchar (255) NOT NULL ,
        message_created_at Datetime NOT NULL ,
        ID_chat            Int NOT NULL ,
        ID_user            Int NOT NULL
	,CONSTRAINT message_PK PRIMARY KEY (ID_message)

	,CONSTRAINT message_chat_FK FOREIGN KEY (ID_chat) REFERENCES chat(ID_chat)
	,CONSTRAINT message_user0_FK FOREIGN KEY (ID_user) REFERENCES user(ID_user)
)ENGINE=InnoDB;

