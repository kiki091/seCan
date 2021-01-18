CREATE TABLE `secan`.`pages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `route` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE `secan`.`seo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `key_id` VARCHAR(45) NULL,
  `key_type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `secan`.`seo_trans` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `seo_id` INT NOT NULL,
  `locale` VARCHAR(2) NOT NULL,
  `meta_title` VARCHAR(255) NULL,
  `meta_keyword` VARCHAR(255) NULL,
  `meta_description` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_seo_trans_1_idx` (`seo_id` ASC),
  CONSTRAINT `fk_seo_trans_1`
    FOREIGN KEY (`seo_id`)
    REFERENCES `secan`.`seo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

INSERT INTO `secan`.`pages` (`name`, `route`) VALUES ('Beranda', 'frontHome');
INSERT INTO `secan`.`pages` (`name`, `route`) VALUES ('Tentang Secan', 'frontAbout');
INSERT INTO `secan`.`pages` (`name`, `route`) VALUES ('Artikel', 'frontNews');
INSERT INTO `secan`.`pages` (`name`, `route`) VALUES ('Video', 'frontVideo');

INSERT INTO `secan`.`seo` (`key_id`, `key_type`) VALUES ('1', 'App\\Models\\Pages');
INSERT INTO `secan`.`seo` (`key_id`, `key_type`) VALUES ('2', 'App\\Models\\Pages');
INSERT INTO `secan`.`seo` (`key_id`, `key_type`) VALUES ('3', 'App\\Models\\Pages');
INSERT INTO `secan`.`seo` (`key_id`, `key_type`) VALUES ('4', 'App\\Models\\Pages');

INSERT INTO `secan`.`seo_trans` (`seo_id`, `locale`, `meta_title`, `meta_keyword`, `meta_description`) VALUES ('1', 'id', 'Beranda Secan', 'Beranda Secan', 'Beranda Secan');
INSERT INTO `secan`.`seo_trans` (`seo_id`, `locale`) VALUES ('1', 'en');
INSERT INTO `secan`.`seo_trans` (`seo_id`, `locale`, `meta_title`, `meta_keyword`, `meta_description`) VALUES ('2', 'id', 'Tentang Secan', 'Tentang Secan', 'Tentang Secan');
INSERT INTO `secan`.`seo_trans` (`seo_id`, `locale`) VALUES ('2', 'en');
INSERT INTO `secan`.`seo_trans` (`seo_id`, `locale`, `meta_title`, `meta_keyword`, `meta_description`) VALUES ('3', 'id', 'Artikel', 'Artikel', 'Artikel');
INSERT INTO `secan`.`seo_trans` (`seo_id`, `locale`) VALUES ('3', 'en');
INSERT INTO `secan`.`seo_trans` (`seo_id`, `locale`, `meta_title`, `meta_keyword`, `meta_description`) VALUES ('4', 'id', 'Video', 'Video', 'Video');
INSERT INTO `secan`.`seo_trans` (`seo_id`, `locale`) VALUES ('4', 'en');





UPDATE `secan`.`tag_trans` SET `title`='kulit sehat' WHERE `id`='25';
UPDATE `secan`.`tag_trans` SET `title`='rambut' WHERE `id`='27';
UPDATE `secan`.`tag_trans` SET `title`='pelembab' WHERE `id`='29';
UPDATE `secan`.`tag_trans` SET `title`='olah raga' WHERE `id`='31';
UPDATE `secan`.`tag_trans` SET `title`='produk' WHERE `id`='33';
UPDATE `secan`.`tag_trans` SET `title`='senam' WHERE `id`='35';
UPDATE `secan`.`tag_trans` SET `title`='kecantikan' WHERE `id`='37';
