-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- 
-- 
-- 
-- 

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mannering`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `album` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float(2,2) NOT NULL,
  `text` varchar(100) NOT NULL,
  `artistid` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `album`, `image`, `price`, `text`, `artistid`, `genre`) VALUES
(1, 'Hi-Teknology 2(The Chip)', '1.jpg', 0.00, 'MP3 Ogg mp4 ', 1, 'Hip Hop'),
(2, '8 Diagrams', '2.jpg', 0.00, 'MP3 Ogg mp4 ', 2, 'Hip Hop'),
(3, 'Sound Of Revenge', '3.jpg', 0.00, 'MP3 Ogg mp4 ', 3, 'Hip Hop'),
(4, 'Revolution Part2', '4.jpg', 0.00, 'MP3 Ogg mp4 ', 4, 'Hip Hop'),
(5, 'Fishscale', '5.jpg', 0.00, 'MP3 Ogg mp4 ', 5, 'Hip Hop'),
(6, 'Legacy Of Blood', '6.jpg', 0.00, 'MP3 Ogg mp4 ', 6, 'Hip Hop'),
(7, 'Game Theory', '7.jpg', 0.00, 'MP3 Ogg mp4 ', 7, 'Hip Hop'),
(8, 'Food and Liquor', '8.jpg', 0.00, 'MP3 Ogg mp4 ', 8, 'Hip Hop'),
(9, 'Heavy Mental', '9.jpg', 0.00, 'MP3 Ogg mp4 ', 9, 'Hip Hop'),
(10, 'Revolution Part 1', '10.jpg', 0.00, 'MP3 Ogg mp4 ', 4, 'Hip Hop'),
(11, 'Westside', '11.jpg', 0.00, 'MP3 Ogg mp4 ', 10, 'Hip Hop'),
(12, 'Uncontrolled Substances', '12.jpg', 0.00, 'MP3 Ogg mp4 ', 71, 'Hip Hop'),
(13, 'USDA', '13.jpg', 0.00, 'MP3 Ogg mp4 ', 11, 'Hip Hop'),
(14, 'I Killed the Devil Last Night', '14.jpg', 0.00, 'MP3 Ogg mp4 ', 9, 'Hip Hop'),
(15, 'Free Agents', '15.jpg', 0.00, 'MP3 Ogg mp4 ', 12, 'Hip Hop'),
(16, 'Tical', '16.jpg', 0.00, 'MP3 Ogg mp4 ', 13, 'Hip Hop'),
(17, 'Built for Cuban Links', '17.jpg', 0.00, 'MP3 Ogg mp4 ', 14, 'Hip Hop'),
(18, 'TM 103', '18.jpg', 0.00, 'MP3 Ogg mp4 ', 11, 'Hip Hop'),
(19, 'First Class', '19.jpg', 0.00, 'MP3 Ogg mp4 ', 15, 'Hip Hop'),
(20, 'The Owners', '20.jpg', 0.00, 'MP3 Ogg mp4 ', 16, 'Hip Hop'),
(21, 'Bulletproof Wallets', '21.jpg', 0.00, 'MP3 Ogg mp4 ', 5, 'Hip Hop'),
(22, 'Digital Bullets', '22.jpg', 0.00, 'MP3 Ogg mp4 ', 17, 'Hip Hop'),
(23, 'The Pillage', '23.jpg', 0.00, 'MP3 Ogg mp4 ', 18, 'Hip Hop'),
(24, 'Minstel Show', '24.jpg', 0.00, 'MP3 Ogg mp4 ', 19, 'Hip Hop'),
(25, 'Lost Tapes', '25.jpg', 0.00, 'MP3 Ogg mp4 ', 20, 'Hip Hop'),
(26, 'Iron Flag', '26.jpg', 0.00, 'MP3 Ogg mp4 ', 2, 'Hip Hop'),
(27, 'Things fall down', '27.jpg', 0.00, 'MP3 Ogg mp4 ', 7, 'Hip Hop'),
(28, 'Theres a poison going on...', '28.jpg', 0.00, 'MP3 Ogg mp4 ', 21, 'Hip Hop'),
(29, 'Birth of a Prince', '29.jpg', 0.00, 'MP3 Ogg mp4 ', 17, 'Hip Hop'),
(30, 'The Pick The Sickle The Shovel', '30.jpg', 0.00, 'MP3 Ogg mp4 ', 22, 'Hip Hop'),
(31, 'Best Of', '31.jpg', 0.00, 'MP3 Ogg mp4 ', 23, 'Hip Hop'),
(32, '20/20', '32.jpg', 0.00, 'MP3 Ogg mp4 ', 24, 'Hip Hop'),
(33, 'View from Masada', '33.jpg', 0.00, 'MP3 Ogg mp4 ', 9, 'Hip Hop'),
(34, 'Lyricist Lounge 2', '34.jpg', 0.00, 'MP3 Ogg mp4 ', 25, 'Hip Hop'),
(35, 'The W', '35.jpg', 0.00, 'MP3 Ogg mp4 ', 2, 'Hip Hop'),
(36, 'Liquid Swords', '36.jpg', 0.00, 'MP3 Ogg mp4 ', 26, 'Hip Hop'),
(37, 'Legend Of Liquid Swords', '37.jpg', 0.00, 'MP3 Ogg mp4 ', 26, 'Hip Hop'),
(38, 'Collective', '38.jpg', 0.00, 'MP3 Ogg mp4 ', 2, 'Hip Hop'),
(39, 'Amerikkas Nightmare', '39.jpg', 0.00, 'MP3 Ogg mp4 ', 12, 'Hip Hop'),
(40, 'The Sting', '40.jpg', 0.00, 'MP3 Ogg mp4 ', 27, 'Hip Hop'),
(41, 'The Swarm', '41.jpg', 0.00, 'MP3 Ogg mp4 ', 27, 'Hip Hop'),
(42, 'Enter the 36 Chambers', '42.jpg', 0.00, 'MP3 Ogg mp4 ', 2, 'Hip Hop'),
(43, 'Ironman', '43.jpg', 0.00, 'MP3 Ogg mp4 ', 5, 'Hip Hop'),
(44, 'Return of the Mack', '44.jpg', 0.00, 'MP3 Ogg mp4 ', 28, 'Hip Hop'),
(45, 'Shoalin V Wu Tang', '45.jpg', 0.00, 'MP3 Ogg mp4 ', 14, 'Hip Hop'),
(46, 'Doctors Advocate', '46.jpg', 0.00, 'MP3 Ogg mp4 ', 29, 'Hip Hop'),
(47, 'Chamber Music', '47.jpg', 0.00, 'MP3 Ogg mp4 ', 2, 'Hip Hop'),
(48, 'Black Radio', '48.jpg', 0.00, 'MP3 Ogg mp4 ', 30, 'Jazz'),
(49, 'Duets 2', '49.jpg', 0.00, 'MP3 Ogg mp4 ', 31, 'Jazz'),
(50, 'Impressions', '50.jpg', 0.00, 'MP3 Ogg mp4 ', 32, 'Jazz'),
(51, 'Kisses on the Bottom', '51.jpg', 0.00, 'MP3 Ogg mp4 ', 33, 'Jazz'),
(52, 'Radio Music Society', '52.jpg', 0.00, 'MP3 Ogg mp4 ', 34, 'Jazz'),
(53, 'The Band Perry', '53.jpg', 0.00, 'MP3 Ogg mp4 ', 35, 'Country'),
(54, 'Speak Now', '54.jpg', 0.00, 'MP3 Ogg mp4 ', 36, 'Country'),
(55, 'Chief', '55.jpg', 0.00, 'MP3 Ogg mp4 ', 37, 'Country'),
(56, 'My Kinda Party', '56.jpg', 0.00, 'MP3 Ogg mp4 ', 38, 'Country'),
(57, 'Own The Night', '57.jpg', 0.00, 'MP3 Ogg mp4 ', 39, 'Country'),
(58, 'Hard 2 Love', '58.jpg', 0.00, 'MP3 Ogg mp4 ', 40, 'Country'),
(59, 'Changed', '59.jpg', 0.00, 'MP3 Ogg mp4 ', 41, 'Country'),
(60, 'Tuskagee', '60.jpg', 0.00, 'MP3 Ogg mp4 ', 42, 'Country'),
(61, 'Up all Night', '61.jpg', 0.00, 'MP3 Ogg mp4 ', 43, 'Country'),
(62, 'Unknown Album Name', '62.jpg', 0.00, 'MP3 Ogg mp4 ', 44, 'Country'),
(63, 'Heroes', '63.jpg', 0.00, 'MP3 Ogg mp4 ', 45, 'Country'),
(64, 'Need You Now', '64.jpg', 0.00, 'MP3 Ogg mp4 ', 39, 'Country'),
(65, 'Unknown Album Name', '65.jpg', 0.00, 'MP3 Ogg mp4 ', 39, 'Country'),
(66, 'Full tank', '66.jpg', 0.00, 'MP3 Ogg mp4 ', 46, 'Jazz'),
(67, 'Live at Art D\'lugoff', '67.jpg', 0.00, 'MP3 Ogg mp4 ', 62, 'Jazz'),
(68, 'Dreams', '68.jpg', 0.00, 'MP3 Ogg mp4 ', 48, 'Jazz'),
(69, 'Conversation', '69.jpg', 0.00, 'MP3 Ogg mp4 ', 49, 'Jazz'),
(70, 'Lettuce', '70.jpg', 0.00, 'MP3 Ogg mp4 ', 50, 'Jazz'),
(71, 'The Absence', '71.jpg', 0.00, 'MP3 Ogg mp4 ', 51, 'Jazz'),
(72, 'Here we Go', '72.jpg', 0.00, 'MP3 Ogg mp4 ', 52, 'Jazz'),
(73, 'Breaking The Rules', '73.jpg', 0.00, 'MP3 Ogg mp4 ', 53, 'Jazz'),
(74, 'Spectrum Road', '74.jpg', 0.00, 'MP3 Ogg mp4 ', 54, 'Jazz'),
(75, 'Is\'nt it Romantic', '75.jpg', 0.00, 'MP3 Ogg mp4 ', 55, 'Jazz'),
(76, 'For True', '76.jpg', 0.00, 'MP3 Ogg mp4 ', 56, 'Jazz'),
(77, 'Blown away', '77.jpg', 0.00, 'MP3 Ogg mp4 ', 57, 'Jazz'),
(78, 'Halfway to Heaven', '78.jpg', 0.00, 'MP3 Ogg mp4 ', 58, 'Jazz'),
(79, 'Punching Bag', '79.jpg', 0.00, 'MP3 Ogg mp4 ', 59, 'Country'),
(80, 'Ashes and Roses', '80.jpg', 0.00, 'MP3 Ogg mp4 ', 60, 'Country'),
(81, 'Tailgates and Taglines', '81.jpg', 0.00, 'MP3 Ogg mp4 ', 61, 'Country'),
(82, 'Thirty Miles west', '82.jpg', 0.00, 'MP3 Ogg mp4 ', 62, 'Country'),
(83, 'Made in Brooklyn', '83.jpg', 0.00, 'MP3 Ogg mp4 ', 63, 'Hip Hop'),
(84, 'The Movement', '84.jpg', 0.00, 'MP3 Ogg mp4 ', 71, 'Hip Hop'),
(85, 'Red River Blue', '85.jpg', 0.00, 'MP3 Ogg mp4 ', 64, 'Country'),
(86, 'Only Built For Cuban Linx 2', '86.jpg', 0.00, 'MP3 Ogg mp4 ', 14, 'Hip Hop'),
(87, 'Long Hot Summer', '87.jpg', 0.00, 'MP3 Ogg mp4 ', 65, 'Hip Hop'),
(88, 'Ledgendary Swords', '88.jpg', 0.00, 'MP3 Ogg mp4 ', 2, 'Hip Hop'),
(89, 'DMX Album', '89.jpg', 0.00, '', 73, 'Hip Hop'),
(90, 'Ghetto Boys', '90.jpg', 0.00, '', 74, 'Hip Hop');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `artist_name` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `artist_name`) VALUES
(1, 'Hi-Tek'),
(2, 'Wu Tang Clan'),
(3, 'Chamillionaire'),
(4, 'Immortal Technique'),
(5, 'Ghostface'),
(6, 'Jedi Mind Tricks'),
(7, 'Roots'),
(8, 'Lupe Fiasco'),
(9, 'Killah Priest'),
(10, 'Ice T'),
(11, 'Young Jeezy'),
(12, 'Mobb Deep'),
(13, 'Method Man'),
(14, 'Raekwon'),
(15, 'Large Professor'),
(16, 'Gangstarr'),
(17, 'RZA'),
(18, 'Cappadonna'),
(19, 'Little Brother'),
(20, 'Nas'),
(21, 'Public Enemy'),
(22, 'Gravediggaz'),
(23, 'Old Dirty Bastard'),
(24, 'Dilated People'),
(25, 'Rawkus'),
(26, 'GZA'),
(27, 'Killa Beez'),
(28, 'Prodigy'),
(29, 'The Game'),
(30, 'Robert Glasper Experiment'),
(31, 'Tony Bennet'),
(32, 'Chris Botti'),
(33, 'Paul Macartney'),
(34, 'Esperanza Spalding'),
(35, 'The Band Perry'),
(36, 'Taylor Swift'),
(37, 'Eric Church'),
(38, 'Jason Aldean'),
(39, 'Lady Antebellum'),
(40, 'Lee Brice'),
(41, 'Rascal Flatts'),
(42, 'Lionel Ritchie'),
(43, 'Kip Moore'),
(44, 'Alan Jackson'),
(45, 'Wille Nelson'),
(46, 'Ben Tankard'),
(47, 'Bill Evans'),
(48, 'Brian Culbertson'),
(49, 'David Benoit'),
(50, 'Fly'),
(51, 'Melody Gardot'),
(52, 'Peter White'),
(53, 'Rahini'),
(54, 'Spectrum Radio'),
(55, 'Tony Bennett'),
(56, 'Trombone Shorty'),
(58, 'Brantley Gilbert'),
(59, 'Josh Turner'),
(60, 'Mary Chapin'),
(61, 'Luke Bryan'),
(62, 'Alan Jackson'),
(63, 'Masta Killa'),
(64, 'Blake Shelton'),
(65, 'Masta Ace'),
(66, 'Robert-Glasper'),
(67, 'Dierks-Bentley'),
(68, 'Keith-Urban'),
(69, 'Carrie-Underwood'),
(70, 'Jake-Owen'),
(71, 'Inspector Deck'),
(72, 'MF Doom'),
(73, 'DMX'),
(74, 'Ghetto Boys'),
(75, 'Eminem');

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `audioid` int(11) NOT NULL,
  `songtitle` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mp3_File` varchar(150) CHARACTER SET utf8 NOT NULL,
  `ogg_File` varchar(150) CHARACTER SET utf8 NOT NULL,
  `mp4_File` varchar(150) CHARACTER SET utf8 NOT NULL,
  `artistid` int(11) NOT NULL,
  `albumid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`audioid`, `songtitle`, `mp3_File`, `ogg_File`, `mp4_File`, `artistid`, `albumid`) VALUES
(1, 'Where it all started', 'https://mannering.s3.eu-west-2.amazonaws.com/hi-tek-high-technology-two/where-It-Started-At.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/hi-tek-high-technology-two/where-It-Started-At.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/hi-tek-high-technology-two/where-It-Started-At.m4a', 1, 1),
(2, 'Rushing Elephants', 'https://mannering.s3.eu-west-2.amazonaws.com/eight-diagrams-wu-tang-clan/rushing-elephants.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/eight-diagrams-wu-tang-clan/rushing-elephants.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/eight-diagrams-wu-tang-clan/rushing-elephants.m4a', 2, 2),
(3, 'Riding', 'https://mannering.s3.eu-west-2.amazonaws.com/chamillionaire-riding/ridin-feat-krayzie-bone.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/chamillionaire-riding/ridin-feat-krayzie-bone.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/chamillionaire-riding/ridin-feat-krayzie-bone.m4a', 3, 3),
(4, 'Scars of the crucifix', 'https://mannering.s3.eu-west-2.amazonaws.com/jedi-mind-tricks/Scars-of-the-crucifix.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/jedi-mind-tricks/Scars-of-the-crucifix.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/jedi-mind-tricks/Scars-of-the-crucifix.m4a', 6, 6),
(5, 'Internally-Bleeding', 'https://mannering.s3.eu-west-2.amazonaws.com/revolutionary-part-two-immortal-technique/internally-bleeding.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/revolutionary-part-two-immortal-technique/internally-bleeding.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/revolutionary-part-two-immortal-technique/internally-bleeding.m4a', 4, 4),
(6, 'Kilo', 'https://mannering.s3.eu-west-2.amazonaws.com/fishscale-ghostface/Kilo.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/fishscale-ghostface/Kilo.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/fishscale-ghostface/Kilo.m4a', 5, 5),
(7, 'The Hilton', 'https://mannering.s3.eu-west-2.amazonaws.com/bulletproof-wallets-ghostface/the-hilton.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/bulletproof-wallets-ghostface/the-hilton.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/bulletproof-wallets-ghostface/the-hilton.m4a', 5, 21),
(8, 'Long Hot Summer', 'https://mannering.s3.eu-west-2.amazonaws.com/hot-summer-masta-ace/hot-summer.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/hot-summer-masta-ace/hot-summer.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/hot-summer-masta-ace/hot-summer.m4a', 65, 87),
(9, 'bensound-buddy', 'https://mannering.s3.eu-west-2.amazonaws.com/ben-tankard-full-tank/bensound-buddy.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/ben-tankard-full-tank/bensound-buddy.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/ben-tankard-full-tank/bensound-buddy.m4a', 46, 66),
(10, 'bensound-cute', 'https://mannering.s3.eu-west-2.amazonaws.com/cheif-eric-church/bensound-cute.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/cheif-eric-church/bensound-cute.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/cheif-eric-church/bensound-cute.m4a', 37, 55),
(11, 'bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/chris-botti-impressions/bensound-betterdays.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/chris-botti-impressions/bensound-betterdays.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/chris-botti-impressions/bensound-betterdays.m4a', 32, 50),
(12, 'bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/my-kind-party-jason-aldean/bensound-betterdays.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/my-kind-party-jason-aldean/bensound-betterdays.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/my-kind-party-jason-aldean/bensound-betterdays.mp3', 38, 56),
(13, 'bensound-anewbeginning', 'https://mannering.s3.eu-west-2.amazonaws.com/robert-glasper-black-radio/bensound-anewbeginning.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/robert-glasper-black-radio/bensound-anewbeginning.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/robert-glasper-black-radio/bensound-anewbeginning.m4a', 30, 48),
(14, 'bensound-acousticbreeze', 'https://mannering.s3.eu-west-2.amazonaws.com/speak-now-taylor-swift/bensound-acousticbreeze.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/speak-now-taylor-swift/bensound-acousticbreeze.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/speak-now-taylor-swift/bensound-acousticbreeze.m4a', 36, 54),
(15, 'bensound-acousticbreeze', 'https://mannering.s3.eu-west-2.amazonaws.com/tony-bennett-duets/bensound-acousticbreeze.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/tony-bennett-duets/bensound-acousticbreeze.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/tony-bennett-duets/bensound-acousticbreeze.m4a', 31, 49),
(16, 'bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/lady-antebellum-own-the-night/bensound-betterdays.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/lady-antebellum-own-the-night/bensound-betterdays.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/lady-antebellum-own-the-night/bensound-betterdays.m4a', 39, 57),
(17, 'bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/espenranza-spalding-radio-music-society/bensound-better', 'https://mannering.s3.eu-west-2.amazonaws.com/espenranza-spalding-radio-music-society/bensound-better', 'https://mannering.s3.eu-west-2.amazonaws.com/espenranza-spalding-radio-music-society/bensound-better', 34, 52),
(18, 'Kisses on the Bottom', 'https://mannering.s3.eu-west-2.amazonaws.com/paul-macartney-kisses-on-the-bottom/bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/paul-macartney-kisses-on-the-bottom/bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/paul-macartney-kisses-on-the-bottom/bensound-betterdays', 33, 50),
(19, 'Alive in Stereo', 'https://mannering.s3.eu-west-2.amazonaws.com/first-class-large-professor/alive-in-stereo.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/first-class-large-professor/alive-in-stereo.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/first-class-large-professor/alive-in-stereo.m4a', 15, 19),
(20, 'Riot Akt', 'https://mannering.s3.eu-west-2.amazonaws.com/ownerz-gangstarr/riot-akt.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/ownerz-gangstarr/riot-akt.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/ownerz-gangstarr/riot-akt.m4a', 16, 20),
(21, 'Walking Through The Darkness', 'https://mannering.s3.eu-west-2.amazonaws.com/bulletproof-wallets-ghostface/walking-through-the-darkness.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/bulletproof-wallets-ghostface/walking-through-the-darkness.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/bulletproof-wallets-ghostface/walking-through-the-darkness.m4a', 5, 21),
(22, 'No Ideas Original', 'https://mannering.s3.eu-west-2.amazonaws.com/lost-tapes-nas/no-ideas-original.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/lost-tapes-nas/no-ideas-original.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/lost-tapes-nas/no-ideas-original.m4a', 20, 25),
(23, 'bensound-acousticbreeze', 'https://mannering.s3.eu-west-2.amazonaws.com/the-band-perry/bensound-acousticbreeze.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/the-band-perry/bensound-acousticbreeze.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/the-band-perry/bensound-acousticbreeze.m4a', 35, 53),
(24, 'Back in the game', 'https://mannering.s3.eu-west-2.amazonaws.com/eight-diagrams-wu-tang-clan/back-in-the-game.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/eight-diagrams-wu-tang-clan/back-in-the-game.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/eight-diagrams-wu-tang-clan/back-in-the-game.m4a', 2, 2),
(25, 'bensound-cute', 'https://mannering.s3.eu-west-2.amazonaws.com/ben-tankard-full-tank/bensound-cute.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/ben-tankard-full-tank/bensound-cute.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/ben-tankard-full-tank/bensound-cute.m4a', 46, 66),
(26, 'The sound of revenge', 'https://mannering.s3.eu-west-2.amazonaws.com/chamillionaire-riding/the-sound-of-revenge.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/chamillionaire-riding/the-sound-of-revenge.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/chamillionaire-riding/the-sound-of-revenge.mp3', 3, 3),
(27, 'bensound-buddy', 'https://mannering.s3.eu-west-2.amazonaws.com/chris-botti-impressions/bensound-buddy.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/chris-botti-impressions/bensound-buddy.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/chris-botti-impressions/bensound-buddy.m4a', 32, 50),
(28, 'Pyrex Vision', 'https://mannering.s3.eu-west-2.amazonaws.com/fishscale-ghostface/pyrex-vision.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/fishscale-ghostface/pyrex-vision.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/fishscale-ghostface/pyrex-vision.m4a', 5, 5),
(29, 'Stay strong', 'https://mannering.s3.eu-west-2.amazonaws.com/hi-tek-high-technology-two/stay-strong.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/hi-tek-high-technology-two/stay-strong.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/hi-tek-high-technology-two/stay-strong.m4a', 1, 1),
(30, 'Track 6', 'https://mannering.s3.eu-west-2.amazonaws.com/jedi-mind-tricks/Track6.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/jedi-mind-tricks/Track6.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/jedi-mind-tricks/Track6.m4a', 6, 6),
(31, 'bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/lady-antebellum-own-the-night/bensound-betterdays.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/lady-antebellum-own-the-night/bensound-betterdays.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/lady-antebellum-own-the-night/bensound-betterdays.m4a', 39, 57),
(32, 'bensound-cute', 'https://mannering.s3.eu-west-2.amazonaws.com/lady-antebellum-own-the-night/bensound-cute.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/lady-antebellum-own-the-night/bensound-cute.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/lady-antebellum-own-the-night/bensound-cute.m4a', 39, 57),
(33, 'let-my-niggas-live', 'https://mannering.s3.eu-west-2.amazonaws.com/w-wu-tang-clan/let-my-niggas-live.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/w-wu-tang-clan/let-my-niggas-live.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/w-wu-tang-clan/let-my-niggas-live.m4a', 2, 35),
(34, 'bensound-buddy', 'https://mannering.s3.eu-west-2.amazonaws.com/my-kind-party-jason-aldean/bensound-buddy.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/my-kind-party-jason-aldean/bensound-buddy.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/my-kind-party-jason-aldean/bensound-buddy.m4a', 38, 56),
(35, 'bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/paul-macartney-kisses-on-the-bottom/bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/paul-macartney-kisses-on-the-bottom/bensound-betterdays', 'https://mannering.s3.eu-west-2.amazonaws.com/paul-macartney-kisses-on-the-bottom/bensound-betterdays', 33, 51),
(36, 'bensound-buddy', 'https://mannering.s3.eu-west-2.amazonaws.com/paul-macartney-kisses-on-the-bottom/bensound-buddy.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/paul-macartney-kisses-on-the-bottom/bensound-buddy.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/paul-macartney-kisses-on-the-bottom/bensound-buddy.m4a', 33, 51),
(37, 'Freedom of speech', 'https://mannering.s3.eu-west-2.amazonaws.com/revolutionary-part-two-immortal-technique/freedom-of-speech.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/revolutionary-part-two-immortal-technique/freedom-of-speech.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/revolutionary-part-two-immortal-technique/freedom-of-speech.m4a', 4, 4),
(38, 'bensound-buddy', 'https://mannering.s3.eu-west-2.amazonaws.com/robert-glasper-black-radio/bensound-buddy.mp3', 'https://mannering.s3.eu-west-2.amazonaws.com/robert-glasper-black-radio/bensound-buddy.ogg', 'https://mannering.s3.eu-west-2.amazonaws.com/robert-glasper-black-radio/bensound-buddy.mm4a', 30, 48);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorId` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permissions` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorId`, `username`, `email`, `password`, `permissions`) VALUES
(1, 'raymond', 'ray_thomp@hushmail.com', 'jjjjjjjjjjjjjjjjjjjjjjjj', 16),
(9, 'Peter', 'peter@gmail.com', '$2y$10$zqUmJ4jXGJDcEtcsA4bgAeK2yXYRX9C8VwrouvZg/T5q7rZfhHOOW', 16),
(10, 'Simon', 'simon@gmail.com', '$2y$10$cFXRR.jpFSqM8bq/gp.uP.FVSr5jeSfpWe/9NGqnACibDJ/TkV8hG', 32);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoriesId` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoriesId`, `name`) VALUES
(2, 'Old School Hip Hop'),
(3, 'Gangster Rap'),
(8, 'Neo Jazz'),
(9, 'Country');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreid` int(11) NOT NULL,
  `genre` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreid`, `genre`) VALUES
