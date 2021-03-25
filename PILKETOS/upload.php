<?php
include 'config.php';
$target_dir = "kandidat/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    setcookie('sukses', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>File is an image -' . $check["mime"] . ' .</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>',  time() + (5), '/');
    $uploadOk = 1;
  } else {
    // echo "File is not an image.";
    setcookie('sukses', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Maaf file yang di upload harus berformat JPG, JPEG, PNG & GIF !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>',  time() + (5), '/');
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  // echo "Sorry, file already exists.";
  setcookie('sukses', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Maaf file telah ada, silahkan uplaod foto baru!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>',  time() + (5), '/');
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  // echo "Sorry, your file is too large.";
  setcookie('sukses', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Maaf file anda terlalu besar!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>',  time() + (5), '/');
  $uploadOk = 0;
}

// Allow certain file formats
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  setcookie('sukses', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Maaf file yang di upload harus berformat JPG, JPEG, PNG & GIF !</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>',  time() + (5), '/');
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header('Location:' . $link . 'PILKETOS/tambahcalon.php');
  exit;
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $foto_2 = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
    $url = "https://api.apispreadsheets.com/data/9939/";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $postJSON = json_encode(["data" => ["nama" => $nama, "visi" => $visi, "misi" => $misi, "foto" => $foto_2]]);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

    $result = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($http_code == 201) {
      setcookie('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Data berhasil ditambah!</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>',  time() + (5), '/');
      header('Location:' . $link . 'PILKETOS/tambahcalon.php');
      exit;
    } else {
      echo 'Gagal';
    }
    curl_close($curl);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
