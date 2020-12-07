<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/learning/css/landing.css">
    <title>Nodlearn</title>
</head>

<body>
    <header>
        <a href="#" class="logo"><img src="assets/img/nodlogo.png" alt=""></a>
        <div class="toggle"></div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a class="btn1" href="login.php">Masuk</a></li>
            <li>|</li>
            <li><a href="register.php">Mendaftar</a></li>
        </ul>
    </header>
    <section class="banner">
        <div class="textbox">
            <h2>Selamat Datang Di <br>Nod Learn</h2><br>
            <h3>E-Learning, Kursus dan Classroom <br> Berbasis Web</h3>
            <a href="#" class="btn">Learn More</a>
        </div>
    </section>
    <section class="About">
        <div class="heading">
            <h2>Tentang Kami</h2>
        </div>
        <div class="konten">
            <div class="bxkonten w50">
                <h3>E-Learning NOD Learn</h3>
                <p>E-learning atau online learning adalah suatu proses pembelajaran jarak jauh dengan cara menggabungkan prinsip-prinsip didalam proses suatu pembelajaran dengan teknologi. e-Learning atau electronic learning kini semakin dikenal sebagai salah satu cara untuk mengatasi masalah pendidikan, baik di negara-negara maju maupun di negara yang sedang berkembang. <br><br>
                    Banyak orang menggunakan istilah yang berbeda-beda dengan e-learning, namun pada prinsipnya e-learning adalah pembelajaran yang menggunakan jasa elektronika sebagai alat bantunya.e-Learning memang merupakan suatu teknologi pembelajaran yang yang relatif baru di Indonesia. <br>
                    Kini hadir NOD Learn, yang merupakan E-Learning berbasis web yang di rancang untuk pembelajaran via internet, tanpa perlu tatap muka
                </p>
            </div>
            <div class="w50">
                <img src="assets/img/about.png" class="img50">
            </div>
        </div>
    </section>
    <section class="service">
        <div class="heading white">
            <h2>Layanan Kami</h2>
            <p>Untuk memenuhi kebutuhan para siswa, sekarang telah ada media pembelajaran di internet yang biasa disebut "E-Learning". Dengan tujuan pengembangan pendidikan di masa kini, agar tidak menimbulkan kejenuhan dalam proses belajar mengajar, E-Learning <span>"NOD LEARN"</span> adalah solusinya.</p>
        </div>
    </section>
    <section class="footer">
        <div class="konten">
            <div class="kontakinfo">
                <h3>Info Kontak</h3>
                <div class="infobox">
                    <div class="box">
                        <div class="icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="text">
                            <h3>Alamat</h3>
                            <p>JL Mirah 5 No 6 Pondok Permata Suci,<br>Manyar,Gresik,<br>61151</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="text">
                            <h3>No. Telp</h3>
                            <p>(+62)895-3954-01081</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>nod-learn@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright">
        <p>Copyright © 2020 Nodlearn.All right reserved</p>
    </div>



    <script type="text/javascript">
        window.addEventListener('scroll', function() {
            var header = document.querySelector('header');
            header.classList.toggle('sticky', window.scrollY > 0);
        })
    </script>
</body>

</html>