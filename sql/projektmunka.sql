-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Máj 02. 23:15
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `projektmunka`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Tips'),
(2, 'Finding'),
(3, 'Help'),
(4, 'Tour');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `text` varchar(250) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `userid`, `postid`, `text`, `date`) VALUES
(6, 1, 1, 'Érdekes', '2025-05-02 23:14:38'),
(7, 1, 1, 'Valóban', '2025-05-02 23:14:46');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `fossilid` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `description`, `text`, `fossilid`, `date`) VALUES
(1, 1, 'Ősmaradvány', 'Ősmaradványt találtam a Bükk-hegységben. Szerintem nagyon különleges lelet!', 'Ősmaradványt találtam a Bükk-hegységben. Szerintem nagyon különleges lelet!', 0, '2025-01-11 00:00:00'),
(2, 1, 'Lelet a Pilisben', 'Különleges rák lelet a a  Pilisben. Valakinek van ötlete ez melyik faj?', 'Különleges rák lelet a a  Pilisben. Valakinek van ötlete ez melyik faj?', 0, '2024-12-18 00:00:00'),
(3, 1, 'Hogyan találj leleteket?', 'Szeretnél ősmaradványok után kutatni, de nem tudod hogy állj hozzá? Itt van néhány tipp az elinduláshoz.', 'Szeretnél ősmaradványok után kutatni, de nem tudod hogy állj hozzá? Itt van néhány tipp az elinduláshoz.', 0, '2025-01-03 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `post_cat`
--

CREATE TABLE `post_cat` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `post_cat`
--

INSERT INTO `post_cat` (`id`, `postid`, `catid`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 2, 3),
(4, 3, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `sitename` varchar(100) NOT NULL,
  `introduction` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`gallery`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `sites`
--

INSERT INTO `sites` (`id`, `sitename`, `introduction`, `description`, `gallery`) VALUES
(1, 'Nagyvisnyó  (Vasúti Bevágások)', 'Perm kori lelőhely', 'A földtörténeti ókorban (paleozoikum) lerakódott kőzetek ritkák Magyarországon, és így kevés ősmaradvány-lelőhely áll a gyűjtők rendelkezésére. A legfontosabb fosszília-előfordulások a Bükk északi előterében, Nagyvisnyó közelében ismertek. A feltárások nagy része az Eger és Putnok között húzódó vasútvonalnak köszönhetően jött létre. A II. számú vasúti bevágásban a karbon időszaki tengerben lerakódott agyagos palák bukkannak elő. A leggyakoribb kövületek a pörgekarúak (Brachiopoda), de előfordulnak csigák, kagylók, korallok és tengeri liliomok is. A brachiopodák között a közelmúltban 36 fajt különítettek el (például Linoproductus, Dielasma, Chonetes). A később lerakódott perm időszaki rétegek az V. számú vasúti bevágásban bukkannak elő. A leggyakoribbak itt is a brachiopodák, mint például a Leptodus. Magyarország területéről csak innen ismertek a paleozoikum emblematikus maradványai, a háromkaréjos ősrákok vagy más néven trilobiták (Pseudophillipsia). Látványos feltárásban bukkan a felszínre a perm időszaki fekete mészkő Nagyvisnyó község belterületén (Mihalovits-kőfejtő). Itt azonban nehezebben lehet ősmaradványokat gyűjteni, mivel többnyire csak metszetben láthatók a kemény mészkő felszínén. A perm időszaki rétegekből került elő egy korai cápafaj (Acrodus) foga is.', '[\"680753f4737fe_Pseudophillipsia.jpg\",\"680754184e0a3_Leptodus.jpg\",\"6807542f460c0_Dielasma.jpg\",\"6807544dc44af_Linoproductus.jpg\",\"680754670a146_Chonetes.jpg\",\"6807547be2c01_Acrodus.jpg\"]'),
(2, 'Eger (Noszvaj felé vezető út bevágás)', 'Oligocén kori lelőhely', 'Az Egerből Noszvaj felé vezető és a Kis-Eged oldalában meredeken emelkedő út mentén kibukkanó feltárásokban a rétegfelszínek mentén úgy lehet lapozni a kőzetet, mint egy könyvnek a lapjait. Aki kitartóan és szerencsés kézzel gyűjt az útszéli feltárásban, előbb-utóbb levéllenyomatokat és halmaradványokat találhat a réteglapokon. Az igazán szerencsések akár teljesen ép és teljes halakat is találhatnak. Wilhelm Weiler munkája nyomán tudjuk, hogy heringfélék, fűrészesfogú sügérek, makrahal-félék és homoki angolnák fiatal példányai gyakoriak ezen a lelőhelyen. Helyenként növénymaradványok is előkerülhetnek, amelyek között elsősorban levéllenyomatok felbukkanására számíthatunk. Néha azonban négy ágú szárnyas terméseket is találhatunk a rétegfelszíneken. A növényi fosszíliák örökzöld és lombhullató fákat egyaránt jeleznek az egykori kora oligocén erdőkben. Az út melletti gyűjtés a nagy forgalom miatt balesetveszélyes lehet!', '[\"68075d5e91600_Scomber_voitestii.jpg\",\"68075d751100c_Platanus_neptuni.jpg\",\"68075d81100ec_Eotrigonobalanus_furcinervis.jpg\"]'),
(3, 'Eger (Wind-féle téglagyár)', 'Oligocén kori lelőhely', 'A város délkeleti peremén álló egykori Wind-téglagyár agyagbányája még ma is működik, ezért csak engedély birtokában szabad gyűjteni, amikor a munkavégzés szünetel. A bányában a Kiscelli agyag felett az úgynevezett Egri Formáció vastag rétegsora figyelhető meg. Ez a lelőhely szolgált a Középső-Paratethys területén használt egri emelet bevezetésének alapjául is. A változatos rétegsor kezdetben mélyebb, majd egyre sekélyedő tengerben, és végül egy lagúnában rakódott le. Ennek megfelelően a benne található ősmaradványok is nagyon változatosak. A leggyakoribbak a puhatestűekhez tartozó különböző csiga- és kagylóvázak, amelyek gyakran viselik valamilyen ragadozó szervezetnek a fúrásnyomait is. A csigák között gyakoriak a Turritella, Pirenella, Turris, Ficus, Athleta és Turricula fajok. A kagylókat a díszítetlen Pitar vagy a bordázott felületű Laevicardium képviseli. Helyenként előfordulnak az agyagban kisméretű magános korallok is (Ceratotrochus, Odontocyathus, Caryophyllia). A gerinceseket a kisméretű otolithok, vagyis a halaknak a hallókövei képviselik. Ezeket szabad szemmel ugyan nehéz észrevenni az agyagban, de ha finom lyukméretű szitán (vagy akár egy tésztaszűrőn) óvatosan átmossuk az agyagot, akkor az így visszamaradó ún. iszapolási maradékban egy mikroszkóp alatt az otolithok mellett számos egyéb apró ősmaradványt is találhatunk (csigák, kagylók, mohaállatok, egysejtű foraminiferák stb.).', '[\"6807785b2ffb5_Turritella_venus.jpg\",\"6807786b6d8a9_Athleta_rarispina.jpg\",\"6807787c93662_Ficus_condita.jpg\",\"6807788b45c0f_Turricula_regularis.jpg\",\"6807789704595_Pitar_polytropa.jpg\",\"680778a423ac5_Typhis_pungens.jpg\",\"680778af263a0_Laevicardium_tenuisulcatum.jpg\"]'),
(4, 'Mátraverebély (Szentkút)', 'Miocén kori lelőhely', 'A híres búcsújáró hely fölötti domboldal rejti magában a szintén jól ismert barátlakásokat. A templom mögötti gyalogúton felfelé pár száz métert megtéve megfigyelhetjük, hogyan települnek a középső miocén homokrétegek az alul elhelyezkedő vulkáni eredetű kőzetekre. A barátlakásokat ebbe a sekélytengeri homokba vájták egykor a szerzetesek. Az üregek védettek, így azoknak a falából nem szabad gyűjteni. Érdemes azonban néhány tíz méterrel eltávolodni a barlanglakásoktól, és közelebbről is szemügyre venni az üledékes kőzetet. Néhány kagylóhéjat vagy féregcsövet már szabad szemmel is megfigyelhetünk a helyszínen, de célszerű egy zacskóban fél kilónyi homokot hazavinni, és kis lyukméretű szitán alaposan átmosni. A szitában visszamaradó anyagot száradás után mikroszkóp alatt átnézve, az egykori tengeraljzat bámulatos gazdagságú élővilága tárul elénk. Az iszapolási maradékban szinte minden szemcse egy-egy fosszília. A maradványok többsége mohaállat (Bryozoa), melyekből akár 80-100 különböző faj is előfordulhat egy mintában. Emellett azonban találkozhatunk pörgekarúakkal (Brachiopoda), pici tengerisünökkel (Echinoidea), tengerililiom nyéltagokkal (Crinoidea), mészvázas egysejtűekkel (Foraminifera) vagy tízlábú rákok (Decapoda) ollójának a töredékeivel is.', '[\"68077c5b3b3e2_Bryozoa.jpg\",\"68077c6a6da58_Platidia_anomioides.jpg\"]'),
(5, 'Szurdokpüspöki (diatomitbánya)', 'Miocén kori lelőhely', 'A középső miocén során működő vulkánok nagyon sok oldott kovasavat juttattak a tűzhányók körül található vizekbe, ahol emiatt robbanásszerűen elszaporodtak a kovamoszatok vagy diatomák. Ezek pici vázainak a tömeges felhalmozódása hozta létre a krétaszerű kovaföldet, a diatomitot, amit korábban több helyen is bányásztak. Az egyik legjelentősebb diatomitbánya a Mátra peremén található Szurdokpüspöki határában volt. A bányászat során vastag rétegsort tártak itt fel, amely részben tengeri, részben édesvízi környezetben rakódott le. A kovaalgák alapján a rétegsor alsó része édes vagy csak kissé sós vízben képződött, a rétegsor felső része viszont meleg vizű tengeri környezetre utaló fajokat tartalmaz. Maguk a kovamoszatok nagyon változatosak, de csak erős nagyítású mikroszkópban figyelhetők meg. A vékonyan rétegzett diatomit réteglapjai viszont hal-, rovar- vagy emlősmaradványokat tartalmaznak. A viszonylag gyakori halak mellett nagy számban gyűjthetők itt édesvízi és tengeri csigák és kagylók is. Érdekesség a közelmúltban publikált, csaknem teljesen ép zöld varangy (Bufo viridis) lelet, amelynek szurdokpüspöki eredetét a beágyazó kőzet kovamoszatainak vizsgálatával bizonyították.', '[\"68077e536a750_Bufo_viridis.jpg\"]'),
(6, 'Ipolytarnóc', 'Miocén kori lelőhely', 'Az ipolytarnóci lelőhely szigorúan védett és emiatt itt gyűjteni nem szabad, a börzsöny-cserháti terület ősmaradványait áttekintve azonban nem mulaszthatjuk el ennek a méltán nemzetközi hírű lelőhelynek az ismertetését. Nemcsak a geológia és az őslénytan kedvelői, hanem minden természetbarát számára \"kötelező\" látnivalók találhatók itt. A községtől keletre húzódó Borókás-árokban az egykori itatóhely köré építettek látványos bemutatóhelyet. A terület a miocén elején egy feltörő rétegforrás környezetében helyezkedett el, amit dagonyázó helyként használták az állatok. Az itató körül betemetődött és megőrződött mintegy 3000 lábnyom alapján 11 állatfajt tudtak a paleontológusok elkülöníteni (például orrszarvú, párosujjú patások, madarak, ragadozók). A lábnyomos réteglap mellett számos miocén cápafogat és ősnövényt is láthatunk a kiállítási csarnokban. A lábnyomos homokkövet betemető vulkáni tufából mintegy 10 ezer levéllenyomatot gyűjtöttek, amelyek nagyon változatos egykori növényvilágot tárnak a látogatók elé. Külön látványosságot jelent egy hatalmas kovásodott fatörzs maradványa. A valaha 42 méter hosszú (!) ősfából mára sajnos mindössze néhány méter maradt a természetes erózió és a korábban nem korlátozott gyűjtések miatt. Szintén Ipolytarnócon tekinthetők meg azok a miocén mocsáriciprus törzsek, amelyeket 2007 nyarán találtak a bükkábrányi lignittelep fedőjében. A körülbelül 7-8 millió éves Taxodioxylon és Glyptostroboxylon törzsek állva pusztultak el, amikor a hirtelen érkező homok betemette őket. A legjobb állapotú példányok konzerválás után kerültek az ipolytarnóci bemutatóhelyre.', '[\"6807802511499_Ipolytarnoc.jpg\",\"6807802f8bce0_Daphnogene_bilinica.jpg\",\"6807804414bb3_Woodwardia_muensteriana.jpg\",\"6807804e2d6bf_Engelhardia_orsbergensis.jpg\",\"6807812825efa_torzsek.jpg\"]'),
(7, 'Szob (Malom-kert)', 'Miocén kori lelőhely', 'Ősmaradványokban nagyon gazdag homokos üledékeket ismerünk Szob északnyugati határában, a Malom-kert környékén. A sárgás színű homokból kiváló megtartású ősmaradványok gyűjthetők, de a vékony héjú kagylók sajnos többnyire összetöredeznek. Összességében 267 csiga és 78 kagylófajt írtak le erről a lelőhelyről. A nagyon gazdag csigafaunában többek között számos Murex, Natica, Conus és Turritella faj fordul elő. A kagylók között a nagyobb méretű fajok közé tartozik a kerekded körvonalú Glycymeris. Szintén jellegzetesek az Anadara és a Venus kagylófosszíliák, de ennek a lelőhelynek a leggyakoribb maradványa a kistermetű, erősen domború Corbula kagyló. A szobi példányokon gyakran találkozhatunk marószivacsok nyomaival. A szivacsok a mészvázú szervezetek vázaiba marják be bonyolult és jellegzetes csatornahálózataikat. A hazai középső miocén (badeni) tízlábú rákok közül a Callianassa nemzetség képviselői több börzsönyi lelőhelyen előfordulnak, így például Szobon is. Sok fajukat Magyarországról írták le először, közéjük tartozik a Callianassa szobensis. A szobi homokban viszonylag gyakoriak a korong alakú, úgynevezett lunulitiform mohaállatok (Cupuladria, Reussirella). A gerinces ősmaradványokat elsősorban az elmeszesedett hallókövek képviselik. Az otolithok 0,5-15 milliméter nagyságú, aragonitból vagy apatitból álló képződmények, amelyek a halak egyensúlyozásában játszanak szerepet. Több mint 1000 otolith példány alapján 19 halfajt határoztak meg a szobi középső miocén feltárásból, melyek között a partközeli, sekélytengeri fajok uralkodtak (pl. Gobius, Diaphus, Trisopterus).', '[\"68078dd828aa2_Anadara_diluvii.jpg\",\"68078de45c8c1_Venus_multilamella.jpg\",\"68078dee1397e_Conus_ponderosus.jpg\",\"68078df881192_Turritella_erronea.jpg\"]'),
(8, 'Zebegény (Bőszobi-bánya)', 'Miocén kori lelőhely', 'Zebegény határában gyakori az alsó badeni lajtamészkő, melyet egy még ma is működő bánya tár fel nagy vastagságban (Bőszobi bánya). A bánya területén csak engedély birtokában szabad gyűjteni. A vörösalgás mészkövekben és meszes márgákban az aragonitvázú állatok (pl. korallok, csigák, egyes kagylók) anyaga az esetek többségében kioldódik, és csak lenyomatok, illetve kőbelek formájában találkozhatunk velük. Ezekben a kőzetekben általában csak a kalcitvázú szervezeteknél marad meg maga a váz, például a tengerisünök és egyes kagylók (Pecten, Ostrea) esetében. Ennek az a magyarázata, hogy bár mindkét ásvány CaCO3-ból épül fel, a kalcit kristályszerkezete sokkal ellenállóbb az oldódással szemben, mint az aragonité. A Bőszobi bányából Porites, Plesiastraea, Cyphastraea és Tarbellastraea zátonyépítő telepes korallok maradványai kerültek elő. A karbonátos lelőhelyek gyakori és jellegzetes kagylója a viszonylag nagytermetű Gigantopecten nodosiformis, valamint a tüskézett felszínű Spondylus. A Pholadomya kagylók nagyméretű kőbelei is gyakoriak. A korallos mészkőpadokban fordul elő a Lithophaga nevű fúrókagyló. A mohaállatokat ezen a lelőhelyen elsősorban a puhatestű héjakra és egyéb ősmaradványokra nőtt bekérgező fajok képviselik. A laza vörösalgás márga rétegekből tengeri sünök (pl. Clypeaster) is rendszeresen előkerülnek. A nagyobb termetű tengeri gerincesek egykori jelenlétére utal az a tengeri tehén (Sirenia) maradvány, melyet itt találtak a lajtamészkő rétegekben. A számos vastag bordát tartalmazó lelet a szobi Börzsöny Múzeum állandó kiállításán látható.', '[\"68079159cb945_Clypeaster_sp.jpg\",\"680791d365d99_Gigantopecten_nodosiformis.jpg\"]'),
(9, 'Hont (Honti-szakadék)', 'Miocén kori lelőhely', 'A börzsönyi vulkanizmus előtt lerakódott üledékes képződmények legismertebb feltárása a Honti-szakadék. A szakadék északi bejáratánál lévő laza homokos agyagból magános korallok, valamint tengeri kagylók (Flabellipecten) és csigák (Hinia, Conus, Ringicula, Turris) gyűjthetők. A szakadék oldalfalában mintegy 15 méter vastag sötétszürke, kemény meszes agyag tanulmányozható. Ebben esetenként magános korallokra (Flabellum) és csigákra (Hinia) bukkanhatunk, de a leggyakoribbak a kissé összenyomott kagyló fosszíliák (Cardiolucina, Saxolucina, Macoma). Az iszapba ásódó kagylók és a fénykerülő korallok viszonylag mélyebb, növényzettől mentes, lágy tengeraljzatra utalnak. A szomszédos Szent János-árokból is gazdag faunát írtak le 27 kagyló- és 22 csigafajjal (pl. Chlamys, Lima, Ostrea), de emellett kisméretű pörgekarúakat, mohaállatokat és kacslábú rák (Balanus) töredékeket is említettek. A közeli Bába-hegy oldalában egy úgynevezett Pernás-pad bukkan elő, melyben a névadó kagylón kívül (melynek a ma érvényes neve Isognomon) Ostrea, Venus, Turritella, Balanus fosszíliák is előfordulnak.', '[\"6807a19c4e40f_Flabellum_sp.jpg\",\"6807a1add3c5f_Chama_gryphoides.jpg\",\"6807a1b9091f8_Chlamys_macrotis.jpg\",\"6807a1c4b44d7_Cubitostrea_digitalina.jpg\",\"6807a1cfd6f4f_Ancilla_glandiformis.jpg\",\"6807a1da2322b_Conus_dujardini.jpg\"]'),
(10, 'Budapest (Rákosi vasúti bevágás)', 'Miocén kori lelőhely', 'A középső miocén lajtamészkő (amely az ausztriai Lajta-hegységről kapta a nevét) jelentős elterjedést mutat Magyarországon. Szép felszíni feltárások találhatók Fertőrákostól a Mecsekig vagy Biatorbágytól a Börzsönyig és a Cserhátig. Az egyik legfontosabb, már régóta ismert feltárása a Rákosi vasúti bevágás a Keleti pályaudvartól a Hatvan felé tartó vonalon. A lelőhely megközelítése és a gyűjtés fokozott óvatosságot igényel, mivel nagyon forgalmas pályaszakaszról van szó. Tekintve, hogy üzemi terület, a meglátogatásához engedély szükséges.  A világos színű, fehér vagy szürke mészkőben gyakoriak a zátonyalkotó és zátonylakó szervezetek: a mészvázú egysejtűek (Borelis), a vörösalgák (Lithothamnium), a telepes korallok (Favia, Porites, Tylophora), a mohaállatok (Crisia) vagy a puhatestűek (csigák, kagylók, ásólábúak). A rétegtani szempontból nagyon jelentős Pecten-féle kagylók közül a legfontosabbak a Flabellipecten leythajanus és az Oppenheimopecten aduncus maradványai. A kalcitvázú szervezetek (tengeri sünök, egyes kagylók) héjastól őrződtek meg, az aragonitvázú szervezeteknek (korallok, csigák, egyes kagylók) viszont csak a lenyomataik maradtak meg ebben a kőzetben.', '[\"68089bb4ab578_Daira_speciosa.jpg\",\"68089bbbedde5_Callianassa_munieri.jpg\"]'),
(11, 'Tinnye (Sőregi-kőfejtő)', 'Miocén kori lelőhely', 'A középső miocén badeni korszakában hullámzott a mai Magyarország területén utoljára normál sósvizű (35 ezrelékes sótartalmú) tenger. Az ezt követő szarmata korban ugyanis a kiemelkedő Alpok és Dinaridák leválasztották a Középső-Paratethys területét a Földközi-tengerről, így megszűnt a sósvíz utánpótlása. A csökkent sótartalmú szarmata tengerből eltűntek a normál sótartalmat igénylő csoportok (pl. korallok, tengeri sünök), a tág sótartalom-tűrésű csoportok képviselői viszont helyenként nagyon nagy egyedszámban éltek.  A sekélytengeri szarmata mészköveket számos kisebb-nagyobb kőfejtőben bányászták Magyarországon. A legjobb megtartású ősmaradványok a Tinnye község határában fekvő Sőregi-kőfejtőben gyűjthetők. Sajnos sok más hazai kőfejtőhöz hasonlóan itt is nehezítik a megközelítést és a gyűjtést az illegálisan lerakott szemétkupacok. A Perbál felé vezető út mentén, a falu utáni első kanyartól 500 méterre nyugatra található dombon már a 19. században gyűjtötték a szarmata puhatestűeket. A többi szarmata mészkővel szemben itt a puhatestűek héja is megőrződött, ám a hófehér kagylóteknők anyaga gyakran krétaszerűen puha. A leggyakoribbak az ehető szívkagyló rokonságába tartozó Cerastoderma fajok. Szintén jellemzőek a Sarmatimactra és az Ervilia kagylók. A gyakori és változatos csigák viszont jobb megtartásúak és így könnyebben gyűjthetők. A legjellegzetesebbek a Pirenella nemzetség képviselői, amelyek jól elviselték a normálistól eltérő sótartalmat is. Sokszor egyetlen fajuk számtalan példánya kerül elő egy-egy rétegből.', '[\"68089e3e4bafe_Cerastoderma_vindobonense.jpg\",\"68089e4708916_Venerupis_gregarius.jpg\",\"68089e4fc8b15_Cerastoderma_latisulcum.jpg\",\"68089e5ce8304_Pirenella_picta.jpg\",\"68089e6512636_Mactra_eichwaldi.jpg\"]'),
(12, 'Úny-Máriahalom (homokbánya)', 'Oligocén kori lelőhely', 'Az Úny és Máriahalom közötti út mentén található homokbánya az 1970-es évek elejétől kedvelt helye az ősmaradványgyűjtőknek. Mivel a terület magántulajdon, a belépéshez engedély szükséges. Elsősorban a késő oligocén korú puhatestű-maradványok, azok között is főleg a csigák gyakoriak: százszámra lehet itt gyűjteni a Tympanotonos margaritaceus 6-7 centiméter magas, gyöngysorszerű csomókkal díszített, kúp alakú házait. Emellett alaposabb gyűjtés esetén még számos egyéb csiga- és kagylófaj is előkerülhet. Viszonylag gyakori a homokban a Teredo nevű fafúró kagylók járatainak kitöltése. Ezek a tengerben lebegő vagy úszó fatörzsekbe fúrták be magukat, majd az aljzatra lesüllyedve a járataik kitöltődtek homokkal. A kagylók és a csigák mellett ritkábban különböző gerinces ősmaradványok is előfordulnak a homokban. Ezek között vannak cápafogak, rájafogak, csontoshalak, teknősök, gyíkok, krokodilok, valamint vízi és szárazföldi emlősök és madarak is. A fosszíliák ilyen tömeges előfordulása utólagos áthalmozódásra vezethető vissza. Az ősmaradványok egy árapálycsatorna közelében halmozódtak fel, ezért keverednek a homokban a tengeri és a szárazföldi állatok maradványai.', '[\"6808a0cc30960_Odontaspis_acutissima.jpg\",\"6808a0d5bdd7c_Trionychoidea_sp.jpg\",\"6808a0e397f6e_tengeri_tehen.jpg\",\"6808a0eb39f3d_Potamotherium_sp.jpg\",\"6808a0f42d587_Carcharias_cuspidata.jpg\",\"6808a0fd30d4d_Carcharoides_catticus.jpg\"]'),
(13, 'Gánt (Bagoly-hegy)', 'Eocén kori lelőhely', 'A Gánt melletti bauxittelepet az 1920-as években fedezték fel, és akkor kezdődött a felette települő eocén rétegsorok intenzív kutatása is. Mára a felhagyott bauxitkülfejtést geológiai bemutatóhellyé alakították át, ahol kiváló megtartású ősmaradványokat találhatunk. A geológiai irodalomban gyakran \"fornai rétegek\" néven említik az ősmaradványokban gazdag rétegsort. A leglátványosabbak a puhatestű (csiga és kagyló)-kövületek, amelyeket Szőts Endre geológus dolgozott fel. Monográfiájában 163 csiga-, 37 kagyló- és 1 lábasfejűfaj leírását közölte.  A gánti rétegsor alján kibukkanó, édesvízben lerakódott rétegekben a Melania nemzetséghez tartozó egyetlen csigafaj tömeges előfordulása figyelhető meg. A felette települő sekélytengeri márgás, homokos rétegekben viszont már nagyon változatosak a csigák. A leggyakoribb a Tympanotonos, amelynél az egyes fajok díszítettségében látható eltéréseket az egykori élőhelyek különböző sótartalmával magyarázzák. Szintén gyakori a Cerithium. Az itt előforduló faj példányai akár a 10 centiméteres magasságot is elérhetik. Jellegzetes csiganemzetségek még az Editharus és az Ampullina. A kagylók között Arca-, Brachyodontes-, Phacoides- és Lucina-fajok találhatók. A néhol szinte tömegesen előforduló Cerithium subcorvinum csiga házain esetenként egy-egy ránőtt korall is megfigyelhető. Az egykori lagúna területén a korall-lárvák a szilárd aljzat hiányában telepedtek meg a nagyobb csigák vázain. Szintén gyakran megfigyelhetők a marószivacsok életműködésének a nyomai. A Cliona nevű marószivacsok elágazó járataikkal gyakran csaknem teljesen elpusztították a puhatestűek héját.', '[\"6808a30d0fa50_Melania_distincta.jpg\",\"6808a31438c9b_Editharus.jpg\",\"6808a31c5a112_Tympanotonos.jpg\",\"6808a32337218_Cerithium_subcorvinum.jpg\"]'),
(14, 'Lábatlan (Bersek-hegy)', 'Kréta kori lelőhely', 'A Gerecse hegység leglátványosabb kréta időszaki rétegsora a Bersek-hegy hatalmas bányájában bukkan elő, ahol a berseki márgát fejtik a közeli cementgyár számára. A bányába való belépéshez engedély szükséges. A kréta időszak nyíltabb és mélyebb tengerének az emlékét őrzi a vastag, ammoniteszekben gazdag rétegsor. Ennek alsó, szürke rétegei még szegények ősmaradványokban, a felső, vöröses-tarka rétegek azonban gazdag puhatestű-faunát tartalmaznak.  A lelőhelyről begyűjtött több mint 10 ezer ammoniteszpéldány nagyon változatos együttest szolgáltatott. A hatalmas Moutoniceras-ok lazán felcsavart belső kanyarulatok után egy egyenes vázrészt, majd kampószerűen visszahajló lakókamrát növesztettek. A Toxancyloceras szintén kitekeredett, ún. heteromorf ammonitesz volt. Különböző erősségű bordák díszítik a Subpulchellia- és a Jeanthieuloyites-példányokat. Szintén változatos a lelőhelyről előkerült belemniteszfauna. Alig több mint 200 példányuk alapján a specialisták 36 különböző fajukat különítették el (például Hibolithes, Vaunagites, Duvalia, Pseudobelus). A kagylókat többek között a kisméretű Nuculana és a rendkívül ritka Buchia képviselik. Ezek mellett helyenként előfordulnak tengerisün- és korallmaradványok is. A berseki márgát régebben aptychuszos márga néven is emlegették. Az aptychusz az ammoniteszek szájfedője és/vagy rágószerve volt, és mivel kalcitanyagú, ott is megőrződött, ahol maguk az aragonitanyagú ammoniteszházak már kioldódtak. ', '[\"6808a4c3ecf7f_Toxancyloceras_vandenheckii.jpg\",\"6808a4cb8ab19_Moutoniceras_moutonianum.jpg\",\"6808a4d1aba74_Subpulchellia_changarnieri.jpg\"]'),
(15, 'Tata (Kálvária-domb)', 'Mezozoikumi rétegsor', 'A Tata belterületén található felhagyott kőbányában az Eötvös Loránd Tudományegyetem által működtetett szabadtéri geológiai múzeumot építettek ki. Emiatt ezen a lelőhelyen nem szabad gyűjteni. Mégis érdemes ellátogatni ide, mert a változatos rétegsorban triász, jura és kréta időszaki kőzeteket is láthatunk, amelyek helyenként látványos ősmaradványokat tartalmaznak.   Legalul a felső triász korból származó dachsteini mészkő vastag padjai figyelhetők meg. A világos színű, többnyire világosszürke mészkő helyenként kis szürke pettyeket tartalmaz, amelyek a tömegesen előforduló Triasina hantkeni foraminiferák (mészvázú egysejtűek) vázait jelzik. Jóval nagyobbak és látványosabbak a Megalodon-féle kagylók metszetei. Érdekesség, hogy a kioldódott, vastag kagylóteknők helyét vörös színű, finomszemcsés alsó jura kori üledék tölti ki. Jellegzetes Megalodon-faj a Kálvária-dombon a Rhaetomegalodon incisus. A többnyire vörös színű jura kőzetek elsősorban ammoniteszeket és brachiopodákat tartalmaznak. A felső jura rétegek különösen gazdag ammoniteszfaunát szolgáltattak, mintegy 100 különböző fajjal. A rétegsor felső részén kibukkanó kréta időszaki kőzetek közül a tatai mészkőként emlegetett krinoideás mészkő nagyon gazdag ammoniteszekben, brachiopodákban és csigákban. A héj nélküli ammoniteszek foszfátos vagy glaukonitos kitöltésűek, és valószínűleg többszörös áthalmozódás után kerültek a végső betemetődési helyükre. A legjellemzőbb formák közé tartozik a Tetragonites, a Jauberticeras, a Diadochoceras, a Parahoplites vagy a Valdedorsella. Régészeti érdekességet jelentenek az őskori tűzkőbányászat nyomai, amelyek egy fedett bemutatóhelyen tekinthetők meg.', '[\"6808a60e62464_Megalodus.jpg\",\"6808a61521574_Tata.jpg\",\"6808a61c30942_Ammonitesz.jpg\"]'),
(16, 'Felsőörs (Forrás-hegy)', 'Triász kori lelőhely', 'A Felsőörs község északnyugati szélén található Forrás-hegyen nemcsak hazai szempontból jelentős, hanem nemzetközileg is jól ismert és elismert középső triász rétegsor bukkan a felszínre. A Balaton-felvidéki Nemzeti Park által kiépített és számos tájékoztató táblával ellátott lelőhely azonban a laikus látogatók számára is sok érdekességgel szolgálhat.  A kovás mészkő- és márgarétegek számos ammoniteszt tartalmaznak, köztük a Reitzites reitzi fajt, amelyről egy rétegtani szintet, az ún. Reitzi Zónát is elneveztek. A legidősebb (legalsó) rétegekben a kőzetalkotó mennyiségű tengerililiomok mellett főleg pörgekarúak (Brachiopoda) fordulnak elő, melyek között 15 fajt különítettek el a közelmúltban. Jellegzetes és könnyen felismerhető a háromszögletes körvonalú és négy erős bordával díszített Tetractinella trigonella. Szintén gyakori a Caucasorhynchia altaplecta és a Trigonirhynchella attilina. A felsőbb rétegekben az ammoniteszek az uralkodó ősmaradványok és különösen a Ptychites-félék nagyon gyakoriak.  A lelőhely tudományos jelentőségét az adja, hogy a felsőörsi rétegsor a gazdag ősmaradványtartalom és a részletes tudományos feldolgozottság miatt komoly jelölt volt a középső triász ladin emeletének az alsó határát kijelölő ún. sztratotípus szelvény címének elnyerésére. Végül a 2004-es szavazás során nagyon szoros versenyben az olaszországi bagolínói szelvény kapta meg a rétegtani \"aranyszöget\". A tudományos jelentősége miatt a felsőörsi lelőhely védett, ezért itt legfeljebb a kimállott példányokat szabad elvinni.', '[\"6808a8ba4d7c8_Hungarites.jpg\",\"6808a8c2b9665_Tetractinella_trigonella.jpg\",\"6808a8cac0309_Ptychites.jpg\"]'),
(17, 'Úrkút (Csárda-hegy)', 'Jura kori lelőhely', 'Az ausztriai Hierlatzbergről elnevezett kőzet az ősmaradványokban leggazdagabb jura időszaki kőzetek közé tartozik. A képződmény nagy részét ugyanis pörgekarúak, valamint ammoniteszek, néha csigák és kagylók vázai alkotják, amelyeket többnyire fehér kalcit cementál össze. Ez a kőzet nagyon gyakran a tenger alatti függőleges hasadékokat töltötte ki, és csapdába ejtette a szomszédos területek élőlényeinek a maradványait. A Hierlatzi Mészkő egy másik jellemző felhalmozódási területe a tengeralatti hátságok lábainál volt.  Az Úrkút határában található Csárda-hegy a Hierlatzi Mészkő legismertebb hazai feltárása. Az alsó jura mészkőben kialakult látványos sziklaformák (\"őskarszt\") akkor váltak láthatóvá, amikor a karsztos mélyedésekben található oxidos mangánércet 1926 és 1933 között kézi erővel kibányászták. A szép karsztformák a jura időszak után alakultak ki, miután az alsó jura mészkő szárazra került. A tengeri eredetű mangánérc a szárazföldön áthalmozódva került a karsztos mélyedésekbe.  A pörgekarúak (Brachiopoda) nem csak gyakoriak ebben a kőzetben, de viszonylag könnyen ki is szabadíthatók (lásd a képen látható nagyszámú kipreparált példányt). Az úrkúti Csárda-hegy védett feltárás, ezért itt kalapálni nem szabad', '[\"6808aafb84f3f_Linguithyris_aspasia.jpg\",\"6808ab08c7e0f_Prionorhynchia_forticostata.jpg\"]'),
(18, 'Olaszfalu (Eperkés-hegy)', 'Mezozoikumi rétegsor', 'Zirctől délre, a 82-es út keleti oldalán helyezkedik el az Eperkés-hegy, melynek területén három mesterségesen kialakított árokban tanulmányozhatók a különböző, egymástól jelentős üledékhézaggal elválasztott triász, jura és kréta időszaki kőzetek. Az ősmaradványokban leggazdagabb kőzet a hosszú árokban kibukkanó ún. \"ammonitico rosso\", vagyis vörös, gumós ammoniteszes mészkő.  A nevéből is kiderül, hogy számos ammonitesz gyűjthető belőle (Nebrodites, Pseudowaagenia, Aspidoceras, Sowerbyceras, Taramelliceras), de emellett számos egyéb ősmaradványt is tartalmaz. Gyakoriak az ammoniteszek szájfedői/szájszervei, az ún. aptychuszok, valamint a hosszúkás, szivar alakú belemniteszek. Ebben a késő jura korú kőzetben található a Bakony hegység legszebb és leggazdagabb tengeri liliom faunája. A laza kőzetből kipergett nyéltagok és kelyhek gyakoriak és könnyen gyűjthetők. A nagyon gazdag anyagból eddig kilenc fajt azonosítottak a paleontológusok (például Proholopus, Gammarocrinites, Psalidocrinus, Hemicrinus). Nem ritkák a magános korallok sem, amelyeknek a tudományos feldolgozása eddig nem történt meg.', '[\"6808ad87c5d12_Nebrodites.jpg\",\"6808ad982c29b_Hemicrinus.jpg\",\"6808ada10dbc9_Sowerbyceras.jpg\"]'),
(19, 'Várpalota (Szabó-bánya)', 'Miocén kori lelőhely', 'Várpalota belterületén, a város délnyugati részén fekvő Rákóczi-lakótelep közelében található az egyik legismertebb hazai középső miocén ősmaradvány lelőhely. A sekélytengeri homok rendkívül gazdag puhatestű (csiga, kagyló, ásólábú és cserepeshéjú) faunát tartalmaz. Az egykori bánya ma természetvédelmi terület, gyűjteni nem szabad, de a homokból kimállott számos pompás fosszília látványa bőségesen kárpótolja az ide látogatókat. A zárt területre a belépési engedélyt a veszprémi Környezetvédelmi és Vízügyi Igazgatóságtól kell kérni.   Az itt előkerült fauna nemcsak nagyon változatos (több mint 400 puhatestű faj), de kiváló megtartású is. Némelyik csigán és kagylón még az eredeti, vörösesbarna színezettség is látható. A csigák tekintetében ez a leggazdagabb magyarországi badeni (középső miocén) lelőhely, aminek az anyagát Strausz László dolgozta fel egy monográfiában. A csigák között az egyik leglátványosabb a hatalmas, 20 centiméter hosszúságot is elérő Galeodes, amely a ma élő trópusi rokonaihoz hasonlóan jókora tüskéket viselt. A ragadozó csigákat a Murex-félék (például a Hexaplex), valamint a kúpcsigáknak nevezett Conus fajok képviselték. Jellegzetes alakja alapján könnyen azonosítható csiga a Tudicla és a Ficus. Kevésbé gazdag a lelőhely kagylófaunája, de rövid idő alatt nagyon szép Anadara, Glycymeris, Linga és Anomia példányokat találhatunk. Szintén gyakoriak az ásólábúak közé tartozó \"agyarcsigák\" (Dentalium) ívelt vázai, amelyek többnyire kis méretűek. Számos más állatcsoport képviselői is megtalálhatók még a homokban (például mészvázú egysejtűek, cserepeshéjúak, mohaállatok, tízlábú és kacslábú rákok, halfogak), de ezek kis méretük miatt leginkább csak mikroszkópban figyelhetők meg a szitán átmosott ún. iszapolási maradékban.', '[\"6808af2c36379_Melongena_cornuta.jpg\",\"6808af34bdb89_Ficus_condita.jpg\",\"6808af3d8462e_Tudicla_rusticula.jpg\"]'),
(20, 'Tihany', 'Miocén kori lelőhely', 'Miután a környező hegyvonulatok, például a Dinaridák kiemelkedése elzárta a Kárpát-medence területét a Földközi-tengertől, először csökkent sótartalmú tenger borította a vidéket, majd egy hatalmas tó, a sokszor helytelenül tengerként emlegetett Pannon-tó hullámzott Magyarország mai területe fölött. A hosszú életű tóban a flóra és a fauna a környező területektől elszigetelten fejlődött. Ennek eredményeként olyan endemikus (bennszülött) fajok, nemzetségek, sőt családok alakultak ki, amelyek sehonnan máshonnan nem ismertek. A tó üledékei egyes alföldi mélyfúrásokban akár a 6000 méter vastagságot is elérik, de a felszínen is számos pannóniai lelőhely található.   Ezek közül az egyik legrégebben ismert a tihanyi Fehérpart, amely a kikötő és a révállomás közötti út mentén emelkedő lejtő fölött található. A nagyon meredek, a tetejénél csaknem függőleges falban a felső pannóniai rétegek tanulmányozhatók. Az ősmaradványok vizsgálata alapján a paleontológusok megállapították, hogy az egyes rétegek lagúnában, a part mentén, folyóvízben vagy éppen sekély tóban rakódtak le. A gyakori maradványok közé tartozik a vékonyhéjú Congeria balatonica kagyló. Szintén jellemzőek a Lymnocardium és a Dreissenomya nemzetségbe tartozó kagylók, míg a csigákat a Melanopsis és a Viviparus képviseli. A legfelső rétegekre jellemzők a nagyméretű Anodonta kagylók. A pannóniai puhatestűek klasszikus lelőhelyén néhány kisemlős (rágcsáló) maradványa is előkerült.  Tihany leghíresebb ősmaradványa a Congeria ungulacaprae vagyis a \"balatoni kecskeköröm\". Ezek maradványai azonban nem a Fehérparton, hanem a Barátlakásokhoz vezető út mentén gyűjthetők. Ez az egyik legnevezetesebb Kárpát-medencei ősmaradvány. A kecskeköröm nem más, mint a Congeria ungulacaprae kagyló megvastagodott és erősen lekoptatott búbja.', '[\"6808b1ba7617d_Congeria_ungulacaprae.jpg\",\"6808b1c08eb9d_Lymnocardium.jpg\"]'),
(21, 'Bükkösd (kőfejtő)', 'Triász kori lelőhely', 'A falu keleti részéből juthatunk fel a mészkőbányába, ahol a középső triász mészkövet fejtik, így a művelés alatt álló területre csak előzetes engedélykérés után szabad bemenni. A Mecsekben több helyen is előforduló úgynevezett kagylósmészkő az Északnyugat-Európából ismert kőzetekkel mutat közeli rokonságot. A hullámos felületű, vékony mészkőrétegek sok ősmaradványt tartalmaznak, különösen a kőbányában kibukkanó rétegsor felső részén.  A nyílttengerben lerakódott rétegek jellemző kagylófaja a Hoernesia socialis, amely a nevéhez méltóan gyakran \"társas életet él\", azaz sok példányuk kerül elő egymás mellett a réteglapokon. Gyakoriak a mészkőben a különböző Plagiostoma fajok, valamint a többi puhatestű héjára ránövő Placunopsisok. A Plagiostoma lineatum példányok akár a 10 centiméter hosszúságot is elérhetik. A pörgekarúak (Brachiopoda) között a nagyon hosszú élettartamú, máig előforduló, és ezért \"élő kövületnek\" is nevezett Lingula barnás színű, foszfátos anyagú teknői is előfordulnak a terület triász dolomit rétegeiben (az egyik kőzettípust emiatt régebben lingulás dolomitként is emlegették). A középső triász kagylósmészkő leggyakoribb brachiopodája azonban kétségkívül a Coenothyris vulgaris, melynek teknői sokszor szinte kőzetalkotó mennyiségben halmozódtak fel egy-egy rétegben. Sima, díszítetlen teknőinek érintkezési vonala a mellső részen a háti teknő irányába domborodó redőt alkot. Gyakran találkozhatunk a Tetractinella trigonella és a Punctospirella fragilis maradványaival is. A tengeri liliomok (Crinoidea) szintén változatosak voltak ezen a területen (Eckicrinus, Holocrinus, Dadocrinus). A rétegtani szempontból nagyon fontos ammoniteszek (Ceratites, Paraceratites, Acrochordiceras) mellett szintén a fejlábúakat képviselik a Nautiloideák (Germanonautilus).', '[\"6808b3bd74c49_Hoernesia_socialis.jpg\",\"6808b3ce5ec02_Coenothyris_vulgaris.jpg\",\"6808b3d559438_Punctospirella_fragilis.jpg\"]'),
(22, 'Pécs-Vasas (kőszénkülfejtés)', 'Jura kori lelőhely', 'A mecseki jura időszaki kőszenes rétegsor egyik legjelentősebb feltárása a Petőfi-akna szomszédságában, a Köves-tetőtől délnyugatra található. A ma már nem működő külfejtés mintegy 250-300 méter vastagságban tárta fel az alsó jura rétegeket. Az egykori delta és sekélyvizű lagúna környezetet képviselő rétegek ősállatmaradványokban viszonylag szegények, de helyenként egyes rétegekben nagy mennyiségben fordulnak elő puhatestű (elsősorban kagyló)-maradványok.  A csökkent sósvízi, aljzathoz cementálódó Liostrea, valamint a sekély mélységbe beásódó Cardinia mellett az édesvízben élt Unio kagylók jellemzőek. A rétegsor magasabb részén nagyon ritkán előkerülő ammoniteszek (Arietites, Coroniceras) a jura időszak legelejére jellemzőek. Egy-egy szintben háromujjú dinoszauruszok lábnyomai is előfordulnak, amelyek Komló városának és a kőszénnek állítanak emléket a nevükben (Komlosaurus carbonis). A 12-18 centiméter hosszú, egymástól 60-70 centiméterre lévő nyomokat két lábon járó dinoszauruszok hagyták hátra a puha iszapban. A másik különleges ősmaradványcsoportot a növénylenyomatok képviselik. A kőszéntelepek közötti meddőrétegekben levelek, törzsek, ágak és szaporítószervek is előfordulhatnak. A zsurlók (Neocalamites, Equisetites) a tengerparti területeken éltek. A nagyméretű páfránylevelek töredékei fatermetű, erdőalkotó páfrányokra utalnak (Thaumatopteris, Dictyophyllum, Clathropteris). Ez utóbbi levele elérhette az 1,5 méteres hosszúságot. A nyitvatermők között a magvaspáfrányok voltak a legjelentősebbek (Sagenopteris, Komlopteris). A cikászok közül gyakori a Nilssonia és a Bjuvia, amelyek nedves és párás környezetet kedveltek. A bennettiteszeket a Pterophyllum és az Anomozamites, míg a páfrányfenyőket a Ginkgoites és a Baiera képviselték a mecseki kora jura flórában.', '[\"6808b5aa85b24_Komlosaurus_carbonis.jpg\",\"6808b5b7411d2_Todites sp.webp\",\"6808b5be28ea8_Phlebopteris_sp.jpg\"]'),
(23, 'Mecseknádasd (Réka-völgy)', 'Jura kori lelőhely', 'Az alsó jura (liász) rétegsor a Mecsekben levelesen széteső, szerves anyagban nagyon gazdag fekete palával záródik. Az úgynevezett toarci anoxikus esemény idején rakódott le ez a kőzet, amelynek a nyomai számos lelőhelyen nyomon követhetők, elsősorban Északnyugat-Európa területén. Az esemény során oxigénben szegény (anoxikus) környezetek alakultak ki a tengerben, így ott az aljzatlakó élőlények nem tudtak megélni. Emiatt alakult ki a vékony rétegzettség, hiszen általában ezek a szervezetek keverik össze a tengerfenékre lerakódó üledékeket. A magas szervesanyag-tartalom szintén ennek köszönhető, mivel a felette lévő víztömegből az aljzatra hulló elpusztult állatokat nem ették meg a dögevő és ragadozó szervezetek.  A könyvszerűen lapozható fekete pala rétegfelületein főleg ammoniteszeket találhatunk, amelyek alapján pontosan meghatározható ennek a speciális kőzetnek a kora (Hildaites, Dactylioceras, Protogrammoceras). A kagylókat a viszonylag gyakori Pseudomytiloides példányok képviselik, amelyek a vékony, de erős bisszusz szálaikkal valószínűleg uszadékfákra rögzültek, és úgy sodródtak ki a nyílt tengerre. A legkülönlegesebb ősmaradványok azonban egyértelműen a halmaradványok. A fogak vagy pikkelyek gyakoriak, de előfordulnak épségben megőrződött egész hallenyomatok is. Ezeknek a tudományos feldolgozása még várat magára, eddig mindössze a Leptolepis normandica fajt sikerült azonosítani. ', '[\"6808b88821d0d_Leptolepis_normandica.jpg\",\"6808b89181d16_Pseudomytiloides.jpg\",\"6808b8ebc2964_Protogrammoceras.jpg\",\"6808b8f437702_Hildaites.jpg\",\"6808b9005a15c_Dactylioceras.jpg\"]'),
(24, 'Villány (Templom-hegy)', 'Mezozoikumi rétegsor és Pleisztocéni lelőhely', 'A község vasútállomásától délre fekvő Templom-hegyen több felhagyott egykori kőfejtő található. Az egyik legfontosabb hazai jura időszaki rétegsort, a jura ammoniteszek és a pleisztocén gerincesek világhírű lelőhelyét egy tanösvény mutatja be. A rétegsor alján lévő triász kőzetek még viszonylag kevés ősmaradványt tartalmaznak (néhány növénylenyomatot például), annál gazdagabbak viszont a jura rétegek.  Az alsó jura mészkövekben gyakoriak az ammoniteszek (Tragophylloceras, Villania, Epideroceras), valamint a pörgekarúak (Tetrarhynchia, Gibbirhynchia, Liospiriferina, Lobothyris). Egyes rétegekben a kagylók is gyakoriak lehetnek (Entolium, Chlamys, Plagiostoma). A belemniteszek között a Belemnopsis és a Hibolites fajok jellemzőek. A villányi lelőhely egyik leghíresebb képződménye egy fél méternél is vékonyabb középső jura ammoniteszes pad, amelyből 180 fajt különítettek el a szakemberek (Sowerbyceras, Reineckeia, Collotia). Érdekesség, hogy ebben a rétegben az ősmaradványok többségét algák és baktériumok életműködése révén kialakult, úgynevezett sztromatolitos kéreg borítja. A tengeri gerinctelenek mellett szintén híresek a terület barlangjait és hasadékait kitöltő vörösagyagokból előkerült jégkorszaki gerinces maradványok. Az itteni lelőhelyek ősmaradványai alapján egy külön villányi faunaszakaszt is el lehetett különíteni, a pocokfélék dominanciájával jellemezhető füves pusztai faunával.', '[\"6808bb498d282_Oecotraustes.jpg\",\"6808bb520c7ba_Oxycerites_tilli.jpg\"]'),
(25, 'Danitz-puszta (homokbánya)', 'Miocén kori lelőhely', 'A Quartz Kft. kezelésében lévő homokbánya a 6-os út északi oldalán található, Pécs keleti szélén (a belépéshez engedély szükséges). Az erősen limonitos, sárgásbarna homokban helyenként durvább kavicsos betelepülések is előfordulnak. A kavicsok alakja folyó vízi szállításra utal. A rétegsor alsó részén limonitosodott Congeria balatonica és Lymnocardium schmidti fosszíliák találhatók, amelyek az egykori Pannon-tó puhatestű faunáját képviselik. A homokbánya azonban elsősorban arról ismert, hogy igen gazdag gerinces-ősmaradványokban. A gerincesfosszíliák két különböző forrásból származnak. A kövületek egy része a homok lerakódásával egy időben élt szárazföldi és édesvízi állat maradványa, de ugyanakkor nagyon sok a korábbi miocén rétegekből áthalmozódott tengeri gerinces-ősmaradvány. A teknősfosszíliák között előfordulnak lágyhéjú Trionyx és szárazföldi Testudo maradványok. Találtak itt hódokat, kérődzőket (Dorcatherium), páratlanujjú patásokat (Hippotherium), tapírokat, orrszarvúkat (Aceratherium) és ormányosokat (Deinotherium, Tetralophodon) is. Az idősebb, áthalmozott tengeri fosszíliák között gyakoriak a cápafogak, például a tigriscápákat képviselő Galeocerdo vagy a nagyméretű és fűrészes szélű Carcharocles. Emellett előfordulnak egyéb halfogak, valamint tengeriemlős-maradványok (fókavégtagcsontok, cetcsigolyák, szirénbordák és végtagcsontok).', '[\"6808be5762d28_Carcharocles.jpg\",\"6808be5ee00bf_Lates_sp.jpg\",\"6808be66817ee_Lymnocardium_schmidti.jpg\",\"6808be6d262d8_Cet.jpg\"]');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `length` int(4) NOT NULL,
  `quantity` int(2) NOT NULL,
  `date` date NOT NULL,
  `price` int(5) NOT NULL,
  `place` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `tours`
--

INSERT INTO `tours` (`id`, `category`, `image`, `length`, `quantity`, `date`, `price`, `place`, `region`, `description`) VALUES
(1, 'Sz.L.', '[\"680e47de280ef_Chonetes.jpg\"]', 6, 40, '2025-05-24', 5000, 'Nagyvizsnyó', 'Bükk', 'Indulás 8:30-kor a Keleti pályaudvarról. Túránk során információkat kaphatunk a kőzetek abszolút és relatív koráról, rátehetjük a kezünket egy tektonikai vonalra, amely mentén két különböző korú kőzet találkozik és nem utolsó sorban megnézhetjük a kb. 300 millió évvel ezelőtt élt tengeri élővilág maradványait is. Érkezés 14.30-kor a Keleti-pályaudvarra.'),
(2, 'E.K.', '[\"680e492fde555_Laevicardium_tenuisulcatum.jpg\"]', 6, 40, '2025-05-31', 5000, 'Eger(Wind-féle téglagyár)', 'Bükk', 'Indulás 8:30-kor a Keleti pályaudvarról. Túránk során információkat kaphatunk a kőzetek abszolút és relatív koráról, rátehetjük a kezünket egy tektonikai vonalra, amely mentén két különböző korú kőzet találkozik és nem utolsó sorban megnézhetjük a kb. 25 millió évvel ezelőtt élt tengeri élővilág maradványait is. Érkezés 14.30-kor a Keleti-pályaudvarra.'),
(3, 'Sz.L.', '[\"680e48a45d9c8_Bryozoa.jpg\"]', 6, 40, '2025-06-07', 5000, 'Mátraverebély(Szentkút)', 'Cserhát', 'Indulás 8:30-kor a Keleti pályaudvarról. Túránk során információkat kaphatunk a kőzetek abszolút és relatív koráról, rátehetjük a kezünket egy tektonikai vonalra, amely mentén két különböző korú kőzet találkozik és nem utolsó sorban megnézhetjük a kb. 15 millió évvel ezelőtt élt tengeri élővilág maradványait is. Érkezés 14.30-kor a Keleti-pályaudvarra.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `bio`, `admin`) VALUES
(1, 'admin', '$2y$10$kaEGvhlfp/V1dykwCjhNieFR0W2p18KMjgCoHJCwXLRTQiOg5MGky', 'Moderátor', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `post_cat`
--
ALTER TABLE `post_cat`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `post_cat`
--
ALTER TABLE `post_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT a táblához `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
