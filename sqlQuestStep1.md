#### 「チャンネルテーブル」
channel
|Field|Type|Null|Key|Default|Extra|
|:----:|:----:|:----:|:----:|:----:|:----:|
|chan_id|int(11)||PRI|NULL|auto_increment|
|chan_name| varchar(50) |||NULL||

#### 「番組情報テーブル」
tv_info
|Field|Type|Null|Key|Default|Extra|
|:----:|:----:|:----:|:----:|:----:|:----:|
| tv_id       | int(11)      |    | PRI | NULL    | auto_increment |
| tv_title    | varchar(50)  |    |     | NULL    |                |
| tv_detail   | varchar(150) | YES  |     | NULL    |                |
| category_id | int(11)      | YES  | MUL | NULL    |                |
#### 「番組エピソードテーブル」
episode
|Field|Type|Null|Key|Default|Extra|
|:----:|:----:|:----:|:----:|:----:|:----:|
| episode_id     | int(11)      |    | PRI | NULL    | auto_increment |
| episode_name   | varchar(50)  |    |     | NULL    |                |
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
| category_id   | int(11)     |    | PRI | NULL    | auto_increment |
| category_name | varchar(20) |    |     | NULL    |

#### 「番組枠テーブル」
 tv_time
 |Field|Type|Null|Key|Default|Extra|
|:----:|:----:|:----:|:----:|:----:|:----:|
| time_id    | int(11) |    | PRI | NULL    | auto_increment |
| time_start | time    |    |     | NULL    |                |
| time_stop  | time    |    |     | NULL    |                |
| view_count | int(11) | YES  |     | NULL    |                |
| tv_id      | int(11) | YES  | MUL | NULL    |                |
| chan_id    | int(11) | YES  | MUL | NULL    |
