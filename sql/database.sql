CREATE DATABASE MusicShop;

CREATE TABLE `musicshop`.`customer` ( 
    `Customer_ID` INT NOT NULL AUTO_INCREMENT , 
    `Username` VARCHAR(64) NOT NULL , 
    `Name` VARCHAR(64) NOT NULL , 
    `Password` VARCHAR(32) NOT NULL , 
    PRIMARY KEY (`Customer_ID`)
) ENGINE = InnoDB;

CREATE TABLE `musicshop`.`author` ( 
    `Author_ID` INT NOT NULL AUTO_INCREMENT , 
    `PlaceOfOrigin` VARCHAR(128) NOT NULL , 
    `AlbumsReleased` LONGTEXT NOT NULL , 
    `SinglesReleased` LONGTEXT NOT NULL ,
     PRIMARY KEY (`Author_ID`)
) ENGINE = InnoDB;

CREATE TABLE `musicshop`.`publisher` ( 
    `Publisher_ID` INT NOT NULL AUTO_INCREMENT , 
    `PlaceOfOrigin` VARCHAR(128) NOT NULL , 
    `AlbumsPublished` LONGTEXT NOT NULL ,
     `Rating` FLOAT NOT NULL ,
      PRIMARY KEY (`Publisher_ID`)
) ENGINE = InnoDB;

CREATE TABLE `musicshop`.`cart` ( 
    `Cart_ID` INT NOT NULL AUTO_INCREMENT , 
    `Price` FLOAT NOT NULL , 
    PRIMARY KEY  (`Cart_ID`)
) ENGINE = InnoDB;

CREATE TABLE `musicshop`.`album` ( 
    `Album_ID` INT NOT NULL AUTO_INCREMENT ,
    `FullLength` INT NOT NULL , 
    `BandArtist` VARCHAR(64) NOT NULL , 
    `NumberOfSongs` INT NOT NULL ,
    `Publisher` VARCHAR(64) NOT NULL , 
    `Rating` FLOAT NOT NULL , 
    `Author_ID` INT NOT NULL , 
    `Publisher_ID` INT NOT NULL , 
    PRIMARY KEY (`Album_ID`)
) ENGINE = InnoDB;

CREATE TABLE `musicshop`.`song` ( 
    `Song_ID` INT NOT NULL AUTO_INCREMENT , 
    `SongLength` INT NOT NULL , 
    `BandArtist` VARCHAR(64) NOT NULL , 
    `Publisher` VARCHAR(64) NOT NULL , 
    `Genre` VARCHAR(32) NOT NULL , 
    `PublishingDate` INT NOT NULL , 
    -- `Cart_ID` INT NOT NULL , 
    `Author_ID` INT NOT NULL , 
    `Album_ID` INT NOT NULL , 
    `Publisher_ID` INT NOT NULL , 
    PRIMARY KEY (`Song_ID`)
) ENGINE = InnoDB;

CREATE TABLE `musicshop`.`cartsong` ( 
    `Card_ID` INT NOT NULL , 
    `SongList` LONGTEXT NOT NULL 
) ENGINE = InnoDB;

CREATE TABLE `musicshop`.`cartalbum` ( 
    `Cart_ID` INT NOT NULL , 
    `AlbumList` LONGTEXT NOT NULL 
) ENGINE = InnoDB;

CREATE TABLE `musicshop`.`albumsong` ( 
    `Album_ID` INT NOT NULL , 
    `SongList` LONGTEXT NOT NULL 
) ENGINE = InnoDB;

ALTER TABLE `cart` ADD `Customer_ID` INT NOT NULL AFTER `Price`;
ALTER TABLE `cart` ADD CONSTRAINT `fkCustomer` FOREIGN KEY (`Customer_ID`) REFERENCES `customer`(`Customer_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `song` ADD CONSTRAINT `fkCardID` FOREIGN KEY (`Cart_ID`) REFERENCES `cart`(`Cart_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `song` ADD CONSTRAINT `fkAuthorID` FOREIGN KEY (`Author_ID`) REFERENCES `author`(`Author_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `song` ADD CONSTRAINT `fkAlbumID` FOREIGN KEY (`Album_ID`) REFERENCES `album`(`Album_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `song` ADD CONSTRAINT `fkPublisherID` FOREIGN KEY (`Publisher_ID`) REFERENCES `publisher`(`Publisher_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `cartsong` ADD CONSTRAINT `fkCartIDSong` FOREIGN KEY (`Card_ID`) REFERENCES `cart`(`Cart_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `cartalbum` ADD CONSTRAINT `fkCartAlbum` FOREIGN KEY (`Cart_ID`) REFERENCES `cart`(`Cart_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `albumsong` ADD CONSTRAINT `fkAlbumSong` FOREIGN KEY (`Album_ID`) REFERENCES `album`(`Album_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
