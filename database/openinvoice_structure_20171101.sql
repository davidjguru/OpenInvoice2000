CREATE TABLE invoice (id INTEGER PRIMARY KEY NOT NULL, clientname VARCHAR(30), clientNIF VARCHAR(30), clientAdress VARCHAR(255), date TEXT);
CREATE TABLE users (userid INTEGER PRIMARY KEY ASC, user VARCHAR(30),  password VARCHAR(30), user_name VARCHAR(30), user_firstname VARCHAR(30), user_level INTEGER , user_adress VARCHAR(255), user_company VARCHAR (30), user_tlf VARCHAR (30));
CREATE TABLE units (first_name text NOT NULL, last_name text NOT NULL, fiscal_number text NOT NULL, adress text NOT NULL);
