# インターネットTV
テーブル構築の手順。

## 1. エンティティの定義
要件より必要なデータを抽出。以下抽出したもの。
・チャンネル名
・番組枠スタート時間
・番組枠終了時間
・番組名
・視聴回数
・番組詳細
・番組ジャンル
・番組のシリーズ数
・エピソード数
・動画時間
・公開日

## 2. テーブル設定、正規化
### テーブル設定
必要な情報から、以下のようにテーブルを設定。
#### 「チャンネルテーブル」
channel
|Field|Type|Null|Key|Default|Extra|
|:----:|:----:|:----:|:----:|:----:|:----:|
|chan_id|int(11)||PRI|NULL|auto_increment|
|chan_name| varchar(50) |NO||NULL||

#### 「番組情報テーブル」
tv_info
|Field|Type|Null|Key|Default|Extra|
|:----:|:----:|:----:|:----:|:----:|:----:|
| tv_id       | int(11)      | NO   | PRI | NULL    | auto_increment |
| tv_title    | varchar(50)  | NO   |     | NULL    |                |
| tv_detail   | varchar(150) | YES  |     | NULL    |                |
| category_id | int(11)      | YES  | MUL | NULL    |                |
#### 「番組エピソードテーブル」
episode
|Field|Type|Null|Key|Default|Extra|
|:----:|:----:|:----:|:----:|:----:|:----:|
| episode_id     | int(11)      | NO   | PRI | NULL    | auto_increment |
| episode_name   | varchar(50)  | NO   |     | NULL    |                |
| series_no      | int(11)      | YES  |     | NULL    |                |
| episode_no     | int(11)      | YES  |     | NULL    |                |
| episode_detail | varchar(150) | YES  |     | NULL    |                |
| episode_minute | int(11)      | YES  |     | NULL    |                |
| release_date   | date         | YES  |     | NULL    |                |
| tv_id          | int(11)      | YES  | MUL | NULL    |                |

#### 「番組カテゴリーテーブル」
episode
|Field|Type|Null|Key|Default|Extra|
|:----:|:----:|:----:|:----:|:----:|:----:|
| category_id   | int(11)     | NO   | PRI | NULL    | auto_increment |
| category_name | varchar(20) | NO   |     | NULL    |

#### 「番組枠テーブル」
 tv_time
 |Field|Type|Null|Key|Default|Extra|
|:----:|:----:|:----:|:----:|:----:|:----:|
| time_id    | int(11) | NO   | PRI | NULL    | auto_increment |
| time_start | time    | NO   |     | NULL    |                |
| time_stop  | time    | NO   |     | NULL    |                |
| view_count | int(11) | YES  |     | NULL    |                |
| tv_id      | int(11) | YES  | MUL | NULL    |                |
| chan_id    | int(11) | YES  | MUL | NULL    |

## 3. データベース構築
```mysql
CREATE DATABASE db_name;
USE db_name;
```
## 4. テーブル構築
::: note warn
外部キー制約を設定したテーブルは、参照元のテーブルを先に作らないとエラーが出る！！
:::
### categoryテーブル
```mysql
CREATE TABLE category
(
  category_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  category_name VARCHAR(20) NOT NULL
);
```

### channelテーブル
```mysql
CREATE TABLE channel
(
  chan_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  chan_name VARCHAR(50) NOT NULL
);
```
### tv_infoテーブル
```mysql
CREATE TABLE tv_info
(
  tv_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  tv_title VARCHAR(50) NOT NULL,
  tv_detail VARCHAR(150),
  category_id INT,
  INDEX category_ind (category_id),
      FOREIGN KEY (category_id)
          REFERENCES category (category_id)
          ON UPDATE RESTRICT ON DELETE RESTRICT
);
```
### episodeテーブル
```mysql
CREATE TABLE episode
(
  episode_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  episode_name VARCHAR(50) NOT NULL,
  series_no INT,
  episode_no INT,
  episode_detail VARCHAR(150),
  episode_minute INT,
  release_date DATE,
  tv_id INT,
    INDEX tv_ind (tv_id),
    FOREIGN KEY (tv_id)
        REFERENCES tv_info (tv_id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);
```

