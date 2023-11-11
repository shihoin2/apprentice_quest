SELECT episode.episode_name, tv_time.view_count
FROM episode
INNER JOIN tv_time
ON episode.tv_id = tv_time.tv_id
ORDER BY tv_time.view_count DESC
LIMIT 3;
