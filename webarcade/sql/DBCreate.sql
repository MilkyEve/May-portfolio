-- Table structure for table `highscores`
CREATE TABLE `highscores` ( 
  `id` INT(11) NOT NULL AUTO_INCREMENT , 
  `player_id` INT(11) NOT NULL , 
  `game_name` VARCHAR(20) NOT NULL , 
  `highscore` INT(11) NOT NULL , 
  `submit_datetime` DATETIME NOT NULL , 
  PRIMARY KEY (`id`)
  ) ENGINE = InnoDB; 
