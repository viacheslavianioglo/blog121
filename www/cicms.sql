-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 29 2016 г., 13:13
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cicms`
--
CREATE DATABASE cicms;
USE cicms;

-- --------------------------------------------------------

--
-- Структура таблицы `ci_categories`
--

CREATE TABLE IF NOT EXISTS `ci_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `ci_categories`
--

INSERT INTO `ci_categories` (`category_id`, `name`, `desc`) VALUES
(2, 'Cat1', 'Last news about cat 1'),
(5, 'Cat2', 'Last news about cat 2'),
(6, 'Cat33', 'Last news about cat 33');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_comments`
--

CREATE TABLE IF NOT EXISTS `ci_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `ci_comments`
--

INSERT INTO `ci_comments` (`comment_id`, `text`, `date`, `page_id`, `user_id`) VALUES
(1, 'k,hjgegdfgfdgdfgdfgdfgdfgdf', 1454687155, 1, 2),
(2, 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 1454688878, 1, 2),
(3, 'You need away of passing validation_errors() back to your Posts controller. At the minute, when you perform the redirect in your add function (when the validation fails), you loose the validation errors thrown.', 1454690012, 1, 4),
(4, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvxccccccccccccccccccccccccc', 1454923743, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `ci_images`
--

CREATE TABLE IF NOT EXISTS `ci_images` (
  `image_id` varchar(250) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `originfilename` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `image_id` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_images`
--

INSERT INTO `ci_images` (`image_id`, `filename`, `originfilename`, `user_id`) VALUES
('48ce0eac23865956f59a1518b5f55a97', '48ce0eac23865956f59a1518b5f55a97.png', '3.png', 3),
('6fce37217d72d66dbed15d55dfd3b295', '6fce37217d72d66dbed15d55dfd3b295.png', '1.png', 2),
('784483916a52375e24b8531577eb400b', '784483916a52375e24b8531577eb400b.jpg', '8aad10fcceec4be88748ff988d58fd751.jpg', 2),
('7f43918b250d3fb977252128f67974ae', '7f43918b250d3fb977252128f67974ae.png', '2.png', 2),
('aac813c3604ecdd67b45c42006971797', 'aac813c3604ecdd67b45c42006971797.jpg', '7.jpg', 4),
('b6064092531b9cdd8ba8d4584d22ac4b', 'b6064092531b9cdd8ba8d4584d22ac4b.jpg', 'drupal-mini-logo1.jpg', 2),
('d6f8465948d91def181d44cf6df90a83', 'd6f8465948d91def181d44cf6df90a83.jpg', 'r-mini-logo1.jpg', 2),
('da39a96c28ecae087076bbf5a17f974b', 'da39a96c28ecae087076bbf5a17f974b.jpg', '5.jpg', 4),
('f6091e965d6f85cbcbc19a8cb86b2243', 'f6091e965d6f85cbcbc19a8cb86b2243.jpg', '4.jpg', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `ci_links`
--

CREATE TABLE IF NOT EXISTS `ci_links` (
  `link_id` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_links`
--

INSERT INTO `ci_links` (`link_id`, `desc`, `url`, `clicks`) VALUES
('mil09', 'sweet milk11', 'http://sweetmilk.com', 2),
('mil10', 'sweetmilk.com', 'http://sweetmilk.com', 0),
('mil11', 'sweetmilk.com', 'http://sweetmilk.com', 0),
('mil12', 'sweetmilk.com', 'http://sweetmilk.com', 0),
('mil13', 'a-sweetmilk.com', 'http://sweetmilk.com', 0),
('mil99', 'Very big link', 'http://aaa.com', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ci_pages`
--

CREATE TABLE IF NOT EXISTS `ci_pages` (
  `page_id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `showed` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `previews` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`),
  FULLTEXT KEY `text` (`text`),
  FULLTEXT KEY `text_2` (`text`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `ci_pages`
--

INSERT INTO `ci_pages` (`page_id`, `title`, `text`, `date`, `showed`, `user_id`, `category_id`, `previews`) VALUES
(1, 'Page title 1 (user1)', '<p class="intro">PHP scripts are executed on the server.</p>\n<hr />\n<h2>What You Should Already Know</h2>\n<p>Before you continue you should have a basic understanding of the following:</p>\n<ul>\n<li>HTML</li>\n<li>CSS</li>\n<li>JavaScript</li>\n</ul>\n<p>If you want to study these subjects first, find the tutorials on our <a href="http://www.w3schools.com/default.asp">Home page</a>.</p>\n<hr />\n<h2>What is PHP?</h2>\n<ul>\n<li>PHP is an acronym for "PHP: Hypertext Preprocessor"</li>\n<li>PHP is a widely-used, open source scripting language</li>\n<li>PHP scripts are executed on the server</li>\n<li>PHP is free to download and use</li>\n</ul>\n<table id="table1" class="lamp">\n<tbody>\n<tr>\n<th><img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" /></th>\n<td><strong>PHP is an amazing and popular language!</strong><br /><br />It is powerful enough to be at the core of the biggest blogging system on the web (WordPress)!<br />It is deep enough to run the largest social network (Facebook)!<br />It is also easy enough to be a beginner''s first server side language!</td>\n</tr>\n</tbody>\n</table>\n<hr />\n<h2>What is a PHP File?</h2>\n<ul>\n<li>PHP files can contain text, HTML, CSS, JavaScript, and PHP code</li>\n<li>PHP code are executed on the server, and the result is returned to the browser as plain HTML</li>\n<li>PHP files have extension ".php"</li>\n</ul>\n<hr />\n<h2>What Can PHP Do?</h2>\n<ul>\n<li>PHP can generate dynamic page content</li>\n<li>PHP can create, open, read, write, delete, and close files on the server</li>\n<li>PHP can collect form data</li>\n<li>PHP can send and receive cookies</li>\n<li>PHP can add, delete, modify data in your database</li>\n<li>PHP can be used to control user-access</li>\n<li>PHP can encrypt data</li>\n</ul>\n<p>With PHP you are not limited to output HTML. You can output images, PDF files, and even Flash movies. You can also output any text, such as XHTML and XML.</p>\n<hr />\n<h2>Why PHP?</h2>\n<ul>\n<li>PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.)</li>\n<li>PHP is compatible with almost all servers used today (Apache, IIS, etc.)</li>\n<li>PHP supports a wide range of databases</li>\n<li>PHP is free. Download it from the official PHP resource: <a href="http://www.php.net/" target="_blank">www.php.net</a></li>\n<li>PHP is easy to learn and runs efficiently on the server side</li>\n</ul>\n<p><img src="/img/6fce37217d72d66dbed15d55dfd3b295.png" alt="1.png" /></p>', 1454663101, 1, 2, 2, 72),
(2, 'Page title 2 (user1)', '<p class="intro">PHP scripts are executed on the server.</p>\r\n<hr />\r\n<h2>What You Should Already Know</h2>\r\n<p>Before you continue you should have a basic understanding of the following:</p>\r\n<ul>\r\n<li>HTML</li>\r\n<li>CSS</li>\r\n<li>JavaScript</li>\r\n</ul>\r\n<p>If you want to study these subjects first, find the tutorials on our <a href="http://www.w3schools.com/default.asp">Home page</a>.</p>\r\n<hr />\r\n<h2>What is PHP?</h2>\r\n<ul>\r\n<li>PHP is an acronym for "PHP: Hypertext Preprocessor"</li>\r\n<li>PHP is a widely-used, open source scripting language</li>\r\n<li>PHP scripts are executed on the server</li>\r\n<li>PHP is free to download and use</li>\r\n</ul>\r\n<table id="table1" class="lamp">\r\n<tbody>\r\n<tr>\r\n<th><img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" /></th>\r\n<td><strong>PHP is an amazing and popular language!</strong><br /><br />It is powerful enough to be at the core of the biggest blogging system on the web (WordPress)!<br />It is deep enough to run the largest social network (Facebook)!<br />It is also easy enough to be a beginner''s first server side language!</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr />\r\n<h2>What is a PHP File?</h2>\r\n<ul>\r\n<li>PHP files can contain text, HTML, CSS, JavaScript, and PHP code</li>\r\n<li>PHP code are executed on the server, and the result is returned to the browser as plain HTML</li>\r\n<li>PHP files have extension ".php"</li>\r\n</ul>\r\n<hr />\r\n<h2>What Can PHP Do?</h2>\r\n<ul>\r\n<li>PHP can generate dynamic page content</li>\r\n<li>PHP can create, open, read, write, delete, and close files on the server</li>\r\n<li>PHP can collect form data</li>\r\n<li>PHP can send and receive cookies</li>\r\n<li>PHP can add, delete, modify data in your database</li>\r\n<li>PHP can be used to control user-access</li>\r\n<li>PHP can encrypt data</li>\r\n</ul>\r\n<p>With PHP you are not limited to output HTML. You can output images, PDF files, and even Flash movies. You can also output any text, such as XHTML and XML.</p>\r\n<hr />\r\n<h2>Why PHP?</h2>\r\n<ul>\r\n<li>PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.)</li>\r\n<li>PHP is compatible with almost all servers used today (Apache, IIS, etc.)</li>\r\n<li>PHP supports a wide range of databases</li>\r\n<li>PHP is free. Download it from the official PHP resource: <a href="http://www.php.net/" target="_blank">www.php.net</a></li>\r\n<li>PHP is easy to learn and runs efficiently on the server side</li>\r\n</ul>\r\n<p><img src="/img/7f43918b250d3fb977252128f67974ae.png" alt="2.png" /></p>', 1454663164, 1, 2, 5, 12),
(3, 'Page title 3 (user2)', '<p class="intro">PHP scripts are executed on the server.</p>\r\n<hr />\r\n<h2>What You Should Already Know</h2>\r\n<p>Before you continue you should have a basic understanding of the following:</p>\r\n<ul>\r\n<li>HTML</li>\r\n<li>CSS</li>\r\n<li>JavaScript</li>\r\n</ul>\r\n<p>If you want to study these subjects first, find the tutorials on our <a href="http://www.w3schools.com/default.asp">Home page</a>.</p>\r\n<hr />\r\n<h2>What is PHP?</h2>\r\n<ul>\r\n<li>PHP is an acronym for "PHP: Hypertext Preprocessor"</li>\r\n<li>PHP is a widely-used, open source scripting language</li>\r\n<li>PHP scripts are executed on the server</li>\r\n<li>PHP is free to download and use</li>\r\n</ul>\r\n<table id="table1" class="lamp">\r\n<tbody>\r\n<tr>\r\n<th><img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" /></th>\r\n<td><strong>PHP is an amazing and popular language!</strong><br /><br />It is powerful enough to be at the core of the biggest blogging system on the web (WordPress)!<br />It is deep enough to run the largest social network (Facebook)!<br />It is also easy enough to be a beginner''s first server side language!</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr />\r\n<h2>What is a PHP File?</h2>\r\n<ul>\r\n<li>PHP files can contain text, HTML, CSS, JavaScript, and PHP code</li>\r\n<li>PHP code are executed on the server, and the result is returned to the browser as plain HTML</li>\r\n<li>PHP files have extension ".php"</li>\r\n</ul>\r\n<hr />\r\n<h2>What Can PHP Do?</h2>\r\n<ul>\r\n<li>PHP can generate dynamic page content</li>\r\n<li>PHP can create, open, read, write, delete, and close files on the server</li>\r\n<li>PHP can collect form data</li>\r\n<li>PHP can send and receive cookies</li>\r\n<li>PHP can add, delete, modify data in your database</li>\r\n<li>PHP can be used to control user-access</li>\r\n<li>PHP can encrypt data</li>\r\n</ul>\r\n<p>With PHP you are not limited to output HTML. You can output images, PDF files, and even Flash movies. You can also output any text, such as XHTML and XML.</p>\r\n<hr />\r\n<h2>Why PHP?</h2>\r\n<ul>\r\n<li>PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.)</li>\r\n<li>PHP is compatible with almost all servers used today (Apache, IIS, etc.)</li>\r\n<li>PHP supports a wide range of databases</li>\r\n<li>PHP is free. Download it from the official PHP resource: <a href="http://www.php.net/" target="_blank">www.php.net</a></li>\r\n<li>PHP is easy to learn and runs efficiently on the server side</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><img src="/img/48ce0eac23865956f59a1518b5f55a97.png" alt="3.png" /></p>', 1454663296, 1, 3, 2, 21),
(4, 'Page title 4 (user2)', '<p class="intro">PHP scripts are executed on the server.</p>\r\n<hr />\r\n<h2>What You Should Already Know</h2>\r\n<p>Before you continue you should have a basic understanding of the following:</p>\r\n<ul>\r\n<li>HTML</li>\r\n<li>CSS</li>\r\n<li>JavaScript</li>\r\n</ul>\r\n<p>If you want to study these subjects first, find the tutorials on our <a href="http://www.w3schools.com/default.asp">Home page</a>.</p>\r\n<hr />\r\n<h2>What is PHP?</h2>\r\n<ul>\r\n<li>PHP is an acronym for "PHP: Hypertext Preprocessor"</li>\r\n<li>PHP is a widely-used, open source scripting language</li>\r\n<li>PHP scripts are executed on the server</li>\r\n<li>PHP is free to download and use</li>\r\n</ul>\r\n<table id="table1" class="lamp">\r\n<tbody>\r\n<tr>\r\n<th><img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" /></th>\r\n<td><strong>PHP is an amazing and popular language!</strong><br /><br />It is powerful enough to be at the core of the biggest blogging system on the web (WordPress)!<br />It is deep enough to run the largest social network (Facebook)!<br />It is also easy enough to be a beginner''s first server side language!</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr />\r\n<h2>What is a PHP File?</h2>\r\n<ul>\r\n<li>PHP files can contain text, HTML, CSS, JavaScript, and PHP code</li>\r\n<li>PHP code are executed on the server, and the result is returned to the browser as plain HTML</li>\r\n<li>PHP files have extension ".php"</li>\r\n</ul>\r\n<hr />\r\n<h2>What Can PHP Do?</h2>\r\n<ul>\r\n<li>PHP can generate dynamic page content</li>\r\n<li>PHP can create, open, read, write, delete, and close files on the server</li>\r\n<li>PHP can collect form data</li>\r\n<li>PHP can send and receive cookies</li>\r\n<li>PHP can add, delete, modify data in your database</li>\r\n<li>PHP can be used to control user-access</li>\r\n<li>PHP can encrypt data</li>\r\n</ul>\r\n<p>With PHP you are not limited to output HTML. You can output images, PDF files, and even Flash movies. You can also output any text, such as XHTML and XML.</p>\r\n<hr />\r\n<h2>Why PHP?</h2>\r\n<ul>\r\n<li>PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.)</li>\r\n<li>PHP is compatible with almost all servers used today (Apache, IIS, etc.)</li>\r\n<li>PHP supports a wide range of databases</li>\r\n<li>PHP is free. Download it from the official PHP resource: <a href="http://www.php.net/" target="_blank">www.php.net</a></li>\r\n<li>PHP is easy to learn and runs efficiently on the server side</li>\r\n</ul>\r\n<p><img src="/img/f6091e965d6f85cbcbc19a8cb86b2243.jpg" alt="4.jpg" /></p>', 1454663366, 1, 3, 6, 9),
(5, 'Page title 5 (user3)', '<p class="intro">PHP scripts are executed on the server.</p>\r\n<hr />\r\n<h2>What You Should Already Know</h2>\r\n<p>Before you continue you should have a basic understanding of the following:</p>\r\n<ul>\r\n<li>HTML</li>\r\n<li>CSS</li>\r\n<li>JavaScript</li>\r\n</ul>\r\n<p>If you want to study these subjects first, find the tutorials on our <a href="http://www.w3schools.com/default.asp">Home page</a>.</p>\r\n<hr />\r\n<h2>What is PHP?</h2>\r\n<ul>\r\n<li>PHP is an acronym for "PHP: Hypertext Preprocessor"</li>\r\n<li>PHP is a widely-used, open source scripting language</li>\r\n<li>PHP scripts are executed on the server</li>\r\n<li>PHP is free to download and use</li>\r\n</ul>\r\n<table id="table1" class="lamp">\r\n<tbody>\r\n<tr>\r\n<th><img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" /></th>\r\n<td><strong>PHP is an amazing and popular language!</strong><br /><br />It is powerful enough to be at the core of the biggest blogging system on the web (WordPress)!<br />It is deep enough to run the largest social network (Facebook)!<br />It is also easy enough to be a beginner''s first server side language!</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr />\r\n<h2>What is a PHP File?</h2>\r\n<ul>\r\n<li>PHP files can contain text, HTML, CSS, JavaScript, and PHP code</li>\r\n<li>PHP code are executed on the server, and the result is returned to the browser as plain HTML</li>\r\n<li>PHP files have extension ".php"</li>\r\n</ul>\r\n<hr />\r\n<h2>What Can PHP Do?</h2>\r\n<ul>\r\n<li>PHP can generate dynamic page content</li>\r\n<li>PHP can create, open, read, write, delete, and close files on the server</li>\r\n<li>PHP can collect form data</li>\r\n<li>PHP can send and receive cookies</li>\r\n<li>PHP can add, delete, modify data in your database</li>\r\n<li>PHP can be used to control user-access</li>\r\n<li>PHP can encrypt data</li>\r\n</ul>\r\n<p>With PHP you are not limited to output HTML. You can output images, PDF files, and even Flash movies. You can also output any text, such as XHTML and XML.</p>\r\n<hr />\r\n<h2>Why PHP?</h2>\r\n<ul>\r\n<li>PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.)</li>\r\n<li>PHP is compatible with almost all servers used today (Apache, IIS, etc.)</li>\r\n<li>PHP supports a wide range of databases</li>\r\n<li>PHP is free. Download it from the official PHP resource: <a href="http://www.php.net/" target="_blank">www.php.net</a></li>\r\n<li>PHP is easy to learn and runs efficiently on the server side</li>\r\n</ul>\r\n<p><img src="/img/aac813c3604ecdd67b45c42006971797.jpg" alt="7.jpg" /></p>', 1454663560, 1, 4, 5, 3),
(6, 'Page title 6 (user3)', '<p class="intro">PHP scripts are executed on the server.</p>\n<hr />\n<h2>What You Should Already Know</h2>\n<p>Before you continue you should have a basic understanding of the following:</p>\n<ul>\n<li>HTML</li>\n<li>CSS</li>\n<li>JavaScript</li>\n</ul>\n<p>If you want to study these subjects first, find the tutorials on our <a href="http://www.w3schools.com/default.asp">Home page</a>.</p>\n<hr />\n<h2>What is PHP?</h2>\n<ul>\n<li>PHP is an acronym for "PHP: Hypertext Preprocessor"</li>\n<li>PHP is a widely-used, open source scripting language</li>\n<li>PHP scripts are executed on the server</li>\n<li>PHP is free to download and use</li>\n</ul>\n<table id="table1" class="lamp">\n<tbody>\n<tr>\n<th><img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" /></th>\n<td><strong>PHP is an amazing and popular language!</strong><br /><br />It is powerful enough to be at the core of the biggest blogging system on the web (WordPress)!<br />It is deep enough to run the largest social network (Facebook)!<br />It is also easy enough to be a beginner''s first server side language!</td>\n</tr>\n</tbody>\n</table>\n<hr />\n<h2>What is a PHP File?</h2>\n<ul>\n<li>PHP files can contain text, HTML, CSS, JavaScript, and PHP code</li>\n<li>PHP code are executed on the server, and the result is returned to the browser as plain HTML</li>\n<li>PHP files have extension ".php"</li>\n</ul>\n<hr />\n<h2>What Can PHP Do?</h2>\n<ul>\n<li>PHP can generate dynamic page content</li>\n<li>PHP can create, open, read, write, delete, and close files on the server</li>\n<li>PHP can collect form data</li>\n<li>PHP can send and receive cookies</li>\n<li>PHP can add, delete, modify data in your database</li>\n<li>PHP can be used to control user-access</li>\n<li>PHP can encrypt data</li>\n</ul>\n<p>With PHP you are not limited to output HTML. You can output images, PDF files, and even Flash movies. You can also output any text, such as XHTML and XML.</p>\n<hr />\n<h2>Why PHP?</h2>\n<ul>\n<li>PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.)</li>\n<li>PHP is compatible with almost all servers used today (Apache, IIS, etc.)</li>\n<li>PHP supports a wide range of databases</li>\n<li>PHP is free. Download it from the official PHP resource: <a href="http://www.php.net/" target="_blank">www.php.net</a></li>\n<li>PHP is easy to learn and runs efficiently on the server side</li>\n</ul>\n<p>&nbsp;</p>\n<p><img src="/img/da39a96c28ecae087076bbf5a17f974b.jpg" alt="5.jpg" /></p>', 1454663596, 1, 4, 6, 11),
(8, 'Drupal Tutorial', '<p>Drupal is a free and open source Content Management System (CMS) that allows organizing, managing and publishing your content. It is built on PHP based environments. This is carried out under GNU i.e. General Public Licence, that means everyone have a freedom of downloading and sharing it to others. This tutorial will teach you the basics of Drupal using which you can create websites with ease.</p>\n<h1>Audience</h1>\n<p>This tutorial has been prepared for anyone who has a basic knowledge of HTML and CSS and has an urge to develop websites. After completing this tutorial you will find yourself at a moderate level of expertise in developing websites using Drupal.</p>\n<h1>Prerequisites</h1>\n<p>Before you start proceeding with this tutorial, we are assuming that you are already aware about the basics of HTML and CSS. If you are not well aware of these concepts, then we will suggest you to go through our short tutorials on HTML and CSS.</p>\n<p>&nbsp;</p>\n<p><img src="/img/b6064092531b9cdd8ba8d4584d22ac4b.jpg" alt="drupal-mini-logo1.jpg" /></p>', 1455011341, 1, 2, 2, 14),
(9, 'R Tutorial', '<p>R is a programming language and software environment for statistical analysis, graphics representation and reporting. R was created by Ross Ihaka and Robert Gentleman at the University of Auckland, New Zealand, and is currently developed by the R Development Core Team.</p>\r\n<p>R is freely available under the GNU General Public License, and pre-compiled binary versions are provided for various operating systems like Linux, Windows and Mac.</p>\r\n<p>This programming language was named <strong>R</strong> based on the first letter of first name of the two R authors (Robert Gentleman and Ross Ihaka), and partly a play on the name of the Bell Labs language <strong>S</strong>.</p>\r\n<h1>Audience</h1>\r\n<p>This tutorial is designed for software programmers, statisticians and data miners who are looking forward for developing statistical software using R programming. If you are and trying to understand the R programming language as beginners, this tutorial will give you enough understanding on almost all the concepts of the language from where you can take yourself to higher level of expertise.</p>\r\n<h1>Prerequisites</h1>\r\n<p>Before proceeding with this tutorial, you should have a basic understanding of Computer Programming terminologies. A basic understanding of any of the programming languages will help you in understanding the R programming concepts and move fast on the learning track.</p>\r\n<h1>Execute R Online</h1>\r\n<p>For most of the examples given in this tutorial you will find <strong>Try it</strong> option, so just make use of this option to execute your jQuery programs at the spot and enjoy your learning.</p>\r\n<p>Try following example using <strong>Try it</strong> option available at the top right corner of the below sample code box &minus;</p>\r\n<pre class="prettyprint notranslate tryit prettyprinted"><span class="com"># Create data for the graph.</span><span class="pln">\r\nx </span><span class="pun">&lt;-</span><span class="pln"> c</span><span class="pun">(</span><span class="lit">21</span><span class="pun">,</span> <span class="lit">62</span><span class="pun">,</span> <span class="lit">10</span><span class="pun">,</span> <span class="lit">53</span><span class="pun">)</span><span class="pln">\r\nlabels </span><span class="pun">&lt;-</span><span class="pln"> c</span><span class="pun">(</span><span class="str">"London"</span><span class="pun">,</span> <span class="str">"New York"</span><span class="pun">,</span> <span class="str">"Singapore"</span><span class="pun">,</span> <span class="str">"Mumbai"</span><span class="pun">)</span>\r\n\r\n<span class="com"># Give the chart file a name</span><span class="pln">\r\npng</span><span class="pun">(</span><span class="pln">file </span><span class="pun">=</span> <span class="str">"city_title_colours.jpg"</span><span class="pun">)</span>\r\n\r\n<span class="com"># Plot the chart with title and rainbow color pallet</span><span class="pln">\r\npie</span><span class="pun">(</span><span class="pln">x</span><span class="pun">,</span><span class="pln"> labels</span><span class="pun">,</span><span class="pln"> main</span><span class="pun">=</span><span class="str">"City pie chart"</span><span class="pun">,</span><span class="pln"> col</span><span class="pun">=</span><span class="pln">rainbow</span><span class="pun">(</span><span class="pln">length</span><span class="pun">(</span><span class="pln">x</span><span class="pun">)))</span>\r\n\r\n<span class="com"># Save the file</span><span class="pln">\r\ndev</span><span class="pun">.</span><span class="pln">off</span><span class="pun">()<br /><br /><br /><img src="/img/d6f8465948d91def181d44cf6df90a83.jpg" alt="r-mini-logo1.jpg" /></span></pre>', 1455011476, 1, 2, 2, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('45ed430ee01cb9a6028e54d86817ea1957d68286', '127.0.0.1', 1456740738, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363734303732373b63757272656e745f637c733a353a225061676573223b7369647c733a33323a223834656664343464323634616534613430323138373038326566383335343438223b38346566643434643236346165346134303231383730383265663833353434387c733a313a2232223b),
('60e11ead87ac0e90bee80ee86d4e444ac84d3e3b', '127.0.0.1', 1456743793, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363734333730303b63757272656e745f637c733a31333a226163636f756e742f5061676573223b7369647c733a33323a223335353932313238613030336633333037623733663766313533313863346439223b33353539323132386130303366333330376237336637663135333138633464397c733a313a2231223b736f72745f62797c733a31333a2270616765732e757365725f6964223b736f72745f6469727c733a343a2244455343223b),
('612d92aff89d0832f25aa630cbf20b298aa03edd', '127.0.0.1', 1456744189, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363734343036383b63757272656e745f637c733a353a225061676573223b7369647c733a33323a223335353932313238613030336633333037623733663766313533313863346439223b33353539323132386130303366333330376237336637663135333138633464397c733a313a2231223b736561726368706167657c733a363a22547279206974223b),
('c78ea5c135ab178b1b87c788d13eb3cc28fb6729', '127.0.0.1', 1456741603, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363734313430303b63757272656e745f637c733a31333a226163636f756e742f4c756e6974223b7369647c733a33323a223834656664343464323634616534613430323138373038326566383335343438223b38346566643434643236346165346134303231383730383265663833353434387c733a313a2232223b);

-- --------------------------------------------------------

--
-- Структура таблицы `ci_settings`
--

CREATE TABLE IF NOT EXISTS `ci_settings` (
  `param` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`param`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_settings`
--

INSERT INTO `ci_settings` (`param`, `value`) VALUES
('cms_per_page', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_users`
--

CREATE TABLE IF NOT EXISTS `ci_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `avatar` varchar(250) NOT NULL DEFAULT 'http://placehold.it/64x64',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `login` (`login`),
  KEY `login_2` (`login`),
  KEY `login_3` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1250 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `ci_users`
--

INSERT INTO `ci_users` (`user_id`, `login`, `pass`, `role`, `avatar`, `banned`) VALUES
(1, 'admin', 'pass', 'admin', 'http://placehold.it/64x64', 0),
(2, 'user1', 'pass', 'user', 'http://blog121/img/7f43918b250d3fb977252128f67974ae.png', 0),
(3, 'user2', 'pass', 'user', 'http://placehold.it/64x64', 0),
(4, 'user3', 'pass', 'user', 'http://placehold.it/64x64', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
