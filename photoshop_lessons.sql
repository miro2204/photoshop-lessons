-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 06 2015 г., 15:59
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `photoshop_lessons`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tittle` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `Categories`
--

INSERT INTO `Categories` (`id`, `tittle`, `meta_d`, `meta_k`, `text`) VALUES
(1, 'Retusz zdjęć / fotomontaż', 'Retusz zdjęć / fotomontaż', 'Retusz zdjęć / fotomontaż', '<h3 style="text-align: center;"><span style="font-size:24px"><strong>Retusz zdjęć / fotomontaż</strong></span></h3>\r\n'),
(2, 'Retusz twarzy / ciała', 'Retusz twarzy / ciała', 'Retusz twarzy / ciała', '<p style="text-align:center"><span style="font-size:26px"><strong>Retusz twarzy / ciała</strong></span></p>\r\n'),
(3, 'Retro', 'Retro', 'Retro', '<p style="text-align: center;"><span style="font-size:26px"><strong>Retro</strong></span></p>\r\n'),
(4, 'Portret', 'Portret', 'Portret', '<p style="text-align: center;"><strong><span style="font-size:24px">Portret</span></strong></p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `post` int(6) NOT NULL,
  `author` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post` (`post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `comments_settings`
--

CREATE TABLE IF NOT EXISTS `comments_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `sum` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `comments_settings`
--

INSERT INTO `comments_settings` (`id`, `img`, `sum`) VALUES
(1, 'images/sum.png', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cat` int(1) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `view` int(7) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `mini_img` varchar(255) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat` (`cat`),
  KEY `id` (`id`),
  KEY `tittle` (`tittle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `cat`, `meta_d`, `meta_k`, `description`, `text`, `view`, `author`, `date`, `mini_img`, `tittle`) VALUES
(1, 3, 'Dodawanie cienia do obiektu', 'Dodawanie cienia do obiektu', '<h3>Dodawanie cienia do obiektu</h3>\r\n', '<h3 style="text-align:center">&nbsp;</h3>\r\n\r\n<p style="text-align:center"><img alt="альтернативный текст" src="lessons/12.03.2015/Dodawanie cienia do obiektu/1.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p><span style="font-size:18px">Czas trwania - ok 10 minut Poziom trudności - podstawowy Zaczynamy od tego, że ze zdjęcia wycinamy obiekt, kt&oacute;ry nas interesuje i wklejamy go do nowego pliku. Będzie się o wiele łatwiej pracowało:</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="альтернативный текст" src="lessons/12.03.2015/Dodawanie cienia do obiektu/2.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p><span style="font-size:18px">Teraz powielamy warstwę wciskając CTRL+J i nowo powstałą warstwę przenosimy poniżej warstwy właściwej :</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="альтернативный текст" src="lessons/12.03.2015/Dodawanie cienia do obiektu/3.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p><span style="font-size:18px">Pracujemy teraz na warstwie &quot;Cień&quot; (jeśli nie zmieniamy nazwy będzie to &quot;Warstwa 1 kopia&quot;). Zaznaczamy całą butelkę, z g&oacute;rnego menu wybieramy &quot; Warstwa--&gt;Styl Warswy--&gt;Opcje mieszania&quot; (Layer--&gt;Layer Style--&gt;Blending mode) i ustawiamy Nałożenie koloru (czarnego):</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="альтернативный текст" src="lessons/12.03.2015/Dodawanie cienia do obiektu/4.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p><span style="font-size:18px">Teraz zmieniamy krycie warstwy na ok 35-40 %, nasz obiekt powinien wyglądać następująco:</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="альтернативный текст" src="lessons/12.03.2015/Dodawanie cienia do obiektu/5.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p><span style="font-size:18px">Wybieramy z g&oacute;rnego menu &quot;Edycja--&gt;Przekształć--&gt;Zniekształcenie&quot; (Edit--&gt;Transform--&gt;Distort) i ustalamy jak ma wyglądać nasz cień. Np tak:</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="альтернативный текст" src="lessons/12.03.2015/Dodawanie cienia do obiektu/6.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p><span style="font-size:18px">Teraz wybieramy &quot;Filtr--Rozmycie--Rozmycie Gaussowskie&quot; (Filter--Blur--Gaussian Blur) i ustawiamy promień na ok 4-5 % i cień powinien być gotowy. Dla lepszego efektu możemy użyć jeszcze gumki (ustawiając krycie gumki na g&oacute;rze na ok 10%) i rozjaśnić nieco g&oacute;rę butelki. Końcowy efekt wygląda tak:</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="альтернативный текст" src="lessons/12.03.2015/Dodawanie cienia do obiektu/7.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n', 14, 'Myroslav', '2015-03-12', 'lessons/12.03.2015/Dodawanie cienia do obiektu/mini.jpg', 'Dodawanie cienia do obiektu'),
(2, 1, 'Efekt Polaroid', 'Efekt Polaroid', '<p>Efekt Polaroid</p>\r\n', '<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/1.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p style="text-align:center">Poziom - średnio zaawansowany</p>\r\n\r\n<p style="text-align:center">Czas wykonania - ok 20-30 minut</p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Otwieramy zdjęcie do edycji i wciskamy CTRL+J aby skopiować warstwę. Teraz pomiędzy dwie warstwy, kt&oacute;re otrzymaliśmy wstawiamy nową pustą warstwę. W tym celu zaznaczamy warstwę &quot;Tło&quot; i z g&oacute;rnego menu wybieramy Warstwa--&gt;Nowa--&gt;Warstwa (Layer--&gt;New--&gt;Layer):</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/2.jpg" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Teraz zaznaczamy warstwę 2 (tą po środku) i wypełniamy ją czarnym kolorem. Wybieramy czarny kolor pierwszego planu a następnie &quot;Wiadro z farbą&quot; (Paint Bucket Tool) i klikamy na warstwę:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/3.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Następnie tworzymy kolejną nową warstwę (umiejscawiamy ją pomiędzy warstwą, kt&oacute;rą zaznaczyliśmy na czarno i skopiowaną warstwą tła). Aby to osiągnąć zaznaczamy warstwę drugą i ponawiamy to co robiliśmy wcześniej, czyli z g&oacute;rnego menu wybieramy Warstwa--&gt;Nowa--&gt;Warstwa (Layer--&gt;New--&gt;Layer):</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/4.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Teraz (mając zaznaczoną warstwę 3) z menu po lewej stronie wybieramy Zaznaczanie Prostokątne (Rectangular Marquee Tool) i zaznaczamy taką część zdjęcia, kt&oacute;ra będzie stanowić jedno(pierwsze) ze zdjęć polaroidowych, nastepnie wciskamy ALT+BACKSPACE (efekt&oacute;w nie powinno być widać bo są zasłonięte przez &quot;warstwę 1&quot;):</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/4.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Dlatego teraz zaznaczamy wspomnianą wcześniej warstwę 1 i wciskamy ALT+CTRL+G (albo wybieramy Warstwa--&gt;Utw&oacute;rz maskę przycinającą // Layer--&gt; Create Clipping Mask). Nasze zdjęcie powinno wyglądać tak:</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/5.jpg" /></p>\r\n\r\n<p>Teraz ponownie zaznaczamy &quot;Warstwę 2&quot; i tworzymy nową warstwę(warstwa 4), kt&oacute;ra będzie się znajdować pomiędzy warstwą 2 i 3, następnie ponownie wybieramy narzędzie &quot;Zaznaczanie prostokątne&quot; i wycinamy kontury zdjęcia polaroidowego. Przyszła kolej na wypełnienie tego miejsca kolorem białym - wciskamy CTRL+BACKSPACE a następnie CTRL+D. Powinniśmy otrzymać nasze pierwsze zdjęcie a&#39; la polaroid :)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/6.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Pora na dodanie delikatnego efektu dla naszego zdjęcia: Mając zaznaczoną warstwę 4 wybieramy z menu g&oacute;rnego Warstwa--&gt;Styl warstwy--&gt;Cień (Layer--&gt;Layer Style --&gt;Shadow) i ustawiamy parametry tak jak na obrazku poniżej:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/7.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Możemy też nieco obr&oacute;cić nasze zdjęcie, aby uzyskać ciekawszy efekt. W tym celu wciskamy SHIFT i zaznaczamy warstwę 4 i 3 (obie powinny podświetlić się na niebiesko). Wciskamy CTRL+T i obracamy wg własnego uznania, kończymy wciskając ENTER. Następnie będziemy grupować warstwy. Aby to zrobić trzymając wcisnięty SHIFT zaznaczamy warstwę 1, 3 i 4 (podświetlają się na niebiesko) a następnie wciskamy CTRL+G. Gdy się już nam utworzy grupa:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/8.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>zaznaczamy ją i kopiujemy (wciskamy prawy klawisz myszki i wciskamy &quot;powiel grupę&quot;/ copy group). Zaznaczamy &quot;Grupa 1 kopia&quot; i otwieramy jej zawartość, trzymając wciśnięty SHIFT zaznaczamy &quot;warstwa 3 kopia&quot; i &quot;warstwa 4 kopia&quot; wciskamy CTRL+T i tworzymy 2 zdjęcie polaroidowe, na końcu wciskając ENTER. Tą samą czynność (kopiowanie grupy 1) powtarzamy dowolną ilość razy, aż nie uzyskamy efektu, jaki chcieliśmy uzyskać. Możemy podziwiać nasze efekty:)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Efekt Polaroid/8.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n', 8, 'Myroslav', '2015-03-13', 'lessons/12.03.2015/Efekt Polaroid/mini.jpg', 'Efekt Polaroid'),
(3, 1, 'Rozmycie w ruchu', 'Rozmycie w ruchu', 'Rozmycie w ruchu', '<p style="text-align: center;"><img src="lessons/12.03.2015/Rozmycie w ruchu/1.jpg" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Poziom trudności - średnio zaawansowany Czas trwania - ok 10-15 minut Na dobry początek otwieramy zdjęcie, kt&oacute;re będziemy chcieli edytować i wciskamy CTRL+J aby powielić warstwę:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align: center;"><img src="lessons/12.03.2015/Rozmycie w ruchu/2.jpg" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Teraz kolej na etap drugi. Wybieramy z palety kolor&oacute;w niebieski (np.: #2f50de ) i ustawiamy go jako kolor pierwszoplanowy (foreground):</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align: center;"><img src="lessons/12.03.2015/Rozmycie w ruchu/3.jpg" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Następnie z g&oacute;rnego menu wybieramy Warstwa--&gt;Nowa warstwa dopasowania (Layer--&gt;New adjustment layer) a następnie wybieramy &quot;Barwa/Nasycenie&quot; (Hue/Saturation) zaznaczamy koloruj i ustawiamy parametry tak jak na zamieszczonym obrazku, na sam koniec zmniejszamy krycie warstwy wg upodobań (ok 70%):</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align: center;"><img src="lessons/12.03.2015/Rozmycie w ruchu/4.jpg" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Zaznaczamy &quot;Warstwę 1&quot; bo teraz na niej będziemy pracować i wybieramy z zakładek Filtr--&gt;Rozmycie--&gt;Poruszenie (Filter--&gt;Blur--&gt;Motion blur) i ustawiamy parametry tak jak na obrazku poniżej (kąt ok -35 do -45 a odległość na około 25-35 pikseli):</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align: center;"><img src="lessons/12.03.2015/Rozmycie w ruchu/5.jpg" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Teraz wybieramy z g&oacute;rnego menu Warstwa--&gt;Maska warstwy --&gt;Pokaż wszystko(Layer--&gt;Layer mask--&gt;Show all) Z menu po lewej wybieramy pędzel (B) i ustawiamy na kolor czarny. Pedzlem zaznaczamy postać na pierwszym planie (tam gdzie klikniemy powinniśmy usuwać rozmycie). Gdy już zaznaczymy całość nasze zdjęcie jest gotowe:)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align: center;"><img src="lessons/12.03.2015/Rozmycie w ruchu/6.jpg" /></p>\r\n', 3, 'Myroslav', '2015-03-13', 'lessons/12.03.2015/Rozmycie w ruchu/mini.jpg', 'Rozmycie w ruchu'),
(4, 1, 'Ramka do zdjęcia', 'Ramka do zdjęcia', 'Ramka do zdjęcia', '<p style="text-align:center"><img src="lessons/12.03.2015/Ramka do zdjęcia/1.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center">Poziom trudności - średnio zaawansowany</p>\r\n\r\n<p style="text-align:center">Czas wykonania - ok 10 minut</p>\r\n\r\n<p style="text-align:center">W tym tutorialu pokażemy jak w dość łatwy spos&oacute;b stworzyć oryginalną ramkę do zdjecia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Gdy już otworzymy zdjęcie, kt&oacute;re będziemy edytować,tworzymy kopię warstwy wciskając CTRL+J oraz tworzymy nową warstwę (Warsta--&gt;Nowa--&gt;Warstwa// Layer--&gt;New--&gt;Layer), wypełniamy ją białym kolorem i umieszczamy pomiędzy Warstwami &quot;Tło&quot; i &quot;warstwa 1&quot;:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Ramka do zdjęcia/2.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Z menu po lewej stronie wybieramy &quot;Zaznaczanie prostokatne&quot; (Rectangular Marquee Tool) lub wciskamy &quot;M&quot; i zaznaczamy nim prostokąt o wymiarach nieco mniejszych niż nasze zdjęcie:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Ramka do zdjęcia/3.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Teraz zaznaczamy odwrotność wciskając CTRL+SHIFT+I. Następnie z samego dołu menu po lewej stronie wybieramy &quot;edytuj w trybie szybkiej maski&quot; (Quick Mask) lub wciskamy Q, obraz po środku powinien zaznaczyć się na czerwono:</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Ramka do zdjęcia/4.jpg" /></p>\r\n\r\n<p>Następnym krokiem jest wybranie z g&oacute;rnego menu Filtr--&gt;Zniekształecenie--&gt;Falowanie (Filter--&gt;Dissort--&gt;Ripple)ustawiamy Fale na duże, a następnie wartość pomiędzy minus 100 a 150:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Ramka do zdjęcia/5.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Odznaczamy teraz tryb maski i wciskamy delete(pamiętając, że pracujemy na warstwie 1), ramka jest już gotowa:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Ramka do zdjęcia/6.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Naszą ramkę można modyfikować na r&oacute;żne sposoby.Np przed odznaczeniem szybkiej maski wybrać z menu Filtr--&gt;Galeria Filtr&oacute;w--&gt;Morskie Fale (Filter--&gt;Filter Gallery--&gt;Ocean Ripple) i ustawić parametry wg własnego uznania. Np w ten spos&oacute;b:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Ramka do zdjęcia/7.jpg" /></p>\r\n', 2, 'Myroslav', '2015-03-13', 'lessons/12.03.2015/Ramka do zdjęcia/mini.jpg', 'Ramka do zdjęcia'),
(5, 1, 'Zdjęcie w stylu retro', 'Zdjęcie w stylu retro', '<p>Zdjęcie w stylu retro</p>\r\n', '<p style="text-align:center"><img src="lessons/12.03.2015/Zdjęcie w stylu retro/1.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p style="text-align:center">Poziom trudności - średniozaawansowany</p>\r\n\r\n<p style="text-align:center">Czas wykonania - ok 10-15 minut</p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Zobacz więcej tutoriali w kategorii RETRO Gdy już otworzymy zdjęcie, kt&oacute;re chcemy edytować kopiujemy je poprzez wciśnięcie CTRL+J. Teraz usuwamy kolory ze zdjęcia wybierając z menu g&oacute;rnego Obraz--&gt;Dopasowania--&gt;Zmniejsz nasycenie (Image--&gt;Adjustments--&gt;Desaturate)lub po prostu wciskamy SHIFT+CTRL+U.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Zdjęcie w stylu retro/2.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Teraz kolej na następny krok. Z g&oacute;rnego menu wybieramy Filtr--&gt;Galeria Filtr&oacute;w--&gt;Ziarno (Filter--&gt;filter gallery--&gt;Grain). W zakładce &quot;rodzaj ziarna&quot; wybieramy &quot;Pionowe&quot; (Vertical) i ustawiamy parametry wg własnego uzniania (wg mnie najlepsze efekty można uzyskać przy intensywności ok 15-25 i kontraście ok 5-10). Tak jak na zdjęciu:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Zdjęcie w stylu retro/3.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Kolejnym etapem jest dodanie szumu. Z g&oacute;rnego menu wybieramy Filtr--&gt;Szum--&gt;dodaj szum (Filter--&gt;Noise--&gt;Add noise)i ustawiamy parametry na ok 5-15%, zaznaczamy &quot;rozmieszczenie gaussowskie&quot; i &quot;monochromatyczny&quot;. Tak jak na zdjęciu:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Zdjęcie w stylu retro/4.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Następnie wybieramy z menu Filtr--&gt;Rozmycie--&gt;Rozmycie Gaussowskie (Filter--&gt;Blur--&gt;Gaussian Blur) i ustawiamy promień na ok 0,7-1,2 piksele:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Zdjęcie w stylu retro/5.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Powoli zbliżamy się do końca naszego tutoriala. Przedostatni etap polega na dodaniu filtru fotograficznego. Z menu wybieramy Obraz--&gt;Dopasowania--&gt;Filtr Fotograficzny (Image--&gt;Adjustments--&gt;Photo Filter) Ustawiamy filtr ciepły oraz ustawiamy gestość na ok 30-35%.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Zdjęcie w stylu retro/6.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>I na sam koniec wprowadzamy delikatną korektę. Z menu wybieramy Obraz--&gt;Dopasowania--&gt;Jasność/Kontrast (Image--&gt;Adjustments--&gt;Brightness/Contrast) i ustawiamy Kontrast na ok 40-60 Tak będzie wyglądać nasze retro zdjęcie:) Do takiego zdjęcia można dodać także ramkę,kt&oacute;ra będzie opisana w następnym tutorialu:)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img src="lessons/12.03.2015/Zdjęcie w stylu retro/7.jpg" /></p>\r\n', 35, 'Myroslav', '2015-03-13', 'lessons/12.03.2015/Zdjęcie w stylu retro/mini.jpg', 'Zdjęcie w stylu retro');

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `str` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `str`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(3) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `tittle`, `meta_d`, `meta_k`, `text`, `page`) VALUES
(0, 'WITAMY W ŚWIECIE LEKCJI ADOBE PHOTOSHOP!', 'PHOTOSHOP', 'PHOTOSHOP', '<p style="text-align:center"><span style="font-size:24px"><strong>WITAMY W ŚWIECIE LEKCJI ADOBE PHOTOSHOP! </strong></span></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p><span style="font-size:20px">Photoshop - to niesamowity program uniwersalny, lider w branży grafiki i projektowania. Photoshop - to nieskończone możliwości, setki narzędzi, zawiera tysiące milion&oacute;w efekt&oacute;w. Dlatego nawet najbardziej zaawansowane guru nie wiem wszystkiego o Photoshopie. Na pierwszy rzut oka wydaje się, że Photoshop nie może wygrać? Wyrzuć tę myśl z głowy - to dlaczego przyszedł do Internetu, aby wyciągnąć wnioski, kt&oacute;re są w przeważającej mierze reprezentowane na naszej stronie. Uwierz mi, Photoshop wkr&oacute;tce stać się prawdziwym przyjacielem i niezbędnym narzędziem.</span></p>\r\n', 'index');

-- --------------------------------------------------------

--
-- Структура таблицы `userlist`
--

CREATE TABLE IF NOT EXISTS `userlist` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `userlist`
--

INSERT INTO `userlist` (`id`, `user`, `pass`) VALUES
(1, 'miro', '1992');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post`) REFERENCES `data` (`id`);

--
-- Ограничения внешнего ключа таблицы `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
