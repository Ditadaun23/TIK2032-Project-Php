<?php
// koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "artikel"); // ganti sesuai konfigurasi

if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// ambil data dari tabel artikel
$query = "SELECT * FROM artikel ORDER BY tanggal DESC";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog - Website Sederhana</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header class="site-header">
    <nav class="navbar">
      <h1 class="logo">Dita Ramadani Daun</h1>
      <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="Gallery.html">Gallery</a></li>
        <li><a href="Blog.php" class="active">Blog</a></li>
        <li><a href="Contact.html">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main class="blog-container">
    <h2 class="blog-title">Blog</h2>

    <?php while($row = $result->fetch_assoc()): ?>
      <div class="blog-post">
        <h3><a href="<?= htmlspecialchars($row['link']) ?>"><?= htmlspecialchars($row['judul']) ?></a></h3>
        <p class="meta">
          <?= date('d M Y', strtotime($row['tanggal'])) ?> &nbsp; | &nbsp; 
          <span class="tags"><?= htmlspecialchars($row['kategori']) ?></span>
        </p>
        <p><?= htmlspecialchars($row['isi']) ?></p>
      </div>
    <?php endwhile; ?>

  </main>

  <footer class="footer">
    <p>&copy; 2025 Website Sederhana. Semua Hak Dilindungi.</p>
  </footer>
</body>
</html>
