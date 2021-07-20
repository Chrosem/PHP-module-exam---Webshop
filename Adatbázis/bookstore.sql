-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Aug 19. 13:39
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `bookstore`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adatok`
--

CREATE TABLE `adatok` (
  `id` int(9) NOT NULL,
  `user` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `becenev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `adatok`
--

INSERT INTO `adatok` (`id`, `user`, `becenev`, `email`, `pwd`) VALUES
(1, 'teszt', 'Gergő', 'asd@hotmail.com', '99cc43f1479083247122135d8595591a7a34c9bd');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

CREATE TABLE `admin` (
  `id` int(9) NOT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `admin`
--

INSERT INTO `admin` (`id`, `name`, `pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ajanlatkeres`
--

CREATE TABLE `ajanlatkeres` (
  `id` int(3) NOT NULL,
  `kuldo` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `keres` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `id` int(3) NOT NULL,
  `kat_nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `kat_sorrend` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoriak`
--

INSERT INTO `kategoriak` (`id`, `kat_nev`, `kat_sorrend`) VALUES
(1, 'Életmód, Egészség', 1),
(2, 'Ezotéria', 2),
(3, 'Gasztronómia', 3),
(4, 'Gyermekkönyvek', 4),
(5, 'Kötelező olvasmányok', 5),
(6, 'Lexikon, Enciklopédia', 6),
(7, 'Pénz, gazdaság', 7),
(8, 'Szórakoztató irodalom', 8),
(9, 'Számítástechnika', 9);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `id` int(5) NOT NULL,
  `vevo_id` int(5) NOT NULL,
  `szallitas` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `fiz_mod` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `datum` date NOT NULL,
  `statusz` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `b_osszeg` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `rendeles`
--

INSERT INTO `rendeles` (`id`, `vevo_id`, `szallitas`, `fiz_mod`, `datum`, `statusz`, `b_osszeg`) VALUES
(1, 1, 'gls', 'utanvet', '2020-08-19', 'függőben', '2999');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tajekoztatok`
--

CREATE TABLE `tajekoztatok` (
  `id` int(2) NOT NULL,
  `cim` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `tartalom` mediumtext COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tajekoztatok`
--

INSERT INTO `tajekoztatok` (`id`, `cim`, `tartalom`) VALUES
(1, 'Adatvédelmi Tájékoztató', '<p> Duis finibus, sem sit amet sollicitudin suscipit, leo dui elementum ligula, sed bibendum mauris nibh vitae leo. Aenean facilisis aliquam nibh, feugiat pellentesque elit egestas eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque porta, odio id blandit dictum, sem leo faucibus orci, a molestie nulla enim at nibh. Nulla malesuada tempus nunc, in sagittis orci interdum vitae. Integer dictum maximus massa, ut vestibulum sapien aliquet sit amet. Pellentesque finibus sem nec sem eleifend dictum. Sed suscipit elit sit amet bibendum ullamcorper. Aenean auctor, erat ut placerat faucibus, ex nunc vestibulum ligula, non gravida metus erat ut nibh. Maecenas suscipit dui vel lacinia venenatis. </p>\r\n<p>Nullam consequat lorem volutpat mattis gravida. Suspendisse molestie, lacus quis interdum ultricies, massa augue pulvinar est, id auctor tellus tellus in magna. Cras sodales eu odio quis gravida. Mauris auctor, nunc nec dictum rutrum, metus mi mattis urna, a ultrices tellus risus non sem. Nunc finibus dictum tellus, et congue massa eleifend eget. Aliquam vitae cursus massa. Integer vulputate, dolor nec ultrices rutrum, ex nisi vehicula leo, id vestibulum velit neque et turpis. Cras ultricies nunc turpis, a auctor est cursus ac. Duis viverra, elit sit amet iaculis volutpat, orci nunc ornare eros, eget tristique enim felis quis felis. Maecenas lobortis tincidunt convallis.</p>\r\n<p> Duis finibus, sem sit amet sollicitudin suscipit, leo dui elementum ligula, sed bibendum mauris nibh vitae leo. Aenean facilisis aliquam nibh, feugiat pellentesque elit egestas eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque porta, odio id blandit dictum, sem leo faucibus orci, a molestie nulla enim at nibh. Nulla malesuada tempus nunc, in sagittis orci interdum vitae. Integer dictum maximus massa, ut vestibulum sapien aliquet sit amet. Pellentesque finibus sem nec sem eleifend dictum. Sed suscipit elit sit amet bibendum ullamcorper. Aenean auctor, erat ut placerat faucibus, ex nunc vestibulum ligula, non gravida metus erat ut nibh. Maecenas suscipit dui vel lacinia venenatis. </p>\r\n<p>Nullam consequat lorem volutpat mattis gravida. Suspendisse molestie, lacus quis interdum ultricies, massa augue pulvinar est, id auctor tellus tellus in magna. Cras sodales eu odio quis gravida. Mauris auctor, nunc nec dictum rutrum, metus mi mattis urna, a ultrices tellus risus non sem. Nunc finibus dictum tellus, et congue massa eleifend eget. Aliquam vitae cursus massa. Integer vulputate, dolor nec ultrices rutrum, ex nisi vehicula leo, id vestibulum velit neque et turpis. Cras ultricies nunc turpis, a auctor est cursus ac. Duis viverra, elit sit amet iaculis volutpat, orci nunc ornare eros, eget tristique enim felis quis felis. Maecenas lobortis tincidunt convallis.</p>\r\n<p> Duis finibus, sem sit amet sollicitudin suscipit, leo dui elementum ligula, sed bibendum mauris nibh vitae leo. Aenean facilisis aliquam nibh, feugiat pellentesque elit egestas eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque porta, odio id blandit dictum, sem leo faucibus orci, a molestie nulla enim at nibh. Nulla malesuada tempus nunc, in sagittis orci interdum vitae. Integer dictum maximus massa, ut vestibulum sapien aliquet sit amet. Pellentesque finibus sem nec sem eleifend dictum. Sed suscipit elit sit amet bibendum ullamcorper. Aenean auctor, erat ut placerat faucibus, ex nunc vestibulum ligula, non gravida metus erat ut nibh. Maecenas suscipit dui vel lacinia venenatis. </p>\r\n<p>Nullam consequat lorem volutpat mattis gravida. Suspendisse molestie, lacus quis interdum ultricies, massa augue pulvinar est, id auctor tellus tellus in magna. Cras sodales eu odio quis gravida. Mauris auctor, nunc nec dictum rutrum, metus mi mattis urna, a ultrices tellus risus non sem. Nunc finibus dictum tellus, et congue massa eleifend eget. Aliquam vitae cursus massa. Integer vulputate, dolor nec ultrices rutrum, ex nisi vehicula leo, id vestibulum velit neque et turpis. Cras ultricies nunc turpis, a auctor est cursus ac. Duis viverra, elit sit amet iaculis volutpat, orci nunc ornare eros, eget tristique enim felis quis felis. Maecenas lobortis tincidunt convallis.</p>'),
(2, 'Fizetés', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu tristique lectus, sit amet laoreet diam. Integer pulvinar, massa quis pharetra accumsan, massa magna congue dolor, id imperdiet lacus ante eu magna. Sed sed rhoncus massa. Maecenas vel bibendum nunc, sit amet mollis dui. Vestibulum finibus turpis non auctor aliquet. Donec ipsum lorem, sollicitudin ut diam ut, mattis tincidunt tortor. Etiam sit amet finibus lorem, ac fringilla massa. Curabitur eu felis luctus, eleifend leo et, aliquet ex. Phasellus in purus mauris.\r\n\r\nDuis quis facilisis massa. Aenean semper ligula quis nulla posuere, sed consectetur justo pharetra. In dapibus bibendum finibus. Cras semper in tortor volutpat imperdiet. Donec vel libero vitae elit vestibulum finibus vitae sed tortor. Cras augue massa, tristique vel urna a, sagittis tempor dolor. Sed id ante non arcu maximus tempor. Sed quis sodales tellus, non maximus lorem. Sed a nunc lacinia, porttitor dolor id, sagittis massa. Curabitur lacinia dolor at lectus vestibulum convallis.\r\n\r\nSuspendisse semper luctus turpis, vel efficitur quam scelerisque ullamcorper. In iaculis ipsum a enim ultricies, ut placerat mi viverra. Quisque a neque arcu. Vivamus ut tempor erat. Nullam rhoncus vel eros nec convallis. Nunc est eros, cursus nec consequat a, fringilla nec eros. Suspendisse gravida quis massa ac dapibus. Quisque sit amet dolor consectetur massa fringilla iaculis. Aenean cursus, justo quis fermentum mollis, lorem augue placerat ipsum, quis suscipit risus justo suscipit enim. Etiam metus libero, consectetur eget laoreet vitae, ultrices vel diam. Morbi lacus lectus, congue nec semper in, lobortis vel quam. Vestibulum mollis vitae massa vel ullamcorper. Pellentesque et elit bibendum, gravida sem ut, viverra felis. Duis blandit, lectus sit amet pretium euismod, lectus justo pharetra turpis, a aliquet nunc felis a orci. Maecenas tortor justo, aliquam eget nunc vel, interdum vulputate velit. Vivamus condimentum ultrices nisi, non suscipit justo sollicitudin at.\r\n\r\nSed sodales eros ut vulputate vestibulum. Sed in finibus lectus. Duis in eros ac ligula venenatis tincidunt sit amet viverra quam. Praesent id turpis ac risus feugiat venenatis. Ut tortor arcu, rutrum rhoncus ipsum sit amet, auctor dictum tortor. Praesent accumsan dignissim feugiat. Integer erat metus, viverra ac fermentum non, laoreet eget dolor. Etiam quis nunc tempus, ornare felis sit amet, efficitur magna. Maecenas sodales tincidunt diam, non tempor turpis iaculis in. Praesent nec magna velit.\r\n\r\nDuis faucibus nibh quis leo tempor, vitae posuere risus malesuada. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras maximus venenatis lobortis. Vivamus tempor arcu purus, nec imperdiet turpis euismod at. Ut consequat lacinia ante in accumsan. Sed sed varius enim. Nam cursus porta risus a bibendum.'),
(3, 'Szállítás', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu tristique lectus, sit amet laoreet diam. Integer pulvinar, massa quis pharetra accumsan, massa magna congue dolor, id imperdiet lacus ante eu magna. Sed sed rhoncus massa. Maecenas vel bibendum nunc, sit amet mollis dui. Vestibulum finibus turpis non auctor aliquet. Donec ipsum lorem, sollicitudin ut diam ut, mattis tincidunt tortor. Etiam sit amet finibus lorem, ac fringilla massa. Curabitur eu felis luctus, eleifend leo et, aliquet ex. Phasellus in purus mauris.\r\n\r\nDuis quis facilisis massa. Aenean semper ligula quis nulla posuere, sed consectetur justo pharetra. In dapibus bibendum finibus. Cras semper in tortor volutpat imperdiet. Donec vel libero vitae elit vestibulum finibus vitae sed tortor. Cras augue massa, tristique vel urna a, sagittis tempor dolor. Sed id ante non arcu maximus tempor. Sed quis sodales tellus, non maximus lorem. Sed a nunc lacinia, porttitor dolor id, sagittis massa. Curabitur lacinia dolor at lectus vestibulum convallis.\r\n\r\nSuspendisse semper luctus turpis, vel efficitur quam scelerisque ullamcorper. In iaculis ipsum a enim ultricies, ut placerat mi viverra. Quisque a neque arcu. Vivamus ut tempor erat. Nullam rhoncus vel eros nec convallis. Nunc est eros, cursus nec consequat a, fringilla nec eros. Suspendisse gravida quis massa ac dapibus. Quisque sit amet dolor consectetur massa fringilla iaculis. Aenean cursus, justo quis fermentum mollis, lorem augue placerat ipsum, quis suscipit risus justo suscipit enim. Etiam metus libero, consectetur eget laoreet vitae, ultrices vel diam. Morbi lacus lectus, congue nec semper in, lobortis vel quam. Vestibulum mollis vitae massa vel ullamcorper. Pellentesque et elit bibendum, gravida sem ut, viverra felis. Duis blandit, lectus sit amet pretium euismod, lectus justo pharetra turpis, a aliquet nunc felis a orci. Maecenas tortor justo, aliquam eget nunc vel, interdum vulputate velit. Vivamus condimentum ultrices nisi, non suscipit justo sollicitudin at.\r\n\r\nSed sodales eros ut vulputate vestibulum. Sed in finibus lectus. Duis in eros ac ligula venenatis tincidunt sit amet viverra quam. Praesent id turpis ac risus feugiat venenatis. Ut tortor arcu, rutrum rhoncus ipsum sit amet, auctor dictum tortor. Praesent accumsan dignissim feugiat. Integer erat metus, viverra ac fermentum non, laoreet eget dolor. Etiam quis nunc tempus, ornare felis sit amet, efficitur magna. Maecenas sodales tincidunt diam, non tempor turpis iaculis in. Praesent nec magna velit.\r\n\r\nDuis faucibus nibh quis leo tempor, vitae posuere risus malesuada. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras maximus venenatis lobortis. Vivamus tempor arcu purus, nec imperdiet turpis euismod at. Ut consequat lacinia ante in accumsan. Sed sed varius enim. Nam cursus porta risus a bibendum.'),
(4, 'Üzletszabályzat', '<p>Praesent vitae dolor cursus, sodales ipsum malesuada, porttitor odio. Nullam congue scelerisque gravida. Nam augue erat, euismod eu feugiat vel, egestas non nunc. Cras sed dui dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis ornare felis arcu, vitae aliquam eros rhoncus quis. In euismod, ipsum in posuere maximus, nibh leo laoreet leo, ac lacinia ante mauris in lorem. Mauris semper fermentum vulputate. Morbi vehicula tellus in imperdiet molestie. Cras condimentum rhoncus ex, id egestas nulla aliquet sed. Nullam arcu turpis, pulvinar facilisis convallis eu, tempus vel sem.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna eros, eleifend malesuada ipsum id, suscipit elementum mauris. Etiam urna ligula, varius quis purus et, tincidunt ornare ipsum. Quisque ut cursus massa, et varius turpis. Aenean sagittis in leo et varius. Mauris rutrum at turpis commodo aliquet. Cras accumsan neque nec porttitor congue. Integer viverra a sem nec rutrum.</p><p>Praesent vitae dolor cursus, sodales ipsum malesuada, porttitor odio. Nullam congue scelerisque gravida. Nam augue erat, euismod eu feugiat vel, egestas non nunc. Cras sed dui dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis ornare felis arcu, vitae aliquam eros rhoncus quis. In euismod, ipsum in posuere maximus, nibh leo laoreet leo, ac lacinia ante mauris in lorem. Mauris semper fermentum vulputate. Morbi vehicula tellus in imperdiet molestie. Cras condimentum rhoncus ex, id egestas nulla aliquet sed. Nullam arcu turpis, pulvinar facilisis convallis eu, tempus vel sem.</p>'),
(5, 'Vásárlási feltételek', 'Vestibulum semper ac felis ut suscipit. Nulla facilisi. Cras pharetra aliquet nulla. In id nibh malesuada, efficitur ligula quis, imperdiet nunc. Proin tristique volutpat ipsum, non finibus elit. Duis aliquet massa et elit consectetur tincidunt. Nulla condimentum ornare ligula, a sodales nisl tincidunt in. Proin faucibus ipsum arcu, iaculis rutrum ex congue et. Donec elementum erat ut risus commodo, rutrum blandit odio fringilla. Vestibulum molestie velit eu metus sollicitudin viverra. Nullam in dapibus mauris.\r\n\r\nMauris lobortis tortor eu nulla volutpat mattis. Maecenas libero sapien, auctor vel ligula quis, rutrum interdum ex. Integer pellentesque varius leo ac accumsan. In interdum enim vel felis vehicula cursus. Vestibulum efficitur, tortor ut elementum vehicula, est lectus pharetra lorem, eget pulvinar justo dui vel nisl. Maecenas scelerisque, tortor aliquam fermentum porttitor, dolor mauris volutpat nibh, eget efficitur odio sem id nunc. Sed commodo ornare enim, ac congue augue lobortis vitae. Proin commodo suscipit purus non elementum. In nec odio diam. Pellentesque erat nisi, pretium commodo posuere non, sagittis sed nunc. Vivamus tristique tincidunt pretium');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(5) NOT NULL,
  `kategoria` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `akcio` tinyint(1) NOT NULL,
  `kedvezmeny` int(3) NOT NULL,
  `szerzo` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `kiado` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `kiad_ev` int(4) NOT NULL,
  `ar` decimal(10,0) NOT NULL,
  `leiras` mediumtext COLLATE utf8_hungarian_ci NOT NULL,
  `egyeb` mediumtext COLLATE utf8_hungarian_ci NOT NULL,
  `borito` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `keszlet` int(3) NOT NULL,
  `aktiv` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `kategoria`, `akcio`, `kedvezmeny`, `szerzo`, `cim`, `kiado`, `kiad_ev`, `ar`, `leiras`, `egyeb`, `borito`, `keszlet`, `aktiv`) VALUES
(1, '5', 0, 0, 'Jókai Mór', 'A kőszívű ember fiai', 'Akkord Kiadó', 2006, '1000', '1869-ben, tehát a kiegyezés után két évvel írta Jókai e regényt. Élményanyagul saját, eltörölhetetlen és egyre fényesedő emlékein kívül - ilyen akár a közelről látott bécsi forradalom, akár a Boksa Gergő alakjához hasznosított Rózsa Sándor - felhasznált leírt és elmesélt élményeket is, amelyeket főleg az 1860-61-ben mozgalommá szélesedő honvédemlékgyűjtés közben szedett össze. A szakirodalom természetesen igen sokat foglalkozott az író ezen sikeres és külföldön is igen kedvelt regényével. Eszerint a Jókai életének legfőbb élményforrását képező forradalom és szabadságharc mitológiai fenségű ábrázolását sikerült összeegyeztetnie a kor társadalmi életének fő ellentmondásait szerencsésen sűrítő családi bonyodalomrajzában. Szörényi László', '307 oldal･puhatáblás, ragasztókötött･ISBN: 9789634157960', 'img/termekek/jokai.jpg ', 20, 1),
(2, '5', 0, 0, 'Madách Imre', 'Az ember tragédiája', 'Akkord Kiadó', 2011, '1500', 'Madách Imre (1823-1864) miként Az ember tragédiája Ádámja a végső kérdésekre kereste a választ: szenvedésekkel és méltánytalanságokkal teli, tartalmas és mégis tékozló életében. Az ember tragédiája kérdései Madách kérdései, amelyek nem érthetők teljesen a drámaköltő sorsa, sorsának mélypontjai és magaslatai nélkül. A jogot végzett, művészi babérokra is törő, köznemesi származású ifjú neveltetésének és nyilván habitusának megfelelően tenni kívánt hazájáért. Ez számára - mint korából és korosztályából annyiaknak - nem kérdés, evidencia volt! A magánéletében megélt megannyi keserűség, csalódás, lelki seb mintha valami szent összeesküvéssel segítette volna, hogy egy tehetséges, a mindenkori jobbért, igazért cselekvően tenni akaró férfi és írástudó nemzete egyik legnagyobb alkotását létrehozza. Egyéni fájdalma és a haza fájdalma nélkül a magyar irodalom talán legegyetemesebb műve nem születhetett volna meg. Ádám sorsában önmaga, a magyarság és az emberiség sorsát is megfogalmazta: a csalódások és az újrakezdések sorozatát. Az ember történetét a történelemben! Az ismert irodalomtörténeti tények: Madách Az ember tragédiáját 1859 februárjától 1860 márciusáig írta, vidéki magányában, kételyektól, sötét gondolatoktól gyötörten. Az Arany Jánoshoz eljutott műre - kisebb javításokat javasolva - maga Arany ütötte rá a remekmű máig érvényes súlyos pecsétjét. Az idő, a múló idő újabb és újabb kérdőjeleket vetett föl a kivételes alkotás természetrajzához illően, de sosem az értékei miatt! Drámairodalmunk örökké korszerű, mindig modern, tehát klasszikus darabja létünk értelmét keresi. S ennek, minthogy az élet két nemre épül, a férfi és a nő páros magánya vagy szép szövetsége is a tétje. Ahogy a mindennapok méltó vállalása kínokkal és örömökkel, zuhanásokkal és szárnyalásokkal együtt. A tudott vég, az elkerülhetetlen halál nem hatalmazhat föl senkit a küzdelem föladására vagy elkerülésére. A fő kérdés nem a miért, hanem az: van-e kiért? S ha van - márpedig szent okok folytán szinte mindig van és lesz valakiért - akkor a miértre is válasz születhet! Kaiser László', '190 oldal･puhatáblás, ragasztókötött･ISBN: 9789636450564', 'img/termekek/madach.jpg ', 23, 1),
(3, '5', 0, 0, 'Móricz Zsigmond', 'Légy jó mindhalálig', 'Móra Könyvkiadó', 2017, '890', 'Nyilas Misi szorongó kiskamasz, aki nem találja a helyét a debreceni kollégium falai között. Szerencsétlen véletlenek folytán a felnőttek olykor kegyetlen világával is kénytelen idejekorán szembesülni. A nyakába szakadt felelősség súlyát addig-addig hordozza magában, míg végül rá kell jönnie: „Én nem akarok debreceni diák lenni tovább!”\r\nMóricz Zsigmond társadalomkritikájával ugyan elsősorban a felnőtteket akarta megszólítani, pontos gyerekkarakterei és az egész könyvből áradó humanizmus miatt azonban máig az egyik legfontosabb magyar ifjúsági regényként olvassuk és szeretjük Misi történetét.', '307 oldal･puhatáblás, ragasztókötött･ISBN: 9789634157960', 'img/termekek/moricz.jpg ', 0, 1),
(46, '2', 0, 0, 'Dr. Joe Dispenza', 'A placebo te magad légy! - Az elme hatalma az anyag fölött', 'Bioenergetic Kiadó', 2019, '4000', 'Elképzelhető a gyógyulás pusztán a gondolat által - gyógyszer vagy műtéti beavatkozás nélkül? Valójában sokkal gyakrabban történik ilyesmi, mint gondolnánk. Ebben a könyvben dr. Joe Dispenza számos olyan, dokumentált esetet oszt meg az olvasókkal, amelyek során betegek depresszióból, ízületi gyulladásból, szívbetegségekből, sőt, akár Parkinson-kórból gyógyultak meg annak köszönhetően, hogy placebóban hittek.\r\n\"Vajon lehetséges-e megtanítani a placebo működési elvét, és bármiféle külső anyag nélkül ugyanolyan belső változásokat elérni az egyén egészségében, végső soron pedig az egész életében?\" - teszi fel a logikus kérdést dr. Joe.\r\nA szerző az idegtudomány, a biológia, a pszichológia, a hipnózis, a kondicionálás és a kvantumfizika legújabb eredményeit ötvözve oszlatja szét a placebo-hatásal kapcsolatos tévképzeteket, és rávilágít, hogyan válhat a látszólag lehetetlen is lehetségessé. Tudományos bizonyítékokat (többek között színes agyi CT-felvételeket) tár elénk, amelyeket a személyes átalakulás modelljét elsajátító és jelentős gyógyuláson átesett hallgatói szolgáltattak.\r\nA könyv egy irányított meditáció szövegével zárul, amely segít megváltoztatni a gyógyulás első lépésének megtételét akadályozó hiedelmeinket. A meditáció szövege Szalay Ádám előadásában a könyvben található kóddal MP3 formátumban a kiadó oldaláról letölthető.\r\nDr. Joe Dispenza szenvedélyesen tanít másokat arra, hogyan használják az idegtudomány és a kvantumfizika legújabb felfedezéseit arra, hogy átprogramozzák agyukat, kigyógyuljanak betegségeikből, és teljesebb életet éljenek. Dr, Joe, a What the Bleep Do We Know!? (Mi a csudát tudunk a világról?) című filmben is megszólal, emellett világszerte tart workshopokat és előadásokat. Saját fejlesztésű vállalati programja az üzleti világban segít kamatoztatni a szerző transzformációs modelljét.', '324 oldal･kemény kötés･ISBN: 9789632913551', 'img/termekek/ID22-312895.jpg', 37, 1),
(47, '2', 0, 0, 'Székelyhidi Ágnes', 'Számmisztika Szülő-gyerek kapcsolatok a számok tükrében', 'Bioenergetic Kft', 2020, '2999', '\"A gyermekeket tiszteletben kell fogadni,\r\nSzeretetben kell nevelni,\r\nÉs szabadságban kell elbocsátni.\" R.Steiner\r\nSzülők és gyerekek - talán a legszorosabb emberi kapcsolat, ami egy életen át elkísér minket. A harmónia megteremtéséhez fontos, hogy megértsük, hogy személyes konfliktusaink megoldásában nem az segít, ha megváltoztatjuk, hanem ha megértjük hozzátartozóinkat és nem utolsó sorban önmagunkat.\r\nEhhez nyújt kiváló segítséget a számmisztika elismert szakértője, Székelyhidi Ágnes. Legújabb könyvében 11 típusú gyereket (azon belül 3 korcsoportot és fiú-lány felbontást), majd 11 típusú szülőt (külön apát és anyát) különböztetünk meg. Azért 11 típusról esik szó, mert a születési dátumban most csak a nap számát vesszük figyelembe, ez mutatja ugyanis a személyiség lényegét.\r\nÚjdonság a szimpátiára utaló testvérszámok és az ellentéteket kifejező ellenpólusok fogalma. A gyerek jellemének megfejtését segíti az adott szám mesefigurája, illetve az adott karakterre jellemző szeretetnyelv leírása. Ez utóbbi különösen fontos, hiszen ha szeretetünket hangsúlyosan a neki leginkább megfelelő módon fejezzük ki, akkor gyermekünk érzelmileg biztonságban fogja érezni magát.\r\nA könyv első részében a gyerekek, második részében pedig a szülők szempontjából vizsgálja a szülő-gyerek kapcsolatot, így a megfelelő számot fellapozva mindkét \"szerepünkről\" elemzését megismerhetjük.\r\nHa a gyermekünkről olvasunk, egyfajta használati útmutatót kapunk ahhoz, hogyan tudjuk segíteni őt, miben igényli a legtöbb támogatást és hol vannak nevelésének kritikus pontjai. A szüleinkre vonatkozó részt is érdemes fellapozni, illetve a saját számunkat gyerekként. Tanulságos lehet visszamenőleg is ráébredni konfliktusforrásokra, és akár még a feszültségek kezelésére is lehet esély, hiszen ahogy Erich Kästner mondta, \"Sosincs késő egy boldog gyermekkorhoz!\"', '306 oldal･puhatáblás, ragasztókötött･ISBN: 9789632914367', 'img/termekek/ID22-319616.jpg', 7, 1),
(48, '2', 0, 0, 'Mantak Chia W.U. Wei', 'Tao a mindennapokban - Az önmegismerés erőlködésmentes ösvénye', 'Lunarimpex Kiadó', 2020, '4500', 'A taoisták szerint meg kell tanulnunk az elmével figyelni, és a szívvel gondolkodni. Mi, nyugatiak, az ego \"majom tudatának\" csapdájában vergődünk. Azt hisszük, uralhatjuk a sorsunkat, ha ár ellen úszunk, de ez tévedés. Ha a meditációs módszerekkel megtanuljuk lecsendesíteni a majom tudatot, akkor meghaladhatjuk a fenti elme egyenes vonalú gondolkodását, és kapcsolódhatunk a szívközpontban lakó magasabb tudatosság multidimenziós gondolkodásához.\r\n\r\nA jelen könyvben Mantak Chia mester és William Wei olyan módszereket tanítanak, amelyekkel túlléphetünk idő és tér korlátain, és elérhetjük az egyetemes belső igazságot - méghozzá erőlködés nélkül. A Tao a mindennapokban könnyed. Ahogyan egy apró magocskából is magasztos fa nőhet, ha megkapja a napi víz- és fényadagját, naponta néhány percnyi taoista gyakorlat nyugodt és örömteli életet biztosíthat.\r\n\r\nA Tao azonban nem csak azt tanítja, miként ültesd el a magot, hogy gyökeret eresszen és növekedésnek induljon - energia vagy esszencia formájában - végül pedig fa váljék belőle, hanem azt is, hogyan ápoljuk a virágot, hogy az megtermékenyüljön és gyümölcsöt hozzon. Mindezt pedig anélkül érjük el, hogy elvesztenénk a dolog lényegét - a magot. Fánk, vagyis a helyesen ápolt energia - százszámra fogja a gyümölcsöket hozni, így olyan határtalan bőségben lesz részünk, amelyet már szívesen megosztunk másokkal, akik őszinték és érdemesek rá. Gondolj csak bele: Hány mag van gyümölcseinkben, amelyet meg lehetne osztani másokkal? Tehát, ha az eredeti vetőmagunkat a Tao szellemiségében neveljük - ahelyett, hogy más irányzatokhoz hasonlóan egyszerűen túladnánk rajtuk - akkor több ezer magot oszthatunk meg másokkal életük jobbátételére, mindezt pedig az eredeti mag - az esszencia - elvesztése nélkül tehetjük meg. Ebben a könyvben lehull a lepel a Tao ösvényéről. Megtudhatod hogyan építhetők be a tanok a te életedbe, hogy kényelmesen feltehesd a lábad és élvezhesd életed utazását. Ne feledd - az univerzumban nincsenek eredeti ötletek vagy gondolatok - azokat az emberek csak hasznáják vagy rosszul használják. Bármit is keress az életedben, tudd hát hogy az is keres téged. Ülj csak le nyugodtan és amikor megtalál, csatlakozz hozzá és folytassátok együtt az utat.', '378 oldal･puhatáblás, ragasztókötött･ISBN: 9786156042026', 'img/termekek/ID22-320064.jpg', 0, 1),
(49, '2', 1, 20, '', 'Szimbólumok, jelek, mítoszok', 'Hermit Könyvkiadó Bt.', 2019, '1895', 'A szimbólumok, jelek egyfajta kifejező erői úgy a pszichében zajló folyamatoknak - legyen az betegség, változás vagy éppen egy új lehetőség feltűnése -, mint az emberi élet során történő beavatási - önbeavatási stációknak is, legyen az álmokban közölve, vagy történjen spontán felismerés által.', '104 oldal･puhatáblás, ragasztókötött･ISBN: 9786155984112', 'img/termekek/ID22-312121.jpg', 10, 1),
(50, '2', 0, 0, 'Richard Bach', 'Jonathan Livingston, a sirály', 'Szenzár Kiadó', 2020, '2890', 'Jonathan nem hétköznapi sirály: a repülést nem a túlélés eszközének, hanem az önismeret útjának, az igazi szabadság kulcsának tekinti. Szokványostól eltérő életútja, mely eleinte megbotránkoztatást vált ki a közösség tagjaiból, egyre több sirály elé állít követendő példát. Jonathan szívhez szóló története természetesen az emberi kiteljesedés lelkesítő parabolája.\r\nRichard Bach ezoterikus körökben klasszikusnak számító regénye most olyan, új zárófejezettel bővítve jelenik meg, amelyet a szerző eddig nem tett közkinccsé.', 'MAGYAR - ANGOL･170 oldal･keménytábla, védőborító', 'img/termekek/ID22-317917.jpg', 24, 1),
(51, '1', 0, 0, 'Patrick McKeown', 'A légzés ereje - Oxigén Program: Edzésmódszer, amivel egészségesebb, vékonyabb és edzettebb leszel', 'Jaffa Kiadó', 2017, '3500', 'Ki ne szeretne egészségesebb, fittebb és karcsúbb lenni! Az általános erőnlét és az egészség megőrzésének és javításának azonban a közismert, mindennapi gátló tényezők mellett van egy gyakori, ám a nagyközönség előtt mégis szinte ismeretlen akadálya: a krónikus túllégzés. Tudtunkon kívül kétszer-háromszor annyi levegőt lélegzünk be, mint amennyire szükségünk lenne - ez pedig nemcsak hogy rosszabb átalános állapothoz, de olyan egészségügyi problémák kialakulásához vezet, mint az asztma, a szorongás, a krónikus fáradtság, az álmatlanság, az elhízás.\r\nKi gondolná, hogy mindezeken a bajokon egyszerű, ám tudományosan alátámasztott légzéstechnikákkal úrrá lehetsz! Patrick McKeown légzéskutató tanácsait megfogadva, és a könnyen alkalmazható technikákat elsajátítva változtathatsz a légzéseden, s így igen rövid idő alatt növelheted az aktív izmokhoz és a szervekhez jutó oxigén mennyiségét. Akár maximális teljesítményre törekvő élsportoló, akár jobb erőnlétre és egészségre vágyó átlagember vagy, a könyvben ismertetett légzőgyakorlatokkal\r\n\r\n- maximalizálhatod bármely fitneszprogram előnyeit;\r\n- szimulálhatod a nagy magasságban végzett edzést a sportteljesítményed fokozása érdekében;\r\n- javíthatsz az alvásod minőségén és a koncentrációs képességeden;\r\n- megszüntetheted az asztma tüneteit;\r\n- csökkentheted a magas stressz-szintedet;\r\n- különösebb erőfeszítés nélkül fogyhatsz, és meg is tudod tartani az így elért súlyodat.\r\n\r\nNe feledd, az egészség, az erőnlét és fogyás titka a légzésedben rejlik!\r\n\r\nPATRICK MCKEOWN légzéskutató az általa kidolgozott alapelvek és gyakorlatok alkalmazásával ezreknek segített már sportteljesítményük és egészségi állapotuk javításában. Ő maga is így küzdötte le az asztmáját és az alvás közben jelentkező rendellenes légzését. Módszerét szüntelenül tökéletesíti és bővíti, s gyakran tart előadásokat szülőhazájában, Írországban, Európában, Észak-Amerikában és Ausztráliában arról, hogyan lehet a légzés segítségével kiaknázni a mindannyiunkban ott rejlő potenciált.', '310 oldal･karton･ISBN: 9786155609961', 'img/termekek/B294286.jpg', 2, 1),
(52, '1', 0, 0, 'Lakatos Péter', 'Kortalanul! - Állítsd meg az öregedést - életmóddal, edzéssel, étkezéssel', 'Jaffa Kiadó', 2020, '3500', 'Köztudott tény, hogy az életkor szinte valamennyi krónikus betegség esetén kiemelt kockázati tényezőt jelent. Bár az idő kerekét visszaforgatni nem lehet, Lakatos Péter szerint igenis módunkban áll lelassítani. Sőt, nem csupán az élettartamunkat növelhetjük meg, de azt az időt is, amelyet makkegészségesen töltünk.\r\nA Kortalanul! lépésről lépésre mutatja be, hogyan javíthatsz az életminőségeden és a kilátásaidon. Ehhez azonban meg kell ismerkedned az emberi test alapvető működésével, ami 40 év felett bizony megváltozik - ezt a szerző saját tapasztalatai is megerősítik. A kötet részletesen szól légzésről, alvásról, fényről, edzésről, regenerációról, étkezésről - egyszóval mindenről, ami segíthet abban, hogy több energiád legyen a mindennapokban.\r\nLakatos Péter nem teljesíthetetlen feladatok elvégzésére buzdít, hiszen alapelve: minimummal az optimumot. A szerző szerint a legfontosabb a rossz szokások megváltoztatása, a gyakorlás és a fokozatosság. Könyvében mindenki megtalálhatja a saját fizikai és mentális állapotának, edzettségi szintjének és lehetőségeinek megfelelő javaslatokat. A kezdőknek az első héten nem kell tonnákat megmozgatniuk a konditeremben, elég, ha gyalog mennek fel az emeletre. A szerző állítja: ahhoz, hogy elinduljunk az egészségesebb élet felé vezető úton, nem költséges sportszerekre van szükség, hanem elhatározásra - és kitartásra.\r\nLakatos Péter könyve elsősorban a 40 év felettieknek szól, de a tanácsait éppúgy hasznosíthatják a fiatalabbak is: edzők és sportolók, profik és amatőrök - mindenki, aki magasabb életkort szeretne megérni fitten, erősen és egészségesen.\r\n\r\nLAKATOS PÉTER StrongFirst Master-oktató, Carlson Gracie Jiu Jitsu fekete öves gyakorló. Harminc éve oktat fitnesszel, légzéssel és mozgással kapcsolatos szakmai programok keretében itthon és külföldön egyaránt. A Ground Force Method megalkotója, krav maga mester. Számos kiváló szakkönyv szerzője. Legutóbbi könyve a Legyél te is biohacker!, melyet Sáfrán Mihállyal közösen írt.', '240 oldal･karton･ISBN: 9789634752301', 'img/termekek/ID22-317787.jpg', 1, 1),
(53, '1', 0, 0, 'Robin Sharma', 'Hajnali 5 óra Klub - Legyen Tied minden reggel!', 'Trivium Kiadó', 2019, '4500', 'A csúcsvezetők legendás tanácsadója és a kiemelkedő siker szakértője több, mint húsz évvel ezelőtt mutatta be a hajnali öt órai felkelés módszerét. Ez a forradalmian újszerű reggeli tevékenység elősegítette, hogy a tanítványai a lehető leghatékonyabban dolgozzanak, megacélozzák az egészségüket és a zavarba ejtő, bonyolult dolgok korszakában is megőrizzék lelki békéjüket.\r\n\r\nA szerző nagy odaadással, négy éven át dolgozott új könyvén, amelyben feltárja az olvasó előtt a hajnali ébredéssel járó siker titkait. Módszerével rengeteg követője ért el elképesztő sikert, miközben boldogabban élt, eltöltötte az életerő és többet segített másokon.\r\n\r\nA Hajnali 5 óra Klub két, nehéz helyzetbe került ember lenyűgöző - és gyakran mulatságos - története. Útjukat keresve egy bogaras milliárdos tanácsait követve a következő dolgokkal ismerkednek meg:\r\n- Azzal a nem túl ismert módszerrel, aminek segítségével kora hajnalban lelkesen, célratörően, erőtől duzzadva kezdhetjük el napunkat, hogy a lehető legtöbbet hozzuk ki belőle.\r\n- Kiderül, hogy a legnagyobb zsenik, az üzleti élet óriásai és a világ legbölcsebb emberei a hajnalaikat remekül kihasználva, hogyan érnek el elképesztő eredményeket.\r\n- Részletes útmutatót kapunk arra, hogy a pirkadat legnyugodtabb óráit kihasználva, miként eddzük testünket, hogyan töltődjünk fel és növekedjünk.\r\n- Egy olyan, az idegtudományra alapuló módszerrel, ami révén akkor is könnyedén felkelünk, amikor a legtöbb ember alszik. Így jut idő önmagunk számára, gondolkodni és kreatívan alkotni. Áldott békességben kezdhetjük a napunkat, ahelyett, hogy kapkodnunk kellene.\r\n- Olyan \"bennfentes\" taktikákkal, amelyek segítenek megvédeni tehetségünket, adományainkat és az álmainkat a digitális, zavaró tényezők és a hétköznapok zűrzavara ellen. Alkalmazóikra boldogabb élet vár és rendkívüli módon alakíthatják maguk körül a világot.\r\n\r\nEz a páratlan könyv részben felhívás arra, hogy éljünk úgy, mint a nagymesterek, részben pedig útmutatás, ami lehetővé teszi, hogy a hatékonyságunk a géniuszokéval is felvegye a versenyt.\r\n\r\nA Hajnali 5 óra Klub végérvényesen jobbá teszi az életünket.', '400 oldal･füles, kartonált･ISBN: 9786155732669', 'img/termekek/ID22-311152.jpg', 31, 1),
(54, '3', 0, 0, 'Szabó Adrienn', 'Magyar superfood - 65 szuperétel, 106 szuperélelmiszer', 'BOOOK KIADÓ KFT', 2020, '6000', 'TUDATOSSÁG - FENNTARTHATÓSÁG - KÖRNYEZETBARÁT TÁPLÁLKOZÁS\r\n\r\nA superfood kifejezés sokak számára egyet jelent az egészséggel, hiszen olyan alapanyagot mutat, amely valamely értékes tulajdonságában kiemelkedik társai közül. A legnépszerűbbek sorát a goji bogyó, az avokádó, a tengeri moszat és a lazac vezeti, ám a vargányáról, a rizsről vagy akár a sárgarépáról, padlizsánról már csak kevesen tudják, hogy szintén igazi szuperélelmiszerek, ráadásul itthon is megteremnek.\r\n\r\nE könyv szerzője nem kevesebbre vállalkozott, minthogy összegyűjtse mindazokat\r\na hazánkban fellelhető zöldségeket, gyümölcsöket, gabonaféléket és olajos magvakat, melyek szupererővel rendelkeznek, így méltán viselhetik a magyar superfood elnevezést. Dietetikusként hitelesen mutatja be értékes tápanyagtartalmukat, egészségünkre gyakorolt pozitív élettani hatásukat és változatos konyhai felhasználásukat. Mindezek mellett ahhoz is kellő bizonyítékkal szolgál, miért érdemes elsősorban a hazai szuperalapanyagokat beépíteni étkezésünkbe, és hogy ezzel a választással milyen sokat tehetünk a fenntartható, környezettudatos táplálkozás és életmód érdekében.\r\n\r\nA látványos, kedvcsináló fotókkal illusztrált kiadványban több mint száz hazai szuperélelmiszer, és a belőlük készült izgalmas, ínycsiklandó és egészséges finomság receptje kapott helyet. S, hogy az alapanyagok beszerzése se okozzon gondot,a hazai termőhelyekről, illetve az aktuálisan elérhető termények listájáról is tájékozódhatnak az olvasók. Tegyük változatossá, értékessé étkezésünket!', '239 oldal･cérnafűzött, keménytáblás･ISBN: 9786155417580', 'img/termekek/ID22-319235.jpg', 21, 1),
(55, '3', 0, 0, 'Jamie Oliver', 'Vega - Könnyű és finom zöldséges receptek', 'Park Kiadó', 2019, '8000', 'Jamie Oliver - a nemzetközi hírű, brit sztárszakács - ezúttal ízletes, növényi alapú ételekkel jelentkezik. Napjainkban mind többen szeretnénk az egészségünk, pénztárcánk vagy bolygónk védelmében növelni a zöldségfogyasztásunkat. A világ minden tájáról merített inspirációkkal ezek a zseniálisan egyszerű ételek a zöldségek igazi ünnepét jelentik, jóllakottá, elégedetté és boldoggá tesznek - a hús hiányát észre sem veszed. Ha heti egy-két húsmentes napot iktatnál be, vegetáriánus életmódot folytatsz, vagy csupán néhány remek, új ízkombinációval kísérleteznél, ez a könyv neked szól.\r\nMagyarul ez a 16. könyve.', '312 oldal･kemény kötés･ISBN: 9789633555477', 'img/termekek/ID22-314080.jpg', 3, 1),
(56, '4', 1, 30, 'Tittel Kinga', 'A Duna kincsei', 'KOLIBRI GYEREKKÖNYVKIADÓ KFT', 2020, '2700', 'Tudtad, hogy akár hajóval is közlekedhetnénk a 4-6-os villamos vonalán? Szerinted hol mérik meg a Duna vízszintjét? Milyen kincsek találhatók a Duna mélyén? Mit nevezünk Budapest kacsájának? És tudtad, a város tengeri kikötő?\r\n\r\nHa szeretnél többet is megtudni a Dunáról, ha érdekel a magyarországi hajózás története, vagy az elfeledett dunai szakmák, illetve minden, ami Európa leghosszabb folyójával kapcsolatos, ez a könyv épp Neked szól!\r\n\r\nA Mesélő Budapest zsebkönyv-sorozatának második része csodálatos körutazásra invitál: megmártózhatunk a régmúlt Duna-fürdőkben, kileshetjük a dunai aranyászok titkát, végül megpihenhetünk egy Buchwald-székben a csodálatos szőke - ám Strauss óta kék - Duna partján, hogy előkapjuk a zsebünkből A Duna kincseit, és onnan folytassuk egyedülálló felfedezőutunkat!', '196 oldal･füles, kartonált･ISBN: 9789634375470', 'img/termekek/ID22-320020.jpg', 28, 1),
(57, '4', 1, 30, 'Terri Libenson', 'Páratlan Jaime', 'Maxim Könyvkiadó', 2020, '2200', 'A hetedik osztály utolsó tanítási napján Jaime és Maya elgondolkodik azon, hogy kik az igazi barátaik. Jaime tudja, hogy valami nincs rendben szűk baráti körével. Az utóbbi időben kezdték kirekeszteni őt, és gúnyt űztek abból, ahogy öltözködik, abból, amiket szeret. Legjobb barátnőjére, Mayára legalább számíthat... Vagy mégsem? Maya egyre jobban haragszik Jaime-re, aki gyerekesnek tűnik a népszerű csoportjukat alkotó többi lányhoz képest. Úgy érzi, már semmi közös nincs benne és Jai-ben. Vajon legjobb-barátnő-napjaik meg vannak számlálva...?', '256 oldal･kemény kötés･ISBN: 9789634992189', 'img/termekek/ID22-319250.jpg', 2, 1),
(58, '4', 1, 30, 'Monika Wittman', 'Járművek a tanyán', 'Manó Könyvek', 2020, '800', 'Teó meglátogatja nagybátyját, Gyuri bácsit a tanyán, ahol nagyon sok jármű és szerszám van, melyek segítik a munkát - az ültetőgéptôl kezdve az arató-cséplő gépig. Teó azonban legszívesebben a traktort szereti vezetni.', '24 oldal･irkafűzött･ISBN: 9789634034315', 'img/termekek/ID22-309943.jpg', 2, 1),
(59, '6', 0, 0, 'Magyar Nagylexikon Kiadó', 'Általános kislexikon I-II.', 'Magyar Nagylexikon Kiadó', 2005, '4000', 'AZ ÁLTALÁNOS KISLEXIKON Ajánljuk az Általános Kislexikont Mindenkinek, akinek fontos az általános műveltség, a tájékozottság, a tudás. A családban bármikor szükség lehet egy könnyen forgatható lexikonra. Ha a gyermek a szülőnek tanulmányaival kapcsolatos kérdéseket tesz fel, gyors, pontos válasz adható a kétkötetes Általános Kislexikon segítségével, mert e két kötet tartalmazza mindazon ismereteket, amelyek az általános és középiskolai tanulmányok során felvetődnek. Így a szülők mellett a tanulók hasznos segédeszköze is. Rejtvényfejtés közben is hasznos tanácsadó lehet. Az Általános Kislexikon két kötetben tartalmazza az alapműveltséghez szükséges ismeretek széles tárházát az élet minden területéről. Mintegy 28.000 szócikket tartalmaz 7000 színes fotóval illusztrálva. A külföldi kiadású lexikonokkal szemben tartalma mintegy 40 százalékban magyar vonatkozású. Így például megtalálhatóak benne a magyar történelem legjelentősebb eseményei, magyar történelmi személyiségek, tudósok életrajza, továbbá Magyarország összes települése tömör leírása is. Az Általános Kislexikon tartalmazza az összes Nobel-díjasról készített listát, és a második kötet végén 32 oldalas világatlasz segíti a tájékozódást. Két kötetből áll, könnyen kezelhető, az íróasztalon is elfér, így kiválóan alkalmas mindennapi használatra. Az Általános Kislexikon olyan hiánypótló mű, amely nem hiányozhat egyetlen család könyvespolcáról sem.', '1974 oldal･díszkötés･ISBN: 9639257230', 'img/termekek/2000004403420.jpg', 10, 1),
(60, '6', 0, 0, 'Bakos Ferenc', 'Idegen szavak és kifejezések szótára + Net - 3 az egyben', 'Weöres Antikvárium', 2013, '6150', 'Az Idegen szavak és kifejezések kéziszótárának célja, hogy napjaink igényeihez igazodva összegyűjtse és bemutassa a magyar nyelvbe bekerült idegen szókészleti elemeket, tájékoztatást adjon a nyelvünkben szokásos írásmódjukról és kiejtésükről, számos szakmai és stílusbeli minősítéssel megmutassa azt a szövegkörnyezet, ahol helyesen és indokoltan használhatók. A szótár több mint 30 000 címszót tartalmaz. A szótár felöleli a magyar szövegekben a mindennapi használatban előforduló, jobbára még ma is idegennek érzett szavakat, szókapcsolatokat, tulajdonneveket és magyarázatukat többek között az informatika, jog, közgazdaságtan, a műszaki tudományok és a természettudományok területéről. Regisztrációt követően a szótár teljes anyaga elérhető 24 hónapig a www.szotar.net weboldalon. ', '724 oldal･kemény kötés･ISBN: 9789630592369', 'img/termekek/B1231594.jpg', 13, 1),
(61, '6', 0, 0, 'Rácz János', 'Növénynevek enciklopédiája ', 'TINTA KÖNYVKIADÓ KFT', 2013, '5400', 'A növények életünk fontos részét alkotják. Táplálékul szolgálnak, gyógyászati célra használjuk őket, nélkülözhetetlenek az iparban, sőt lakásunk, kertünk díszei is lehetnek.\r\nA Növénynevek enciklopédiája 760 szócikkében 1030 növénynév eredetét, etimológiáját ismerteti, és összefoglalja a növényről a legfontosabb tudnivalókat. A szócikk élén a vastag betűs növénynevek mellett rövid leírásuk szerepel, majd a növénynév latin megfelelője. A következő részből megtudhatjuk, mikor jelenik meg a növénynév nyelvünkben, mely fontosabb növénytani munkák és szótárak említik, és hogyan jött létre magyar, illetve latin szaknyelvi alakja. Számos vidékünk népnyelvi elnevezéseiről tájékozódhatunk, így például a búzavirág neve néhol kékvirág, égi virág vagy imola.\r\nA szócikk középső része ismerteti a növény kultúrtörténetét, elterjedésének útját, továbbá bemutatja gazdasági jelentőségét is. Az általános tudnivalók mellett, miszerint a bors Keletről származó fűszer, a len pedig az emberiség egyik legrégebben termesztett növénye, számos érdekességről olvashatunk. Megtudhatjuk, hogy a kávét valójában a kecskék szokatlan viselkedése nyomán fedezték fel, a ma néptápláléknak számító burgonyát eleinte még ingyen sem akarták elvinni, vagy a komlót a IX. századtól használják fel a serfőzésben. A szerző több esetben utal azokra a szépirodalmi alkotásokra is, amelyekben az adott növény szerepel.\r\nA szócikk befejező része a növény élettani hatását ismerteti. Így például gyógyászati célra használják a csodabogyót erős gyulladáscsökkentő, érszűkítő tulajdonsága miatt. A legenda szerint Marcus Aurelius hadseregét nadragulyával mérgezték meg. A padlizsán nemcsak sokféleképpen elkészíthető étel, hanem alacsony kalóriaértéke miatt fogyókúrás étrend részét képezheti. A néphit szerint afrodiziákum az ananász és a koriander mellett a napraforgó, a spárga, sőt a zeller is.\r\nA kötetet ajánljuk mindazoknak, akik többet szeretnének megtudni a növények nevéről és magukról a növényekről. Hasznos ismeretanyagot jelent a botanikusok és a nyelvészek számára is.\r\nRácz János nyelvész a magyar növénynévkutatás elismert szakembere, rendszeresen jelennek meg cikkei a Magyar Nyelvőrben, számos szakkönyv szerzője, több évtizedes kutatómunkájának eredményét foglalja össze a Növénynevek enciklopédiájában.', '812 oldal･keménytábla, védőborító･ISBN: 9789639902404', 'img/termekek/B868500.jpg', 0, 1),
(62, '7', 0, 0, 'Wolf Gábor', 'Kisvállalati marketing Biblia', 'MC Systems Kft.', 2017, '3400', 'A vállalkozásod fantasztikus!\r\nVevők özönlenek, mint a víz?\r\nTerjed a híred, mint a tűz?\r\nHa a vállalkozásod nem lett akkora durranás, mint amit induláskor megálmodtál, akkor egyetlen esélyed maradt, hogy mégis eljuss az üzleti mennyországba, és ezt az esélyt úgy hívják: marketing!\r\nItt az első MAGYAR marketing könyv, ami:\r\n- NEM multiknak szól - hanem mikró-, kis- és közepes vállalatoknak\r\n- NEM amerikai könyv fordítása - hanem 100% magyar tapasztalat,\r\n- NEM elméleti tananyag - hanem csupa példa és gyakorlati tipp', '310 oldal･puhatáblás, ragasztókötött･ISBN: 9789631217698', 'img/termekek/B118870.jpg', 0, 1),
(64, '7', 0, 0, 'Bence Balázs', 'A Sikeres Kereskedő - Vételi és eladási pontok, stratégiák, tőzsdepszichológia', 'Net Média Zrt', 2020, '6470', 'Egy tőzsdei könyv, ami nem aranyhalat akar rád sózni, hanem felruház a horgászás képességével, ami a befektetések világában a saját kereskedési módszer kialakítását jelenti. A sikeres kereskedő című könyv részletesen bemutatja a stratégia alkotóelemeit és kialakításának lépéseit. A stratégia a tőzsdei siker egyik fontos összetevője, mely önmagában keveset ér. Az eredményt nagyban befolyásoló egyéb tényezőkről általában kevesebb szó esik, pedig a kockázatkezelés, a pozícióméretezés, valamint az érzelmek világa nagyságrendileg határozzák meg, hogy ki mit visz haza a tőzsdeparkettről. Az átfogó kiadvány utóbbiakat is részletesen tárgyalja.\r\n\r\nAz olvasó megismeri a leggyakoribb kereskedési hibákat, és támpontot kap azok elkerüléséhez. A könyv feltárja, hogy mely tényezők befolyásolják gondolkodásunkat, tetteinket és döntéshozatali folyamatainkat a tőzsdei környezetben. A sikeres kereskedő az a könyv, mely minden tőzsdézés iránt érdeklődőnek, kezdő vagy bukdácsoló kereskedőnek kötelező olvasmány.', '348 oldal･cérnafűzött kartonált védőborítóval･ISBN: 9786150000640', 'img/termekek/ID22-300468.jpg', 1, 1),
(65, '8', 0, 0, 'Stephen King', 'Az Intézet', 'Európa Könyvkiadó', 2020, '4250', 'Az éjszaka közepén Luke Ellis szüleit brutálisan meggyilkolják a saját házukban, őt pedig elrabolják. Másnap Luke egy intézetben ébred egy ugyanolyan szobában, mint a sajátja, mellette pedig hasonló szobák nyílnak, bennük hasonló fiúkkal és lányokkal: mindannyian különleges természetfeletti képességekkel rendelkeznek. A szigorúan őrzött intézményt igazgató Mrs. Sigsby egyetlen célja könyörtelenül kinyerni a gyerekek erejét, akár kínzás árán is. Ahogy sorra tűnnek el társai, Luke érzi, menekülniük kell, azonban ebből az intézetből még soha senki nem szökött meg. Elindul a küzdelem a jó és a gonosz között egy olyan világban, ahol a jók nem mindig győzedelmeskedhetnek.\r\nAz intézet az utóbbi évek legijesztőbb és legjobb könyve a horror királyától rajongói és kritikusai szerint is. Hangulatában egyszerre idéződnek fel benne a nagy klasszikusok, a Carrie, A ragyogás, A tűzgyújtó és az Az.', '496 oldal･keménytábla, védőborító･ISBN: 9789635041718', 'img/termekek/ID22-317689.jpg', 39, 1),
(66, '8', 0, 0, 'Jussi Adler-Olsen', 'A 2117. áldozat', 'Animus Kiadó', 2020, '3740', 'Assad már több mint tíz éve a Q-ügyosztály tagja, de társai alig tudnak róla valamit. Ám egy váratlan esemény - egy spanyol újságíró cikke egy tragikus körülmények között elhunyt asszonyról - kibillenti az egyensúlyából, és Rose segítségére van szüksége ahhoz, hogy ne omoljon teljesen össze. Mint kiderül, az elhunyt nő sorsa összefonódik Assad családjának sorsával, és az eseményeket az iraki Ghaalib, a férfi régi ellensége irányítja.\r\nVersenyfutás kezdődik az idővel, hogy Ghaalibot és társait megakadályozzák abban, hogy Európa szívében terrortámadásokat hajtsanak végre.\r\nEzzel egy időben egy fiú, aki szobájába zárkózva a számítógépes játékok világában él, azt tervezi, hogy bosszút áll a mások szenvedései iránt közömbös dán társadalmon, és úgy dönt, hogy a szüleivel kezdi a sort...\r\nCarl Morcknek és munkatársainak minden ügyességüket és ravaszságukat be kell vetniük, hogy elhárítsák az ártatlan áldozatokra leselkedő veszélyt, és megmentsék Assad családját.', '437 oldal･füles, kartonált･ISBN: 9789633247716', 'img/termekek/ID22-319408.jpg', 9, 1),
(67, '9', 0, 0, 'Bódy Bence', 'Az SQL példákon keresztül - (Második kiadás)', 'Jedlik Oktatási Stúdió Bt.', 2019, '2099', 'Az SQL a relációs adatbázis-kezelők széles körben elterjedt lekérdezési nyelve. Viszonylag kevés utasítást tartalmaz, ám ezek igen bonyolult szerkezetet alkothatnak. Az SQL használatának megismeréséhez, elsajátításához ezért nagy segítséget nyújt egy szisztematikusan felépített példasorozat áttekintése.\r\n\r\nA könyv 33 feladatcsoportba rendezve közel 90 kidolgozott, fokozatosan nehezedő, valósághű feladaton keresztül vezeti be az Olvasót az SQL alkalmazásába. Az SQL megértését segíti, hogy minden feladatra több megoldás is található a példatárban. Az Olvasó tovább bővítheti az ismereteit a fejezetek végén lévő több, mint 100 gyakorló feladat egyéni kidolgozásával.\r\n\r\nA Szerző több évtizedes gyakorlati és oktatói tapasztalatát használta fel a példatár összeállításában és a példák kidolgozásában. A második kiadás a könyv első kiadásának az Olvasók visszajelzései alapján bővített, módosított változata.', 'MAGYAR - ANGOL･244 oldal･puhatáblás, ragasztókötött', 'img/termekek/ID22-313061.jpg', 3, 1),
(68, '9', 0, 0, 'Richard Blum', 'PHP, MySQL & JavaScript 7 könyv 1-ben', 'Taramix', 2020, '7500', 'Ezt a könyvet tekintsd egy kézikönyvnek.A könyvben az összes olyan különböző, dinamikus webalkalmazások létrehozásához használt technológiával foglalkozunk, amely képes adatokat nyomon követni, és rendezett és kellemes módon megjeleníteni azokat. Számos olyan témakörrel foglalkozunk, amellyel tisztában kell lenned ahhoz, hogy teljes funkcionalitású dinamikus webalkalmazásokat hozz létre: a web alapvető elrendezésének kialakítása; stílusának kezelése; dinamikus funkciók; szerverek kihasználása; adatok tárolása; teljes alkalmazások létrehozása; segítő programok használata.\r\nFőbb témakörök: 1.könyv:Ismerkedjünk meg a webprogramozással 2.könyv: HTML és a CSS3 3.könyv:JavaScript 4.könyv: PHP 5.könyv: MySQL 6. könyv: Készítsünk objektumorientált programokat 7. könyv: Használjunk PHP-keretrendszereket Letölthető kódok', '790 oldal･karton･ISBN: 9786155186721', 'img/termekek/ID22-318847.jpg', 43, 1),
(70, '4', 1, 30, 'Agócs Írisz', 'Rajzolj egy krumplit!', '', 2020, '3200', 'Rajzolj egy fáradt krumplit! Egy könyvet, amiben efféle mondatok vannak, csak szeretni lehet. Ez pedig pont egy ilyen könyv! Ráadásul krumplit rajzolni mindenki tud - ellentétben a Rendes Körrel, amit csak viszonylag kevesen. De nyugalom: ezeken az oldalakon Rendes Körökről szó sem esik! Arról viszont annál inkább, hogy egy (fáradt, jókedvű, gömbölyű, esetleg hosszúkás) krumpliból bármi lehet: medve, mókus, lajhár, csiga vagy akár még krokodil is! Tényleg bármi! És mindehhez csak néhány vonalra van szükség - na meg Agócs Írisz jókedvére és kifogyhatatlan ötleteire. Úgyhogy szerintem mindenki bátran ragadjon papírt meg ceruzát, és a szerző segítségével próbálja ki: egy krumpliból hogyan lehet valóban: BÁRMI. És higgyék el nekem: aki így tesz, az egészen biztosan rájön egy nagyon fontos dologra (amit e könyv írója és rajzolója már régen tud): hogy sokkal kerekebb a világ, ha krumpli alakú!\"', '63 oldal･cérnafűzött, keménytáblás･ISBN: 9789634106524', 'img/termekek/ID22-320276.jpg', 12, 1),
(71, '4', 1, 30, 'Fiep Westendorp Annie M. G. Schmidt', 'Szutyoksári', 'Pozsonyi Pagony', 2015, '3000', 'Hogy kicsoda Szutyoksári? A világ legmaszatosabb kislánya. Hiába fürdik állandóan, újra meg újra valamilyen kalamajkába keveredik a kutyájával, Koszmókkal együtt, aminek a végén rendszerint piszkosabbak lesznek, mint valaha. Annie M. G. Schmidt minden idők leghíresebb holland meseírója, és állandó illusztrátortársa, Fiep Westendorp lehengerlő humorú könyve a minden lében kanál, bajkeverő kislányról és kutyájáról saját hazájában igazi klasszikusnak számít.', '93 oldal･cérnafűzött, keménytáblás･ISBN: 9789634105374', 'img/termekek/B977385.jpg', 4, 1),
(72, '5', 1, 70, 'Gárdonyi Géza', 'Egri Csillagok', 'ALEXANDRA KÖNYVESHÁZ KFT', 2019, '4000', '1552. Magyarország három részre szakadt. A félelmetes Oszmán Birodalom az elmúlt évtizedek során minden ellenállást legyűrt, oda Buda, és a legyőzhetetlennek tűnő török hadak újabb és újabb erősségeket foglalnak el. Csak Eger vára áll ellen, ahol a kicsiny, de elszánt védősereg minden fortélyt bevet, és mindent feláldoz, hogy megakadályozza az ország végromlását...\r\n\r\nGárdonyi Géza eleven klasszikusa a magyar történelem legválságosabb korszakába visz minket, és a regény felejthetetlen hőseinek történetein keresztül megismerhetjük a mohácsi vereséget követő évtizedek véres zűrzavarát, amikor az ország puszta léte is kockán forgott. Az Egri csillagok több mint egy évszázada méltán az egymást követő nemzedékek egyik kedvenc olvasmánya, és új kiadásunkban szemet gyönyörködtető illusztrációk elevenítik meg a 16. századi Magyarországot és az egri védők élet-halál harcát.', '528 oldal･cérnafűzött, keménytáblás･ISBN: 9789634474937', 'img/termekek/ID22-315646.jpg', 4, 1),
(73, '5', 0, 0, 'Mikszáth Kálmán', 'Szent Péter esernyője', 'Holnap Kiadó', 2020, '2450', 'Meghalt Gregorics Pál, az öreg, magányos különc, s legendás vagyont hagyott hátra. Legalábbis így tudta a város - Beszterve -, s így hitték a meghalt nábob fivérei is. Mohó kincsvággyal csaptak le az örökségre - hanem a vélt aranyhegy helyén nem találtak semmit. Hová lett a csehországi uradalom, hová a vagyon? Eltűnt, nyoma veszett, mintha soha nem is lett volna. Pedig volt! Wibra György, a neves, fiatal besztercei ügyvéd, Gregorics szolgálójának fia nyomra lel: az öregúr minden vagyonát egy bankutalvánnyá alakította át azért, hogy kapzsi fivérei rá ne tehessék a kezüket - az utalványt pedig neki szánta. Elindul, hogy megkeresse örökségét, de értékesebb kincset talál: egy leány szerető szívét. Wibra Gyuri és Bélyi Veronka könnyes-mosolygós szerelmének története Mikszáth egyik legkedvesebb, legromantikusabb műve.', '208 oldal･kemény kötés･ISBN: 9789633493182', 'img/termekek/ID22-320072.jpg', 2, 1),
(74, '5', 0, 0, 'Móricz Zsigmond', 'Légy jó mindhalálig', 'Akkord Kiadó', 2010, '900', 'A Légy jó mindhalálig (1920) egyik legszebb regénye Móricznak, s talán legtöbbet forgatott műve. Fiatalok és idősek egyaránt szívesen olvassák vagy olvassák újra. Szinte részévé vált életünknek, mindenki megismerkedett vele gyermekkorában. A gyorsan múló idő, a tovatűnő ifjúság ellenére kitörölhetetlenül nyomot hagy bennünk Nyilas Misi sorsa, a debreceni kollégium, a könyv teljes világa. A remekművek titka a lélek legmélyén keresendő: a Légy jó mindhalálig a mindenkiben meglévő vagy megbújó jóra való törekvés álmát és valóságát idézi meg s üzen könyörtelen hadat a jóra való restségnek... Az írót ért igazságtalanságok Nyilas Misi sorsában fogalmazódnak meg. És amit a kisdiák annyi méltatlan szenvedés után szeretne, hogy emberiség tanítója legyen, azt akarja végül is Móricz minden sorával. A valóság ábrázolásán, sorsok és érzések felejthetetlen fölmutatásán túl a nagy író életművének egyetlen mondatban összefoglalható üzenete minden embernek és minden magyarnak: légy jó mindhalálig!', '284 oldal･puhatáblás, ragasztókötött･ISBN: 9789632520315', 'img/termekek/B32511.jpg', 11, 1),
(75, '5', 0, 0, 'Tamási Áron', 'Ábel a rengetegben', 'Ciceró Könyvstúdió Kft.', 2007, '1500', 'A 16 éves Ábel, a havasi pásztor, a népmesei ihletésű főhős, aki gyermeki szabadságának elvesztését nem hajlandó tudomásul venni, sok veszélyes helyzetbe kerül, de mindig helytáll, akár a természt erőivel, akár a korabeli hatalmasságokkal kerül is szembe. A fél esztendeig tartó próbatétel után felhagy a pásztorkodással, és hű kutyájával, Bolhával együtt elindul az igazság keresésére: \"a szegények és a elnyomottak zászlaját fogom öröké hordozni, bármerre vezéreljen is az utam\" - mondja a regény befejező soraiban.', '188 oldal･puhatáblás, ragasztókötött･ISBN: 9799635394479', 'img/termekek/2000006299100.jpg', 6, 1),
(76, '5', 0, 0, 'Homérosz', 'Odüsszeia - Európa diákkönyvtár', 'Európa Könyvkiadó', 1994, '1000', 'A könyv Odüsszeusz bolyongását beszéli el, tíz évig tartó útját haza, Ithakába, ahol hűségesen várja őt hitvese, Pénelopé, kapzsi kérők hadától körülvéve. Bolyongásai közben csodás kalandokat él át, szerelmekkel, varázslókkal, szörnyekkel találkozik, sőt még az alvilágba is leereszkedik, s ott viszontlátja halott bajtársait. \"Az Íliász a jelenvalóság költeménye\" - mondja Szerb Antal. \"Az Odüsszeia a távolság eposza, az utazásé. Az első romantikus mű, azt lehetne mondani, mert benne jelenik meg először a nosztalgia. Egyik angol fordítója pedig úgy jellemzi, hogy ez az első regény, és noha a regények hosszú sora követi, egyáltalán nem bizonyos, hogy nem a legjobb-e. De nemcsak azért nem avul el soha - figyelmeztet Devecseri Gábor -, ami a világirodalom nagy regényeivel közös sajátsága, hanem azért is, ami a regénytől megkülönbözteti. Az eposz -az a varázsszőnyeg, mely, akármilyen roppant nagy is a kerülete, repülni tud -, mert vers volta röpíti: a szereplői egész nagy hadát könnyen hordja a hátán.\"', '377 oldal･papír / puha kötés･jó állapotú antikvár könyv', 'img/termekek/2000000202790.jpg', 20, 1),
(81, '9', 0, 12, 'asdasdasdasdasdasdasdas', 'dasdasd', 'Holnap Kiadó', 1992, '2000', 'asdad', 'adasdas', 'img/termekek/ID22-296074.jpg', 20, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vevo_adatok`
--

CREATE TABLE `vevo_adatok` (
  `id` int(9) NOT NULL,
  `user` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `v_nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `k_nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `pwd` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `szallit_irsz` int(4) NOT NULL,
  `szallit_telepules` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szallit_utca` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szallit_hazszam` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vevo_adatok`
--

INSERT INTO `vevo_adatok` (`id`, `user`, `v_nev`, `k_nev`, `email`, `pwd`, `tel`, `szallit_irsz`, `szallit_telepules`, `szallit_utca`, `szallit_hazszam`) VALUES
(1, 'teszt', 'Gazdag', 'Gergő', 'chros@hotmail.hu', '', '304550820', 1234, 'Budapest', 'Sehol utca', '11111');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vevo_rend_term`
--

CREATE TABLE `vevo_rend_term` (
  `id` int(5) NOT NULL,
  `rendeles_id` int(5) NOT NULL,
  `termek_id` int(5) NOT NULL,
  `db` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vevo_rend_term`
--

INSERT INTO `vevo_rend_term` (`id`, `rendeles_id`, `termek_id`, `db`) VALUES
(1, 1, 47, 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adatok`
--
ALTER TABLE `adatok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `ajanlatkeres`
--
ALTER TABLE `ajanlatkeres`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tajekoztatok`
--
ALTER TABLE `tajekoztatok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `vevo_adatok`
--
ALTER TABLE `vevo_adatok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `vevo_rend_term`
--
ALTER TABLE `vevo_rend_term`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `adatok`
--
ALTER TABLE `adatok`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `ajanlatkeres`
--
ALTER TABLE `ajanlatkeres`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `tajekoztatok`
--
ALTER TABLE `tajekoztatok`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT a táblához `vevo_adatok`
--
ALTER TABLE `vevo_adatok`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `vevo_rend_term`
--
ALTER TABLE `vevo_rend_term`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
