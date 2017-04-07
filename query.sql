SELECT tbl1.storage_id, tbl1.category_id, tbl1.quantity
FROM
  incoming as tbl1,
  (SELECT storage_id, category_id, MAX(time) as maxtime FROM incoming GROUP BY storage_id, category_id) as tbl2
WHERE
  tbl1.`time` = tbl2.maxtime AND tbl1.category_id = tbl2.category_id AND tbl1.storage_id = tbl2.storage_id
ORDER BY tbl1.storage_id ASC, tbl1.category_id ASC




SELECT tbl1.storage_id, tbl1.category_id, tbl1.quantity
FROM incoming tbl1
WHERE tbl1.`time` = (
    SELECT MAX(time) FROM incoming tbl2 WHERE tbl2.storage_id = tbl1.storage_id AND tbl2.category_id = tbl1.category_id
)
ORDER BY tbl1.storage_id ASC, tbl1.category_id ASC