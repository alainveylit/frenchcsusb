-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2016 at 02:55 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `french3`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueil`
--

CREATE TABLE IF NOT EXISTS `accueil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_dir` varchar(64) NOT NULL,
  `image_size` int(10) unsigned NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accueil`
--

INSERT INTO `accueil` (`id`, `title`, `description`, `image`, `image_dir`, `image_size`, `creator`, `modified`) VALUES
(1, 'Cours de FranÃ§ais de M. Veylit Ã  CSUSB - Automne 2016', '<h2>Bienvenue au cours de Fran&ccedil;ais 102 et 202 de Cal State San Bernardino</h2>\r\n<h4>Semestre du printemps 2016 - Mardis et Jeudis, &agrave; 9 heures 30</h4>\r\n<p>Si vous ne l''avez pas fait, veuillez vous enregistrer:</p>\r\n<ul>\r\n<li><a href="http://fcsusb/users/enregistrement/fr_102">Cours de Fran&ccedil;ais 102</a></li>\r\n<li><a href="http://fcsusb/users/enregistrement/fr_202">Cours de Fran&ccedil;ais 202</a></li>\r\n</ul>\r\n<p>Bienvenue sur ce site!</p>\r\n<p>&nbsp;</p>', 'BadAtLanguages_6.jpg', '1', 231289, 3, '2016-09-11 15:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `cake_sessions`
--

CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) NOT NULL,
  `data` text,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake_sessions`
--

INSERT INTO `cake_sessions` (`id`, `data`, `expires`) VALUES
('hmjl799sqscak33vfs6ghbofe7', 'Config|a:3:{s:9:"userAgent";s:32:"b60ac98040be822849bab073c01a080a";s:4:"time";i:1474201338;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"d73e493bd507cc29bd455e35814a7ccf6b75d6bd";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:4:{i:0;s:5:"login";i:1;s:7:"display";i:2;s:10:"save_order";i:3;s:14:"enregistrement";}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:100:{s:40:"adc1cfecba1703cf0b1b63faf11a4cae243e30ac";i:1474188160;s:40:"1f35218f64a6e0c61487fe7ff1b082e8c4d90d0c";i:1474188163;s:40:"71fb34df60019aec2d5de81e414b043fef2afac4";i:1474188205;s:40:"272b2caada961a873140f855b7e9e9bf20a97769";i:1474188207;s:40:"c5fac8808a070d5ba144e5f58cbeb7497cb5ba71";i:1474188255;s:40:"5546d95719b796b4b9bde54702b05b4754bfc423";i:1474188575;s:40:"b801159fd425c439ce3ffa079923bba5331cdec8";i:1474188601;s:40:"8a799fb896cdc2eff43e2cb574d31e76fef0587c";i:1474188630;s:40:"884a521f8997c8705c397265bcefd675f49b01d4";i:1474188661;s:40:"eb12cd22445c19283d7f9c109939e7befa17f517";i:1474188714;s:40:"204f0d017744852cc98c4e435139be819f306753";i:1474188749;s:40:"6052b5e1cb0b3c5d8ed441e78a9bf94c0e639345";i:1474188805;s:40:"8f4ffe40349ff60e57c72db297016cc141e5fb76";i:1474188934;s:40:"2ba61a3c16a2dc0b8f13557d0246db01c4af6324";i:1474188966;s:40:"7d6d91fa511400ca04f3558a0110b24763ebe8b2";i:1474189007;s:40:"020a351fa2ce46ff5ff95ca58e81c65db48f746d";i:1474189023;s:40:"c36d26fa2907d9f1f0773a3311e9ddbefc6ef359";i:1474189071;s:40:"16dc74a5aae8baaed03710cb6d41568b1c761e02";i:1474189181;s:40:"ad94b77154c05a3bb6e854566c72f79655c1da5c";i:1474189216;s:40:"5a251e4664efff878287d5092d43de2412a35fcd";i:1474189271;s:40:"614c210563ca12b481c033dcfdadcf162e55fb2b";i:1474189297;s:40:"c570d3e2fd358a51466b6e0c2ec0d25877c0ec04";i:1474189321;s:40:"cad3e4f0b91ed637eb8c634353753a1026a00a56";i:1474189368;s:40:"e6a15e2652ebcf664c30fc42ab3025828b5cf01f";i:1474189387;s:40:"ad1f2cab6b3677ff0ff81634a9d483129e414d75";i:1474189444;s:40:"a358d55fbc812bd3e2a7d5b944de6e03005050c4";i:1474189476;s:40:"54470bbc1d3201b7cc745a62ceaa18acc546efc9";i:1474189518;s:40:"bc56602229da82087a2e659d219261800716cfc6";i:1474189522;s:40:"481efec0bc584eff33648bf637bc79433b039bae";i:1474189581;s:40:"dc92261ae5e8731167d537af6c6116839bf04850";i:1474189792;s:40:"1e557430c040930b642d41f7cd13a3dc11080056";i:1474189921;s:40:"fac0fac1a7b9488ba91229c20169b9e14d33ff2f";i:1474189927;s:40:"d992fba545df7385eea5256cbc98eb09fdacbd35";i:1474189970;s:40:"559125637285ff42a5fe9a49080092685519b32c";i:1474189998;s:40:"2916b7eaf33ede3636f50c0b703e581af04b69c6";i:1474190035;s:40:"d1ac7e91a4d22a88061051b3b35029e3cd81c70e";i:1474190071;s:40:"9607b44446aba08f7f801206e055d2fc93e7465a";i:1474190144;s:40:"ecd90f83a05c588a2d1ec3d5a2ef017bb7218fee";i:1474190204;s:40:"3b1ee180a48f5408abed2283fc7f11970ad03d0c";i:1474190256;s:40:"03da99035940b0e4e10173298fc060903448ea88";i:1474190419;s:40:"38f81d4ac7ff6042c2b4ca000f1e2b2e08879df2";i:1474190481;s:40:"33b366e3fde5a9d4717a042247edc01b928394bf";i:1474190586;s:40:"2c8172d3d7d1e8f8d3ec6641f94d38da5b979a33";i:1474190675;s:40:"cec8e4a2a9630843234f05994df6a6327148fea0";i:1474190726;s:40:"8e435ada7a8da0e6dc7ce83aea39683f2abdcfc2";i:1474190739;s:40:"9c898f3b66846c4efc35f5e8ee6e87c5c0066084";i:1474190761;s:40:"1655e2544e38d0ed80a1d7ad1970ddc90200e9d6";i:1474191208;s:40:"6f634cc0d7334f3f8d3858de2b00ae19d18cdb73";i:1474191254;s:40:"4e123bb784fb3f561dea24f9d7201fa70b288b7c";i:1474191309;s:40:"c15bb8ae1acafa5cf421cecf799c2ce287b08952";i:1474191337;s:40:"bc8df87ce3add278c779996070d6c81e12ca2a83";i:1474191370;s:40:"9970e3466615443f370a0fd45b8feb047f402509";i:1474191373;s:40:"2d87b8b1bf6a241301a67bce538e4bc27144bd5e";i:1474191377;s:40:"b6cb6fca2d55911f11c7d50eec51f2d13ebee85b";i:1474191425;s:40:"f16d1515e664989296884cb4d0d0197fa5c83945";i:1474191469;s:40:"a7fac3c635ef08ada4132e53e05b952dcdc92e6e";i:1474191472;s:40:"2422835a6d402cea2b166a8e44886aedd7e290c9";i:1474191474;s:40:"64b21440162fa79002c930aa766aa2145a11eb20";i:1474191481;s:40:"d1a4762da62fce438426284568fe0f02c0c20beb";i:1474191497;s:40:"73206ec8267e22adcb0d5fd1d8296d4d933a5f48";i:1474191498;s:40:"0744b97f4acd27021a88603853c0eb5afad2f1ac";i:1474191501;s:40:"77bb41e1f8937f4d2bd760fbea16402e50276e5f";i:1474191568;s:40:"8d392bbdf3a0b2defa8a36b8ad9dba40e575829c";i:1474191592;s:40:"0e714c67f34a43103b1e2c681a41d5b1ea162b46";i:1474191772;s:40:"e2b22d7487a3059db27e70faf184478c47789847";i:1474191794;s:40:"326fa39709fae6f7edb43c69284132dcbc247eec";i:1474191833;s:40:"15de9f0c19a8d2a3e91b4e76402fa3855b0d8ec5";i:1474191850;s:40:"c8b830acf9e0857783f8c8bb4963dc4f2f70bc14";i:1474191909;s:40:"eff0fa701c7c51e3c404e30c8238f5d37b530eae";i:1474191934;s:40:"20a30bc6135b68738a1c233796dee4baa7d7684c";i:1474192067;s:40:"bbbe20abb7adc50a245f1f997cc2e4022999e3a5";i:1474192169;s:40:"736bc59ade91e4e2653ff4c78e12a64512c29011";i:1474192421;s:40:"b0b1238fef401adf856eaabc9d2aa234242cef78";i:1474192445;s:40:"30b29be1e294c32893dcdbd38549f0d663f6aad7";i:1474192578;s:40:"c66f3d59445d0047f16e23d73bc33ac5a879cce3";i:1474192617;s:40:"611aa3f5dd763648aafc10221fdab04ac474ce0e";i:1474192663;s:40:"c1fc666c1e9c27cbca0d1ee3fe630f947a2d629f";i:1474192686;s:40:"ec87a3ce837b3010cf8b67d36de69d6e24e0fa6f";i:1474192897;s:40:"a4b11d3d7527f56457fde8afa2cf77559f8129f0";i:1474192916;s:40:"2b316d976c6cdea8fbbf3dcb91e939f5ffcd1276";i:1474192932;s:40:"4b6414babcb476b93de12f254ba6faf2f068be61";i:1474192955;s:40:"53761db856a8e0bc84883605a730101a6320873a";i:1474192972;s:40:"5c4b4efe12e5c994a73f1df39593a37133646ce8";i:1474192980;s:40:"979feccf9dafbfe34bfb1b1d8facb42833fe9906";i:1474192997;s:40:"027a674f951ce1a47d73fcf9f7f6549e8cc2b9df";i:1474193015;s:40:"b0dc2a330cee977c5eeed4b41b7028fb17b9a4a9";i:1474193044;s:40:"8a25fc6ec1876aa82360d06e0c8e304de70b75ea";i:1474193248;s:40:"a6a2360843460fdf9905b9fb1aae95cb5e92beb6";i:1474193445;s:40:"7a9ee3e9fc8dfae870d478c6b8332e1020d7cc43";i:1474193457;s:40:"b5030749ee30178e9e88e66e0585f52db77fc5db";i:1474193472;s:40:"09d5b2533193ecf3b86d0e72b2abce422615228a";i:1474193520;s:40:"4e00205fdfe0c40ae58cc9684492f12a4f5946d1";i:1474193656;s:40:"33a15613f7759b15c7a5e594c2ffaaa5864e2e10";i:1474193730;s:40:"7c59ad4c1f6465a83299800deea4002712963bbb";i:1474193743;s:40:"7c8493a0c2e28896054bed4910de52920912641a";i:1474193758;s:40:"d38141eaa293946e07cbf1f7ea073b0fdb63ed42";i:1474193800;s:40:"32e9ebf2cefc21e4c5da10715c13d37b1e7325bc";i:1474193821;s:40:"4142e09cacf98dcb4ddd3279fc7e8f3979eb8e90";i:1474193842;s:40:"2908e729821f71195a8251cc85460228bc68c9a5";i:1474193909;s:40:"d73e493bd507cc29bd455e35814a7ccf6b75d6bd";i:1474194138;}}Auth|a:2:{s:4:"User";a:20:{s:2:"id";s:1:"3";s:8:"username";s:11:"AlainVeylit";s:4:"name";s:12:"Alain Veylit";s:4:"role";s:5:"Admin";s:8:"licenses";s:1:"0";s:10:"last_login";s:19:"2016-09-17 21:54:47";s:7:"created";s:19:"2016-01-06 16:56:19";s:6:"active";b:1;s:10:"profile_id";s:3:"571";s:8:"cours_id";s:1:"0";s:5:"cours";s:0:"";s:5:"email";s:20:"alain@signtracks.com";s:11:"email_token";s:0:"";s:19:"email_token_expires";s:19:"0000-00-00 00:00:00";s:14:"email_verified";b:0;s:7:"Profile";a:3:{s:2:"id";s:3:"571";s:4:"name";s:12:"Alain Veylit";s:6:"avatar";s:15:"versailles.jpeg";}s:10:"Professeur";a:5:{s:2:"id";s:1:"1";s:3:"nom";s:6:"Veylit";s:6:"prenom";s:5:"Alain";s:5:"titre";s:2:"Dr";s:8:"courriel";s:22:"Alain.Veylit@csusb.edu";}s:12:"access_level";N;s:9:"professor";b:1;s:13:"professeur_id";s:1:"1";}s:4:"user";a:1:{s:8:"cours_id";s:1:"1";}}Message|a:0:{}', 1474201338),
('3b6n4me0p30m4fifen655balv2', 'Config|a:3:{s:9:"userAgent";s:32:"b60ac98040be822849bab073c01a080a";s:4:"time";i:1474231498;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"1bc4c9a7001e1946aeb978eacab7d84269081965";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:4:{i:0;s:5:"login";i:1;s:7:"display";i:2;s:10:"save_order";i:3;s:14:"enregistrement";}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:1:{s:40:"1bc4c9a7001e1946aeb978eacab7d84269081965";i:1474224298;}}', 1474231498),
('nu7vn32a4rf9njb7hpslp6ilr1', 'Config|a:3:{s:9:"userAgent";s:32:"b60ac98040be822849bab073c01a080a";s:4:"time";i:1474250073;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"c76b0a3235c3845c0e58beb833c1bc96d58fa025";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:4:{i:0;s:5:"login";i:1;s:7:"display";i:2;s:10:"save_order";i:3;s:14:"enregistrement";}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:58:{s:40:"e79d1bec372b3f81934a8ce54cd069610073d7f6";i:1474236101;s:40:"abde8d4b55b9b69352214ca2e7f647095a31396f";i:1474236112;s:40:"725ff3ea7a5ea2361446f148934c2d684b3bf5ec";i:1474236120;s:40:"400719c868807291e0c3629865dcc64c5f5e5cc1";i:1474236667;s:40:"44aab6375ec921f22e5327021c6a53c9cd7d2827";i:1474236667;s:40:"5dd9a4cf6c4fdcb9ba2655c67156f882ceed5a7b";i:1474236690;s:40:"42a172efce43dc93c62d4698364abcc9ceabc4aa";i:1474236690;s:40:"d2fe3b4cdfb6c25ae9c61e53251b1ce8e81efd60";i:1474238880;s:40:"37ada2fff84e5fa37230306896894583a81b6044";i:1474238884;s:40:"255b85df0e5b841cdc7744a3eac9969430d651e4";i:1474238885;s:40:"57e208d5f30474bc8428b7120850ccfd5baadd24";i:1474238889;s:40:"f3444b08e0a67a281d3a82187283059f255caaeb";i:1474238893;s:40:"f1b4e6f56ae60ba8dc5a52e3a785210030fc3856";i:1474238895;s:40:"6b8ebad5f4f1597b25938377853494a816ca5025";i:1474238899;s:40:"e97963f05b9d84425fa4fd9ffeac27268d8d3831";i:1474238903;s:40:"01c45250c89a6ebe3c6d80da21ac8bca71023479";i:1474238915;s:40:"8139c6a9c00b50ba75bc54be15addf5126a295a2";i:1474238928;s:40:"e48460ab014947b6542f334fa04b462dc941a220";i:1474239024;s:40:"f6cbee88d644c1d9fdaf1715cc085f7f0c636591";i:1474239036;s:40:"8096392ce05933441004ff1d310237a9769d561f";i:1474239112;s:40:"7ad9b91a71f05c5ff5c83b7676b35bd4cd728385";i:1474239133;s:40:"8c04ba8431436fff48e5eefc1a0a6cdbd0ff3b0a";i:1474239138;s:40:"0a51edb937badd1ef1afaec3b71bfdab703f94ed";i:1474239183;s:40:"576016c19343255c323fabbaf26fb7cdd70bc289";i:1474239199;s:40:"ca4c7bc871c7ea0eee1c05608bb1bf030ae6d4c3";i:1474239561;s:40:"f8df705fef20df8e2f7086bce3e8b08a28ae7975";i:1474239563;s:40:"61a4f6129375ca6dbd0a8bec80a3ce7fc9ee3dd2";i:1474239565;s:40:"48b043ba7a3de0d8e3468904f6698e8113ab586d";i:1474242076;s:40:"7074676d6d9ff65b8a778b6f0dc8e3e68798bf0b";i:1474242117;s:40:"553d31c050f1ee492de77516146e087500510da2";i:1474242125;s:40:"de55536adb2b56b8964f35d38152a10a714bda0f";i:1474242130;s:40:"a42d4574b043934681618a8681b2bbe33fea5ae8";i:1474242209;s:40:"34b0155c8b6bfc0ff0d7843ff2a7663e2d15b6e5";i:1474242226;s:40:"ac969e5c43c13f7fbff5a73e3bfd03ae028e13aa";i:1474242227;s:40:"3355d4a285322b4e74c34684636cbff7d3609d4b";i:1474242228;s:40:"69f0edfd380f3c44271ab5eb5ec504f344761080";i:1474242238;s:40:"0baadefda090b512205da25e281cd5f40aab06b4";i:1474242295;s:40:"c0f02d11c2524eadf97a052659b5fca04544127e";i:1474242295;s:40:"79664f713ab6e71dc86931bfc2b0e2a3ea0128d4";i:1474242302;s:40:"ed3dbb32bfc1f08420296cfe82029a34b26085eb";i:1474242305;s:40:"873d25653e5b0a0b39baca5f24d53790a0d4bbdf";i:1474242394;s:40:"145d356159c15c2f62d431736e96f9f8fa78f960";i:1474242401;s:40:"7a03f98c7ae1724c1404f21cc96b9027ab0d3fb9";i:1474242424;s:40:"844cf06fdd700e83f1985b7ed85fecbe42b889c7";i:1474242442;s:40:"d38605aecfaaec572c75b1441ac36060474c8bf2";i:1474242447;s:40:"5a4742a12ee8a598253a72dc9bdb39295cd1db2d";i:1474242581;s:40:"39a03311f6b49eb2965e77eab0379b2459c469d3";i:1474242591;s:40:"866ebf122ccec45037fd0e0111656635196c66f8";i:1474242601;s:40:"4cf1b08deb1f939df7ea59107b05aef8001247dc";i:1474242672;s:40:"b0da60322b344b27e78361c5780f5d4bd02e423e";i:1474242679;s:40:"bd58c59ed78bc7ac1f58dd6ab4a50a81f19c164c";i:1474242703;s:40:"f2428b6233ef3d8f7f040521c2cbcf7c92dab041";i:1474242736;s:40:"16fd29edcc847ef306aad291a0c7a5e3131f3ad6";i:1474242746;s:40:"b2c192fe373091a153f609e9073ac704313deaaf";i:1474242752;s:40:"42b116c8035612867ac93deea1b474fdb6dbb8b8";i:1474242753;s:40:"188ea0067950d79039411ac2337ff405a7a51060";i:1474242771;s:40:"b98d91c57a1c329630f1f1be0848af1beff3d66d";i:1474242772;s:40:"c76b0a3235c3845c0e58beb833c1bc96d58fa025";i:1474242873;}}Message|a:0:{}Auth|a:2:{s:4:"User";a:21:{s:2:"id";s:1:"3";s:8:"username";s:11:"AlainVeylit";s:4:"name";s:12:"Alain Veylit";s:4:"role";s:5:"Admin";s:8:"licenses";s:1:"0";s:10:"last_login";s:19:"2016-09-18 11:20:43";s:7:"created";s:19:"2016-01-06 16:56:19";s:6:"active";b:1;s:10:"profile_id";s:3:"571";s:8:"cours_id";s:1:"1";s:5:"cours";s:0:"";s:5:"email";s:20:"alain@signtracks.com";s:11:"email_token";s:0:"";s:19:"email_token_expires";s:19:"0000-00-00 00:00:00";s:14:"email_verified";b:0;s:7:"Profile";a:3:{s:2:"id";s:3:"571";s:4:"name";s:12:"Alain Veylit";s:6:"avatar";s:15:"versailles.jpeg";}s:10:"Professeur";a:5:{s:2:"id";s:1:"1";s:3:"nom";s:6:"Veylit";s:6:"prenom";s:5:"Alain";s:5:"titre";s:2:"Dr";s:8:"courriel";s:22:"Alain.Veylit@csusb.edu";}s:12:"access_level";N;s:9:"professor";b:1;s:13:"professeur_id";s:1:"1";s:9:"isCreator";b:0;}s:4:"user";a:1:{s:8:"cours_id";s:1:"1";}}Cours|a:2:{s:2:"id";s:1:"1";s:5:"titre";s:13:"FranÃ§ais 102";}referer|s:37:"http://fcsusb/admin/slideshows/view/4";', 1474250073),
('7g2rj5hu138nnu130mljpra8s3', 'Config|a:3:{s:9:"userAgent";s:32:"b60ac98040be822849bab073c01a080a";s:4:"time";i:1474239167;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"727b48a69ff2a311aea143305f60224f0a3fb88b";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:4:{i:0;s:5:"login";i:1;s:7:"display";i:2;s:10:"save_order";i:3;s:14:"enregistrement";}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:1:{s:40:"727b48a69ff2a311aea143305f60224f0a3fb88b";i:1474231967;}}', 1474239167);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `creator`) VALUES
(1, 'Grammaire', 3),
(2, 'Lecture', 3),
(3, 'Langage courant', 3),
(4, 'Vocabulaire', 3),
(5, 'Ressource', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chansons`
--

