SELECT
category.category_name,
tv_info.tv_title,
avg(view_count)
FROM tv_info
INNER JOIN tv_time
ON tv_info.tv_id = tv_time.tv_id
INNER JOIN category
ON tv_info.category_id = category.category_id
GROUP BY category.category_id
HAVING avg(view_count) = max(view_count)
ORDER BY max(view_count) DESC;
