USE random_generator;
#
TRUNCATE master_genders;
INSERT INTO master_genders (gender_id, body, body_ja, is_available) VALUES
  ("all","ALL","全て", TRUE),
  ("male","Male","男性", TRUE),
  ("female","Female","女性", TRUE);