### tv_timeテーブル
```mysql
CREATE TABLE tv_time
(
  time_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  time_start TIME NOT NULL,
  time_stop TIME NOT NULL,
  view_count INT,
  tv_id INT,
  chan_id INT,
  INDEX tv_ind (tv_id),
  INDEX chan_ind (chan_id),
      FOREIGN KEY (tv_id)
          REFERENCES tv_info (tv_id)
          ON UPDATE RESTRICT ON DELETE RESTRICT,
      FOREIGN KEY (chan_id)
          REFERENCES channel (chan_id)
          ON UPDATE RESTRICT ON DELETE RESTRICT
);
```



## 5. データの格納
### categoryテーブル
```mysql
INSERT INTO category (category_name) VALUES ('番組カテゴリ名');
```
### channelテーブル
チャンネルの登録
```mysql
INSERT INTO channel (chan_name) VALUES ('定義したチャンネル名');
```
### tv_infoテーブル
```mysql
INSERT INTO tv_info (tv_title,
tv_detail,
category_id)
VALUES ('番組タイトル',
'番組詳細情報',
番組カテゴリid);
```
### episodeテーブル
```mysql
INSERT INTO episode (episode_name,
series_no,
episode_no,
episode_detail,
episode_minute,
release_date,
tv_id)
VALUES ('エピソードタイトル',
シリーズ数,
エピソード数,
'エピソード詳細',
番組放送時間(分数),
'番組放送日',
番組id);
```
### tv_timeテーブル
```mysql
INSERT INTO tv_time (time_start,
time_stop,
tv_id,
chan_id,
view_count)
VALUES ('開始時間 00:00:00 の形式',
'開始時間 00:00:00 の形式',
この番組で放送されている番組id,
番組枠を持つチャンネルid,
視聴回数);
```

## 5. 結果

### categoryテーブル
| category_id | category_name |
|:-----------:|:-------------:|
|           1 | News          |
|           2 | Drama         |
|           3 | Comedy        |
|           4 | Documentary   |
|           5 | Cooking       |
|           6 | Science       |
|           7 | Life          |



| chan_id | chan_name |
|:-------:|:---------:|
|       1 | Drama 1   |
|       2 | Drama 2   |
|       3 | News 1    |
|       4 | Comedy 1  |
|       5 | Science 1 |
|       6 | Life 1    |



|tv_id| tv_title |tv_detail | category_id |
|:---:|:-------------------------------:|:---------------------------------------------------------------------------------------------------------------------------------------------------|:-------------:|
|     1 | News Express         | Stay informed with 'News Express' - your source for breaking news and expert analysis.                                                            |           1 |
|     2 | Detective Chronicles | Dive into the world of 'Detective Chronicles,' where mysteries unfold and clues lead to thrilling revelations.                                    |           2 |
|     3 | The Comedy Showdown  | Get ready for the ultimate laugh-off on 'The Comedy Showdown,' where comedians battle it out for your amusement.                                  |           3 |
|     4 | Wildlife Adventures  | Embark on thrilling 'Wildlife Adventures', exploring the world's most captivating creatures in their natural habitats.                            |           4 |
|     5 | Science Uncovered    | Unearth the wonders of our world with 'Science Uncovered,' a journey into the realms of discovery and innovation.                                 |           6 |
|     6 | Travel Explorers     | Join 'Travel Explorers' for captivating journeys to breathtaking destinations, immersing yourself in the beauty and culture of the world          |           7 |
|     7 | Dramatic Secrets     | A web of secrets, lies, and unexpected twists entangles a group of individuals in this gripping drama.                                            |           2 |
|     8 | Mystery Unveiled     | Follow a determined detective as they unravel mysteries and expose hidden truths in a series filled with suspense and intrigue.                   |           2 |
|     9 | Intrigues of Love    | Love, passion, and jealousy collide as complex relationships take center stage in this dramatic exploration of the human heart.                   |           2 |
|    10 | The Lost Heritage    | A family's quest to unearth their ancestral legacy leads them on a journey of self-discovery and unforeseen challenges in this heartwarming drama |           2 |



