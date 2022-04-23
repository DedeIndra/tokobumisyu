  <?php 
function UploadImage($fupload_name){
  //direktori gambar
  $vdir_upload = "foto_barang/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
 

}
function UploadImage2($fupload_name){
  //direktori gambar
  $vdir_upload = "foto_barang/";
  $vfile_upload = $vdir_upload . $fupload_name;
  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);
  //identitas file asli

}
function UploadImage3($fupload_name){
  //direktori gambar
  $vdir_upload = "foto_barang/";
  $vfile_upload = $vdir_upload . $fupload_name;
  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload3"]["tmp_name"], $vfile_upload);
  //identitas file asli

}
function UploadArtikel($fupload_name){
  //direktori gambar
  $vdir_upload = "artikel/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Set ukuran gambar hasil perubahan
  $dst_width = 95;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
   //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Set ukuran gambar hasil perubahan
  $dst_width = 450;
  $dst_height = 270;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "mid_" . $fupload_name);
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);

}
function UploadBanner($fupload_name){
  //direktori banner
  $vdir_upload = "foto_banner/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadFile($fupload_name){
  //direktori file
  $vdir_upload = "foto_barang/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

?>
