CREATE DATABASE IF NOT EXISTS blogcuisine;


USE blogcuisine;

CREATE TABLE `article` (
  `id_article` int NOT NULL,
  `titre` varchar(250) NOT NULL,
  `contenu` text NOT NULL,
  `date_publication` date NOT NULL,
  `id_auteur` int NOT NULL,
  `image` varchar(250) NOT NULL,
  `id_utilisateur` int NOT NULL,
  `id_categorie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `contenu`, `date_publication`, `id_auteur`, `image`, `id_utilisateur`, `id_categorie`) VALUES
(2, 'lu', 'ulio', '2024-09-19', 12, 'uploads/66ebc1d71d463.avif', 12, 9),
(3, '2', '2', '2024-09-19', 3, 'uploads/66ebc5491d2ff.webp', 3, 11),
(4, '3', '3', '2024-09-19', 3, 'uploads/66ebcc5c7f91d.avif', 3, 9),
(5, '4', '4', '2024-09-19', 3, 'uploads/66ebde3962185.avif', 3, 11),
(6, '5', '5', '2024-09-19', 3, 'uploads/66ebefc83eb89.jpg', 3, 9),
(7, 'bla', 'bla', '2024-09-22', 12, 'uploads/66f02ec65863d.webp', 12, 11),
(8, 'Mini Burgers \"MicroServices\"', 'Des burgers végétariens faits de pois chiches et d\'épinards. Chacun peut être personnalisé avec des garnitures, comme dans une architecture de microservices.', '2024-09-22', 3, 'uploads/66f0332c5bec2.jpg', 3, 9),
(9, 'Bouchées \"HTML\"', 'Des mini-brochettes de tomates cerises et de mozzarella, enfilées comme des balises HTML. Servez avec un filet de pesto pour une touche de style CSS.', '2024-09-22', 3, 'uploads/66f0337924512.jpg', 3, 11),
(10, 'Tartines \"CSS\"', 'Des tartines de pain grillé avec de l\'avocat écrasé, assaisonné de sel et de poivre. Personnalisez-les avec des tranches de radis pour ajouter du \"style\".', '2024-09-22', 3, 'uploads/66f03474cb206.jpg', 3, 9),
(11, 'Soupe \"Java\"', 'Une soupe de lentilles épicée. Ajoutez des épices comme du cumin pour \"compiler\" la saveur, et servez-la chaude pour une session de codage réconfortante.', '2024-09-22', 3, 'uploads/66f034d842eb7.jpeg', 3, 11),
(12, 'Salade \"Versioning\"', 'Une salade multicolore avec des carottes, des betteraves et du chou, symbolisant les différentes branches de votre code. Assaisonnez avec une vinaigrette légère pour un \"merge\" parfait.', '2024-09-22', 3, 'uploads/66f0351464d8e.jpg', 3, 9),
(13, 'Pâtes \"API\"', 'Des spaghetti avec une sauce tomate maison. Servez avec des boulettes de viande, symbolisant les requêtes et les réponses dans un appel API.', '2024-09-22', 3, 'uploads/66f03535ac94e.jpg', 3, 11),
(14, 'Risotto \"Framework\"', 'Un risotto crémeux aux champignons. Ajoutez un peu de parmesan pour le rendre \"scalable\" et savoureux.', '2024-09-22', 3, 'uploads/66f0356e87a76.jpg', 3, 11),
(15, 'Wraps \"Développeur Agile\"', ' Des wraps de légumes frais et de houmous. Faciles à préparer et parfaits pour les lunchs rapides entre les sprints.', '2024-09-22', 3, 'uploads/66f035a4e770b.jpg', 3, 9),
(16, 'Brownies \"Backend\"', 'Des brownies chocolatés, riches et moelleux, pour satisfaire vos besoins en \"backend\". Ajoutez des noix pour un peu de texture.', '2024-09-22', 3, 'uploads/66f035bc2e259.jpg', 3, 11),
(17, 'Cookies \"Front-End\"', 'Des cookies aux pépites de chocolat décorés avec du glaçage coloré pour un look accrocheur, parfaits pour le \"design\" de votre dessert.', '2024-09-22', 3, 'uploads/66f036120ca85.jpg', 3, 9),
(18, 'Mojito \"Database\"', 'Un mojito classique avec du menthe fraîche, symbolisant la fraîcheur des données. Servez dans un verre avec beaucoup de glace pour un bon \"refresh\".', '2024-09-22', 3, 'uploads/66f036327603c.jpg', 3, 11),
(19, 'Margarita \"Debugging\"', 'Une margarita au citron vert avec une touche de sel sur le rebord, pour vous aider à \"debugger\" après une longue journée de développement.', '2024-09-22', 3, 'uploads/66f0364b070aa.jpg', 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int NOT NULL,
  `nom_categorie` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(9, 'Apéritifs'),
(11, 'Entrées');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` int NOT NULL,
  `date_com` date NOT NULL,
  `id_article` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `contenu` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id_com`, `date_com`, `id_article`, `id_utilisateur`, `contenu`) VALUES
(5, '2024-09-22', 8, 12, 'hdhd'),
(6, '2024-09-23', 8, 12, 'dégueulasse'),
(7, '2024-09-23', 9, 12, 'pas on'),
(8, '2024-09-24', 12, 3, 'mdmd'),
(9, '2024-09-24', 8, 12, 'a chier'),
(10, '2024-09-24', 7, 12, 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL,
  `nom` varchar(250) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `role` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `prenom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `email`, `mdp`, `role`, `prenom`) VALUES
(3, 'Naidja', 'sofian@gmail.com', '$2y$10$trJGh4gWdOZXy1SIoGlE.uB.vbQmd9jQCRFLkj/VyjyLKPV67ID4C', '1', 'Sofian'),
(4, 'Naidja', 'so@gmail.com', 'mdp', '0', 'Sofian'),
(5, 'blu', 'bla@gmail.com', 'bla', '0', 'bla'),
(9, 'baka', 'baka@gmail.com', '$2y$10$uhFjWXrV74KdKB.W.j.eTuDtOMtokipGN3Oq4qidEfAWuiYq/7xIW', '0', 'baka'),
(10, 'baka', 'baka@gmail.com', '$2y$10$V5zADFybU7G5KcIQCyapwe65RMepEVXizjDlBo7Tpqc90cCu6TS4e', '0', 'baka'),
(11, 'baka', 'baka@gmail.com', '$2y$10$8KXY5vxd7m0W9SxwBQeuHe1aVYdpVeDCOrr/B9G0JSDARhccnbLaW', '0', 'baka'),
(12, 'goku', 'dbz@gmail.com', '$2y$10$aq4.1vAPlMW/b/RIsFhMxuh/0oCOGKlsdWDcZuOf6QBuXzGEIkg8a', '0', 'son');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `FK_article` (`id_article`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_com` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_auteur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
