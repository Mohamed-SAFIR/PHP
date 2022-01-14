-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 14 jan. 2022 à 15:24
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `php_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `circuit`
--

CREATE TABLE `circuit` (
  `id` int(11) NOT NULL,
  `parcours` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Durée` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `circuit`
--

INSERT INTO `circuit` (`id`, `parcours`, `description`, `Durée`) VALUES
(1, 'Tokyo et ses alentours', 'Prendre un vol pour Tokyo, puis de Tokyo à Kyoto, puis de Kyoto à Osaka, puis de Osaka à Fuji, puis de Fuji à Tokyo', '10 jours / 9 nuits'),
(2, 'USA Parcours', 'Prendre un vol pour New York, puis de New York à Washington, puis de Washington à Miami.', '6 jours / 5 nuits');

-- --------------------------------------------------------

--
-- Structure de la table `circuitDesc`
--

CREATE TABLE `circuitDesc` (
  `id` int(11) NOT NULL,
  `id_circuit` int(11) NOT NULL,
  `photo` varchar(2550) NOT NULL,
  `descriptionCir` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `circuitDesc`
--

INSERT INTO `circuitDesc` (`id`, `id_circuit`, `photo`, `descriptionCir`) VALUES
(1, 1, 'https://cms.finnair.com/resource/blob/747982/0511bb2bc91953d4ef3506d00933819b/tokyo-main-data.jpg', 'Prendre un vol pour Tokyo, puis de Tokyo à Kyoto, puis de Kyoto à Osaka, puis de Osaka à Fuji, puis de Fuji à Tokyo'),
(2, 2, 'https://img.over-blog-kiwi.com/0/75/59/66/20140718/ob_985dd9_miami-boston.jpg', 'Prendre un vol pour New York, puis de New York à Washington, puis de Washington à Miami.');

-- --------------------------------------------------------

--
-- Structure de la table `circuitReserve`
--

CREATE TABLE `circuitReserve` (
  `id` int(11) NOT NULL,
  `id_circuit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `circuitReserve`
--

INSERT INTO `circuitReserve` (`id`, `id_circuit`, `id_user`) VALUES
(1, 1, 6),
(4, 2, 6),
(5, 2, 6),
(6, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motPasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `mail`, `motPasse`) VALUES
(6, 'safir', 'safir.mohamed96@gmail.com', '309cd3800aacbd003ac36199fa537295'),
(8, 'safir', 'mohamed@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(11, 'MACRON', 'macron@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `circuit`
--
ALTER TABLE `circuit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `circuitDesc`
--
ALTER TABLE `circuitDesc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_circuit` (`id_circuit`);

--
-- Index pour la table `circuitReserve`
--
ALTER TABLE `circuitReserve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_circuit` (`id_circuit`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `circuit`
--
ALTER TABLE `circuit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `circuitDesc`
--
ALTER TABLE `circuitDesc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `circuitReserve`
--
ALTER TABLE `circuitReserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `circuitDesc`
--
ALTER TABLE `circuitDesc`
  ADD CONSTRAINT `circuitdesc_ibfk_1` FOREIGN KEY (`id_circuit`) REFERENCES `circuit` (`id`);
