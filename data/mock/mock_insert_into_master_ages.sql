USE random_generator;
#
TRUNCATE master_ages;
INSERT INTO master_ages (age_id, body, body_ja, min, max, type) VALUES
  ("all", "All", "全て", "0", "120", "real"),
  ("infant", "Infant", "幼少", "0", "4", "real");