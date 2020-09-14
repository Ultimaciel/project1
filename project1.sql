--
-- Tabel Account maken met id, email en password.
--

CREATE TABLE `account` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);

-- --------------------------------------------------------

--
-- Tabel persoon maken met id, account_id, voornaam, tussenvg, achternaam, email, username en password
--

CREATE TABLE `persoon` (
  `id` int(255) NOT NULL,
  `account_id` int(255) NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Tussenvoegsel` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
);

-- --------------------------------------------------------

--
-- in account de id primary key maken
--

ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- in persson de id primary key maken en account_id unique key naar account
--

ALTER TABLE `persoon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_id` (`account_id`);

-- --------------------------------------------------------

--
-- Auto Increment voor id in account
--

ALTER TABLE `account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Auto Increment voor id in persoon
--
ALTER TABLE `persoon`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

COMMIT;