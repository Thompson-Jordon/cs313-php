CREATE TABLE useraccount (
    user_id serial PRIMARY KEY
    ,user_name VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE note (
    note_id serial PRIMARY KEY
    ,note_text VARCHAR
    ,talk_id integer NOT NULL
    ,user_id integer NOT NULL
    ,speaker_id integer NOT NULL
    ,CONSTRAINT note_talk_id_fkey FOREIGN KEY (talk_id)
        REFERENCES conference (talk_id) MATCH SIMPLE
        ON UPDATE NO ACTION ON DELETE NO ACTION
    ,CONSTRAINT note_user_id_fkey FOREIGN KEY (user_id)
        REFERENCES useraccount (user_id) MATCH SIMPLE
        ON UPDATE NO ACTION ON DELETE NO ACTION
    ,CONSTRAINT note_speaker_id_fkey FOREIGN KEY (speaker_id)
        REFERENCES speaker (speaker_id) MATCH SIMPLE
        ON UPDATE NO ACTION ON DELETE NO ACTION
);

ALTER TABLE note DROP CONSTRAINT note_talk_id_fkey;
ALTER TABLE note DROP COLUMN talk_id;

CREATE TABLE conf_session (
   session_id  serial PRIMARY KEY,
   session_name VARCHAR(255) NOT NULL,
   talk_id integer NOT NULL,
   --speaker_id integer NOT NULL,
   CONSTRAINT conf_session_talk_id_fkey FOREIGN KEY (talk_id)
        REFERENCES conference (talk_id) MATCH SIMPLE
        ON UPDATE NO ACTION ON DELETE NO ACTION
        -- CONSTRAINT conf_session_speaker_id_fkey FOREIGN KEY (speaker_id)
        -- REFERENCES speaker (speaker_id) MATCH SIMPLE
        -- ON UPDATE NO ACTION ON DELETE NO ACTION
);

ALTER TABLE conf_session DROP CONSTRAINT conf_session_speaker_id_fkey;
ALTER TABLE conf_session DROP COLUMN speaker_id;

ALTER TABLE note
   ADD COLUMN session_id integer NOT NULL;

ALTER TABLE note
   ADD CONSTRAINT note_session_id_fkey FOREIGN KEY (session_id)
         REFERENCES conf_session (session_id) MATCH SIMPLE
        ON UPDATE NO ACTION ON DELETE NO ACTION;

-- Jimmy 
INSERT INTO useraccount (first_name, last_name) VALUES ('Jimmy', 'Bob');

--Holland
INSERT INTO speaker (first_name, last_name, middle_name) VALUES ('Jeffrey', 'Holland', 'R.');
--Eyring
INSERT INTO speaker (first_name, last_name, middle_name) VALUES ('Henry', 'Eyring', 'B.');
--Bednar
INSERT INTO speaker (first_name, last_name, middle_name) VALUES ('David', 'Bednar', 'A.');

-- Conference
INSERT INTO conference (talk_month, talk_year) VALUES (10, 2019);
INSERT INTO conference (talk_month, talk_year) VALUES (4, 2019);

--session
INSERT INTO conf_session (session_name, talk_id) VALUES ('Saturday Morning', 1);
INSERT INTO conf_session (session_name, talk_id) VALUES ('Saturday Afternoon', 1);

--notes
INSERT INTO note (note_text, user_id, speaker_id, session_id) VALUES ('This is some text', 1, 1, 3);
INSERT INTO note (note_text, user_id, speaker_id, session_id) VALUES ('This is some other text', 1, 2, 4);
INSERT INTO note (note_text, user_id, speaker_id, session_id) VALUES ('This is some differnt text', 1, 3, 4);


DROP TABLE note, conf_session, conference, speaker, useraccount CASCADE;