| episode_id | episode_name | series_no | episode_no |episode_detail| episode_minute|release_date | tv_id |
|:-------:|:-------:|:-------:|:-------:|:-------:|:-------:|:-------:|:-------:|
|  1 | 2023/11/3 | 1 | 1 | Historic Space Launch Successful!     | 60 | 2023-11-03 | 1 |
|  2 | 2023/11/4 | 1 | 2 | New Tech Gadget Set to Revolutionize Everyday Life  | 60 | 2023-11-04 | 1 |
|  3 | 2023/11/5 | 1 | 3 | Sunny Skies Forecasted for the        | 60 | 2023-11-03 | 1 |
|  4 | The Mysterious Case of the Stolen Art              | 1 | 1 | detectives crack a daring art gallery heist with a surprising twist.   | 60 | 2023-11-03 | 2 |
|  5 | Murder on the Orient Express                       | 1 | 2 | detectives investigate a murder mystery aboard a luxury train, uncovering secrets among passengers.                                                    |             60 | 2023-11-10   |     2 |
|  6 | The Hidden Clues                                   | 1 | 3 | detectives decipher cryptic clues to solve a complex puzzle leading to an unexpected revelation.                                                       |             60 | 2023-11-17   |     2 |
|  7 | Laughing All the Way                               | 1 | 1 | comedians engage in a hilarious battle of wits to keep the audience laughing from start to finish.                                                     |             60 | 2023-11-05   |     3 |
|  8 | Stand-Up Comedy Night                              | 1 | 2 | stand-up comedians take the stage for a night of side-splitting humor and laughter.                                                                    |             60 | 2023-11-12   |     3 |
|  9 | Comedy Clash: Battle of the Jokes                  | 1 | 3 | comedians go head-to-head in a joke-telling battle to win over the audience with their wit and humor.                                                  |             60 | 2023-11-19   |     3 |
| 10 | Into the Heart of the Jungle                       | 1 | 1 | viewers are taken on an immersive journey deep into the jungle to witness the incredible creatures and ecosystems that call it home.                   |             60 | 2023-11-01   |     4 |
| 11 | On the Prowl with Big Cats                         | 1 | 2 | we venture into the wilderness to observe majestic big cats in their natural habitats, capturing their untamed beauty and behaviors.                   |             60 | 2023-11-15   |     4 |
| 12 | Birdwatching in Paradise                           | 1 | 3 |  bird enthusiasts explore a tropical paradise, encountering a colorful array of avian species in their natural surroundings.                           |             60 | 2023-11-29   |     4 |
| 13 | Exploring the Microscopic World                    | 1 | 1 | scientists delve into the unseen realm of microorganisms, revealing the intricate and fascinating world that exists at a tiny scale.                   |             60 | 2023-11-03   |     5 |
| 14 | Journey to the Stars: Astronomy's Greatest Discove | 1 | 2 |  we embark on a cosmic journey to explore the universe's most significant astronomical revelations and breakthroughs.                                  |             60 | 2023-11-10   |     5 |
| 15 | The Future of Artificial Intelligence              | 1 | 3 | we delve into the cutting-edge developments and potential of AI, uncovering its transformative impact on our world.                                    |             60 | 2023-11-17   |     5 |
| 16 | Lost Cities and Ancient Treasures                  | 1 | 1 | adventurers embark on a quest to uncover forgotten civilizations and their hidden treasures, bringing history to life.                                 |             60 | 2023-10-25   |     6 |
| 17 | Island Hopping in the South Pacific                | 1 | 2 | we set off on a tropical island-hopping adventure, exploring the beauty and culture of the South Pacific paradise.                                     |             60 | 2023-11-01   |     6 |
| 18 | Crossing the Sahara: A Desert Expedition           | 1 | 3 |  intrepid explorers undertake a challenging journey across the vast Sahara Desert, revealing its rugged beauty and the resilient cultures that thrive  |             60 | 2023-11-08   |     6 |
| 19 | European Delights: From Paris to Rome              | 1 | 4 | we savor the enchanting delights of Europe, from the romantic streets of Paris to the ancient wonders of Rome.                                         |             60 | 2023-11-15   |     6 |
| 20 | Hidden Agendas                                     | 1 | 1 | A small-town murder case reveals buried secrets, testing the loyalty of friends and neighbors.                                                         |             60 | 2023-10-20   |     7 |
| 21 | Web of Deceit                                      | 1 | 2 | A shocking revelation about a prominent figure shakes the community, uncovering a web of deception.                                                    |             60 | 2023-10-27   |     7 |
| 22 | The Enigmatic Heist                                | 2 | 1 | A renowned art heist baffles investigators, leading a brilliant detective to trace the intricate steps of the mastermind.                              |             60 | 2023-11-07   |     8 |
| 23 | Shadows of the Past                                | 2 | 2 |  Uncovering long-buried evidence, a relentless detective races against time to solve a cold case with a surprising link to the present.                |             60 | 2023-11-14   |     8 |
| 24 | Passion's Betrayal                                 | 1 | 1 | Love and betrayal entwine as forbidden passions ignite, leading to a cascade of emotions and unexpected consequences.                                  |             60 | 2023-11-14   |     9 |
| 25 | Jealous Hearts                                     | 1 | 2 | The flames of jealousy burn brighter, threatening to shatter relationships and bring forth hidden desires.                                             |             60 | 2023-11-21   |     9 |
| 26 | Journey of Discovery                               | 1 | 1 | A family embarks on a quest to uncover their ancestral heritage, leading to revelations about their past and forging new connections.                  |             60 | 2023-11-05   |    10 |
| 27 | Heritage Revealed                                  | 1 | 2 | The search intensifies, revealing a hidden legacy that holds the key to the family's future.                                                           |             60 | 2023-11-12   |    10 |


