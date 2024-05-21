<?php
$servername = "localhost";
$username = "root"; // atau username Anda
$password = ""; // atau password Anda
$dbname = "personalpage_db"; // ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memproses form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['Name']);
    $email = $conn->real_escape_string($_POST['E-mail']);
    $pesan = $conn->real_escape_string($_POST['Message']);

    $sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pesan berhasil dikirim');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rael Nation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="indexcobastyle.css">
</head>

<body>
    <div id="header">
        <div class="container">
            <nav>
                <div class="logo">
                    <h1>RAEL NATION</h1>
                    <h6>Nation of Rangian Elroi Johanes</h6>
                </div>
                
                <ul>
                    <li><a href="#header">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>

            <div class="header-text">
                <h1>Hello World!</h1>
                <p>
                    Selamat datang di dunia <span>Rangian Elroi Johanes</span>. 
                    <br>
                    Senang bisa berjumpa dengan anda.
                </p>
            </div>
        </div>
    </div>

<!-- about -->
    <div id="about">
        <div class = "container">
            <div class="row">
                <div class="about-col-1">
                    <img src="img/Elroi Rangian_Anggota.JPG" alt="Foto Saya">
                </div>
                <div class="about-col-2">
                    <h1 class="sub-title">About Me</h1>
                    <p>
                        Nama saya adalah Rangian Elroi Johanes biasa dipanggil El. Pada saat ini, saya sedang menjalani pendidikan di Program Studi Teknik Informatika Universitas Sam Ratulangi. Sembari menjalani studi ini, saya juga dipercayakan sebagai anggota Badan Pengurus PENDANAAN UPK Kr. FT UNSRAT. Saya adalah seorang yang gemar dengan teknologi, sejarah dan hal-hal yang berkaitan dengan luar angkasa yang luas dan misterius ini.
                    </p>

                    <div class="tab-titles">
                        <p class="tab-links active-link" onclick="opentab('skills')">Skills</p>
                        <p class="tab-links" onclick="opentab('experience')">Experience</p>
                        <p class="tab-links" onclick="opentab('education')">Education</p>
                    </div>
                    <div class="tab-contents active-tab" id="skills">
                        <ul>
                            <li><span>UI/UX</span><br>Coming Soon...</li>
                            <li><span>Web Development</span><br>Coming Soon...</li>
                            <li><span>App Development</span><br>Coming Soon...</li>
                        </ul>
                    </div>
                    <div class="tab-contents" id="experience">
                        <ul>
                            <li><span>2023 - Sekarang</span><br> Anggota HME FT. UNSRAT</li>
                            <li><span>2023</span><br>Panitia Pelaksana Akomkem BC-37 FT. UNSRAT</li>
                            <li><span>2023 - Sekarang</span><br>Anggota BP Pendanaan UPK Kr. FT. UNSRAT</li>
                        </ul>
                    </div>
                    <div class="tab-contents" id="education">
                        <ul>
                            <li><span>2019</span><br>SMA Negeri 99 Jakarta</li>
                            <li><span>2022</span><br>Universitas Sam Ratulangi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Gallery -->
    <div id="gallery">
        <div class="container">
            <h1 class="sub-title">My Gallery</h1>
            <div class="gallery-list">
                <?php
                $sql = "SELECT nama_foto, deskripsi, nama_file FROM list_foto";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="image">';
                        echo '<img src="img/' . $row["nama_file"] . '" alt="">';
                        echo '<p><br><br><br><br>' . $row["deskripsi"] . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "Tidak ada gambar ditemukan.";
                }
                ?>
            </div>
        </div>
    </div>

