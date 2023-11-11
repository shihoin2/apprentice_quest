SELECT
tv_info.tv_title,
sum(view_count)
FROM tv_info
INNER JOIN tv_time
ON tv_info.tv_id = tv_time.tv_id
INNER JOIN episode
ON tv_info.tv_id = episode.tv_id
WHERE episode.release_date BETWEEN '2023-10-29' AND '2023-11-05'
GROUP BY tv_info.tv_id
ORDER BY sum(view_count) DESC
LIMIT 2;
