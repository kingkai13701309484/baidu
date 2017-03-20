-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-03-20 12:51:24
-- 服务器版本： 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ps`
--

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `newsid` int(11) NOT NULL,
  `newstitle` varchar(100) NOT NULL,
  `newsimg` varchar(200) NOT NULL,
  `newstext` text NOT NULL,
  `newsdate` date NOT NULL,
  `navdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate`, `navdate`) VALUES
(68, '沟通越多，越难以沟通？|青山冷思考？', './bootstarp/images/img.jpg', '7小时前', '2016-06-03', 1),
(70, '“田朴珺撩汉往事”被刷屏，深八田小姐“独立”之路', './bootstarp/images/img1.jpg', '7天前', '2016-07-03', 1),
(71, '屌丝经济的风口为何停了？“幸福科技”将是下一站!', './bootstarp/images/img2.jpg', '1天前', '2016-07-04', 1),
(72, '华为若要做操作系统：到底有多难？', './bootstarp/images/img3.jpg', '2天前', '2016-07-05', 1),
(73, '“情怀帝”委身阿里，罗永浩恐怕得像星巴克取经', './bootstarp/images/img4.jpg', '3天前', '2016-07-06', 1),
(74, '乐视生态是天才构想还是赤壁连环船？', './bootstarp/images/img5.jpg', '3天前', '2016-07-07', 1),
(75, '谷歌欲推新机再破“基因论”，硬件梦得行吗？', './bootstarp/images/img6.jpg', '4天前', '2016-07-08', 1),
(76, '《余罪2》bug多遭质疑，改编不易难跳出死穴', './bootstarp/images/img7.jpg', '5天前', '2016-07-09', 1),
(77, '3个企业家的故事反思王石危机', './bootstarp/images/img8.jpg', '7天前', '2016-07-10', 1),
(130, '你好呀', './bootstarp/images/img9.jpg', '6小时前', '2016-07-11', 1),
(131, '我不好', './bootstarp/images/img10.jpg', '10小时前', '2016-10-01', 2),
(133, '此聪售出', './bootstarp/images/img12.jpg', '涅米', '2016-10-03', 2),
(134, '我上档次', './bootstarp/images/img13.jpg', '嗯嗯', '2016-10-04', 2),
(135, '对方送调查', './bootstarp/images/img14.jpg', '但是是从事', '2016-10-05', 2),
(136, '骚啊死啊', './bootstarp/images/img15.jpg', '是脑袋撒', '2016-10-07', 2),
(137, '为我哦额哦分', './bootstarp/images/img16.jpg', '俄文番外篇', '2016-10-06', 2),
(138, '呢风味哦晚饭', './bootstarp/images/img17.jpg', '可撒摩擦', '2016-10-08', 2),
(139, '我敬佩的分', './bootstarp/images/img18.jpg', '饿到没味道', '2016-10-09', 2),
(140, '发我发喷雾s', './bootstarp/images/img19.jpg', '俄方违法物品ff', '2017-01-01', 2);

-- --------------------------------------------------------

--
-- 表的结构 `user1`
--

CREATE TABLE `user1` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='登录';

--
-- 转存表中的数据 `user1`
--

INSERT INTO `user1` (`userid`, `username`, `password`, `token`) VALUES
(1, 'king', '123456', 374689215);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsid`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`userid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- 使用表AUTO_INCREMENT `user1`
--
ALTER TABLE `user1`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
