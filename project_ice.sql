-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2023 at 02:16 PM
-- Server version: 8.0.33-0ubuntu0.22.10.2
-- PHP Version: 8.1.7-1ubuntu3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ice`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_role`
--

CREATE TABLE `tbl_mst_role` (
  `id_role` int NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_mst_role`
--

INSERT INTO `tbl_mst_role` (`id_role`, `role`) VALUES
(1, 'Pimpinan'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanaman`
--

CREATE TABLE `tbl_tanaman` (
  `id_tanaman` int NOT NULL,
  `gambar_tanaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_tanaman` varchar(100) NOT NULL,
  `id_varietas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `informasi_umum` text NOT NULL,
  `informasi_budidaya` text NOT NULL,
  `informasi_hama` text NOT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_tanaman`
--

INSERT INTO `tbl_tanaman` (`id_tanaman`, `gambar_tanaman`, `nama_tanaman`, `id_varietas`, `informasi_umum`, `informasi_budidaya`, `informasi_hama`, `qrcode`, `date_created`, `date_updated`, `is_active`) VALUES
(5, '179db48276fa9a5f42369e8de1bbcf5c.jpg', 'cabai rawit', '3', 'Cabai adalah buah dan tumbuhan anggota genus Capsicum. Buahnya dapat digolongkan sebagai sayuran maupun bumbu, tergantung bagaimana pemanfaatannya. Sebagai bumbu, buah cabai yang pedas sangat populer di Asia Tenggara sebagai penguat rasa untuk makanan.\r\n', 'Pilih Benih Cabe Berkwalitas\r\nKeluarkan Biji Cabe dari Buahnya\r\nJemur Biji Cabe\r\nSeleksi Biji Cabe\r\nMulai Penyemaian\r\nPindahkan ke Media Tanam\r\nMulai Perawatan Tanaman Cabe', ' trips, kutu daun apids, kutu daun persik, tungau, kutu kebul, lalat buah dan ulat grayak. “Trips, apids, dan tungau merupakan pembawa (vektor) penyakit keriting yang disebabkan oleh virus', '5.png', '2023-08-10 18:50:53', '2023-08-02 22:49:03', '1'),
(7, 'e100de6e135d0abea12fc4ba462fe8c9.jpg', 'sirsak ', '4', 'Buah sirsak biasa tersebah diseluruh wilayah nusantara. Bentuk buah sirsak biasa memiliki kemiripan dengan sirsak ratu. Perbedaannya terletak pada daging buah yang bertepung, Berkadar air tinggi, dan berasa asam manis. Buah sirsak jenis ini paling cocok untuk minuman, seperti campuran es krim, jus buah, atau sari buah. Disamping itu sirsak biasacocok diolah menjadi wajik, dodol, selai, sirup, dan jelly. ', '1.) Persiapan Lahan -Pembuatan lubang tanam (50 x 50 x 50) cm. -Jarak tanam (4 x 4) m; (4 x 5) m atau (5 x 5) m. -Dibiarkan selama 2 - 4 minggu sebelum tanam. -Diberi pukan 10 - 15 kg perlubang. -Penanaman benih awal musim hujan. 2.) Persiapan Benih -Perbanyak generatif/ biji. -Perbanyak vegetatif (sambung atau okulasi). -Penyediaan batang bawah. -Penyediaan batang atas/entris. -Penyambungan atau okulasi. 3.) Pemeliharaan Tanaman a. Penyulaman -Penyulaman hingga 6 mg setelah tanam. -Penyiraman sesuai kondisi tanaman dan curah hujan. -Pemupukan sesuai kondisi tanaman dan tingkat kesuburan tanah. -Pad awal penanaman diberikan 1 kg NPK dengan cara dicampur dengan tanah pada lubang tanam terlebih dahulu. b. Pemangkasan -Dilakukan pada tunas-tunas air dan ranting yang tumbuh berdekatan dan saling silang. -Menjaga agar tanaman tidak terlalu tinggi (<3 m) untuk mempermudah pemanenan. 4.) Panen Kriteria panen: -Umur 12 minggu setelah persarian. -Letak duri jarang kerapatan duri 2 buah/cm. -Warna buah berubah dari hijau mengkilat menjadi hijau kekuningan. -Total padatan terlarut : 14 orbix. -Produksi bisa mencapai 30-40 buah/tan/tahun atau 7 ton pertahun dengan populasi 200 tan/ha. 5.) Syarat Tumbuh -Mampu tumbuh baik mulai dataran rendah sampai 700 mdpl, tanaman ini juga masih mampu tumbuh 1000 mdpl, tetapi pembuangan terhambat. -Mampu tumbuh pada berbagai jenis tanah, cukup bahan organik pH 4,5 - 8. -Menghendaki air tanah yang cukup, tetapi tidak menggenang. -Sinar matahari cukup -Suhu optimum 25 - 30 derajat C. -Curah hujan optimum 1500 - 2000 mm/tahun. ', '1.) Kutu Sisik Cara pengendalian: -Pemanfaatan musuh alami cephalosporium lecanii. -Pemusnahaan semut rangrang. -Penggunaan metyl eugenol. -Secara kimiawi dengan insektisida sipermetrin 50g/ltr, betasilflutrim 25g/l, profenofos 500g/l dan deltametrim 25g/l. 2.) Antraknosa Antraknosa (Colletotrichum glocosporioides) Jenis penyakit tumbuhan yang ditemukan pada berbagai tanaman pohon dan semak, awal gejala yang ditunjukan berupa bercak pada daun. Pengendalian: -Dapat dilakukan dengan sanitasi kebun dan cara kimia dengan fungisida Antracol atau Dithane M 45. 3.) Busuk Batang (Corticium sp) Penyakit yang disebabkan cendawan Cortisium sp. Ini, menyebabkan busuknya cabang dan pembunuh pohon, Batang dan cabang yang diserang tampak berwarna coklat dan membusuk. Secara umum, penyakit-penyakit yang disebabkan oleh cendawan atau jamur ini muncul akibat kelembapan yang sangat tinggi di areal penanaman sirsak. Pengendalian: -Yang terpenting adalah memperbaiki drainase, mencegah terjadinya genangan air di sekitar tanaman, dan membasmi serangga atau hama yang menjadi vektor penyebaran penyakit. -Buang dan bakar bagian-bagian tanaman yang sakit agar tidak menulari tanaman lain atau bagian-bagian tanaman lain. Pemanfaatan agen-agen hayati, seperti beauveria bassiana, Trichoderma harzianum, dan Gliocladium virens menjadi pilihan yang lebih baik dan sama efektifnya dengan fungisida kimia. ', '7.png', '2023-08-10 18:51:44', '2023-08-06 07:29:41', '1'),
(8, 'fb74186781a563085c8f92f75878fa21.jpg', 'Sirsak', '2', 'Daerah penyebaran sirsak ratu adalah daerah pelabuhan ratu, suka bumi ( Jawa Barat). Buah sirsak ratu memiliki ukuran yang beragam, mulai ukuran kecil hingga ukuran besar. Berkulit licin dan berduru, daging buah kering bertepung dan manis. Buah sirsak ini sangat cocok dikonsumsi dalam keadaan segaratau diolah menjadi minuman. ', '1.) Persiapan Lahan -Pembuatan lubang tanam (50 x 50 x 50) cm. -Jarak tanam (4 x 4) m; (4 x 5) m atau (5 x 5) m. -Dibiarkan selama 2 - 4 minggu sebelum tanam. -Diberi pukan 10 - 15 kg perlubang. -Penanaman benih awal musim hujan. 2.) Persiapan Benih -Perbanyak generatif/ biji. -Perbanyak vegetatif (sambung atau okulasi). -Penyediaan batang bawah. -Penyediaan batang atas/entris. -Penyambungan atau okulasi. 3.) Pemeliharaan Tanaman a. Penyulaman -Penyulaman hingga 6 mg setelah tanam. -Penyiraman sesuai kondisi tanaman dan curah hujan. -Pemupukan sesuai kondisi tanaman dan tingkat kesuburan tanah. -Pad awal penanaman diberikan 1 kg NPK dengan cara dicampur dengan tanah pada lubang tanam terlebih dahulu. b. Pemangkasan -Dilakukan pada tunas-tunas air dan ranting yang tumbuh berdekatan dan saling silang. -Menjaga agar tanaman tidak terlalu tinggi (<3 m) untuk mempermudah pemanenan. 4.) Panen Kriteria panen: -Umur 12 minggu setelah persarian. -Letak duri jarang kerapatan duri 2 buah/cm. -Warna buah berubah dari hijau mengkilat menjadi hijau kekuningan. -Total padatan terlarut : 14 orbix. -Produksi bisa mencapai 30-40 buah/tan/tahun atau 7 ton pertahun dengan populasi 200 tan/ha. 5.) Syarat Tumbuh -Mampu tumbuh baik mulai dataran rendah sampai 700 mdpl, tanaman ini juga masih mampu tumbuh 1000 mdpl, tetapi pembuangan terhambat. -Mampu tumbuh pada berbagai jenis tanah, cukup bahan organik pH 4,5 - 8. -Menghendaki air tanah yang cukup, tetapi tidak menggenang. -Sinar matahari cukup -Suhu optimum 25 - 30 derajat C. -Curah hujan optimum 1500 - 2000 mm/tahun. ', '1.) Kutu Sisik Cara pengendalian: -Pemanfaatan musuh alami cephalosporium lecanii. -Pemusnahaan semut rangrang. -Penggunaan metyl eugenol. -Secara kimiawi dengan insektisida sipermetrin 50g/ltr, betasilflutrim 25g/l, profenofos 500g/l dan deltametrim 25g/l. 2.) Antraknosa Antraknosa (Colletotrichum glocosporioides) Jenis penyakit tumbuhan yang ditemukan pada berbagai tanaman pohon dan semak, awal gejala yang ditunjukan berupa bercak pada daun. Pengendalian: -Dapat dilakukan dengan sanitasi kebun dan cara kimia dengan fungisida Antracol atau Dithane M 45. 3.) Busuk Batang (Corticium sp) Penyakit yang disebabkan cendawan Cortisium sp. Ini, menyebabkan busuknya cabang dan pembunuh pohon, Batang dan cabang yang diserang tampak berwarna coklat dan membusuk. Secara umum, penyakit-penyakit yang disebabkan oleh cendawan atau jamur ini muncul akibat kelembapan yang sangat tinggi di areal penanaman sirsak. Pengendalian: -Yang terpenting adalah memperbaiki drainase, mencegah terjadinya genangan air di sekitar tanaman, dan membasmi serangga atau hama yang menjadi vektor penyebaran penyakit. -Buang dan bakar bagian-bagian tanaman yang sakit agar tidak menulari tanaman lain atau bagian-bagian tanaman lain. Pemanfaatan agen-agen hayati, seperti beauveria bassiana, Trichoderma harzianum, dan Gliocladium virens menjadi pilihan yang lebih baik dan sama efektifnya dengan fungisida kimia. ', '8.png', '2023-08-10 18:51:48', '2023-08-05 22:26:58', '1'),
(9, '7c6af5608d56ba4803bcf2667969377f.jpg', 'Sirsak', '1', 'Sirsak bali biasa disebut dengan sirsak gundul, sirsak sabun, sirsak mentega, atau sirsak irian. Sesuai dengan namanya, daerah penyebarannya sirsak bali adalah pulau dewata, bali dan sekitarnya. Sirsak bali memiliki ukuran kecil dengan bobot sekitar 200-300 gram perbuah. Kulit buahnya licin, tidak berduri, dan daging buahnya manis. Sirsak bali sangat cocok dikonsumsi segar atau dibuat minuman.', '1.) Persiapan Lahan -Pembuatan lubang tanam (50 x 50 x 50) cm. -Jarak tanam (4 x 4) m; (4 x 5) m atau (5 x 5) m. -Dibiarkan selama 2 - 4 minggu sebelum tanam. -Diberi pukan 10 - 15 kg perlubang. -Penanaman benih awal musim hujan. 2.) Persiapan Benih -Perbanyak generatif/ biji. -Perbanyak vegetatif (sambung atau okulasi). -Penyediaan batang bawah. -Penyediaan batang atas/entris. -Penyambungan atau okulasi. 3.) Pemeliharaan Tanaman a. Penyulaman -Penyulaman hingga 6 mg setelah tanam. -Penyiraman sesuai kondisi tanaman dan curah hujan. -Pemupukan sesuai kondisi tanaman dan tingkat kesuburan tanah. -Pad awal penanaman diberikan 1 kg NPK dengan cara dicampur dengan tanah pada lubang tanam terlebih dahulu. b. Pemangkasan -Dilakukan pada tunas-tunas air dan ranting yang tumbuh berdekatan dan saling silang. -Menjaga agar tanaman tidak terlalu tinggi (<3 m) untuk mempermudah pemanenan. 4.) Panen Kriteria panen: -Umur 12 minggu setelah persarian. -Letak duri jarang kerapatan duri 2 buah/cm. -Warna buah berubah dari hijau mengkilat menjadi hijau kekuningan. -Total padatan terlarut : 14 orbix. -Produksi bisa mencapai 30-40 buah/tan/tahun atau 7 ton pertahun dengan populasi 200 tan/ha. 5.) Syarat Tumbuh -Mampu tumbuh baik mulai dataran rendah sampai 700 mdpl, tanaman ini juga masih mampu tumbuh 1000 mdpl, tetapi pembuangan terhambat. -Mampu tumbuh pada berbagai jenis tanah, cukup bahan organik pH 4,5 - 8. -Menghendaki air tanah yang cukup, tetapi tidak menggenang. -Sinar matahari cukup -Suhu optimum 25 - 30 derajat C. -Curah hujan optimum 1500 - 2000 mm/tahun. ', '1.) Kutu Sisik Cara pengendalian: -Pemanfaatan musuh alami cephalosporium lecanii. -Pemusnahaan semut rangrang. -Penggunaan metyl eugenol. -Secara kimiawi dengan insektisida sipermetrin 50g/ltr, betasilflutrim 25g/l, profenofos 500g/l dan deltametrim 25g/l. 2.) Antraknosa Antraknosa (Colletotrichum glocosporioides) Jenis penyakit tumbuhan yang ditemukan pada berbagai tanaman pohon dan semak, awal gejala yang ditunjukan berupa bercak pada daun. Pengendalian: -Dapat dilakukan dengan sanitasi kebun dan cara kimia dengan fungisida Antracol atau Dithane M 45. 3.) Busuk Batang (Corticium sp) Penyakit yang disebabkan cendawan Cortisium sp. Ini, menyebabkan busuknya cabang dan pembunuh pohon, Batang dan cabang yang diserang tampak berwarna coklat dan membusuk. Secara umum, penyakit-penyakit yang disebabkan oleh cendawan atau jamur ini muncul akibat kelembapan yang sangat tinggi di areal penanaman sirsak. Pengendalian: -Yang terpenting adalah memperbaiki drainase, mencegah terjadinya genangan air di sekitar tanaman, dan membasmi serangga atau hama yang menjadi vektor penyebaran penyakit. -Buang dan bakar bagian-bagian tanaman yang sakit agar tidak menulari tanaman lain atau bagian-bagian tanaman lain. Pemanfaatan agen-agen hayati, seperti beauveria bassiana, Trichoderma harzianum, dan Gliocladium virens menjadi pilihan yang lebih baik dan sama efektifnya dengan fungisida kimia.', '9.png', '2023-08-11 05:32:09', '2023-08-06 07:29:44', '1'),
(16, 'p.png', 'nskankss', '1', 'nsjk xd d', 'dnksndjks', 'sndksnks', NULL, '2023-08-12 05:54:44', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanamanverif`
--

CREATE TABLE `tbl_tanamanverif` (
  `id_tanaman` int NOT NULL,
  `id_status` int NOT NULL,
  `date_verified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_tanamanverif`
--

INSERT INTO `tbl_tanamanverif` (`id_tanaman`, `id_status`, `date_verified`, `id_user`) VALUES
(5, 1, '2023-08-11 02:50:53', 1),
(7, 1, '2023-08-11 02:51:44', 1),
(9, 1, '2023-08-11 02:51:47', 1),
(8, 1, '2023-08-11 02:51:48', 1),
(16, 1, '2023-08-12 13:54:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int NOT NULL,
  `profile_pict` varchar(100) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `password`, `id_role`, `profile_pict`, `is_active`, `date_created`) VALUES
(1, 'silce tasman', 'admin@admin.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, '1', '1', '2023-08-10 17:12:08'),
(2, 'Nurazizah', 'operator@operator.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, '2', '1', '2023-08-11 05:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_varietas`
--

CREATE TABLE `tbl_varietas` (
  `id_varietas` int NOT NULL,
  `varietas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_varietas`
--

INSERT INTO `tbl_varietas` (`id_varietas`, `varietas`) VALUES
(1, 'Sirsak Bali'),
(4, 'Sirsak Lokal'),
(2, 'Sirsak Ratu'),
(3, 'Spesies Capsicum');

-- --------------------------------------------------------

--
-- Table structure for table `t_status`
--

CREATE TABLE `t_status` (
  `id_status` int NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `t_status`
--

INSERT INTO `t_status` (`id_status`, `status`) VALUES
(1, 'Terverifikasi'),
(2, 'Belum Terverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mst_role`
--
ALTER TABLE `tbl_mst_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_tanaman`
--
ALTER TABLE `tbl_tanaman`
  ADD PRIMARY KEY (`id_tanaman`);

--
-- Indexes for table `tbl_tanamanverif`
--
ALTER TABLE `tbl_tanamanverif`
  ADD KEY `id_tanaman` (`id_tanaman`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `tbl_varietas`
--
ALTER TABLE `tbl_varietas`
  ADD PRIMARY KEY (`id_varietas`),
  ADD UNIQUE KEY `varietas` (`varietas`);

--
-- Indexes for table `t_status`
--
ALTER TABLE `t_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mst_role`
--
ALTER TABLE `tbl_mst_role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tanaman`
--
ALTER TABLE `tbl_tanaman`
  MODIFY `id_tanaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_status`
--
ALTER TABLE `t_status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