<!-- My Blog -->
    <div id="blog">
        <div class="container">
                <h1 class="sub-title">My Blog</h1>
            <div class="row">
                <div class="blog-img">
                    <img src="img/Des.jpg" alt="" class="blog-img-item live" data-id="step1">
                    <img src="img/Byzantine.jpg" alt="" class="blog-img-item" data-id="step2">
                    <img src="img/glowing-spaceship-orbits-planet-starry-galaxy-generated-by-ai.jpg" alt="" class="blog-img-item" data-id="step3">
                </div>
                <div class="blog-tabs">
                    <div class="btn-container">
                        <button class="blog-button live" data-id="step1">Desmond Doss</button>
                        <button class="blog-button" data-id="step2">History</button>
                        <button class="blog-button" data-id="step3">Space</button>
                    </div>
                    <div class="blog-content">
                        <div class="content live" id="step1">
                            <h3>Mengenal Desmond Doss</h3>
                            <p>Desmond Doss adalah contoh hidup yang mempesona, memadukan keberanian yang luar biasa dengan keyakinan yang tak tergoyahkan. Sebagai seorang prajurit medis Amerika Serikat pada masa Perang Dunia II, Doss menolak untuk membawa senjata ke medan pertempuran, memilih untuk mempertahankan prinsip-prinsip iman Adventisnya yang melarang membunuh. Keberaniannya dalam menyelamatkan rekan-rekannya di medan perang, tanpa harus mengorbankan keyakinannya, adalah inspirasi bagi banyak orang di seluruh dunia. Kekaguman saya terhadap Doss tidak hanya terletak pada keberaniannya dalam situasi ekstrem, tetapi juga pada keberaniannya untuk mempertahankan nilai-nilai moral dan keimanan di tengah tekanan yang luar biasa. Melalui kisah hidupnya, saya belajar tentang kekuatan keyakinan, keberanian, dan keteguhan hati, yang menjadikan Desmond Doss bukan hanya seorang pahlawan perang, tetapi juga seorang teladan bagi kita semua.</p>
                        </div>
                        <div class="content" id="step2">
                            <h3>History</h3>
                            <p>Ketertarikan saya terhadap sejarah tak terelakkan karena rasa keajaiban dan kompleksitasnya yang sering kali melebihi imajinasi. Bagi saya, membaca sejarah mirip dengan membaca novel yang tak terputus, di mana setiap peristiwa dan tokoh memiliki cerita uniknya sendiri yang menyentuh hati. Namun, yang membuat sejarah begitu menarik adalah bahwa kita tidak hanya membaca kisah-kisah yang mengagumkan, tetapi juga memahami bagaimana kejadian masa lalu membentuk dunia yang kita tinggali hari ini. Dengan memahami sejarah, saya merasa memiliki pandangan yang lebih luas tentang manusia, peradaban, dan dinamika sosial yang telah ada sepanjang waktu. Terkadang, saat saya merenungkan sejarah, saya merasakan bahwa ada pola-pola tertentu yang muncul dan membentuk narasi yang berkelanjutan dalam perjalanan umat manusia. Hal ini memicu rasa ingin tahu saya untuk terus menjelajahi dan memahami lebih dalam akan rahasia dan makna yang terkandung di dalamnya.
                            </p>
                        </div>
                        <div class="content"id="step3">
                            <h3>Space</h3>
                            <p>Ketertarikan saya terhadap luar angkasa tak terelakkan karena keajaiban dan misterinya yang tak terbatas. Di dalam hampa gelap antar bintang, kita dihadapkan pada kebesaran alam semesta yang begitu luas dan kompleks, mempertanyakan tempat kita di dalamnya dan membuat manusia terasa begitu kecil. Salah satu fenomena paling menarik bagi saya adalah black hole, entitas luar biasa yang memperkuat daya tarik gravitasinya sehingga bahkan cahaya pun tidak bisa lolos darinya. Konsep black hole yang menyerap segala sesuatu di sekitarnya, bahkan cahaya sekalipun, menimbulkan banyak pertanyaan dan membuat saya ingin memahami lebih dalam tentang sifat dan karakteristiknya. Hal ini membuka pintu bagi pemahaman yang lebih dalam tentang alam semesta, memperluas pandangan kita tentang keberadaan dan tujuan kita di dalamnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Contact -->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="contact-left">
                    <h1 class="sub-title">Contact Me</h1>
                    <p>elroijohanes@gmail.com</p>
                    <p>087888859877</p>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/@elroijohanes25/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://github.com/RaelNation" target="_blank"><i class="fa-brands fa-github"></i></a>
                        <a href="https://facebook.com/Elroi Johanes" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    </div>
                    <div class="quotes">
                        <div class="quoteleft">"</div> 
                        <p>
                            Non nobis Domine, non nobis, sed nomini tuo da gloriam
                        </p>
                        <div class="quoteright">"</div>
                        <div class="author">- Psalms 115:1a</div>
                    </div>
                </div>
                <div class="contact-right">
                    <form method="POST" action="">
                        <input type="text" name="Name" placeholder="Your Name" required>
                        <input type="email" name="E-mail" placeholder="Your E-mail" required>
                        <textarea name="Message" placeholder="Your Message" rows="6"></textarea>
                        <button type="submit" class="btn btn2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>© 2024 Rangian Elroi Johanes - 220211060111 - Pemrograman Web</p>
        </div>
    </div>

    <script src="index.js"></script>

    <?php $conn->close(); ?>
</body>  
</html>
