USE random_generator;
#
TRUNCATE master_nations;
INSERT INTO master_nations (nation_id, body, body_ja, is_available) VALUES
  ("all","ALL","全て", TRUE),
  ("en","EN","アメリカ/イギリス", TRUE),
  ("ja","JA","日本", TRUE),
  ("de","DE","ドイツ", TRUE),
  ("ru","RU","ロシア", TRUE),
  ("fr","FR","フランス", TRUE),
  ("it","IT","イタリア", TRUE),
  ("cn","CN","中国", TRUE);
