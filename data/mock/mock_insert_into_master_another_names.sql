USE random_generator;
#
#
#
TRUNCATE master_another_names;
#
#
#
INSERT INTO master_another_names (body, ruby,type) VALUES
  ("赤の", "レッド", "previous"),
  ("橙の", "オレンジ", "previous"),
  ("黄の", "イエロー", "previous"),
  ("緑の", "グリーン", "previous"),
  ("青の", "ブルー", "previous"),
  ("紫の", "パープル", "previous"),
  ("白の", "ホワイト", "previous"),
  ("灰の", "グレイ", "previous"),
  ("黒の", "ブラック", "previous");
#
#
#
INSERT INTO master_another_names (body, ruby, type) VALUES
  ("冒険者", "?????", "following"),
  ("騎士", "?????", "following"),
  ("戦士", "?????", "following"),
  ("魔法使い", "?????", "following"),
  ("神官", "?????", "following"),
  ("盗賊", "?????", "following");