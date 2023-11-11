SELECT
episode.episode_name,
episode.series_no,
episode.episode_no,
episode.episode_detail,
episode.release_date,
tv_time.time_start,
tv_time.time_stop,
channel.chan_name
FROM episode
LEFT OUTER JOIN tv_time
ON episode.tv_id = tv_time.tv_id
LEFT OUTER JOIN tv_info
ON episode.tv_id = tv_info.tv_id
LEFT OUTER JOIN channel
ON channel.chan_id = tv_time.chan_id
WHERE chan_name = 'Drama 1'
AND release_date BETWEEN'2023-11-05' AND '2023-11-12';
