-- CREATE DATABASE "pet_hotel"

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

INSERT INTO "pets" ("pet_name", "pet_color", "pet_breed", "checked_in")
VALUES
('Thompson', 'White w/ Black Spots', 'Terrier-Poodle Mix', false),
('Big Mac', 'Black w/ Grey Stripes', 'Cat', true),
('Gabe', 'White', 'Dog', true),
('Lloyd', 'Orange', 'Cat', false),
('Tuna', 'Grey', 'Cat', false),
('Mackerel', 'Black', 'Cat', true);

INSERT INTO "owners" ("name", "pet_id")
VALUES
('Will', '1'),
('Joe', '2'),
('Brian', '3'),
('Ben', '4'),
('Rowan', '5'),
('Rowan', '6');
