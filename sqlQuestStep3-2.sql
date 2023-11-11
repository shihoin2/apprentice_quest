SELECT tv_info.tv_title, episode.episode_name, episode.series_no, episode.episode_no, tv_time.view_count
FROM episode
INNER JOIN tv_time
ON episode.tv_id = tv_time.tv_id
INNER JOIN tv_info
ON episode.tv_id = tv_info.tv_id
ORDER BY tv_time.view_count DESC
LIMIT 3;
