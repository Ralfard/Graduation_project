-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 12 2023 г., 11:09
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tut_byl_ya`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `name`, `mail`, `password`) VALUES
(1, 'qwerty', 'Ефимов Роман', 'example@mail.ru', 'qwerty123'),
(2, 'asdfg', 'asdfg', 'asdfg@mail.ru', 'asdfg');

-- --------------------------------------------------------

--
-- Структура таблицы `admins__rights`
--

CREATE TABLE `admins__rights` (
  `id` int NOT NULL,
  `managing_administrators` tinyint(1) NOT NULL DEFAULT '0',
  `artiles_moderation` tinyint(1) NOT NULL DEFAULT '0',
  `managing_users` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `admins__rights`
--

INSERT INTO `admins__rights` (`id`, `managing_administrators`, `artiles_moderation`, `managing_users`) VALUES
(1, 1, 1, 1),
(2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `articleImages`
--

CREATE TABLE `articleImages` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `img_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articleImages`
--

INSERT INTO `articleImages` (`id`, `article_id`, `img_name`) VALUES
(46, 90, '90-9026991.jpg'),
(47, 90, '90-907252.jpg'),
(48, 90, '90-9025705.jpg'),
(49, 91, '91-915556.jpg'),
(50, 92, '92-9217656.jpg'),
(51, 92, '92-9217140.jpg'),
(52, 92, '92-92487.jpg'),
(53, 92, '92-924424.jpg'),
(54, 92, '92-927500.jpg'),
(55, 92, '92-929190.jpg'),
(56, 92, '92-9210251.jpg'),
(57, 93, '93-933676.jpg'),
(58, 94, '94-948851.jpg'),
(59, 94, '94-9429342.jpg'),
(60, 94, '94-9418255.jpg'),
(61, 94, '94-9423159.jpg'),
(62, 107, '107-10718640.jpg'),
(63, 108, '108-1089358.jpg'),
(64, 108, '108-10816660.jpg'),
(65, 108, '108-10813731.jpg'),
(66, 109, '109-10921933.jpg'),
(67, 110, '110-1104087.jpg'),
(68, 110, '110-11017063.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `title` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `topic` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date` date NOT NULL,
  `img_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `likes` int NOT NULL DEFAULT '0',
  `views` int NOT NULL DEFAULT '0',
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `moderated` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `title`, `content`, `topic`, `date`, `img_name`, `likes`, `views`, `description`, `moderated`) VALUES
(90, 2, 'Московские суды начали принимать иски через МФЦ', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">Московские суды начали принимать иски через МФЦ</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Центры государственных услуг начали принимать исковые заявления в столичные суды, а также стали помогать в ознакомлении с материалами дел. Непонятно только зачем. Давайте разберемся.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">«Стремительными темпами в столице развиваются цифровые технологии. Для жителей и гостей столицы доступна новая услуга в 130 многофункциональных центрах государственных услуг по реализации их процессуальных прав в 35 районных судах столицы и в Московском городском суде… Также можно подать исковые заявления и другие документы в суды общей юрисдикции в электронном виде, ознакомиться с аудиозаписью судебных заседаний и материалами электронных дел, получить электронные исполнительные листы Федеральной службы судебных приставов (ФССП)», — указали в Мосгорсуде.\r\nЧтобы воспользоваться нововведением, пользователям нужно иметь подтвержденную учетную запись в сервисе «Мои документы».\r\n\r\n«У сотрудников центров «Мои документы» граждане могут получить консультации по вопросам работы дополнительных сервисов «Интерактивный помощник», «Модуль определения подсудности», «Калькулятор пошлин», а также получить помощь в авторизации и навигации на сайте gosuslugi.ru», — указали в суде.\r\n\r\nНемного не понятно, зачем идти в МФЦ, чтобы подать иск, когда можно это сделать, не отходя от компьютера на сайте Мосгорсуда. А если нужно подать в региональные суды есть отличная платформа ГАС «Правосудие». Для таких подач нужна лишь учетная запись в госуслугах.</p></div><div class=\"flex-row\"><h3 class=\"article__content-h3\">Оффтоп</h3></div><div class=\"flex-row\"><p class=\"article__content-p\">У меня пару месяцев назад пропала история обращений в ГАС «Правосудие». То есть, я никак не мог подтвердить подачу документов.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">и пустота\r\nПисал в поддержку, ответа не было. Решил написать в Судебный департамент при Верховном Суде РФ. Примечательно, что ответ получил на следующий день, а не в течение 30-ти как обычно.</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Вот получил такой ответ:</h2></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">То есть нужно, не заполняя никаких полей, нажать кнопку «Найти». 5 баллов. Примечание: Нажимая на раздел «История обращений» раньше выводились все обращения.</p></div>', 'Право', '2023-07-16', 'a:0:{}', 23, 167, 'Центры государственных услуг начали принимать исковые заявления в столичные суды, а также стали помогать в ознакомлении с материалами дел. Непонятно только зачем....', 1),
(91, 2, 'Купил в приложении ЦУМа вещи по цене в 846 раз ниже реальной. Магазин аннулировал заказ. Разбор судебных актов', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">Купил в приложении ЦУМа вещи по цене в 846 раз ниже реальной. Магазин аннулировал заказ. Разбор судебных актов</h1></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Суть дела:</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">Покупатель купил в приложении ЦУМа 19 товаров по цене от 19 до 129 рублей. Магазин отказался доставить покупки и аннулировал заказ вернув деньги. Позиция магазина в том, что на момент покупки цены были неверными из-за технического сбоя. Покупатель обратился в суд.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><h3 class=\"article__content-h3\">Позиция покупателя:</h3></div><div class=\"flex-row\"><p class=\"article__content-p\">В обоснование заявленных требований указал, что 21 июля 2021 года между ним и ответчиком заключен договор купли-продажи товара, посредством интернет-заказа, через мобильное приложение \"ЦУМ\". Направленный им интернет-заказ содержал 19 наименований товара ценой от 19 до 129 руб., в качестве подтверждения заключения договора на электронный адрес и номер телефона направлено сообщение, а также списаны со счета денежные средства. Впоследствии им получено уведомление о невозможности доставки заказанного товара, однако он от выбранного товара не отказывался, направленная претензия оставлена без удовлетворения. Ссылаясь на изложенное, просил возложить на ответчика обязанность заключить с ним договор купли-продажи от 21 июля 2021 года, взыскать моральный вред в размере 10.000 руб.</p></div><div class=\"flex-row\"><h3 class=\"article__content-h3\">Позиция ЦУМа:</h3></div><div class=\"flex-row\"><p class=\"article__content-p\">ОАО \"Торговый дом \"ЦУМ\", возражая относительно заявленных требований, обратился к покупателю со встречным иском о признании договора купли-продажи недействительным. Магазин указал, что 21 июля 2021 года на сайте ОАО \"Торговый дом \"ЦУМ\" произошел технический сбой, в результате которого цены на товар в интернет-магазине стали отражаться некорректно - в сотни раз ниже их продажной стоимости и явно несоразмерно обычной стоимости соответствующих товаров. В отношении товаров, являющихся предметом иска, ошибочная совокупная цена товаров в 846 раз ниже их фактической совокупной цены на дату после восстановления нормальной работоспособности сайта. Оформленный заказ, ввиду технической ошибки автоматически принят в обработку, однако впоследствии аннулирован.</p></div><div class=\"flex-row\"><h3 class=\"article__content-h3\">Позиция судов первых трех инстанций\r\n</h3></div><div class=\"flex-row\"><p class=\"article__content-p\">Первая инстанция посчитала, что «факт возникновения технической ошибки явно следует из цен, указанных в интернет-заказе истца, которые ошибочно установлены на товары в течение непродолжительного технического сбоя, а в действиях истца, осведомленного о фактических ценах продаваемого товара, при отсутствии на сайте ответчика каких-либо акций и скидок усматривается злоупотребление правом».\r\n\r\nСуд пришёл к выводу о заключении ответчиком договора под влиянием заблуждения, вызванного технической ошибкой, поскольку продавец не заключил бы данный договор на столь невыгодных для себя условиях, и признал данный договор недействительным.\r\n\r\nСуды апелляционной и кассационной инстанций согласились с такими выводами.</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">ВС РФ указанные судебные акты отменил</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">Верховный суд РФ обязал выяснять природу технического сбоя сайта при спорах из-за невероятно низких цен в интернет-магазине: причины и характер «цифрового коллапса» имеют значение для правильного разрешения спора.\r\n\r\nВ случаях, когда технический сбой произошёл в результате злонамеренных действий третьих лиц, в связи с чем цены в интернет-магазине отражаются некорректно, судам надо разбираться, исходит ли в таком случае публичная оферта от самой торговой площадки, указывает высшая инстанция.\r\n\r\nПри дистанционном способе продажи товаров продавец обязан разместить на сайте публичную оферту и обеспечить возможность ознакомления с ней потребителей. Фиксация цены происходит в момент заключения договора между покупателем и интернет-магазином, который определяется моментом оформления заказа с присвоением ему номера, который позволяет потребителю получить информацию о заключённом договоре розничной купли-продажи и его условиях.\r\n\r\n«Изменить цену, объявленную в момент оформления заказа, продавец в одностороннем порядке не вправе», - подчеркивает ВС.\r\n\r\nИз установленных судами обстоятельств следует, что размещённое на сайте ЦУМа предложение о продаже одежды, обращенное к неопределённому кругу лиц, содержало все существенные условия договора - подробную информацию о товаре, цену, в связи с чем является публичной офертой.\r\n\r\nИстец оформил и оплатил заказ товаров, то есть осуществил акцепт оферты на заключение договора купли-продажи, значит договор между сторонами был заключён, в связи с чем у продавца возникла обязанность по передаче товара покупателю.\r\n\r\nОднако ответчик, получив оплату по договору, товар в адрес покупателя не направил, изменив цену товара, объявленную в момент оформления заказа, при этом в силу действующего законодательства покупатель имеет право на получение товара по цене, заявленной в интернет- заказе, указывает высшая инстанция.</p></div><div class=\"flex-row\"><h3 class=\"article__content-h3\">Вывод:</h3></div><div class=\"flex-row\"><p class=\"article__content-p\">Можно предположить, что если ЦУМ не сможет доказать злонамеренный умысел третьих лиц, покупки придется отдать покупателю.</p></div>', 'Право', '2023-07-16', 'a:0:{}', 4, 29, 'Суть дела:Покупатель купил в приложении ЦУМа 19 товаров по цене от 19 до 129 рублей. Магазин отказался доставить покупки и аннулировал заказ вернув деньги. Позиция маг?...', 1),
(92, 3, 'Окна, генерирующие энергию, доказали свою эффективность', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">Окна, генерирующие энергию, доказали свою эффективность</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Солнечную энергию можно извлекать не только с кровельных электростанций, но и с других поверхностей фасадов домов и сооружений, навесов над парковками, пешеходных дорожек, и конечно же окон.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">Солнечная пешеходка Нидерланды\r\nСолнечные окна пошли в серию\r\n\r\nРанее я рассказывал о разработках солнечных окон и первых примерах ввода в строй оконных электростанций. Теперь появился и опыт эксплуатации а значит можно подвести предварительные итоги.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">Копенгагенская международная школа, фасадная солнечная электростанция - 300 МВтч в год.\r\nClearVue производитель солнечных окон из Австралии обнародовала результаты двухлетней эксплуатации оконной солнечной СЭС, смонтированной в теплице в Университете Мердока, результаты опубликованы в научном журнале MDPI Technologies.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">Теплица в Университете Мердока\r\nСолнечные окна мощностью 30–33 Вт / м 2, производили в среднем 19 кВтч в день и обеспечили 40% потребляемой энергии. В сравнении с кровельной электростанцией Университета, солнечные окна показали более высокую производительность в дождливую погоду.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">Ежемесячная выработка энергии с помощью массива из 12 окон, установленного вертикально на северной стене теплицы.\r\nВертикально установленные окна показали очень стабильную генерацию в сравнении с классической кровельной СЭС.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">Powerhouse Brattørkaia Норвегия, годовая генерация 500 000 кВтч, что в два раза превышает собственное потребление. Отопление тепловым насосом на морской воде.\r\nИндустрия солнечных окон только набирает обороты, окна станут одним из элементов домов -электростанций в которых солнечная генерация превышает собственное потребление излишки произведенной энергии могут уходить в сеть, либо запасаются в виде Н2 и использоваться при необходимости.\r\n\r\nБлочные теплоэлектрические котельные Н2</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">Powerhouse Telemark Германия\r\nВнедрение оконных СЭС еще больше децентрализует производство энергии и снизит спрос в городских сетях.</p></div><div class=\"flex-row\"><h3 class=\"article__content-h3\">Ставьте лайки оставляйте комментарии!\r\nВаша подписка - необходимая поддержка каналу!</h3></div>', 'Технологии', '2023-08-28', 'a:0:{}', 1, 8, 'Солнечную энергию можно извлекать не только с кровельных электростанций, но и с других поверхностей фасадов домов и сооружений, навесов над парковками, пешеходных...', 1),
(93, 3, 'qeqweqweqwe', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">qeqweqweqwe</h1></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">asdasdasd</h2></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div>', 'Спорт', '2023-08-29', 'a:0:{}', 0, 1, 'asdasdasd...', 2),
(94, 5, 'Apple против Microsoft: как компании ссорились и мирились друг с другом', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">Apple против Microsoft: как компании ссорились и мирились друг с другом</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">В 1975 и 1976 годах были созданы Microsoft и Apple. Сейчас они занимают первые места по рыночной капитализации во всем мире. Два техногиганта долгое время как сотрудничали, так и конкурировали друг с другом, порой принимая неожиданные стратегические решения. Долгое время в этой гонке побеждала Apple, но в последнем десятилетии прошлого века всем казалось, что в этой гонке победа осталась за Microsoft. О долгом противостоянии двух корпораций — в нашем материале.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">На протяжении всего времени работы в NeXT Джобс нелестно отзывался о продукции Microsoft — отсутствии у них вкуса и оригинальности, низкой культурной ценности, «третьесортности» и т. д.\r\n\r\nО тех событиях написаны десятки книг, сняты художественные и документальные фильмы и сериалы. Самый известный из которых — «Пираты Силиконовой долины» (экранизация книги «Пожар в долине: Создание Персонального компьютера» (Fire in the Valley: The Making of the Personal Computer) Пауля Фрайбергера (Paul Freiberger) и Майкла Суэйна (Michael Swaine)).</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Знаковая сделка</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">В 1988 году Apple подали в суд на Microsoft, обвиняя последних в нарушении патентов и авторских прав, связанных с Apple Macintosh. В этом году была выпущена версия Windows 2.0. Спустя год Apple практически проиграла суд. В 1995 году был подан еще один иск на миллиард долларов против Microsoft, Intel и San Francisco Canyon.\r\n\r\nОбвинение состояло в том, что последняя компания во время работы на Apple украла у них тысячи строк кода, которые позже использовались для Windows. Еще одна серия исков привела к тому, что Microsoft, контролировавшие на тот момент 85% рынка, перестали делать код совместимым с продукцией Apple, что привело к падению продаж конкурента.\r\n\r\nВ 1997 году Apple купила NeXT и Стив Джобс вернулся в родную компанию. К тому моменту на рынке лидировал Microsoft, а Apple несли потери и медленно увеличивала продажи. Первым делом Джобс начал говорить о необходимости укреплять партнерства с лидерами отрасли. В выступлении того же года он заявил, что Apple нужна поддержка, а после заявил о сотрудничестве с Microsoft. На тот момент между корпорациями все еще шел крупный спор о патентах на целый ряд технологий. Объемная стратегическая сделка решила эту проблему:\r\n\r\n- Подписано объемное соглашение о перекрестном лицензировании патентов, которое прекратило судебные споры. Соглашение было бессрочным и охватывало все оформленные патенты и патенты, которые были выпущены в последующие пять лет;\r\n- Было решено, что в течение пяти лет Microsoft будет выпускать для продукции Apple как Windows, так и особую версию Office;\r\n- Microsoft купила акции Apple на 150 млн долларов. Важно, что эти бумаги не давали права голоса на собрании акционеров;\r\n- Браузером по умолчанию для Macintosh становился Internet Explorer. Это не обрадовало общественность, и Джобс заявил, что будут и другие браузеры, которые можно будет выбрать по умолчанию;\r\n- Гарантировалась совместимость их версий языка Java.\r\nОбщественность и акционеры встретили объявление о сотрудничестве неодобрительно, поскольку конкуренция между компаниями была интересной.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Восстановление Apple</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">Когда лопнул пузырь доткомов, Microsoft понесла огромные убытки, в то время как Apple сконцентрировались на создании принципиально новой продукции и запустили сперва ipod, а затем и iPhone.\r\n\r\nСделка оказалась успешной, как минимум для Apple — к 2010 году корпорация обогнала давнего конкурента. За несколько лет до этого Джобс уже стал возвращаться к публичной критике, обвиняя Microsoft в копировании. В 2006 году была запущена знаковая рекламная компания Apple «Hi, I\'m a Mac», в которых продукция компании и конкурента в лице ПК от Microsoft приобрела карикатурные человеческие образы, между которыми происходили забавные диалоги. Майкрософт не остались в долгу и ответили своей серией рекламных роликов, где высмеивали дизайн и ценовую политику Apple.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Итоги</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">По рыночной капитализации сейчас лидирует Apple, оставляя Microsoft на втором месте. Однако по числу патентов в распоряжении с большим отрывом побеждает Microsoft — у него под контролем 32,173 патентных семейства против 20,291 у Apple. В то же время активность по самостоятельной регистрации новых разработок у компаний находится на примерно одинаковом уровне.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">Основу патентного портфеля обеих компаний составляют технологии по цифровой обработке данных. Также большое значение имеет передача информации и обработка изображений.\r\n\r\nС развитием искусственного интеллекта начался новый этап долгого противостояния двух корпораций. И хотя Стива Джобса уже давно нет с нами, его неприязнь к компании Билла Гейтса, видимо, осталась в генетическом коде компании из Купертино. Пока что в этой гонке лидирует Microsoft. Вопрос: надолго ли?</p></div>', 'Технологии', '2023-08-29', 'a:0:{}', 0, 24, 'В 1975 и 1976 годах были созданы Microsoft и Apple. Сейчас они занимают первые места по рыночной капитализации во всем мире. Два техногиганта долгое время как сотрудничали, так...', 1),
(95, 50, '1', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">1</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Однако самой большой проблемой являются огромные потери, вызванные заменой лазерного света на электричество и обратно через несколько переходов.\r\n\r\nПо данным DARPA, POWER находится на первом этапе, который включает разработку концептуальных проектов реле. Второй этап будет сосредоточен на интеграции этой технологии в существующий планер, а третий станет испытанием на передачу лазерной мощности мощностью 10 киловатт на расстояние 200 км.\r\n\r\n«Этот проект потенциально может на несколько порядков продвинуть вперед распространение энергии, что может радикально изменить отношение общества к энергетике», — сказал доктор Пол Яффе, руководитель программы POWER в DARPA. Беспроводная энергетическая сеть могла бы получить энергию из новых и разнообразных источников, в том числе из космоса, и быстро и надежно соединить ее с потребителями, испытывающими энергетический голод.\r\n</p></div>', 'Право', '2023-09-26', 'a:0:{}', 0, 1, 'Однако самой большой проблемой являются огромные потери, вызванные заменой лазерного света на электричество и обратно через несколько переходов.\r\n\r\nПо данным DARPA, PO...', 2),
(96, 50, '2', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">2</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Совершив шаг, который звучит как самая дикая научная фантастика, DARPA</p></div>', 'Мой блог', '2023-09-26', 'a:0:{}', 0, 0, 'Совершив шаг, который звучит как самая дикая научная фантастика, DARPA...', 2),
(97, 50, '3', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">3</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">объявило о своей новой программе постоянного оптического беспроводного реле энергии (POWER), в рамках которой планируется использовать лазеры, передаваемые</p></div>', 'Мой блог', '2023-09-26', 'a:0:{}', 0, 0, 'объявило о своей новой программе постоянного оптического беспроводного реле энергии (POWER), в рамках которой планируется использовать лазеры, передаваемые...', 2),
(98, 50, '34', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">34</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">с бортовых платформ, для питания машин, находящихся на расстоянии тысяч миль.</p></div>', 'Технологии', '2023-09-26', 'a:0:{}', 0, 0, 'с бортовых платформ, для питания машин, находящихся на расстоянии тысяч миль....', 2),
(99, 50, '1234', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">1234</h1></div><div class=\"flex-row\"><p class=\"article__content-p\"> в рамках которой планируется использовать лазеры, передаваемые с бортовых платформ, для питания машин, находящихся на расстоянии тысяч миль.</p></div>', 'Технологии', '2023-09-26', 'a:0:{}', 0, 0, ' в рамках которой планируется использовать лазеры, передаваемые с бортовых платформ, для питания машин, находящихся на расстоянии тысяч миль....', 2),
(100, 50, '33', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">33</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного</p></div>', 'Спорт', '2023-09-27', 'a:0:{}', 0, 0, 'Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного...', 2),
(101, 50, '12', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">12</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического</p></div>', 'Спорт', '2023-09-27', 'a:0:{}', 0, 0, 'Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического...', 2),
(102, 50, '1222', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">1222</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического беспроводного</p></div>', 'Право', '2023-09-27', 'a:0:{}', 0, 0, 'Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического беспроводного...', 2),
(103, 50, '44', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">44</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического беспроводного реле энергии</p></div>', 'Право', '2023-09-27', 'a:0:{}', 0, 0, 'Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического беспроводного реле энергии...', 2),
(104, 50, '4f', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">4f</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического беспроводного реле энергии (POWER), </p></div>', 'Технологии', '2023-09-27', 'a:0:{}', 0, 0, 'Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического беспроводного реле энергии (POWER), ...', 2),
(105, 50, '233', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">233</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического беспроводного реле энергии (POWER), в ра</p></div>', 'Спорт', '2023-09-27', 'a:0:{}', 0, 0, 'Совершив шаг, который звучит как самая дикая научная фантастика, DARPA объявило о своей новой программе постоянного оптического беспроводного реле энергии (POWER), в ра...', 2),
(106, 50, 'Израиль представил танк нового поколения «Меркава» с искусственным интеллектом', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">Израиль представил танк нового поколения «Меркава» с искусственным интеллектом</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Разрабатываемый в течение последних пяти лет, Израиль наконец представил свою последнюю версию весьма успешного варианта ОБТ «Меркава» — «Barak» с искусственным интеллектом.</p></div><div class=\"flex-row\"><p class=\"article__content-p\">Армия обороны Израиля представила новейший вариант следующего поколения своего почтенного основного боевого танка (ОБТ) «Меркава».\r\n\r\nЭтот ОБТ пятого поколения, получивший название «Barak» (что означает «Молния») или «Меркава IV», оснащен искусственным интеллектом (ИИ), что делает его еще более смертоносным. Новый танк был специально разработан для быстрого обнаружения целей и поражения сил противника до того, как он сможет нанести удар.</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Новый и улучшенный</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">Разработанный в течение последних пяти лет совместно министерством обороны Израиля, Иерусалим объявил, что этот танк имеет решающее значение для будущего нации. Улучшения по сравнению с более ранними вариантами включают новейшие технологии, такие как датчики, искусственный интеллект, сети и системы активной защиты.\r\n\r\n«Новая эра, начатая танком «Barak», является выдающимся скачком и выражением технологических возможностей, которые постоянно расширяют и обеспечивают качественное преимущество, как в обороне, так и в наступлении», — заявил министр обороны Израиля Йоав Галлант в своем заявлении. «Приобретение нового танка — это огромная возможность повысить оперативную эффективность при подготовке к следующей кампании и повысить эффективность пехоты и бронетанкового корпуса», — пояснил командир 401-й бронетанковой бригады полковник Бенни Аарон.\r\n\r\n401-я дивизия Южного командования Израиля является одной из трех бронетанковых частей, входящих в состав израильского бронетанкового корпуса и получивших танк. Ожидается, что «Barak» заменит все существующие танки «Меркава 4» в 401-й бригаде к концу 2025 года. «Barak» также получит шлем «IronVision», разработанный Elbit Systems, который сейчас используется вместе с танками «Barak» . Шлем будет интегрирован с датчиками на внешней стороне танка, чтобы дать командиру периферийное зрение, аналогичное зрению пилота-истребителя, что позволит ему «видеть» за пределами танка через камеры и датчики.</p></div><div class=\"flex-row\"><p class=\"article__content-p\">По словам Элбита, эта система предоставит «Barak» возможности обработки изображений, которые помогут сенсорам танка сортировать данные и распознавать объекты. Водитель, наводчик или командир могут затем использовать экраны, расположенные внутри танка, для исследования и устранения потенциальных угроз. Контроллер пушки работает как джойстик или ручка управления полетом пилота. Дополнительно танк оснащен системой активной защиты Rafael «Trophy».\r\n\r\n«Барак» также оснащен сенсорными экранами и магазином операционных приложений для помощи экипажу в выполнении миссий. Кроме того, он может передавать разведданные в режиме реального времени между различными родами войск.\r\n\r\nИзраиль начал планировать создание нового танка в 2015 году, чтобы удовлетворить возникающие оперативные потребности. В то время израильские танки в основном использовались в Секторе Газа, особенно в городских условиях, против нетрадиционных угроз, таких как боевики, оснащенные реактивными гранатами (РПГ). Проект танка был завершен в 2016 году, а процесс разработки начался в 2018 году. В настоящее время танк готов к использованию после технологических испытаний.</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Скоро будет</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">Министерство не предоставило подробностей о количестве заказанных единиц, сроках развертывания и их стоимости. Однако отметили, что цена сопоставима с «Меркавой 4М» (около 3,5 млн долларов). Производство нового танка началось в прошлом месяце. Недавно рота 52-го батальона бронетанкового корпуса получила свой первый «Barak».\r\n\r\nА если вам еще больше интересна тема ИИ, вы хотите знать больше и не пропускать новинки и обзоры, подпишитесь на канал в тг, мне будет приятно -</p></div>', 'Технологии', '2023-09-27', 'a:0:{}', 0, 1, 'Разрабатываемый в течение последних пяти лет, Израиль наконец представил свою последнюю версию весьма успешного варианта ОБТ «Меркава» — «Barak» с искусственным ин...', 2),
(107, 50, '2', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">2</h1></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"data:image/jpeg;base64,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\"></div>', 'Спорт', '2023-09-27', 'a:0:{}', 0, 1, '...', 2);
INSERT INTO `articles` (`id`, `author_id`, `title`, `content`, `topic`, `date`, `img_name`, `likes`, `views`, `description`, `moderated`) VALUES
(108, 50, 'Израиль представил танк нового поколения «Меркава» с искусственным интеллектом', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">Израиль представил танк нового поколения «Меркава» с искусственным интеллектом</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">Разрабатываемый в течение последних пяти лет, Израиль наконец представил свою последнюю версию весьма успешного варианта ОБТ «Меркава» — «Barak» с искусственным интеллектом.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">Армия обороны Израиля представила новейший вариант следующего поколения своего почтенного основного боевого танка (ОБТ) «Меркава».\r\n\r\nЭтот ОБТ пятого поколения, получивший название «Barak» (что означает «Молния») или «Меркава IV», оснащен искусственным интеллектом (ИИ), что делает его еще более смертоносным. Новый танк был специально разработан для быстрого обнаружения целей и поражения сил противника до того, как он сможет нанести удар.</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Новый и улучшенный</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">Разработанный в течение последних пяти лет совместно министерством обороны Израиля, Иерусалим объявил, что этот танк имеет решающее значение для будущего нации. Улучшения по сравнению с более ранними вариантами включают новейшие технологии, такие как датчики, искусственный интеллект, сети и системы активной защиты.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">«Новая эра, начатая танком «Barak», является выдающимся скачком и выражением технологических возможностей, которые постоянно расширяют и обеспечивают качественное преимущество, как в обороне, так и в наступлении», — заявил министр обороны Израиля Йоав Галлант в своем заявлении. «Приобретение нового танка — это огромная возможность повысить оперативную эффективность при подготовке к следующей кампании и повысить эффективность пехоты и бронетанкового корпуса», — пояснил командир 401-й бронетанковой бригады полковник Бенни Аарон.\r\n\r\n401-я дивизия Южного командования Израиля является одной из трех бронетанковых частей, входящих в состав израильского бронетанкового корпуса и получивших танк. Ожидается, что «Barak» заменит все существующие танки «Меркава 4» в 401-й бригаде к концу 2025 года. «Barak» также получит шлем «IronVision», разработанный Elbit Systems, который сейчас используется вместе с танками «Barak» . Шлем будет интегрирован с датчиками на внешней стороне танка, чтобы дать командиру периферийное зрение, аналогичное зрению пилота-истребителя, что позволит ему «видеть» за пределами танка через камеры и датчики.\r\n\r\n</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">По словам Элбита, эта система предоставит «Barak» возможности обработки изображений, которые помогут сенсорам танка сортировать данные и распознавать объекты. Водитель, наводчик или командир могут затем использовать экраны, расположенные внутри танка, для исследования и устранения потенциальных угроз. Контроллер пушки работает как джойстик или ручка управления полетом пилота. Дополнительно танк оснащен системой активной защиты Rafael «Trophy».\r\n\r\n«Барак» также оснащен сенсорными экранами и магазином операционных приложений для помощи экипажу в выполнении миссий. Кроме того, он может передавать разведданные в режиме реального времени между различными родами войск.\r\n\r\nИзраиль начал планировать создание нового танка в 2015 году, чтобы удовлетворить возникающие оперативные потребности. В то время израильские танки в основном использовались в Секторе Газа, особенно в городских условиях, против нетрадиционных угроз, таких как боевики, оснащенные реактивными гранатами (РПГ). Проект танка был завершен в 2016 году, а процесс разработки начался в 2018 году. В настоящее время танк готов к использованию после технологических испытаний.</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Скоро будет</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">Министерство не предоставило подробностей о количестве заказанных единиц, сроках развертывания и их стоимости. Однако отметили, что цена сопоставима с «Меркавой 4М» (около 3,5 млн долларов). Производство нового танка началось в прошлом месяце. Недавно рота 52-го батальона бронетанкового корпуса получила свой первый «Barak».\r\n\r\nА если вам еще больше интересна тема ИИ, вы хотите знать больше и не пропускать новинки и обзоры, подпишитесь на канал в тг, мне будет приятно</p></div>', 'Технологии', '2023-09-28', 'a:0:{}', 1, 3, 'Разрабатываемый в течение последних пяти лет, Израиль наконец представил свою последнюю версию весьма успешного варианта ОБТ «Меркава» — «Barak» с искусственным ин...', 1),
(110, 57, 'Можно ли вернуть товар без коробки: возврат покупки без упаковки', '<div class=\"flex-row\"><h1 class=\"article__content-h1\">Можно ли вернуть товар без коробки: возврат покупки без упаковки</h1></div><div class=\"flex-row\"><p class=\"article__content-p\">С вами снова – сервис, который решает ваши юридические проблемы.</p></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><p class=\"article__content-p\">Сегодня обсудим один из самых распространенных вопросов в категории «возврат товара».\r\n«Я купила чайник, который сломался через неделю. Продавец не возвращает мне деньги, так как я выкинула коробку. Прав ли он?». С таким запросом к нам обратилась недавно клиентка.\r\nВернуть товар без коробки — это как попытаться отправиться в космос без ракеты. Кажется невозможным, но на самом деле все может оказаться не так уж и сложно.\r\nДавайте развеем миф о невозможности возврата товара без упаковки и разберемся в нюансах возврата.</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Что говорит закон</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">Закон говорит, что вернуть товар без коробки действительно можно, но не всегда. Прежде всего нужно определить, какой товар будете возвращать: качественный или ненадлежащего качества.</p></div><div class=\"flex-row\"><h3 class=\"article__content-h3\">Возврат товара ненадлежащего качества</h3></div><div class=\"flex-row\"><p class=\"article__content-p\">Нормы Закона о защите прав потребителей и судебная практика по его применению не связывают реализацию права потребителя на возврат неисправного товара с необходимостью сохранения его заводской упаковки. Таким образом, раз указание сдавать товар только в упаковке не содержится, требовать это незаконно. Следовательно, если продавец отказывает в возврате или вычитает из возвращаемых денежных средств стоимость потерянной или поврежденной упаковки, то у вас есть право оспорить такое решение продавца.\r\nЕсли обратимся к&nbsp;Приказу МАП РФ от 20.05.1998 N 160, то в ст.XI можем также видеть, что покупатель должен вернуть продавцу приобретенное изделие в максимально полной комплектации, исключая упаковочный материал.\r\nНикаких дополнительный требований относительно наличия коробки при предъявлении бракованного товара закон не содержит. При возврате вам необходимо лишь иметь чек либо иной документ, который подтверждает факт покупки товара у данного продавца.\r\nНа практике суды также однозначно согласны с тем, что отказ в возврате будет неправомерен, даже если продавец изначально прописал в правилах, что возврат возможен только при наличии упаковки. Например, Третий арбитражный апелляционный суд в&nbsp;Постановлении&nbsp;от 14.12.2015 по делу № А33-11667/2015 признал, что при возврате товара дополнительные условия, в числе которых указана необходимость наличия заводской упаковки, ущемляют право потребителя на замену либо возврат такого товара (см. также Апелляционное&nbsp;определение&nbsp;Оренбургского областного суда от 29.09.2015 N 33-6397/2015).</p></div><div class=\"flex-row\"><h3 class=\"article__content-h3\">Возврат качественного товара</h3></div><div class=\"flex-row\"><p class=\"article__content-p\">Здесь, как оказалось, не все так однозначно.\r\nДля начала обратимся к&nbsp;ст. 25 Закона о защите прав потребителя: «Обмен непродовольственного товара надлежащего качества проводится, если указанный товар не был в употреблении, сохранены его товарный вид, потребительские свойства, пломбы, фабричные ярлыки, а также имеется товарный чек или кассовый чек либо иной подтверждающий оплату указанного товара документ». Мы видим, что в перечне нет ни слова про упаковку/коробку/обертку и тд. Основное – сохранение товарного вида.\r\nТо есть, если толковать норму буквально, то возврат без коробки также возможен.\r\nСовет: с учетом того, что срок возврата ограничен двумя неделями, вы можете сохранить коробку хотя бы на этот период (на всякий случай).\r\nК сожалению, отсутствие четких указаний в законе по данному вопросу порождает совершенно различную судебную практику.\r\nНа практике часто суды встают на сторону продавцов и отказывают в возврате, в тех ситуациях, когда коробка/упаковка неотделима от товара и если коробку убрать, то товар уже потеряет товарный вид и пропадает возможность реализации товара другому покупателю (например, флакон духов). Обычно это также те коробки, на которых размещают сведения о составе продукта, сроках его хранения, дате изготовления, способах приготовления и тд. В целом, такая точка зрения логична и имеет место быть. Однако в любом случае продавец обязан будет доказать, что покупка потеряла товарный вид из-за отсутствия упаковки.\r\nДля гарантийного обслуживания наличие коробки и иной упаковки товара не обязательно, ведь гарантийный срок — это довольно продолжительное время – 5, а иногда и 6 лет. Логично, что упаковку могут не сохранить. Если от вас при обращении за ремонтом/обменом по гарантии требуют упаковку, то это не требование закона, а личная заинтересованность продавца.</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Какие правила возврата действуют в 2023 году</h2></div><div class=\"article__content-img\"><img class=\"img__cover\" data-img=\"\" src=\"\"></div><div class=\"flex-row\"><h3 class=\"article__content-h3\">Если вы приобрели товар дистанционно:</h3></div><div class=\"flex-row\"><p class=\"article__content-p\">Для покупателей товаров в интернет-магазинах есть небольшая приятная новость – по закону о защите прав потребителей, вы вправе отказаться от дистанционно приобретенного товара в любое время до его передачи, а после передачи товара – в течение 7 дней.\r\nВ случае, если информация о порядке и сроках возврата товара надлежащего качества не была предоставлена в письменной форме в момент доставки товара, потребитель вправе отказаться от товара в течение трех месяцев с момента передачи товара.\r\nОбратите внимание на то, что информация о сроках возврата должна быть вам предоставлена письменно!\r\nТо есть вернуть товар вы можете по любой причине в течение 7 дней, а в некоторых случаях в течение 3-х месяцев вне зависимости от того является ли этот товар качественным/некачественным, подпадает ли в список «невозвратных» товаров.\r\nСогласно судебной практике, отказ потребителя от товара, приобретенного дистанционным способом, не ограничен каким-либо перечнем товара, не подлежащего возврату.\r\nНикаких запретов на возврат в отношении товаров, приобретенных дистанционным способом, в том числе технически сложных товаров, закон о защите прав потребителей не предусматривает, каких-либо отсылок к Перечню технически сложных товаров либо к Перечню товаров надлежащего качества, не подлежащих возврату или обмену, не содержит.\r\nВажно: для возврата необходимо, чтобы товар не был в использовании, сохранил товарный вид и потребительские качества, был соответственно укомплектован.\r\nОтсутствие у потребителя кассового или товарного чека либо иного документа, удостоверяющих факт и условия покупки товара, не является основанием для отказа в удовлетворении его требований, точно также как и отсутствие упаковки.\r\nЕсли товар неисправен, то за возвратом средств вы можете обратиться за пределами 7-дневного срока, но в рамках гарантийного периода. Важно, чтобы дефект товара был доказан!\r\nПредъявляя требования о возврате средств на основании некачественности товара, вы можете:\r\n    • Просить продавца провести экспертизу товара за счет продавца (это ваше право по закону);\r\n    • Уже самостоятельно провести такую экспертизу некачественности и приложить доказательства к заявлению на возврат.\r\nВ случае, если вес товара больше 5 кг, интернет-магазин должен оказать доставку товара в сервисный центр за свой счет. Сервисный центр должен выдать заключение о том, что товар неисправен или не может быть отремонтирован. Если вы заявляете требования об устранении недостатков товара, а не о возврате денежных средств, то срок устранения недостатков товара не может превышать 45 дней.</p></div><div class=\"flex-row\"><h2 class=\"article__content-h2\">Если купили товар в обычном магазине оффлайн:</h2></div><div class=\"flex-row\"><p class=\"article__content-p\">Прежде всего, нужно посмотреть не попадает ли ваш товар в список перечня непродовольственных товаров надлежащего качества, не подлежащих обмену (см.&nbsp;Постановление Правительства РФ от 31.12.2020 N 2463).\r\nДля чего?\r\nЕсли товар, который вы приобрели находится в данном списке, то вернуть его вы можете&nbsp;только по причине некачественности товара&nbsp;и никак иначе.\r\nДопустим, купили градусник. Градусник находится в данном перечне. То есть, если вам градусник просто разонравился, не нужен и тд., то вернуть его нельзя.\r\nОднако если вы приобрели товар ненадлежащего качества (дефектный), то вы имеете право заявлять к возврату денежные средства за такой товар. В соответствии с законом на это определен срок - 15 дней без учета дня покупки. Если на товар установлен гарантийный срок, то заявлять требования о возврате можно в течение гарантийного срока.\r\nКак мы видим, вернуть товар без упаковки можно! Другое дело, что некоторые продавцы будут стоять до последнего на своем, что коробка нужна и если вы в любом случае не сможете ее предоставить, то помочь вам может только грамотный юрист. Мы со своей стороны все же рекомендуем не выкидывать коробки хотя бы первый месяц после покупки. Лучше себя предостеречь и избежать сложностей с возвратом, чем пытаться вернуть 2000 рублей за чайник, ходя по судам.</p></div>', 'Право', '2023-10-10', 'a:0:{}', 0, 1, 'С вами снова – сервис, который решает ваши юридические проблемы.Сегодня обсудим один из самых распространенных вопросов в категор', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `articles__comments`
--

CREATE TABLE `articles__comments` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `article_id` int NOT NULL,
  `text` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_time` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `likes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles__comments`
