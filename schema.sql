# I would add an index on species and name in the join table assuming that would be a part of the where clause in some future query
# We can talk in length about indexing and explain plans if needed but those items are outside the scope of your question

CREATE TABLE `animal` (
  `id`         INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `species`    ENUM('Dog', 'Cat')        DEFAULT NULL,
  `age`        INT(2)                    DEFAULT NULL,
  `date_added` TIMESTAMP        NULL     DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8;

INSERT INTO `animal` (`id`, `species`, `age`) VALUES (6, 'Dog', 12);

CREATE TABLE `animal_name` (
  `id`          INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `animal_id`   INT(11) UNSIGNED NOT NULL,
  `animal_name` VARCHAR(50)               DEFAULT NULL,
  `date_added`  TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`),
  CONSTRAINT `animal_name_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO `animal_name` (`id`, `animal_id`, `animal_name`) VALUES (1, 6, 'Clifford'), (2, 6, 'Rover');

# Get current animal name
SELECT
  a.species,
  a.age,
  an.animal_name AS current_animal_name,
  a.date_added   AS create_date,
  an.date_added  AS name_create_date
FROM
  animal a
  LEFT JOIN animal_name an ON (a.id = an.animal_id)
WHERE
  a.id = 6
ORDER BY
  an.date_added DESC
LIMIT
  1;