CREATE TABLE IF NOT EXISTS `chansons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `video` text NOT NULL,
  `paroles` text NOT NULL,
  `image` varchar(64) NOT NULL,
  `image_dir` varchar(64) NOT NULL,
  `image_size` int(11) NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `index` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `chansons`
--

INSERT INTO `chansons` (`id`, `titre`, `auteur`, `description`, `cours_id`, `video`, `paroles`, `image`, `image_dir`, `image_size`, `creator`, `created`, `index`) VALUES
(1, 'Le toi du moi', 'Carla Bruni', '<p>Chanson de la premi&egrave;re dame de France, super-mod&egrave;le, amante de Mick Jagger, et femme de Nicolas Sarkozy.</p>', 0, '<p><iframe src="https://www.youtube.com/embed/2Pj3h7Fbb3I" width="320" height="180" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>', '<p>Je suis ton pile <br /> Tu es mon face<br /> Toi mon nombril<br /> Et moi ta glace<br /> Tu es l''envie et moi le geste<br /> Toi le citron et moi le zeste <br /> Je suis le th&eacute;, tu es la tasse<br /> Toi la guitare et moi la basse<br /> <br /> Je suis la pluie et tu es mes gouttes<br /> Tu es le oui et moi le doute<br /> T''es le bouquet je suis les fleurs<br /> Tu es l''aorte et moi le coeur<br /> Toi t''es l''instant moi le bonheur<br /> Tu es le verre je suis le vin<br /> Toi tu es l''herbe et moi le joint<br /> Tu es le vent j''suis la rafale<br /> Toi la raquette et moi la balle<br /> T''es le jouet et moi l''enfant<br /> T''es le vieillard et moi le temps<br /> Je suis l''iris tu es la pupille<br /> Je suis l''&eacute;pice toi la papille<br /> Toi l''eau qui vient et moi la bouche<br /> Toi l''aube et moi le ciel qui s''couche<br /> T''es le ricard et moi l''ivresse<br /> T''es le mensonge moi la paresse<br /> T''es le gu&eacute;pard moi la vitesse<br /> Tu es la main moi la caresse<br /> Je suis l''enfer de ta p&eacute;cheresse <br /> Tu es le Ciel moi la Terre, hum .<br /> Je suis l''oreille de ta musique<br /> Je suis le soleil de tes tropiques<br /> Je suis le tabac de ta pipe<br /> T''es le plaisir je suis la foudre<br /> Tu es la gamme et moi la note<br /> Tu es la flamme moi l''allumette<br /> T''es la chaleur j''suis la paresse<br /> T''es la torpeur et moi la sieste<br /> T''es la fra&icirc;cheur et moi l''averse<br /> Tu es les fesses je suis la chaise<br /> Tu es b&eacute;mol et moi j''suis di&egrave;se<br /> <br /> T''es le Laurel de mon Hardy<br /> T''es le plaisir de mon soupir<br /> T''es la moustache de mon Trotski<br /> T''es tous les &eacute;clats de mon rire<br /> Tu es le chant de ma sir&egrave;ne<br /> Tu es le sang et moi la veine<br /> T''es le jamais de mon toujours<br /> T''es mon amour t''es mon amour<br /> <br /> Je suis ton pile <br /> Toi mon face<br /> Toi mon nombril<br /> Et moi ta glace<br /> Tu es l''envie et moi le geste<br /> T''es le citron et moi le zeste<br /> Je suis le th&eacute;, tu es la tasse<br /> Toi la putain et moi la passe<br /> Tu es la tomb&eacute;e moi l''&eacute;pitaphe<br /> Et toi le texte, moi le paragraphe<br /> Tu es le lapsus et moi la gaffe<br /> Toi l''&eacute;l&eacute;gance et moi la gr&acirc;ce<br /> Tu es l''effet et moi la cause<br /> Toi le divan moi la n&eacute;vrose<br /> Toi l''&eacute;pine moi la rose<br /> Tu es la tristesse moi le po&egrave;te<br /> Tu es la Belle et moi la B&ecirc;te<br /> Tu es le corps et moi la t&ecirc;te<br /> Tu es le corps. hummm !<br /> T''es le s&eacute;rieux moi l''insouciance<br /> Toi le flic moi la balance<br /> Toi le gibier moi la potence<br /> Toi l''ennui et moi la transe<br /> Toi le tr&egrave;s peu moi le beaucoup<br /> Moi le sage et toi le fou<br /> Tu es l''&eacute;clair et moi la foudre<br /> Toi la paille et moi la poudre<br /> Tu es le surmoi de mon &ccedil;a<br /> C''est toi charybde et moi scylla<br /> Tu es l''amer et moi le doute<br /> Tu es le n&eacute;ant et moi le tout<br /> Tu es le chant de ma sir&egrave;ne<br /> Toi tu es le sang et moi la veine<br /> T''es le jamais de mon toujours<br /> T''es mon amour t''es mon amour</p>', 'carla-bruni.jpg', '1', 83440, 4, '2016-01-25 16:39:27', 0),
(2, 'Dans le port d''Amsterdam', 'Jacques Brel', '<p>Une des chansons les plus c&eacute;l&egrave;bres d''un des plus grands chanteurs Belges de tous les temps. Jacques Brel a influenc&eacute; plusieurs g&eacute;n&eacute;rations de chanteurs francais et anglais, dont Nina Simone, Barbara Streisand, ou David Bowie qui lui a rendu hommage avec sa propre rendition de cette chanson. Sa po&eacute;sie est pure et brutale comme le vent qui balaie le plat pays qui est le sien.</p>', 2, '<p><iframe src="https://www.youtube.com/embed/n2kkr0e_dTQ" width="640" height="360" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>', '<div class="row">\r\n<div style="width: 48%; float: left;">\r\n<p>Dans le port d''Amsterdam <br />Y a des marins qui chantent <br />Les r&ecirc;ves qui les hantent</p>\r\nAu large d''Amsterdam<br /> Dans le port d''Amsterdam<br /> Y a des marins qui dorment<br /> Comme des oriflammes<br /> Le long des berges mornes<br /> Dans le port d''Amsterdam<br /> Y a des marins qui meurent<br /> Pleins de bi&egrave;re et de drames<br /> Aux premi&egrave;res lueurs<br /> Mais dans le port d''Amsterdam<br /> Y a des marins qui naissent<br /> Dans la chaleur &eacute;paisse<br /> Des langueurs oc&eacute;anes<br /> <br /> Dans le port d''Amsterdam<br /> Y a des marins qui mangent<br /> Sur des nappes trop blanches<br /> Des poissons ruisselants<br /> Ils vous montrent des dents<br /> A croquer la fortune<br /> A d&eacute;croisser la lune<br /> A bouffer des haubans<br /> Et &ccedil;a sent la morue<br /> Jusque dans le cÂœoeur des frites<br /> Que leurs grosses mains invitent<br /> A revenir en plus<br /> Puis se l&egrave;vent en riant<br /> Dans un bruit de temp&ecirc;te<br /> Referment leur braguette<br /> Et sortent en rotant</div>\r\n<div style="width: 48%; float: left;">Dans le port d''Amsterdam<br /> Y a des marins qui dansent<br /> En se frottant la panse<br /> Sur la panse des femmes<br /> Et ils tournent et ils dansent<br /> Comme des soleils crach&eacute;s<br /> Dans le son d&eacute;chir&eacute;<br /> D''un accord&eacute;on rance<br /> Ils se tordent le cou<br /> Pour mieux s''entendre rire<br /> Jusqu''&agrave; ce que tout &agrave; coup<br /> L''accord&eacute;on expire<br /> Alors le geste grave<br /> Alors le regard fier<br /> Ils ram&egrave;nent leur batave<br /> Jusqu''en pleine lumi&egrave;re<br /> <br /> Dans le port d''Amsterdam<br /> Y a des marins qui boivent<br /> Et qui boivent et reboivent<br /> Et qui reboivent encore<br /> Ils boivent &agrave; la sant&eacute;<br /> Des putains d''Amsterdam<br /> De Hambourg ou d''ailleurs<br /> Enfin ils boivent aux dames<br /> Qui leur donnent leur joli corps<br /> Qui leur donnent leur vertu<br /> Pour une pi&egrave;ce en or<br /> Et quand ils ont bien bu<br /> Se plantent le nez au ciel<br /> Se mouchent dans les &eacute;toiles<br /> Et ils pissent comme je pleure<br /> Sur les femmes infid&egrave;les<br /> Dans le port d''Amsterdam<br /> Dans le port d''Amsterdam</div>\r\n</div>', 'jacques-brel.jpeg', '2', 5656, 3, '2016-01-25 17:33:43', 0),
(3, 'bonjour bon mois', 'Guillaume DuFay', '', 1, '', '', '', '', 0, 3, '2016-03-08 12:43:10', 1),
(4, 'L''hexagone', 'Renaud', '<p>Critique acerbe de la soci&eacute;t&eacute; fran&ccedil;aise</p>', 2, '', '', '', '', 0, 3, '2016-09-15 16:54:47', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `model` varchar(32) NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `user_id` smallint(4) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `couleurs`
--

CREATE TABLE IF NOT EXISTS `couleurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(48) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `couleurs`
--

INSERT INTO `couleurs` (`id`, `title`) VALUES
(1, 'blue'),
(2, 'grenat'),
(3, 'purple'),
(4, 'red'),
(5, 'green'),
(6, 'orange'),
(7, 'emerald'),
(8, 'yellow'),
(9, 'lavender'),
(10, 'beige');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `ccode` varchar(24) NOT NULL,
  `horaire` varchar(255) NOT NULL,
  `salle` varchar(128) NOT NULL,
  `professeur_id` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `banniere` varchar(128) NOT NULL,
  `colonnes` int(10) unsigned NOT NULL DEFAULT '3',
  `creator` int(10) unsigned NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `titre`, `slug`, `ccode`, `horaire`, `salle`, `professeur_id`, `description`, `banniere`, `colonnes`, `creator`, `modified`, `created`) VALUES