--

INSERT INTO `articles__comments` (`id`, `author_id`, `article_id`, `text`, `date_time`, `likes`) VALUES
(1, 2, 90, '123qweasd zxc', '12:58 2023.07.23', NULL),
(2, 2, 90, 'asd', '17:31 2023.07.23', NULL),
(3, 2, 90, 'asd', '17:34 2023.07.23', NULL),
(4, 2, 90, 'asd', '17:36 2023.07.23', NULL),
(5, 2, 90, 'fsdfddddDDDDDDDDDDDDD', '17:41 2023.07.23', NULL),
(6, 2, 90, 'fsdfddddDDDDDDDDDDDDD', '17:52 2023.07.23', NULL),
(7, 2, 90, 'fsdfddddDDDDDDDDDDDDD', '17:54 2023.07.23', NULL),
(8, 2, 90, 'fsdfddddDDDDDDDDDDDDD', '17:55 2023.07.23', NULL),
(9, 2, 90, 'fsdfddddDDDDDDDDDDDDD', '17:57 2023.07.23', NULL),
(10, 2, 90, 'fsdfddddDDDDDDDDDDDDD', '17:57 2023.07.23', NULL),
(11, 2, 90, '123', '18:01 2023.07.23', NULL),
(12, 2, 90, '123', '18:01 2023.07.23', NULL),
(13, 2, 90, '123', '18:02 2023.07.23', NULL),
(14, 2, 90, 'QQQQQQQQQ', '18:11 2023.07.23', NULL),
(15, 2, 90, 'RRRRRRRRRRRRRRRRRRR', '18:17 2023.07.23', NULL),
(16, 2, 90, 'fghf', '18:17 2023.07.23', NULL),
(17, 2, 90, 'sd', '18:23 2023.07.23', NULL),
(18, 2, 90, 'najdnalkssdnlkasnd', '18:37 2023.07.23', NULL),
(19, 2, 90, '0000', '18:38 2023.07.23', NULL),
(20, 2, 90, 'dfvdv', '18:38 2023.07.23', NULL),
(21, 2, 90, '9999', '18:38 2023.07.23', NULL),
(22, 2, 90, '888', '18:39 2023.07.23', NULL),
(23, 2, 90, '1234566789', '18:45 2023.07.23', NULL),
(25, 2, 90, 'zzzzzzzzz', '19:13 2023.07.26', NULL),
(26, 2, 90, 'asd', '11:32 2023.07.29', NULL),
(27, 2, 90, 'ASS', '11:34 2023.07.29', NULL),
(28, 2, 90, '12', '11:37 2023.07.29', NULL),
(29, 2, 90, 'vcb', '11:40 2023.07.29', NULL),
(30, 2, 90, 'vcb', '11:40 2023.07.29', NULL),
(31, 2, 90, 'vcb', '11:46 2023.07.29', NULL),
(32, 2, 90, 'dfg', '11:51 2023.07.29', NULL),
(33, 2, 90, 'ghjh', '11:51 2023.07.29', NULL),
(34, 5, 91, 'qwerty', '15:36 2023.08.15', NULL),
(35, 3, 91, 'Надоели спамеры', '06:17 2023.08.30', NULL),
(36, 9, 90, 'ggg', '11:43 2023.09.22', NULL),
(37, 50, 108, 'Круууто!', '11:26 2023.09.28', NULL),
(38, 57, 91, 'Согласен, банить их надо!', '11:38 2023.10.04', NULL),
(39, 57, 94, 'Класс пиши еще!', '11:41 2023.10.04', NULL),
(40, 57, 92, 'Класс пиши еще!', '11:43 2023.10.04', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `user1` int NOT NULL,
  `user2` int NOT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`user1`, `user2`, `text`, `date_time`) VALUES
