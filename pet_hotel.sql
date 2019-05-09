-- CREATE DATABASE "pet_hotel"

CREATE TABLE "owners" (
    "id" SERIAL PRIMARY KEY,
    "owner_name" VARCHAR(80) NOT NULL,
);

CREATE TABLE "pets" (
    "id" SERIAL PRIMARY KEY,
    "pet_name" VARCHAR(150) NOT NULL,
    "pet_color" VARCHAR(50),
    "pet_breed" VARCHAR(50),
    "checked_in" BOOLEAN
    "owner_id" INT REFERENCES "owners"
);

INSERT INTO "owners" ("name")
VALUES
('Will'),
('Joe'),
('Brian'),
('Ben'),
('Rowan');

INSERT INTO "pets" ("pet_name", "pet_color", "pet_breed", "checked_in", "owner_id")
VALUES
('Thompson', 'White w/ Black Spots', 'Terrier-Poodle Mix', false, 1),
('Big Mac', 'Black w/ Grey Stripes', 'Cat', true, 2),
('Gabe', 'White', 'Dog', true, 3),
('Lloyd', 'Orange', 'Cat', false, 4),
('Tuna', 'Grey', 'Cat', false, 5),
('Mackerel', 'Black', 'Cat', true, 5);
