CREATE DATABASE FILMS4YOU;
USE FILMS4YOU;

CREATE TABLE Films
(
    id               INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    director_id      INT                            NOT NULL,
    poster           BLOB                           NOT NULL,
    name             VARCHAR(255)                   NOT NULL,
    year             YEAR                           NOT NULL,
    country          VARCHAR(100)                   NOT NULL,
    duration_minutes INT                            NOT NULL,
    description      TEXT                           NOT NULL,
    premiere         DATE                           NOT NULL,
    IMDb_rating      FLOAT(2, 1)
);

CREATE TABLE Directors
(
    id         INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(50)                    NOT NULL,
    last_name  VARCHAR(50)                    NOT NULL
);

CREATE TABLE Actors
(
    id         INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(50)                    NOT NULL,
    last_name  VARCHAR(50)                    NOT NULL
);

CREATE TABLE Genres
(
    id   INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(30)                    NOT NULL UNIQUE
);

CREATE TABLE film_actor
(
    id       INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    film_id  INT                            NOT NULL,
    actor_id INT                            NOT NULL
);

CREATE TABLE film_genre
(
    id       INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    film_id  INT                            NOT NULL,
    genre_id INT                            NOT NULL
);

ALTER TABLE Films
    ADD CONSTRAINT FK_Films_director_id_Directors
        FOREIGN KEY (director_id) REFERENCES Directors (id);

ALTER TABLE film_actor
    ADD CONSTRAINT FK_film_actor_film_id_Films
        FOREIGN KEY (film_id) REFERENCES Films (id);

ALTER TABLE film_actor
    ADD CONSTRAINT FK_film_actor_actor_id_Actors
        FOREIGN KEY (actor_id) REFERENCES Actors (id);

ALTER TABLE film_genre
    ADD CONSTRAINT FK_film_genre_film_id_Films
        FOREIGN KEY (film_id) REFERENCES Films (id);

ALTER TABLE film_genre
    ADD CONSTRAINT FK_film_genre_actor_id_Genres
        FOREIGN KEY (genre_id) REFERENCES Genres (id);