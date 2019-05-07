SELECT COUNT(`duration`) AS `nb_short-films`
FROM `db_mmcclure`.`film`
WHERE `duration` <= 42;