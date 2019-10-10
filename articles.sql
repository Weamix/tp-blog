-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 18 sep. 2019 à 21:22
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog2`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'http://placehold.it/800x600',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `created_at`, `category`, `image`) VALUES
(40, 'Facebook peut-il réinventer les appels vidéo en famille avec Portal ', 'Facebook veut donner une nouvelle dimension aux appels vidéo. Le groupe de Mark Zuckerberg va lancer à partir du 15 octobre sa gamme d\'écrans communicants Portal en France et dans une demi-douzaine de pays. Portal+, Portal et Portal Mini seront disponibles en trois tailles d\'écran de 15,6, 10 et 8 pouces à partir du 15 octobre aux prix de 299, 199 et 149 euros. Ils seront accompagnés par Portal TV, une version à connecter directement sur un téléviseur, qui sera vendue au prix de 169 euros à partir du 5 novembre. Le réseau social espère profiter des fêtes de fin d\'année pour imposer ses produits aux pieds des sapins.\r\n\r\nLancé il y a à peu près un an aux États-Unis, Portal est le premier produit développé par Facebook depuis le casque de réalité virtuelle de sa filiale Oculus. Il vise directement les personnes désireuses de rester connectées avec leurs proches. Ses usages sont particulièrement limités : même s\'il permet de lire de la musique via Spotify, de regarder des séries sur Amazon Prime Video et de solliciter Amazon Alexa, il s\'agit d\'un écran quasi-exclusivement dédié aux conservations en visioconférence via Messenger et WhatsApp.\r\n\r\nPortal se démarque des écrans intelligents Echo Show d\'Amazon et Nest Hub de Google en proposant des fonctionnalités pensées pour la visioconférence comme une caméra intelligente capable de cadrer et zoomer sur un sujet de façon automatique pour lui permettre de parler en se déplaçant librement sans avoir à modifier l\'inclinaison de l\'appareil. Une technologie s\'occupe aussi d\'amplifier la voix de la personne et de réduire les bruits de fond. Et des filtres en réalité augmentée viennent agrémenter les discussions de la même manière que sur Messenger.\r\n\r\nCaméra intelligente et filtres en réalité augmentée\r\nLa principale attraction de la gamme est Portal TV, un appareil de streaming doté de huit micros à brancher en HDMI capable de diffuser les appels vidéo directement sur une télévision. À travers Portal TV, Facebook entend proposer le premier appareil de visioconférence familial et permettre à ses utilisateurs d\'appeler leurs proches à plusieurs en bénéficiant du confort d\'un grand écran plutôt qu\'en se faisant passer un téléphone à la verticale de mains en mains. \r\n', '2019-09-18 20:52:02', 'Connecté', 'https://cdn-media.rtl.fr/cache/VU0TMY2sPn3U5Vb8qbbmtQ/880v587-0/online/image/2019/0917/7798348660_facebook-veut-transposer-les-appels-video-sur-la-television.jpg'),
(39, 'iOS 13 arrive jeudi : les principales nouveautés et la liste des iPhone compatibles', 'Le grand public va pouvoir découvrir la nouvelle interface de l\'iPhone à la veille de la sortie de l\'iPhone 11. Comme annoncé par Apple durant la keynote du 10 septembre, la mise à jour iOS 13 est disponible en téléchargement ce jeudi 19 septembre. Comme tous les ans, la nouvelle version du système d\'exploitation de l\'iPhone est déployée progressivement auprès de tous les utilisateurs. \r\n\r\nVous ne pourrez probablement pas l\'installer dès ce soir. Il est d\'ailleurs recommandé de ne pas l\'installer dans l\'immédiat mais d\'attendre quelques jours afin de vérifier qu\'elle ne souffre pas de quelques dysfonctionnements inhérents aux premières versions du logiciel.\r\n\r\nPrésentée lors de la conférence des développeurs d\'Apple en juin, cette nouvelle version introduit plusieurs nouveautés, comme un mode sombre, une saisie de clavier swipe-to-type, une refonte de l\'application Photos et de nouvelles options de confidentialité pour protéger la vie privée des propriétaires d\'iPhone.\r\n\r\nQuels iPhone peuvent installer iOS 13 ?\r\nTous les ans, Apple met à jour la liste des appareils qui peuvent bénéficier de la dernière version de son système d\'exploitation. Cette version laisse sur le carreau l\'iPhone 5S, les iPhone 6 et l\'iPod qui devront rester sous iOS 12. La grande nouveauté cette année est l\'absence des iPad de la liste. Apple se préparer à lancer le 30 septembre iPad OS, son premier logiciel dédié à l\'iPad. ', '2019-09-18 20:45:34', 'Mobile', 'https://cdn-media.rtl.fr/cache/OIsrfIui9UMOES_ZjvolNA/880v587-0/online/image/2019/0917/7798348610_ios-13-est-disponible-en-telechargement-jeudi-19-septembre.PNG'),
(41, 'Sony : achetez un écran 16K de 19 mètres si vous avez des millions', 'C’était fou, et c’est maintenant en vente. En avril dernier, Sony démontrait au Japon un immense « téléviseur » de 19,2 mètres de long pour 5,4 mètres de haut — le tout en définition 16K, soit seize fois plus de pixels qu’un écran 4K. La marque avait même dû filmer spécialement de la vidéo pour pouvoir l’afficher à pleine résolution. Les modules de base de cet écran sont aujourd’hui sur le marché.\r\n\r\nCet écran est réalisé en « Crystal LED », le nom que le marketing de Sony donne à la technologie micro LED. La firme utilise cette dernière pour équiper des modules de 16 x 18 pouces à une définition de 320 x 360, avec des LEDs qui n’occupent que 1% de la surface de l’écran. Pour cela, on obtient également une luminosité assez extraordinaire de 1 000 cd/m² et une large gamme de couleurs, de 140 % du sRGB.\r\n\r\nÀ partir de 180 000 dollars pour un écran Full HD\r\nLes modules sont dépourvus de bordure et donc assemblables les uns avec les autres, comme dans le produit démontré par Samsung au CES 2019. Même si les prix ne sont pas encore publics, chaque module individuel est estimé à 10 000 dollars, ce qui permet de donner des ordres de grandeur pour les écrans assemblés. « Pratiquement toutes taille et définition » sont possibles, mais Sony donne quelques exemples.\r\n\r\nFull HD : 18 modules, 110 pouces de diagonale, 2,4 x 1,2 mètre, environ 180 000 dollars\r\n4K : 72 modules, 220 pouces de diagonale, 4,9 x 2,7 mètres, environ 720 000 dollars\r\n8K : 288 modules, 440 pouces de diagonale, 9,8 x 5,5 mètres, environ 2,9 millions de dollars\r\n16K : 576 modules, 790 pouces de diagonale, 19,2 x 5,5 mètres, environ 5,8 millions de dollars\r\n« Quand vous arrivez à cette définition, c’en est quasiment une expérience de réalité virtuelle, vu que vos yeux y perçoivent une profondeur dans le contenu », avait commenté en avril l’analyste David Mercer de Strategy Analytics auprès de la BBC. À l’heure actuelle, les écrans de Sony se veulent surtout être une démonstration technologique. Les quelques applications possibles actuelles concernent les cinémas, les concessionnaires, les halls d’entreprise et les parcs d’attractions.', '2019-09-18 20:54:07', 'Télévision', 'https://cdn.tomshardware.fr/content/uploads/sites/3/2019/09/67575-01-sonys-bus-sized-16k-tv-cost-up-5-million-full.jpg'),
(44, 'Trottinettes électriques interdites', 'Afin de sécuriser les piétons, la ville de Saint-Raphaël vient de prendre un arrêté afin d’interdire la circulation des moyens de locomotion électriques sur les trottoirs et autres espaces publics\r\nUtilisateurs d’une trottinette électrique, d’un gyropode voire d’un hoverboard, notez-le: les trottoirs, artères et places piétonnes du centre-ville et du front de mer de Saint-Raphaël sont désormais interdits à la circulation pour l’ensemble de ces engins électriques.\r\n\r\n\"Tout au long de l’été, nous avons observé une recrudescence de ces nouveaux moyens de déplacement électriques. En même temps, nous avons reçu bon nombre de courriers de la part des piétons afin de dénoncer la dangerosité de ces engins. Nous avons donc pris un arrêté afin d’assurer la sécurité et la mobilité des piétons sur les trottoirs, quais, places et voies publiques de Saint-Raphaël, annonce l’adjointe à la sécurité, Françoise Dumont. D’ailleurs, une réglementation nationale devrait voir le jour très prochainement. La Ville de Saint-Raphaël a anticipé dans ce domaine afin que les espaces publics soient correctement partagés. Le but n’est pas de s’opposer au développement de ces nouveaux engins mais d’assurer la sécurité de leurs utilisateurs mais aussi des autres usagers de ces espaces publiques.\"', '2019-09-18 21:22:10', 'Lois', 'https://cdn.static02.nicematin.com/media/npo/1440w/2019/09/image-rapxxq334_pha_trottinette-electrique.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
