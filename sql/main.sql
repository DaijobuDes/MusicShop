-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 12:43 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `Album_ID` int(11) NOT NULL,
  `FullLength` int(11) NOT NULL,
  `BandArtist` varchar(64) NOT NULL,
  `NumberOfSongs` int(11) NOT NULL,
  `Publisher` varchar(64) NOT NULL,
  `Rating` float NOT NULL,
  `Author_ID` int(11) NOT NULL,
  `Publisher_ID` int(11) NOT NULL,
  `albumName` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`Album_ID`, `FullLength`, `BandArtist`, `NumberOfSongs`, `Publisher`, `Rating`, `Author_ID`, `Publisher_ID`, `albumName`) VALUES
(1, 3814, 'Infected Mushroom', 11, 'World Music Group', 4.6, 1, 1, 'Vicious Delicious'),
(2, 2881, 'Infected Mushroom', 7, 'World Music Group', 4.9, 1, 1, 'Head of Nasa'),
(3, 4403, 'Yorushika', 14, 'Nihon Beat Peko', 4.3, 2, 2, 'Eruma'),
(4, 3293, 'IV of Spades', 15, 'World Music Group', 4.8, 3, 1, 'CLAPCLAPCLAP!'),
(5, 3167, 'The Flashbulb', 17, 'World Music Group', 4.2, 4, 1, 'Piety of Ashes'),
(6, 2314, 'American Football', 9, 'World Music Group', 3.9, 5, 1, 'LP1');

-- --------------------------------------------------------

--
-- Table structure for table `albumsong`
--

CREATE TABLE `albumsong` (
  `Album_ID` int(11) NOT NULL,
  `SongList` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albumsong`
--

INSERT INTO `albumsong` (`Album_ID`, `SongList`) VALUES
(1, 'Becoming Insane, Artillery, Vicious Delicious, Heavy Weight, Suliman, Forgive Me, Special Place, In Front of Me, Eat It Raw, Change the Formality, Before'),
(2, 'Bliss on Mushrooms, Guitarmass, Head of NASA, Chenchen Barvaz, Walking on the Moon, Here We Go Go Go, Lost In Space'),
(3, 'Train Window, Only Sorrow, Evening Calm_Somewhere_Fireworks, Rain with Cappucino, Lakeside Town, Dance of You, After the rain, Walk, Hole In The Heart, Church, Voice, Amy, Seabed/Moonlight, Nautilus'),
(4, 'CLAPCLAPCLAP!, Sweet Shadow, Bata_Dahan-Dahan!, Bawa Kaluluwa, Not My Energy, Come Inside of My Heart, The Novel Of My Mind, Dulo Ng Hangganan, In My Prison, My Juliana, Im a Butterfly, I aint Perfect, Take That Man, Captivated, I Would Rather Live Alone (Im Now Who Im Today)'),
(5, 'Turning Alone, Starlight, Porchfire, Saints, Precipice, Gray Pill, Prism, Cycles, Isochronal, Hypothesis, As Water, Fog, Leaves, Turning Inconsolate, Wind, Hungry Mouth_Shut, Goodbye Bastion'),
(6, 'Never Meant, The Summer Ends, Honestly?, For Sure, You Know I Should Be Leaving Soon, But The Regrets Are Killing Me, Ill See You When Were Both Not So Emotional, Stay Home, The One With The Wurlitzer');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `Author_ID` int(11) NOT NULL,
  `PlaceOfOrigin` varchar(128) NOT NULL,
  `AlbumsReleased` longtext NOT NULL,
  `SinglesReleased` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Author_ID`, `PlaceOfOrigin`, `AlbumsReleased`, `SinglesReleased`) VALUES
