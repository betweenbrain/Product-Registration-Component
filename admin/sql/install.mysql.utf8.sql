-- <?php defined('_JEXEC') or die ?>;

CREATE TABLE IF NOT EXISTS `#__registrations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL DEFAULT '',
  `lastName` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL DEFAULT '',
  `country` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `productType` varchar(100) NOT NULL DEFAULT '',
  `serialNumber` varchar(100) NOT NULL DEFAULT '',
  `purchasedFrom` varchar(100) NOT NULL DEFAULT '',
  `purchaseDate` datetime NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
