-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 04:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat_keluar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kendali_surat`
--

CREATE TABLE `tbl_kendali_surat` (
  `no_urut` int(10) NOT NULL,
  `jenis_surat` varchar(16) NOT NULL,
  `nomor_surat` int(10) NOT NULL,
  `indeks` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `pengolah` text NOT NULL,
  `catatan` text NOT NULL,
  `klasifikasi` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `dari` text NOT NULL,
  `kepada` text NOT NULL,
  `isi_ringkasan` text NOT NULL,
  `lampiran` text NOT NULL,
  `file` text DEFAULT NULL,
  `log_insert` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kendali_surat`
--

INSERT INTO `tbl_kendali_surat` (`no_urut`, `jenis_surat`, `nomor_surat`, `indeks`, `tanggal`, `pengolah`, `catatan`, `klasifikasi`, `kode`, `dari`, `kepada`, `isi_ringkasan`, `lampiran`, `file`, `log_insert`) VALUES
(1, '', 1, 1, '2022-09-07', 'Gamalama', 'asd', 'PR.05', 'W11.IMI.IMI.3', 'Kantor imigrasi', 'dinas parisiwata', 's', 's', 'sad', '2023-01-04 01:13:57'),
(14, 'sadasd', 2, 545, '2022-09-12', 'asd', 'sdf', 'PR.05', 'W11.IMI.IMI.3', 'sdfsd', 'sdfds', 'sdfsdf', 'fd', '7-11-1-SM.pdf', '2023-01-04 01:13:57'),
(15, 'asd', 11, 1, '2022-10-12', 'asd', 'dasd', 'PR.05', 'W11.IMI.IMI.3', 'asd', 'asd', 'asdas', 'asd', 'asdasdas', '2023-01-04 01:13:57'),
(16, 'asd', 16, 22, '2022-10-12', 'aji masaid', 'AS', 'PR.05', 'W11.IMI.IMI.3', 'as', 'AS', 'ASas', 'as', '5_Model_Penerapan_Strategi.pdf', '2023-01-04 01:13:57'),
(17, 'dsad', 17, 23, '2022-09-27', 'aji masaid', 'ZXZX', 'PR.05', 'W11.IMI.IMI.3', 'zXzx', 'ZX', 'ZXZX', 'ZX', '4382-10904-1-PB.pdf', '2023-01-04 01:13:57'),
(18, 'asd', 18, 53, '2022-10-03', 'aji masaid', 'asd', 'PR.06.01', 'W11.IMI.IMI.3', 'asd', 'asd', 'asd', 'asd', 'od_15575_jml_pemerlu_pelayanan_ksjhtrn_ssl_ppks__jenis_kabupate.zip', '2023-01-04 01:13:57'),
(19, '2', 19, 2, '2022-10-21', 'aji masaid', 'wqwqaws', 'PR.05.04', 'W11.IMI.IMI.3', '2', '2', 'wqw', '2', NULL, '2023-01-04 01:13:57'),
(20, 'sdfsdf', 20, 5, '2022-10-06', 'aji masaid', 'asd', 'PR.05.04', 'W11.IMI.IMI.3', 'dasd', 'asd', 'asd', 'asd', NULL, '2023-01-04 01:13:57'),
(21, 'sdfsdf', 20, 5, '2022-10-06', 'aji masaid', 'asd', 'PR.05.04', 'W11.IMI.IMI.3', 'dasd', 'asd', 'asd', 'asd', NULL, '2023-01-04 01:13:57'),
(22, 'sdfsdf', 20, 5, '2022-10-06', 'aji masaid', 'asd', 'PR.05.04', 'W11.IMI.IMI.3', 'dasd', 'asd', 'asd', 'asd', '564-Article_Text-1247-1-10-20190721.pdf', '2023-01-04 01:13:57'),
(23, 'sdfsdf', 20, 5, '2022-10-06', 'aji masaid', 'asd', 'PR.05.04', 'W11.IMI.IMI.3', 'dasd', 'asd', 'asd', 'asd', '5_Model_Penerapan_Strategi1.pdf', '2023-01-04 01:13:57'),
(24, 'sd', 24, 42, '2022-10-13', 'aji masaid', 'asdasd', 'PR.05', 'W11.IMI.IMI.3', 'asd', 'asd', 'asd', 'asd', '1b5d43c9-ba2f-4a86-a2a8-c83982024900.pdf', '2023-01-04 01:13:57'),
(25, '', 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '1__BPDM_-_CH11.pdf', '2023-01-04 01:13:57'),
(26, 'qwe', 26, 1, '2022-10-04', 'aji masaid', 'as', 'PR.06.02', 'W11.IMI.IMI.3', 'as', 'AS', 'AS', 'as', 'distributed_system_kesa13.pdf', '2023-01-04 01:13:57'),
(27, 'sf', 27, 23, '2022-12-21', 'aji masaid', 'sff', 'PR.05', 'W11.IMI.IMI.3', 'afs', 'sf', 'sfsfdd', 'sf', NULL, '2023-01-04 01:13:57'),
(28, 'wefwe', 28, 343, '2022-12-22', 'aji masaid', 'fsdfsdfsdfsd', 'PR.05', 'W11.IMI.IMI.3', 'sdf', 'dfsf', 'sdfsdfsfd\r\nsdfsdf\r\nsdfsdf\r\nsdfsdf', 'sdfsd', NULL, '2023-01-04 01:13:57'),
(29, 'fsdfsdf', 29, 343, '2022-12-16', 'aji masaid', 'assaalmuaikum wr wb selama saya menjad keruasdfasdf', 'PR.05', 'W11.IMI.IMI.3', 'dfssd', 'sdfsdf', 'assaalmuaikum wr wb selama saya menjad keruasdfasdf', '-', NULL, '2023-01-04 01:13:57'),
(30, '53453', 30, 6, '2022-12-15', 'aji masaid', 'sda', 'PR.05', 'W11.IMI.IMI.3', 'dsa', 'asd', 'sadasd', 'asd', NULL, '2023-01-04 01:13:57'),
(31, '0', 0, 0, '0000-00-00', '-', '-', '-', '-', '-', '-', '-', '-', NULL, '2023-01-04 01:13:57'),
(32, 'qwe', 1, 3, '2022-12-21', 'aji masaid', 'asd', 'PR.05', 'W11.IMI.IMI.3', 'sdfsdf', 'kepala kantor imigrasi', 'asd', '-', NULL, '2023-01-04 01:13:57'),
(33, 'qwe', 2, 21, '2022-12-15', 'aji masaid', 'sadasd', 'PR.05', 'W11.IMI.IMI.3', 'dfg', 'kepala kantor imigrasi', 'dsasdasd', 'as', NULL, '2023-01-04 01:13:57'),
(34, 'sadasd', 3, 2, '2023-01-16', 'aji masaid', 'asdasd', 'asd', 'W11.IMI.IMI.3', 'asd', 'asd', 'asdasd', 'asd', NULL, '2023-01-04 01:15:07'),
(35, '0', 0, 0, '0000-00-00', '-', '-', '-', '-', '-', '-', '-', '-', NULL, '2023-01-04 04:55:49'),
(36, 'dasd', 1, 32, '2023-02-01', 'aji masaid', 'asdasdasd', 'asas', 'W11.IMI.IMI.3', 'dasd', 'asdas', 'asdasdasdas', 'asdasd', 'MKSI_Kesa_purnama.pdf', '2023-01-04 04:56:21'),
(37, 'vvdxczxczx', 2, 4, '2023-01-05', 'Hj. Asep arifin ilham', 'ksdfjsdhfjdf sdfghsdjhfd', 'sdjfdjfhjdf', 'W11.IMI.IMI.3', 'kesa', 'gtau siapa', 'kdkkdkf djfdkjfkdf dfsldjflksdjf', '-', NULL, '2023-01-04 05:57:44'),
(38, 'vvdxczxczx', 2, 4, '2023-01-05', 'Hj. Asep arifin ilham', 'ksdfjsdhfjdf sdfghsdjhfd', 'sdjfdjfhjdf', 'W11.IMI.IMI.3', 'kesa', 'gtau siapa', 'kdkkdkf djfdkjfkdf dfsldjflksdjf', '-', NULL, '2023-01-04 05:58:52'),
(39, 'vvdxczxczx', 2, 4, '2023-01-05', 'Hj. Asep arifin ilham', 'ksdfjsdhfjdf sdfghsdjhfd', 'sdjfdjfhjdf', 'W11.IMI.IMI.3', 'kesa', 'gtau siapa', 'kdkkdkf djfdkjfkdf dfsldjflksdjf', '-', NULL, '2023-01-04 05:58:57'),
(40, 'dasdk;l', 3, 99, '2023-01-19', 'Hj. Asep arifin ilham', 'sacasdcasasd', 'asdasd', 'W11.IMI.IMI.3', 'as,das', 'das', ',amsndas,mnd,asndnasda d,ascn cklas xcxckns xkcna sckxz', '-', NULL, '2023-01-04 05:59:29'),
(41, 'dasdk;l', 3, 99, '2023-01-19', 'Hj. Asep arifin ilham', 'sacasdcasasd', 'asdasd', 'W11.IMI.IMI.3', 'as,das', 'das', ',amsndas,mnd,asndnasda d,ascn cklas xcxckns xkcna sckxz', '-', NULL, '2023-01-04 06:01:31'),
(42, 'dasdk;l', 3, 99, '2023-01-19', 'Hj. Asep arifin ilham', 'sacasdcasasd', 'asdasd', 'W11.IMI.IMI.3', 'as,das', 'das', ',amsndas,mnd,asndnasda d,ascn cklas xcxckns xkcna sckxz', '-', NULL, '2023-01-04 06:01:35'),
(43, 'dasdk;l', 3, 99, '2023-01-19', 'Hj. Asep arifin ilham', 'sacasdcasasd', 'asdasd', 'W11.IMI.IMI.3', 'as,das', 'das', ',amsndas,mnd,asndnasda d,ascn cklas xcxckns xkcna sckxz', '-', NULL, '2023-01-04 06:04:04'),
(44, 'dasdk;l', 3, 99, '2023-01-19', 'Hj. Asep arifin ilham', 'sacasdcasasd', 'asdasd', 'W11.IMI.IMI.3', 'as,das', 'das', ',amsndas,mnd,asndnasda d,ascn cklas xcxckns xkcna sckxz', '-', NULL, '2023-01-04 06:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `NIP` int(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama` text NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `ttl` varchar(40) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(32) NOT NULL,
  `jabatan` text NOT NULL,
  `divisi` text NOT NULL,
  `hak_akses` varchar(10) DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `NIP`, `password`, `nama`, `jenis_kelamin`, `ttl`, `no_hp`, `alamat`, `jabatan`, `divisi`, `hak_akses`, `log`) VALUES
