-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Lis 2021, 22:04
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `test`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `updated_at`, `created_at`) VALUES
(1, 'Adam', 'Mickiewicz', NULL, NULL),
(2, 'B.A.', 'Paris', NULL, NULL),
(3, 'Victoria', 'Schwab', NULL, NULL),
(4, 'Stanisław', 'Lem', NULL, NULL),
(5, 'Stephen', 'King', NULL, NULL),
(6, 'Bolesław', 'Prus', NULL, NULL),
(7, 'Krzysztof', 'Gordon', NULL, NULL),
(8, 'Małgorzata', 'Kalemba-Dróżdż', NULL, NULL),
(9, 'Robert', 'Kiyosaki', NULL, NULL),
(10, 'Bolesław', 'Leśmian', NULL, NULL),
(12, 'Testowy', 'Autor', '2021-05-31', '2021-05-31');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors_books`
--

CREATE TABLE `authors_books` (
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `authors_books`
--

INSERT INTO `authors_books` (`author_id`, `book_id`, `updated_at`, `created_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 3, NULL, NULL),
(5, 9, NULL, NULL),
(6, 10, NULL, NULL),
(7, 11, NULL, NULL),
(8, 12, NULL, NULL),
(9, 13, NULL, NULL),
(10, 14, NULL, NULL),
(1, 15, NULL, NULL),
(1, NULL, '2021-05-21', '2021-05-21'),
(8, NULL, '2021-05-21', '2021-05-21'),
(1, NULL, '2021-05-31', '2021-05-31'),
(5, NULL, '2021-05-31', '2021-05-31'),
(1, NULL, '2021-06-01', '2021-06-01'),
(6, NULL, '2021-06-01', '2021-06-01'),
(8, NULL, '2021-06-01', '2021-06-01'),
(9, NULL, '2021-06-01', '2021-06-01'),
(4, 5, '2021-10-21', '2021-10-21'),
(1, 28, '2021-10-21', '2021-10-21'),
(2, 28, '2021-10-21', '2021-10-21'),
(3, 28, '2021-10-21', '2021-10-21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `publishing_id` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `description`, `quantity`, `category_id`, `publishing_id`, `updated_at`, `created_at`) VALUES
(1, '978-83-900210-1-0', 'Pan Tadeusz', 'Akcja Pana Tadeusza rozgrywa się na Litwie w dworku Soplicowie oraz w Dobrzynie.', 1, 1, 1, '2021-06-07', NULL),
(2, '978-3-456-34240-5', 'Terapeutka', 'Budząca dreszcz grozy opowieść o wymarzonym domu, który skrywa mroczną tajemnicę…', 5, 5, 1, '2021-05-21', NULL),
(3, '978-3-445-64542-5', 'Niewidzialne życie Addie LaRue', '„Nigdy nie módl się do bogów, którzy odpowiadają po zmroku”.', 5, 2, 1, NULL, NULL),
(5, '978-1-4456-4542-1', 'Bajki robotów', 'Dawno, dawno temu, gdzieś za Cieśniną Andromedzką żyli sobie Palibaba-intelektryk, Królewna Elektrina i robot Automateusz...', 2, 3, 1, '2021-10-21', NULL),
(9, '978-2-13-412400-5', 'To', 'Najbardziej przerażająca powieść króla grozy. Doceniona przez miliony czytelników na całym świecie. Otoczona kultowym uwielbieniem.', 5, 4, 1, NULL, NULL),
(10, '978-1-134-12400-8', 'Lalka', 'Historia zamożnego warszawskiego kupca, Stanisława Wokulskiego i jego miłości do pięknej, choć zubożałej arystokratki, Izabeli Łęckiej.', 3, 6, 1, '2021-05-31', NULL),
(11, '978-83-13-41240-6', 'Konstytucja Rzeczypospolitej Polskiej', 'Ta edycja zawiera pełny tekst Ustawy Zasadniczej wraz ze wskazówkami dla użytkowników. Objaśnienia w przystępny sposób pomagają użytkownikowi w zrozumieniu istoty oraz konsekwencji zapisanych w tej ustawie postanowień.', 5, 7, 1, NULL, NULL),
(12, '978-83-11-54120-7', 'Jadalne kwiaty', 'Słodkie pierwiosnki, kwaśne begonie, goryczkowe aksamitki, pikantne nasturcje – kwiaty mogą nie tylko przepięknie wyglądać, lecz także doskonale… smakować!', 4, 8, 1, '2021-05-23', NULL),
(13, '978-4-311-54120-9', 'Bogaty ojciec, biedny ojciec', 'Chcesz wiedzieć, jak dysponować budżetem? Chciałbyś dzielić się tą cenną umiejętnością ze swoimi pociechami? Dzięki poradnikowi „Bogaty ojciec, biedny ojciec” zdobędziesz wiedzę o pieniądzach, której prawdopodobnie nikt wcześniej Ci nie przekazał.', 5, 9, 1, '2021-05-21', NULL),
(14, '978-83-981512-3-8', 'Bywalec zieleni', '\"Bywalec zieleni\" to ciekawie napisana książka o życiu jednego z największych polskich poetów. Autor przedstawia korzenie rodzinne, w tym nieznane fakty, oparte o najnowszy stan wiedzy, przytacza wiele nowych informacji, prostuje błędy.', 5, 10, 1, '2021-05-21', NULL),
(15, '978-1-235-12310-10', 'Dziady', 'cykl dramatów romantycznych Adama Mickiewicza publikowany w latach 1823–1860.', 3, 1, 1, '2021-10-06', '2021-04-28'),
(28, '978-1-235-12310-171', 'testowyTytuł', 'opis1', 0, 4, 1, '2021-10-19', '2021-06-07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `category`, `updated_at`, `created_at`) VALUES
(1, 'klasyka', NULL, NULL),
(2, 'fantasy', NULL, NULL),
(3, 'science fiction', NULL, NULL),
(4, 'horror', NULL, NULL),
(5, 'kryminał', NULL, NULL),
(6, 'lektury szkolne', NULL, NULL),
(7, 'prawo', NULL, NULL),
(8, 'kuchnia', NULL, NULL),
(9, 'biznes', NULL, NULL),
(10, 'biografia', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_14_122914_authors', 1),
(5, '2021_04_14_123242_categories', 1),
(6, '2021_04_14_123602_publishings', 1),
(7, '2021_04_14_125720_create_books_table', 1),
(8, '2021_04_14_130405_create_author_book_table', 1),
(9, '2021_04_15_123851_rents', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('justynskilukasz@gmail.com', '$2y$10$rCGL/fjZdNZl7aT49PKpPumMhkAM85oDJDiIyY88Cp3zGJLUi3LmK', '2021-06-17 16:27:11');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `publishings`
--

CREATE TABLE `publishings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `publishings`
--

INSERT INTO `publishings` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Greg', NULL, NULL),
(3, 'testowe', '2021-05-31', '2021-05-31');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rents`
--

CREATE TABLE `rents` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking` date DEFAULT NULL,
  `booking_end` date DEFAULT NULL,
  `rent_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `returned` date DEFAULT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `rents`
--

INSERT INTO `rents` (`id`, `booking`, `booking_end`, `rent_date`, `return_date`, `returned`, `book_id`, `user_id`, `updated_at`, `created_at`) VALUES
(18, NULL, NULL, '2021-05-21', '2021-05-28', '2021-06-02', 10, 3, '2021-05-21', '2021-05-21'),
(20, NULL, NULL, '2021-05-21', '2021-05-28', NULL, 15, 3, '2021-05-21', '2021-05-21'),
(21, NULL, NULL, '2021-05-21', '2021-05-28', NULL, 5, 2, '2021-05-21', '2021-05-21'),
(22, NULL, NULL, '2021-05-23', '2021-05-30', NULL, 12, 2, '2021-05-23', '2021-05-23'),
(23, NULL, NULL, '2021-05-31', '2021-06-07', NULL, 10, 2, '2021-05-31', '2021-05-31'),
(25, NULL, NULL, '2021-05-31', '2021-06-07', NULL, 5, 3, '2021-05-31', '2021-05-31'),
(26, '2021-06-06', '2021-06-08', '2021-06-07', '2021-06-14', '2021-06-07', 1, 2, '2021-06-07', '2021-06-06'),
(28, '2021-06-07', '2021-06-09', NULL, NULL, NULL, 1, 2, '2021-06-07', '2021-06-07'),
(29, '2021-06-07', '2021-06-09', NULL, NULL, NULL, 1, 3, '2021-06-07', '2021-06-07'),
(30, '2021-09-23', '2021-09-25', NULL, NULL, NULL, 5, 1, '2021-09-23', '2021-09-23'),
(31, '2021-10-06', '2021-10-08', NULL, NULL, NULL, 15, 2, '2021-10-06', '2021-10-06'),
(32, '2021-10-19', '2021-10-21', NULL, NULL, NULL, 28, 2, '2021-10-19', '2021-10-19');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `rents` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `admin`, `rents`) VALUES
(1, 'admin', 'admin', 'admin123@gmail.com', '$2y$10$4AoZtt8oeWJuO5wWuEb6Tu6FyPcDLHJZchVE79etkgW7DStKH.kmm', 1, 1),
(2, 'Łukasz', 'Justyński', 'justynskilukasz@gmail.com', '$2y$10$m.ZrzF1KDkbF.VHEUBsfme7K2ypA7t3sVPMnHPmoLoYFkA4XWmY3O', NULL, 5),
(3, 'test', 'test', 'test1@test.com', '$2y$10$0FIeU7Ip/7ZFDuBW.DBH/ubds301yEB/BVaU8DMFzaEvbcS/jGlKm', NULL, 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `authors_books`
--
ALTER TABLE `authors_books`
  ADD KEY `authors_books_book_id_foreign` (`book_id`),
  ADD KEY `authors_books_author_id_foreign` (`author_id`);

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbn_unique` (`isbn`),
  ADD UNIQUE KEY `books_title_unique` (`title`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_publishing_id_foreign` (`publishing_id`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `publishings`
--
ALTER TABLE `publishings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rents_book_id_foreign` (`book_id`),
  ADD KEY `rents_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `publishings`
--
ALTER TABLE `publishings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `rents`
--
ALTER TABLE `rents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `authors_books`
--
ALTER TABLE `authors_books`
  ADD CONSTRAINT `authors_books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `authors_books_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `books_publishing_id_foreign` FOREIGN KEY (`publishing_id`) REFERENCES `publishings` (`id`) ON DELETE SET NULL;

--
-- Ograniczenia dla tabeli `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `rents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
