SELECT `title`, `summary`
FROM `db_mmcclure`.`film`
WHERE `summary` COLLATE latin1_general_ci LIKE '%vincent%'
ORDER BY `id_film` ASC;