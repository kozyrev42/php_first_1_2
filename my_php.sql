<meta charset="UTF-8">

CREATE DATABASE `my_php` COLLATE utf8mb4_general_ci;     /* база для кириллицы */


DROP DATABASE `моя`;


SHOW VARIABLES;


CREATE TABLE `сообщения` (
    `youname` VARCHAR(20) CHARACTER SET utf8mb4 ,
    `whеnithарреnd` VARCHAR(20) CHARACTER SET utf8mb4 ,
    `email` VARCHAR(30) CHARACTER SET utf8mb4
) default charset utf8mb4;      /* рабочая */


/* CREATE TABLE `сообщения` (
    `youname` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    `whеnithарреnd` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    `email` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
)  default charset utf8mb4; */   /* точно рабочая */


INSERT INTO `сообщения` (
        `youname`,`whеnithарреnd`,`email`
    ) VALUES ('даша','сего','zzz@ccc.com'
);



SELECT * FROM `сообщения`;      /* показать всю таблицу */
SELECT * FROM `messages`;


ALTER TABLE `сообщения` 
    DROP COLUMN `email`;


SHOW VARIABLES LIKE 'char%';
SHOW VARIABLES LIKE 'collation%';

/* SHOW COLLATION;
 */


/* init_connect=‘SET collation_connection = utf8_unicode_ci’; */