(1, 'Hip Hop'),
(2, 'Country'),
(3, 'Jazz');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewsId` int(11) NOT NULL,
  `reviewtext` varchar(255) DEFAULT NULL,
  `reviewdate` date DEFAULT NULL,
  `authorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewsId`, `reviewtext`, `reviewdate`, `authorId`) VALUES
(2, 'I liked this one', '2019-12-03', 1),
(3, 'I did not like this one', '2019-12-03', 9);

-- --------------------------------------------------------

--
-- Table structure for table `reviews_categories`
--

CREATE TABLE `reviews_categories` (
  `reviewsId` int(11) NOT NULL,
  `categoriesId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews_categories`
--

INSERT INTO `reviews_categories` (`reviewsId`, `categoriesId`) VALUES
(2, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videoid` int(3) NOT NULL,
  `video_artist` varchar(50) NOT NULL,
  `video_title` varchar(100) NOT NULL,
  `video_link` varchar(100) NOT NULL,
  `video_genre` varchar(20) NOT NULL,
  `video_image` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videoid`, `video_artist`, `video_title`, `video_link`, `video_genre`, `video_image`) VALUES
(1, 'Kendrick-Lamar', 'Bitch-Dont-Kill-My-Vibe', 'http://www.youtube.com/embed/GF8aaTu2kg0', 'Hip Hop', 'hiphop1.jpg'),
(2, '50-Cent', 'Hold-On', 'http://www.youtube.com/embed/lyJk0SwqKj8', 'Hip Hop', 'hiphop2.jpg'),
(3, 'TI', 'About-The-Money-ft-Young-Thug', 'http://www.youtube.com/embed/etfIdtm-OC8', 'Hip Hop', 'hiphop3.jpg'),
(4, 'Big-Sean', 'Blessings-Explicit-ft-Drake-Kanye-West', 'http://www.youtube.com/embed/M6t47RI4bns', 'Hip Hop', 'hiphop4.jpg'),
(5, 'French-Montana', 'Bad-B_tch-ft_Jeremih', 'http://www.youtube.com/embed/2yfjYdRWd5E', 'Hip Hop', 'hiphop5.jpg'),
(6, 'Eminem', 'Guts-Over-Fear-ft-Sia', 'http://www.youtube.com/embed/0AqnCSdkjQ0', 'Hip Hop', 'hiphop6.jpg'),
(7, 'Nicki-Minaj', 'Only-ft_Drake-Lil-Wayne-Chris-Brown', 'http://www.youtube.com/embed/zXtsGAkyeIo', 'Hip Hop', 'hiphop7.jpg'),
(8, 'Rick-Ross', 'Keep-Doin-That-Rich-itch-Explicit-ft-R-Kelly', 'http://www.youtube.com/embed/6CR2htpxB90', 'Hip Hop', 'hiphop8.jpg'),
(9, 'Raekwon', 'New-Wu-feat_Method-Man--Ghostface-Killah', 'http://www.youtube.com/embed/jcNufjWI6Rg', 'Hip Hop', 'hiphop9.jpg'),
(10, 'Rob-Base-DJ-EZ-Rock', 'It-Takes-Two', 'http://www.youtube.com/embed/phOW-CZJWT0', 'Hip Hop', 'hiphop10.jpg'),
(11, 'Tony-Bennett-Amy-Winehouse', 'Body-and-Soul', 'http://www.youtube.com/embed/_OFMkCeP6ok', 'Jazz', 'jazz1.jpg'),
(12, 'Robert-Glasper', 'Experiment-Calls-ft-Jill-Scott', 'http://www.youtube.com/embed/e6NjqujEy1o', 'Jazz', 'jazz2.jpg'),
(13, 'Duke-Ellington', 'Take-the-A-Train', 'http://www.youtube.com/embed/cb2w2m1JmCY', 'Jazz', 'jazz3.jpg'),
(14, 'Mop-Mop', 'So-High', 'http://www.youtube.com/embed/Qj0o22ClDTU', 'Jazz', 'jazz4.jpg'),
(15, 'Alcohol-Jazz', 'S_W_A_T', 'http://www.youtube.com/embed/faXNL5FpWFg', 'Jazz', 'jazz5.jpg'),
(16, 'Tony-Bennett-Lady-Gaga', 'The-Lady-is-a-Tramp', 'http://www.youtube.com/embed/ZPAmDULCVrU', 'Jazz', 'jazz6.jpg'),
(17, 'Amy-Winehouse', 'Rehab', 'http://www.youtube.com/embed/KUmZp8pR1uc', 'Jazz', 'jazz7.jpg'),
(18, 'Soweto-Kinch', 'Trio', 'http://www.youtube.com/embed/2VCpd5ooTl8', 'Jazz', 'jazz8.jpg'),
(19, 'Amy-Winehouse', 'Back-To-Black', 'http://www.youtube.com/embed/TJAfLE39ZZ8', 'Jazz', 'jazz9.jpg'),
(20, 'Sam-Hunt', 'Take-Your-Time', 'http://www.youtube.com/embed/iXi6IHFHeIA', 'Country', 'country1.jpg'),
(21, 'Florida-Georgia-Line', 'Sippin-On-Fire', 'http://www.youtube.com/embed/KllQ8e9Ae0w', 'Country', 'country2.jpg'),
(22, 'Little-Big', 'Girl-Crush', 'http://www.youtube.com/embed/JYZMT8otKdI', 'Country', 'country3.jpg'),
(23, 'Taylor-Swift', 'Everything-Has-hanged-ft-Ed-Sheeran', 'http://www.youtube.com/embed/w1oM3kQpXRo', 'Country', 'country4.jpg'),
(24, 'Dierks-Bentley', 'Say-You-Do', 'http://www.youtube.com/embed/4xpr1fLqEj4', 'Country', 'country5.jpg'),
(25, 'Keith-Urban', 'Somebody-Like-You', 'http://www.youtube.com/embed/eiBinM-f-Pk', 'Country', 'country6.jpg'),
(26, 'Carrie-Underwood', 'Little-Toy-Guns', 'http://www.youtube.com/embed/kxOYvI0pfLo', 'Country', 'country7.jpg'),
(27, 'Lionel-Richie-feat-Jennifer-Nettles', 'Hello', 'http://www.youtube.com/embed/MgJ7v8D8iFE', 'Country', 'country8.jpg'),
(28, 'Jake-Owen', 'What-We-Ain\'t-Got', 'http://www.youtube.com/embed/GGQmKA15VCk', 'Country', 'country9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`audioid`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoriesId`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewsId`);

--
-- Indexes for table `reviews_categories`
--
ALTER TABLE `reviews_categories`
  ADD PRIMARY KEY (`reviewsId`,`categoriesId`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `audioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genreid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videoid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
