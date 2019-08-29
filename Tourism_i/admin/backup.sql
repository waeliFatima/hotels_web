

CREATE TABLE `cities` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO cities VALUES("1","تهران","ایران");
INSERT INTO cities VALUES("2","قم","ایران");
INSERT INTO cities VALUES("3","مشهد","ایران");
INSERT INTO cities VALUES("4","کرمانشاه","ایران");
INSERT INTO cities VALUES("5","استامبول","ترکیه");
INSERT INTO cities VALUES("6","بغداد","عراق");
INSERT INTO cities VALUES("7","کاشان","ایران");
INSERT INTO cities VALUES("8","تبریز","ایران");



CREATE TABLE `commnets` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `date` date NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_comment`),
  KEY `id_users` (`id_users`),
  CONSTRAINT `commnets_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO commnets VALUES("1","5","dffgfg","2019-12-04","0");
INSERT INTO commnets VALUES("2","4","sdfsdfgfgsg","2019-08-12","0");
INSERT INTO commnets VALUES("3","4","sdfdfasdfasdf","2019-08-12","0");
INSERT INTO commnets VALUES("4","2","sdfdfasdfasdf","2019-08-12","0");
INSERT INTO commnets VALUES("11","5","sfsdsdasdfdfsfddsfdsfyuytutytt","2019-08-12","0");
INSERT INTO commnets VALUES("12","3","sdfasfdsf","2019-08-07","0");
INSERT INTO commnets VALUES("13","5","dsfsdfdfs","2019-08-12","0");
INSERT INTO commnets VALUES("14","5","sdasfddsf","2019-08-07","0");
INSERT INTO commnets VALUES("15","5","asasdsadsf","2019-08-07","0");
INSERT INTO commnets VALUES("16","5","sdfasdfdfs","2019-08-24","0");
INSERT INTO commnets VALUES("17","5","fdsdggf","2019-08-07","0");
INSERT INTO commnets VALUES("18","5","qwqwqeqwerqwer","2019-08-18","0");
INSERT INTO commnets VALUES("19","2","qwqwqwqwqw","2019-08-18","0");
INSERT INTO commnets VALUES("20","3","asdfasfsafsdfasfd","2019-08-24","0");
INSERT INTO commnets VALUES("21","1","awwqww","2019-08-07","0");
INSERT INTO commnets VALUES("22","2","asdasfsdfasdf","2019-08-24","0");
INSERT INTO commnets VALUES("23","5","sdfsadfdfdfasfdasef","2019-08-18","0");
INSERT INTO commnets VALUES("24","5","please tell me how to get money","2019-08-20","0");
INSERT INTO commnets VALUES("25","5","ndkjdkjdk","2019-08-26","0");
INSERT INTO commnets VALUES("26","5","سلام .......","2019-08-27","0");
INSERT INTO commnets VALUES("27","5","sghl","2019-08-27","0");



