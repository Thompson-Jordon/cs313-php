CREATE TABLE scriptures (
    id serial PRIMARY KEY
    ,book VARCHAR(255) NOT NULL
    ,chapter integer NOT NULL
    ,verse integer NOT NULL
    ,content VARCHAR(10000) NOT NULL
);

INSERT INTO scriptures (
    book
    ,chapter
    ,verse
    ,content
)
VALUES (
    'John'
    ,1
    ,5
    ,'And the light shineth in darkness; and the darkness comprehended it not.'
),
(
    'Doctrine and Covenants'
    ,88
    ,49
    ,'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'
),
(
    'Doctrine and Covenants'
    ,93
    ,28
    ,'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'
),
(
    'Mosiah'
    ,16
    ,9
    ,'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
);