| time_id | time_start | time_stop | view_count | tv_id | chan_id |
|---------|------------|-----------|------------|-------|---------|
|       1 | 10:00:00   | 11:00:00  |      70000 |     7 |       1 |
|       2 | 15:00:00   | 16:00:00  |      20000 |     8 |       1 |
|       3 | 17:00:00   | 18:00:00  |      30000 |     9 |       1 |
|       4 | 10:00:00   | 11:00:00  |       NULL |  NULL |       2 |
|       5 | 15:00:00   | 16:00:00  |      60000 |    10 |       2 |
|       6 | 17:00:00   | 18:00:00  |      50000 |     2 |       2 |
|       7 | 09:00:00   | 10:00:00  |      30000 |     1 |       3 |
|       8 | 12:00:00   | 13:00:00  |      20000 |     1 |       3 |
|       9 | 16:00:00   | 17:00:00  |      25000 |     1 |       3 |
|      10 | 19:00:00   | 20:00:00  |      40000 |     1 |       3 |
|      11 | 11:00:00   | 12:00:00  |      50000 |     3 |       4 |
|      12 | 13:00:00   | 14:00:00  |      40000 |     3 |       4 |
|      13 | 18:00:00   | 19:00:00  |      35000 |     3 |       4 |
|      14 | 08:00:00   | 09:00:00  |      53000 |     5 |       5 |
|      15 | 14:00:00   | 15:00:00  |      20000 |     5 |       5 |
|      16 | 07:00:00   | 08:00:00  |      10000 |     6 |       6 |
|      17 | 12:00:00   | 13:00:00  |      10000 |     4 |       6 |
|      18 | 19:00:00   | 20:00:00  |      10000 |     6 |       6 |
