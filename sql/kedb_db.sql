-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.26 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for eccrm_db
CREATE DATABASE IF NOT EXISTS `eccrm_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `eccrm_db`;


-- Dumping structure for table eccrm_db.article_tb
CREATE TABLE IF NOT EXISTS `article_tb` (
  `article_id` int(5) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `state` varchar(5) NOT NULL,
  `tool` varchar(50) NOT NULL,
  `issue` varchar(1000) NOT NULL,
  `problem` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`article_id`),
  KEY `FK_article_tb_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table eccrm_db.article_tb: ~22 rows (approximately)
DELETE FROM `article_tb`;
/*!40000 ALTER TABLE `article_tb` DISABLE KEYS */;
INSERT INTO `article_tb` (`article_id`, `date`, `user_id`, `emp_name`, `state`, `tool`, `issue`, `problem`, `description`) VALUES
	(1, '2015-12-04', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'GIT', 'A new type of issue', 'Using color to add meaning to a table', 'Using color to add meaning to a table row or individual cell only provides a visual indication, which will not be conveyed to users of assistive technologies such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (the visible text in the relevant table row/cell), or is included through alternative means, such as additional text hidden with the .sr-only class. '),
	(2, '2015-12-04', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'GIT', 'a clear description', 'a clear description about the problem1', 'a clear description about the problem and the followed by the description'),
	(3, '2015-12-04', 'C5032209', 'Ganesh Krishnasamy', 'NY', 'Jenkins', 'New item adding', 'Using color to add meaning to a table row or individual cell only provides ', 'Using color to add meaning to a table row or individual cell only provides a visual indication, which will not be conveyed to users of assistive technologies Ã?Â¢?? such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (the visible text in the relevant table row/cell), or is included through alternative means, such as additional text hidden with the .sr-only class.'),
	(4, '2015-12-04', 'C5032209', 'Ganesh Krishnasamy', 'NY', 'Ant', 'A new type of issue noted', 'problem is registering', '   Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. '),
	(5, '2015-12-04', 'C5032209', 'Ganesh Krishnasamy', 'NY', 'Ant', 'new type of issue', 'The solar energy problem', 'the main source of energy is called the solar energy'),
	(6, '2015-12-04', 'C5032209', 'Ganesh Krishnasamy', 'NY', 'Stash', 'aaa sss ddd', 'Public/css/bootstrap.min.css" release', '<link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet" />   '),
	(7, '2015-12-03', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'Ant', 'New one test', '', 'Easily add a heading container to your panel with .panel-heading. You may also include any <h1>-<h6> with a .panel-title class to add a pre-styled heading. However, the font sizes of <h1>-<h6> are overridden by .panel-heading.\r\n\r\nFor proper link coloring, be sure to place links in headings within .panel-title. '),
	(8, '2015-12-04', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'Stash', 'Problem in Stash', '', 'The Stash user creation is having problem and it needs to be rectified'),
	(9, '2015-12-04', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'Stash', 'Stash error details', 'a anew problem is created', 'CodeIgniter: How To Do a Select (Distinct Fieldname ...\r\nstackoverflow.com/.../codeigniter-how-to-do-a-select-distinct-fieldname-...\r\nMar 18, 2009 - CodeIgniter: How To Do a Select (Distinct Fieldname) MySQL Query ... I\'m trying to retrieve a count of all unique values in a field. Example ... I know I can use $this->db->query() , and write my ow '),
	(10, '2015-12-04', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'GIT', 'Simple test issue', '', 'php - CodeIgniter: How To Do a Select (Distinct Fieldname ...\r\nstackoverflow.com/.../codeigniter-how-to-do-a-select-distinct-fieldname-...\r\nMar 18, 2009 - CodeIgniter: How To Do a Select (Distinct Fieldname) MySQL Query ... I\'m trying to retrieve a count of all unique values in a field. Example ... I know I can use $this->db->query() , and write my ow'),
	(11, '2015-12-05', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'Ant', 'final attempt to test', '', 'Alerts don\'t have default classes, only base and modifier classes. A default gray alert doesn\'t make too much sense, so you\'re required to specify a type via contextual class. Choose from success, info, warning, or danger'),
	(12, '2015-12-05', 'admin123', 'admin', 'CA', 'GIT', 'A new type of issue', '', '  <!-- Jquery JS -->\r\n        <script src="<?=base_url()?>public/js/jquery.js"></script>\r\n		<script src="<?=base_url()?>public/js/jquery-ui.js"></script>'),
	(13, '2015-12-06', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'GIT', 'User Email Configuration', 'Configure the Username and email in stash.', 'To configure the Username and email in stash.\r\n\r\ngit config --local user.name <CID>\r\ngit config --local user.email <email>'),
	(14, '2015-12-08', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'GIT', 'A new type of issue', '', 'SB Admin 2 - Free Bootstrap Admin Theme - Start Bootstrap\r\nstartbootstrap.com/template-overviews/sb-admin-2/\r\nA free Bootstrap admin theme, dashboard, or web application UI. All Start Bootstrap templates are free to download and open source. ... Zac. Any solution found? I really like the sidebar, but it just not working after the page contents are erased.'),
	(15, '2015-12-08', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'GIT', 'A new type of issue', '', 'SB Admin 2 - Free Bootstrap Admin Theme - Start Bootstrap\r\nstartbootstrap.com/template-overviews/sb-admin-2/\r\nA free Bootstrap admin theme, dashboard, or web application UI. All Start Bootstrap templates are free to download and open source. ... Zac. Any solution found? I really like the sidebar, but it just not working after the page contents are erased.'),
	(16, '2015-12-09', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'Stash', 'A new type of issue', 'SB Admin 2 - Free Bootstrap Admin Theme - Start Bootstrap', 'SB Admin 2 - Free Bootstrap Admin Theme - Start Bootstrap\r\nstartbootstrap.com/template-overviews/sb-admin-2/\r\nA free Bootstrap admin theme, dashboard, or web application UI. All Start Bootstrap templates are free to download and open source. ... Zac. Any solution found? I really like the sidebar, but it just not working after the page contents are erased.'),
	(17, '2015-12-01', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'GIT', 'A new type of issue', '', 'SB Admin 2 - Free Bootstrap Admin Theme - Start Bootstrap\r\nstartbootstrap.com/template-overviews/sb-admin-2/\r\nA free Bootstrap admin theme, dashboard, or web application UI. All Start Bootstrap templates are free to download and open source. ... Zac. Any solution found? I really like the sidebar, but it just not working after the page contents are erased.'),
	(18, '2015-12-09', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'GIT', 'A new type of issue', 'div id example and definition', '<div id="error" class="alert alert-danger"></div>\r\n         <div id="success" class="alert alert-success"></div>'),
	(19, '2015-12-17', 'C5032209', 'Ganesh Krishnasamy', 'NY', 'Ant', 'updated git repo', '', 'SB Admin 2 - Free Bootstrap Admin Theme - Start Bootstrap\r\nstartbootstrap.com/template-overviews/sb-admin-2/\r\nA free Bootstrap admin theme, dashboard, or web application UI. All Start Bootstrap templates are free to download and open source. ... Zac. Any solution found? I really like the sidebar, but it just not working after the page contents are erased.'),
	(20, '2015-12-18', 'C5043201', 'Saravanan Santhanam', 'CA', 'Stash', 'aaa sss ddd', '', '                                           \r\n                    SB Admin 2 - Free Bootstrap Admin Theme - Start Bootstrap\r\nstartbootstrap.com/template-overviews/sb-admin-2/\r\nA free Bootstrap admin theme, dashboard, or web application UI. All Start Bootstrap templates are free to download and open source. ... Zac. Any solution found? I really like the sidebar, but it just not working after the page contents are erased.'),
	(21, '2015-12-10', 'C5032209', 'Ganesh Krishnasamy', 'NY', 'Stash', 'sample issue type', 'How to enable excel export on top right of ', 'Jquery datatable - How to enable excel export on top right of ...\r\nstackoverflow.com '),
	(22, '2015-12-16', 'C5032209', 'Ganesh Krishnasamy', 'NY', 'Stash', 'Error in branch creation', '', 'A new branch creation has the following error:\r\n\r\nand it has to be resoved'),
	(23, '2015-12-17', 'C5032209', 'Ganesh Krishnasamy', 'NY', 'GIT', 'A new type of issue', 'A new problem is been registered', 'A new problem is been registered \r\nA new problem is been registered\r\nA new problem is been registered'),
	(24, '2015-12-09', 'C5043200', 'Sakthivel Deivasigamani', 'CA', 'Stash', 'A new type of issue noted', 'Move columns to the right using .col-md-offset-* classes. ', 'Move columns to the right using .col-md-offset-* classes. Move columns to the right using .col-md-offset-* classes. '),
	(25, '2015-12-12', 'C5043200', 'Sakthivel Deivasigamani', 'NY', 'GIT', ' Not able to push an empty directory', 'User was not able to push an empty directory into Stash. ', 'Git tracks only the files, not folders. So we cannot commit and push an empty directory to remote branch. \r\n\r\nWorkaround:\r\ncreate a .file (Ex: .empty) in the directory, commit and push the file. The file won\'t show up in Windows explorer');
