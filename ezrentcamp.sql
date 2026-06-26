-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2026 at 08:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezrentcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `konten` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tanggal_publish` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_admin`, `judul`, `excerpt`, `konten`, `thumbnail`, `tag`, `status`, `tanggal_publish`, `created_at`, `updated_at`) VALUES
(1, 4, '10 Tips Pendakian Gunung untuk Pemula', '&lt;h3&gt;Pendahuluan&lt;/h3&gt;\r\n&lt;p&gt;Pendakian gunung adalah aktivitas yang menawarkan keindahan alam sekaligus tantangan fisik dan men...', '<h3>Pendahuluan</h3>\r\n<p>Pendakian gunung adalah aktivitas yang menawarkan keindahan alam sekaligus tantangan fisik dan mental. Bagi pendaki pemula, perjalanan pertama ke gunung sering kali menjadi pengalaman yang tidak terlupakan. Namun tanpa persiapan yang matang, pendakian juga bisa berubah menjadi pengalaman yang melelahkan dan berisiko.</p>\r\n\r\n<p>Artikel ini merangkum sepuluh tips penting yang wajib diketahui oleh pendaki pemula agar pendakian pertama berjalan aman, nyaman, dan menyenangkan.</p>\r\n\r\n<h3>1. Pilih Gunung yang Sesuai dengan Kemampuan</h3>\r\n<p>Jangan langsung memilih gunung dengan jalur ekstrem. Gunung dengan jalur populer dan durasi pendakian singkat lebih cocok untuk pemula karena memiliki jalur jelas dan fasilitas pendukung yang memadai.</p>\r\n\r\n<h3>2. Lakukan Riset Jalur Pendakian</h3>\r\n<p>Pelajari jalur pendakian, estimasi waktu, sumber air, serta kondisi medan. Informasi ini dapat diperoleh dari basecamp, komunitas pendaki, atau sumber resmi pengelola gunung.</p>\r\n\r\n<h3>3. Persiapkan Fisik Secara Bertahap</h3>\r\n<p>Latihan fisik seperti jogging, naik turun tangga, dan latihan beban ringan sangat membantu meningkatkan daya tahan tubuh sebelum pendakian.</p>\r\n\r\n<h3>4. Gunakan Perlengkapan yang Sesuai</h3>\r\n<p>Pastikan menggunakan sepatu gunung, jaket, ransel, dan perlengkapan lainnya yang sesuai standar outdoor. Perlengkapan yang tidak layak dapat meningkatkan risiko cedera.</p>\r\n\r\n<h3>5. Bawa Perbekalan Secukupnya</h3>\r\n<p>Hindari membawa barang berlebihan. Fokus pada kebutuhan utama seperti air minum, makanan berenergi, pakaian ganti, dan perlengkapan darurat.</p>\r\n\r\n<h3>6. Atur Ritme Jalan</h3>\r\n<p>Berjalanlah dengan kecepatan stabil dan hindari terburu-buru. Pendakian bukan lomba, melainkan perjalanan yang perlu dinikmati dengan penuh kesadaran.</p>\r\n\r\n<h3>7. Jaga Asupan Cairan dan Energi</h3>\r\n<p>Minum secara rutin dan konsumsi makanan ringan berenergi untuk menjaga stamina tetap stabil.</p>\r\n\r\n<h3>8. Patuhi Aturan dan Etika Pendakian</h3>\r\n<p>Ikuti peraturan basecamp dan terapkan prinsip Leave No Trace untuk menjaga kelestarian alam.</p>\r\n\r\n<h3>9. Kenali Batas Diri</h3>\r\n<p>Jangan memaksakan diri jika tubuh sudah menunjukkan tanda kelelahan ekstrem. Keselamatan selalu menjadi prioritas utama.</p>\r\n\r\n<h3>10. Pendakian adalah Proses Belajar</h3>\r\n<p>Setiap pendakian memberikan pengalaman baru. Nikmati prosesnya, belajar dari alam, dan tingkatkan kemampuan secara bertahap.</p>\r\n\r\n<p><b>Kesimpulan:</b> Pendakian pertama yang aman adalah fondasi untuk perjalanan outdoor berikutnya. Persiapan yang baik akan membuat pengalaman mendaki lebih bermakna.</p>\r\n', 'd576431b72bf78bf2dd8ae5e939de5eb.jpg', 'Tips Hiking', 'published', '2026-01-01 17:59:35', '2025-12-10 00:12:28', '2026-01-01 17:00:24'),
(2, 4, 'Review Carrier 60L vs 70L: Mana yang Lebih Cocok?', 'Isi lengkap review carrier 60L dan 70L, membahas kelebihan dan kekurangan masing-masing.\r\n...', '<h3>Pentingnya Memilih Carrier yang Tepat</h3>\r\n<p>Carrier merupakan perlengkapan utama dalam pendakian gunung. Ukuran carrier yang tepat akan sangat mempengaruhi kenyamanan dan distribusi beban selama perjalanan.</p>\r\n\r\n<h3>Carrier 60L: Ringkas dan Efisien</h3>\r\n<p>Carrier 60 liter cocok untuk pendakian singkat 1–2 hari. Ukurannya lebih ringkas dan ringan, sehingga cocok untuk pendaki yang sudah terbiasa membawa perlengkapan minimalis.</p>\r\n\r\n<h4>Kelebihan Carrier 60L</h4>\r\n<ul>\r\n<li>Bobot lebih ringan</li>\r\n<li>Mudah bermanuver di jalur sempit</li>\r\n<li>Cocok untuk pendakian singkat</li>\r\n</ul>\r\n\r\n<h4>Kekurangan Carrier 60L</h4>\r\n<ul>\r\n<li>Kapasitas terbatas</li>\r\n<li>Kurang fleksibel untuk cuaca ekstrem</li>\r\n</ul>\r\n\r\n<h3>Carrier 70L: Kapasitas Lebih Besar</h3>\r\n<p>Carrier 70 liter dirancang untuk perjalanan lebih panjang atau pendakian dengan perlengkapan lengkap. Kapasitas besar memudahkan membawa perlengkapan tambahan.</p>\r\n\r\n<h4>Kelebihan Carrier 70L</h4>\r\n<ul>\r\n<li>Kapasitas besar</li>\r\n<li>Cocok untuk ekspedisi panjang</li>\r\n<li>Lebih fleksibel untuk kondisi cuaca beragam</li>\r\n</ul>\r\n\r\n<h4>Kekurangan Carrier 70L</h4>\r\n<ul>\r\n<li>Bobot lebih berat</li>\r\n<li>Membutuhkan fisik lebih kuat</li>\r\n</ul>\r\n\r\n<h3>Kesimpulan</h3>\r\n<p>Pemilihan carrier 60L atau 70L harus disesuaikan dengan durasi perjalanan, kondisi medan, dan gaya pendakian masing-masing individu.</p>\r\n', '74692cd5f14cca1b91055c6487d39f11.jpeg', 'Review Alat', 'published', '2026-01-01 18:02:46', '2025-12-10 00:12:28', '2026-01-01 17:03:02'),
(3, 4, '5 Destinasi Camping Terbaik di Jogja dan Sekitarnya', 'Camping sebagai Alternatif Liburan Alam\r\n\r\nYogyakarta dan sekitarnya memiliki banyak lokasi camping yang menawarkan keindahan alam tanpa h...', '<h3>Camping sebagai Alternatif Liburan Alam</h3>\r\n\r\n<p>Yogyakarta dan sekitarnya memiliki banyak lokasi camping yang menawarkan keindahan alam tanpa harus melakukan pendakian berat.</p>\r\n\r\n<h3>1. Bukit Klangon</h3>\r\n\r\n<p>Terletak di lereng Merapi, Bukit Klangon menawarkan pemandangan gunung yang megah dan akses yang mudah.</p>\r\n\r\n<h3>2. Pantai Wediombo</h3>\r\n\r\n<p>Camping di tepi pantai dengan panorama laut lepas menjadi pengalaman unik bagi pencinta alam.</p>\r\n\r\n<h3>3. Hutan Pinus Mangunan</h3>\r\n\r\n<p>Suasana tenang dengan deretan pohon pinus cocok untuk camping santai bersama keluarga.</p>\r\n\r\n<h3>4. Kalibiru</h3>\r\n\r\n<p>Area camping dengan pemandangan Waduk Sermo yang indah dan udara sejuk.</p>\r\n\r\n<h3>5. Gunung Api Purba Nglanggeran</h3>\r\n\r\n<p>Destinasi populer dengan jalur ramah pemula dan fasilitas memadai.</p>\r\n\r\n<p>Pastikan selalu mematuhi aturan setempat dan menjaga kebersihan area camping.</p>\r\n', '516efa980edef443e347367601e932eb.jpg', 'Destinasi', 'published', '2026-01-01 18:05:03', '2025-12-10 00:12:28', '2026-01-01 17:06:00'),
(4, 4, 'Cara Memasak di dalam Tenda', 'Memasak Saat Berkemah\r\n\r\nMemasak makanan hangat saat camping dapat meningkatkan kenyamanan dan menjaga energi tubuh.\r\n\r\nPrinsip Ke...', '<h3>Memasak Saat Berkemah</h3>\r\n\r\n<p>Memasak makanan hangat saat camping dapat meningkatkan kenyamanan dan menjaga energi tubuh.</p>\r\n\r\n<h3>Prinsip Keamanan Memasak</h3>\r\n\r\n<p>Memasak di dalam tenda harus dilakukan dengan sangat hati-hati karena risiko kebakaran dan gas beracun.</p>\r\n\r\n<h3>Tips Memasak Aman</h3>\r\n\r\n<ul>\r\n	<li>Gunakan kompor portable yang stabil</li>\r\n	<li>Pastikan ventilasi udara cukup</li>\r\n	<li>Jauhkan kompor dari dinding tenda</li>\r\n	<li>Matikan api sebelum tidur</li>\r\n</ul>\r\n\r\n<h3>Pilihan Menu Praktis</h3>\r\n\r\n<p>Pilih menu sederhana seperti mie instan, sup, atau makanan instan yang mudah dimasak.</p>\r\n', '6ac8c755612a3c01bfe2cca9b442a17e.jpeg', 'Tips Outdoor', 'published', '2026-01-01 18:06:55', '2025-12-10 00:12:28', '2026-01-01 11:06:55'),
(5, 4, 'Lalu Lintas Sleeping Bag: Semua yang Perlu Kamu Tahu', 'Sleeping bag berfungsi menjaga suhu tubuh saat tidur di alam terbuka. Setiap sleeping bag memiliki rating suhu tertentu yang menunjukkan batas suhu aman...', '<h3>Fungsi Sleeping Bag dalam Pendakian</h3>\r\n<p>Sleeping bag berfungsi menjaga suhu tubuh saat tidur di alam terbuka.</p>\r\n\r\n<h3>Memahami Rating Suhu</h3>\r\n<p>Setiap sleeping bag memiliki rating suhu tertentu yang menunjukkan batas suhu aman.</p>\r\n\r\n<h3>Bahan Sleeping Bag</h3>\r\n<ul>\r\n<li>Polar: Ekonomis dan mudah dirawat</li>\r\n<li>Down: Hangat dan ringan</li>\r\n</ul>\r\n\r\n<h3>Tips Perawatan</h3>\r\n<p>Jemur sleeping bag setelah digunakan dan simpan dalam kondisi kering.</p>\r\n', 'f960b19735a98ead93bd35ed57fabc61.jpg', 'Tips Outdoor', 'published', '2026-01-01 18:07:16', '2025-12-10 00:12:28', '2026-01-01 17:13:09'),
(6, 4, 'Teknik Menyimpan Barang Ringan dalam Ransel Outdoor', 'Pentingnya Teknik Packing yang Benar\r\n\r\nPacking yang tepat membantu mengurangi beban pada punggung dan menjaga keseimbangan tubuh.\r\n\r\n...', '<h3>Pentingnya Teknik Packing yang Benar</h3>\r\n\r\n<p>Packing yang tepat membantu mengurangi beban pada punggung dan menjaga keseimbangan tubuh.</p>\r\n\r\n<h3>Prinsip Distribusi Beban</h3>\r\n\r\n<p>Barang berat diletakkan dekat punggung, sementara barang ringan di bagian atas atau luar ransel.</p>\r\n\r\n<h3>Tips Packing Efisien</h3>\r\n\r\n<ul>\r\n	<li>Gunakan compression bag</li>\r\n	<li>Pisahkan barang berdasarkan fungsi</li>\r\n	<li>Manfaatkan kantong samping</li>\r\n</ul>\r\n\r\n<p>Packing yang baik membuat perjalanan lebih nyaman dan aman.</p>\r\n', 'c5a7076e5ce69329e0a7059461023ed7.jpeg', 'Tips Hiking', 'published', '2026-01-01 18:19:35', '2025-12-10 00:12:28', '2026-01-01 11:19:35'),
(8, 4, 'Pendakian Pertama yang Mengubah Cara Pandangku Tentang Alam', 'Pendakian pertamaku dimulai tanpa ekspektasi besar. Awalnya cuma ingin ikut teman, cari udara segar, dan menjauh sebentar dari rutinitas. Tapi tern...', '<p>Pendakian pertamaku dimulai tanpa ekspektasi besar. Awalnya cuma ingin ikut teman, cari udara segar, dan menjauh sebentar dari rutinitas. Tapi ternyata, gunung memberi lebih dari sekadar pemandangan indah.Langkah demi langkah terasa berat, apalagi saat jalur mulai menanjak dan napas tak lagi teratur. Di titik itu, aku belajar bahwa mendaki bukan soal siapa yang paling cepat sampai, tapi siapa yang mampu bertahan dan saling menunggu. Obrolan kecil di jalur, saling menyemangati, hingga berbagi air minum menjadi momen yang tidak terlupakan.</p>\r\n\r\n<p>Saat akhirnya tiba di puncak, rasa lelah langsung terbayar. Hamparan awan, matahari terbit, dan keheningan alam membuatku sadar: manusia itu kecil, dan alam jauh lebih besar dari ego kita. Pendakian ini mengajarkanku tentang kesabaran, kerendahan hati, dan rasa syukur.Turun gunung, tubuh memang lelah, tapi pikiran justru terasa lebih ringan. Sejak saat itu, mendaki bukan lagi sekadar hobi, melainkan cara untuk mengenal diri sendiri lebih dalam.</p>\r\n\r\n<p><em>Gunung tidak menjanjikan kenyamanan, tapi selalu memberi pelajaran berharga bagi mereka yang mau belajar.</em></p>\r\n', 'dd7d3022a4112f7a1e784c45ebe3a78f.jpg', 'Cerita Pendaki', 'published', '2025-12-29 03:03:07', '2025-12-28 13:50:21', '2025-12-28 20:03:07'),
(9, 4, 'Keselamatan di Gunung: Hal Sederhana yang Sering Diabaikan Pendaki', 'Mendaki gunung bukan hanya soal fisik yang kuat, tapi juga tentang kesiapan dan kesadaran akan keselamatan. Banyak insiden di gunung terjadi bukan ...', '<p>Mendaki gunung bukan hanya soal fisik yang kuat, tapi juga tentang kesiapan dan kesadaran akan keselamatan. Banyak insiden di gunung terjadi bukan karena faktor ekstrem, melainkan karena kelalaian kecil yang dianggap sepele.</p>\r\n\r\n<p>Salah satu hal penting adalah perencanaan. Mengetahui jalur, estimasi waktu, kondisi cuaca, serta aturan gunung adalah langkah awal yang wajib dilakukan. Selain itu, membawa perlengkapan yang sesuai&mdash;seperti jaket hangat, jas hujan, senter, dan P3K&mdash;bukanlah pilihan, melainkan kebutuhan.</p>\r\n\r\n<p>Keselamatan juga berkaitan dengan sikap selama pendakian. Tidak memaksakan diri, menjaga jarak aman, serta selalu bersama rombongan dapat mencegah banyak risiko. Jika kondisi tubuh tidak memungkinkan, keputusan untuk berhenti atau turun bukanlah tanda kelemahan, melainkan bentuk tanggung jawab.</p>\r\n\r\n<p>Gunung akan selalu ada, tetapi keselamatan adalah prioritas utama. Pendaki yang baik adalah mereka yang tahu kapan harus melangkah, dan kapan harus berhenti.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Naik gunung boleh penuh semangat, tapi pulang dengan selamat adalah tujuan sebenarnya</em></p>\r\n', '5b513b3aa617f0e2c1b0c59dfa58ac5b.png', 'Keamanan', 'published', '2025-12-28 20:58:38', '2025-12-28 13:58:38', '2025-12-28 13:58:38'),
(10, 4, 'Mengenal Etika Pendakian: Bukan Cuma Tentang Sampai Puncak', 'Pendakian gunung tidak lepas dari etika. Sayangnya, masih banyak pendaki yang fokus pada tujuan akhir tanpa memperhatikan dampak yang ditinggalkan....', '<p>Pendakian gunung tidak lepas dari etika. Sayangnya, masih banyak pendaki yang fokus pada tujuan akhir tanpa memperhatikan dampak yang ditinggalkan. Padahal, etika pendakian adalah bentuk rasa hormat kita terhadap alam dan sesama pendaki.</p>\r\n\r\n<p>Prinsip dasar seperti tidak membuang sampah sembarangan, tidak merusak flora, dan tidak mengganggu satwa liar seharusnya menjadi kebiasaan. Gunung bukan tempat untuk meninggalkan jejak ego, melainkan ruang bersama yang harus dijaga.</p>\r\n\r\n<p>Selain itu, etika juga berlaku dalam interaksi sosial. Menghormati pendaki lain, tidak berisik berlebihan, serta membantu sesama yang membutuhkan adalah bagian dari budaya pendakian yang sehat.</p>\r\n\r\n<p>Dengan memahami dan menerapkan etika pendakian, kita bukan hanya menikmati alam, tetapi juga ikut menjaga agar keindahannya tetap lestari untuk generasi berikutnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Pendaki yang hebat bukan yang sering naik gunung, tapi yang tahu cara bersikap di dalamnya.</em></p>\r\n', '83fb263ad35a227aa33b8c37555ba8b2.jpg', 'Edukasi', 'published', '2025-12-28 21:07:19', '2025-12-28 14:05:02', '2025-12-28 14:07:19'),
(11, 4, 'Mengenal Sistem Layering: Kunci Tetap Hangat di Suhu Ekstrem', 'Kesalahan Umum Pendaki Pemula\r\n\r\nBanyak pendaki pemula beranggapan bahwa cara terbaik untuk menghadapi suhu dingin di gunung adalah dengan...', '<h3>Kesalahan Umum Pendaki Pemula</h3>\r\n\r\n<p>Banyak pendaki pemula beranggapan bahwa cara terbaik untuk menghadapi suhu dingin di gunung adalah dengan mengenakan jaket setebal mungkin sejak awal pendakian. Padahal, pendekatan ini justru sering menimbulkan masalah baru. Tubuh yang bergerak aktif akan menghasilkan panas dan keringat. Ketika keringat tersebut terperangkap di dalam pakaian, tubuh akan menjadi lembap dan lebih cepat kehilangan panas saat aktivitas berhenti.Inilah alasan mengapa sistem layering menjadi standar berpakaian dalam kegiatan outdoor, khususnya pendakian gunung dan aktivitas di lingkungan bersuhu ekstrem.</p>\r\n\r\n<hr />\r\n<h3>Apa Itu Sistem Layering?</h3>\r\n\r\n<p>Sistem layering adalah metode berpakaian berlapis yang bertujuan mengatur suhu tubuh, menjaga tubuh tetap kering, serta melindungi dari pengaruh cuaca seperti angin dan hujan. Sistem ini memungkinkan pendaki untuk menyesuaikan pakaian sesuai kondisi lapangan, bukan memaksakan satu jenis pakaian untuk semua situasi.</p>\r\n\r\n<h3>Lapisan-Lapisan dalam Sistem Layering</h3>\r\n\r\n<p>1. Base Layer: Fondasi Kenyamanan</p>\r\n\r\n<p>Base layer adalah lapisan yang bersentuhan langsung dengan kulit. Fungsi utamanya bukan untuk menghangatkan, melainkan mengelola kelembapan. Base layer yang baik mampu menyerap keringat dari kulit dan mempercepat proses penguapan.</p>\r\n\r\n<p>Bahan yang direkomendasikan adalah bahan sintetis atau wool. Hindari penggunaan katun karena bahan ini menyerap air dan sulit kering, sehingga dapat mempercepat penurunan suhu tubuh.</p>\r\n\r\n<p>2. Mid Layer: Penahan Panas Tubuh</p>\r\n\r\n<p>Mid layer berfungsi sebagai insulator, yaitu menahan panas tubuh agar tidak mudah keluar. Lapisan ini sangat berperan ketika suhu mulai turun, terutama di malam hari atau saat berada di ketinggian.</p>\r\n\r\n<p>Beberapa pilihan mid layer yang umum digunakan antara lain jaket fleece, polar, atau down jacket. Pemilihan ketebalan mid layer harus disesuaikan dengan suhu lingkungan dan intensitas aktivitas.</p>\r\n\r\n<p>3. Outer Layer: Perlindungan dari Cuaca</p>\r\n\r\n<p>Outer layer adalah lapisan terluar yang melindungi tubuh dari angin, hujan, dan kondisi cuaca ekstrem lainnya. Jaket outer idealnya bersifat windproof dan waterproof, namun tetap memiliki ventilasi agar udara panas dari dalam dapat keluar.</p>\r\n\r\n<p>Outer layer yang baik tidak selalu berarti tebal, melainkan mampu menjadi penghalang cuaca tanpa menghambat sirkulasi udara.</p>\r\n\r\n<h3>Kesimpulan</h3>\r\n\r\n<p>Sistem layering bukan sekadar tren, melainkan strategi penting dalam menjaga keselamatan dan kenyamanan di alam bebas. Dengan memahami fungsi setiap lapisan, pendaki dapat mengurangi risiko hipotermia, kelelahan, dan ketidaknyamanan selama perjalanan.</p>\r\n', '4d6856d3394ae086ba45a46f50f823e8.png', 'Edukasi', 'published', '2026-01-01 18:20:10', '2026-01-01 15:26:36', '2026-01-01 11:20:10'),
(12, 4, 'Panduan Memilih Sepatu Gunung: Mid-cut atau Low-cut?', 'Pentingnya Memilih Sepatu Gunung yang Tepat\r\n\r\nDalam kegiatan pendakian, kaki adalah aset utama. Seluruh beban tubuh dan perlengkapan bert...', '<h3>Pentingnya Memilih Sepatu Gunung yang Tepat</h3>\r\n\r\n<p>Dalam kegiatan pendakian, kaki adalah aset utama. Seluruh beban tubuh dan perlengkapan bertumpu pada kaki selama berjam-jam bahkan berhari-hari. Kesalahan dalam memilih sepatu gunung dapat berakibat pada cedera serius, mulai dari lecet ringan hingga keseleo atau cedera pergelangan kaki.</p>\r\n\r\n<h3>Mengenal Jenis Potongan Sepatu Gunung</h3>\r\n\r\n<p>Low-Cut: Ringan dan Fleksibel</p>\r\n\r\n<p>Sepatu low-cut memiliki potongan rendah hingga di bawah mata kaki. Kelebihannya terletak pada bobot yang ringan dan fleksibilitas tinggi. Sepatu jenis ini cocok untuk pendakian ringan, jalur hutan yang relatif landai, atau aktivitas hiking singkat.</p>\r\n\r\n<p>Namun, minimnya perlindungan pada pergelangan kaki membuat sepatu ini kurang direkomendasikan untuk medan berbatu atau pendakian dengan beban berat.</p>\r\n\r\n<p>Mid-Cut hingga High-Cut: Stabilitas dan Perlindungan</p>\r\n\r\n<p>Sepatu mid-cut dan high-cut memberikan dukungan ekstra pada pergelangan kaki. Jenis ini sangat direkomendasikan untuk pendakian gunung dengan medan tidak rata, jalur berbatu, serta ketika membawa carrier dengan beban di atas 10 kilogram.</p>\r\n\r\n<p>Meskipun bobotnya lebih berat, tingkat keamanan yang ditawarkan jauh lebih tinggi.</p>\r\n\r\n<h3>Tips Memilih Sepatu Gunung</h3>\r\n\r\n<ul>\r\n	<li>Pilih ukuran sedikit lebih besar untuk mengakomodasi kaos kaki tebal.</li>\r\n	<li>Coba sepatu pada sore hari saat kaki berada pada ukuran maksimal.</li>\r\n	<li>Pastikan tidak ada titik tekanan berlebih saat berjalan.</li>\r\n</ul>\r\n\r\n<p>Sepatu gunung yang tepat bukan hanya soal kenyamanan, tetapi juga investasi keselamatan.</p>\r\n', '33db3b1ff1807f93b4d86d6bc1c6b3f0.jpg', 'Review Alat', 'published', '2026-01-01 18:21:08', '2026-01-01 15:26:36', '2026-01-01 11:21:08'),
(13, 4, 'Cara Merawat Tenda Agar Awet Hingga Bertahun-tahun', 'Tenda Bau dan Jamuran? Ini Solusinya\r\n\r\nBanyak pendaki melakukan kesalahan dengan mencuci tenda menggunakan deterjen mesin cuci. Hal ini j...', '<h3>Tenda sebagai Perlindungan Utama di Alam Bebas</h3>\r\n<p>Tenda bukan sekadar tempat tidur, melainkan perlindungan utama dari hujan, angin, dan suhu dingin. Mengingat harga tenda yang relatif mahal, perawatan yang tepat menjadi faktor penting agar tenda tetap awet dan berfungsi optimal.</p>\r\n\r\n<h3>Kesalahan Umum dalam Merawat Tenda</h3>\r\n<p>Banyak pendaki mencuci tenda menggunakan deterjen rumah tangga atau mesin cuci. Praktik ini dapat merusak lapisan waterproof, sealant, dan mempercepat kerusakan bahan.</p>\r\n\r\n<h3>Cara Membersihkan Tenda dengan Benar</h3>\r\n<ul>\r\n<li>Gunakan air bersih atau sabun khusus perlengkapan outdoor.</li>\r\n<li>Bersihkan noda menggunakan kain lembut atau spons.</li>\r\n<li>Hindari menyikat terlalu keras.</li>\r\n</ul>\r\n\r\n<h3>Pengeringan dan Penyimpanan</h3>\r\n<p>Pastikan tenda benar-benar kering sebelum disimpan. Tenda yang disimpan dalam kondisi lembap berisiko mengalami jamur dan bau tidak sedap.</p>\r\n\r\n<p>Simpan tenda di tempat yang kering, sejuk, dan memiliki sirkulasi udara baik.</p>\r\n', 'ae99aff65a3a6a24b1b18df716b9b012.jpg', 'Tips Outdoor', 'draft', '2026-01-01 22:26:36', '2026-01-01 15:26:36', '2026-01-01 16:29:30'),
(14, 4, 'Kisah di Balik Kabut Merbabu: Sebuah Catatan Perjalanan', 'Oleh: Admin EzRent (Kisah Pendaki)\r\n\r\nMerbabu selalu punya cerita. Perjalanan kali ini dimulai dengan cerah, namun saat tiba di Pos...', '<p><i>Oleh: Budi Santoso</i></p>\r\n\r\n<p>Gunung Merbabu selalu menyimpan cerita yang tidak terduga. Pendakian kali ini dimulai dengan cuaca cerah dan jalur yang bersahabat. Langkah demi langkah terasa ringan, ditemani tawa dan obrolan ringan sepanjang jalur.</p>\r\n\r\n<p>Namun alam selalu memiliki cara untuk mengingatkan manusia agar tetap rendah hati. Saat memasuki Pos 3, kabut turun perlahan namun pasti. Jarak pandang menyempit, suara angin semakin jelas, dan suhu mulai turun drastis.</p>\r\n\r\n<p>Di tengah kondisi tersebut, kami belajar tentang kesabaran. Tidak semua rencana harus dipaksakan. Duduk di dalam tenda, berbagi cerita dan secangkir kopi hangat, terasa jauh lebih bermakna dibanding sekadar mengejar puncak.</p>\r\n\r\n<p>Gunung tidak pernah meminta untuk ditaklukkan. Ia hanya mengajarkan bagaimana manusia belajar memahami batas dirinya sendiri.</p>\r\n', '6608ca44bf50b76a5fd87f98052b69b0.jpg', 'Cerita Pendaki', 'draft', '2026-01-01 22:26:36', '2026-01-01 15:26:36', '2026-01-01 16:29:59'),
(15, 4, 'Etika Buang Air di Gunung: Jaga Kelestarian Sumber Air', 'LNT: Leave No Trace\r\n\r\nBuang air besar atau kecil tidak boleh dilakukan di dekat jalur pendakian, apalagi dekat sumber air. Galilah lubang...', '<h3>Etika Pendakian dan Prinsip Leave No Trace</h3>\r\n<p>Menjaga kebersihan gunung adalah tanggung jawab setiap pendaki. Salah satu aspek yang sering diabaikan adalah etika buang air di alam terbuka.</p>\r\n\r\n<h3>Prinsip Cat Hole</h3>\r\n<p>Buang air besar atau kecil harus dilakukan dengan menggali lubang sedalam 15–20 cm, berjarak minimal 60 meter dari jalur pendakian, sumber air, dan area perkemahan.</p>\r\n\r\n<h3>Larangan yang Harus Dipatuhi</h3>\r\n<ul>\r\n<li>Jangan buang air di dekat sungai atau mata air.</li>\r\n<li>Hindari meninggalkan tisu basah atau pembalut.</li>\r\n<li>Bawa kembali sampah pribadi dengan kantong tertutup.</li>\r\n</ul>\r\n\r\n<p>Dengan menerapkan etika ini, kita ikut menjaga kelestarian alam dan menghormati pendaki lain yang datang setelah kita.</p>\r\n', '6e32cbb2bc44536c80b02901382a0c3e.jpeg', 'Keamanan', 'draft', '2026-01-01 22:26:36', '2026-01-01 15:26:36', '2026-01-01 16:30:18'),
(17, 4, 'Tutorial Kuat Sampai Tujuan Saat Mendaki', '...', '', '20b565e3eda52a9b318cf868ba7a34eb.jpg', 'Tips Hiking', 'published', '2026-01-07 17:09:38', '2026-01-07 10:08:51', '2026-01-07 10:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_foto` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_produk`
--

INSERT INTO `foto_produk` (`id_foto`, `id_produk`, `nama_file`, `created_at`) VALUES
(1, 1, 'tenda.jpg', '2025-12-09 12:31:33'),
(2, 2, 'carrier.jpg', '2025-12-09 12:31:33'),
(3, 3, 'cooking.jpg', '2025-12-09 12:31:33'),
(4, 4, 'jaket.jpg', '2025-12-09 12:31:33'),
(7, 7, 'headlamp.jpg', '2025-12-09 12:31:33'),
(8, 8, 'kompor.jpg', '2025-12-09 12:31:33'),
(9, 9, 'carrier45.jpg', '2025-12-09 12:31:33'),
(13, 11, 'sleepbag.jpg', '2025-12-17 22:47:52'),
(14, 12, 'tenda_dome1.jpg', '2025-12-17 22:48:54'),
(15, 9, 'bevstock-system-flowchart.png', '2025-12-18 18:52:21'),
(17, 9, 'bevstock-system-flowchart1.png', '2025-12-19 08:31:54'),
(18, 9, 'bevstock-system-flowchart2.png', '2025-12-19 09:04:03'),
(19, 4, 'jaket.jpg', '2025-12-26 08:09:16'),
(22, 7, '8b352a73212685e4abbaaf52b0eeb907.png', '2025-12-26 08:33:22'),
(23, 7, 'bc23edd6201e645da71269632e2bfba7.jpg', '2025-12-26 08:41:33'),
(24, 8, 'c0f26debf38568d4ed70e5cab6b55fe0.jpg', '2025-12-26 08:41:46'),
(25, 9, '4c6419456ce4d643ad20161f526e2e26.jpg', '2025-12-26 08:41:57'),
(26, 1, 'c46dc45c83a4e5177bb6b2e72c35433b.jpg', '2025-12-26 10:10:33'),
(27, 7, 'eb6a3929c523b7a03b7cc0e846fc79a1.jpg', '2025-12-27 01:27:51'),
(28, 1, '562db3f7d3f8fcf3b7ad11c9a0557ce1.jpg', '2025-12-27 01:34:31'),
(32, 8, 'd3027d90506b624821c352800f8eec6c.png', '2025-12-28 21:52:57'),
(33, 8, '33da7b3dfe45a1ab9314124d8682db7a.jpg', '2025-12-28 21:53:24'),
(34, 16, '907fc49fb3b5de7efe767da4ededf952.jpg', '2026-01-01 09:54:44'),
(35, 20, 'c0e0e5ec3882dd90a6dccc23c3660eb1.jpg', '2026-01-01 09:57:01'),
(36, 21, '5eb2052149e9f16420880c20f3f5b09a.jpg', '2026-01-01 09:57:11'),
(37, 22, 'e73c3b9667afcf2e8f09cf998e8e7474.jpg', '2026-01-01 09:57:21'),
(38, 23, '34b8446dd99c4b2164db7457dc04a6de.jpg', '2026-01-01 09:57:32'),
(39, 24, '98b4dc27da48932e5c3ae56f7c3b30bf.jpg', '2026-01-01 09:57:45'),
(40, 25, '4024c44c2a6e1764bbff4c035c14ecb1.jpg', '2026-01-01 09:57:55'),
(41, 17, 'bc1a8977e218a26a831f0b724ca333f8.jpg', '2026-01-01 10:07:50'),
(42, 18, '969c8d4e6ef1b21492868a19380dc518.jpg', '2026-01-01 10:08:05'),
(43, 19, 'f8804338a71ba3bd409253fcd3cf6161.jpg', '2026-01-01 10:08:26'),
(44, 26, '49cc207f3e2a2f5f03366aa4fc0a0af2.jpg', '2026-01-07 00:08:23'),
(45, 26, '6b757226fdf5cf1a4ab2204f7f1bd067.png', '2026-01-07 10:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tenda', 'Berbagai jenis tenda camping', 'katenda.png', 'aktif', '2025-12-09 12:30:37', '2025-12-27 06:43:12'),
(2, 'Carrier', 'Carrier dan tas gunung berbagai ukuran', 'katas.png', 'aktif', '2025-12-09 12:30:37', '2025-12-27 06:43:41'),
(3, 'Jaket', 'Jaket gunung, windproof, waterproof', 'kjaket_(1).png', 'aktif', '2025-12-09 12:30:37', '2025-12-27 06:59:58'),
(4, 'Cooking Set', 'Peralatan memasak camping', 'cookset.png', 'aktif', '2025-12-09 12:30:37', '2025-12-27 06:34:59'),
(5, 'Sleeping Bag', 'Sleeping Bag berbagai ukuran', 'katsleep.png', 'aktif', '2025-12-09 12:30:37', '2025-12-27 06:44:07'),
(6, 'Peralatan Lain', 'Peralatan pelengkap outdoor', 'perlain.png', 'aktif', '2025-12-09 12:30:37', '2025-12-27 06:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `kode_produk` varchar(20) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `spesifikasi` text DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `stok_tersedia` int(11) DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `jumlah_review` int(11) DEFAULT NULL,
  `jumlah_disewa` int(11) DEFAULT NULL,
  `is_recommended` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `kode_produk`, `nama_produk`, `deskripsi`, `spesifikasi`, `harga`, `stok`, `stok_tersedia`, `kondisi`, `status`, `rating`, `jumlah_review`, `jumlah_disewa`, `is_recommended`, `created_at`, `updated_at`) VALUES
(1, 1, 'TND001', 'Tenda 4 Orang Waterproof', 'Hadapi cuaca pegunungan yang tidak menentu tanpa rasa khawatir. Tenda kapasitas 4 orang ini adalah pilihan utama bagi rombongan yang mengutamakan keamanan. Menggunakan sistem Double Layer, lapisan luar (flysheet) bertugas menahan hujan dan angin, sementara lapisan dalam (inner) memastikan sirkulasi udara tetap lancar tanpa tetesan air kondensasi di pagi hari.', 'Bahan polyester, frame fiber', 50000.00, 8, 8, NULL, 'tersedia', 5.0, 1, 1, 0, '2025-12-09 12:31:07', '2026-01-01 17:22:55'),
(2, 2, 'CRR001', 'Carrier 60L dengan Raincover', 'Siap untuk ekspedisi panjang? Tas Carrier 60L ini dirancang untuk menampung seluruh kebutuhan hidupmu selama 3 hingga 5 hari di alam liar. Keunggulan utamanya terletak pada Adjustable Backsystem yang dapat disesuaikan dengan panjang punggung pengguna, sehingga beban berat tidak hanya bertumpu pada pundak, melainkan didistribusikan ke pinggul secara merata.', 'Volume 60L, bahan cordura', 40000.00, 12, 10, NULL, 'tersedia', 5.0, 1, 2, 0, '2025-12-09 12:31:07', '2026-01-01 17:22:58'),
(3, 4, 'CKT001', 'Cooking Set Lengkap untuk 4 Orang', 'Solusi praktis untuk urusan dapur di alam bebas! Cooking set ini adalah perlengkapan wajib bagi kamu yang suka memasak saat camping. Terbuat dari bahan aluminium anodized yang ringan namun sangat kuat dan anti karat.', 'Kompor portable + nesting', 25000.00, 8, 5, NULL, 'tersedia', 4.0, 1, 1, 0, '2025-12-09 12:31:07', '2025-12-28 11:42:55'),
(4, 3, 'JKT001', 'Jaket Gunung Windproof', 'Lindungi tubuh dari angin gunung yang ekstrem dengan Jaket Gunung Windproof kami. Menggunakan teknologi kain berlapis yang mampu menahan hembusan angin (anti-angin) namun tetap breathable sehingga tidak gerah saat dipakai beraktivitas.', 'Anti angin & tahan air', 30000.00, 15, 14, NULL, 'tersedia', 4.0, 1, 1, 0, '2025-12-09 12:31:07', '2026-01-01 17:23:03'),
(7, 6, 'LMP001', 'Headlamp LED 3 Mode', 'Headlamp dengan baterai tahan lama', '3 mode: high, low, SOS', 15000.00, 30, 29, 'baru', 'tersedia', 0.0, 0, 0, 0, '2025-12-09 12:31:07', '2025-12-28 13:49:59'),
(8, 4, 'CKT002', 'Kompor Portable Outdoor', 'Kompor gas mini lipat', 'Compatible dengan tabung kaleng', 15000.00, 11, 11, NULL, 'tersedia', 5.0, 1, 1, 0, '2025-12-09 12:31:07', '2025-12-28 21:53:24'),
(9, 2, 'CRR002', 'Carrier 45L Compact', 'Untuk kamu yang menyukai perjalanan singkat satu malam atau pendakian cepat (tek-tok), Carrier 45L ini adalah solusinya. Ukurannya yang ringkas membuatmu lebih lincah melewati jalur pendakian yang rimbun atau berbatu tanpa takut tas tersangkut dahan pohon.', 'Kapasitas 45L', 30000.00, 7, 7, NULL, 'tersedia', 0.0, 0, 0, 0, '2025-12-09 12:31:07', '2025-12-28 11:45:07'),
(11, 5, 'SPB001', 'Sleeping Bag Hangat', 'Berikan hak tubuhmu untuk beristirahat dengan nyaman setelah lelah mendaki seharian. Sleeping bag ini menggunakan isian Dacron berkualitas tinggi yang empuk dan sangat efektif menahan panas tubuh. Jika cuaca tidak terlalu dingin, SB ini bisa dibuka seluruh zippernya dan dijadikan alas tidur atau selimut bersama.', 'Tebal, Cocok untuk dingin dan nyaman', 20000.00, 18, 18, NULL, 'tersedia', 5.0, 1, 1, 0, '2025-12-17 22:47:52', '2025-12-28 11:45:33'),
(12, 1, 'TND002', 'Tenda Dome 2-3 Orang', 'Teman setia bagi para pendaki ultralight atau pasangan pendaki yang mencari privasi dan kepraktisan. Tenda ini didesain aerodinamis untuk membelah angin kencang di area camp yang terbuka. Bobotnya yang ringan tidak akan membebani pundakmu saat trekking jauh.', 'Bahan polyster, ringkas dan mudah dibawa', 30000.00, 9, 9, NULL, 'tersedia', 0.0, 0, 0, 0, '2025-12-17 22:48:53', '2025-12-28 11:44:14'),
(16, 1, 'TND003', 'Tenda Kapasitas 6 Orang Family', 'Solusi terbaik untuk berkemah bersama keluarga atau grup besar tanpa merasa sesak. Tenda ini menawarkan ruang interior yang sangat luas dengan langit-langit tinggi yang memungkinkan Anda bergerak leluasa. Menggunakan struktur rangka yang diperkuat untuk stabilitas maksimal terhadap angin, serta sistem ventilasi silang yang canggih guna mencegah penguapan air di dalam tenda. Dilengkapi dengan teras depan yang lebar untuk area santai atau dapur lapangan.', 'Double layer, 2 pintu akses, tiang baja reinforced, waterproof 3000mm', 85000.00, 5, 5, NULL, 'tersedia', 0.0, 0, 0, 0, '2026-01-01 15:18:53', '2026-01-01 17:23:07'),
(17, 2, 'CRR003', 'Carrier 35L Daypack Pro', 'Didesain khusus untuk pendaki yang menyukai efisiensi dalam perjalanan harian atau \"tek-tok\". Meskipun berukuran ringkas, tas ini memiliki fitur Backsystem jaring dengan sirkulasi udara optimal (anti-keringat) dan internal frame yang menjaga kestabilan beban. Material nylon ripstop yang digunakan sangat tangguh terhadap gesekan ranting pohon. Pilihan tepat untuk mendaki gunung dengan jalur pendek atau sekadar camping santai satu malam.', 'Bahan nylon ripstop premium, include raincover, airflow backsystem', 25000.00, 10, 10, NULL, 'tersedia', 0.0, 0, 0, 0, '2026-01-01 15:18:53', '2026-01-01 10:07:50'),
(18, 3, 'JKT002', 'Jaket Polar Thermal Extra Warm', 'Lapisan penghangat (mid-layer) yang sangat krusial saat menghadapi suhu ekstrem di malam hari. Menggunakan bahan Polar Fleece kualitas ekspor yang mampu memerangkap panas tubuh secara efisien namun tetap ringan dipakai. Memiliki tekstur yang lembut di kulit dan fitur quick-dry jika terkena lembap. Dilengkapi dengan saku rahasia di bagian dalam dan desain leher tinggi (turtle neck) untuk perlindungan ekstra dari hawa dingin.', 'Bahan Polar Fleece High-Gramasi, full zipper, anti-pilling', 20000.00, 20, 20, NULL, 'tersedia', 0.0, 0, 0, 0, '2026-01-01 15:18:53', '2026-01-01 10:08:05'),
(19, 4, 'CKT003', 'Grill Pan Camping Anti Lengket', 'Upgrade pengalaman memasak Anda di alam liar dengan Grill Pan khusus camping ini. Sangat praktis untuk membakar daging, sosis, atau sekadar membuat roti bakar di pagi hari. Terbuat dari material food-grade dengan lapisan anti lengket (non-stick coating) yang sangat mudah dibersihkan meskipun dengan air terbatas. Gagangnya dapat dilipat sehingga sangat hemat ruang di dalam tas carrier Anda.', 'Diameter 30cm, coating teflon food-grade, folding handle', 20000.00, 6, 6, NULL, 'tersedia', 5.0, 1, 1, 0, '2026-01-01 15:18:53', '2026-01-02 00:29:37'),
(20, 5, 'SPB002', 'Sleeping Bag Model Mummy Goose Down', 'Varian premium untuk pendaki yang menargetkan puncak-puncak gunung dengan suhu minus derajat. Model Mummy didesain mengikuti lekuk tubuh untuk meminimalisir ruang kosong, sehingga panas tubuh terjaga lebih lama. Menggunakan isian bulu angsa sintetis (Goose Down Synthetic) yang menawarkan rasio kehangatan berbanding berat yang luar biasa. Sangat ringan dan dapat dikompres hingga ukuran yang sangat kecil (ultralight).', 'Limit temperature -5°C, bahan outer dacron, ultralight compress bag', 45000.00, 5, 5, NULL, 'tersedia', 0.0, 0, 0, 0, '2026-01-01 15:18:53', '2026-01-01 17:23:15'),
(21, 6, 'PLN001', 'Kursi Lipat Portable Ultra Light', 'Nikmati kemewahan bersantai di depan tenda dengan kursi portable yang ergonomis ini. Dirancang menggunakan rangka duralumin yang sangat ringan namun mampu menahan beban pengguna hingga 100kg. Bagian dudukannya menggunakan kain Oxford yang kuat dan tidak mudah robek. Pemasangannya sangat instan (under 1 minute) dan dilengkapi dengan tas penyimpanan kecil untuk dikaitkan di luar tas carrier.', 'Bahan duralumin + kain oxford 600D, kapasitas beban 100kg', 15000.00, 15, 15, NULL, 'tersedia', 0.0, 0, 0, 0, '2026-01-01 15:18:53', '2026-01-01 17:23:19'),
(22, 6, 'PLN002', 'Meja Camping Lipat Aluminium', 'Lengkapi area camp Anda dengan meja lipat yang kokoh dan stabil. Meja ini memberikan permukaan datar yang aman untuk menaruh kompor portable agar tidak miring, atau sebagai meja makan bersama. Material aluminiumnya tahan karat dan tahan panas, sehingga Anda tidak perlu khawatir saat menaruh panci panas langsung di atas meja. Sangat mudah dibersihkan dari tumpahan makanan atau noda tanah.', 'Size M (56x40cm), material full aluminium, include carry bag', 15000.00, 8, 8, NULL, 'tersedia', 0.0, 0, 1, 0, '2026-01-01 15:18:53', '2026-01-07 15:15:42'),
(23, 3, 'JKT003', 'Celana Gunung Sambung Quickdry', 'Celana multifungsi yang wajib dimiliki oleh setiap petualang. Memiliki fitur \"sambung\" (zip-off) dengan resleting di bagian lutut yang memungkinkan Anda mengubahnya menjadi celana pendek secara instan. Terbuat dari bahan quick-dry yang sangat ringan dan cepat kering jika terkena hujan atau saat melewati sungai. Memiliki banyak saku cargo untuk menyimpan perlengkapan kecil seperti kompas atau smartphone.', 'Bahan stretch quick-dry, 6 pocket system, adjustable waist', 20000.00, 12, 12, NULL, 'tersedia', 0.0, 0, 0, 0, '2026-01-01 15:18:53', '2026-01-01 09:57:32'),
(24, 2, 'CRR004', 'Carrier 80L Ekspedisi Besar', 'Partner setia untuk ekspedisi panjang di atas 7 hari atau pendakian dengan manajemen logistik kelompok. Memiliki kapasitas raksasa namun tetap nyaman berkat sistem suspensi berat yang canggih (heavy-duty suspension). Dilengkapi dengan saku samping yang sangat banyak, tempat kapak es/trekking pole, serta akses bukaan depan untuk memudahkan mencari barang di bagian tengah tas tanpa harus membongkar dari atas.', 'Volume 80L, frame aluminium ganda, material cordura duratex', 55000.00, 4, 4, NULL, 'tersedia', 0.0, 0, 0, 0, '2026-01-01 15:18:53', '2026-01-01 09:57:45'),
(25, 6, 'PLN003', 'Flysheet 3x4 Meter Waterproof', 'Perlengkapan esensial untuk perlindungan ekstra. Flysheet ini berfungsi sebagai atap tambahan untuk area dapur, tempat berkumpul, atau pelindung tenda dari panas terik dan hujan badai. Terbuat dari bahan taslan dengan coating silver yang mampu memantulkan panas matahari (UV Protection) dan memiliki 19 titik lubang pengait (webbing loop) untuk berbagai variasi model pemasangan shelter.', 'Ukuran 3x4 meter, material taslan coating silver, 19 loop points', 15000.00, 25, 25, NULL, 'tersedia', 0.0, 0, 0, 0, '2026-01-01 15:18:53', '2026-01-01 17:23:24'),
(26, 1, 'TND005', 'tenda rahasia', 'oke', 'bagus', 100000.00, 1, 1, NULL, 'tersedia', NULL, NULL, 1, 0, '2026-01-07 00:08:23', '2026-01-09 00:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `isi_review` text DEFAULT NULL,
  `kelebihan` text DEFAULT NULL,
  `kekurangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_transaksi`, `id_user`, `id_produk`, `rating`, `isi_review`, `kelebihan`, `kekurangan`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 5, 'Pelayanan sangat memuaskan! Peralatan lengkap dan berkualitas. Proses booking via WhatsApp sangat cepat.', 'Barang bagus', NULL, 'approved', '2024-11-14 17:00:00', '2025-12-14 21:02:22'),
(2, NULL, 2, 2, 5, 'Harga terjangkau dan barangnya masih bagus semua. Owner responsif banget. Pasti sewa lagi kalau mau hiking!', 'Harga murah', NULL, 'approved', '2024-11-09 17:00:00', '2025-12-14 21:02:24'),
(3, NULL, 3, 3, 4, 'Mantap! Carrier nyaman dipakai, cooking set lengkap. Overall bagus!', 'Produk lengkap', 'Deposit agak mahal', 'approved', '2024-11-04 17:00:00', '2025-12-14 21:02:46'),
(5, NULL, 5, 11, 5, 'Sleeping bag penyelamat camping kemarin krn dingin bet. SUper nyaman pokoknya.\r\nPastinya bakal sewa di sini lagi karna barang berkualitas, adminnya fast respon dan ramah banget!!', NULL, NULL, 'approved', '2025-12-27 08:14:11', '2025-12-27 08:14:25'),
(6, NULL, 2, 8, 5, 'Kompor portablenya mantap!\nGampang dipakai, ringan, dan apinya stabil', NULL, NULL, 'approved', '2025-12-28 08:05:17', '2025-12-28 14:10:25'),
(13, NULL, 3, 4, 4, 'Jaketnya nyaman dipakai dan tampilannya oke. Overall puas, cuma butuh sedikit penyesuaian pas pertama kali dipakai ', NULL, NULL, 'approved', '2025-12-28 11:17:51', '2025-12-28 11:18:22'),
(14, NULL, 1, 19, 5, 'bagus, beneran anti lengket', NULL, NULL, 'approved', '2026-01-01 18:29:29', '2026-01-07 09:34:37'),
(15, NULL, 5, 22, 4, 'mejanya kokoh dan simple. andalan banget sii buat pergi-pergi!!', NULL, NULL, 'rejected', '2026-01-07 09:29:00', '2026-01-07 09:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(30) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jumlah_unit` int(11) DEFAULT NULL,
  `durasi_hari` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `catatan_admin` text DEFAULT NULL,
  `tanggal_konfirmasi` datetime DEFAULT NULL,
  `tanggal_selesai_real` datetime DEFAULT NULL,
  `denda` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_user`, `id_produk`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_unit`, `durasi_hari`, `subtotal`, `total_harga`, `status`, `metode_pembayaran`, `catatan_admin`, `tanggal_konfirmasi`, `tanggal_selesai_real`, `denda`, `created_at`, `updated_at`) VALUES
(1, 'TND001', 1, 1, '2025-12-13', '2025-12-15', 1, 2, 100000.00, 100000.00, 'selesai', 'transfer', 'Pengembalian tepat waktu', '2025-12-13 10:00:00', '2025-12-15 00:00:00', 0.00, '2025-12-13 02:30:00', '2025-12-17 08:28:56'),
(2, 'CRR001', 2, 2, '2025-12-10', '2025-12-13', 1, 3, 105000.00, 105000.00, 'selesai', 'qris', 'Barang kembali bersih', '2025-12-10 11:00:00', '2025-12-13 00:00:00', 0.00, '2025-12-10 03:45:00', '2025-12-16 22:40:01'),
(3, 'CKT001', 3, 3, '2025-12-05', '2025-12-06', 1, 1, 25000.00, 25000.00, 'selesai', 'cash', 'Sewa singkat', '2025-12-05 09:15:00', '2025-12-06 00:00:00', 0.00, '2025-12-05 02:00:00', '2025-12-17 03:16:13'),
(6, 'TRX1765946543', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, NULL, NULL, '2025-12-16 22:42:23', '2025-12-17 04:42:23'),
(8, 'TRX1766105403', 1, 2, '2025-12-19', '2025-12-21', 2, 2, NULL, 140000.00, 'selesai', NULL, '', NULL, NULL, 0.00, '2025-12-18 18:50:03', '2025-12-27 08:01:29'),
(9, 'TRX1766844199', 5, 11, '2025-12-26', '2025-12-28', 3, 2, NULL, 120000.00, 'selesai', NULL, '', NULL, NULL, 0.00, '2025-12-27 08:03:19', '2025-12-27 08:04:14'),
(10, 'TRX1766930514', 2, 8, '2025-12-27', '2025-12-28', 1, 2, NULL, 30000.00, 'selesai', NULL, '', NULL, NULL, 0.00, '2025-12-28 08:01:54', '2025-12-28 08:45:12'),
(13, 'TRX202512287932', 3, 4, '2025-12-28', '2025-12-30', 1, 3, NULL, 90000.00, 'selesai', NULL, '', NULL, NULL, 0.00, '2025-12-28 09:37:56', '2025-12-28 09:39:08'),
(18, 'TRX202601024404', 1, 19, '2026-01-02', '2026-01-04', 1, 3, NULL, 60000.00, 'selesai', NULL, '', NULL, NULL, 0.00, '2026-01-01 18:28:52', '2026-01-01 18:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `email`, `password`, `no_telepon`, `alamat`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Budi Santoso', 'budi@gmail.com', '$2y$10$GriDfeaq76E0agrE4MasguEFEAsLQsl.pgqR/VJIRptPdqPo2Nmj.', '081354678019', 'Maguwoharjo', 'user', 'aktif', '2025-12-09 12:32:12', '2026-01-02 00:28:18'),
(2, 'Siti Rahma', 'siti@gmail.com', '$2y$10$GriDfeaq76E0agrE4MasguEFEAsLQsl.pgqR/VJIRptPdqPo2Nmj.', '081122334455', 'Kulon Progo', 'user', 'aktif', '2025-12-09 12:32:12', '2025-12-18 06:22:06'),
(3, 'Andi Wijaya', 'andi@gmail.com', '$2y$10$GriDfeaq76E0agrE4MasguEFEAsLQsl.pgqR/VJIRptPdqPo2Nmj.', '081266778890', 'Bantul', 'user', 'aktif', '2025-12-09 12:32:12', '2025-12-18 06:23:04'),
(4, 'Admin EzRent Camp Jogja', 'admin@gmail.com', '$2y$10$GriDfeaq76E0agrE4MasguEFEAsLQsl.pgqR/VJIRptPdqPo2Nmj.', NULL, NULL, 'admin', 'aktif', '2025-12-09 15:52:53', '2025-12-10 00:23:03'),
(5, 'Haruna V', 'haruna@gmail.com', '$2y$10$bBeFwuJEX1jXHUYpmQxHC.H5t/pi9dAjldyVdGOq.z6h7hQyEvcY.', '085732461762', 'Jakal KM.12', 'user', NULL, '2025-12-27 13:36:02', '2025-12-27 13:36:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD CONSTRAINT `foto_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
