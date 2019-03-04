
-- Database: `moviedb`
--
CREATE DATABASE IF NOT EXISTS `moviedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `moviedb`;

-- --------------------------------------------------------

--
-- Table structure for table `movietable`
--

CREATE TABLE `movietable` (
  `id` int(5) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `day` int(2) NOT NULL,
  `month` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  `describe` text CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`id`, `name`, `day`, `month`, `year`, `describe`, `img`) VALUES
(67, 'Avengers : Infinity War', 25, 'เมษายน', 2561, 'หนัง Avengers : Infinity War ภัยคุกคามที่ใหญ่กว่าครั้งไหนๆ และยากเกินกว่าที่ฮีโร่คนเดียวจะรับมือไหว เพราะนี่คือการมาของจอมเผด็จการแห่งจักรวาล ทานอส เป้าหมายเขาคือรวบรวมอัญมณี Infinity Stone เหล่า Avengers และสหายร่วมรบของเขาคือโอกาสเดียวที่จะปกป้องชะตากรรมของโลกและจักรวาลนี้\r\n\r\n', '180403083009XhR.jpg'),
(69, 'Love,Simon', 23, 'พฤษภาคม', 2561, 'ทุกคนสมควรที่จะมีเรื่องรักดี ๆ กันสักครั้ง แต่สำหรับเด็กหนุ่มวัย 17 ปี อย่าง ไซมอน สเพียร์ มันค่อนข้างจะซับซ้อนอยู่สักหน่อย เขายังไม่ได้บอกครอบครัว หรือเพื่อนเลยว่าเขาเป็นเกย์ และเขายังไม่รู้เลยว่าเพื่อนชายที่เขาตกหลุมรักทางอินเตอร์เน็ตนั้นเป็นใครที่เป็นเพื่อนร่วมชั้น การแก้ไขปัญหาเรื่องนี้มันเลยค่อนข้างจะวุ่นๆ ตื่นเต้น และเต็มไปด้วยเสียงฮาที่แสนจะมีชีวิตชีวา', 'thumb_2223.jpg'),
(76, 'Book Club', 17, 'พฤษภาคม', 2561, 'ไดแอน (ไดแอน คีตัน) เพิ่งจะได้กลายเป็นแม่หม้ายหลังจากการแต่งงานมากว่า 40 ปี วิเวียน (เจน ฟอนด้า) ที่ยังคงลั้ลลาอยู่กับชีวิตโสด ชารอน (แคนดิซ เบอร์เกน) ผู้ที่ยังคงทำใจกับการหย่าร้างที่เกิดขึ้นเมื่อสิบปีก่อน และ แคโรล (แมรี สตีนเบอร์เกน) ที่ชีวิตคู่ไม่อยู่กับร่องกับรอยมากว่า 35 ปี\r\nเพื่อนซี้ 4 สาว ที่ได้เปิดชมรมอ่านหนังสือ เพื่อแบ่งปันเรื่องราวและประสบการณ์การอ่าน ได้พบกับหนังสือที่จะมาเปลี่ยนแปลงชีวิตของพวกเธอเมื่อได้อ่านหนังสือดังกระฉ่อนโลกอย่าง \"ฟิฟตี้ เชดส์ ออฟ เกร\"', 'thumb_2359.jpg'),
(77, 'ตุ๊ดตู่กู้ชาติ', 24, 'พฤษภาคม', 2561, 'เรื่องราวของหมู่บ้านคุ้งระกาหมู่บ้านนอกเมืองหลวงที่มีวิถีชีวิตแบบบ้านๆ ทำนาทำไร่เลี้ยงช้างตามภาษาชาวบ้านธรรมดา ที่ต้องไปช่วยเหลือประเทศชาติ', 'thumb_2293.jpg'),
(78, 'Jurassic World: Fallen Kingdom', 7, 'มิถุนายน', 2561, 'จะเป็นเรื่องราวเกี่ยวกับ Claire Dearing นางเอกสาวส้นสูงของเราผู้เป็นคนก่อตั้งองค์กรใหม่ขึ้นมาที่ชื่อว่า “Dinosaur Protection Group” หรือแปลได้ว่า “กลุ่มผู้คุ้มครองพิทักษ์ไดโนเสาร์” ที่ซึ่งจะเป็นกลุ่มที่มีการปรากฏตัวของตัวละครหน้าใหม่ที่รับบทโดย Daniella Pineda และ Justice Smith\r\nภารกิจของพวกเขาต้องยากยิ่งขึ้นเมื่อพวกเขาต้องหาทางอพยพเหล่าไดโนเสาร์ออกจากเกาะ หลังจากการตื่นขึ้นของภูเขาไฟยักษ์ ที่จะคร่าชีวิตของสิ่งมีชีวิตทุกชนิดบนเกาะและทำให้เกาะแห่งนี้ลุกเป็นไฟ เธอจึงจำต้องกลับไปขอความช่วยเหลือจากคนรักเก่าของเธออย่าง Owen Grady พระเอกสุดเท่ผู้คุยกับไดโนเสาร์รู้เรื่องให้กลับมาช่วยเธออีกครั้งหนึ่ง', 'thumb_2147.jpg'),
(80, 'รวมเหล่ายอดคนพิทักษ์โลก 2', 21, 'มิถุนายน', 2561, 'มีข้อมูลว่าในภาค 2 นี้จะเป็นเจาะลึกในแง่มุมใหม่มากขึ้นและพาเราขับเคลื่อนครอบครัวพารร์ไปในจุดที่สนุกที่สุด อีลาสติเกิร์ลจะมีบทบาทในภาคนี้มากขึ้น รวมถึงจะมีฮีโร่ใหม่ๆเข้ามากอบกู้โลกจากวายร้ายและอาชญากรรม ร่วมกับตัวละครเดิมอย่าง Mr. Incredible,  Dash, Violet, Jack-Jack และ Frozone', 'thumb_2148.jpg'),
(81, 'Beyond the Edge', 28, 'มิถุนายน', 2561, 'Contemporary Moscow. A talented gambler gathers a team of people with supernatural powers to win big at a casino. But they find a much stronger mystical rival.', 'thumb_2315.jpg'),
(82, 'Sicario: Day of the Soldado', 28, 'มิถุนายน', 2561, 'The drug war on the US-Mexico border has escalated as the cartels have begun trafficking terrorists across the US border. To fight the war, federal agent Matt Graver re-teams with the mercurial Alejandro.', 'thumb_2251.jpg'),
(83, 'Skyscrapper', 12, 'กรกฎาคม', 2561, 'ดเวนย์ จอห์นสัน กลับมารับบทนำเป็นหัวหน้าทีมช่วยเหลือตัวประกันแห่ง FBI ผู้เคยเป็นทหารผ่านศึกชื่อว่า วิล ฟอร์ด ผู้ถูกเลือกให้มาดูแลความปลอดภัยของตึกสูงระฟ้า ในประเทศจีน เขาได้มาถึงตึกที่สูงที่สุด และปลอดภัยที่สุดในโลกที่จู่ ๆ ก็เกิดเหตุเพลิงไหม้ เขาต้องหาทางเอาชีวิตรอด และช่วยเหลือครอบครัวของตัวเองท่ามกลางเปลวเพลิงที่โหมกระหน่ำ', 'thumb_2227.jpg'),
(84, 'Future World', 19, 'กรกฎาคม', 2561, 'The movie is set in the barren landscape of a post-apocalyptic world, where a young Prince from the Oasis (one of the last known safe-havens) and a robot named Ash go on a daring journey of self-discovery - one that winds through the violent and desolate world of the Wastelands.', 'thumb_2347.jpg'),
(85, 'Laplace’s Witch', 19, 'กรกฎาคม', 2561, 'An environmental analyst is asked by the police to determine if two deaths by hydrogen sulfide poisoning are an accident - or a murder. But when he meets a young woman at both sites, a scientific mystery begins.', 'thumb_2364.jpg'),
(86, 'Christopher Robin', 9, 'สิงหาคม', 2561, 'ถึงเวลาพบกับเพื่อนรักในวัยเด็ก อีกครั้ง กับภาพยนตร์แฟนตาซีจากสตูดิโอผู้สร้าง Beauty And The Beast เมื่อคริสโตเฟอร์ โรบิน ที่โตเป็นผู้ใหญ่ได้พบวินนี่ เดอะ พูห์ อีกครั้งใน Christopher Robin - คริสโตเฟอร์ โรบิน 9 สิงหาคมนี้ ในโรงภาพยนตร์', 'thumb_2331.jpg'),
(87, 'Soccer Killer นักเตะกังฟูเทวดา', 23, 'สิงหาคม', 2561, 'In the Song Dynasty, a group of patriots play soccer against the traitor with a team of foreign enemies, royal pro-nobles, bandits, martial arts masters and embrace the country hatred to compete for the first time in the history of China International soccer match.', 'thumb_2313.jpg'),
(88, 'Trading Paint', 16, 'สิงหาคม', 2561, 'A veteran race car driver and his son, a fellow driver, overcome family and professional conflicts, balancing competition, ego, resentment and a racing nemesis to come out stronger on the other side.', 'thumb_2316.jpg'),
(89, 'Captive State', 16, 'สิงหาคม', 2561, 'Set in a Chicago neighborhood nearly a decade after an occupation by an extra-terrestrial force, Captive State explores the lives on both sides of the conflict - the collaborators and dissidents.', 'thumb_2329.jpg'),
(90, 'The Predator', 13, 'กันยายน', 2561, 'The sci-fi action franchise sequel/reboot is to be directed by Shane Black from a script by his \"Monster Squad\" co-writer Fred Dekker, and based on a story that the pair wrote together.', 'thumb_2232.jpg'),
(92, 'Mile 22', 20, 'กันยายน', 2561, 'An elite American intelligence officer, aided by a top-secret tactical command unit, tries to smuggle a mysterious police officer with sensitive information out of the country.', 'thumb_2372.jpg'),
(93, 'Monstrum', 4, 'ตุลาคม', 2561, 'Yoon Gyeom is a loyal subject of King Jung Jong of Joseon. He struggles to fight ', 'thumb_2350.jpg'),
(94, 'Johnny English 3', 4, 'ตุลาคม', 2561, 'พบกับการกลับมาของโรแวน แอตคินสัน ในบทสายลับอังกฤษผู้ยิ่งใหญ่ Johnny English Strikes Again พยัคฆ์ร้าย ศูนย์ ศูนย์ ก๊าก รีเทิร์น การผจญภัยครั้งใหม่เมื่อการจู่โจมทางไซเบอร์ทำให้สายลับอังกฤษที่กำลังทำหน้าที่ในปัจจุบันถูกเปิดเผยตัว จอห์นนี่ อิงลิช จึงกลายเป็นความหวังสุดท้าย ด้วยภารกิจการค้นหาแฮคเกอร์ตัวฉกาจ และต้องเอาชนะความท้าทายของเทคโนโลยีสมัยใหม่ เพิ่อทำภารกิจให้สำเร็จ', 'thumb_2234.jpg'),
(95, 'Happy Time Murders', 18, 'ตุลาคม', 2561, 'When the puppet cast of an 80s childrens TV show begins to get murdered one by one, a disgraced LAPD detective-turned-private eye puppet takes on the case. ', 'thumb_2349.jpg'),
(96, 'Hunter Killer', 25, 'ตุลาคม', 2561, 'An untested American submarine captain teams with U.S. Navy Seals to rescue the Russian president, who has been kidnapped by a rogue general.', 'thumb_2327.jpg'),
(97, 'Slender Man', 18, 'ตุลาคม', 2561, 'Slender Man คือเรื่องราวของสิ่งมีชีวิตลึกลับรูปร่างผอมสูง ตัวแทนของความสยองขวัญที่มีแขนยาวและปราศจากใบหน้า ผู้ที่อยู่เบื้องหลังความหลอนสุดสยอง และการหายไปอย่างนับไม่ถ้วนของบรรดาเด็ก ๆ และ วัยรุ่น', 'thumb_2225.jpg'),
(98, 'The Girl in the Spider is Web', 1, 'พฤษภาคม', 2561, 'Young computer hacker Lisbeth Salander and journalist Mikael Blomkvist find themselves caught in a web of spies, cybercriminals and corrupt government officials.', 'thumb_2283.jpg'),
(99, 'Robin Hood', 22, 'พฤศจิกายน', 2561, 'A war-hardened Crusader and his Moorish commander mount an audacious revolt against the corrupt English crown in a thrilling action-adventure packed with gritty battlefield exploits, mind-blowing fight choreography, and a timeless romance.', 'thumb_2368.jpg'),
(100, 'Bumblebee', 20, 'ธันวาคม', 2561, 'On the run in the year 1987, Bumblebee finds refuge in a junkyard in a small Californian beach town. Charlie (Hailee Steinfeld), on the cusp of turning 18 and trying to find her place in the world, discovers Bumblebee, battle-scarred and broken. When Charlie revives him, she quickly learns this is no ordinary, yellow VW bug.', 'thumb_2240.jpg'),
(101, 'Zero', 21, 'ธันวาคม', 2561, 'Raj who struggles to find love, pairs him self up with one of the most wanted women on earth. No knowing what to expect in return. True love has many forms.', 'thumb_2249.jpg'),
(102, 'Mary Poppins Returns', 27, 'ธันวาคม', 2561, 'In Depression-era London, a now-grown Jane and Michael Banks, along with Michael is three children, are visited by the enigmatic Mary Poppins following a personal loss. Through her unique magical skills, and with the aid of her friend Jack, she helps the family rediscover the joy and wonder missing in their lives.', 'thumb_2180.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movietable`
--
ALTER TABLE `movietable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movietable`
--
ALTER TABLE `movietable`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;