/*!40000 ALTER TABLE `article_tb` ENABLE KEYS */;


-- Dumping structure for table eccrm_db.state_tb
CREATE TABLE IF NOT EXISTS `state_tb` (
  `state_id` int(5) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table eccrm_db.state_tb: ~4 rows (approximately)
DELETE FROM `state_tb`;
/*!40000 ALTER TABLE `state_tb` DISABLE KEYS */;
INSERT INTO `state_tb` (`state_id`, `state_name`) VALUES
	(1, 'AK'),
	(2, 'NY'),
	(3, 'ND'),
	(4, 'NH'),
	(5, 'CA');
/*!40000 ALTER TABLE `state_tb` ENABLE KEYS */;


-- Dumping structure for table eccrm_db.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(8) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `state` varchar(5) NOT NULL,
  `email` varchar(75) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table eccrm_db.user: ~5 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `emp_id`, `emp_name`, `username`, `password`, `state`, `email`, `date_added`) VALUES
	(1, 'C5043200', 'Sakthivel Deivasigamani', '', '7c2ca9526b65c7e99072ab0ae5ceab563459d5caef7ac82ba4f5b5a687b3ee1c', 'CA', 'sakthivel.deivasigamani@cognizant.com', '0000-00-00 00:00:00'),
	(2, 'C5032209', 'Ganesh Krishnasamy', '', '33a16a7ccb13f969b05012fad0a6f1c8278938605da50f241e6253794f6ba9e1', 'NY', 'ganesh.k@cognizant.com', '0000-00-00 00:00:00'),
	(3, 'admin123', 'admin', '', '45b43847295c6a6dccf2f4cde6b20aeb45695df7e791c72f9b7059873f7dff28', 'CA', 'admin@admin.com', '0000-00-00 00:00:00'),
	(4, 'C5043201', 'Saravanan Santhanam', '', '33a16a7ccb13f969b05012fad0a6f1c8278938605da50f241e6253794f6ba9e1', 'CA', 'saravanan.santhanam@cognizant.com', '0000-00-00 00:00:00'),
	(5, 'C5043202', 'Aravind Arjunan', '', '33a16a7ccb13f969b05012fad0a6f1c8278938605da50f241e6253794f6ba9e1', 'NY', 'a.aravind@cognizant.com', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