CREATE TABLE `customers` (
  `id_customers` int(11) NOT NULL AUTO_INCREMENT,
  `first_name_cus` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `last_name_cus` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `personilty_cus` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `age` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id_customers`),
  UNIQUE KEY `personilty_cus` (`personilty_cus`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO customers VALUES("78","fatima","weali","زن","09024945661","01398556688","");
INSERT INTO customers VALUES("79","فاطمه","محمدی","زن","0901568445","013555457588","");
INSERT INTO customers VALUES("81","3434","fgdgdfg","مرد","1223444","757787","");
INSERT INTO customers VALUES("82","xdfsdf","cxvxcv","مرد","1223444","3443434","");
INSERT INTO customers VALUES("137","fdfdgf","adsfsdf","مرد","43434343","34345343","");
INSERT INTO customers VALUES("140","yutuitui","dfsdfsdf","مرد","5555555","8888888888888888","");
INSERT INTO customers VALUES("141","qwewqewe","qqqqqq","زن","5555555","757787344","");
INSERT INTO customers VALUES("142","wewe","wewe","زن","5555555","333333","");
INSERT INTO customers VALUES("143","yutuitui","wewewe","زن","097555454","342334","");
INSERT INTO customers VALUES("144","sdfds","zcxcz","مرد","3434242","45555","");
INSERT INTO customers VALUES("145","xcfsdf","fdsfd","زن","3434242","32424234","");
INSERT INTO customers VALUES("146","12323123","sdfsf","زن","3434242","112322","");
INSERT INTO customers VALUES("147","sdfds","sdfdsd","مرد","232323","34234234","");
INSERT INTO customers VALUES("148","32442","dfsf","مرد","2323423","234243","");
INSERT INTO customers VALUES("149","sdfsfd","dfsdf","زن","2323423","234234","");
INSERT INTO customers VALUES("150","asdasd","xdsfsdf","مرد","33433323","43434","");
INSERT INTO customers VALUES("151","23233","xcxdff","زن","33433323","45543","");
INSERT INTO customers VALUES("152","23232","sdffsfdsf","زن","33433323","233232","");
INSERT INTO customers VALUES("153","sdfsd","dfsdfsf","مرد","21312213","3234234324","");
INSERT INTO customers VALUES("154","dsfdsf","dsdfsdf","زن","21312213","3242334","");
INSERT INTO customers VALUES("155","dsfsdsdfds","2334234","زن","21312213","342423","");
INSERT INTO customers VALUES("156","bnbmnbnb","jhlhjlkhklj","مرد","9952656","5454545","");
INSERT INTO customers VALUES("157","oiopioi","iuiyyiou","زن","9952656","9848874","");
INSERT INTO customers VALUES("158","kjkjk","l;kljkljkj","زن","9952656","8788787","");
INSERT INTO customers VALUES("159","jkjkjkj","jjhjkh","مرد","988787","545454","");
INSERT INTO customers VALUES("160","llklko","lkjkkhjh","مرد","988787","997979","");
INSERT INTO customers VALUES("161","779798","jkjkjkjk","مرد","988787","989898","");
INSERT INTO customers VALUES("162","dfsdfsdf","dfdsfsdf","مرد","23323","2322","");
INSERT INTO customers VALUES("163","sfsdfsdf","sdfsdsd","مرد","23323","232323","");
INSERT INTO customers VALUES("164","dfsd","dsfsf","مرد","34342","434","");
INSERT INTO customers VALUES("165","eer","ghfgh","مرد","445","4575","");
INSERT INTO customers VALUES("166","sdsd","dfd","زن","445","4545","");
INSERT INTO customers VALUES("167","ddsdsd","dfe","زن","445","45757","");
INSERT INTO customers VALUES("168","4343","gffdfd","مرد","5445","4554","");
INSERT INTO customers VALUES("169","dffd","dffd","زن","493785","343","");
INSERT INTO customers VALUES("170","dffdfd","344334","مرد","493785","dfdffd","");
INSERT INTO customers VALUES("171","34443","434343","مرد","493785","434334","");
INSERT INTO customers VALUES("172","dsds","dsdsds","مرد","121212","121221","");
INSERT INTO customers VALUES("173","dsdsds","dsdsds","زن","121212","3332","");
INSERT INTO customers VALUES("174","dsdsds","dsdds","زن","121212","3322","");
INSERT INTO customers VALUES("175","edssf","dfdfffds","زن","3223423","23234432","");
INSERT INTO customers VALUES("176","sdfsdf","r23423","زن","3223423","34234","");
INSERT INTO customers VALUES("177","sfddfssdff","sdfsdf","زن","3223423","34243","");
INSERT INTO customers VALUES("178","xfsf","xvxcv","زن","2223","xvxvx","");
INSERT INTO customers VALUES("179","dsfsf","xvxvc","زن","2223","5345345","");
INSERT INTO customers VALUES("180","sddsfdfs","dfgdfg","زن","2223","343434","");
INSERT INTO customers VALUES("181","fdfdfd","rfdfd","مرد","234443","23434","");
INSERT INTO customers VALUES("182","dfdfdf","ddfdf","زن","234443","44545","");
INSERT INTO customers VALUES("183","dfsdfdsf","dfdfsf","زن","234443","787686","");
INSERT INTO customers VALUES("184","sdasd","dssdsd","زن","7588","75757","");
INSERT INTO customers VALUES("185","sdds","sdsdsd","زن","7588","5455","");
INSERT INTO customers VALUES("186","sdsds","sdsdsd","زن","7588","55","");
INSERT INTO customers VALUES("187","dsfd","dsdfsds","مرد","54545","77775","کودک");
INSERT INTO customers VALUES("188","$_POST[$pname]","$_POST[$pfamily]","po","89898","323232323","بزرگسال");
INSERT INTO customers VALUES("189","sdfdf","sdfsdf","مرد","121212","121212","بزرگسال");
INSERT INTO customers VALUES("190","qw","qw","مرد","77777777","777777","بزرگسال");
INSERT INTO customers VALUES("191","jjj","jjjj","مرد","99999","9999","بزرگسال");
INSERT INTO customers VALUES("192","er","er","مرد","99999","77777785","کودک");
INSERT INTO customers VALUES("193","cdcc","cdcdf","مرد","21212","2333","بزرگسال");
INSERT INTO customers VALUES("194","121221","dsdssdsd","مرد","21212","11212","کودک");
INSERT INTO customers VALUES("195","sdfasdf","ghgd","زن","095878544","7757575","بزرگسال");
INSERT INTO customers VALUES("196","dsfdf","3434","زن","095878544","33443","بزرگسال");
INSERT INTO customers VALUES("197","2323","233","زن","095878544","23323","کودک");
INSERT INTO customers VALUES("198","sdgfg","fdsf","مرد","322324","234242","بزرگسال");
INSERT INTO customers VALUES("199","dsfsdfadsf","dfdgfd","مرد","322324","34534","بزرگسال");
INSERT INTO customers VALUES("200","3434","dsdfasdf","مرد","322324","3423424","کودک");
INSERT INTO customers VALUES("201","بیببل","dfdgdgsd","مرد","34535434","3453","بزرگسال");
INSERT INTO customers VALUES("202","3412341234","لسیبلسیبل","زن","34535434","345324523","بزرگسال");
INSERT INTO customers VALUES("203","سیبسیبسیبسی","یبسیبشسیب","زن","34535434","4342342","کودک");
INSERT INTO customers VALUES("204","dfgfg","fdgsdfg","زن","565656","5656","بزرگسال");
INSERT INTO customers VALUES("205","dfgdfg","sdfgfg","مرد","565656","dsfgfg","بزرگسال");
INSERT INTO customers VALUES("206","tt","dfcvsdxvs","مرد","09103456678","546465","بزرگسال");
INSERT INTO customers VALUES("207","hghg","787878","مرد","09103456678","00909090-90","بزرگسال");
INSERT INTO customers VALUES("208","dfsffd","erre","مرد","09103456678","43234243","کودک");



CREATE TABLE `faci_and_hotel` (
  `id_faci_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `id_faci` int(11) NOT NULL,
  PRIMARY KEY (`id_faci_hotel`),
  KEY `id_hotel` (`id_hotel`),
  KEY `id_city` (`id_faci`),
  CONSTRAINT `faci_and_hotel_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotels` (`id_hotel`),
  CONSTRAINT `faci_and_hotel_ibfk_2` FOREIGN KEY (`id_faci`) REFERENCES `hotel_facility` (`id_faci`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO faci_and_hotel VALUES("150","119","36");
INSERT INTO faci_and_hotel VALUES("151","127","37");
INSERT INTO faci_and_hotel VALUES("220","118","38");
INSERT INTO faci_and_hotel VALUES("221","116","36");
INSERT INTO faci_and_hotel VALUES("222","130","38");
INSERT INTO faci_and_hotel VALUES("223","118","38");
INSERT INTO faci_and_hotel VALUES("233","114","36");
INSERT INTO faci_and_hotel VALUES("234","114","37");
INSERT INTO faci_and_hotel VALUES("235","114","38");
INSERT INTO faci_and_hotel VALUES("236","115","38");



CREATE TABLE `faci_and_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_faci` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_faci` (`id_faci`,`id_room`),
  KEY `id_room` (`id_room`),
  CONSTRAINT `faci_and_room_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id_room`),
  CONSTRAINT `faci_and_room_ibfk_2` FOREIGN KEY (`id_faci`) REFERENCES `room_faci` (`id_room_faci`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO faci_and_room VALUES("31","8","8");
INSERT INTO faci_and_room VALUES("34","8","11");
INSERT INTO faci_and_room VALUES("33","12","10");
INSERT INTO faci_and_room VALUES("35","12","12");
INSERT INTO faci_and_room VALUES("38","12","13");
INSERT INTO faci_and_room VALUES("39","12","14");



CREATE TABLE `hotel_facility` (
  `id_faci` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id_faci`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO hotel_facility VALUES("36","weeadfasdfadsf");
INSERT INTO hotel_facility VALUES("37","asdfadf");
INSERT INTO hotel_facility VALUES("38","استخر");



CREATE TABLE `hotels` (
  `id_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `name_hotel` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `photo_hotel` text COLLATE utf8_persian_ci NOT NULL,
  `phone_hotel` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email_hotel` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `logo` text COLLATE utf8_persian_ci NOT NULL,
  `kind_of_hotel` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `star_hotels` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `discription_hotels` text COLLATE utf8_persian_ci NOT NULL,
  `map` text COLLATE utf8_persian_ci NOT NULL,
  `deaction` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_hotel`),
  KEY `id_city` (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='1';

INSERT INTO hotels VALUES("113","سبشسیب","12.jfif","1234","waeli.icsf1.996@gmail.com","سيي","","ویلاه","4","1","asdasdasdf","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","1");
INSERT INTO hotels VALUES("114","آبان","Abn.jpg","09024945661","user1@gamil.com","بلوار پيروزی","","هتل","4","1","هتل آرسان مشهد در خیابان امام رضا در نزدیکی حرم مطهر امام رضا (ع) قرار گرفته است. این هتل بافضای خوب و امکانات مناسبی که دارد آماده پذیرایی از زائران امام رضا است. هتل آرسان در محیطی آرام و تمیز، با آرامشی دلپذیر گزینه خوبی جهت اقامت است.آخرین بازسازی سال 1397 انجام شده است","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("115","سایبا","sayna.jpg","09024945661","user1@gamil.com","خیایان ولی عصر","","هتل","5","1","هتل ساینا با موقعیتی منحصر به فرد با 8 طبقه در سال 1389 شروع به کار کرده و نظر بسیاری از مسافران را به خود جلب کرده است. این هتل در خیابان یوسف آباد در نزدیکی مراکز اداری و تجاری شهر تهران از جمله وزارت کشور و ادارات واقع در خیابان مطهری قرار گرفته است. این هتل با دکوراسیونی زیبا و شیک در داخل اتاق‌ها و لابی در نظر دارد اقامتی دلنشین و آرام را برای مسافرانش فراهم آورد. از دیگر ویژگی های هتل ساینا این است که خارج از محدوده طرح ترافیک اصلی قرار گرفته، ولی در محدوده زوج و فرد ترافیکی تهران قرار گرفته است. مراکز درمانی از جمله درمانگاه ها و بیمارستان ها، اماکن و باشگاه های ورزشی و رستوران های زیادی نیز در فاصله اندکی از هتل ساینا واقع شده اند و مسافران محترم می توانند با اندکی پیاده روی به تمامی این مراکز دسترسی پیدا کنند.","1212","0");
INSERT INTO hotels VALUES("116","کاروان","kerewan.jpg","09024945661","user1@gamil.com","میدان ولیعصر-خیابان ولیعصر-بالاتر از چهارراه زرتشت- سمت چپ - کوچه غفاری-پلاک ۱۸","","مهمانسرا","3","1","هتل 3 ستاره کارون در قلب تهران و در نزدیکی خیابان تاریخی ولیعصر قرار دارد. محل منحصر به فرد هتل آرامش و راحتی را در مرکز پر جنب و جوش شهر به ارمغان می آورد. هتل کارون تا به حال چندین جایزه بین المللی به دست آورده است و مهمانان ما از نقاط مختلف جهان هستند. با وجود سابقه 43 ساله هتل در مهمان نوازی و هتلداری، هتل کارون چندین نوبت در طی این سالها بازسازی شده است. هتل کارون در نزدیکی طولانی ترین خیابان تهران و خاور میانه، خیابان ولیعصر، واقع شده که معروف ترین و پر جنب و جوش ترین خیابان تهران است. از ویژگی های ممتاز هتل دسترسی آسان به ایستگاه اتوبوس تندرو (بی آر تی) و ایستگاه مترو برای تردد درکلان شهر تهران می باشد.","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("117","fatima12122","12.jfif","09024945661","user1@gamil.com","سيي","","مهمانسرا","3","1","sdssd","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("118","سلام","12.jfif","09024945661","user1@gamil.com","سيي","","مهمانسرا","3","1","sdssd","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("119","fatima","2er.PNG","1234","waeli.icsf1.996@gmail.com","WW","","شَله","2","3","popopo","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("120","fatima","2er.PNG","1234","waeli.icsf1.996@gmail.com","WW","","شَله","2","1","popopo","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("121","fatima","2er.PNG","1234","waeli.icsf1.996@gmail.com","WW","","شَله","2","1","popopo","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("122","fatima","2er.PNG","09024945661","waeli.icsf1.996@gmail.com","WW","","هتل","3","1","wewewe","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("123","A","21.PNG","09024945661","waeli.icsf.1996@gmail.com","fa","","هتل","5","1","121232323","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("124","9523061001","21.PNG","09024945661","user1@gamil.com","سييasdasdasdwererwer","12.PNG","مهمانسرا","2","1","rewqreqreerczxcsdasdasdwerwre","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("125","9523061001ewew","12.PNG","09024945661","waeli.icsf1.996@gmail.com","WW","21.PNG","مهمانسرا","2","1","serwerwereesffsdf","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("126","werwrttr","21.PNG","1234","waeli.icsf1.996@gmail.com","erretret","","مهمانسرا","4","1","ertetewrtrt","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");
INSERT INTO hotels VALUES("127","fatima","12.jfif","09024945661","waeli.icsf1.996@gmail.com","dffsdg","","ویلاه","2","3","dfgfgfdgds","dfdfffgd","0");
INSERT INTO hotels VALUES("128","9523061001","hydropolis.jpg","dsfdfsdf","waeli.icsf.1996@gmail.com","dfsdfgsfg","","مهمانسرا","5","1","fgsfgsfg","dfgfg","0");
INSERT INTO hotels VALUES("129","fatima","12.PNG","09024945661","waeli.icsf1.996@gmail.com","WW","","ویلاه","3","1","werwerwerrwerwr","1212","0");
INSERT INTO hotels VALUES("130","qw","ketevan5.jpg","09024945661","waeli.icsf45454.1996@gmail.com","قم","","مهمانسرا","2","1","سبامی","https://www.google.com.qa/maps/d/embed?mid=1lraKeDHRBbIV0ZmekzXQvwVd-BAqp2a0","0");



CREATE TABLE `images_hotels` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `address_image` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_hotel` (`id_hotel`),
  CONSTRAINT `images_hotels_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotels` (`id_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO images_hotels VALUES("1","118","2er.PNG");
INSERT INTO images_hotels VALUES("2","121","12.jfif");
INSERT INTO images_hotels VALUES("3","121","2er.PNG");
INSERT INTO images_hotels VALUES("4","121","2er.PNG");
INSERT INTO images_hotels VALUES("5","121","2er.PNG");
INSERT INTO images_hotels VALUES("6","118","button style.PNG");
INSERT INTO images_hotels VALUES("7","118","21.PNG");
INSERT INTO images_hotels VALUES("8","117","1.PNG");
INSERT INTO images_hotels VALUES("9","118","2.PNG");
INSERT INTO images_hotels VALUES("10","118","3.PNG");
INSERT INTO images_hotels VALUES("11","118","4.PNG");
INSERT INTO images_hotels VALUES("12","118","5.PNG");
INSERT INTO images_hotels VALUES("13","118","10.PNG");
INSERT INTO images_hotels VALUES("14","123","6.PNG");
INSERT INTO images_hotels VALUES("15","123","7.PNG");
INSERT INTO images_hotels VALUES("16","123","8.PNG");
INSERT INTO images_hotels VALUES("17","123","9.PNG");
INSERT INTO images_hotels VALUES("18","123","11.PNG");
INSERT INTO images_hotels VALUES("19","123","12.PNG");
INSERT INTO images_hotels VALUES("20","123","21.PNG");
INSERT INTO images_hotels VALUES("21","123","button style.PNG");
INSERT INTO images_hotels VALUES("22","123","button style3.PNG");
INSERT INTO images_hotels VALUES("23","123","Capture.PNG");
INSERT INTO images_hotels VALUES("24","113","button style.PNG");
INSERT INTO images_hotels VALUES("27","126","6.PNG");
INSERT INTO images_hotels VALUES("28","126","7.PNG");
INSERT INTO images_hotels VALUES("37","114","abn1.jpg");
INSERT INTO images_hotels VALUES("38","114","abn2.jpg");
INSERT INTO images_hotels VALUES("39","114","abn3.jpg");
INSERT INTO images_hotels VALUES("40","114","abn4.jpg");
INSERT INTO images_hotels VALUES("41","114","abn5.jpg");
INSERT INTO images_hotels VALUES("42","114","abn6.jpg");
INSERT INTO images_hotels VALUES("43","115","sayna1.jpg");
INSERT INTO images_hotels VALUES("44","115","sayna2.jpg");
INSERT INTO images_hotels VALUES("45","115","sayna3.jpg");
INSERT INTO images_hotels VALUES("46","115","sayna4.jpg");
INSERT INTO images_hotels VALUES("47","115","sayna5.jpg");
INSERT INTO images_hotels VALUES("48","116","ketevan1.jpg");
INSERT INTO images_hotels VALUES("49","116","ketevan2.jpg");
INSERT INTO images_hotels VALUES("50","116","ketevan3.jpg");
INSERT INTO images_hotels VALUES("51","116","ketevan5.jpg");
INSERT INTO images_hotels VALUES("52","116","ketevan6.jpg");
INSERT INTO images_hotels VALUES("53","116","ketevan6.jpg");
INSERT INTO images_hotels VALUES("54","116","ketevan7.jpg");
INSERT INTO images_hotels VALUES("55","130","ketevan1.jpg");
INSERT INTO images_hotels VALUES("56","130","ketevan2.jpg");
INSERT INTO images_hotels VALUES("57","130","ketevan3.jpg");
INSERT INTO images_hotels VALUES("58","130","ketevan4.jpg");
INSERT INTO images_hotels VALUES("59","130","ketevan5.jpg");
INSERT INTO images_hotels VALUES("60","130","ketevan6.jpg");



CREATE TABLE `rezerve` (
  `id_rez` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT '1',
  `id_room` int(11) DEFAULT '1',
  `id_hotel` int(11) DEFAULT '1',
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `date_payment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `authority` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `refid` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id_rez`),
  KEY `id_user` (`id_user`),
  KEY `id_room` (`id_room`),
  KEY `id_hotel` (`id_hotel`),
  CONSTRAINT `rezerve_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `rezerve_ibfk_2` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id_room`),
  CONSTRAINT `rezerve_ibfk_3` FOREIGN KEY (`id_hotel`) REFERENCES `hotels` (`id_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO rezerve VALUES("29","5","2","117","2019-08-22","2019-08-29","2019-08-20 15:45:58","14","zarinpal_000000000000000000000000000000027549","0");
INSERT INTO rezerve VALUES("30","5","2","117","2019-08-21","2019-08-21","2019-08-20 00:00:00","1200","2323333333333333333","1");
INSERT INTO rezerve VALUES("31","1","2","117","2019-08-24","2019-08-31","2019-08-20 17:31:40","1222222","2222222222222222222222222222222","1");
INSERT INTO rezerve VALUES("32","3","3","118","2019-08-23","2019-08-31","2019-08-23 07:18:18","12000","12222","1");
INSERT INTO rezerve VALUES("33","5","3","118","2019-08-14","2019-08-22","2019-08-29 07:18:18","13000","12222222222222","1");
INSERT INTO rezerve VALUES("34","21","2","117","2019-08-14","2019-08-12","2019-08-22 20:19:35","24333","0","1");
INSERT INTO rezerve VALUES("35","3","3","117","2019-08-06","2019-08-13","2019-08-22 00:00:00","12000","223333","1");
INSERT INTO rezerve VALUES("36","5","2","117","2019-08-25","2019-08-31","2019-08-23 16:12:22","540","zarinpal_000000000000000000000000000000029470","1");
INSERT INTO rezerve VALUES("37","5","3","118","2019-08-28","2019-08-29","2019-08-24 02:05:00","1255","zarinpal_000000000000000000000000000000029712","0");
INSERT INTO rezerve VALUES("38","5","3","118","2019-09-27","2019-09-29","2019-08-24 02:47:26","1255","zarinpal_000000000000000000000000000000029722","0");
INSERT INTO rezerve VALUES("39","5","4","118","2019-08-27","2019-08-29","2019-08-25 23:20:32","1255","zarinpal_000000000000000000000000000000030802","0");
INSERT INTO rezerve VALUES("40","5","10","114","2019-08-28","2019-08-30","2019-08-26 10:35:06","1255","zarinpal_000000000000000000000000000000030912","0");



CREATE TABLE `rezerve_and_costomer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rezerve` int(11) NOT NULL,
  `id_costomer` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rezerve` (`id_rezerve`,`id_costomer`),
  KEY `id_costomer` (`id_costomer`),
  CONSTRAINT `rezerve_and_costomer_ibfk_1` FOREIGN KEY (`id_costomer`) REFERENCES `customers` (`id_customers`),
  CONSTRAINT `rezerve_and_costomer_ibfk_2` FOREIGN KEY (`id_rezerve`) REFERENCES `rezerve` (`id_rez`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO rezerve_and_costomer VALUES("1","29","193");
INSERT INTO rezerve_and_costomer VALUES("5","30","150");
INSERT INTO rezerve_and_costomer VALUES("6","30","172");
INSERT INTO rezerve_and_costomer VALUES("3","30","194");
INSERT INTO rezerve_and_costomer VALUES("4","31","173");
INSERT INTO rezerve_and_costomer VALUES("7","36","195");
INSERT INTO rezerve_and_costomer VALUES("8","36","196");
INSERT INTO rezerve_and_costomer VALUES("10","37","198");
INSERT INTO rezerve_and_costomer VALUES("11","37","199");
INSERT INTO rezerve_and_costomer VALUES("13","38","201");
INSERT INTO rezerve_and_costomer VALUES("14","38","202");
INSERT INTO rezerve_and_costomer VALUES("15","39","204");
INSERT INTO rezerve_and_costomer VALUES("16","39","205");
INSERT INTO rezerve_and_costomer VALUES("18","40","206");
INSERT INTO rezerve_and_costomer VALUES("19","40","207");



CREATE TABLE `room_faci` (
  `id_room_faci` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id_room_faci`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO room_faci VALUES("8","123434");
INSERT INTO room_faci VALUES("9","qwqw");
INSERT INTO room_faci VALUES("12","صبحانه");



CREATE TABLE `rooms` (
  `id_room` int(11) NOT NULL AUTO_INCREMENT,
  `black` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `num_adobt_person` int(11) NOT NULL,
  `num_child_person` int(11) NOT NULL,
  `discription` text COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `deaction` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_room`),
  KEY `id_hotel` (`id_hotel`),
  CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotels` (`id_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO rooms VALUES("1","A121212","12000000","117","3","2","oiodssasdasaddadasdsadfsdfasdfasdfdgdfgsdfgsfg","2er.PNG","1");
INSERT INTO rooms VALUES("2","A1","900000","117","2","1","qwqwqw","2er.PNG","1");
INSERT INTO rooms VALUES("3","A1","200000","118","2","1","12","hydropolis.jpg","1");
INSERT INTO rooms VALUES("4","A1","9","118","2","1","12","hydropolis.jpg","1");
INSERT INTO rooms VALUES("5","L","90","118","2","1","wewe","MW-GW234_f9b6dd_20181030173025_ZH.jpg","1");
INSERT INTO rooms VALUES("6","L","120000","124","2","2","adfafdsdfadf","10.PNG","1");
INSERT INTO rooms VALUES("7","L","100000000","124","1","0","dsdsdsd","12.jfif","1");
INSERT INTO rooms VALUES("8","L","1200000","114","2","1","good","abn.jpg","0");
INSERT INTO rooms VALUES("9","L","1800000","124","1","0","nice","abn1.jpg","1");
INSERT INTO rooms VALUES("10","L","1900000","114","2","1","niice","abn6.jpg","0");
INSERT INTO rooms VALUES("11","L","1700000","114","1","0","1212","abn6.jpg","0");
INSERT INTO rooms VALUES("12","L3","10000000","114","3","2","so","abn6.jpg","0");
INSERT INTO rooms VALUES("13","A4","120400000","115","2","1","not","sayna5.jpg","0");
INSERT INTO rooms VALUES("14","k12","4200000","116","2","1","good","ketevan2.jpg","0");



CREATE TABLE `train` (
  `id_train` int(11) NOT NULL AUTO_INCREMENT,
  `secer_num_train` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `id_com_train` int(11) NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `stars` int(11) NOT NULL,
  PRIMARY KEY (`id_train`),
  KEY `id_com_train` (`id_com_train`),
  CONSTRAINT `train_ibfk_1` FOREIGN KEY (`id_com_train`) REFERENCES `train_company` (`id_com_train`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO train VALUES("2","12","3","sdfadfadf","5");
INSERT INTO train VALUES("3","191","3","سییبشسیبیب","1");
INSERT INTO train VALUES("4","133","3","سیبشسیبشیبیب","0");



CREATE TABLE `train_company` (
  `id_com_train` int(11) NOT NULL AUTO_INCREMENT,
  `name_com_train` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `phone_com_train` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email_com_train` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `address_com_train` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `logo_com_train` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `website_com_hotel` text COLLATE utf8_persian_ci NOT NULL,
  `id_city` int(11) NOT NULL,
  PRIMARY KEY (`id_com_train`),
  KEY `id_city` (`id_city`),
  CONSTRAINT `train_company_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO train_company VALUES("3","سییبسی","شسیبشسیب","شسیبببی","شسیبیب","سیبیب","سیبیب","سیببیب","1");



CREATE TABLE `train_cub` (
  `id_cub` int(11) NOT NULL AUTO_INCREMENT,
  `seat_room` int(11) NOT NULL,
  `id_train` int(11) NOT NULL,
  `salon` int(11) NOT NULL,
  PRIMARY KEY (`id_cub`),
  KEY `id_train` (`id_train`),
  CONSTRAINT `train_cub_ibfk_1` FOREIGN KEY (`id_train`) REFERENCES `train` (`id_train`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO train_cub VALUES("1","4","2","1");
INSERT INTO train_cub VALUES("2","4","2","1");



CREATE TABLE `trains_have_depart` (
  `id_train_depart` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `to` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `date_de` datetime NOT NULL,
  `date_reci` datetime NOT NULL,
  `id_cub` int(11) NOT NULL,
  `id_train` int(11) NOT NULL,
  PRIMARY KEY (`id_train_depart`),
  KEY `id_cub` (`id_cub`,`id_train`),
  KEY `id_train` (`id_train`),
  CONSTRAINT `trains_have_depart_ibfk_1` FOREIGN KEY (`id_cub`) REFERENCES `train_cub` (`id_cub`),
  CONSTRAINT `trains_have_depart_ibfk_2` FOREIGN KEY (`id_train`) REFERENCES `train` (`id_train`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO trains_have_depart VALUES("1","تهران","مشهد","2019-08-08 04:21:00","2019-08-15 07:17:16","1","2");



CREATE TABLE `user_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`,`id_customer`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `user_customer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `user_customer_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customers`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO user_customer VALUES("1","5","78");
INSERT INTO user_customer VALUES("4","5","81");
INSERT INTO user_customer VALUES("2","5","82");
INSERT INTO user_customer VALUES("3","5","137");
INSERT INTO user_customer VALUES("5","5","140");
INSERT INTO user_customer VALUES("6","5","141");
INSERT INTO user_customer VALUES("7","5","142");
INSERT INTO user_customer VALUES("8","5","143");
INSERT INTO user_customer VALUES("9","5","144");
INSERT INTO user_customer VALUES("10","5","145");
INSERT INTO user_customer VALUES("11","5","146");
INSERT INTO user_customer VALUES("12","5","147");
INSERT INTO user_customer VALUES("13","5","148");
INSERT INTO user_customer VALUES("14","5","149");
INSERT INTO user_customer VALUES("15","5","150");
INSERT INTO user_customer VALUES("16","5","151");
INSERT INTO user_customer VALUES("17","5","152");
INSERT INTO user_customer VALUES("18","5","153");
INSERT INTO user_customer VALUES("19","5","154");
INSERT INTO user_customer VALUES("20","5","155");
INSERT INTO user_customer VALUES("21","5","156");
INSERT INTO user_customer VALUES("22","5","157");
INSERT INTO user_customer VALUES("23","5","158");
INSERT INTO user_customer VALUES("24","5","159");
INSERT INTO user_customer VALUES("25","5","160");
INSERT INTO user_customer VALUES("26","5","161");
INSERT INTO user_customer VALUES("27","5","162");
INSERT INTO user_customer VALUES("28","5","163");
INSERT INTO user_customer VALUES("29","5","164");
INSERT INTO user_customer VALUES("30","5","165");
INSERT INTO user_customer VALUES("31","5","166");
INSERT INTO user_customer VALUES("32","5","167");
INSERT INTO user_customer VALUES("33","5","168");
INSERT INTO user_customer VALUES("34","5","169");
INSERT INTO user_customer VALUES("35","5","170");
INSERT INTO user_customer VALUES("36","5","171");
INSERT INTO user_customer VALUES("37","5","172");
INSERT INTO user_customer VALUES("38","5","173");
INSERT INTO user_customer VALUES("39","5","174");
INSERT INTO user_customer VALUES("40","5","175");
INSERT INTO user_customer VALUES("41","5","176");
INSERT INTO user_customer VALUES("42","5","177");
INSERT INTO user_customer VALUES("43","5","178");
INSERT INTO user_customer VALUES("44","5","179");
INSERT INTO user_customer VALUES("45","5","180");
INSERT INTO user_customer VALUES("46","5","181");
INSERT INTO user_customer VALUES("47","5","182");
INSERT INTO user_customer VALUES("48","5","183");
INSERT INTO user_customer VALUES("49","5","184");
INSERT INTO user_customer VALUES("50","5","185");
INSERT INTO user_customer VALUES("51","5","186");
INSERT INTO user_customer VALUES("52","5","187");
INSERT INTO user_customer VALUES("53","5","189");
INSERT INTO user_customer VALUES("54","5","190");
INSERT INTO user_customer VALUES("55","5","191");
INSERT INTO user_customer VALUES("56","5","192");
INSERT INTO user_customer VALUES("57","5","193");
INSERT INTO user_customer VALUES("58","5","194");
INSERT INTO user_customer VALUES("59","5","195");
INSERT INTO user_customer VALUES("60","5","196");
INSERT INTO user_customer VALUES("61","5","197");
INSERT INTO user_customer VALUES("62","5","198");
INSERT INTO user_customer VALUES("63","5","199");
INSERT INTO user_customer VALUES("64","5","200");
INSERT INTO user_customer VALUES("65","5","201");
INSERT INTO user_customer VALUES("66","5","202");
INSERT INTO user_customer VALUES("67","5","203");
INSERT INTO user_customer VALUES("68","5","204");
INSERT INTO user_customer VALUES("69","5","205");
INSERT INTO user_customer VALUES("70","5","206");
INSERT INTO user_customer VALUES("71","5","207");
INSERT INTO user_customer VALUES("72","5","208");



CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `email` varchar(225) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `homephone` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `personailynum` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `birhtdy` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `numcirditcart` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `numcountcart` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `shabnumcart` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `confirmed` int(11) NOT NULL,
  `confirm_code` int(11) NOT NULL,
  `lose` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  KEY `id_parent` (`id_parent`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

INSERT INTO users VALUES("1","","x","0","fff123","کاربر","","","","","","","","","1","0","");
INSERT INTO users VALUES("2","1","y","0","fff123","مدیر","","","","","","","","","1","0","");
INSERT INTO users VALUES("3","1","user3@gmail.com","33444657","fff123","","","","","","","","","","1","0","");
INSERT INTO users VALUES("4","1","waeli2.icsf.1996@gmail.com","09024945661","fff123","","","","","","","","","","1","0","");
INSERT INTO users VALUES("5","2","waeli.icsf.1996@gmail.com","09024945661","fff123","فاطمه","وائلی","375555555","زن","","08/12/2019","","","","1","0","");
INSERT INTO users VALUES("6","1","asdasdas","asdsad","fff123","sadasd","sadasd","asdas","assdas","sadasd","asdasd","asdasd","asdasd","sadsd1","0","1","");
INSERT INTO users VALUES("7","1","weewe","dfd","fff123","","","","","","","","","","0","1","");
INSERT INTO users VALUES("8","1","we","55","fff123","fd","sdf","","","","","","","","1","0","");
INSERT INTO users VALUES("9","1","waweererer","454545","fff123","fata","wadd","","ww","","","","","","1","0","");
INSERT INTO users VALUES("12","1","sdd@gmial.com","454545","fff123","fata","wadd","","ww","","","","","","1","0","");
INSERT INTO users VALUES("17","1","sdd22@gmial.com","454545","fff123","fata","wadd","","ww","","","","","","1","0","");
INSERT INTO users VALUES("18","1","waeliww.icsf.1996@gmail.com","09024945661","fff123","","","","","","","","","","0","1972880481","");
INSERT INTO users VALUES("19","1","sddasss  2@gmial.com","454545","fff123","fata","wadd","","ww","","","","","","1","0","");
INSERT INTO users VALUES("20","1","adm11111in@gamil.com","123","fff123","Fatima","","","مرد","","","","","","1","0","");
INSERT INTO users VALUES("21","1","fat@gmail.com","09024945661","fff123","","","","مرد","","","","","","1","0","");
INSERT INTO users VALUES("22","1","waeli4444.icsf.1996@gmail.com44444","09024945661","fff123","","","","مرد","","","","","","1","0","");
INSERT INTO users VALUES("23","2","waeli4.icsf.1996@gmail.com44444","09024945661","fff123","Fatima","محمدی","","مرد","","","","","","1","0","");
INSERT INTO users VALUES("24","1","waeli4.icsf.1996@gmail.com12","09024945661","fff123","Fatima","محمدی","","مرد","","","","","","1","0","");
INSERT INTO users VALUES("25","1","waeli.icsf.1996@gmail.com12","09024945661","fff123","Fatima","محمدی","","مرد","","","","","","1","0","");
INSERT INTO users VALUES("27","2","fatigit96@gmail.com","09024945661","fff123","Fatima","محمدی","","زن","","","","","","1","0","");
INSERT INTO users VALUES("28","1","fatigit11196@gmail.com","09024945661","fff123","Fatima","محمدی","","مرد","","","","","","1","0","");
INSERT INTO users VALUES("29","1","waeli.icsf23231.996@gmail.com","09024945661","fff123","فاطمه","وائلی123","","زن","","","","","","1","0","");
INSERT INTO users VALUES("30","1","waeli.icsf.1996@gmail.com1222","09024945661","fff123","Fatima","محمدی","","مرد","","","","","","1","0","");
INSERT INTO users VALUES("31","1","waeli.icsf.1996@gmail.com1ww","09024945661","fff123","Fatima","waeli","","زن","","","","","","1","0","");
INSERT INTO users VALUES("32","1","waeli.icsf.1996@gmail.com2121","09024945661","fff123","علی","مخمدی","","زن","","","","","","1","0","");
INSERT INTO users VALUES("33","2","sswaeli.icsf.1996@gmail.com","09024945661","fff123","علی","محمدی","","مرد","","","","","","1","0","");

