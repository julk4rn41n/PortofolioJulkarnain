<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="author" content="Julkarnain" />
  <title>Portofolio Julkarnain</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body class="conter">
  <header>
    <h1>Portofolio Pribadi</h1>
    <nav>
      <ul>
        <li><a href="index.html">Beranda</a></li> 
        <li><a href="tentang.html">Tentang</a></li>
        <li><a href="skill.html">Skill</a></li>
        <li><a href="kontak.php">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main> 
    <article>
      <h2>Kontak</h2>
      <p>Email: julkarnain040@gmail.com</p>
      <p>Phone: 085339043900</p>
      <p>Alamat: Yogyakarta, Sorosutan, Kos898 Putra</p>
      <p>Link WhatsApp: <a href="https://wa.me/qr/JQLH67WRYXZEB1">https://wa.me/qr/JQLH67WRYXZEB1</a></p><br>

      <form id="post" method="post">
        <p>Berikan masukan atau pesan terkait web ini:</p>
        <input type="text" id="nama" name="nama" placeholder=" nama"><br>
        <input type="email" id="email" name="email" placeholder=" email"><br>
        <textarea id="pesan" name="pesan" rows="5" placeholder=" pesan atau masukan"></textarea><br>
        <input type="submit" name="kirim" value="Kirim">
      </form>
    </article>
  </main>

  <footer>
    <p>&copy; 2025 JULKARNAIN.</p>
  </footer>

  <script>
    document.getElementById("post").addEventListener("submit", function(event){
      event.preventDefault(); // Mencegah reload halaman

      let nama = document.getElementById("nama").value.trim();
      let email = document.getElementById("email").value.trim();
      let pesan = document.getElementById("pesan").value.trim();
      // Validasi input kosong
      if (nama === "" || email === "" || pesan === "") {
        alert("Semua kolom harus diisi!");
        return;
      }
      // Validasi format email
      let polaEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!polaEmail.test(email)) {
        alert("Format email tidak valid!");
        return;
      }
      // Jika validasi berhasil
      this.submit(); // kirim ke PHP
    });
  </script>
  <?php
// PHP di bagian bawah halaman
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama  = htmlspecialchars($_POST["nama"]);
  $email = htmlspecialchars($_POST["email"]);
  $pesan = htmlspecialchars($_POST["pesan"]);

  if (!empty($nama) && !empty($email) && !empty($pesan)) {
    date_default_timezone_set("Asia/Jakarta");
    $hari = date("d-M-Y h:i:s");
    $baris = "\n\nWaktu: $hari \nNama: $nama \nEmail: $email \nPesan: $pesan" . PHP_EOL;
    $file = "guestbook.txt";

    if (!file_exists($file)) {

      file_put_contents($file, "=== Data Guestbook ===" . PHP_EOL);
    }

    file_put_contents($file, $baris, FILE_APPEND);
    echo "<script>alert('Pesan berhasil disimpan!');</script>";
  } else {
    echo "<script>alert('Semua kolom harus diisi!');</script>";
  }
}
?>
</body>
</html>
