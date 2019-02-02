CREATE DATABASE conference;
\c conference


CREATE TABLE public.user
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL,
	passwrd VARCHAR(100) NOT NULL
);

CREATE TABLE public.cardset
(
	id SERIAL NOT NULL PRIMARY KEY,
	user_id INT NOT NULL REFERENCES public.user(id),
	cardtext_front TEXT NOT NULL,
	cardtext_back TEXT NOT NULL
);