(12, 222, '222', 'aji masaid', 'P', 'asdasd', '0000000234234', 'fsdfasdfddfd', 'kepala', 'StaffTu', 'Admin', '2022-10-14 15:41:37'),
(16, 111, '111', 'Hj. Asep arifin ilham', 'L', 'bogor, 25223234', '0000000007456', 'bogor', 'Kepala kantor', 'ff', 'User', '2022-10-14 15:41:38'),
(18, 433, '', 'asd', 'L', 'bogor, 15 juni 1970', '342', 'asd', 'asd', 'asd', NULL, '2022-12-23 09:26:33'),
(19, 222, '', 'asd', 'L', 'asdasd', '232', 'asd', 'asd', 'ad', NULL, '2022-12-25 09:50:48'),
(20, 111, 'asdasd', 'sdas', 'L', 'sadfasdf', '979798789', 'a,msdn,as', 'asd,sa', 'amsndsa', NULL, '2022-12-27 17:10:29'),
(21, 111, 'asdas', 'asd', 'L', 'asd', '0998', 'a,smd', 'asdas', 'amsnd', NULL, '2022-12-27 17:12:32'),
(22, 111, 'asd', 'dasd', 'L', 'asdsa', '00067', 'sda', 'amsnd', 'mnadsa', NULL, '2022-12-27 17:15:07'),
(23, 111, 'dsda', 'sdasd', 'L', 'asd', '42342', 'czxcz', 'cxz', 'czsda', NULL, '2022-12-27 17:17:14'),
(24, 111, 'asdas', 'asda', 'L', 'asd', '888', 'sa', 'as', 'as', NULL, '2022-12-27 17:18:22'),
(25, 311, 'da', 'sxda', 'L', 'sda', '53', 'gdf', 'gatau apa bos ', 'asdasd', NULL, '2022-12-27 17:35:35'),
(26, 111, 'asdas', 'ajinamosdasd', 'L', 'sadfasdf', '342', 'asd', 'asdasd', 'gdfg', NULL, '2022-12-27 17:36:15'),
(27, 111, 'asdas', 'ajinamosdasd', 'L', 'bogor, 25223234', '34534', 'gdf', 'Kepala divisi', 'staff tu', NULL, '2022-12-27 17:57:25'),
(28, 111, 'asdas', 'asd', 'L', 'sadfasdf', '342', 'dfgdf', 'asdasd', 'asdasd', NULL, '2022-12-27 18:01:00'),
(29, 111, 'asdas', 'Pudji Hidajatun', 'L', 'asd', '342', 'asd', 'gatau apa bos ', 'oubg', NULL, '2022-12-27 18:05:07'),
(30, 3337, 'asdas', 'ajinamosdasd', 'L', 'asdasd', '342', 'asdasd', 'sdfsdf', 'gdfg', NULL, '2022-12-27 18:07:20'),
(31, 2147483647, 'asd', 'asd', 'L', 'asd', '12312', 'asd', 'asd', 'asd', 'Admin', '2022-12-28 20:03:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kendali_surat`
--
ALTER TABLE `tbl_kendali_surat`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kendali_surat`
--
ALTER TABLE `tbl_kendali_surat`
  MODIFY `no_urut` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
