-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2025 at 12:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Populer', NULL, '2025-06-21 21:17:35', '2025-06-21 21:17:35'),
(2, 'Nasional', NULL, '2025-06-21 21:17:42', '2025-06-21 21:17:42'),
(3, 'Global', NULL, '2025-06-21 21:17:48', '2025-06-21 21:19:04'),
(4, 'Olahraga', NULL, '2025-06-21 21:18:07', '2025-06-21 21:18:07'),
(5, 'Hiburan', NULL, '2025-06-21 21:18:15', '2025-06-21 21:18:15'),
(6, 'Ekonomi', NULL, '2025-06-21 21:18:38', '2025-06-21 21:18:38'),
(7, 'Teknologi', NULL, '2025-06-21 21:18:50', '2025-06-21 21:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_news`
--

INSERT INTO `category_news` (`id`, `news_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 2, NULL, NULL),
(7, 3, 5, NULL, NULL),
(8, 4, 1, NULL, NULL),
(9, 4, 2, NULL, NULL),
(10, 5, 2, NULL, NULL),
(11, 6, 2, NULL, NULL),
(12, 6, 7, NULL, NULL),
(13, 7, 1, NULL, NULL),
(14, 7, 2, NULL, NULL),
(15, 7, 6, NULL, NULL),
(16, 8, 1, NULL, NULL),
(17, 8, 2, NULL, NULL),
(18, 8, 6, NULL, NULL),
(19, 9, 1, NULL, NULL),
(20, 9, 2, NULL, NULL),
(21, 10, 1, NULL, NULL),
(22, 10, 3, NULL, NULL),
(23, 10, 7, NULL, NULL),
(24, 11, 1, NULL, NULL),
(25, 11, 3, NULL, NULL),
(26, 12, 1, NULL, NULL),
(27, 12, 3, NULL, NULL),
(28, 13, 1, NULL, NULL),
(29, 13, 3, NULL, NULL),
(30, 13, 6, NULL, NULL),
(31, 14, 1, NULL, NULL),
(32, 14, 3, NULL, NULL),
(33, 15, 3, NULL, NULL),
(34, 16, 2, NULL, NULL),
(35, 16, 6, NULL, NULL),
(36, 17, 3, NULL, NULL),
(37, 18, 3, NULL, NULL),
(38, 18, 7, NULL, NULL),
(39, 19, 2, NULL, NULL),
(40, 20, 3, NULL, NULL),
(41, 20, 6, NULL, NULL),
(44, 22, 4, NULL, NULL),
(45, 22, 5, NULL, NULL),
(46, 23, 1, NULL, NULL),
(47, 23, 3, NULL, NULL),
(48, 23, 4, NULL, NULL),
(49, 24, 4, NULL, NULL),
(50, 24, 5, NULL, NULL),
(51, 25, 1, NULL, NULL),
(52, 25, 3, NULL, NULL),
(53, 25, 7, NULL, NULL),
(54, 26, 3, NULL, NULL),
(55, 26, 7, NULL, NULL),
(56, 27, 3, NULL, NULL),
(57, 27, 7, NULL, NULL),
(58, 28, 4, NULL, NULL),
(59, 28, 5, NULL, NULL),
(60, 29, 1, NULL, NULL),
(61, 29, 2, NULL, NULL),
(62, 29, 4, NULL, NULL),
(63, 29, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `news_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(2, NULL, 29, 2, 'tes', '2025-07-07 07:13:20', '2025-07-07 07:13:20'),
(3, 2, 29, 2, 'dsds', '2025-07-07 07:13:33', '2025-07-07 07:13:33'),
(7, NULL, 29, 3, 'Keren banget', '2025-07-09 05:58:09', '2025-07-09 05:58:09'),
(9, 7, 29, 3, 'asd', '2025-07-09 06:24:57', '2025-07-09 06:24:57'),
(14, 2, 29, 3, '@Rafli, ngetik apasih', '2025-07-09 07:10:56', '2025-07-09 07:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `comment_reactions`
--

CREATE TABLE `comment_reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reaction` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_reactions`
--

INSERT INTO `comment_reactions` (`id`, `comment_id`, `user_id`, `reaction`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, '2025-07-07 07:16:57', '2025-07-09 08:16:21'),
(2, 2, 3, 1, '2025-07-07 07:17:52', '2025-07-07 07:17:52'),
(4, 3, 3, 1, '2025-07-09 05:28:50', '2025-07-09 05:28:50'),
(5, 7, 3, -1, '2025-07-09 06:45:28', '2025-07-09 07:24:25'),
(6, 7, 2, 1, '2025-07-09 08:16:26', '2025-07-09 08:16:26'),
(7, 14, 2, 1, '2025-07-10 04:01:21', '2025-07-10 04:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_05_31_080433_create_categories_table', 1),
(6, '2025_05_31_080534_create_news_table', 1),
(7, '2025_05_31_080637_create_comments_table', 1),
(8, '2025_05_31_113718_add_gambar_to_news_table', 1),
(9, '2025_05_31_162752_create_category_news_table', 1),
(10, '2025_06_15_140259_add_views_to_news_table', 1),
(11, '2025_07_07_125007_create_comment_reactions_table', 1),
(12, '2025_07_07_130653_add_parent_id_to_comments_table', 1),
(13, '2025_07_07_141224_add_comment_id_to_comment_reactions_table', 2),
(14, '2025_07_07_141411_add_user_id_to_comment_reactions_table', 3),
(15, '2025_07_07_141612_add_reaction_to_comment_reactions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `gambar`, `views`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'Tingkat Pengelolaan Sampah di Indonesia Baru 10 Persen', 'Berdasarkan hasil verifikasi lapangan oleh Kementerian Lingkungan Hidup (KLH)/Badan Pengendalian Lingkungan Hidup (BPLH), pengelolaan sampah di berbagai wilayah Indonesia baru mencapai sekitar 10 persen. \r\n\r\nDalam Rakornas Pengelolaan Sampah di Jakarta, dikutip dari kantor berita Antara, Minggu (22/6), Menteri LH/Kepala BPLH Hanif Faisol Nurofiq menyampaikan berdasarkan Sistem Informasi Pengelolaan Sampah Nasional (SIPS) pengelolaan sampah baru mencapai 39,01 persen dan 343 tempat pemrosesan akhir (TPA) kemudian mendapatkan sanksi paksaan pemerintah agar dilakukan perbaikan. \r\n\r\n“Namun, dengan diberikan sanksi administrasi pemerintah kami telah menurunkan seluruh jajaran kami untuk berkunjung ke TPA paling tidak di 343 TPA, ternyata hasilnya berbeda dari angka yang disampaikan dalam Sistem Informasi Pengelolaan Sampah Nasional,” jelasnya. \r\n\r\n“Berdasarkan verifikasi yang kita lakukan di seluruh TPA di Tanah Air ternyata capaian (pengelolaan) sampah kita baru mencapai 9 sampai 10 persen,” tambah Hanif. \r\n\r\nAngka itu didapat dari keberadaan dan kapasitas fasilitas pemulihan/daur ulang material atau recovery facility di masing-masing TPA yang dikelola pemerintah daerah dan seberapa besar optimalisasi penggunaannya. \r\n\r\nTerkait hal itu, dia menyampaikan apresiasi kepada kepala daerah yang menghadiri Rakornas Pengelolaan Sampah yang dilaksanakan sebagai di sela-sela Hari Lingkungan Hidup 2025 Expo dan Forum tersebut. \r\n\r\nRapat koordinasi itu dilakukan agar Indonesia dapat mencapai 100 persen pengelolaan sampah pada 2029, sesuai dengan yang ditargetkan dalam Perpres Nomor 12 Tahun 2025 tentang Rencana Pembangunan Jangka Menengah Nasional (RPJMN). Berdasarkan data KLH/BPLH, rantai penanganan sampah Indonesia rata-rata masih menggunakan layanan linier yaitu kumpul-angkut buang. TPA sampah secara nasional diproyeksikan akan mencapai maksimal atau melebihi kapasitas pada 2030 jika tidak ada upaya maksimal untuk memastikan pengelolaan.', 'images/thumbnail/SaKUaZXizgjDvnOEicpVFYP8EYMEBcIfaqolQl3y.png', 0, 2, '2025-06-21 21:25:43', '2025-06-21 21:26:59'),
(2, 'Menuju 500 Tahun Jakarta: Penyiaran sebagai Infrastruktur Budaya', 'Hari ini tanggal 22 Juni Jakarta memasuki usia ke-498 tahun. Menuju ke-500 pada 22 Juni 2027 akan datang, Jakarta memasuki fase penting dalam lintasan sejarah.\r\n\r\nSejak berdiri sebagai Jayakarta tahun 1527, kota ini telah menjadi simbol perlawanan terhadap kolonialisme dan berkembang sebagai simpul urban terbesar di Indonesia, bahkan Asia Tenggara.\r\n\r\nLima abad perjalanan bukan sekadar penanda waktu, melainkan momentum untuk memaknai kembali posisi Jakarta sebagai kota budaya, kota global, dan kota masa depan.\r\n\r\nMengusung tema \"Jakarta Kota Global dan Berbudaya\", transformasi ke arah kemajuan menjadi tujuan bersama.\r\n\r\nMenegaskan bahwa kota global tidak dibangun hanya dengan infrastruktur fisik. Identitas kota tidak sekadar ditentukan oleh gedung pencakar langit dan jaringan transportasi, tetapi juga oleh kekuatan naratifnya.\r\n\r\nDi sinilah peran penyiaran menjadi strategis sebagai arsitek identitas kultural dan sosial kota.\r\n\r\n\r\nMelalui media televisi, radio, serta platform digital, Jakarta memiliki peluang besar untuk menegaskan eksistensi sebagai kota inklusif, berdaya saing global, namun tetap berakar kuat pada budayanya.\r\n\r\nPenyiaran menjadi medium utama dalam memperkuat identitas lokal, membangun konektivitas sosial, dan mengomunikasikan nilai-nilai ke-Indonesiaan kepada dunia.\r\n\r\nJakarta: Kota Global yang Berkultur Lokal\r\n\r\nBerdasarkan data Geographic Information System (GIS) Disdukcapil Kemendagri, jumlah penduduk Jakarta per 31 Desember 2024 mencapai 11,04 juta jiwa, mencakup sekitar 3,87 persen dari total populasi Indonesia yang mencapai 284,97 juta jiwa. Jakarta adalah miniatur Indonesia, tempat bertemunya berbagai etnis dan budaya dalam satu simpul metropolitan.\r\n\r\nJakarta tidak hanya menjadi pusat ekonomi (dengan kontribusi 17 persen terhadap PDB nasional) dan pemerintahan, tetapi juga barometer gaya hidup serta kebudayaan nasional. Dalam keberagamannya, kota ini memiliki kekayaan budaya yang luar biasa.\r\n\r\nNamun tantangan terbesarnya adalah membangun identitas kultural yang kuat sebagai dasar menjadi kota global. Disini Penyiaran berperan sebagai kurator budaya, mengangkat nilai-nilai lokal dan menjadikannya narasi bersama warga serta etalase budaya ke kancah internasional.\r\n\r\nPenyiaran: Infrastruktur Kultural Menuju Kota Global\r\n\r\nKomisi Penyiaran Indonesia Daerah (KPID) Jakarta mencatat, hingga 2025 terdapat lebih dari 70 lembaga penyiaran di Jakarta (38 televisi dan 39 radio), belum termasuk platform digital. Namun, realisasi kewajiban kuota konten lokal minimal 10 persen masih belum optimal. Ini menjadi tantangan serius di tengah kompetisi media digital yang begitu dinamis.\r\n\r\nPengalaman dari kota-kota global menunjukkan bahwa penyiaran lokal dapat menjadi kekuatan budaya yang strategis. Seoul, Tokyo, Paris, dan Istanbul membuktikan bahwa siaran lokal mampu memperkuat citra kota sekaligus menjadi instrumen diplomasi budaya.\r\n\r\nKorea Selatan, misalnya, memberlakukan kewajiban siaran konten budaya nasional (K-pop, K-drama) sebesar 40–60 persen terutama pada jam tayang utama.\r\n\r\nLembaga penyiaran seperti KBS, MBC, SBS dan Arirang TV menjadi garda terdepan dalam menyebarkan budaya Korea secara global, didukung penuh oleh KOCCA (Korea Creative Content Agency) yang mendanai dan melatih kreator konten lokal.\r\n\r\nJepang memiliki dua kota budaya: Tokyo untuk budaya pop modern (anime, musik J-pop, teknologi digital), dan Kyoto sebagai pusat budaya tradisional (seni klasik, budaya Zen, kuliner, arsitektur). Setiap prefektur diwajibkan menyiarkan konten lokal dalam bahasa Jepang atau dialek daerah. Pemerintah pusat melalui METI (Ministry of Economy, Trade and Industry) dan Agency for Cultural Affairs menyediakan hibah untuk mendukung produksi lokal.\r\n\r\nDi Prancis, Paris menjadi kota seni dan budaya Eropa, dengan pengaruh kuat di dunia film, sastra, dan musik klasik. Memanfaatkan France Television dan TV5 Monde untuk menyebarkan budaya Prancis ke seluruh dunia. Undang-undang mensyaratkan 60 persen siaran berbahasa Prancis, dengan 40 persen di antaranya merupakan konten lokal.\r\n\r\nIstanbul di Turkiye, dikenal sebagai kota budaya yang menjembatani budaya Timur dan Barat. Sekaligus eksportir budaya melalui penyiaran juga berhasil mengekspor serial drama ke lebih dari 150 negara, dengan dukungan regulasi informal dan insentif produksi lokal.\r\n\r\nBelajar dari pengalaman tersebut, Jakarta memiliki potensi untuk mengembangkan strategi penyiaran budaya serupa. Dengan dukungan regulasi daerah, insentif ekonomi, dan sinergi lintas sektor, penyiaran Jakarta dapat menjadi pilar penting dalam membangun citra kota global yang berakar pada nilai-nilai lokal.\r\n\r\nPenyiaran sebagai Etalase dan Identitas\r\n\r\nPerayaan Jakarta 500 Tahun menjadi momentum strategis bagi dunia penyiaran. Ini bukan sekadar panggung festival, tetapi kesempatan untuk menampilkan narasi kota kepada dunia. Penyiaran harus berperan sebagai penjaga memori kolektif, pelestari budaya, dan penghubung antara masa lalu, masa kini, dan masa depan.\r\n\r\nPertama, penyiaran harus menjadi cermin keberagaman kota. Narasi tentang Betawi sebagai identitas lokal utama perlu diperkuat, tentu dengan tetap membuka ruang bagi budaya lain untuk tampil secara inklusif dan sinergis. Program budaya lokal yang mengangkat bahasa, musik, dan kisah warga akan memperkuat rasa kebersamaan dan memperkaya wawasan publik.\r\n\r\nTelevisi dan radio dapat menghidupkan kembali dokumenter sejarah kota, cerita tokoh lokal, dan refleksi budaya Jakarta. Sinetron legendaris seperti Si Doel Anak Sekolahan adalah contoh kuat bagaimana cerita lokal bisa membentuk identitas bersama.\r\n\r\nJakarta membutuhkan lebih banyak produksi serupa yang menampilkan sejarah, nilai, dan perjuangan kota, misalnya kisah Pangeran Jayakarta atau kehidupan urban masyarakat Jakarta dalam format modern di platform TV dan OTT.\r\n\r\nKedua, Jakarta perlu menjadi etalase budaya Indonesia. Penyiaran di Jakarta harus berstandar internasional. Produksi dokumenter \"Jakarta 500 Tahun\" dapat menjadi proyek kolaboratif yang ditayangkan di media nasional dan internasional. Film, animasi, dan serial budaya dengan kualitas ekspor harus menjadi agenda bersama, tentu dengan dukungan anggaran dan kebijakan dari pemerintah provinsi.\r\n\r\nDi tengah kondisi media nasional yang sedang kritis, dukungan ini menjadi krusial. Kapasitas produksi konten budaya yang bisa menjangkau dunia perlu diperkuat, termasuk siaran multibahasa, program sejarah, dan promosi budaya kota melalui berbagai platform. Gagasan menjadikan Jakarta sebagai Kota Film oleh Wakil Gubernur Rano Karno adalah inisiatif yang perlu segera diwujudkan secara nyata.\r\n\r\nKetiga, penyiaran harus membangun ketahanan sosial. Jakarta sangat rentan terhadap polarisasi sosial dan informasi yang tidak diverifikasi. Penyiaran memiliki peran sebagai penjernih informasi, pelurus hoaks, serta pemersatu masyarakat. Melalui tayangan edukatif, informatif sekaligus menghibur, media penyiaran dapat menguatkan kohesi sosial yang makin penting di era digital.\r\n\r\nPenyiaran berperan menjaga anak bangsa agar tidak tercerabut dari akar budaya. Televisi, radio, podcast, media sosial, dan kanal digital dapat menjaga anak muda Jakarta dengan akar budayanya.\r\n\r\nPemerintah bersama KPID, lembaga penyiaran, dan komunitas kreatif harus mendorong produksi konten disemua platform bertema \"Jakarta Masa Depan, Budaya dan Tantangan Zaman\", dengan format yang segar dan inspiratif, selain memperkuat literasi dan edukasi di masyarakat kota.\r\n\r\nDari Kota Administrasi ke Kota Narasi\r\n\r\nKota yang besar tidak hanya ditentukan oleh bangunannya, tetapi juga oleh jiwanya. Tanpa narasi kultural yang kuat, Jakarta hanyalah deretan beton dan statistik. Melalui penyiaran, Jakarta dapat memancarkan identitasnya sebagai kota global yang bercita rasa lokal.\r\n\r\nUlang tahun ke-500 adalah saat yang tepat bagi Pemerintah Provinsi DKI Jakarta, KPID, dan ekosistem media untuk bersinergi membangun konvergensi antara budaya dan teknologi. Penyiaran harus ditempatkan sebagai infrastruktur budaya, penopang identitas kota, serta instrumen diplomasi budaya Jakarta di mata dunia.\r\n\r\nKPID Jakarta percaya bahwa penyiaran bukan sekadar media teknis, melainkan cermin jiwa kota. Kini saatnya Jakarta menyiarkan. Bukan hanya untuk didengar dan disaksikan, tetapi untuk dikenang dan dibanggakan oleh dunia.\r\n\r\nSelamat Ulang Tahun Kota Jakarta ke-498 Tahun. Melalui penyiaran, dari Jakarta untuk Indonesia dan dunia. “Sebab tak ada budaya yang tumbuh dalam diam. Hanya lewat identitas yang disiarkan, sebuah kota dapat merebut tempatnya dalam ingatan.\r\n\r\n*Rizky Wahyuni, Wakil Ketua KPID Jakarta', 'images/thumbnail/3rXEdupjb2xBI1uqU9eqyikb9BczTqMmJqi1lwcI.png', 0, NULL, '2025-06-21 21:55:46', '2025-06-21 21:55:46'),
(3, 'Perayaan HUT ke-498 Jakarta di Ancol dengan ‘Wonder of Jakarta’', 'Perayaan hari ulang tahun (HUT) ke-498 Jakarta digelar meriah secara serentak di beberapa lokasi pada Ahad, 22 Juni 2025. Salah satu tempat perayaan itu adalah di Ancol Taman Impian, Jakarta Utara.\r\n\r\nCorporate Communication PT Pembangunan Jaya Ancol Tbk, Daniel Windriatmoko, mengatakan bahwa Taman Impian menghadirkan rangkaian acara yang tidak hanya menghibur, tetapi juga merefleksikan keberagaman, inovasi, dan semangat kolaborasi warga Jakarta. Mengusung tema \"Wonder of Jakarta\", perayaan HUT Jakarta di Ancol diramaikan dengan serangkaian kegiatan seni dan budaya. Acara dimulai pukul 18.30 WIB di Pantai Festival Ancol dengan suguhan Jakarta Berdendang Ria.\r\n\r\nDaniel mengajak seluruh warga Jakarta untuk merayakan dengan bernyanyi bersama dan berjoget bersama di Ancol Taman Impian dengan menampilkan Orkes Dangdut Nusantara.\r\n\r\nAkulturasi Budaya di Batavia Fest\r\nSelain itu, unit rekreasi Dunia Fantasi atau Dufan juga ikut merayakan kemeriahan HUT Jakarta dengan acara Batavia Fest yang dimulai pukul 10.00 hingga 20.00 WIB. Batavia Fest menyajikan acara-acara yang mencerminkan perjalanan akulturasi budaya dari zaman Hindia Belanda sampai menjadi era Batavia.\r\n\r\nMenurut Daniel, Batavia Fest ini dibuka dengan Palang Pintu, kemudian Penampilan Abang Mpok Jakarta, dilanjutkan Pergelaran Teatrikal \"Journey to Batavia Parade\" yang diiringi gerak tari Batavia Dance.\r\n\r\n\"Kegiatan ini ditutup dengan sajian Firework Show atau pesta kembang api pada malam harinya,\" kata dia.\r\n\r\nPameran Seni Jakarta Local Soul\r\nSelain itu, juga digelar Pameran Seni \"Jakarta Local Soul\" sebagai wujud ekspresi para seniman untuk memberi Warna Jakarta menuju Kota Global dan Berbudaya. Pameran ini mengajak untuk merefleksikan bagaimana Jakarta bisa menjadi laboratorium inklusif yang memadukan identitas budaya lokal dengan visi kebangsaan. Ada sekitar 41 seniman komunitas Pasar Seni Ancol merespon merefleksikan Jakarta berbagai karya mulai dari lukisan, patung, seni kerajinan, batik dan lainnya.\r\n\r\nKarya ini berperan sebagai perekat perbedaan menjadi sebuah kain kebersamaan yang indah. \"Pameran Seni \'Jakarta Local Soul\' ini terbuka untuk masyarakat berlangsung di Galeri Pasar Seni tanggal 22 Juni – 06 Juli 2025,\" kata Daniel.\r\n\r\nAdapun puncak perayaan HUT Jakarta dipusatkan di Taman Lapangan Banteng, Jakarta Pusat. Perayaan ini akan dimeriahkan pertunjukan seni dan budaya Betawi, teater, tari-tarian, parade budaya, hingga panggung hiburan yang diramaikan oleh musisi terkenal kota Jakarta.', 'images/thumbnail/0RGSa5CbEIjoXkuofWnMy6wamzUS45EYYRvfvbhQ.png', 0, NULL, '2025-06-21 21:57:39', '2025-06-21 21:57:39'),
(4, 'Pergerakan Jemaah Haji Indonesia ke Madinah Berjalan Lancar', 'Direktur Jenderal Penyelenggaraan Haji dan Umroh (Dirjen PHU), Hilman Latief mengatakan, proses pergerakan jemaah haji Indonesia setelah puncak haji, dari Makkah ke Madinah berlangsung lancar. Sejak 18 Juni 2025, sebagian jemaah sudah mulai mengisi hotel-hotel di Madinah sesuai kloter mereka.\r\n\r\nMenurut Hilman Latief, pergerakan ini adalah bagian dari fase pemulangan jemaah ke Tanah Air yang tahun ini dilaksanakan melalui dua jalur, yakni Bandara King Abdul Aziz, Jeddah dan Bandara Amir Muhammad bin Abdul Aziz, Madinah.\r\n\r\nBACA JUGA\r\nNovel Baswedan Minta Kasus Korupsi Penyelenggaraan Haji Diusut Tuntas\r\nIM57+ Tak Heran Kuota Haji Dikorupsi, Peminatnya Sangat Besar\r\nKPK Sebut Dugaan Korupsi Haji Terjadi Sebelum 2024\r\n“Alhamdulillah perjalanan lancar sesuai dengan yang kita harapkan. Jemaah sudah bisa bergerak dari Makkah kembali ke kloternya masing-masing dan di sini (Madinah) juga mereka ditempatkan di hotel berdasarkan kloternya. Sehingga diharapkan bisa lebih mudah nanti pada saat kepulangan untuk kembali ke tanah air,” ujar Hilman dikutip, Minggu (22/6/2025)\r\n\r\nAlhamdulillah ini sudah berjalan dengan baik, tidak banyak halangan dan rintangan,” imbuh dia.\r\n\r\nPersoalan beberapa paspor yang sempat muncul juga, menurutnya telah diselesaikan. Secara umum, transportasi dari Makkah ke Madinah menggunakan bus besar berjalan lancar. Dalam sehari, bisa mencapai 3-4 kloter dengan puluhan bus mengantarkan jemaah haji.\r\n\r\nDi Madinah, lanjut Hilman, jemaah menjalankan ibadah termasuk salat di Masjid Nabawi, dan ziarah ke lokasi-lokasi bersejarah. Pemerintah Indonesia melalui Misi Haji, ujar Hilman, juga terus mengupayakan agar seluruh jemaah memperoleh tasreh (izin) untuk masuk ke Raudhah, salah satu tempat mustajab berdoa di Masjid Nabawi.\r\n\r\n“Di Madinah Alhamdulillah secara umum sangat baik, lancar, jemaah sangat tenang. Memang juga secara cuaca dan medan tidak seberat di Makkah. Jadi mereka bisa berjalan kaki semuanya ke Masjid Nabawi untuk beribadah,” tandasnya.sinpo', 'images/thumbnail/huVTrGPcclwhhUsUuyb4pAqOfABKCbv127uv7bQb.png', 0, NULL, '2025-06-21 22:01:06', '2025-06-21 22:01:06'),
(5, 'Pram Singgung Korupsi Sritex saat Peluncuran Nama Baru Bank Jakarta', 'Gubernur DKI Jakarta Pramono Anung menyinggung kasus dugaan korupsi pemberian fasilitas kredit dari perbankan kepada PT Sritex saat agenda peresmian logo dan nama baru Bank DKI menjadi Bank Jakarta.\r\nPramono mengatakan logo dan nama baru Bank Jakarta diharapkan menjadi momentum untuk berbenah diri menjadi lebih baik.\r\n\r\n\"Saya sangat berkeinginan untuk Bank Jakarta mereformasi dirinya, memperbaiki akar-akarnya, dan tidak boleh terulang kembali sampai peristiwa yang terjadi seperti di Sritex. Enggak boleh lagi. Profesionalisme adalah menjadi kata kunci,\" kata Pramono di Taman Literasi, Jakarta, Minggu (22/6).\r\n\r\nKarenanya, Pramono meminta seluruh jajaran Bank Jakarta selalu melakukan pertimbangan secara matang dalam membuat keputusan.\r\n\r\n\"Check and balance menjadi kata kunci, sehingga memutuskan sesuatu harus prudent. Harus yakin. Tidak bisa dengan karena dilakukan lobi-lobi dan sebagainya,\" ucap dia.\r\n\r\nLebih lanjut, Pramono kembali mengingatkan kepada seluruh jajaran Bank Jakarta untuk bekerja secara profesional dan transparan.\r\n\r\n\"Sebelum secara resmi Bank Jakarta ini nanti kita munculkan, saya sekali lagi menawarkan perhatian, jawablah dengan profesionalitas, kerja keras, transparansi,\" ujarnya.\r\n\r\nKasus dugaan korupsi pemberian fasilitas kredit perbankan kepada PT Sritex menyeret Direktur Utama Bank DKI periode 2020  Zainuddin Mappa sebagai tersangka. Ia ditetapkan sebagai tersangka bersama Eks Dirut PT Sritex Iwan Setiawan Lukminto dan Pemimpin Divisi Komersial dan Korporasi Bank BJB periode 2020, Dicky Syahbandinata.\r\n\r\nKejagung menduga, pemberian kredit kepada PT Sritex dilakukan secara melawan hukum dan menyebabkan adanya kerugian keuangan negara sebesar Rp692,9 miliar dari total tagihan Rp3,5 triliun.\r\n\r\nDirektur Penyidikan Jaksa Agung Muda Bidang Tindak Pidana Khusus Kejagung Abdul Qohar menyebut kerugian negara dalam kasus ini mencapai Rp692 miliar.\r\n\r\nQohar menyebut nilai kerugian itu sesuai besaran kredit dari Bank DKI dan Bank BJB yang seharusnya digunakan sebagai modal kerja. Ia menjelaskan uang kredit yang seharusnya dipakai untuk modal kerja itu justru digunakan untuk membayar utang dan membeli aset non produktif.\r\n\r\n\"Tidak sesuai dengan peruntukan yang seharusnya, yaitu untuk modal kerja tetapi disalahgunakan untuk membayar utang dan membeli aset non-produktif,\" jelasnya.', 'images/thumbnail/OHP4sbeyGXRMHPArZz42vRlKFoiaKKnTJLNQeTdL.png', 0, NULL, '2025-06-21 22:03:26', '2025-06-21 22:03:26'),
(6, 'Kemenkes: 76% Kasus HIV di Indonesia Terkonsentrasi di 11 Provinsi', 'Jakarta: Direktur Penyakit Menular Kementerian Kesehatan Ina Agustina menyampaikan 76 persen kasus HIV di Indonesia terkonsentrasi di 11 provinsi prioritas. Provinsi-provinsi itu yakni Jakarta, Jawa Timur, Jawa Barat, Jawa Tengah, Sumatra Utara, Bali, Papua, Papua Tengah, Sulawesi Selatan, Banten, dan Kepulauan Riau.\r\n\r\nIa menyebut penyebaran kasus HIV secara nasional banyak terjadi di populasi kunci seperti laki-laki seks dengan laki-laki (LSL), waria, pekerja seks perempuan, dan pengguna napza suntik. \r\n\r\n\"Tapi di Papua, penularan sudah menyebar ke populasi umum, dengan prevalensi mencapai 2,3 persen,\" jelas Ina dalam keterangannya, dikutip Minggu, 22 Juni 2025.\r\n\r\nDalam tiga tahun terakhir, positivity rate HIV cenderung stagnan. Namun, kasus infeksi menular seksual (IMS) justru meningkat, termasuk di kelompok usia muda.\r\n\r\nKemenkes mencatat 23.347 kasus sifilis pada tahun lalu, mayoritas merupakan sifilis dini (19.904 kasus), dan 77 di antaranya adalah sifilis kongenital yang menular dari ibu ke bayi. Gonore juga tercatat tinggi dengan 10.506 kasus, terutama di Jakarta.\r\n\r\n\"IMS bukan hanya masalah kesehatan pribadi, ini masalah kesehatan masyarakat. IMS membuka pintu bagi penularan HIV, dan kasus terbanyak terjadi di usia produktif 25-49 tahun, bahkan kini mulai meningkat pada usia remaja 15-19 tahun,\" tegas Ina.\r\n\r\nBerdasarkan data terbaru, Indonesia menempati peringkat ke-14 dunia dalam jumlah orang dengan HIV (ODHIV) dan peringkat ke-9 untuk infeksi baru HIV. ODHIV pada 2025 diperkirakan mencapai sekitar 564 ribu. Namun baru 63 persen yang mengetahui statusnya.\r\n\r\nDari jumlah tersebut, 67 persen telah menjalani terapi antiretroviral (ARV). Hanya 55 persen yang mencapai viral load tersupresi artinya virus tidak terdeteksi dan risiko penularan sangat rendah.', 'images/thumbnail/XblcLUsIvQrrLTa3cirnwSOwpEYUHE0OuR7NLzHC.png', 0, NULL, '2025-06-21 22:04:06', '2025-06-21 22:04:06'),
(7, 'Menyoal Urgensi Perubahan Standar Garis Kemiskinan RI Sesuai Penghitungan Bank Dunia', 'Jakarta- Ketua Dewan Ekonomi Nasional (DEN) Luhut Binsar Pandjaitan mengusulkan agar metode perhitungan tingkat kemiskinan Indonesia direvisi. Luhut menyebut anggotanya telah mulai mengevaluasi angka garis kemiskinan (GK). DEN siap memberikan laporannya kepada Presiden Prabowo Subianto.\r\n\r\nLuhut mengatakan akan berkoordinasi dengan Badan Pusat Statistik (BPS) dalam evaluasi garis kemiskinan. Presiden Prabowo yang akan mengumumkan angka garis kemiskinan baru setelah menyetujui angkanya.\r\n\r\nMenurut Direktur Eksekutif Center of Economic and Law Studies (CELIOS), Bhima Yudhistira, revisi garis kemiskinan nasional mendesak untuk dilakukan karena metode yang digunakan saat ini sudah usang dan tidak lagi mencerminkan kondisi riil di masyarakat.\r\n\r\n\"Revisi garis kemiskinan itu merupakan sebuah kewajiban sekarang ini bagi pemerintah, khususnya Badan Pusat Statistik (BPS), karena metodologi dari BPS untuk menghitung garis kemiskinan itu sudah sangat lama tidak mengalami perubahan,\" ujar Bhima kepada KBR Media, Senin (18/6/2025).\r\n\r\nBhima mengatakan apabila tidak direvisi akan membuat banyak masyarakat miskin justru dikategorikan sebagai kelas menengah. Padahal, dengan perhitungan yang lebih adil, kelompok ini seharusnya berhak menerima berbagai bantuan sosial dan subsidi dari pemerintah.\r\n\r\n\"Banyak orang miskin yang dikategorikan masuk kelas menengah padahal mereka dengan garis kemiskinan yang lebih adil, yang lebih aktual mereka masuk sebagai orang-orang yang berhak mendapatkan bantuan sosial dari pemerintah, bantuan subsidi dari pemerintah juga,\" ungkapnya.\r\n\r\nDirektur Eksekutif Center of Economic and Law Studies (CELIOS), Bhima Yudhistira. Foto: ANTARA\r\n\r\nBhima menyebut kondisi ekonomi Indonesia saat ini sedang tertekan dan daya beli masyarakat melemah. Jika garis kemiskinan diperbarui, jumlah penduduk miskin secara statistik memang akan meningkat, namun hal ini justru memungkinkan bantuan sosial pemerintah lebih tepat sasaran. \r\n\r\nIa menilai pemerintah harus mengumumkan garis kemiskinan baru dalam waktu maksimal dua bulan.\r\n\r\n\"Jadi ini semua harus segera dilakukan karena kondisi ekonomi sekarang sedang tertekan, daya belinya sedang melambat. Nah ini yang memang harus segera dilakukan seharusnya 2 bulan maksimal pemerintah harus bisa mengeluarkan garis kemiskinan yang baru,\" tuturnya.\r\n\r\nRilis Garis Kemiskinan yang digunakan Bank Dunia\r\n\r\nSebelumnya, World Bank mengubah metode penghitungan garis kemiskinan dari standar purchasing power parity (PPP) 2017 ke PPP 2021.\r\n\r\nSetelah revisi ini, garis kemiskinan negara berpendapatan rendah naik dari US$ 2,15 jadi US$ 3 per orang per hari (sekitar Rp 546.400 per orang per bulan).\r\n\r\nSedang garis kemiskinan negara berpendapatan menengah bawah naik dari semula US$ 3,65 menjadi US$ 4,2 per orang per hari (atau sekitar Rp 765.000 per orang per bulan).\r\n\r\nGaris kemiskinan negara berpendapatan menengah atas termasuk Indonesia, naik dari US$ 6,85 menjadi US$ 8,3 per orang per hari (Rp 1,51 juta per orang per bulan).\r\n\r\nSedang garis kemiskinan nasional yang ditetapkan Badan Pusat Statistik (BPS), yakni Rp 595.242 per kapita per bulan. Dengan rata-rata anggota rumah tangga miskin sebesar 4,71 orang, maka total pengeluaran minimum satu keluarga miskin mencapai Rp 2,8 juta per bulan.', 'images/thumbnail/O5v6AjcRO134Lraaojsv8GnzFdcvtBNmQ690mgf9.png', 0, NULL, '2025-06-21 22:05:06', '2025-06-21 22:05:06'),
(8, 'Bank Dunia: Data BPS Paling Tepat Ukur Tingkat Kemiskinan RI', 'Bank Dunia resmi memperbarui garis kemiskinan global tahun ini. Dalam laman resminya, lembaga tersebut menegaskan pentingnya pembaruan ini untuk memastikan pengukuran kemiskinan tetap mencerminkan kondisi global terkini. Langkah ini membuat sebagian besar negara, termasuk Indonesia, melihat lonjakan signifikan dalam angka kemiskinan berdasarkan standar internasional.\r\n\r\nTiga garis kemiskinan internasional yang kini digunakan masing-masing mencerminkan standar hidup di negara berpendapatan rendah, menengah ke bawah (LMIC), dan menengah ke atas (UMIC). Untuk Indonesia, hasilnya mencolok, sebanyak 5,4 persen penduduk tergolong miskin secara ekstrem (berdasarkan standar negara berpendapatan rendah), 19,9 persen tergolong miskin menurut standar LMIC, dan 68,3 persen menurut garis UMIC.\r\n\r\nNamun, angka-angka ini tidak berarti bahwa kemiskinan di Indonesia memburuk. Angka yang tampak lebih tinggi tersebut justru mencerminkan ambang batas yang juga meningkat secara global, seiring dengan meningkatnya standar hidup minimum yang diterapkan banyak negara.\r\n\r\nDi tengah kompleksitas standar dan garis kemiskinan ini, Bank Dunia menekankan, garis kemiskinan nasional Indonesia yang diterbitkan Badan Pusat Statistik (BPS) tetap menjadi tolok ukur paling relevan untuk perumusan kebijakan dalam negeri.\r\n\r\n“Untuk pertanyaan-pertanyaan mengenai kebijakan nasional di Indonesia, garis kemiskinan nasional dan statistik kemiskinan yang diterbitkan oleh Badan Pusat Statistik (BPS) adalah yang paling tepat sebagai tolok ukur,” tulis Bank Dunia dalam laporan Bank Dunia Memperbarui Garis Kemiskinan Global: Indonesia, dikutip Minggu (22/6).\r\n\r\nGaris kemiskinan resmi Indonesia sendiri ditetapkan secara provinsi, dan dibedakan antara wilayah perkotaan dan perdesaan. Per September 2024, tingkat kemiskinan nasional tercatat sebesar 8,57 persen.\r\n\r\nGaris kemiskinan ekstrem internasional yang baru, untuk negara-negara berpendapatan rendah, kini ditetapkan sebesar USD 3 per hari (setara dengan sekitar Rp 546.400 per bulan setelah memperhitungkan biaya hidup di Indonesia). Dalam hal ini, Bank Dunia menggunakan data yang sama dengan pemerintah Indonesia untuk mengukur kemiskinan, yaitu data SUSENAS. Namun, pendekatannya berbeda.\r\n\r\n“Bank Dunia menggunakan survei resmi nasional, SUSENAS, untuk mengukur kemiskinan pada garis kemiskinan internasional, sumber data yang sama yang digunakan oleh Pemerintah Indonesia untuk statistik kemiskinan nasional,” ungkapnya.\r\n\r\nPerbedaannya terletak pada penyesuaian harga yang dilakukan oleh Bank Dunia dari aspek waktu, lokasi geografis, hingga antarnegara, sesuatu yang tidak diterapkan dalam garis nasional.\r\n\r\nDua garis kemiskinan internasional lainnya didefinisikan sebagai nilai tipikal garis kemiskinan nasional di antara negara-negara LMIC, yang ditetapkan sebesar USD 4,20 per hari (sekitar Rp 765.000 per orang per bulan), dan di antara negara-negara UMIC sebesar USD 8,30 per hari (sekitar Rp 1.512.000 per orang per bulan).\r\n\r\nPenting untuk dicatat bahwa pengukuran kemiskinan dengan standar internasional bertujuan untuk melihat posisi Indonesia secara global, bukan sebagai dasar kebijakan dalam negeri.\r\n\r\n“Garis kemiskinan internasional yang diterbitkan oleh Bank Dunia sesuai digunakan untuk memantau kemiskinan global dan membandingkan Indonesia dengan negara lain atau standar global,” kata Bank Dunia.\r\n\r\nPerubahan garis kemiskinan global ini juga bertepatan dengan transisi Indonesia yang kini diklasifikasikan sebagai negara berpendapatan menengah ke atas (UMIC) sejak 2023. Dalam kelompok ini, terdapat negara-negara dengan PDB per kapita hingga USD 14.005 dolar hampir tiga kali lipat dari PDB Indonesia yang masih di angka USD 4.810 dolar.\r\n\r\nDengan lonjakan standar, lebih banyak penduduk Indonesia yang kini dikategorikan sebagai miskin menurut garis UMIC, dibandingkan saat Indonesia masih berada di kelas LMIC. Meski demikian, kemajuan jangka panjang Indonesia tetap diakui.\r\n\r\n“Kemajuan Indonesia yang stabil dalam mengurangi kemiskinan selama empat dekade merupakan sebuah pola yang menonjol dalam definisi yang digunakan sebelumnya dan tetap menonjol menggunakan garis kemiskinan terbaru,” tulis Bank Dunia.', 'images/thumbnail/kSHvR8Q3tdYgAr522oTyKJ28ZA8Jg9ZZPv3tuKQJ.png', 0, NULL, '2025-06-21 22:07:29', '2025-06-21 22:07:29'),
(9, 'KLH masih dalami potensi kerusakan akibat tambang di Raja Ampat', 'Jakarta (ANTARA) - Menteri Lingkungan Hidup (LH) Hanif Faisol Nurofiq mengatakan pihaknya masih mendalami potensi kerusakan yang timbul akibat aktivitas pertambangan nikel di kawasan Raja Ampat sebagai bagian dari pengawasan ketat yang diminta Presiden Prabowo.\r\n\r\nDitemui usai pembukaan Hari Lingkungan Hidup 2025 Expo dan Forum di Jakarta, Minggu, Menteri LH/Kepala Badan Pengendalian Lingkungan Hidup (BPLH) Hanif mengatakan Presiden Prabowo Subianto sudah melalukan langkah luar biasa dengan memutuskan pencabutan empat Izin Usaha Pertambangan (IUP) dari lima perusahaan yang berada di Raja Ampat, Papua Barat Daya.\r\n\r\n\"Saat ini tim sedang melakukan penelitian lebih detail. Sample sudah kami ambil, para ahli sudah didatangkan untuk kemudian merumuskan dan mudah-mudahan satu bulan sudah ada hasil,\" kata Menteri LH Hanif Faisol.\r\n\r\nBaca juga: Menteri LH ingatkan ada gangguan keanekaragaman hayati di Raja Ampat\r\n\r\n\"Memang secara kasat mata kita sudah bisa melihat kerusakannya. Namun, secara saintifik memang harus dibuktikan dulu, baik melalui lab maupun dengan para ahli,\" tambahnya.\r\n\r\n\r\nDia mengatakan proses pendalaman dampak kerusakan oleh para ahli itu diperkirakan akan menghabiskan waktu sekitar satu bulan. Ketika sudah mendapatkan hasil dari laboratorium tersebut, maka pihaknya akan segera melakukan pencabutan persetujuan lingkungan.\r\n\r\nSaat ini KLH/BPLH baru membekukan dua persetujuan lingkungan yang ada di wilayah tersebut. Sedangkan dua perusahaan lainnya belum memiliki persetujuan lingkungan.\r\n\r\nLangkah itu bagian dari audit lingkungan yang dilakukan KLH/BPLH atas perintah Presiden Prabowo Subianto untuk melakukan pengawasan ketat.\r\n\r\nTerkait PT Gag Nikel yang masih diizinkan beroperasi di wilayah tersebut, berdasarkan data KLH/BPLH memperlihatkan dalam empat tahun berturut-turut perusahaan itu memiliki Penilaian Peringkat Kinerja Lingkungan (PROPER) yang baik.\r\n\r\n\"Jadi benar-benar sebelum zaman saya itu nilainya bagus. Secara administrasi memang dia merupakan satu dari 13 perusahaan yang dibolehkan menambang. Kemudian secara teknis penambangan memang telah PROPER, artinya nilainya hijau dan biru,\" kata Menteri LH Hanif Faisol.', 'images/thumbnail/rOAiaPoU0S9fiQMMoVbIbHMN5ebuwXhia0CY0ACk.png', 0, NULL, '2025-06-21 22:09:32', '2025-06-21 22:09:32'),
(10, 'AS Serang Situs Nuklir Iran', 'JAKARTA - Amerika Serikat (AS) resmi menyerang Iran dengan membombardir tiga situs nuklir negara Islam tersebut, Minggu (22/6/2025). Reaksi para pemimpin dunia bermunculan meski lamban.\r\n\r\nPresiden AS Donald Trump mengumumkan AS telah melakukan serangan yang sangat berhasil terhadap tiga lokasi nuklir di Iran, yakni situs Natanz, Isfahan, dan Fordow. \"Ini adalah momen bersejarah bagi AS, Israel, dan dunia. Iran sekarang harus setuju untuk mengakhiri perang ini,\" tulis Trump di Truth Social.\r\n\r\nReaksi Dunia atas Serangan AS Terhadap Iran \r\n\r\n1. Israel \r\nPerdana Menteri Israel Benjamin Netanyahu memuji serangan AS. \"Keputusan berani Trump akan mengubah sejarah,\" katanya. \"Presiden Trump dan saya sering mengatakan: \'Perdamaian melalui kekuatan\'. Pertama datang kekuatan, kemudian datang perdamaian. Dan malam ini, Donald Trump dan Amerika Serikat bertindak dengan sangat kuat,\" ujarnya.\r\n\r\n2. PBB \r\nSekretaris Jenderal Perserikatan Bangsa-Bangsa (PBB) Antonio Guterres memperingatkan bahwa serangan AS terhadap Iran merupakan eskalasi yang berbahaya di wilayah yang sudah tidak stabil, yang menimbulkan ancaman serius bagi perdamaian dan keamanan global. \r\n\r\n\"Ada risiko yang semakin besar bahwa konflik ini dapat dengan cepat lepas kendali–dengan konsekuensi yang sangat buruk bagi warga sipil, kawasan, dan dunia,\" kata Guterres dalam sebuah pernyataan seperti dilansir Reuters.\r\n\r\n\"Pada saat yang berbahaya ini, sangat penting untuk menghindari kekacauan yang terus berlanjut. Tidak ada solusi militer. Satu-satunya jalan ke depan adalah diplomasi. Satu-satunya harapan adalah perdamaian,\" katanya. \"Kami mengutuk keras pengeboman AS terhadap fasilitas nuklir Iran, yang merupakan eskalasi berbahaya dari konflik di Timur Tengah. Agresi tersebut secara serius melanggar Piagam PBB dan hukum internasional serta menjerumuskan manusia ke dalam krisis dengan konsekuensi yang tidak dapat diubah.\"\r\n\r\n3. Venezuela \r\nMenteri Luar Negeri Venezuela Yvan Gil mengutuk serangan tersebut dalam sebuah pesan di Telegram. \"Venezuela mengecam agresi militer AS terhadap Iran dan menuntut penghentian permusuhan segera. Republik Bolivarian Venezuela dengan tegas dan tegas mengutuk pengeboman yang dilakukan oleh militer Amerika Serikat, atas permintaan Negara Israel, terhadap fasilitas nuklir di Republik Islam Iran, termasuk kompleks Fordow, Natanz, dan Isfahan,\" katanya. \r\n\r\n4. Kuba \r\nPresiden Kuba Miguel Diaz-Canel juga mengutuk serangan tersebut di platform media sosial X, dengan mengatakan: “Kami mengutuk keras pengeboman AS terhadap fasilitas nuklir Iran, yang merupakan eskalasi berbahaya dari konflik di Timur Tengah. Agresi tersebut secara serius melanggar Piagam PBB dan hukum internasional dan menjerumuskan umat manusia ke dalam krisis dengan konsekuensi yang tidak dapat diubah.” \r\n\r\n5. Meksiko \r\nKementerian Luar Negeri Meksiko menyerukan dialog diplomatik. \"Kementerian mendesak untuk mengadakan dialog diplomatik demi perdamaian antara pihak-pihak yang terlibat dalam konflik Timur Tengah. Sesuai dengan prinsip-prinsip konstitusional kebijakan luar negeri dan keyakinan pasifis negara kami, kami tegaskan kembali seruan kami untuk meredakan ketegangan di kawasan tersebut. Pemulihan koeksistensi damai di antara negara-negara di kawasan tersebut merupakan prioritas tertinggi,\" tulis kementerian tersebut. \r\n\r\n6. Hamas \r\nHamas mengatakan serangan AS menguntungkan Israel, bersumpah untuk bersolidaritas dengan Iran.', 'images/thumbnail/YJ5Gs3umT29UB0ZDOkYtZ06sqztmOUp5rxPYqEpy.png', 0, NULL, '2025-06-21 23:48:58', '2025-06-21 23:48:58'),
(11, 'Negara-negara Arab Kompak Kecam Keras AS Bombardir Nuklir Iran', 'Jakarta - Negara-negara Arab mengecam keras serangan udara Amerika Serikat (AS) terhadap 3 fasilitas nuklir di Iran. Negara-negara Arab memperingatkan dampak serius dan menyerukan kembalinya diplomasi.\r\nDilansir AFP, Minggu (22/6/2025), mantan musuh bebuyutan Iran di kawasan itu, Arab Saudi, yang telah terlibat dalam peredaan ketegangan dengan Teheran yang ditengahi oleh Tiongkok sejak 2023, menyatakan \"sangat khawatir\" atas serangan tersebut.\r\n\r\nNegara-negara Teluk telah terlibat dalam hiruk-pikuk diplomatik untuk mencari solusi sejak Israel melancarkan serangan udara terhadap tetangga mereka, Iran, pada tanggal 13 Juni lalu.\r\n\r\nBanyak negara kaya minyak yang menjadi tuan rumah bagi aset dan pangkalan utama AS dan khawatir bahwa dampak perang dapat mengancam keamanan dan ekonomi mereka. Qatar, tuan rumah pangkalan militer AS terbesar di Timur Tengah, mengatakan pihaknya khawatir akan \"dampak bencana\" bagi kawasan dan seluruh dunia.\r\n\r\nKelompok Houthi di Yaman mengulangi ancaman untuk menargetkan kapal dan kapal perang AS di Laut Merah setelah serangan AS ke nuklir Iran pada Minggu (22/6), yang digambarkan sebagai \"deklarasi perang\" terhadap rakyat Iran.\r\n\r\nKelompok yang didukung Iran mengancam akan melanjutkan serangan terhadap kapal dan kapal perang AS di Laut Merah meskipun ada gencatan senjata yang dimediasi Oman baru-baru ini, jika Washington menyerang Iran.\r\n\r\nPresiden AS Donald Trump mengatakan serangan itu menghancurkan situs nuklir utama Iran, menggambarkannya sebagai \"keberhasilan militer yang spektakuler\". Namun sekutunya di Teluk, yang bertetangga dengan Iran, mendesak kembalinya diplomasi.\r\n\r\nOman, yang memediasi perundingan nuklir antara Washington dan Teheran, mengutuk keras serangan AS dengan menyebutnya ilegal dan menyerukan deeskalasi segera. Uni Emirat Arab (UEA) menyatakan kekhawatiran setelah serangan itu, menyerukan \"eskalasi segera\".\r\n\r\nBahrain, yang menjadi rumah bagi pangkalan angkatan laut utama AS, memberi tahu sebagian besar pegawai pemerintahnya untuk bekerja dari rumah hingga pemberitahuan lebih lanjut setelah eskalasi. Armada Kelima Angkatan Laut AS, yang meliputi wilayah tersebut, bermarkas di Bahrain.\r\n\r\nKuwait mengatakan kementerian keuangannya telah mengaktifkan rencana darurat yang mencakup persiapan tempat perlindungan. Kelompok Hamas Palestina mengutuk apa yang disebutnya \"agresi terang-terangan AS\" terhadap Iran.\r\n\r\nIrak, yang juga menjadi tuan rumah pangkalan AS, menyatakan \"kekhawatiran mendalam dan kecaman keras\" atas serangan tersebut, kata juru bicara pemerintah Basim Alawadi, yang menyebutnya sebagai \"ancaman serius bagi perdamaian dan keamanan di Timur Tengah\".\r\n\r\nKetakutan meningkat di Irak atas kemungkinan intervensi oleh faksi-faksi bersenjata yang didukung Iran, yang telah mengancam kepentingan Washington di wilayah tersebut jika bergabung dengan Israel dalam perangnya melawan Iran.\r\n\r\nPresiden Lebanon Joseph Aoun, yang sebagian besar dianggap dekat dengan Amerika Serikat, mendesak kedua belah pihak untuk melanjutkan pembicaraan guna memulihkan stabilitas di wilayah tersebut.\r\n\r\nNegara tersebut telah terhuyung-huyung akibat konflik yang merusak antara Israel dan kelompok Hizbullah yang didukung Iran atas perang Gaza, yang berakhir dengan gencatan senjata yang rapuh November lalu meskipun Israel sering menyerang kelompok tersebut. Mesir juga mengutuk eskalasi di Iran, memperingatkan \"dampak berbahaya\" bagi kawasan dan menyerukan diplomasi.', 'images/thumbnail/9C53rImjCd5j3TSaJkeOuWcTNZi2Kc07NNWtDSIL.png', 0, NULL, '2025-06-21 23:51:12', '2025-06-21 23:51:12'),
(12, 'AS Serang Iran, Akankah Rusia dan China Bantu Teheran?', 'Setelah serangkaian serangan udara antara Israel dan Iran, Amerika Serikat (AS) turun langsung ke medan konflik dengan menghantam tiga fasilitas nuklir utama milik Iran pada Sabtu (21/6/2025) malam. \r\n\r\nPresiden AS Donald Trump mengumumkan bahwa serangan itu menargetkan Fordow, Natanz, dan Isfahan—lokasi penting dalam program nuklir Iran.\r\n\r\nLangkah Washington memunculkan spekulasi keterlibatan dua sekutu Iran, China dan Rusia, dalam perang melawan Israel dan AS.\r\n\r\nReaksi China\r\nMelalui media pemerintah, China mengecam keras serangan militer AS terhadap Iran. \r\n\r\nDalam komentarnya, CGTN, cabang internasional penyiar nasional China, menyebut tindakan tersebut sebagai “titik balik yang berbahaya”.\r\n\r\n\r\n“Sejarah telah berulang kali menunjukkan bahwa intervensi militer di Timur Tengah seringkali menghasilkan konsekuensi tak terduga, termasuk konflik berkepanjangan dan ketidakstabilan regional,” demikian pernyataan CGTN, sambil merujuk pada invasi Irak tahun 2003.\r\n\r\nChina menekankan bahwa pendekatan diplomatik dan dialog harus diutamakan demi menjaga keamanan Asia Barat. \r\n\r\nSebelumnya, Presiden Xi Jinping juga telah menyerukan agar seluruh pihak, terutama Israel, segera menghentikan permusuhan. Beijing bahkan siap menjadi mediator antara Iran dan Israel.\r\n\r\nXi, dalam panggilan telepon dengan Presiden Rusia Vladimir Putin pada Kamis lalu, mengatakan, China bersedia untuk memainkan peran konstruktif dalam memulihkan perdamaian di Timur Tengah.\r\n\r\nMeskipun demikian, China, sebagaimana diberitakan Time, hanya memberikan dukungan retorik.\r\n\r\n“Iran tidak memerlukan komunike atau deklarasi, tetapi bantuan konkret, seperti sistem antipesawat atau jet tempur,” kata Andrea Ghiselli, pakar kebijakan luar negeri China di Universitas Exeter.\r\n\r\nWilliam Figueroa, asisten profesor hubungan internasional di Universitas Groningen, mengatakan kepada Time bahwa kurangnya dukungan militer China seharusnya tidak mengejutkan. \r\n\r\nSecara historis, China lebih berfokus pada masalah dalam negeri sambil berusaha menghindari keterlibatan dalam konflik luar negeri yang berkepanjangan. \r\n\r\nAwal tahun ini, Beijing juga meminta India dan sekutunya, Pakistan, untuk menahan diri. \r\n\r\nSelain itu, China juga membantah memberikan senjata atau pasukan kepada Rusia walaupun sempat dituduh memberikan dukungan “yang sangat besar” kepada Moskwa dalam perang melawan Ukraina.\r\n\r\nSementara itu, Rusia belum mengeluarkan tanggapan resmi setelah AS meluncurkan serangan ke Iran. \r\n\r\nNamun, Moskwa sebelumnya telah memperingatkan Washington agar tidak ikut campur dalam konflik bersenjata antara Israel dan Iran.\r\n\r\nBahkan pada Kamis lalu, kepala badan energi nuklir Rusia sempat memperingatkan bahwa jika Israel menyerang reaktor nuklir Bushehr, maka dunia berisiko menghadapi bencana seperti Chernobyl.\r\n\r\nTrump banggakan serangan AS ke Iran\r\nPresiden Trump menyebut serangan udara AS ke nuklir Iran sebagai sebuah kesuksesan besar dan menekankan bahwa pasukan AS telah meninggalkan wilayah udara Iran dengan selamat.\r\n\r\n“Kami telah menyelesaikan serangan sangat sukses ke tiga situs nuklir di Iran, termasuk Fordow, Natanz, dan Isfahan. Semua pesawat kini berada di luar wilayah udara Iran. Muatan bom penuh dijatuhkan di Fordow. Semua pesawat kembali dengan selamat,” tulis Trump di akun Truth Social.\r\n\r\n“Selamat kepada para prajurit Amerika. Tidak ada militer lain di dunia yang mampu melakukan ini. Sekarang adalah waktunya untuk damai!” tambahnya.\r\n\r\nPihak Gedung Putih kemudian mengonfirmasi bahwa Trump telah berbicara langsung dengan Perdana Menteri Israel Benjamin Netanyahu usai serangan berlangsung. \r\n\r\nDalam pidato lanjutan, Trump menyerukan \"perdamaian secepatnya\" dari pihak Iran, dan mendesak Pemimpin Tertinggi Iran, Ayatollah Ali Khamenei, untuk menyerah.\r\n\r\nAkankah China dan Rusia terlibat?\r\nMeski secara diplomatik China dan Rusia menunjukkan dukungan terhadap Iran, belum ada tanda bahwa kedua negara tersebut akan ikut terlibat secara militer.\r\n\r\nAnalis menilai bahwa baik Beijing maupun Moskwa masih berhati-hati, karena keterlibatan langsung dapat menyeret mereka ke dalam konflik berskala besar yang belum tentu menguntungkan secara strategis. \r\n\r\nChina memiliki kecenderungan untuk menghindari konflik militer di Timur Tengah, sementara Rusia saat ini tengah fokus pada perang di Ukraina.\r\n\r\nNamun, jika konflik ini berkembang menjadi ancaman eksistensial bagi Iran, atau jika AS secara terbuka mengejar pergantian rezim di Teheran, maka kalkulasi politik dari kedua negara besar itu bisa berubah.', 'images/thumbnail/V8Or2LgNBFoYcI52m6LrlJZFKlhxoB6f8GDdxF7t.png', 0, NULL, '2025-06-21 23:53:59', '2025-06-21 23:54:25'),
(13, 'Puja-puji Prabowo ke Rusia-China: Membela yang Tertindas', 'Jakarta - Presiden Prabowo Subianto memuji kepemimpinan Rusia dan China karena tidak pernah menerapkan standar ganda dalam kebijakan luar negeri dan geopolitik internasional.\r\n\r\nDalam hal ini, standar ganda merujuk pada penerapan penilaian atau respons yang berbeda terhadap situasi yang sama. \r\n\r\nMenurut Kepala Negara, Rusia dan China selalu membela negara yang tertindas hingga memperjuangkan keadilan semua bangsa di dunia. Pernyataan tersebut disampaikan Prabowo di hadapan Presiden Rusia Vladimir Putin dan Wakil Perdana Menteri China Ding Xuexiang dalam agenda Saint Petersburg International Economic Forum 2025. \r\n\r\n\"Saya pikir banyak dari global south akan setuju dengan saya, Rusia dan China tidak pernah memiliki standar yang ganda,\" ujar Prabowo dalam agenda Saint Petersburg International Economic Forum 2025 yang disiarkan secara virtual, dikutip Sabtu (21/6/2025). \r\n\r\nPrabowo juga menggarisbawahi politik luar negeri Indonesia yang bersifat non-aliansi. Sehingga, Prabowo menekankan bahwa hubungan internasional harus tetap berlandaskan sistem multipolar. Hal ini mengacu pada distribusi kekuasaan di mana lebih dari dua negara yang memiliki kekuatan setara untuk bersaing dalam dominasi. \r\n\r\nDalam berbagai kesempatan, Prabowo memang menyebutkan Rusia dan China memiliki peran penting untuk negara berkembang. Misalnya, Prabowo mengatakan Rusia, dahulu Uni Soviet, merupakan negara yang membantu Indonesia tanpa meminta untuk kembali membayar utang dalam waktu cepat.\r\n\r\nKendati demikian, Prabowo memastikan Indonesia pada akhirnya berhasil membayar utang dari Rusia tersebut, meski membutuhkan puluhan tahun.\r\n\r\n“Pada saat Indonesia sangat miskin, Rusia membantu tanpa meminta kita kembali bayar utang dalam waktu cepat. Namun akhirnya walaupun berapa puluh tahun, kami kami kembaikan utang kami pada saat itu,” ujar Prabowo dalam keterangannya yang disampaikan secara virtual, dikutip Jumat (20/6/2025).\r\n\r\nMenyitir Undang-undang (UU) Nomor 9 Tahun 1958 tentang Pinjaman Republik Indonesia dari Uni Republik-Republik Soviet Sosialis, Menteri Keuangan saat itu diberi kuasa mengadakan pinjaman dari Pemerintah Uni Soviet sampai jumlah seharga US$100 juta.\r\n\r\nDana itu digunakan untuk membiayai pembelian barang-barang konsumsi, bahan pakaian, alat-alat pertanian, alat-alat perhubungan, termasuk kapal-kapal dan guna pendirian industri-industri atau bangunan-bangunan lain yang akan ditentukan dan diselenggarakan oleh Pemerintah Indonesia.\r\n\r\nSelain itu, Prabowo juga sempat mengatakan Indonesia mengapresiasi sikap Pemerintah China dalam mendukung rakyat Palestina di tengah konflik geopolitik yang menimpa negara tersebut. Hal itu disampaikan Prabowo di hadapan Perdana Menteri China Li Keqiang, di sela jamuan sambutannya ke Jakarta dalam rangkaian kunjungan kenegaraan selama tiga hari hingga Senin (26/5/2025).\r\n\r\n“Saya ingin menyampaikan rasa hormat ke Republik Rakyat Tiongkok yang telah konsisten membela kepentingan negara-negara yang sedang membangun, dan konsisten melawan penindasan, imperialisme, serta melawan kolonialisme apartheid,” ujarnya dalam pidato Indonesia-China Business Reception 2025 di Ballroom Hotel Shangri-La, Sabtu (24/5/2025) malam.', 'images/thumbnail/iKmHql0rltIVHtTIPgU6GlDUbYJBfsYPOHhwYmWI.png', 0, NULL, '2025-06-21 23:57:06', '2025-06-21 23:57:06');
INSERT INTO `news` (`id`, `title`, `content`, `gambar`, `views`, `author_id`, `created_at`, `updated_at`) VALUES
(14, 'Trump Desak Iran Berdamai, Ancam Serangan Tambahan dari AS', 'Presiden Amerika Serikat (AS) Donald Trump mengatakan serangan militer AS telah menghancurkan 3 fasilitas nuklir utama milik Iran. Trump  mengancam akan melancarkan serangan lebih lanjut jika Teheran tidak segera berdamai dengan Israel.\r\n\r\n“Ini tidak bisa dibiarkan berlanjut. Akan ada perdamaian atau akan ada tragedi yang jauh lebih besar bagi Iran dibanding 8 hari terakhir,” ujar Trump dalam pidato tiga menit dari Gedung Putih pada Sabtu malam waktu setempat.\r\n\r\n“Ingat, masih banyak target lainnya,” tambah Trump. “Malam ini adalah yang paling sulit, dan mungkin yang paling mematikan. Namun jika perdamaian tidak segera tercapai, kami akan menyerang target-target lain itu dengan presisi, kecepatan, dan keahlian.”\r\n\r\nTrump membeberkan militer AS telah menyerang fasilitas nuklir di Natanz, Fordow, dan Isfahan, dan menyebut operasi itu sebagai “keberhasilan militer yang spektakuler.”\r\n\r\n“Fasilitas pengayaan nuklir utama Iran telah dihancurkan sepenuhnya,” kata Trump.\r\n\r\n“Iran, yang selama ini menjadi pengganggu di Timur Tengah, kini harus memilih jalan damai. Jika tidak, serangan selanjutnya akan jauh lebih besar — dan jauh lebih mudah dilakukan.”\r\n\r\nTidak lama selepas pidatonya, Trump kembali mengeluarkan peringatan keras lewat media sosial:\r\n\r\n“SETIAP SERANGAN BALASAN DARI IRAN TERHADAP AMERIKA SERIKAT AKAN DIBALAS DENGAN KEKUATAN YANG JAUH LEBIH BESAR DARI APA YANG TERJADI MALAM INI. TERIMA KASIH! DONALD J. TRUMP, PRESIDEN AMERIKA SERIKAT.”\r\n\r\nTrump tampil bersama Wakil Presiden JD Vance, Menteri Luar Negeri Marco Rubio, dan Menteri Pertahanan Pete Hegseth. Dia mengatakan bahwa Hegseth akan menggelar konferensi pers pada Minggu untuk menjelaskan lebih lanjut soal operasi militer tersebut.\r\n\r\nSerangan ini menjadi salah satu keputusan paling krusial dalam masa jabatan kedua Trump di Gedung Putih.\r\n\r\nLangkah ini juga meningkatkan eskalasi konflik secara drastis di kawasan, yang berpotensi menjerumuskan Timur Tengah ke dalam perang yang lebih luas. Iran sebelumnya telah memperingatkan akan membalas jika AS ikut campur dalam agresi Israel.\r\n\r\nKeputusan ini menjadi pembalikan sikap bagi Trump, yang selama kampanye pemilu menjanjikan untuk menjauhkan AS dari konflik luar negeri dan mengkritik keras intervensi militer seperti perang di Irak dan Afghanistan.\r\n\r\nTrump menegaskan bahwa kebijakan jangka panjangnya adalah mencegah Iran memperoleh senjata nuklir.\r\n\r\nDia mengatakan serangan ini sebagai puncak dari upayanya mengakhiri program nuklir Iran, menghentikan ancaman terhadap Israel, dan melindungi kepentingan AS di kawasan.\r\n\r\n“Selama 40 tahun Iran meneriakkan ‘kematian bagi Amerika, kematian bagi Israel.’ Mereka membunuh warga kami, memutus lengan dan kaki mereka dengan bom pinggir jalan,” kata Trump.\r\n\r\n “Saya sudah lama memutuskan hal ini tak boleh terus terjadi. Ini harus dihentikan.”\r\n\r\nIsrael telah mendorong AS untuk terlibat langsung dalam serangan militer untuk mencegah Iran memperoleh senjata nuklir, termasuk penggunaan bom penghancur bunker bawah tanah yang tidak dimiliki Israel.\r\n\r\nSebelumnya, keterlibatan AS dibatasi hanya untuk membantu pertahanan udara Israel dari serangan rudal dan drone Iran.\r\n\r\nSejumlah tokoh Partai Republik, termasuk Senator Lindsey Graham, turut mendorong aksi militer, menyebut saat ini sebagai momen yang tepat untuk menghantam Iran ketika negara itu dalam posisi lemah.\r\n\r\nNamun, serangan ini juga membuka perpecahan di dalam tubuh Partai Republik. Kelompok sayap kanan pendukung gerakan Make America Great Again (MAGA) menolak keterlibatan AS dalam konflik asing.\r\n\r\nTokoh pro-Trump seperti Steve Bannon, mantan presenter Fox News Tucker Carlson, dan anggota Kongres Marjorie Taylor Greene terang-terangan mengkritik serangan tersebut.\r\n\r\n“Ini bukan perang kita,” tulis Greene di platform X.\r\n\r\nSebelumnya, Trump sempat membuat publik bertanya-tanya mengenai sikapnya. Dia mengatakan akan mengambil keputusan akhir dalam dua minggu—jangka waktu yang dinilai terlalu panjang mengingat cepatnya eskalasi konflik.\r\n\r\nNamun pada Jumat, Trump memberi sinyal akan bertindak lebih cepat dan menegaskan bahwa pengiriman pasukan darat bukan opsi yang dipilih.\r\n\r\nPernyataan Trump muncul setelah upaya diplomatik melalui pertemuan menteri luar negeri Iran, Jerman, Prancis, dan Inggris di Jenewa gagal mencapai terobosan. Menteri Luar Negeri Iran, Abbas Araghchi, menyatakan bahwa Iran hanya bersedia melanjutkan dialog jika Israel menghentikan serangannya.\r\n\r\nPemimpin Tertinggi Iran, Ayatollah Ali Khamenei, memperingatkan bahwa serangan AS akan membawa “kerugian yang tidak dapat diperbaiki bagi mereka.”\r\n\r\nSebelum Israel melancarkan serangan awal pekan lalu, Trump berulang kali menyatakan lebih memilih jalur diplomatik dan ingin menegosiasikan perjanjian nuklir baru dengan Iran.\r\n\r\nPutaran keenam perundingan nuklir antara AS dan Iran yang dijadwalkan akhir pekan ini dibatalkan setelah Israel melancarkan serangan pertama. Pada akhir pekan, Trump mengatakan kesabarannya telah habis dan menegaskan bahwa sudah terlambat bagi Teheran untuk mundur.', 'images/thumbnail/2AlEGoJXM8Z1UzEHbCP205JR6HRo9yzA3giLFKEM.png', 0, NULL, '2025-06-21 23:58:20', '2025-06-21 23:58:20'),
(15, 'PM Thailand Tegaskan tak Akan Mundur', 'Perdana Menteri (PM) Thailand Paetongtarn Shinawatra tidak akan mengundurkan diri atau membubarkan parlemen, kata partainya pada Sabtu, di tengah laporan kemungkinan ia mengundurkan diri untuk mempertahankan koalisi yang berkuasa dan mengakhiri krisis politik.\r\n\r\nSpekulasi bahwa Paetongtarn akan menerima usulan dari partai-partai koalisi untuk mengundurkan diri atau membubarkan parlemen muncul setelah pengesahan RUU anggaran \"sama sekali tidak benar,\" kata Sorawong Thienthong, sekretaris jenderal Partai Pheu Thai, dalam sebuah posting di Facebook.\r\n\r\n\"Perdana Menteri telah tegas menegaskan kepada kami bahwa ia akan terus melaksanakan tugasnya sepenuhnya dalam menangani krisis yang sedang dihadapi negara ini,\" kata Sorawong.\r\n\r\nPaetongtarn berjuang untuk menyelamatkan pemerintahannya yang berusia kurang dari satu tahun setelah keluarnya partai terbesar kedua dalam aliansi yang berkuasa minggu ini, meninggalkan blok tersebut dengan mayoritas tipis di parlemen. \r\n\r\nKoalisinya sekarang memegang sekitar 255 kursi di badan yang beranggotakan 495 orang dan tidak dapat menanggung lebih banyak pembelotan.\r\n\r\nMedia lokal melaporkan Partai Bangsa Thailand Bersatu yang sangat konservatif, yang merupakan partai terbesar kedua dalam koalisi dengan 36 kursi, mengancam akan meninggalkan pemerintahan kecuali Paetongtarn mengundurkan diri untuk memberi jalan bagi pemilihan perdana menteri yang baru.\r\n\r\nPaetongtarn telah mencoba meredakan kemarahan publik atas kebocoran panggilan teleponnya dengan mantan pemimpin Kamboja Hun Sen dengan meminta maaf dan menyerukan persatuan nasional, tetapi para pesaingnya telah mengancam akan meningkatkan protes jalanan untuk mendesak pemecatannya. \r\n\r\nPada Jumat, perdana menteri juga mengunjungi pasukan di pos perbatasan untuk menunjukkan dukungan bagi tentara yang terlibat dalam kebuntuan perbatasan dengan Kamboja.', 'images/thumbnail/IbfuPcxjMbuyjVUQ6CtBVgjuagl7bbeAwHZEORmY.png', 0, NULL, '2025-06-22 00:01:22', '2025-06-22 00:01:22'),
(16, 'Kapolri: Penyidik Bisa Periksa Ulang Budi Arie di Kasus Judol', 'Kapolri Jenderal Listyo Sigit Prabowo mengatakan, penyidik bisa memeriksa kembali Menteri Koperasi Budi Arie Setiadi sebagai saksi dalam kasus pidana dugaan perlindungan akses situs judi online atau judol. Akan tetapi, kata dia, keputusan ini tergantung keputusan hakim dalam sidang yang tengah bergulir di PN Jakarta Selatan tersebut.\r\n\r\n“Tentunya kita mengikuti proses sidang, nanti petunjuk dari hakim seperti apa. Yang jelas [Budi Arie] pernah kita periksa dan tentunya mungkin akan kita konfirmasi ulang apa bila memang ada petunjuk,” kata Listyo dikutip dari laman Humas Polri, Rabu (21/05/2025).\r\n\r\nDorongan untuk pemeriksaan ulang terhadap Budi Arie muncul usai namanya mencuat saat pembacaan dakwaan di PN Jakarta Selatan, pekan lalu. Pada sidang ini, jaksa mendudukan empat terdakwa yaitu Zulkarnaen Apriliantony, Adhi Kismanto, Alwin Jabarti Kiemas, dan Muhrijan alias Agus.\r\n\r\nDalam dakwaan tersebut, jaksa mengungkap sejumlah kronologi dan peran para terdakwa dalam melindungi ribuan situs judol dari potensi pemblokiran oleh Kementerian Komunikasi dan Informatika (Kominfo) -- kini bernama Kementerian Komunikasi Digital (Komdigi). \r\n\r\nJaksa pun beberapa kali menyebut nama Budi Arie dalam dakwaan tersebut terutama dalam kaitan dengan peran terdakwa Zulkarnaen Apriliantony. Budi Arie disebut sudah pernah mengetahui ada praktik perlindungan situs judol namun membiarkan karena mendapatkan jatah dari uang setoran para pengelola situs judi online.\r\n\r\nPada suatu pertemuan, Zulkarnaen dan para terdakwa lain sempat sepakat memberikan jatah kepada Budi Arie sebanyak 50% dari total uang penjagaan yang diterima. Selama periode Mei-Oktober 2024, para terdakwa juga disebut membagi rata uang setoran tersebut kepada semua pihak yang terlibat, termasuk Budi Arie.', 'images/thumbnail/FOn1v5Rw9egXHF250CgohBMjKePAWkhjIBQOiXDj.png', 0, NULL, '2025-06-22 00:02:25', '2025-06-22 00:02:25'),
(17, 'Benjamin Netanyahu Ngotot Tunjuk Kepala Intelijen Baru Israel', 'Perdana Menteri Israel, Benjamin Netanyahu berkukuh menunjuk Eli Sharvit sebagai kepala baru badan intelijen; usai terjadi perpecahan politik yang memicu pemecatan pejabat sebelumnya, Ronen Bar.\r\n\r\nKantor PM Israel melaporkan, Sharvit adalah mantan komandan angkatan laut yang akan menjalankan peran barunya sebagai kepala Shin Bet setelah 36 tahun mengabdi di militer Israel. Pengangkatan terjadi kurang dari satu bulan usai Netanyahu memecat Ronen Bar karena gagal mencegah serangan 7 Oktober 2024 oleh Hamas; dan gagalnya negosiasi penyanderaan; serta isu penyelidikan mengenai Qatar.\r\n\r\nSeharusnya, Netanyahu harus menunggu hasil sidang pengadilan tentang pemecatan Ronen Bar, 8 April mendatang. Sehingga penunjukan yang cepat ini dapat memicu ketegangan dalam negeri lebih lanjut. Jaksa Agung Israel, yang juga sedang dalam proses pemecatan oleh kabinet Netanyahu, juga menentang pemecatan Bar.\r\n\r\nBeberapa petisi diajukan ke pengadilan setelah pemecatan Bar, mengklaim bahwa Netanyahu memiliki konflik kepentingan karena penyelidikan Shin Bet terhadap beberapa ajudan dekatnya.\r\n\r\nPemecatan Bar memicu protes yang melibatkan puluhan ribu penentang pemerintah yang mengatakan bahwa Netanyahu berusaha menutup penyelidikan.\r\n\r\nBenny Gantz, seorang pemimpin oposisi memuji pengalaman Sharvit namun mengatakan bahwa sudah jelas “Netanyahu memutuskan untuk melanjutkan kampanyenya melawan peradilan dan membawa Negara Israel ke arah krisis konstitusional yang berbahaya.”\r\n\r\n“Penunjukan kepala Shin Bet harus dilakukan hanya setelah ada keputusan dari Pengadilan Tinggi Kehakiman,” tulisnya dalam sebuah posting di X.\r\n\r\nMenjabat sebagai Komandan Angkatan Laut, Sharvit “memimpin pembangunan kekuatan pertahanan maritim di perairan ekonomi dan mengelola sistem operasional yang kompleks untuk melawan Hamas, Hizbullah, dan Iran,” demikian pernyataan dari kantor Netanyahu.\r\n\r\nSharvit akan menjadi kepala Shin Bet pertama dalam tiga dekade terakhir yang tidak berasal dari dalam dinas tersebut. Terakhir kali badan intelijen ini memiliki orang luar sebagai kepala adalah pada tahun 1996 setelah Shin Bet gagal mencegah pembunuhan Perdana Menteri Israel Yitzhak Rabin.', 'images/thumbnail/i11gJnlwmIoyVoQCQ1KbYl9qq9mBmqUhwAPbUgkx.png', 0, NULL, '2025-06-22 00:03:21', '2025-06-22 00:03:21'),
(18, 'Netanyahu Segera Perintahkan Eskalasi Perang Hancurkan Hamas', 'Perdana Menteri Israel Benjamin Netanyahu mengatakan ia hanya tinggal menghitung hari untuk memerintahkan eskalasi besar-besaran perang Israel melawan Hamas. Bahkan, pembebasan lebih banyak sandera hanya akan menghentikan sementara upayanya untuk menghancurkan kelompok yang didukung Iran tersebut.\r\n\r\nBerbicara di hadapan para veteran militer yang terluka pada Senin (12/5/2025), pemimpin Israel tersebut mengatakan angkatan bersenjatanya sedang bersiap untuk \"menuntaskan pekerjaan\" setelah 19 bulan bertempur di Gaza, dan siap menyerang \"dengan kekuatan penuh.\"\r\n\r\n\"Menyelesaikan pekerjaan berarti mengalahkan Hamas,\" kata Netanyahu, menurut transkrip yang dirilis oleh kantornya.\r\n\r\n\"Bisa jadi Hamas akan berkata, \'berhenti sebentar, kami ingin membebaskan 10 sandera lagi.\' Baiklah. Bawa mereka. Kami akan membawa mereka,\" kata perdana menteri tersebut.\r\n\r\n\"Namun, dalam keadaan apa pun kami tidak akan menghentikan perang. Kami bisa saja melakukan gencatan senjata dengan durasi yang diketahui, tapi kami akan terus maju.\"\r\n\r\nKomentarnya muncul setelah Hamas membebaskan sandera AS-Israel terakhir yang masih hidup setelah mencapai kesepakatan dengan Washington. \r\n\r\nKelompok militan ini masih menahan 58 warga Israel lainnya, yang hampir semuanya diculik selama serangan Oktober 2023 yang memicu perang. Kurang dari setengahnya diyakini masih hidup.\r\n\r\nUpaya internasional untuk mengakhiri konflik di Gaza—di mana PBB mengatakan krisis kemanusiaan besar sedang berlangsung—diperkirakan akan menjadi agenda pertemuan Presiden AS Donald Trump dan Putra Mahkota Arab Saudi Mohammed bin Salman pada Selasa (13/5/2025) waktu setempat. \r\n\r\nSementara itu, para negosiator Israel sedang berada di Qatar, mediator utama Gaza bersama Mesir, di mana Trump akan berkunjung pada Rabu (14/5/2025).\r\n\r\nMenurut Kementerian Kesehatan yang dikelola Hamas, lebih dari 52.000 warga Palestina telah terbunuh dalam perang di Gaza. Sebagian besar wilayah tersebut juga hancur akibat pengeboman Israel dan pertempuran lainnya. Israel telah kehilangan lebih dari 400 tentara dalam pertempuran itu.\r\n\r\nIsrael mengatakan mereka bersedia mendiskusikan proposal dari utusan Amerika Serikat, Steve Witkoff, untuk kesepakatan, yang mengharuskan Hamas segera membebaskan 10 sandera hidup. Setelahnya, kedua belah pihak akan merundingkan syarat-syarat untuk mengakhiri perang.\r\n\r\nNamun, tujuan utama pemerintahan Netanyahu ialah agar Hamas meletakkan senjatanya dan angkat kaki dari Gaza. Hamas, yang menewaskan 1.200 orang dalam serangan terhadap Israel pada tahun 2023, di masa lalu mengindikasikan mereka bisa menyerahkan sebagian pemerintahan, tetapi tidak melucuti senjata.', 'images/thumbnail/xs18EGyTMxzxV7Ue3y3VOUbFs8EGuqzgHAsS6M9d.jpg', 0, NULL, '2025-06-22 00:04:25', '2025-06-22 00:07:57'),
(19, 'Bill Gates soal AI di Pendidikan: Pelatihan Guru Terpenting', 'Bill Gates yang merupakan pendiri Bill Gates Foundation menjawab persoalan terkait seberapa penting Artificial intelligence (AI) di dunia pendidikan. \r\n\r\n“Saya sendiri percaya bahwa, khususnya di tingkat SMA dan perguruan tinggi, akses terhadap alat bantu pembelajaran seperti tutoring berbasis AI akan sangat membantu,” ujar Bill Gates menjawab pertanyaan Arini Subianto yang merupakan pemilik Persada Capital Investama saat berdialog dengan Bill Gates di Istana Negara, Rabu (7/5/2025) siang.\r\n\r\nMenurutnya jika dilihat dari data di beberapa negara Asia lain seperti, Singapura dan Vietnam, di mana pendidikan di negara tersebut sudah maju dan diakui.\r\n\r\n“Dua contoh terbaik adalah Singapura dan Vietnam. Singapura luar biasa, tentu karena mereka negara kaya dan ada faktor budaya juga, tapi hasil pendidikan mereka benar-benar termasuk yang terbaik di dunia,” ujar Gates.\r\n\r\n“Vietnam, jika dilihat dari tingkat pendapatannya, justru merupakan yang terbaik di dunia. Mereka berhasil, dan bukan karena penggunaan teknologi,” tambahnya.\r\n\r\nGates juga menambahkan, hal yang paling penting yang membuat sebuah negara jadi panutan adalah karena mereka melatih gurunya dengan baik, dan memiliki ekspektasi yang sangat tinggi terhadap para guru. \r\n\r\n“Di beberapa negara, posisi politik guru begitu kuat, sehingga saat diminta menerapkan metode yang disebut structured pedagogy atau pengajaran terstruktur, itu sulit diterapkan. Upaya kami di bidang pendidikan sebenarnya hanya sekitar 4% dari seluruh program yayasan, dan sebagian besar fokusnya di AS, meskipun kami punya beberapa mitra di India,” ungkapnya.\r\n\r\nSelain itu, harus juga didukung dengan kesehatan yang baik juga. Karena menurut Gates, kesehatan dan pendidikan harus berjalan bersama.\r\n\r\n“Dua hal tersebut menentukan masa depan negara Anda. Semakin sehat anak-anak, semakin sedikit stunting dan malnutrisi, maka semakin besar pula potensi mereka untuk mendapatkan pendidikan,” terang Gates.\r\n\r\n“Dan tentu saja, semakin terdidik mereka, maka produktivitas ekonomi mereka juga meningkat dan pemerintah bisa mengalokasikan lebih banyak untuk sektor kesehatan. Jadi akan tercipta siklus yang saling memperkuat,” tambahnya.', 'images/thumbnail/TJyeMraaU8oqtDiJ8hQk7bbs1MKKa40aLCgewI9w.png', 0, NULL, '2025-06-22 00:05:12', '2025-06-22 00:05:12'),
(20, 'Sekjen PBB Soal Israel-Iran: Dunia Terombang-ambing Menuju Krisis', 'Sekretaris Jenderal (Sekjen) Perserikatan Bangsa-Bangsa (PBB) Antonio Guterres menyerukan kembali berunding untuk menyelesaikan konflik antara Israel dan Iran, sambil memperingatkan bahwa dunia \"berada di jalur menuju potensi kekacauan\" jika konflik ini meluas.\r\n\r\n\"Jangan sampai kita menyesali momen kritis ini di kemudian hari,\" kata Guterres kepada Dewan Keamanan PBB, Jumat (20/6/2025), dalam pertemuan darurat yang diminta Iran. \"Mari bertindak—secara bertanggung jawab dan bersama-sama—untuk menarik kawasan ini, dan dunia kita, dari jurang kehancuran.\"\r\n\r\nIni merupakan pernyataan pertama Sekjen kepada DK PBB mengenai konflik tersebut. Beberapa jam setelah Israel menyerang Iran pada 13 Juni, ia mengeluarkan pernyataan yang mengecam segala bentuk militerisasi di Timur Tengah dan meminta kedua belah pihak untuk menunjukkan \"pengendalian diri yang maksimal.\"\r\n\r\nSidang darurat pada Jumat menyoroti perpecahan di antara anggota tetap DK PBB terkait isu tersebut, di mana Rusia dan China mengkritik keras Israel, sementara AS membelanya.\r\n\r\nDuta Besar Rusia untuk PBB, Vasily Nebenzya mendesak Israel untuk segera menghentikan serangannya terhadap Iran dan mengatakan AS dan sekutu Eropa-nya turut bertanggung jawab. Sementara itu, penjabat Perwakilan AS untuk PBB Dorothy Shea mendesak Iran untuk \"mengubah arah.\"\r\n\r\n\"Para pemimpin Iran bisa menghindari konflik ini jika mereka menyetujui kesepakatan yang akan mencegah mereka memperoleh senjata nuklir. Namun, mereka menolak melakukannya, malah memilih menunda dan menyangkal,\" katanya.\r\n\r\nGuterres juga mendesak Iran untuk menghormati Perjanjian Non-Proliferasi Senjata Nuklir, mengakui adanya \"kesenjangan kepercayaan,\" meski Teheran menyatakan tidak mencari senjata nuklir.\r\n\r\nSejak konflik pecah sepekan yang lalu, Guterres telah menelepon para diplomat, termasuk Menteri Luar Negeri Iran, dan menghadiri Konferensi Tingkat Tinggi (KTT) G-7 untuk membahas strategi penyelesaian konflik dengan para pemimpin dunia lainnya.\r\n\r\n\"Kita tidak sedang terombang-ambing menuju krisis—kita sedang berlomba menuju krisis,\" tegasnya. \"Kita tidak menyaksikan insiden terisolasi—kita sedang menuju potensi kekacauan.\"', 'images/thumbnail/hNkM8C3UvQHB6BQZoNWwAhrDBsRQiV0uHceXai2m.png', 0, NULL, '2025-06-22 00:05:57', '2025-06-22 00:05:57'),
(22, 'Lamine Yamal Pakai Nomor 10 Barcelona, Makin Ikuti Jejak Messi', 'Lamine Yamal bakal memakai nomor punggung 10 di Barcelona musim depan. Ia makin mengikuti jejak legendaris Lionel Messi.\r\nLamine Yamal menunjukkan performa mengkilap bersama Barcelona musim ini. Kontribusi Lamine Yamal membuat Barceloa bisa meraih tiga gelar domestik musim ini yaitu Supercopa de Espana, Copa del Rey, dan La Liga.\r\n\r\nTiga gelar tersebut tak lepas dari kontribusi Lamine Yamal. Sebagai bentuk kepercayaan, dikutip dari Diario Sport, Lamine Yamal bakal diberikan nomor punggung 10 musim depan.\r\n\r\nNomor 10 selama ini selalu dianggap sebagai nomor keramat di sepak bola. Apalagi di Barcelona, nomor 10 adalah nomor yang pernah digunakan oleh Lionel Messi. Bukan hanya Messi, nomor 10 Barcelona juga pernah digunakan oleh Lionel Messi, Ronaldinho, Juan Roman Riquelme, hingga Diego Maradona.\r\n\r\nSeiring Lamine Yamal mengenakan nomor punggung 10, hal itu berarti pemain asal Spanyol itu juga mengikuti jejak Messi. Sebelum mengenakan nomor punggung 10, Messi juga sempat memakai nomor punggung 19. Di musim ini, Lamine Yamal mengenakan nomor punggung 19.\r\n\r\nDi musim ini, Lamine Yamal memang makin menunjukkan kontribusi besarnya terhadap Barcelona. Ia menggelontorkan 18 gol dan 25 assist dalam 54 laga di semua kompetisi untuk Barcelona.\r\n\r\nBukan hanya gol dan assist, Lamine Yamal juga kerap kali jadi pemecah kebuntuan Barcelona. Dengan usia yang masih muda, Lamine Yamal tidak pernah gentar berhadapan dengan pemain-pemain yang jauh lebih senior dari dirinya.\r\n\r\nDengan mengenakan nomor punggung 10, hal itu tak lantas membuat Lamine Yamal makin diwaspadai lawan karena selama ini ia sudah mendapatkan perlakuan ketat dari tiap lawan. Namun mengenakan nomor punggung 10 diyakini bakal memberi beban psikologis bagi Lamine Yamal karena ia berubah dari bintang muda menjadi bintang utama Barcelona.', 'images/thumbnail/BQEmOBuMFp3s2rh1oZbBJ9dCVx0kk75cLHCXn8GH.png', 0, NULL, '2025-06-22 00:09:54', '2025-06-22 00:09:54'),
(23, 'Dembele Merendah Soal Jadi Favorit Pemenang Ballon d\'Or', 'Bintang Paris Saint-Germain, Ousmane Dembele memilih merendah soal dirinya jadi favorit pemenang Ballon d\'Or musim ini.\r\nDembele jadi sosok penting di balik keberhasilan PSG merebut treble musim lalu. Hal itulah yang kemudian membuat nama Dembele masuk jadi salah satu calon kuat pemenang Ballon d\'Or musim ini.\r\n\r\nTerkait hal tersebut, Dembele tidak mau terlalu banyak ambil pusing. Dengan merendah, Dembele mengaku dirinya sudah cukup senang disebut sebagai calon kuat.\r\n\r\n\"Saya pikir musim ini saya tampil konsisten, jadi mari lihat yang terjadi. Tentu akan sangat luar biasa bila ada nama saya dalam daftar tersebut [pemenang].\"\r\n\r\n\"Dan adi salah satu favorit pemenang sendiri sudah merupakan kemenangan besar bagi saya meskipun saya berharap memenangkan itu suatu hari,\" kata Dembele seperti dikutip dari Football Espana.\r\n\r\nDembele sendiri mengakui bahwa penghargaan Ballon d\'Or lekat dalam ingatannya. Ia sering melihat penyerahan dan pemain-pemain yang memenangkan Ballon d\'Or.\r\n\r\n\"Sulit untuk mengatakannya [apakah dirinya bakal menang tahun ini]. Namun memenangkan Ballon d\'Or ketika dirimu berprofesi sebagai pesepakbola adalah semacam cawan suci di sektor penghargaan individu.\"\r\n\r\n\"Ini adalah sesuatu yang dimimpikan sebagai anak-anak. Saya ingat ketika saya melihat pemain muncul di Telefoot untuk menerimanya. Sunggguh luar biasa. Benda itu - trofi berbentu bola- sungguh luar biasa,\" kata Dembele.\r\n\r\nDembele dan PSG saat ini sedang bersiap menghadapi FIFA Club World Cup 2025. Meski hanya punya jeda istirahat sejenak, Dembele dan kawan-kawan jadi salah satu kandidat juara di turnamen tersebut.', 'images/thumbnail/cTMhgGHPaGJswM3GmoSjA40ZFBqKqnoJhvbIaMb0.png', 0, NULL, '2025-06-22 00:11:00', '2025-06-22 00:11:00'),
(24, 'Hasil MotoGP Italia: Marc Marquez Menang, Bagnaia ke-4', 'Marc Marquez berhasil menjadi juara MotoGP Italia 2025 usai mengalahkan Alex Marquez dan Francesco Bagnaia di Sirkuit Mugello, Minggu (22/6).\r\nPertarungan sengit langsung tersaji di awal balapan. Marc Marquez yang memulai balapan dari pole position berhasil disalip Francesco Bagnaia di tikungan kedua.\r\n\r\nPada lap kedua, Marc Marquez berhasil merebut posisi terdepan dari Bagnaia. Sementara Alex Marquez menguntit di urutan ketiga.\r\n\r\nPada lap ketiga, Francesco Bagnaia nyaris bersenggolan dengan Marc Marquez. Situasi ini membuat Bagnaia sedikit melebar sehingga mampu dilewati Alex Marquez.\r\n\r\nBagnaia yang tampil di depan publik sendiri tak mau menyerah begitu saja. Bagnaia berhasil melewati Alex Marquez dan kemudian menyalip Marc Marquez untuk memimpin balapan.\r\n\r\nPertarungan sengit terjadi di lap kelima. Bagnaia sempat dilewati Marc Marquez namun ia mampu kembali memimpin di posisi terdepan.\r\n\r\nAkan tetapi, Alex Marquez berhasil mengambil kesempatan untuk melakukan manuver untuk memimpin balapan di tikungan ketiga akhir lap kelima. Hal ini membuat Bagnaia dan Marc Marquez turun ke posisi kedua dan ketiga di lap keenam.\r\n\r\nPada lap ketujuh, tiga pembalap terdepan mulai berjarak. Alex Marquez memimpin dibuntuti Marc Marquez dan Pecco Bagnaia.\r\n\r\nPada lap kesembilan, Marc Marquez mampu memangkas jarak dan berhasil merebut posisi terdepan dari sang adik, Alex Marquez. Sementara Bagnaia makin tertinggal di urutan ketiga.\r\n\r\nSedangkan Maverick Vinales mengalami crash usai gagal melewati Franco Morbidelli. Vinales tak mampu menyelesaikan balapan sementara Morbidelli dijatuhi sanksi long lap penalty akibat insiden dengan Vinales.\r\n\r\nSelepas lap kesembilan, Marc Marquez makin nyaman memimpin balapan hingga balapan tuntas. Alex Marquez juga mampu mempertahankan posisi kedua.\r\n\r\nAdapun Bagnaia kesulitan menambah kecepatan bahkan harus melorot ke posisi keempat setelah disalip Fabio Di Giannantonio di lap ke-21.\r\n\r\nHasil MotoGP Italia 2025:\r\n1. Marc Marquez 41 menit 9,214 detik\r\n2. Alex Marquez\r\n3. Fabio Di Giannantonio\r\n4. Francesco Bagnaia\r\n5. Marco Bezzecchi\r\n6. Franco Morbidelli\r\n7. Raul Fernandez\r\n8. Pedro Acosta\r\n9. Brad Binder\r\n10. Ai Ogura', 'images/thumbnail/coQ9WSoVZSRCJDXvoHYnLsaXMmxjjA8oV20s9Wuj.jpg', 0, NULL, '2025-06-22 00:13:21', '2025-06-22 00:13:21'),
(25, 'Perang Israel-Iran, Trump Mulai Kerahkan Jet Bomber B-2 AS', 'Presiden Amerika Serikat Donald Trump mulai memerintahkan Pentagon mengerahkan pesawat jet bomber B-2 untuk opsi membantu Israel menggempur Iran.\r\n\r\nBerdasarkan laporan CNN melalui data penerbangan, sejumlah pesawat bomber sudah dipindahkan dari pangkalan udara Whiteman di Missouri pada Jumat malam waktu setempat menuju ke barat.\r\n\r\nTrump disebut bakal condong mengambil opsi memerintahkan Pentagon untuk melakukan serangan ke Iran, dikutip dari CNN.\r\n\r\nPejabat AS mengatakan sejauh ini belum ada perintah langsung yang diberikan untuk menggunakan bomber B-2 menyerang Iran.\r\n\r\nPer Sabtu kemarin, pesawat-pesawat itu terbang melewati Samudra Pasifik menuju Guam.\r\n\r\nPejabat pertahanan AS menyatakan pergerakan jet bomber tersebut bukan berarti indikasi perintah langsung untuk menyerang Iran, melainkan bertujuan sebagai opsi untuk Presiden AS.\r\n\r\nPejabat AS lainnya menerangkan bahwa pergerakan jet bomber B-2 itu sebagai bagian dari unjuk kekuatan AS untuk melakukan gertakan terhadap Iran.\r\n\r\nJet bomber B-2 merupakan satu-satunya pesawat yang mampu mengangkut bom berkemampuan menghancurkan pertahanan bunker terdalam seperti bunker fasilitas pengayaan nuklir di Fordo, Iran.\r\n\r\nB-2 bisa mengangkut dua bom \"penghancur bunker\" dengan berat sekitar 13.600 kilogram untuk masing-masing bom yang dijatuhkan dari pesawat tersebut.\r\n\r\nPergerakan jet bomber B-2 dilakukan setelah Trump banyak menghabiskan waktu di dalam Ruang Situasi, meninjau rencana serangan dan menanyakan ke pejabat mengenai potensi konsekuensi dari rencana-rencana itu.\r\n\r\nTrump mengatakan tenggat dua pekan perencanaan itu merupakan yang paling maksimal sebelum memutuskan untuk memerintahkan menyerang Iran.', 'images/thumbnail/ZNxVF5A7c0SraGql7Tjw4MRpkgPXsmHq8rpsN27h.png', 0, NULL, '2025-06-22 00:15:02', '2025-06-22 00:15:02'),
(26, 'Iran Tembak Jatuh 2 Jet Tempur F-35 Israel', 'Iran menyatakan pihaknya berhasil menembak jatuh dan menghancurkan dua jet tempur F-35 Israel.\r\nDalam situs berita milik pemerintah Iran, Irna menyatakan Pertahanan Udara milik AD Republik Iran berhasil menembak dua jet tempur milik Israel. Tak hanya itu, namun juga kendaraan udara mikro alias Micro Air Vehicles (MAVs) berhasil dilumpuhkan oleh Iran.\r\n\r\nUsai penembakan dua jet tempur itu, demikian Irna, nasib pilotnya belum diketahui hingga kini dan masih dalam penyelidikan.\r\n\r\nDiketahui, Israel meluncurkan serangan ke Iran pada Jumat (13/6) dini hari. Tel Aviv menargetkan fasilitas nuklir, program senjata nuklir, program persenjataan rudal balistik, hingga ilmuwan nuklir Iran.\r\n\r\nKhamenei telah bersumpah akan membalas serangan Israel ini. Pada hari yang sama, Iran meluncurkan ratusan drone ke Israel, meski sebagian besar dicegat oleh Tel Aviv dan Yordania.\r\n\r\nTak berhenti, Iran kini mulai menembakkan ratusan rudal balistik ke Israel. Garda Revolusi Islam Iran (IRGC) menyatakan pihaknya menargetkan puluhan titik di Israel, termasuk situs militer dan pangkalan udara.', 'images/thumbnail/K3CPoSNts7epqUkTVuwfzPbVwST5RuoKVM9J3bKf.png', 0, NULL, '2025-06-22 00:15:44', '2025-06-22 00:15:44'),
(27, 'Industri Militer Iran Mandiri, Punya Sistem Rudal Terbaik?', 'Perlawanan Iran terhadap Israel membetot sorotan masyarakat internasional. Digempur secara mendadak tak membuat Iran lemah. Serangan balasan pun dilakukan.\r\n\r\nRupanya, negeri para Mullah ini menyimpan banyak rudal yang terus ditembakkan ke Israel.\r\n\r\nSitus yang menyoroti persenjataan nonkonvensional Iran, Iranwatch.com, menuliskan rudal Iran adalah yang terbesar dan paling beragam di Timur Tengah.\r\n\r\nPada tahun 2022, Jenderal Kenneth McKenzie dari Komando Pusat AS menyatakan bahwa Iran memiliki \"lebih dari 3.000\" rudal balistik.\r\n\r\nJumlah ini tidak termasuk kekuatan rudal jelajah serang darat yang sedang berkembang pesat. Iran telah melakukan peningkatan yang signifikan dalam dekade terakhir dalam hal presisi dan akurasi rudal, sehingga menjadikannya sebagai ancaman konvensional yang semakin kuat.\r\n\r\nSoal presisi dan akurasi, disebutkan dalam situs itu, rudal Iran bisa menjangkau hingga 2.000 kilometer.\r\n\r\n\"Namun, Iran dapat mengabaikan batas tersebut kapan saja, dan memang telah mengerahkan sebuah sistem, Khorramshahr, yang hampir pasti dapat mencapai jangkauan yang lebih jauh jika dilengkapi dengan hulu ledak yang lebih ringan,\" tulis situs tersebut.\r\n\r\nSebelum Revolusi Islam 1979, di bawah rezim Pahlavi yang didukung AS, Iran secara eksklusif menjadi pengimpor persenjataan Barat, yang sepenuhnya bergantung pada pemasok militer asing.\r\n\r\nSetelah 46 tahun berlalu Iran menjadi salah satu negara dengan militer paling maju di kawasan itu. Pascarevolusi, Iran dimusuhi Amerika dan Israel, yang membuat mereka bergegas mendirikan industri militer Qods Aviation Industry Company di Teheran dan HESA (Iran Aircraft Manufacturing Industrial Company) di Isfahan. Mau tak mau mereka harus mandiri, sebab blokade ekonomi dan peralatan tempur dari Amerika Serikat dan sekutunya.\r\n\r\nKedua perusahaan ini menjadi tulang punggung industri pesawat nirawak Iran yang baru lahir, mengembangkan UAV (Unmanned Aerial Vehicle) pesawat udara tanpa awak, seperti pesawat nirawak pengintai Mohajer, pesawat nirawak pelatihan Talash, dan pesawat nirawak serang Ababil.\r\n\r\nDengan industri militer yang mandiri ini, Iran telah menggunakan rudal dalam pertempuran beberapa kali sejak 2017 termasuk serangan rudal balistik terhadap pangkalan Irak yang menampung pasukan AS pada tahun 2020.\r\n\r\nIran juga telah mentransfer rudal ke proksi seperti pemberontak Houthi Yaman. Pada 2024 lalu, rudal Fattah menjangkau Israel sebagai balasan atas kematian pemimpin Hizbullah Hasan Nasrallah.\r\n\r\nBeberapa rudal milik Iran antara lain, Shahab dengan jangkauan 300 km dan muatan antara 700-1000 kg dengan tenaga penggerak bahan bakar cair. Kemudian Fattah 110, Fattah 113, dengan jangakaun hingga 500 km dan muatan sebanyak 350 kg dan bahan bakar padat.\r\n\r\nKemudian Sejil dengan jarak tempuh hingga 2000 km dan muatan hingga 750 kg. Ada juga Ya Ali dengan jarak tempuh hingga 700 km dan muatan tidak diketahui, namun bahan pendorong mesin turbo jet yang kini sedang tahap uji coba. Iran juga punya rudal Zuljanah, Qased, Safir, Simorg, Paveh, Haji Qasem dan Summar.', 'images/thumbnail/27YDZu74cYIVLLH6OSa6Hnf26du2jMVAwiYzYONf.png', 0, NULL, '2025-06-22 00:18:31', '2025-06-22 00:18:31'),
(28, 'Jon Jones Resmi Pensiun, Gelar Juara Dunia UFC Jatuh ke Aspinall', 'CEO Ultimate Fighting Championship (UFC) Dana White mengumumkan juara kelas berat Jon Jones pensiun.\r\nDengan demikian, gelar juara kelas berat (120,2kg) tak terbantahkan untuk sementara diberikan kepada Tom Aspinall.\r\n\r\n\"Jon Jones menelepon kami semalam dan menyatakan pensiun. Jon Jones secara resmi telah pensiun. Tom Aspinall jadi juara kelas berat UFC,\" kata Dana White dikutip MMA Fighting, Minggu (22/6).\r\n\r\nWhite baru-baru ini mengatakan bahwa ia menetapkan tenggat waktu untuk mengatur pertandingan Jones lawan Aspinall setelah berbulan-bulan tanpa adanya kepastian.\r\n\r\nSebelumnya, Jones sudah menegaskan tertarik lagi untuk bertarung. Namun, kala itu ia tidak menegaskan untuk pensiun.\r\n\r\nJuara dunia kelas berat asal Amerika Serikat itu akhirnya mengambil keputusan untuk mengakhiri karirnya di MMA.\r\n\r\nJon Jones kali terakhir bertarung tujuh bulan lalu yang berakhir dengan kemenangan atas Stipe Miocic. Pihak UFC telah memberikan tenggat waktu kepada Jones untuk kembali ke octagon, namun sang petarung tak kunjung memberi kepastian.\r\n\r\nWhite mengakui tidak menyesal telah memberi waktu bagi mantan juara dunia itu untuk memutuskan masa depannya.\r\n\r\n\"Dengar, jika Anda melihat apa yang telah ia capai dalam olahraga ini, tidak (saya tidak menyesalinya). Ya, memang begitulah adanya,\" kata White.\r\n\r\nWhite kemudian memuji kesabaran Aspinall yang sudah setia menunggu penetapan jadwal melawan Jones dalam sebuah pertarungan penyatuan gelar kelas berat.\r\n\r\n\"Saya jelas merasa tidak enak untuk Tom karena dia kehilangan banyak waktu dan tentu saja uang, tetapi kami akan menebusnya.\"\r\n\r\n\"Aspinall sangat luar biasa. Ia akan menjadi juara kelas berat yang hebat bagi kami. Saya sangat bersemangat untuk bekerja sama dengannya,\" ujar White.\r\n\r\nBelum ada kabar kapan Aspinall bakal bertarung lagi di UFC. Namun, calon penantang yang bakal dihadapinya adalah Ciryl Gane atau Jailton Almeida, yang sedang dalam dua kemenangan beruntun di divisi tersebut.', 'images/thumbnail/xA0vRb3MKJHZqelxuHVYkfa2uAVlFX1ZgutN9sbm.jpg', 0, NULL, '2025-06-22 00:20:16', '2025-06-22 00:20:16'),
(29, 'Daftar 10 Bek Termahal Asia, Termasuk Jay Idzes Tembus Rp141 M', 'Bek andalan Timnas Indonesia Jay Idzes masuk daftar 10 bek termahal di Asia. Pemain Venezia itu punya nilai jual mencapai Rp141 miliar.\r\nSaat ini, para pemain Asia mulai bersaing di bursa transfer internasional. Tak sedikit pula yang bermain di klub-klub Eropa ternama.\r\n\r\nJay Idzes yang bermain untuk Venezia, jadi salah satu bek yang punya nilai jual cukup tinggi. Merujuk Transfermarkt, pemain 25 tahun itu berbanderol 7,5 juta euro atau sekira Rp141 miliar.\r\n\r\nPemain jebolan akademi PSV Eindhoven itu menjadi pemain bertahan dengan nilai jual termahal di kawasan ASEAN. Namun, ia tercatat sebagai bek termahal ke-10 di Asia.\r\n\r\nPosisi teratas masih dihuni bek Korea Selatan, Kim Min Jae, yang berseragam Bayern Munchen. Saat ini Kim memiliki nilai jual sebesar 40 juta euro atau setara Rp755 juta.\r\n\r\nBek Asia termahal kedua adalah Abdukodir Khusanov asal Uzbekistan. Pemain Manchester City itu punya banderol sebesar 35 juta euro atau sekitar Rp661 miliar.\r\n\r\nPosisi ketiga hingga delapan didominasi pemain bertahan asal Jepang. Mereka adalah Hiroki Ito, Takehiro Tomiyasu, Ko Itakura, Koki Machida, Yukinari Sugawara, dan Tsuyoshi Watanabe.\r\n\r\nSementara pemain Australia berdarah Italia, Alessandro Circati berada di urutan kesembilan atau setingkat di atas Jay Idzes.\r\n\r\nIdzes saat ini dikabarkan sedang diminati sejumlah klub-klub Serie A setelah Venezia turun kasta ke Serie B. Udinese disebut-sebut sebagai tim yang paling ngotot mendatangkan Idzes.\r\n\r\nBek Asia termahal kedua adalah Abdukodir Khusanov asal Uzbekistan. Pemain Manchester City itu punya banderol sebesar 35 juta euro atau sekitar Rp661 miliar.\r\n\r\nPosisi ketiga hingga delapan didominasi pemain bertahan asal Jepang. Mereka adalah Hiroki Ito, Takehiro Tomiyasu, Ko Itakura, Koki Machida, Yukinari Sugawara, dan Tsuyoshi Watanabe.\r\n\r\nSementara pemain Australia berdarah Italia, Alessandro Circati berada di urutan kesembilan atau setingkat di atas Jay Idzes.\r\n\r\nIdzes saat ini dikabarkan sedang diminati sejumlah klub-klub Serie A setelah Venezia turun kasta ke Serie B. Udinese disebut-sebut sebagai tim yang paling ngotot mendatangkan Idzes.', 'images/thumbnail/PNKiBCgXrJ9tWuYcJaWmLLTlIMrKYXtnRkdana2V.jpg', 0, NULL, '2025-06-22 00:21:43', '2025-06-22 00:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('muhamadrafli1.013@gmail.com', '$2y$10$745mq0AyOLYS.FWUJUzNd.vGk5W0oJKv5nnMIBcGS7WHnayJU4g3.', '2025-07-10 10:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jessica Wongso', 'admin@gmail.com', NULL, '$2y$10$P9jSxBAZ4xIPBD1X4s6W.uuiOPiSKuvisNVXUwL1Q9xEDoDlehJWm', 'admin', NULL, '2025-07-07 06:15:49', '2025-07-13 11:23:45'),
(2, 'Rafli', 'muhamadrafli1.013@gmail.com', '2025-07-10 04:17:36', '$2y$10$rmWLOdNeE2MJF2r2PuZ4Q.WLWgkg3Czbrm8w7RbNKEbmoXtQ3UjT6', 'user', NULL, '2025-07-07 06:16:03', '2025-07-10 05:28:17'),
(3, 'sulfia', 'sulfia@gmail.com', NULL, '$2y$10$0xDrBwJQ68L3evu.uHyz.uWM5zLRQgLVIIZc2iimeUJ7IBkByeVwO', 'user', NULL, '2025-07-07 07:17:39', '2025-07-07 07:17:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_news_news_id_foreign` (`news_id`),
  ADD KEY `category_news_category_id_foreign` (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_news_id_foreign` (`news_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `comment_reactions`
--
ALTER TABLE `comment_reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_reactions_comment_id_foreign` (`comment_id`),
  ADD KEY `comment_reactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_author_id_foreign` (`author_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment_reactions`
--
ALTER TABLE `comment_reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_news`
--
ALTER TABLE `category_news`
  ADD CONSTRAINT `category_news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_news_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_reactions`
--
ALTER TABLE `comment_reactions`
  ADD CONSTRAINT `comment_reactions_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_reactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
