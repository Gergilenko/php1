--
-- База данных: `shp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images_8`
--

CREATE TABLE IF NOT EXISTS `images_8` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;