(5, 2, 'Hola!, Hello, Привет', '13:24 18.08.2023'),
(2, 5, 'Привет', '8:09 21.08.2023'),
(5, 2, 'qwe', '11:37 21.08.2023'),
(5, 2, 'asd', '11:39 21.08.2023'),
(5, 2, 'qweee', '11:40 21.08.2023'),
(5, 2, '123', '11:40 21.08.2023'),
(5, 2, 'ccc', '11:41 21.08.2023'),
(5, 2, 'qwe', '11:42 21.08.2023'),
(5, 2, 'qqq', '15:34 21.08.2023'),
(5, 2, 'ww', '15:36 21.08.2023'),
(5, 2, 'qwe', '15:37 21.08.2023'),
(5, 2, 'eee', '15:38 21.08.2023'),
(5, 2, '222', '15:43 21.08.2023'),
(5, 2, 'zzz', '15:44 21.08.2023'),
(5, 2, '11', '15:45 21.08.2023'),
(5, 2, '122222', '15:47 21.08.2023'),
(5, 2, 'qwe', '16:02 21.08.2023'),
(5, 2, 'ww', '16:02 21.08.2023'),
(5, 2, 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '16:02 21.08.2023'),
(5, 2, '111', '16:14 21.08.2023'),
(5, 2, '2', '16:17 21.08.2023'),
(2, 5, 'вот', '05:32 22.08.2023'),
(5, 2, 'йй', '05:33 22.08.2023'),
(2, 5, 'qq', '05:34 22.08.2023'),
(5, 2, '111', '05:47 22.08.2023'),
(2, 5, '222', '05:48 22.08.2023'),
(2, 5, '11111', '05:56 22.08.2023'),
(5, 2, 'ffff', '05:56 22.08.2023'),
(2, 5, 'qwe', '15:46 24.08.2023'),
(49, 2, 'Привет, мне понравилась твоя статья, пиши еще!', '05:55 13.09.2023'),
(49, 2, 'ddsf', '05:59 13.09.2023'),
(49, 2, 'dad', '06:00 13.09.2023'),
(2, 49, 'asd', '06:04 13.09.2023'),
(49, 2, 'sdf', '06:22 13.09.2023'),
(2, 49, 'wdasd', '06:22 13.09.2023'),
(49, 2, 'ad', '06:22 13.09.2023'),
(9, 2, 'jb', '14:27 22.09.2023'),
(57, 3, 'Класс пиши еще!', '11:44 04.10.2023'),
(3, 57, 'Я только рад', '11:45 04.10.2023'),
(57, 3, '12345', '11:45 04.10.2023'),
(3, 57, 'йцуке', '11:45 04.10.2023');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `icon` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `likedArticles` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `subscription` int DEFAULT NULL,
  `subscribers` int DEFAULT NULL,
  `contacts` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_registration` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `pass`, `icon`, `likedArticles`, `subscription`, `subscribers`, `contacts`, `description`, `date_registration`) VALUES
(1, '123', '123@mail.com', '123', '0', NULL, NULL, NULL, NULL, NULL, '21.03.2023'),
(2, 'asd', 'asd@asd.ru', 'asd', '/images/avatars/2-26-09-236168.jpg', 'a:3:{i:0;N;i:1;s:2:\"91\";i:2;s:2:\"90\";}', NULL, NULL, 'a:3:{i:0;s:1:\"5\";i:1;i:49;i:2;s:1:\"9\";}', 'qwerrtertscxczxc xcs', '15.03.2023'),
(3, 'Chumachenko_Egor', 'gpt@mail.com', 'Mfgh1234', '/images/avatars/3-02-10-231354.jpg', 'a:2:{i:0;N;i:1;s:2:\"90\";}', NULL, NULL, 'a:1:{i:0;s:2:\"57\";}', 'Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor Chumachenko_Egor ', '5.08.2023'),
(4, 'qwerty', 'qwerty@mail.ru', 'qwerty123', '0', 'a:2:{i:0;N;i:1;s:2:\"91\";}', NULL, NULL, NULL, NULL, '2023-08-06'),
(5, 'qwerty', 'qwerty@mail.com', 'qwerty123', '0', 'a:2:{i:0;N;i:1;s:2:\"90\";}', NULL, NULL, 'a:1:{i:0;s:1:\"2\";}', NULL, '2023-08-15'),
(9, 'Roman_Efimov', 'marder977@gmail.com', 'marder443225', '/images/avatars/9-25-09-232735.jpg', NULL, NULL, NULL, 'a:1:{i:0;s:1:\"2\";}', 'TYT BYL YA', '2023-09-01'),
(10, 'qqsdd', 'qwerty@mdddai.com', 'qqqqqqqqq12333', '0', NULL, NULL, NULL, NULL, NULL, '2023-09-01'),
(11, '123123', 'qwerty@dfdai.com', 'qqqqqfffqq123', '0', NULL, NULL, NULL, NULL, NULL, '2023-09-01'),
(12, '1232dd', 'qwaaarty@dfdai.com', 'qqqqqukjmghmq123', '0', NULL, NULL, NULL, NULL, NULL, '2023-09-01'),
(56, 'Roman', 'Efimov_R_A@mail.ru', 'marder443225', '0', NULL, NULL, NULL, NULL, NULL, '2023-10-02'),
(57, 'Roman', 'ERmail@mail.ru', 'marder443225', '/images/avatars/57-04-10-231687.jpg', 'a:2:{i:0;N;i:1;s:2:\"92\";}', NULL, NULL, 'a:1:{i:0;s:1:\"3\";}', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci officiis, tempore omnis eos quos quo facilis voluptate corrupti porro velit facere non quidem iure fugit beatae dignissimos similique, harum ipsum.\r\n', '2023-10-04');

-- --------------------------------------------------------

--
-- Структура таблицы `users__bookmarks`
--

CREATE TABLE `users__bookmarks` (
  `user_id` int NOT NULL,
  `bookmarks` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users__bookmarks`
