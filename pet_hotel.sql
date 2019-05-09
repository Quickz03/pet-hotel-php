CREATE TABLE "pets"
(
    "id" SERIAL PRIMARY KEY,
    "pet_name" VARCHAR(150) NOT NULL,
    "pet_color" VARCHAR(50),
    "pet_breed" VARCHAR(50),
    "checked_in" BOOLEAN
);

CREATE TABLE "owners"
(
    "id" SERIAL PRIMARY KEY,
    "name" VARCHAR(80) NOT NULL,
    "pet_id" INT REFERENCES "pets"
);