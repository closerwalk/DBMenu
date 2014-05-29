DBMenu
======

Yii::1.1 DBMenu (A DB Driven CMenu)

Setup Steps:

1. Download widget 
GIT Repository

Download DBMenu.zip from: DBMenu.zip

Extract DBMenu to your extensions folder: e.g. /protected/extensions

2. Create menu tables 
Create the following tables in your database. Note: All SQL files have been provided in db folder of extension.

--
-- Table structure for table `menu`
--
 
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(128) NOT NULL,
  `view` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `linkOption` text NOT NULL,
  `visibility` int(11) NOT NULL,
  `role` varchar(77) NOT NULL,
  `position` int(11) NOT NULL,
  `menu_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;
 
 
 
 
INSERT INTO `menu` (`id`, `label`, `view`, `url`, `linkOption`, `visibility`, `role`, `position`, `menu_group_id`) VALUES
(0, 'Home', '/site/index', '/site/index', 'js:alert();', 1, 'domain_users', 1, 1),
(46, 'Menus', '', '#', '', 1, 'domain_users', 1, 2),
(48, 'Home', '#', '/site/index', 'js:alert($(''#username'').val());', 1, 'domain_users', 0, 2);
--
-- Table structure for table `menugroups`
--
 
CREATE TABLE IF NOT EXISTS `menugroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(77) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
--
-- Table structure for table `submenu`
--
 
CREATE TABLE IF NOT EXISTS `submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(70) NOT NULL,
  `view` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `linkOption` text NOT NULL,
  `position` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;
 
INSERT INTO `submenu` (`id`, `label`, `view`, `url`, `linkOption`, `position`, `visibility`, `menu_id`) VALUES
(22, 'Submenus', '', '/submenu/admin', '', 2, 1, 46),
(23, 'Menus', '', '/menu/admin', '', 1, 1, 46);
--
-- Table structure for table `subsubmenu`
--
 
CREATE TABLE IF NOT EXISTS `subsubmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(70) NOT NULL,
  `view` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `linkOption` text NOT NULL,
  `position` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;
3. Generate Models & CRUD for the menu tables 
At this point you will want to generate model and crud via Gii for the following tables:

menu menugroups submenu subsubmenu

4. Add menu to /protected/views/layouts/main.php replacing CMenu widget. 
Now the magic: Replace the default CMenu widget with this one: also make sure that you change the menu div to :

<div id="myslidemenu" class="jqueryslidemenu">
<?php $this->widget('ext.DBMenu.DBMenu',array(
           'group_id'=>$group,
 
 
               )); 
 ?>