--

INSERT INTO `users__bookmarks` (`user_id`, `bookmarks`) VALUES
(2, NULL),
(3, 'a:2:{i:0;s:2:\"90\";i:1;s:2:\"94\";}'),
(4, NULL),
(5, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(56, NULL),
(57, 'a:2:{i:0;s:2:\"90\";i:1;s:3:\"110\";}');

-- --------------------------------------------------------

--
-- Структура таблицы `users__wallpaper`
--

CREATE TABLE `users__wallpaper` (
  `id` int NOT NULL,
  `imgName` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users__wallpaper`
--

INSERT INTO `users__wallpaper` (`id`, `imgName`) VALUES
(2, ' /images/profileWallpaper/2-26-09-231211.jpg'),
(3, ' /images/profileWallpaper/3-02-10-2310332.jpg'),
(9, ' /images/profileWallpaper/9-25-09-236216.jpg'),
(50, ' /images/profileWallpaper/50-26-09-2325272.jpg'),
(57, ' /images/profileWallpaper/57-04-10-2311888.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articleImages`
--
ALTER TABLE `articleImages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles__comments`
--
ALTER TABLE `articles__comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users__bookmarks`
--
ALTER TABLE `users__bookmarks`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `users__wallpaper`
--
ALTER TABLE `users__wallpaper`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `articleImages`
--
ALTER TABLE `articleImages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT для таблицы `articles__comments`
--
ALTER TABLE `articles__comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `users__wallpaper`
--
ALTER TABLE `users__wallpaper`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