(1, 'FranÃ§ais 102', '', 'fr_102', 'Lundi, Mercredi, Vendredi 9h30-10h30', 'UH 262', 1, '<p>Cours de Fran&ccedil;ais d&eacute;butants ayant re&ccedil;u un trimestre.</p>\r\n<p>Livre: Le fran&ccedil;ais interactif.</p>', 'FranÃ§ais 102 - Classe de M. Alain Veylit', 3, 3, '2016-09-16 22:34:17', '2016-09-08 12:44:08'),
(2, 'Francais 202', '', 'fr_202', 'Lundi, mercredi, vendredi 10h30', '', 1, '<p>Cours avanc&eacute; pour &eacute;udiants de deuxi&egrave;me ann&eacute;e.</p>', 'Bienvenue au cours de Francais 202', 3, 3, '2016-09-08 17:56:27', '2016-09-08 17:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `devoirs`
--

CREATE TABLE IF NOT EXISTS `devoirs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `lesson_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `devoirs`
--

INSERT INTO `devoirs` (`id`, `description`, `lesson_id`, `created`) VALUES
(1, '<p>Les devoirs</p>', 30, '2016-09-10 10:13:41'),
(2, '<p>Devoirs&nbsp;&agrave; faire : cr&eacute;ez un compte sur ce site</p>', 1, '2016-09-15 16:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `showcase` tinyint(1) NOT NULL DEFAULT '0',
  `notes` text,
  `model` varchar(32) NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `type` varchar(64) NOT NULL,
  `extension` varchar(4) NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `document_dir` varchar(64) NOT NULL,
  `size` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `category`, `description`, `document`, `showcase`, `notes`, `model`, `foreign_key`, `cours_id`, `type`, `extension`, `creator`, `document_dir`, `size`, `created`) VALUES
(2, 'Syllabus pour Francais 102 - Automne 2016', 'Syllabus', 'Plan du cours', 'syllabus 102 Fall 2016.pdf', 1, '', '', 0, 1, 'application/pdf', 'pdf', 3, '2', 176747, '2016-09-15 14:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `courriel` varchar(128) NOT NULL,
  `class` varchar(16) NOT NULL,
  `major` varchar(32) NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `ccode` varchar(24) NOT NULL,
  `origine` varchar(128) NOT NULL,
  `enrolled` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `attendance` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `class` (`class`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `courriel`, `class`, `major`, `cours_id`, `ccode`, `origine`, `enrolled`, `user_id`, `attendance`, `grade`, `notify`) VALUES
(1, 'Jean-Paul Sartre', '', 'alain@musickshandmade.com', '', '', 1, '', '', 1, 20, 0, 0, 1),
(2, 'Jeannot Lagaudie', '', 'alain@musickshandmade.com', '', '', 1, '', '', 1, 21, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `creator` int(10) unsigned NOT NULL DEFAULT '2',
  `model` varchar(32) NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `type` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Profile` varchar(255) NOT NULL,
  `Instrument` varchar(128) DEFAULT NULL,
  `Family` varchar(128) NOT NULL,
  `Song` varchar(128) NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `position` enum('head','tail','','') NOT NULL DEFAULT 'head',
  `alignment` varchar(32) NOT NULL DEFAULT 'left',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `instances`
--

CREATE TABLE IF NOT EXISTS `instances` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `quiz_id` int(11) unsigned NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `password` varchar(32) NOT NULL,
  `expires` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `landings`
--

CREATE TABLE IF NOT EXISTS `landings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `professeur_id` int(10) unsigned NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `ccode` varchar(24) NOT NULL,
  `syllabus` int(10) unsigned NOT NULL,
  `login` varchar(255) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `landings`
--

INSERT INTO `landings` (`id`, `title`, `description`, `professeur_id`, `cours_id`, `ccode`, `syllabus`, `login`, `modified`, `created`) VALUES
(3, 'Bienvenue en FranÃ§ais 102!', '<p>Ce cours est destin&eacute; aux &eacute;tudiants ayant d&eacute;j&agrave; acquis un trimestre de fran&ccedil;ais.</p>\r\n<p>&nbsp;</p>', 1, 1, '', 2, '', '2016-09-15 15:30:24', '2016-09-09 16:06:22'),
(4, 'Cours de franÃ§ais 202', '<p>Cours pour &eacute;tudiants avanc&eacute;s qui ont re&ccedil;u une ann&eacute;e compl&egrave;te d''enseignement.</p>', 1, 2, '', 0, '', '2016-09-10 10:32:08', '2016-09-10 10:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `jour` date NOT NULL,
  `index` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `grammaire` text NOT NULL,
  `lecture` text NOT NULL,
  `idiomes` text NOT NULL,
  `dictee` text NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `ccode` varchar(24) NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `titre`, `jour`, `index`, `active`, `grammaire`, `lecture`, `idiomes`, `dictee`, `cours_id`, `ccode`, `creator`, `created`, `modified`) VALUES
(1, 'Introduction', '2016-09-23', 2016, 1, '<p>Achetez le livre: <strong>French for Oral and Written Review</strong>, 5th edition. Charles Carlut, Walter Meiden, Heinle &amp; Heinle, Thomson Learning</p>', '<p>Achetez les livres suivants:</p>\r\n<p><strong>Candide, de Voltaire</strong>.&nbsp; Petits Classiques Larousse, &eacute;dit&eacute; par Yves Bomati</p>\r\n<p><strong>Huis Clos, de Jean-Paul Sartre</strong>. Edition Gallimard, collection Folio.</p>\r\n<p>&nbsp;</p>', '<p><em>Le bouquin</em>: le livre</p>', '<p>Etudiez le paragraphe 3 de Candide, chapitre 1, attentivement.</p>', 1, '', 3, '2016-01-09 18:13:12', '2016-09-15 16:44:18'),
(2, 'Le&ccedil;on 1', '2016-09-23', 0, 1, '<h3>Participe pass&eacute;: Auxiliaires et accords</h3>\r\n<p><strong>Etudiez les pages 104-109;</strong></p>\r\n<p>Exercices: C, E, G, H<br />ex H p 109:</p>\r\n<ol style="list-style-type: undefined;">\r\n<li>se rencontrer</li>\r\n<li>se pr&eacute;cipiter</li>\r\n<li>s&rsquo;&eacute;crire</li>\r\n<li>se couper</li>\r\n<li>se retrouver</li>\r\n<li>se tromper</li>\r\n<li>se bl&acirc;mer</li>\r\n<li>se relater</li>\r\n<li>se moquer</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><br />&nbsp;</p>', '<h3>Voltaire: Candide, chapitres. 1-3</h3>', '', '', 1, '', 3, '2016-01-10 12:55:01', '2016-09-18 11:15:16'),
(3, 'Le&ccedil;on 2', '2016-10-03', 0, 0, '<h3>Le participe pr&eacute;sent</h3>\r\n<p>Etudiez les pages 109-117 du livre;</p>\r\n<p>Faites les exercices: J, K, L</p>\r\n<p>&nbsp;</p>\r\n<p><strong>A. Emploi du participe pr&eacute;sent ou adjectif verbal</strong><br /> Le participe pr&eacute;sent fonctionne comme une forme <a href="http://la-conjugaison.nouvelobs.com/regles/grammaire/les-adverbes-163.php">verbale</a> invariable sauf s''il est employ&eacute; comme un <a href="http://la-conjugaison.nouvelobs.com/regles/grammaire/les-adjectifs-10.php">adjectif</a>, et s''accorde alors en genre et en nombre avec son sujet.</p>\r\n<p><span style="text-decoration: underline;">Exemples</span> : <em><br /> - Ils allaient &agrave; l''&eacute;cole en <strong>chantant</strong>. (participe pr&eacute;sent invariable)<br /> - Elle allait &agrave; l''&eacute;cole en <strong>chantant</strong>.<em>(participe pr&eacute;sent invariable)</em></em></p>\r\n<p><em>-Les planchers glissants sont dangereux pour la sant&eacute;! (adjectif verbal s''accordant avec le nom)</em></p>\r\n<p><strong>&nbsp;B. Construction du participe pr&eacute;sent ou adjectif verbal</strong><br /> <strong>1 -</strong> Le participe pr&eacute;sent a toujours pour suffixe -<strong><em>ant</em></strong> et est invariable. Il se forme en rempla&ccedil;ant le suffixe <strong>-ons</strong> du verbe &agrave; la premi&egrave;re personne du pluriel du pr&eacute;sent par le suffixe: <strong>-ant</strong>.</p>\r\n<p><span style="text-decoration: underline;">Exemples:</span>&nbsp; (donner) nous donn<strong>ons</strong> -&gt; donn<strong>ant; </strong>(&eacute;crire) nous &eacute;criv<strong>ons</strong> -&gt; &eacute;criv<strong>ant;</strong> (croire) nous croy<strong>ons</strong> -&gt; croy<strong>ant; </strong>(conclure) nous conclu<strong>ons</strong> -&gt; conclu<strong>ant</strong>;<strong><br /></strong></p>\r\n<p>Il y a trois exceptions importantes &agrave; cette r&egrave;gle:</p>\r\n<ul style="list-style-type: undefined;">\r\n<li>&ecirc;tre -&gt; &eacute;tant</li>\r\n<li>avoir -&gt; ayant</li>\r\n<li>savoir -&gt; sachant</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Le participe pass&eacute; exprime une action termin&eacute;e, r&eacute;volue: <em>"J''ai fini mes devoirs"</em>, par exemple, indique que l''action de "faire ses devoirs" est accomplie au moment o&ugrave; je parle, c-&agrave;-d au pr&eacute;sent dans ce cas.</p>\r\n<p>Le participe pr&eacute;sent lui, indique que l''action est en cours d''ex&eacute;cution: <em>"J''&eacute;coute la radio en faisant mes devoirs"</em>, par exemple indique que l''action "faire mes devoirs" est en cours, non termin&eacute;e quand j''&eacute;coute la radio. Il indique que l''action au participe pr&eacute;sent repr&eacute;sente un <strong>contexte, temporel ou parfois logique</strong>, pour une autre action. On peut souvent le remplacer avec une expression telle que: <em>Pendant que</em> ... ou <em>Puisque</em> ... ou <em>Alors que</em>... ou <em>Parce que</em>...</p>\r\n<p><em>&nbsp;</em></p>\r\n<p><strong>2 -</strong> L''adjectif verbal est d&eacute;riv&eacute; du participe pr&eacute;sent, mais il s''accorde en genre et en nombre avec <a href="http://la-conjugaison.nouvelobs.com/regles/orthographe/definition-192.php">le nom </a>qu''il qualifie. L''adjectif verbal a pour suffixes "<strong>-ant</strong>", "<strong>-ants</strong>", "<strong>-ante</strong>" et "<strong>-antes</strong>". <br /> <span style="text-decoration: underline;">Exemples</span> : <em>Un jeune homme charm<strong>ant</strong> ; des enfants charm<strong>ants</strong> ; une fillette charm<strong>ante</strong> ; des jeunes femmes charm<strong>antes</strong>.</em></p>\r\n<p><strong>3 -</strong> Par ailleurs, bien que d&eacute;riv&eacute; du participe pr&eacute;sent, l''adjectif verbal peut avoir une &eacute;criture diff&eacute;rente. Pour la plupart des verbes finissant par -<strong><em>guer</em></strong> ou -<em><strong>quer</strong></em>, le <em><strong>u</strong></em> est supprim&eacute;.<br /> <span style="text-decoration: underline;">Exemple</span> : <em>Navi<strong>guant</strong></em> (participe pr&eacute;sent) devient <em>navi<strong>gant</strong></em> (adjectif verbal); <em>fatiguant</em> devient <em>fatigant</em>;</p>\r\n<p>Contrairement au participle pr&eacute;sent qui exprime un &eacute;tat temporaire d&eacute;termin&eacute; par rapport&nbsp;&agrave; une autre action, l''adjectif verbal d&eacute;crit une condition plus permanente.</p>\r\n<p><span style="text-decoration: underline;">Exemples</span>:</p>\r\n<ul style="list-style-type: undefined;">\r\n<li><em>La bicyclette est plus fatigante pour les muscles des jambes que la moto.(c''est toujours vrai)<br /></em></li>\r\n<li><em>En se fatiguant autant qu''il le fait, il risque avoir un probl&egrave;me de sant&eacute; s&eacute;rieux. (Ca n''est vrai que lorsqu''il se fatigue)</em></li>\r\n</ul>\r\n<ul style="list-style-type: undefined;">\r\n<li><em>Pour une fois ob<em>&eacute;</em>issant&nbsp;&agrave; leurs parents sans rechigner, les enfants sont partis se coucher&nbsp;&agrave; l''heure. (Cas exceptionnel)</em></li>\r\n<li><em>Les enfants ob&eacute;issants vont se coucher &agrave; l''heure sans rechigner. (Cas toujours vrai)</em></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '<h3>Candide, chapitres. 4-6</h3>\r\n<p>&nbsp;</p>', '', '', 1, '', 3, '2016-01-10 12:58:09', '2016-09-15 10:37:44'),
(4, 'Le&ccedil;on 3', '2016-10-05', 0, 0, '<p>Exercices d&rsquo;ensemble 8, p 295: exs. A, B et C <br /><br /></p>', '<ul style="list-style-type: undefined;">\r\n<li>Candide: chapitres 7-9</li>\r\n</ul>', '', '', 1, '', 3, '2016-01-10 13:00:19', '2016-09-15 10:38:27'),
(5, 'Le&ccedil;on 4', '2016-10-01', 0, 0, '<p>Eutrdiez les pp 121-125;</p>\r\n<p>exercices: C et D, p 125 <br /><br /></p>', '<p>Candide, chs. 10-12</p>', '', '', 1, '', 3, '2016-01-10 13:02:02', '2016-01-10 13:02:02'),
(6, 'Le&ccedil;on 5', '2016-10-01', 0, 0, '<p>G: pp 126-133; exs. <br />G, H, I, p 129 et ex. J, p 133 <br /><br /></p>', '<p>Candide, chs. 13-15</p>', '', '', 1, '', 3, '2016-01-10 13:03:02', '2016-01-10 13:03:02'),
(7, 'Le&ccedil;on 6', '2016-10-01', 0, 0, '<p><strong>Composition 1 (&agrave; remettre lundi 1er f&eacute;vrier)</strong></p>\r\n<p>Exercices d&rsquo;ensemble 9, p 299: exs. A et B</p>', '<p>Candide, chs. 16-18</p>', '', '', 1, '', 3, '2016-01-10 13:04:11', '2016-01-11 19:02:12'),
(8, 'Le&ccedil;on 6 -- Test', '2016-10-01', 0, 0, '<p>Test 1 (G, chs. 8 + 9)</p>', '', '', '', 1, '', 3, '2016-01-10 13:05:40', '2016-01-10 13:05:59'),
(9, 'Le&ccedil;on 7', '2016-10-01', 0, 0, '<p>pp 135-138; exs. A et B <br /><br /></p>', '<p>Candide, chs. 19-21</p>', '', '', 1, '', 3, '2016-01-10 13:07:01', '2016-02-03 15:32:54'),
(10, 'Le&ccedil;on 8', '2016-10-01', 0, 0, '<p>p 139-145; exs. C et D, pp 140-141 et ex. E, p 145<br /><br /></p>', '<p>Candide, ch. 22</p>', '', '', 1, '', 3, '2016-01-10 13:08:01', '2016-01-10 13:08:01'),
(11, 'Le&ccedil;on 9', '2016-10-01', 0, 0, '<p>Exercices d&rsquo;ensemble 10, p 301: exs B et C <br /><br /></p>', '<p>Candide, chs. 23-25</p>', '', '', 1, '', 3, '2016-01-10 13:09:02', '2016-01-10 13:10:23'),
(12, 'Le&ccedil;on 10', '2016-10-01', 0, 0, '<p>: pp 148-153; exs. A &agrave; E <br /><br /></p>', '<p>Candide, chs. 26-28</p>', '', '', 1, '', 3, '2016-01-10 13:10:10', '2016-01-10 13:10:33'),
(13, 'Le&ccedil;on 11', '2016-10-01', 0, 0, '<p>pp 153-158; exs. F, H, et J <br /><br /></p>', '<p>Candide, chs. 29-30</p>', '', '', 1, '', 3, '2016-01-10 13:11:33', '2016-01-10 13:11:33'),
(14, 'Le&ccedil;on 12', '2016-10-01', 0, 0, '<p>: pp 158-161; exs. L, N et O <br /><br /></p>', '<p>Po&eacute;sie: Pr&eacute;vert</p>', '', '', 1, '', 3, '2016-01-10 13:12:50', '2016-01-10 13:12:50'),
(15, 'Le&ccedil;on 13', '2016-10-01', 0, 0, '<p>pp 162-165; ex. P p 165; Exercices d&rsquo;ensemble 11, ex A, B, C, p 305<br /><br /></p>', '<p>po&eacute;sie: Rimbaud</p>', '', '', 1, '', 3, '2016-01-10 13:13:45', '2016-01-10 13:13:45'),
(16, 'Le&ccedil;on 14 - Test', '2016-10-01', 0, 0, '<p>Test 2 (G, chs. 10 + 11)</p>', '', '', '', 1, '', 3, '2016-01-10 13:14:59', '2016-01-10 13:14:59'),
(17, 'Le&ccedil;on 15', '2016-10-01', 0, 0, '<p>pp 169-174; exs. A et C<br /><br /></p>', '<p>po&eacute;sie: Baudelaire</p>', '', '', 1, '', 3, '2016-01-10 13:16:01', '2016-01-10 13:16:01'),
(18, 'Le&ccedil;on 16', '2016-10-01', 0, 0, '<p>pp 175-182; exs. D et F; Exercices d&rsquo;ensemble 12, p 309: exs. B, C, D, E<br /><br /></p>', '<p>po&eacute;sie: Baudelaire</p>', '', '', 1, '', 3, '2016-01-10 13:17:01', '2016-01-11 18:50:20'),
(19, 'Le&ccedil;on 17', '2016-10-01', 0, 0, '<p>pp 186-191; exs. A, C, D, E <br /><br /></p>', '<p>Sartre: Huis clos, pp 13-25</p>', '', '', 1, '', 3, '2016-01-10 13:18:21', '2016-01-10 13:18:21'),
(20, 'Le&ccedil;on 18', '2016-10-01', 0, 0, '<p>pp 193-196; exs. F et H; Exercices d&rsquo;ensemble 13, p 313: exs. A, B <br /><br /></p>', '<p>Huis clos, pp 26-36</p>', '', '', 1, '', 3, '2016-01-10 13:19:30', '2016-01-10 13:19:30'),
(21, 'Le&ccedil;on 19 -- Test', '2016-10-01', 0, 0, '<p>Test 3 (G, chs 12 + 13)</p>', '', '', '', 1, '', 3, '2016-01-10 13:20:39', '2016-01-10 13:20:39'),
(22, 'Le&ccedil;on 20', '2016-10-01', 0, 0, '<p>pp 200-206; exs. A, C, E et F<br /><br /></p>', '<p>Huis clos, pp 37-48</p>', '', '', 1, '', 3, '2016-01-10 13:21:52', '2016-01-10 13:21:52'),
(23, 'Le&ccedil;on 21', '2016-10-01', 0, 0, '<p>pp 206-209; exs. G et I<br /><br /></p>', '<p>Huis clos, pp 49-61</p>', '', '', 1, '', 3, '2016-01-10 13:22:52', '2016-01-10 13:22:52'),
(24, 'Le&ccedil;on 22', '2016-10-01', 0, 0, '<p>pp 210-213; ex J; Exercices d&rsquo;ensemble 14, p 317: exs. A et C<br /><br /></p>', '<p>Huis clos,pp 62-71</p>', '', '', 1, '', 3, '2016-01-10 13:24:00', '2016-01-10 13:24:13'),
(25, 'Le&ccedil;on 23', '2016-10-01', 0, 0, '<p>: pp 216-220; exs. A, C, D</p>\r\n<p>&nbsp;</p>', '<p>Huis clos, pp 72-82</p>', '', '', 1, '', 3, '2016-01-10 13:25:41', '2016-01-10 13:25:41'),
(26, 'Le&ccedil;on 24', '2016-10-01', 0, 0, '<p>pp 221-225; exs. F et G; Exercices d&rsquo;ensemble 15, p 321: exs. A et B<br /><br /></p>', '<p>Huis clos, pp 83-fin</p>', '', '', 1, '', 3, '2016-01-10 13:26:50', '2016-01-10 13:35:25'),
(27, 'Examen final', '2016-10-01', 0, 0, '<p>examen final (G, chs. 14 + 15 et r&eacute;vision): lundi 18 avril 2016 &agrave; 15h00, salle HOL 101</p>', '', '', '', 1, '', 3, '2016-01-10 13:27:55', '2016-01-10 13:27:55'),
(28, 'Le&ccedil;on Uno', '2016-10-01', 0, 0, '<p>Lire le livre!</p>', '', '<p>P&eacute;ter les plombs</p>', '', 0, '', 0, '2016-02-04 15:00:10', '2016-02-04 15:00:10'),
(29, 'French 6 - lecon 1', '2016-10-01', 0, 0, '<p>Premi&egrave;re le&ccedil;on de Fran&ccedil;ais 6! C''est la partie grammaire</p>', '<p>Lisez les 3 premiers chapitres</p>', '<p>Se lever le matin</p>', '<p>Je suis l&agrave;! C''est moi, la dict&eacute;e!</p>', 3, '', 4, '2016-02-05 15:33:43', '2016-02-05 18:28:02'),
(30, 'Francais 5 -- Le&ccedil;on Uno', '2016-10-11', 0, 1, '<p>Grammaire</p>', '<p>Lecture</p>', '<p>Idiomes idoines</p>', '<p>La dict&eacute;e</p>', 2, '', 3, '2016-02-05 15:48:21', '2016-09-16 18:08:41'),
(31, 'Introduction Fran&ccedil;ais 202', '2016-09-23', 0, 1, '', '', '', '', 2, '', 3, '2016-09-15 10:39:18', '2016-09-16 18:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `lessons_quizzes`
--

CREATE TABLE IF NOT EXISTS `lessons_quizzes` (
  `lesson_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons_quizzes`
--

INSERT INTO `lessons_quizzes` (`lesson_id`, `quiz_id`) VALUES
(1, 1),
(2, 5),
(2, 6),
(3, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `lessons_slideshows`
--

CREATE TABLE IF NOT EXISTS `lessons_slideshows` (
  `lesson_id` int(10) unsigned NOT NULL,
  `slideshow_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons_slideshows`
--

INSERT INTO `lessons_slideshows` (`lesson_id`, `slideshow_id`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `index` smallint(2) unsigned NOT NULL,
  `correct_answer` tinyint(1) DEFAULT '0',
  `quiz_id` smallint(9) unsigned NOT NULL,
  `question_id` smallint(9) unsigned DEFAULT NULL,
  `image_id` smallint(9) unsigned NOT NULL,
  `audio_id` smallint(9) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `title`, `index`, `correct_answer`, `quiz_id`, `question_id`, `image_id`, `audio_id`) VALUES
(1, 'un radis', 3, 1, 1, 1, 16, 0),
(5, 'citrouille', 0, 0, 1, 2, 4, 0),
(3, 'une carotte', 2, 0, 1, 1, 3, 0),
(4, 'un cornichon', 1, 0, 1, 1, 9, 0),
(6, 'tomate', 0, 1, 1, 2, 6, 0),
(7, 'aubergine', 0, 0, 1, 2, 2, 0),
(8, 'salsifi', 2, 0, 1, 3, 30, 0),
(9, 'haricot vert', 2, 0, 1, 3, 11, 0),
(10, 'dauphin', 1, 0, 3, 5, 0, 0),
(11, 'hippopotame', 1, 0, 3, 5, 0, 0),
(12, 'cochon', 1, 1, 3, 5, 0, 0),
(20, 'carottes', 1, 0, 1, 6, 0, 0),
(19, 'asperge', 0, 1, 0, 3, 0, 0),
(15, 'otarie', 2, 0, 0, 4, 0, 0),
(16, 'vache', 1, 1, 0, NULL, 0, 0),
(17, 'vache', 4, 1, 0, 4, 0, 0),
(18, 'truie', 3, 0, 0, 4, 0, 0),
(21, 'choux', 1, 1, 1, 6, 0, 0),
(22, 'navets', 1, 0, 1, 6, 0, 0),
(23, 'patates', 1, 0, 1, 7, 0, 0),
(24, 'pommes', 1, 1, 1, 7, 0, 0),
(25, 'pommes de terre', 1, 0, 1, 7, 0, 0),
(26, 'haricot', 1, 0, 1, 8, 0, 0),
(27, 'petit pois', 1, 0, 1, 8, 0, 0),
(28, 'navet', 1, 1, 1, 8, 0, 0),
(29, 'patates', 1, 0, 1, 9, 0, 0),
(30, 'tomates', 1, 0, 1, 9, 0, 0),
(31, 'pois', 1, 1, 1, 9, 0, 0),
(32, 'endive', 1, 0, 1, 10, 0, 0),
(33, 'laitue', 1, 0, 1, 10, 0, 0),
(34, 'patate', 1, 1, 1, 10, 0, 0),
(35, 'concombre', 1, 0, 1, 11, 0, 0),
(36, 'andouille', 1, 0, 1, 11, 0, 0),
(37, 'cornichon', 1, 1, 1, 11, 0, 0),
(38, 'endives', 1, 0, 1, 12, 0, 0),
(39, 'fraises', 1, 0, 1, 12, 0, 0),
(40, 'carottes', 1, 1, 1, 12, 0, 0),
(41, 'poireau', 1, 1, 1, 13, 0, 0),
(42, 'navet ', 1, 0, 1, 13, 0, 0),
(43, 'spaghetti', 1, 0, 1, 13, 0, 0),
(44, 'petits pois', 1, 0, 1, 14, 0, 0),
(45, 'lentilles', 1, 1, 1, 14, 0, 0),
(46, 'choux-fleurs', 1, 0, 1, 14, 0, 0),
(47, 'crocodile', 1, 0, 3, 15, 0, 0),
(48, 'hanneton', 1, 0, 3, 15, 0, 0),
(49, 'cheval', 1, 1, 3, 15, 0, 0),
(50, 'zÃ¨bre', 1, 0, 3, 16, 0, 0),
(51, 'crocodile', 1, 0, 3, 16, 0, 0),
(52, 'loup', 1, 1, 3, 16, 0, 0),
(53, 'pomme', 1, 0, 1, 17, 0, 0),
(54, 'grenade', 1, 0, 1, 17, 0, 0),
(55, 'banane', 1, 1, 1, 17, 0, 0),
(56, 'caneton', 1, 0, 3, 18, 0, 0),
(57, ' phthiraptÃ¨re', 1, 0, 3, 18, 0, 0),
(58, 'pou', 1, 1, 3, 18, 0, 0),
(59, 'calculateur', 1, 0, 4, 19, 0, 0),
(60, 'ordinateur', 1, 1, 4, 19, 0, 0),
(61, 'tableur', 1, 0, 4, 19, 0, 0),
(62, 'liseuse', 1, 1, 4, 20, 0, 0),
(63, 'tableuse', 1, 0, 4, 20, 0, 0),
(64, 'kindleuse', 1, 0, 4, 20, 0, 0),
(65, 'tÃ©lÃ©phone intelligent', 1, 0, 4, 21, 0, 0),
(66, 'tÃ©lÃ©phone smart', 1, 0, 4, 21, 0, 0),
(67, 'portable', 1, 1, 4, 21, 0, 0),
(68, 'm.d.r [mort de rire]', 1, 1, 4, 22, 0, 0),
(69, 's.m. [super marrant] ', 1, 0, 4, 22, 0, 0),
(70, 's.r. [super rigolo]', 1, 0, 4, 22, 0, 0),
(71, 'rate', 1, 0, 4, 23, 0, 0),
(72, 'souris', 1, 1, 4, 23, 0, 0),
(73, 'roue Ã  bille', 1, 0, 4, 23, 0, 0),
(74, 'SystÃ¨me d''opÃ©ration', 1, 0, 4, 24, 0, 0),
(75, 'SystÃ¨me opÃ©rationnel', 1, 0, 4, 24, 0, 0),
(76, 'SystÃ¨me d''exploitation', 1, 1, 4, 24, 0, 0),
(77, 'logiciel', 1, 1, 4, 25, 0, 0),
(78, 'software', 1, 0, 4, 25, 0, 0),
(79, 'application', 1, 0, 4, 25, 0, 0),
(80, 'a', 1, 1, 5, 26, 0, 0),
(81, 'est', 1, 0, 5, 26, 0, 0),
(82, 'sont', 1, 0, 5, 26, 0, 0),
(83, 'avez', 1, 0, 5, 27, 0, 0),
(84, 'Ãªtes', 1, 1, 5, 27, 0, 0),
(85, 'a', 1, 1, 5, 28, 0, 0),
(86, 'est', 1, 0, 5, 28, 0, 0),
(87, 'a', 1, 0, 5, 29, 0, 0),
(88, 'est', 1, 1, 5, 29, 0, 0),
(89, 'Ãªtes', 1, 1, 5, 30, 0, 0),
(90, 'avez', 1, 0, 5, 30, 0, 0),
(91, 'avons', 1, 0, 5, 31, 0, 0),
(92, 'sommes', 1, 1, 5, 31, 0, 0),
(93, 'sont', 1, 0, 5, 32, 0, 0),
(94, 'ont', 1, 1, 5, 32, 0, 0),
(95, 'a', 1, 0, 5, 33, 0, 0),
(96, 'est', 1, 1, 5, 33, 0, 0),
(97, 'a', 1, 1, 5, 34, 0, 0),
(98, 'est', 1, 0, 5, 34, 0, 0),
(99, 'a', 1, 1, 5, 35, 0, 0),
(100, 'est', 1, 0, 5, 35, 0, 0),
(101, 'avons', 1, 0, 5, 36, 0, 0),
(102, 'sommes', 1, 1, 5, 36, 0, 0),
(103, 'est', 1, 1, 5, 37, 0, 0),
(104, 'a', 1, 0, 5, 37, 0, 0),
(105, 'a', 1, 1, 5, 38, 0, 0),
(106, 'est', 1, 0, 5, 38, 0, 0),
(107, 'J''ai', 1, 0, 5, 39, 0, 0),
(108, 'Je suis', 1, 1, 5, 39, 0, 0),
(131, 'tu&eacute;s', 0, 1, 0, 40, 0, 0),
(110, 'tuÃ©', 1, 0, 5, 40, 0, 0),
(111, ' Ã©teinte', 1, 0, 6, 41, 0, 0),
(112, ' Ã©teintes', 1, 1, 6, 41, 0, 0),
(113, ' Ã©teints', 1, 0, 6, 41, 0, 0),
(114, 'finies', 1, 1, 6, 42, 0, 0),
(115, 'finie', 1, 0, 6, 42, 0, 0),
(116, 'fini', 1, 0, 6, 42, 0, 0),
(117, 'Ã©teinte', 1, 1, 6, 43, 0, 0),
(118, 'Ã©teint', 1, 0, 6, 43, 0, 0),
(119, 'allumÃ©', 1, 1, 6, 44, 0, 0),
(120, 'allumÃ©e', 1, 0, 6, 44, 0, 0),
(121, 'allumer', 1, 0, 6, 44, 0, 0),
(122, 'vrai', 1, 0, 3, 45, 0, 0),
(123, '', 0, 0, 0, 41, 0, 0),
(124, '', 0, 0, 0, 41, 0, 0),
(125, 'awdfasdfsdf', 0, 0, 0, 41, 0, 0),
(126, '', 0, 0, 0, 41, 0, 0),
(127, '', 0, 0, 0, 41, 0, 0),
(128, '', 0, 0, 0, 41, 0, 0),
(129, '', 0, 0, 0, 41, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `personnages`
--

CREATE TABLE IF NOT EXISTS `personnages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `focus` varchar(64) NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_dir` varchar(32) NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`, `profession`, `description`, `focus`, `cours_id`, `image`, `image_dir`, `creator`, `created`) VALUES
(1, 'FranÃ§ois Hollande', 'PrÃ©sident de la RÃ©publique', '<p>Fran&ccedil;ois Hollande est le 24&egrave;me pr&eacute;sident de la R&eacute;publique fran&ccedil;aise. Il est le chef de l''Etat.</p>\r\n<p>Le pr&eacute;sident de la R&eacute;publique ne gouverne pas. Il nomme un premier ministre qui forme un gouvernement pour s''occuper des affaires du pays.</p>\r\n<p>Comment s''appelle le premier ministre de la France aujourd''hui?</p>', 'Politique', 1, 'Francois_Hollande_2015.jpeg', '1', 3, '2016-09-11 13:11:05'),
(2, 'Manuel Valls', 'Premier ministre', '<p>Manuel Carlos Valls est un homme politique n&eacute; le 13 ao&ucirc;t 1962 &agrave; Barcelone. Il est Catalan et comme Fran&ccedil;ois Hollande il appartient au <strong>Parti Socialiste</strong>.</p>\r\n<p>Manuel Valls est le fils du peintre catalan Xavier Valls, et d''une m&egrave;re suisse Luisangela Galfetti, s&oelig;ur de l''architecte Aurelio Galfetti. Le cousin germain de son p&egrave;re a &eacute;crit l''hymne du club de football FC Barcelone, dont Manuel Valls est supporter. Manuel Valls fait ses &eacute;tudes &agrave; l''Universit&eacute; Paris I &agrave; Tolbiac et obtient une licence en histoire.</p>\r\n<p><strong>Sa carri&egrave;re politique</strong></p>\r\n<p>En 1980, &agrave; 17 ans, il entre en politique pour soutenir Michel Rocard. En 1982, il obtient la nationalit&eacute; fran&ccedil;aise.</p>', 'Politique', 2, 'ManuelValls.jpg', '2', 3, '2016-09-11 13:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `professeurs`
--

CREATE TABLE IF NOT EXISTS `professeurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `titre` varchar(12) NOT NULL,
  `courriel` varchar(128) NOT NULL,
  `diplome` varchar(128) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `adresse` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `professeurs`
--

INSERT INTO `professeurs` (`id`, `nom`, `prenom`, `titre`, `courriel`, `diplome`, `institution`, `adresse`, `password`, `last_login`, `user_id`, `created`) VALUES
(1, 'Veylit', 'Alain', 'Dr', 'Alain.Veylit@csusb.edu', 'PhD', 'CSUSB', 'UH 401.36', 's0silla1', '2016-01-29 11:33:00', 3, 1454096042),
(2, 'Calambour', 'Julien', 'M.', 'alain@musickshandmade.com', 'Maitrise', 'University of Redlands', 'Bureau #415', 'gibberish', '2016-01-29 15:26:00', 4, 1454110029);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `occupation` varchar(160) DEFAULT NULL,
  `major` varchar(64) NOT NULL,
  `minor` varchar(64) NOT NULL,
  `instrument` varchar(128) DEFAULT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(32) NOT NULL,
  `region` varchar(32) DEFAULT '',
  `ZIP` varchar(12) NOT NULL,
  `country` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `image_id` int(11) unsigned NOT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `avatar_dir` varchar(32) NOT NULL,
  `avatar_type` varchar(32) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `modified` datetime DEFAULT NULL,
  `notes` text,
  `notify` tinyint(1) DEFAULT '1',
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `donations` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=589 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `occupation`, `major`, `minor`, `instrument`, `birthday`, `address`, `city`, `region`, `ZIP`, `country`, `phone`, `image_id`, `avatar`, `avatar_dir`, `avatar_type`, `user_id`, `modified`, `notes`, `notify`, `public`, `donations`) VALUES
(571, 'Alain Veylit', '0', 'Francais', 'Informatique', NULL, '1955-08-18', '820 Apache Trail', 'Riverside', 'Californie', '92507', 'Etats-Unis', '951-786-9689', 0, 'versailles.jpeg', '571', 'image/jpeg', 3, '2016-09-16 23:18:28', '<p>Je suis le Dr Alain Veylit et j''enseignerai le cours de Fran&ccedil;ais III&nbsp;&agrave; Redlands au printemps 2016 en remplacement de Francis Bright, qui sera en ann&eacute;e sabbatique.</p>\r\n<p>Je suis n&eacute; en France,&nbsp;&agrave; Poitiers, dans le centre ouest du pays. Aujourd''hui, Poitiers est une ville de moyenne importance, mais elle fut tr&egrave;s importante ... il y a mille ans! Parmi ses personnalit&eacute;s, on compte un saint, Saint Hillaire, un &eacute;crivain important de la Renaissance, Rabelais, et un philosophe moderne, <a title="Michel Foucault - Wiki" href="https://en.wikipedia.org/wiki/Michel_Foucault" target="_blank">Michel Foucault</a>. El&eacute;onore d''Aquitaine y a tenu sa cour avant d''&eacute;pouser le roi de France d''abord, puis le roi d''Angleterre. Elle nous a laiss&eacute; de beaux monuments et une guerre qui dura cent ans...</p>\r\n<p>Ma famille vint ensuite s''installer dans le Bordelais, o&ugrave; je finis mes ann&eacute;es de lyc&eacute;e. Bordeaux est une tr&egrave;s belle ville (la plus belle d''Europe selon Stendhal), qui doit sa fortune&nbsp;&agrave; ses vins tr&egrave;s reput&eacute;s d''une part, et au commerce triangulaire qui au XXVIII&egrave;me siecle consistait &agrave; acheter des esclaves en Afrique, afin de les revendre contre du sucre en Am&eacute;rique. Heureusement cette &eacute;poque est r&eacute;volue depuis longtemps. Apr&egrave;s une maitrise de litt&eacute;rature&nbsp;&agrave; l''universit&eacute; de Bordeaux, je suis parti pour l''universit&eacute; de Californie,&nbsp;&agrave; Davis, ou j''ai &eacute;t&eacute; lecteur de litt&eacute;rature am&eacute;ricaine.</p>\r\n<p>J''ai ensuite enseign&eacute; dans un lyc&eacute;e en France, puis j''ai &eacute;t&eacute; lecteur de fran&ccedil;ais&nbsp;&agrave; Amherst, dans le Massachussetts, avant de commencer un doctorat de litt&eacute;rature compar&eacute;e&nbsp;&agrave; l''universit&eacute; de Californie,&nbsp;&agrave; Riverside. Pendant trois ans, j''ai eu la chance de participer en tant qu''assistant&nbsp;&agrave; un programme de maitrise de fran&ccedil;ais offert par l''universit&eacute; de Californie,&nbsp;&agrave; Santa Barbara. Ce programme permet&nbsp;&agrave; des &eacute;tudiants et enseignants d''obtenir leur maitrise en trois &eacute;t&eacute;s en immersion totale. C''est&nbsp;&agrave; dire que l''anglais est totalement interdit. Les cours sont assur&eacute;s par des professeurs d''universit&eacute; venus de France.</p>\r\n<p>J''ai &eacute;t&eacute; traducteur et &eacute;diteur dans le Michigan, o&ugrave; j''ai aussi enseign&eacute; une classe de traduction&nbsp;&agrave; l''universit&eacute; de Kalamazoo. Il y faisait tr&egrave;s froid.&nbsp; Pendant mon doctorat, j''ai commenc&eacute; &agrave; travailler comme bibliographe pour un projet qui s''appelle le <em>English Short-Title Catalog</em>, qui est un recensement de tous livres anglais publi&eacute;s depuis 1475 jusqu''&agrave; 1800. Ce travail gigantesque continue encore aujourd''hui et il a presque cent ans!</p>\r\n<p>Gr<span class="st">&acirc;</span>ce&nbsp;&agrave; ce projet, j''ai pu aller travailler&nbsp;&agrave; la British Library&nbsp;&agrave; Londres pendant un an et demi. J''y ai enseign&eacute; un cours de bibliographie historique pour adultes&nbsp;&agrave; University College, et un s&eacute;minaire sur le m&ecirc;me sujet &agrave; l''Universit&eacute; de Londres. Mon bureau&nbsp;&agrave; la British Library (qui faisait encore partie du British Museum) se situait juste un peu au dessus des momies Egyptiennes et tous les jours je passais devant la fameuse pierre de Rosette.</p>\r\n<p>A cette &eacute;poque, j''ai commenc&eacute; &agrave; m''int&eacute;resser&nbsp;&agrave; l''informatique et&nbsp;&agrave; apprendre la programmation. Revenu en Californie, j''ai continu&eacute; &agrave; travailler sur ce m&ecirc;me projet de bibliographie, mais cette fois en tant que programmeur et informaticien. A la fin de mon contrat, j''ai travaill&eacute; pour la biblioth&egrave;que des Claremont Colleges en tant que programmeur pour leur division de biblioth&egrave;que num&eacute;rique.</p>\r\n<p>Depuis 3 ans, je travaille surtout&nbsp;&agrave; mon compte sur divers projets, dont un projet de logiciel pour musique ancienne. C''est &agrave; dire que je ne suis pas riche.</p>\r\n<p>Je suis mari&eacute; et j''ai deux filles, Chlo&eacute; et Lara. Chlo&eacute; travaille&nbsp;&agrave; San Francisco chez Pearson Publishing, et Lara fait actuellement une maitrise de zoologie&nbsp;&agrave; l''Universit&eacute; d''Oxford.</p>\r\n<p>Il y a un an et demi, j''ai acquis un nouveau hobby: je fais mon pain - parce que le pain am&eacute;ricain est tout simplement d&eacute;gueulasse (&agrave; part&nbsp;&agrave; San Francisco).</p>\r\n<p><strong>J''aime:</strong> la bonne nourriture et les vins fins, la musique classique ancienne, passer du temps en famille et entre amis, l''informatique (parfois, quand ca n''est pas trop frustrant ).</p>\r\n<p><strong>Je n''aime pas:</strong> les t&eacute;l&eacute;phones soit-disant intelligents, les gens born&eacute;s et &eacute;videmment, le pain am&eacute;ricain industriel.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 1, 1, 0),
(586, 'George Calambour', '1', 'Francais', '', NULL, '0000-00-00', '820 Apache Trail', 'Riverside', 'Californie', '', 'USA', '', 0, 'arcadelt.jpg', '586', 'image/jpeg', 19, '2016-09-16 11:41:44', '<p>Je suis un etudiant dans votre classe</p>', 1, 1, 0),
(588, 'Jeannot Lagaudie', 'Freshman', '', '', NULL, '1998-01-20', '', 'Riverside', '', '', 'USA', '', 0, 'Francois_Hollande_2015.jpeg', '588', 'image/jpeg', 21, '2016-09-16 11:21:43', '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `note` varchar(255) NOT NULL,
  `index` smallint(2) unsigned NOT NULL,
  `quiz_id` smallint(4) unsigned NOT NULL,
  `image` varchar(64) NOT NULL,
  `image_dir` varchar(64) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `text`, `note`, `index`, `quiz_id`, `image`, `image_dir`, `image_url`, `created`) VALUES
(1, '<p>Paul a d&eacute;pens&eacute; tout son argent. Quand Catherine lui demande 2 euros pour prendre un caf&eacute;, il lui dit: "D&eacute;sol&eacute; pour le caf&eacute;, mais je n''ai plus&nbsp; [ ... ]!"</p>', '', 1, 1, 'super-dupont2.jpg', '1', 'http://www.primeale.fr/wp-content/uploads/2015/11/radis.jpg', '2012-03-19 18:49:02'),
(2, '<p>Jacques est d''une timidit&eacute; maladive. Chaque fois qu''une fille lui adresse la parole, il bafouille, il balbutie et il devient imm&eacute;diatement rouge comme une&nbsp; [ ... ]</p>', '', 2, 1, '0', '', 'https://elefectorayleigh.files.wordpress.com/2012/07/juicy-tomato-0509-lg-75860228.jpg', '2012-03-19 18:51:23'),
(3, '<p>Jean a grandi d''un bon m&egrave;tre depuis sa pubert&eacute;, et vu qu''il est maigre comme un clou, on dirait une vraie [ ... ]</p>', '', 3, 1, '0', '', '0', '2012-03-29 18:27:25'),
(4, '<p>Nicole est une vraie [ ... ] . Elle a donn&eacute; deux heures de colle&nbsp;&agrave; Robert juste parce qu''il parlait en classe. Tu te rends compte!</p>', 'truie=femelle du cochon', 1, 3, 'vache.jpg', '4', '0', '2016-01-07 16:19:48'),
(5, '<p>On est all&eacute; chez MacDo&nbsp;&agrave; midi. Dominique s''en est mis plein l''estomac, mais comme il mange comme un [ ... ], sa chemise est maintement pleine de ketchup!</p>', '', 2, 3, '0', '', '0', '2016-01-07 17:26:02'),
(6, '<p>Jean est tomb&eacute; de sa bicyclette! Il a voulu faire le malin, mais il a lach&eacute; le guidon au mauvais moment sur un cahot et il est tomb&eacute; dans les [ ... ]</p>', '', 4, 1, '0', '', '0', '2016-01-09 20:37:16'),
(7, '<p>Corrine a &eacute;t&eacute; tr&egrave;s malade. Elle avait de la fi&egrave;vre mais elle a insist&eacute; malgr&eacute; tout pour passer son examen. R&eacute;sultat, dix minutes apr&egrave;s le debut de l''examen, elle est tomb&eacute;e dans les [ ... ] et il a fallu l''emmener&nbsp;&agrave; l''hopital de toute urgence.</p>', '', 5, 1, '0', '', '0', '2016-01-09 21:21:40'),
(8, '<p>Avec Jean-Marie, on est all&eacute; au cinoche voir le dernier film de Depardieu. Quelle d&eacute;ception! C''est un [ ... ] pas possible!</p>', '', 6, 1, '0', '', '0', '2016-01-09 21:25:14'),
(9, '<p>Cette ann&eacute;e, les robes &agrave; rayures et les marini&egrave;res ne sont plus du tout&nbsp;&agrave; la mode. On est revenu&nbsp;&agrave; l''&eacute;poque des pull-overs&nbsp;&agrave; [ ... ]. Quelle mis&egrave;re!</p>', '', 7, 1, '0', '', '0', '2016-01-09 21:30:45'),
(10, '<p>Tu te souviens, Zidane pendant la coupe du monde, il a mis une sacr&eacute;e [ ... ] dans le ballon, mais malgr&eacute; ca, le gardien a arr&ecirc;t&eacute; son tir. Quel coup de chance pour l''Italie!</p>', '', 8, 1, 'croquants.jpeg', '10', '0', '2016-01-09 21:34:07'),
(11, '<p>Jules n''a pas fait attention a ce que disait le professeur et il a oubli&eacute; de faire son devoir a temps. Quel [ ... ] celui-l&agrave;!</p>', '', 9, 1, '0', '', '0', '2016-01-09 21:37:05'),
(12, '<p>Quand je me l&egrave;ve le matin, c''est la catastrophe. Il me faut au moins une demi-heure pour me peigner, avec toutes les [ ... ] que j''ai dans les cheveux.</p>', '', 10, 1, '0', '', '0', '2016-01-09 21:40:14'),
(13, '<p>Ca fait deux heures que j''attends le train, je te jure que j''en marre de faire le [ ... ] sur le quai</p>', '', 11, 1, '0', '', '0', '2016-01-09 21:44:09'),
(14, '<p>Tiens, tu ne portes plus de lunettes? Tu as finalement d&eacute;cid&eacute; de porter des [ ... ] de contact?</p>', '', 12, 1, '0', '', '0', '2016-01-09 21:48:36'),
(15, '<p>Je suis malade! J''ai une fi&egrave;vre de [ ... ] et je ne veux pas aller&nbsp;&agrave; l''&eacute;cole aujourd''hui! Voil&agrave;, c''est tout.</p>', '', 3, 3, '0', '', '0', '2016-01-09 21:58:40'),
(16, '<p>Ca fait au moins 6 heures que je n''ai rien mang&eacute;! J''ai une faim de [ ... ]!</p>', '', 4, 3, '0', '', '0', '2016-01-09 22:22:19'),
(17, '<p>Je n''ai pas r&eacute;ussi le test de maths qui &eacute;tait vraiment trop difficile. Du coup, j''ai re&ccedil;u une [ ... ] et je ne pourrai pas passer au niveau sup&eacute;rieur avant l''ann&eacute;e prochaine.</p>', '', 13, 1, '0', '', '0', '2016-01-10 17:43:37'),
(18, '<p>J&eacute;r&eacute;mie ne veut rien faire du tout. Tout est trop fatigant, m&ecirc;me regarder la t&eacute;l&eacute; est trop d''effort pour lui! Il est faignant comme un [ ... ]</p>', '', 5, 3, '0', '', '0', '2016-01-10 18:20:49'),
(19, '<p>On ne dit pas un "computer" mais un [ ... ]</p>', '', 1, 4, 'ordinateur.jpeg', '19', '0', '2016-01-10 19:43:33'),
(20, '<p>On ne dit pas un Kindle mais une [ ... ]</p>', '', 2, 4, 'kindle.jpeg', '20', '0', '2016-01-10 19:44:34'),
(21, '<p>On ne dit pas un smart phone, mais un [ ... ]</p>', '', 3, 4, '', '', '0', '2016-01-10 19:47:22'),
(22, '<p>On n''ecrit pas ''l.o.l'' dans un texto, mais [ ... ]</p>', '', 4, 4, '', '', '0', '2016-01-10 19:53:54'),
(23, '<p>Sans une [ ... ] pour bouger le curseur sur l''&eacute;cran, on est coinc&eacute; sous Windows, alors que sous LINUX on peut toujours se d&eacute;brouiller en tapant les commandes</p>', '', 5, 4, 'rats.jpg', '23', '0', '2016-01-10 19:57:14'),
(24, '<p>Le [ ... ] Windows 10 est un retour en arri&egrave;re par rapport&nbsp;&agrave; Windows 7&nbsp;&agrave; mon humble avis</p>', '', 6, 4, 'windows10.jpeg', '24', '0', '2016-01-10 20:08:06'),
(25, '<p>C''est quoi ce [ ... ] sur ta machine qui te permet de faire ces jolis dessins en 3 dimensions?</p>', '', 7, 4, '', '', '0', '2016-01-10 20:12:25'),
(26, '<p>Qui [ ... ]&nbsp; ouvert la porte pour laisser rentrer le chat?</p>', '', 1, 5, '', '', '0', '2016-01-10 23:01:28'),
(27, '<p>Pourquoi vous [ ... ]-vous cach&eacute;s quand je suis arriv&eacute;?</p>', '', 2, 5, '', '', '0', '2016-01-10 23:03:29'),
(28, '<p>Le pr&eacute;sident [ ... ] re&ccedil;u le nouvel ambassadeur aujourd''hui</p>', '', 3, 5, '', '', '0', '2016-01-10 23:04:28'),
(29, '<p>Le chauffeur s''[ ... ] arr&ecirc;t&eacute; brusquement pour &eacute;viter un accident catastrophique!</p>', '', 4, 5, '', '', '0', '2016-01-10 23:08:57'),
(30, '<p>[ ... ]-vous mont&eacute; en haut de la Tour de Pise? J''en ai fait l''ascension il y a 6 mois et l''escalier est plut<span class="st"><em>&ocirc;</em></span>t raide, je vous prie de me croire!</p>', '', 5, 5, '', '', '0', '2016-01-10 23:12:35'),
(31, '<p>A Paris, nous nous [ ... ] promen&eacute;s le long de la Seine.</p>', '', 6, 5, '', '', '0', '2016-01-10 23:13:37'),
(32, '<p>Ils ont une belle pelouse, mais ils [ ... ] interdit aux enfants de marcher dessus</p>', '', 7, 5, '', '', '0', '2016-01-10 23:14:51'),
(33, '<p>Elle [ ... ] descendue au sous-sol</p>', '', 8, 5, '', '', '0', '2016-01-10 23:33:08'),
(34, '<p>Elle [ ... ] descendu une chaise au sous-sol</p>', '', 9, 5, '', '', '0', '2016-01-10 23:33:45'),
(35, '<p>Le politicien [ ... ] retourn&eacute; sa veste encore une fois avant les &eacute;lections</p>', '', 10, 5, '', '', '0', '2016-01-10 23:35:00'),
(36, '<p>Nous [ ... ] retourn&eacute;s &agrave; Paris en 2012.</p>', '', 11, 5, '', '', '0', '2016-01-10 23:36:26'),
(37, '<p>Il [ ... ] pass&eacute; par ici, pas par l&agrave;...</p>', '', 12, 5, '', '', '0', '2016-01-10 23:37:29'),
(38, '<p>Il [ ... ] pass&eacute; un mauvais quart d''heure au poste de police quand il s''est fait prendre.</p>', '', 13, 5, '', '', '0', '2016-01-10 23:39:13'),
(39, '<p>&nbsp;[ ... ] pass&eacute; par Narbonne pour aller en Espagne.</p>', '', 14, 5, '', '', '0', '2016-01-10 23:40:50'),
(40, '<p>Le 12 avril dernier, ils se sont [ ... ] au volant de leur v&eacute;hicule.</p>', '', 15, 5, '', '', '0', '2016-01-11 08:40:29'),
(42, '<p>Les t&acirc;ches [ ... ] ne sont plus&nbsp;&agrave; faire!<em><strong><br /></strong></em></p>', '', 2, 6, '', '', '0', '2016-01-11 09:41:46'),
(43, '<p>La lumi&egrave;re dans le couloir est [ ... ].</p>', '', 3, 6, '', '', '0', '2016-01-11 09:43:45'),
(44, '<p>Elle a [ ... ] la lampe dans sa chambre</p>', '', 4, 6, '', '', '0', '2016-01-11 09:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `description` text COLLATE utf8_roman_ci NOT NULL,
  `ccode` varchar(24) COLLATE utf8_roman_ci NOT NULL,
  `lesson_id` int(10) unsigned NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `language` varchar(32) COLLATE utf8_roman_ci NOT NULL,
  `type` varchar(32) COLLATE utf8_roman_ci NOT NULL,
  `difficulty` varchar(32) COLLATE utf8_roman_ci NOT NULL,
  `discipline` varchar(64) COLLATE utf8_roman_ci NOT NULL,
  `category_id` smallint(4) unsigned DEFAULT NULL,
  `show_tips` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `image_dir` varchar(48) COLLATE utf8_roman_ci NOT NULL,
  `image_size` int(11) NOT NULL,
  `image_type` varchar(48) COLLATE utf8_roman_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `description`, `ccode`, `lesson_id`, `cours_id`, `language`, `type`, `difficulty`, `discipline`, `category_id`, `show_tips`, `image`, `image_dir`, `image_size`, `image_type`, `image_url`, `creator`, `created`) VALUES
(1, 'Les fruits et lÃ©gumes', '<p><strong>Questionnaire portant sur des expressions courantes qui comportent le nom d''un l&eacute;gume ou d''un fruit.</strong></p>\r\n<p>La France est le pays de la gastronomie, et il n''y a pas de gastronomie sans fruits et l&eacute;gumes, bien &eacute;videmment! Les francais sont tellement attach&eacute;s&nbsp;&agrave; leurs v&eacute;g&eacute;taux et&nbsp;&agrave; leurs potagers, que ceux-ci ont p&eacute;n&eacute;tr&eacute; le langage courant avec une multitude d''expressions imag&eacute;es, mais pas toujours &eacute;videntes.</p>\r\n<p>Saurez-vous deviner quelle plante se cache sous les expressions qui suivent?</p>', '', 1, 0, '', 'Expressions familiÃ¨res', '1', 'French', 3, 0, 'legumes.jpeg', '1', 16064, 'image/jpeg', 'https://upload.wikimedia.org/wikipedia/commons/e/e7/Various_legumes.jpg', 3, '2012-03-18 13:57:06'),
(5, 'Participe passÃ© - auxilaires', '<p>&nbsp;</p>\r\n<p>La plupart des verbes prennent l''auxiliaire <em>avoir</em> au pass&eacute; compos&eacute; et dans les autres temps compos&eacute;s, comme le plus-que-parfait, par exemple.</p>\r\n<p>Les verbes intransitifs de mouvement, ainsi que les verbes pronominaux, prennent l''auxiliaire <em>&ecirc;tre.</em></p>\r\n<p><em>Les verbes pronominaux sont les verbes qui se conjuguent avec <strong>un pronom r&eacute;fl&eacute;chi de la m&ecirc;me personne que le sujet</strong>.</em></p>\r\n<p><em><strong>Attention:</strong> certains verbes peuvent <em>&ecirc;tre pronominaux ou pas, selon le cas. Si le pronom est r&eacute;fl&eacute;chi, ils prennent l''auxiliaire <em>&ecirc;tre</em>, sinon l''auxiliaire <em>avoir</em>.</em></em></p>\r\n<p>Exemple:<em><em> Elle s''est lav&eacute;e apr&egrave;s avoir lav<em><em>&eacute;</em></em> le chien.</em></em></p>\r\n<p>Attention aussi: certains verbes peuvent &ecirc;tre transitifs ou intransitifs selon le cas.</p>\r\n<p>Exemple:<em> Il a mont&eacute; une machine infernale. Il est mont&eacute;&nbsp;&agrave; cheval sur la barri&egrave;re.</em></p>\r\n<p>Choisissez le bon auxiliare dans le test suivant!</p>\r\n<p style="text-align: right;"><a href="http://la-conjugaison.nouvelobs.com/regles/grammaire/les-verbes-pronominaux-32.php" target="_blank">En savoir plus ...</a></p>', '', 2, 0, '', 'Exercice', '', '', 1, 0, '', '', 0, '', '', 3, '2016-01-10 22:57:52'),
(6, 'Participe passÃ© - accords', '<h3>Quand faut-il faire l''accord du participe pass&eacute;?</h3>\r\n<p>Quand il est employ&eacute; comme <a href="http://la-conjugaison.nouvelobs.com/regles/grammaire/les-fonctions-de-l-adjectif-128.php">adjectif &eacute;pith&egrave;te ou attribut</a>, le <em><a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/participe-passe-1.php">participe pass&eacute;</a></em> s''accorde en genre et en nombre avec le sujet auquel il se rapporte. <br /> <em>Exemple : un &ecirc;tre aim<strong>&eacute;</strong> / des t&acirc;ches fin<strong>ies</strong></em></p>\r\n<p><em>Le <a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/participe-passe-1.php">participe pass&eacute;</a> employ&eacute; avec le verbe <a href="http://la-conjugaison.nouvelobs.com/du/verbe/etre.php">&ecirc;tre</a> ou avec un <a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/les-verbes-d-etat-162.php">verbe d''&eacute;tat</a> (<a href="http://la-conjugaison.nouvelobs.com/du/verbe/paraitre.php">para&icirc;tre</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/sembler.php">sembler</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/demeurer.php">demeurer</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/devenir.php">devenir</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/rester.php">rester</a>, ...) s''accorde en genre et en nombre avec le sujet.<br /> <em>Exemple : La lumi&egrave;re est allum<strong>&eacute;e</strong>. / La lumi&egrave;re reste &eacute;tein<strong>te</strong>.</em></em></p>\r\n<p>Le <a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/participe-passe-1.php">participe pass&eacute;</a> employ&eacute; avec le verbe <a href="http://la-conjugaison.nouvelobs.com/du/verbe/avoir.php">avoir</a> s''accorde avec son C.O.D. seulement si le <a href="http://la-conjugaison.nouvelobs.com/regles/grammaire/le-complement-d-objet-direct-cod-84.php">compl&eacute;ment d''objet direct (C.O.D.)</a> est plac&eacute; devant le verbe. <br /> <em>Exemple : Les fleurs qu''ils ont cueill<strong>ies</strong> &eacute;taient ravissantes. Jean les a mi<strong>ses</strong> dans un vase de marbre blanc.<br /></em></p>\r\n<p>&nbsp;</p>\r\n<h3><em>Verbes pronominaux:</em></h3>\r\n<p><em><strong>1. </strong>Le <a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/participe-passe-1.php">participe pass&eacute;</a> s''accorde avec le sujet du verbe, lorsque <strong>le sujet fait l''action sur lui m&ecirc;me</strong>.<br /> <em>Exemples : Ils se sont aper&ccedil;<strong>us</strong> de leur erreur. / Ils se sont lav<strong>&eacute;s</strong>. / Ils se sont batt<strong>us</strong>. </em></em></p>\r\n<p><strong>Les cas de non-accord <br /></strong> <strong>1. </strong>Le <a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/participe-passe-1.php">participe pass&eacute;</a> ne s''<strong>accorde pas</strong> lorsque le <a href="http://la-conjugaison.nouvelobs.com/regles/grammaire/le-complement-d-objet-direct-cod-84.php">C.O.D.</a> <strong>suit le verbe</strong>. <br /> <em>Exemples : Ils se sont lav<strong>&eacute;</strong> les mains. / Ils se sont &eacute;cr<strong>it</strong> des lettres./ Ils se sont r&eacute;part<strong>i</strong> tous les billets.</em></p>\r\n<p><em>Le <a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/participe-passe-1.php">participe pass&eacute;</a> ne s''accorde pas lorsque le verbe pronominal r&eacute;fl&eacute;chi ou r&eacute;ciproque <strong>admet un</strong> <a href="http://la-conjugaison.nouvelobs.com/regles/grammaire/le-complement-d-objet-indirect-coi-85.php">C.O.I</a>.<br /> Les <a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/participe-passe-1.php">participes pass&eacute;s</a> des verbes suivants sont invariables :<br /> <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_plaire.php">se plaire</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_complaire.php">se complaire</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_deplaire.php">se d&eacute;plaire</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_rire.php">se rire</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_convenir.php">se convenir</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_nuire.php">se nuire</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_mentir.php">se mentir</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/s-en-vouloir.php">s''en vouloir</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_ressembler.php">se ressembler</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_sourire.php">se sourire</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_suffire.php">se suffire</a>, <a href="http://la-conjugaison.nouvelobs.com/du/verbe/se_survivre.php">se survivre</a>. (Note: tous ces verbes sont intransitifs, et ils n''acceptent pas de C.O.D.)<br /> <em>Exemples : Ils se sont pl<strong>u.</strong> / Ils se sont d&eacute;pl<strong>u</strong> dans cet appartement. / Elles se sont r<strong>i</strong> de son erreur. </em></em></p>\r\n<h3>&nbsp;Verbes impersonnels:</h3>\r\n<p>Le <a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/participe-passe-1.php">participe pass&eacute;</a> d''un <a href="http://la-conjugaison.nouvelobs.com/regles/conjugaison/les-verbes-defectifs-155.php">verbe impersonnel</a> est toujours <strong>invariable</strong>.<br /> <em>Exemples : Quelle patience il nous a fall<strong>u</strong>! / Quelle chaleur il a fai<strong>t</strong> !</em>&nbsp;</p>\r\n<p>&nbsp;</p>', '', 2, 0, '', 'Exercice', '', '', 1, 0, 'handshake.png', '6', 5934, 'image/png', '', 3, '2016-01-11 08:51:52'),
(7, 'Le Participe prÃ©sent', '', '', 3, 0, '', 'Exercice', '', '', 1, 0, 'Participe_present.jpg', '7', 12278, 'image/jpeg', '', 3, '2016-01-16 18:30:58'),
(8, 'Le Participe prÃ©sent', '', '', 3, 0, '', 'Exercice', '', '', 1, 0, 'Participe_present.jpg', '8', 12278, 'image/jpeg', '', 3, '2016-01-16 18:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_instances`
--

CREATE TABLE IF NOT EXISTS `quiz_instances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quiz_instances`
--

INSERT INTO `quiz_instances` (`id`, `points`, `quiz_id`, `user_id`, `score`, `created`) VALUES
(1, 12, 1, 19, 92, '2016-09-17 10:16:07'),
(2, 0, 1, 3, 0, '2016-09-17 12:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `ressources`
--

CREATE TABLE IF NOT EXISTS `ressources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(128) NOT NULL,
  `medium` varchar(64) NOT NULL,
  `focus` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `ccode` varchar(24) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_dir` varchar(32) NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ressources`
--

INSERT INTO `ressources` (`id`, `titre`, `medium`, `focus`, `description`, `cours_id`, `ccode`, `image`, `image_dir`, `creator`, `created`) VALUES
(1, 'Saint-Germain-des-PrÃ©s ', 'Wikipedia', 'GÃ©ographie', '<p>Le quartier Saint-Germain-des-Pr&eacute;s est le 24e quartier administratif de Paris situ&eacute; dans le 6e arrondissement, au bout de la rue de Rennes et autour de l''abbaye du m&ecirc;me nom.</p>\r\n<p>Ce quartier a acquis son &acirc;me gr&acirc;ce au pouvoir d''attraction qu&rsquo;il a exerc&eacute; sur les intellectuels depuis le XVIIe&nbsp;si&egrave;cle. Ces derniers, d&egrave;s lors qu&rsquo;ils passaient &agrave; Saint-Germain, y ont laiss&eacute; l&rsquo;empreinte de leur talent, marquant toujours plus en profondeur les rues d&rsquo;un sceau litt&eacute;raire. Les Encyclop&eacute;distes se r&eacute;unissaient au caf&eacute; Landelle2, rue de Buci ou au Procope qui existe toujours, de m&ecirc;me les futurs r&eacute;volutionnaires Marat, Danton, Guillotin qui habitaient le quartier.</p>\r\n<p>Apr&egrave;s la Seconde Guerre mondiale, le quartier de Saint-Germain-des-Pr&eacute;s est devenu un haut lieu de la vie intellectuelle et culturelle parisienne. Philosophes, auteurs, acteurs et musiciens se sont m&eacute;lang&eacute;s dans les bo&icirc;tes de nuit (o&ugrave; la France d&eacute;couvrait le bebop) et les brasseries, o&ugrave; la philosophie existentialiste a coexist&eacute; avec le jazz am&eacute;ricain, dans les caves de la rue de Rennes, que fr&eacute;quentaient notamment Boris Vian et les zazous. Le quartier est maintenant moins prestigieux sur le plan intellectuel qu''&agrave; la grande &eacute;poque de Jean-Paul Sartre et de Simone de Beauvoir, de la chanteuse embl&eacute;matique Juliette Gr&eacute;co ou des cin&eacute;astes tels que Jean-Luc Godard et Fran&ccedil;ois Truffaut mais aussi des po&egrave;tes comme Jacques Pr&eacute;vert et des artistes comme Alberto Giacometti et Bernard Quentin. Cependant les artistes y fl&acirc;nent toujours, appr&eacute;ciant l''ambiance du caf&eacute; Les Deux Magots ou du Caf&eacute; de Flore. &Agrave; la brasserie "Lipp" se r&eacute;unissent les journalistes, les acteurs en vue et les hommes politiques comme le faisait Fran&ccedil;ois Mitterrand</p>\r\n<p>&nbsp;<img class="inset" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Sidney_Bechet%2C_Freddie_Moore%2C_Lloyd_Phillips_%28Gottlieb_00521%29.jpg/250px-Sidney_Bechet%2C_Freddie_Moore%2C_Lloyd_Phillips_%28Gottlieb_00521%29.jpg" alt="" width="250" height="257" />Saint-Germain-des-Pr&eacute;s&nbsp;&eacute;tait un haut lieu du jazz, symbole d''une libert&eacute; d''expression &agrave; la fois politique et culturelle. En retour, les musiciens noirs am&eacute;ricains appr&eacute;ciaient l''absence de s&eacute;gr&eacute;gation raciale, comme ici Sydney Bechet, ou bien d''autres, comme Josephine Baker par exemple, qui devint une v&eacute;ritable star fran&ccedil;aise.</p>\r\n<p>Plusieurs caf&eacute;s du quartier acqu&eacute;rirent une c&eacute;l&eacute;brit&eacute; qui perdure jusqu''&agrave; nos jours, comme&nbsp; <a title="Les Deux Magots" href="https://en.wikipedia.org/wiki/Les_Deux_Magots">Les Deux Magots</a>, le <a title="Caf&eacute; de Flore" href="https://en.wikipedia.org/wiki/Caf%C3%A9_de_Flore">Caf&eacute; de Flore</a>, <a class="mw-redirect" title="Le Procope" href="https://en.wikipedia.org/wiki/Le_Procope">ou le Procope</a>, et la&nbsp; <a title="Brasserie Lipp" href="https://en.wikipedia.org/wiki/Brasserie_Lipp">Brasserie Lipp.<br /></a></p>\r\n<p>Un grand nombre de librairies et de maisons d''&eacute;ditions favorisaient aussi l''essort du quartier qui devint le centre du mouvement existentialiste, associ&eacute; &agrave; <a title="Jean-Paul Sartre" href="https://en.wikipedia.org/wiki/Jean-Paul_Sartre">Jean-Paul Sartre</a> and <a title="Simone de Beauvoir" href="https://en.wikipedia.org/wiki/Simone_de_Beauvoir">Simone de Beauvoir</a>.</p>\r\n<p>&nbsp;</p>\r\n<p>Les zazous:&nbsp;</p>\r\n<p>Christian Dior said of them: "Hats were far too large, skirts far too short, jackets far too long, shoes far too heavy... I have no doubt that this <em>zazou</em> style originated in a desire to defy the forces of occupation and the austerity of Vichy. For lack of other materials, feathers and veils, promoted to the dignity of flags, floated through Paris like revolutionary banners. But as a fashion I found it repellent."</p>\r\n<p>The Zazous were big fans of checkered patterns, on jacket, skirt or brolly. They started appearing in the vegetarian restaurants and developed a passion for grated <a title="Carrot salad" href="https://en.wikipedia.org/wiki/Carrot_salad">carrot salad</a>. They usually drank fruit juice or beer with <a title="Grenadine" href="https://en.wikipedia.org/wiki/Grenadine">grenadine</a> syrup, a cocktail that they seem to have invented.</p>\r\n<p><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Zazou_h_ill.png/200px-Zazou_h_ill.png" alt="" width="200" height="326" /></p>\r\n<p><a href="https://pbs.twimg.com/media/CeKDLPUWEAAB6JW.jpg" target="_blank"><img src="https://pbs.twimg.com/media/CeKDLPUWEAAB6JW.jpg" alt="" width="400" height="341" /></a></p>\r\n<p>https://pbs.twimg.com/media/CeKDLPUWEAAB6JW.jpg</p>', 2, '', 'Abbaye_de_Saint-Germain-des-PrÃ©s_140131_1.jpg', '1', 3, '2016-09-11 12:48:30'),
(2, 'BÃ©bÃ©s Ã  vendre', 'Journalisme', 'Civilisation', '<div class="text">\r\n<p><a href="http://www.liberation.fr/planete/2016/02/18/bebes-bulgares-a-vendre-le-commerce-de-la-misere-qui-rapporte-gros_1434201">B&eacute;b&eacute;s bulgares&nbsp;&agrave; vendre: un commerce de la mis&egrave;re qui peut rapporter gros</a></p>\r\n</div>\r\n<div class="row">&nbsp;</div>', 1, '', '852731-un-jeune-rom-porte-son-frere-dans-le-village-de-ekzarh-antimovo-le-4-fevrier-2016.jpg', '2', 3, '2016-09-11 13:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `resultats`
--

CREATE TABLE IF NOT EXISTS `resultats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` int(10) unsigned NOT NULL,
  `etudiant_id` int(10) unsigned NOT NULL,
  `taken` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `grade` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slideshow_id` int(10) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_dir` varchar(64) NOT NULL,
  `image_type` varchar(32) NOT NULL,
  `index` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `slideshow_id`, `image`, `image_dir`, `image_type`, `index`) VALUES
(13, 'Manuel Walls', 3, 'ManuelValls.jpg', '13', 'image/jpeg', 0),
(15, 'Fran&ccedil;ois Hollande', 3, 'Francois_Hollande_2015.jpeg', '15', 'image/jpeg', 0),
(17, 'Les champignons', 3, 'IMG_0715.JPG', '17', 'image/jpeg', 0),
(18, 'G&eacute;rard Depardieu', 3, 'Gerard Depardieu_1.jpg', '18', 'image/jpeg', 0),
(19, 'Catherine Deneuve', 3, 'catherine_deneuve_jeune.jpg', '19', 'image/jpeg', 0),
(20, 'L''Europe', 4, 'carte-europe-pays-1.jpg', '20', 'image/jpeg', 0),
(21, 'L''Afrique', 4, 'AFRIQUE-map-clic.png', '21', 'image/png', 0),
(22, 'L''Am&eacute;rique du Nord', 4, 'amerique-Nord-map-clic.png', '22', 'image/png', 0),
(23, 'L''Am&eacute;rique du Sud', 4, 'amerique-Sud-map-clic.png', '23', 'image/png', 0),
(24, 'L''AmÃ©rique Centrale et les Antilles', 4, 'antilles-map3.gif', '24', 'image/gif', 0),
(25, 'L''Asie', 4, 'ASIE-mapOK-clic.PNG', '25', 'image/png', 0),
(26, 'Oc&eacute;anie', 4, 'pacifique-map222.png', '26', 'image/png', 0),
(27, 'L''Antartique', 4, 'antarctique_2.jpg', '27', 'image/jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `lesson_id` int(10) unsigned NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_dir` varchar(32) NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `title`, `description`, `creator`, `lesson_id`, `cours_id`, `image`, `image_dir`, `modified`) VALUES
(3, 'Les visages', '<p>Les visages ont toutes les formes!</p>', 0, 0, 0, 'ManuelValls.jpg', '3', '2016-09-17 18:17:14'),
(4, 'GÃ©ographie de la francophonie', '<h3>Dans quels continents parle-t-on fran&ccedil;ais?</h3>\r\n<p><a href="http://www.axl.cefan.ulaval.ca/" target="_blank">Lien utile et tr&egrave;s d&eacute;taill&eacute; sur les langues du monde.</a> </p>', 0, 0, 0, 'carte_de_france.png', '4', '2016-09-18 12:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE IF NOT EXISTS `social_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `link` varchar(255) NOT NULL,
  `class` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `link`, `class`) VALUES
(1, 'Facebook', 'www.facebook.com', 'facebook'),
(2, 'Skype', 'www.skype.com', 'skype'),
(3, 'WEB', 'http://www.w3schools.com/html/', 'web'),
(4, 'LinkedIn', 'www.linkedin.com', 'linkedin'),
(5, 'WordPress', 'www.wordpress.com', 'wordpress'),
(6, 'RSS feed', 'www.rss.com', 'rss'),
(7, 'YouTube', 'www.youtube.com', 'youtube'),
(8, 'Twitter', 'www.twitter.com', 'twitter'),
(9, 'Vimeo', 'www.vimeo.com', 'vimeo'),
(10, 'Google+', 'https://plus.google.com/up/search', 'google-plus'),
(11, 'Reddit', 'www.reddit.com', 'reddit');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

CREATE TABLE IF NOT EXISTS `social_media_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) unsigned NOT NULL,
  `social_media_id` int(10) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `document_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `test_date` datetime DEFAULT NULL,
  `lesson_id` int(10) unsigned NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `ccode` varchar(24) NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tiles`
--

CREATE TABLE IF NOT EXISTS `tiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_link` varchar(255) NOT NULL,
  `tile_group_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `group` varchar(32) NOT NULL,
  `element` varchar(64) NOT NULL,
  `ajax` varchar(48) NOT NULL DEFAULT 'text',
  `creator` int(10) unsigned NOT NULL,
  `index` int(10) unsigned NOT NULL,
  `couleur_id` int(11) NOT NULL,
  `full_row` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tiles`
--

INSERT INTO `tiles` (`id`, `title`, `title_link`, `tile_group_id`, `description`, `group`, `element`, `ajax`, `creator`, `index`, `couleur_id`, `full_row`, `active`) VALUES
(1, 'Les devoirs', '', 1, '<p>description...</p>', '', '', 'text', 3, 3, 1, 0, 1),
(7, 'Lecture', '', 1, '<p>La lecture c''est bon pour la sant&eacute;</p>', '', '', 'text', 3, 2, 3, 0, 1),
(8, 'Lectures du cours 202', '', 4, '<p>Valerie Giscard d''Estaing: La France en f&ecirc;te</p>', '', '', 'text', 3, 1, 5, 0, 1),
(9, 'Devoirs', '', 4, '<p>Les devoirs</p>', '', '', 'text', 3, 2, 4, 0, 1),
(10, 'Troisieme colonne de livre 202', '', 4, '<p>il y a du texte la-dedans</p>', '', '', 'text', 3, 3, 1, 0, 1),
(11, 'Atterissage franÃ§ais 102', '', 3, '<p><img class="inset" src="http://www.laits.utexas.edu/fi/sites/laits.utexas.edu.fi/files/Cover-FI_611-web.jpg" alt="" width="145" height="192" />Atterissage francais 102 - texte explicatif du cours - lien vers le syllabus</p>\r\n<p>Nous utiliserons le livre:<strong> Le fran&ccedil;ais interactif</strong>, qui est aussi disponible au t&eacute;l&eacute;chargement ici en format PDF.</p>\r\n<p>&nbsp;</p>', '', '', 'text', 3, 6, 9, 1, 1),
(12, 'Pepper et Carrot ', 'http://www.peppercarrot.com/fr/article369/episode-16-the-sage-of-the-mountain', 5, '<p><img class="inset" src="http://www.peppercarrot.com/themes/peppercarrot-theme_v2/img/followbackground_patreon_illu.jpg" alt="" width="50%" />Pepper et Carrot est une bande dessin&eacute;e enti&egrave;rement financ&eacute;e par les r&eacute;seaux sociaux. Ces aventures ont atteint un certain niveau de c&eacute;l&eacute;brit&eacute; et elles sont maintenant disponibles en format livre dans le commerce, ce qui a caus&eacute; bien des &eacute;motions parmi les&nbsp; partisans de la libert&eacute; de l''Internet. Etes-vous pour ou contre? </p>', '', '', 'text', 3, 7, 4, 1, 1),
(13, 'Rencontrez votre professeur!', '', 3, '<p>Lire la <a href="http://fcsusb/profiles/view/571">biographie de M. Alain Veylit</a>, qui enseignera les cours de fran&ccedil;ais 102 et 202 &agrave; l''automne 2016. </p>', '', '', 'text', 3, 8, 1, 0, 1),
(14, 'TÃ©lÃ©chargez le plan du cours', '', 3, '<p>Acc&eacute;dez au plan du cours <a href="http://fcsusb/documents/preview/4">en format PDF</a> ou au d&eacute;tail des <a href="http://fcsusb/lessons">le&ccedil;ons</a> en format HTML.</p>', '', '', 'text', 3, 9, 2, 0, 1),
(15, 'Pages de vocabulaire', '', 3, '<p>Des <a href="http://fcsusb/categories/view/4">pages de vocabulaire</a> seront mises &agrave; votre disponibilit&eacute; comme la page sur le <a href="http://fcsusb/pages/informatique">Vocabulaire informatique</a></p>', '', '', 'text', 3, 10, 5, 0, 0),
(16, 'Pourquoi le franÃ§ais?', 'https://www.google.fr/maps', 1, '<p><strong>Dans quels pays parle-t-on fran&ccedil;ais?</strong> Combien de gens dans le monde parlent fran&ccedil;ais? Quels sont les pays francophones? Qu''est ce que la francophonie?</p>\r\n<p>Voir la carte: <a href="http://www.tv5monde.com/cms/userdata/c_bloc/231/231409/205087_vignette_carte-de-la-francophonie.jpg"><img src="http://www.francophonie.org/IMG/jpg/carto-denombrement.jpg" alt="Carte de la francophonie" /></a></p>\r\n<p>&nbsp;</p>\r\n<p>La population totale des pays ayant le fran&ccedil;ais pour langue officielle (444 millions) ou couramment utilis&eacute;e mais pas officielle (98 millions) est de <strong>542 millions d''habitants en 2016</strong>, ce qui repr&eacute;sente le <abbr title="Quatri&egrave;me">4e</abbr> <a title="Espaces linguistiques" href="https://fr.wikipedia.org/wiki/Espaces_linguistiques">espace linguistique</a> au monde apr&egrave;s l''<a title="Liste des pays ayant l''anglais pour langue officielle" href="https://fr.wikipedia.org/wiki/Liste_des_pays_ayant_l%27anglais_pour_langue_officielle">anglais</a>, le chinois (mandarin) et le hindi, et devant ceux de l''<a title="Liste des pays ayant l''espagnol pour langue officielle" href="https://fr.wikipedia.org/wiki/Liste_des_pays_ayant_l%27espagnol_pour_langue_officielle">espagnol</a>, de l''<a title="Liste des pays ayant l''arabe pour langue officielle" href="https://fr.wikipedia.org/wiki/Liste_des_pays_ayant_l%27arabe_pour_langue_officielle">arabe</a> et du <a title="Liste des pays ayant le portugais pour langue officielle" href="https://fr.wikipedia.org/wiki/Liste_des_pays_ayant_le_portugais_pour_langue_officielle">portugais</a>.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><a title="https://fr.wikipedia.org/wiki/Liste_des_pays_ayant_le_fran%C3%A7ais_pour_langue_officielle" href="https://fr.wikipedia.org/wiki/Liste_des_pays_ayant_le_fran%C3%A7ais_pour_langue_officielle" target="_blank">Voir le d&eacute;tail sur Wiki!</a></p>', '', '', 'text', 3, 1, 9, 1, 1),
(17, 'But du cours', '', 3, '<p>Emphasizes listening and speaking, with reading and writing as supporting skills. Students learn to formulate and respond to questions about their daily life, express preferences, as well as master the ability to list, enumerate, identify, compare, agree and disagree.</p>', '', '', 'text', 3, 12, 3, 0, 1),
(18, 'La mÃ©tÃ©o en France', 'http://www.meteofrance.com/accueil', 6, '<p><img src="/img/meteo.jpg" alt="" width="325" height="182" /></p>', '', '', 'text', 3, 13, 7, 0, 1),
(19, 'Les journeaux', 'http://www.liberation.fr/', 6, '<p><img src="http://s1.libe.com/newsite/images/logo-libe.svg" alt="" width="272" height="100" /></p>', '', '', 'text', 3, 14, 8, 0, 1),
(20, 'La Musique', 'https://www.youtube.com/watch?v=9RBzsjga73s', 6, '<p><iframe src="https://www.youtube.com/embed/9RBzsjga73s" width="100%" height="auto" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>', '', '', 'text', 3, 15, 1, 0, 1),
(21, 'Humour', 'http://www.legorafi.fr/', 6, '', '', '', 'text', 3, 16, 1, 0, 0),
(22, 'Humour', 'http://www.legorafi.fr/wp-content/uploads/2016/03/210316.jpg', 6, '<p><img src="http://www.legorafi.fr/wp-content/uploads/2016/03/210316.jpg" alt="" width="100%" /></p>', '', '', 'text', 3, 17, 1, 0, 0),
(23, 'Humour', 'http://www.legorafi.fr/wp-content/uploads/2016/03/210316.jpg', 6, '<p><img src="http://www.legorafi.fr/wp-content/uploads/2016/03/210316.jpg" alt="" width="100%" /></p>', '', '', 'text', 3, 18, 1, 0, 1),
(24, 'Faire du pain', 'http://www.marmiton.org/recettes/recette_pain-comme-chez-le-boulanger_15403.aspx', 6, '<p><img src="http://images.marmitoncdn.org/recipephotos/multiphoto/87/871a04e6-5c6e-4cb8-a9be-0829095e481b_normal.jpg" alt="" width="327" height="245" /></p>', '', '', 'text', 3, 19, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tile_groups`
--

CREATE TABLE IF NOT EXISTS `tile_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(32) NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `cours_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(32) NOT NULL,
  `header` varchar(255) NOT NULL,
  `columns` int(11) NOT NULL DEFAULT '2',
  `index` int(10) unsigned NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tile_groups`
--

INSERT INTO `tile_groups` (`id`, `model`, `foreign_key`, `cours_id`, `title`, `header`, `columns`, `index`, `actif`) VALUES
(1, 'Cour', 1, 0, 'fr102_landing', 'Accueil du cours de FranÃ§ais 102', 2, 1, 1),
(3, 'Landing', 3, 0, 'Tuiles pour francais 102', 'la banniÃ¨re de jeanne d''Arc', 3, 2, 1),
(4, 'Landing', 4, 0, 'livre_202', 'Le livre', 2, 0, 1),
(5, 'Landing', 3, 0, 'Liens amusants', 'Liens amusants', 1, 4, 1),
(6, 'Accueil', 1, NULL, 'home_page', 'Les rubriques', 3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tuiles`
--

CREATE TABLE IF NOT EXISTS `tuiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `model_id` varchar(32) NOT NULL DEFAULT 'text',
  `professeur_id` int(10) unsigned NOT NULL,
  `index` int(10) unsigned NOT NULL,
  `couleur_id` int(11) NOT NULL,
  `full_row` tinyint(1) NOT NULL DEFAULT '1',
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tuiles`
--

INSERT INTO `tuiles` (`id`, `title`, `description`, `cours_id`, `model_id`, `professeur_id`, `index`, `couleur_id`, `full_row`, `actif`) VALUES
(1, 'Actualites', '<p>Les actualites du jour ...</p>\r\n<p><a href="http://www.theonion.com/" target="_blank"><img src="http://i.onionstatic.com/onion/2921/8/original/960.jpg" alt="" width="200" height="113" /></a></p>', 1, 'text', 1, 4, 4, 0, 1),
(2, 'Chansons', '<p>mes chansons</p>', 1, 'chanson', 1, 1, 3, 0, 1),
(3, 'Rencontrez votre professeur', '<p>Lire la <a href="http://french3/admin/profiles/view/571">biographie de M. Alain Veylit</a>, qui enseignera le cours en remplacement de M. Francis Bright, en ann&eacute;e sabbatique.</p>', 1, 'text', 1, 0, 2, 0, 1),
(4, 'Ressources', '<p>Ce site vous propose quelques <a href="http://french3/admin/ressources">ressources</a> qui seront utiles dans les parties du cours, grammaire et lecture.</p>', 1, 'ressource', 1, 2, 1, 0, 1),
(5, 'Description du cours', '<div class="course-description">\r\n<h3>T&eacute;l&eacute;charger la <a href="http://french3/admin/documents/preview/11">description du cours</a></h3>\r\n<h5>Note les liens ci-dessus ne marcheront que si vous vous &ecirc;tes identifi&eacute;s au pr&eacute;alable.</h5>\r\n<h3>Les livres du cours:</h3>\r\n<ul>\r\n<li>French for Oral and Written Review, 5th edition. Charles Carlut, Walter Meiden, Heinle &amp; Heinle, Thomson Learning</li>\r\n<li>Candide, de Voltaire. Petits Classiques Larousse, &eacute;dit&eacute; par Yves Bomati</li>\r\n<li>Huis Clos, de Jean-Paul Sartre. Edition Gallimard, collection Folio.</li>\r\n</ul>\r\n</div>', 1, 'text', 1, 7, 2, 1, 1),
(6, 'Humour', '<p id="humour"><a href="https://youtu.be/x1sQkEfAdfY" target="_blank"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdqhYDAC_6hWyvEGS6-TmzOFwGjNdXqMFdqjS4Y5WAf4V_eH0riw" alt="" /> <!-- brel - ne me quitte pas : https://youtu.be/E7zgNye6HTE?t=16 --> <!--- Amsterdam : https://youtu.be/n2kkr0e_dTQ --> </a></p>', 1, 'text', 1, 3, 7, 0, 1),
(7, 'Exercices', '', 1, 'exercice', 1, 6, 6, 1, 1),
(8, 'Vocabulaire', '', 1, 'vocabulaire', 1, 1, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL DEFAULT '',
  `role` varchar(16) DEFAULT 'Guest',
  `licenses` int(11) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `profile_id` int(10) unsigned DEFAULT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `cours` varchar(64) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_token` varchar(255) NOT NULL,
  `email_token_expires` datetime NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role`, `licenses`, `last_login`, `created`, `active`, `profile_id`, `cours_id`, `cours`, `email`, `email_token`, `email_token_expires`, `email_verified`) VALUES
(3, 'AlainVeylit', 'Alain Veylit', 'fe4c3f82c7af9cac73785289c6d2c2884d3ee4a3', 'Admin', 0, '2016-09-18 12:00:04', '2016-01-06 16:56:19', 1, 571, 0, '', 'alain@signtracks.com', '', '0000-00-00 00:00:00', 0),
(21, 'alain@musickshandmade.com', 'Jeannot Lagaudie', 'fe4c3f82c7af9cac73785289c6d2c2884d3ee4a3', 'etudiant', 0, '2016-09-16 22:16:31', '2016-09-08 17:12:39', 1, 588, 2, 'Fran&ccedil;ais 202', 'alain@musickshandmade.com', '', '0000-00-00 00:00:00', 1),
(19, 'etudiant', 'George Calambour', 'fe4c3f82c7af9cac73785289c6d2c2884d3ee4a3', 'User', 0, '2016-09-17 10:05:24', '2016-09-07 16:27:16', 1, 586, 1, 'francais 102', 'alain@musickshandmade.com', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_plugin`
--

CREATE TABLE IF NOT EXISTS `users_plugin` (
  `id` varchar(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `password_token` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT '0',
  `email_token` varchar(255) DEFAULT NULL,
  `email_token_expires` datetime DEFAULT NULL,
  `tos` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_action` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `role` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `profile_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `BY_USERNAME` (`username`),
  KEY `BY_EMAIL` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_plugin`
--

INSERT INTO `users_plugin` (`id`, `username`, `slug`, `password`, `password_token`, `email`, `email_verified`, `email_token`, `email_token_expires`, `tos`, `active`, `last_login`, `last_action`, `is_admin`, `role`, `created`, `modified`, `profile_id`) VALUES
('568b113e-88a8-4460-874a-17bde146b466', 'AlainVeylit', '', '8b113615369f0d599c7daaab538badfa037d70d5', NULL, 'alain@signtracks.com', 1, NULL, NULL, 1, 1, '2016-01-06 14:59:51', NULL, 1, 'Admin', '2016-01-04 16:41:34', '2016-01-06 14:59:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `position` float NOT NULL DEFAULT '1',
  `field` varchar(255) NOT NULL,
  `value` text,
  `input` varchar(16) NOT NULL,
  `data_type` varchar(16) NOT NULL,
  `label` varchar(128) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_PROFILE_PROPERTY` (`field`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vocabulaires`
--

CREATE TABLE IF NOT EXISTS `vocabulaires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `vocables` text NOT NULL,
  `creator` int(10) unsigned NOT NULL,
  `professeur_id` int(10) unsigned NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `ccode` varchar(24) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `image_dir` varchar(128) NOT NULL,
  `image_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vocabulaires`
--

INSERT INTO `vocabulaires` (`id`, `title`, `vocables`, `creator`, `professeur_id`, `cours_id`, `ccode`, `modified`, `image`, `image_dir`, `image_type`) VALUES
(1, 'Vocabulaire informatique', '<table class="table table-striped">\r\n<tbody>\r\n<tr><th>La toile</th>\r\n<td>the WEB</td>\r\n</tr>\r\n<tr><th>Navigateur web (abbr. "navigateur")</th>\r\n<td>Browser</td>\r\n</tr>\r\n<tr><th>Internet</th>\r\n<td>the Internet</td>\r\n</tr>\r\n<tr><th>L''informatique</th>\r\n<td>computer science</td>\r\n</tr>\r\n<tr><th>Un ordinateur (souvent abbr. &ldquo;ordi&rdquo;)</th>\r\n<td>a computer</td>\r\n</tr>\r\n<tr><th>Une page WEB</th>\r\n<td>a WEB page</td>\r\n</tr>\r\n<tr><th>Un Hyperlien (abbr. "lien")</th>\r\n<td>hyperlink</td>\r\n</tr>\r\n<tr><th>Hypertexte</th>\r\n<td>Hypertext</td>\r\n</tr>\r\n<tr><th>L&rsquo;arobase</th>\r\n<td>the @ sign</td>\r\n</tr>\r\n<tr><th>Une adresse WEB</th>\r\n<td>URL</td>\r\n</tr>\r\n<tr><th>Un syst&egrave;me d''exploitation</th>\r\n<td>operating system (i.e. Windows, LINUX...)</td>\r\n</tr>\r\n<tr><th>Un logicel</th>\r\n<td>a piece of software</td>\r\n</tr>\r\n<tr><th>Une application (aussi abbr. &ldquo;app&rdquo;)</th>\r\n<td>an application</td>\r\n</tr>\r\n<tr><th>Un logiciel de traitement de texte</th>\r\n<td>Word processing software</td>\r\n</tr>\r\n<tr><th>Une souris</th>\r\n<td>a computer mouse</td>\r\n</tr>\r\n<tr><th>Un &eacute;cran d''ordinateur</th>\r\n<td>a computer screen</td>\r\n</tr>\r\n<tr><th>Une tablette</th>\r\n<td>a laptop</td>\r\n</tr>\r\n<tr><th>Une liseuse</th>\r\n<td>a Kindle</td>\r\n</tr>\r\n<tr><th>Un t&eacute;l&eacute;phone portable (souvernt abbr. &ldquo;un portable&rdquo;)</th>\r\n<td>smart phone</td>\r\n</tr>\r\n<tr><th>Une puce</th>\r\n<td>a computer chip</td>\r\n</tr>\r\n<tr><th>Un clavier d''ordinateur</th>\r\n<td>a computer keyboard</td>\r\n</tr>\r\n<tr><th>mdr (mort de rire)</th>\r\n<td>lol</td>\r\n</tr>\r\n<tr><th>Un courriel</th>\r\n<td>an email</td>\r\n</tr>\r\n<tr><th>Num&eacute;rique</th>\r\n<td>digital</td>\r\n</tr>\r\n<tr><th>Num&eacute;riser</th>\r\n<td>to put in digital format</td>\r\n</tr>\r\n<tr><th>Une calculatrice</th>\r\n<td>a calculator</td>\r\n</tr>\r\n<tr><th>T&eacute;l&eacute;charger</th>\r\n<td>download</td>\r\n</tr>\r\n<tr><th>Un r&eacute;pertoire</th>\r\n<td>a folder</td>\r\n</tr>\r\n<tr><th>Un fichier</th>\r\n<td>a file</td>\r\n</tr>\r\n<tr><th>Sauvegarder un fichier</th>\r\n<td>save a file</td>\r\n</tr>\r\n<tr><th>Restaurer un fichier</th>\r\n<td>restore a file</td>\r\n</tr>\r\n<tr><th>Coder</th>\r\n<td>to code</td>\r\n</tr>\r\n<tr><th>Code informatique</th>\r\n<td>computer code</td>\r\n</tr>\r\n<tr><th>Clavarder (de clavier + bavarder)</th>\r\n<td>to chat</td>\r\n</tr>\r\n<tr><th>Clavardage</th>\r\n<td>il s&rsquo;agit des messages re&ccedil;us lors d&rsquo;une conversation en ligne. Le clavardage par vid&eacute;o conf&eacute;rence utilise davantage de bande passante qu&rsquo;un message &eacute;crit. (chatting)</td>\r\n</tr>\r\n<tr><th>Bande passante</th>\r\n<td>Bandwidth</td>\r\n</tr>\r\n<tr><th>Un transfert en amont</th>\r\n<td>Upload</td>\r\n</tr>\r\n<tr><th>Sites de t&eacute;l&eacute;chargement</th>\r\n<td>Upload/Download site</td>\r\n</tr>\r\n<tr><th>Lecture en continu</th>\r\n<td>streaming</td>\r\n</tr>\r\n<tr><th>Gigaoctet (abbr. "Go")</th>\r\n<td>gigabyte</td>\r\n</tr>\r\n<tr><th>L&rsquo;hame&ccedil;onnage est une technique de fraude par courriel visant &agrave; obtenir les renseignements personnels d&rsquo;une personne pour lui voler son identit&eacute;.</th>\r\n<td>Phishing</td>\r\n</tr>\r\n<tr><th>Pourriel</th>\r\n<td>spam</td>\r\n</tr>\r\n<tr><th>Filtre antipourriel</th>\r\n<td>spam filter</td>\r\n</tr>\r\n<tr><th>R&eacute;seau Wi-Fi (aussi r&eacute;seau sans-fil)</th>\r\n<td>WiFi network</td>\r\n</tr>\r\n<tr><th>Portail</th>\r\n<td>Gateway</td>\r\n</tr>\r\n<tr><th>Un logiciel de messagerie</th>\r\n<td>email software</td>\r\n</tr>\r\n<tr><th>Une bo&icirc;te de messagerie</th>\r\n<td>mailbox</td>\r\n</tr>\r\n<tr><th>Une adresse courriel</th>\r\n<td>email adresse</td>\r\n</tr>\r\n<tr><th>Un onglet</th>\r\n<td>tab</td>\r\n</tr>\r\n<tr><th>Le r&eacute;seautage &agrave; domicile</th>\r\n<td>home network</td>\r\n</tr>\r\n<tr><th>Le num&eacute;ro de code WiFi</th>\r\n<td>Wi-Fi code</td>\r\n</tr>\r\n<tr><th>Identifiant</th>\r\n<td>log-in information</td>\r\n</tr>\r\n<tr><th>Un mot de passe</th>\r\n<td>password</td>\r\n</tr>\r\n<tr><th>Un virus</th>\r\n<td>virus</td>\r\n</tr>\r\n</tbody>\r\n</table>', 3, 1, 1, '', '2016-09-15 17:20:37', 'souris.jpg', '1', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
