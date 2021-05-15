-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 May 2021, 21:30:35
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `gyg`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `ID` int(11) NOT NULL,
  `Adi` varchar(50) DEFAULT NULL,
  `kategoriReferansID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`ID`, `Adi`, `kategoriReferansID`) VALUES
(2, 'CSS', 14),
(3, 'ASP', 3),
(13, 'php', 2),
(14, 'sql', 3),
(15, 'GYG', 3),
(16, 'Koşul', 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `ID` int(11) NOT NULL,
  `Adi` varchar(100) NOT NULL,
  `Soyadi` varchar(100) NOT NULL,
  `Telefon` varchar(100) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Adres` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`ID`, `Adi`, `Soyadi`, `Telefon`, `Email`, `Adres`) VALUES
(1, 'maho ', 'yılmaz', '05536173235', 'ibram@outlook.com', 'deneme'),
(13, 'yeni', 'yeniden', '02134567', 'y@y.com', 'şehir'),
(14, 'haso', 'mahmut', '02154789865', 'pinar@live.com', 'mahalle'),
(16, 'patato', 'Yılmaz', '0246 358 62 84', 'a@a.com', 'sütçüler çandır'),
(19, 'resul', 'kibar', '541213', 'resul@hotmail.com', 'camili'),
(20, 'resul', 'kibar', '541321', 'resul@hotmail.com', 'camili'),
(21, 'refik', 'kibar', '5319848484', 'refikkibar@gmail.com', 'şeker mahallesi'),
(22, 'medet', 'kibar', '542', 'meto@hotmail.com', 'camili'),
(26, 'büşra', 'kibar', '535', 'busra@gmail.com', 'seker mah'),
(27, 'deneme', 'kolaysifre', '0800', 'kolay@gmail.com', 'kolay mahallesi'),
(28, 'kolay2', 'sifreleracik', '0850', 'kolay2@gmail.com', 'izi boy mahllesi'),
(29, 'ZAP', 'ZAP', 'ZAP', 'foo-bar@example.com', ''),
(30, 'vedat', 'milor', '41214321', 'yorum@hotmail.com', 'yorum mahallesi'),
(31, 'ZAP', 'ZAP', 'ZAP', 'foo-bar@example.com', ''),
(32, 'srf', 'dnm', '59461', 'dasasdasf', 'denme'),
(33, 'hanzo', 'salako', '14124', 'hanzo@gmail.com', 'inek şaban'),
(34, 'tarık', 'akan', '21541', 'damatferit@gmail.com', 'hababam sınıfı'),
(35, 'güdük', 'necmi', '142412', 'necmi34@gmail.com', 'hababamsınıfı'),
(36, 'tulum', 'hayri', '1421312321', 'hayritulum@gmail.com', 'hababam köyü'),
(37, 'ramiz', 'dayi', '41242131', 'dayi34@gmail.com', 'istanbul'),
(38, 'ZAP', 'ZAP', 'ZAP', 'foo-bar@example.com', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullaniciparola`
--

CREATE TABLE `kullaniciparola` (
  `ID` int(11) NOT NULL,
  `KullaniciRefID` int(11) NOT NULL,
  `Sifre` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullaniciparola`
--

INSERT INTO `kullaniciparola` (`ID`, `KullaniciRefID`, `Sifre`) VALUES
(11, 19, 'aa0f3070e4a47381f7aa03b639e1fef2'),
(12, 20, 'aa0f3070e4a47381f7aa03b639e1fef2'),
(13, 21, 'aa0f3070e4a47381f7aa03b639e1fef2'),
(14, 22, 'aa0f3070e4a47381f7aa03b639e1fef2'),
(18, 26, 'ed77d042414aa48ee960eb3743c0b62a'),
(19, 27, 'aa0f3070e4a47381f7aa03b639e1fef2'),
(20, 28, '5454'),
(21, 29, '9a127b50dce87ead7c6401703d8d05fc'),
(22, 30, 'aa0f3070e4a47381f7aa03b639e1fef2'),
(23, 31, '9a127b50dce87ead7c6401703d8d05fc'),
(24, 32, '2e99bf4e42962410038bc6fa4ce40d97'),
(25, 33, '2e99bf4e42962410038bc6fa4ce40d97'),
(26, 34, 'd67ed06d27a889b6cda5c99ff55a61a8'),
(27, 35, '89bade6992dde4b00b0caa17b53355b5'),
(28, 36, 'cd7eb8ab2530f32a0ea42941d41f771e'),
(29, 37, '26a2482abc5ee370aa36bc67a8d00ebc'),
(30, 38, '9a127b50dce87ead7c6401703d8d05fc');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicirol`
--

CREATE TABLE `kullanicirol` (
  `ID` int(11) NOT NULL,
  `KullaniciRefID` int(11) NOT NULL,
  `KullaniciRolID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicirol`
--

INSERT INTO `kullanicirol` (`ID`, `KullaniciRefID`, `KullaniciRolID`) VALUES
(1, 14, 1),
(2, 13, 2),
(3, 21, 1),
(4, 19, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makaleler`
--

CREATE TABLE `makaleler` (
  `ID` int(11) NOT NULL,
  `Adi` varchar(50) DEFAULT NULL,
  `Detay` varchar(750) DEFAULT NULL,
  `Resim` varchar(100) DEFAULT 'yok.png',
  `YayinlayanKisi` int(11) DEFAULT NULL,
  `YayinlanmaTarihi` datetime DEFAULT NULL,
  `KategoriRefID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `makaleler`
--

INSERT INTO `makaleler` (`ID`, `Adi`, `Detay`, `Resim`, `YayinlayanKisi`, `YayinlanmaTarihi`, `KategoriRefID`) VALUES
(31, 'deneme1', '<p>g&uuml;zel bir makale1 d&uuml;zenledik</p>', 'resimYok.jpg', 21, '2021-05-15 21:26:04', 2),
(32, 'makale2', '<p>en g&uuml;zeli bu işte makale4</p>', '', 1, '2021-05-05 05:33:25', 2),
(33, 'denem4', '<p>dasfwqfwqefasjbvasısan fhquf hqfhqf qwhfhsofsaf safwq fq fq</p>', 'en-güzel-manzara-şelale-sahne-dijital-seramik-kaplama-resimleri.jpg', 1, '2021-05-05 05:42:07', 2),
(38, 'hafta11', '<p>burada hafta 11 calısmlaıarı var</p>', '', 1, '2021-05-11 05:08:53', 15),
(39, 'deneme güncel', '<p>12 hafta</p>', '', 1, '2021-05-11 05:19:36', 3),
(40, 'security', '<p>dosya y&uuml;kleme</p>', 'Update.exe', 1, '2021-05-15 13:04:15', 2),
(41, 'm1', '<p>deneme</p>', 'yüz tanıma.txt', 1, '2021-05-15 16:01:49', 2),
(43, 'm3', '<p>deneme5</p>', 'lstm açıklama.txt', 1, '2021-05-15 16:13:39', 2),
(44, 'm6', '<p>deneme1232132131231</p>', 'güvenli yazılım geliştirme.txt', 1, '2021-05-15 16:20:52', 2),
(45, 'm9', '<p>sadasdqweqweqw</p>', 'bilimsel araştırma teknikleri sunum.txt', 1, '2021-05-15 16:27:28', 2),
(46, 'm11', '<p>897944eqwgqgqwgwqgqwgqwgqwg</p>', '109721.jpg', 1, '2021-05-15 16:28:01', 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roller`
--

CREATE TABLE `roller` (
  `ID` int(11) NOT NULL,
  `Adi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `roller`
--

INSERT INTO `roller` (`ID`, `Adi`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Okuyucu');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kategoriReferansID` (`kategoriReferansID`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `kullaniciparola`
--
ALTER TABLE `kullaniciparola`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KullaniciRefID` (`KullaniciRefID`);

--
-- Tablo için indeksler `kullanicirol`
--
ALTER TABLE `kullanicirol`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KullaniciRolID` (`KullaniciRolID`),
  ADD KEY `KullaniciRefID` (`KullaniciRefID`);

--
-- Tablo için indeksler `makaleler`
--
ALTER TABLE `makaleler`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KategoriRefID` (`KategoriRefID`),
  ADD KEY `YayinlayanKisi` (`YayinlayanKisi`);

--
-- Tablo için indeksler `roller`
--
ALTER TABLE `roller`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `kullaniciparola`
--
ALTER TABLE `kullaniciparola`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicirol`
--
ALTER TABLE `kullanicirol`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `makaleler`
--
ALTER TABLE `makaleler`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD CONSTRAINT `kategoriler_ibfk_1` FOREIGN KEY (`kategoriReferansID`) REFERENCES `kategoriler` (`ID`);

--
-- Tablo kısıtlamaları `kullaniciparola`
--
ALTER TABLE `kullaniciparola`
  ADD CONSTRAINT `kullaniciparola_ibfk_1` FOREIGN KEY (`KullaniciRefID`) REFERENCES `kullanicilar` (`ID`);

--
-- Tablo kısıtlamaları `kullanicirol`
--
ALTER TABLE `kullanicirol`
  ADD CONSTRAINT `kullanicirol_ibfk_1` FOREIGN KEY (`KullaniciRolID`) REFERENCES `roller` (`ID`),
  ADD CONSTRAINT `kullanicirol_ibfk_2` FOREIGN KEY (`KullaniciRefID`) REFERENCES `kullanicilar` (`ID`);

--
-- Tablo kısıtlamaları `makaleler`
--
ALTER TABLE `makaleler`
  ADD CONSTRAINT `makaleler_ibfk_1` FOREIGN KEY (`KategoriRefID`) REFERENCES `kategoriler` (`ID`),
  ADD CONSTRAINT `makaleler_ibfk_2` FOREIGN KEY (`YayinlayanKisi`) REFERENCES `kullanicilar` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
