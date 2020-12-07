<?php
$konek = mysqli_connect("localhost", "root", "", "db_nod");

function regis($data)
{
    global $konek;
    $username = stripslashes($data["username"]);
    $email = $data["email"];
    $password = mysqli_real_escape_string($konek, $data["password"]);
    $password2 = mysqli_real_escape_string($konek, $data["password2"]);

    // cek email sudah terdaftar atau belum
    $cekemail = mysqli_query($konek, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($cekemail)) {
        echo "<script>
            alert('Email sudah terdaftar, silahkan gunakan email lain');
            </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password salah!')
            </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // tambahkan user ke database
    mysqli_query($konek, "INSERT INTO user VALUES ('', '$username','$email','$password')");
    return mysqli_affected_rows($konek);
}
