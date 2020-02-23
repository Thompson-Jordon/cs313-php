CREATE TABLE "public"."userslogin" (
  use_key_inside SERIAL NOT NULL PRIMARY KEY,
  use_username varchar(20) NOT NULL,
  use_password varchar(200) NOT NULL
) WITH (OIDS=FALSE);