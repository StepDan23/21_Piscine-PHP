SELECT UPPER(`last_name`) AS 'NAME', `first_name`, `price`
FROM `db_mmcclure`.`user_card`
INNER JOIN `db_mmcclure`.`member`
ON `user_card`.`id_user`=`member`.`id_member`
INNER JOIN `db_mmcclure`.`subscription`
ON `member`.`id_sub`=`subscription`.`id_sub`
WHERE `price` > 42
ORDER BY `last_name`, `first_name` ASC;