(1, 'Israel', '2', '0'),
(2, 'Japan', '1', '0'),
(3, 'Philippines', '1', '0'),
(4, 'United States', '1', '0'),
(5, 'American Football', '1', '0'),
(6, 'Inabakumori', '0', '1'),
(7, 'Kano', '0', '2'),
(8, 'Tuyu', '0', '1'),
(9, 'Kazuma Kiryu', '0', '1'),
(10, 'Rick Astley', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_ID` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `Price`, `Customer_ID`) VALUES
(1, 0, 1),
(2, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cartalbum`
--

CREATE TABLE `cartalbum` (
  `Cart_ID` int(11) NOT NULL,
  `AlbumList` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartalbum`
--

INSERT INTO `cartalbum` (`Cart_ID`, `AlbumList`) VALUES
(2, 1),
(2, 2),
(2, 3),
(1, 1),
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cartsong`
--

CREATE TABLE `cartsong` (
  `Card_ID` int(11) NOT NULL,
  `SongList` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartsong`
--

INSERT INTO `cartsong` (`Card_ID`, `SongList`) VALUES
(1, 5),
(1, 6),
(1, 1),
(2, 1),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Username`, `Name`, `Password`) VALUES
(1, 'user1', 'First User', 'qwerty'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `Publisher_ID` int(11) NOT NULL,
  `PublisherName` varchar(64) NOT NULL,
  `PlaceOfOrigin` varchar(128) NOT NULL,
  `AlbumsPublished` longtext NOT NULL,
  `Rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Publisher_ID`, `PublisherName`, `PlaceOfOrigin`, `AlbumsPublished`, `Rating`) VALUES
(1, 'FirstPublisher', 'Israel', '5', 4),
(2, 'SecondPublisher', 'Russia', '1', 3.5),
(3, 'ThirdPublisher', 'India', '0', 4),
(4, 'FourthPublisher', 'Japan', '6', 4),
(5, 'pubd', 'Port', '4', 5);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `Song_ID` int(11) NOT NULL,
  `SongLength` int(11) NOT NULL,
  `BandArtist` varchar(64) NOT NULL,
  `Publisher` varchar(64) DEFAULT NULL,
  `Genre` varchar(32) NOT NULL,
  `PublishingDate` date NOT NULL,
  `Author_ID` int(11) DEFAULT NULL,
  `Publisher_ID` int(11) DEFAULT NULL,
  `songName` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`Song_ID`, `SongLength`, `BandArtist`, `Publisher`, `Genre`, `PublishingDate`, `Author_ID`, `Publisher_ID`, `songName`) VALUES
(1, 189, 'Inabakumori', 'Nihon Beat Peko', 'Synth Pop', '0000-00-00', 6, 2, 'Haru No Sekibaku'),
(2, 136, 'Kano', 'Nihon Beat Peko', 'Pop Rock', '0000-00-00', 7, 2, 'King'),
(3, 208, 'Kano', 'Nihon Beat Peko', 'Blues', '0000-00-00', 7, 2, 'She Still Loved Him'),
(4, 231, 'TUYU', 'Nihon Beat Peko', 'JPop', '0000-00-00', 8, 2, 'Trapped In The Past'),
(5, 292, 'Kazuma Kiryu', 'Nihon Beat Peko', 'Singing', '0000-00-00', 9, 2, 'Baka Mitai'),
(6, 213, 'Rick Astley', 'World Music Group', 'Dance Music', '0000-00-00', 10, 1, 'Never Gonna Give You Up');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`Album_ID`);

--
-- Indexes for table `albumsong`
--
ALTER TABLE `albumsong`
  ADD KEY `fkAlbumSong` (`Album_ID`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Author_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_ID`),
  ADD KEY `fkCustomer` (`Customer_ID`);

--
-- Indexes for table `cartalbum`
--
ALTER TABLE `cartalbum`
  ADD KEY `fkCartAlbum` (`Cart_ID`);

--
-- Indexes for table `cartsong`
--
ALTER TABLE `cartsong`
  ADD KEY `fkCartIDSong` (`Card_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Publisher_ID`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`Song_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `Album_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `Author_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `Publisher_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `Song_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albumsong`
--
ALTER TABLE `albumsong`
  ADD CONSTRAINT `fkAlbumSong` FOREIGN KEY (`Album_ID`) REFERENCES `album` (`Album_ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fkCustomer` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `cartalbum`
--
ALTER TABLE `cartalbum`
  ADD CONSTRAINT `fkCartAlbum` FOREIGN KEY (`Cart_ID`) REFERENCES `cart` (`Cart_ID`);

--
-- Constraints for table `cartsong`
--
ALTER TABLE `cartsong`
  ADD CONSTRAINT `fkCartIDSong` FOREIGN KEY (`Card_ID`) REFERENCES `cart` (`Cart_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
