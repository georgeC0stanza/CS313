CREATE DATABASE conference;
\c conference


CREATE TABLE person
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL,
	passwrd VARCHAR(100) NOT NULL
);

CREATE TABLE cardset
(
	id SERIAL NOT NULL PRIMARY KEY,
	user_id INT NOT NULL REFERENCES person(id),
	cardtext_front TEXT NOT NULL,
	cardtext_back TEXT NOT NULL
);


insert into person (username, passwrd)
    values ('david001', 'thisismypwrd');

insert into cardset (user_id, cardtext_front, cardtext_back)
    values ( 1 , 'front of card', 'back of card' );