<?php

// Returns `true` if the page URL contains the gallery identifier.
function is_gallery_page($page){
    if (strpos($page, GALLERY_PAGE_NAME) === false) {
        return false;
    } else {
        return true;
    }
}


function make_thumbnail($photo_name, $gallery_folder, $t_ht = 200) {
    $photo_path = $gallery_folder . '/' . $photo_name;
    $thumbnails_folder = $gallery_folder . "/" . THUMBNAILS_FOLDER_NAME;
    $image_info = getImageSize($photo_path) ; // see EXIF for faster way
  
   switch ($image_info['mime']) {
       case 'image/gif':
           if (imagetypes() & IMG_GIF)  { // not the same as IMAGETYPE
               $o_im = imageCreateFromGIF($photo_path) ;
           } else {
               $ermsg = 'GIF images are not supported<br />';
           }
           break;
       case 'image/jpeg':
           if (imagetypes() & IMG_JPG)  {
               $o_im = imageCreateFromJPEG($photo_path) ;
           } else {
               $ermsg = 'JPEG images are not supported<br />';
           }
           break;
       case 'image/png':
           if (imagetypes() & IMG_PNG)  {
               $o_im = imageCreateFromPNG($photo_path) ;
           } else {
               $ermsg = 'PNG images are not supported<br />';
           }
           break;
       case 'image/wbmp':
           if (imagetypes() & IMG_WBMP)  {
               $o_im = imageCreateFromWBMP($photo_path) ;
           } else {
               $ermsg = 'WBMP images are not supported<br />';
           }
           break;
       default:
           $ermsg = $image_info['mime'].' images are not supported<br />';
           break;
   }
  
   if (!isset($ermsg)) {
       $o_wd = imagesx($o_im) ;
       $o_ht = imagesy($o_im) ;
       // thumbnail width = target * original width / original height
       //$t_wd = round($o_wd * $t_ht / $o_ht) ;

       if($o_wd > $o_ht){
        $t_wd = $t_ht;
        $o_wd = $o_ht;
       }else{
        $t_wd = $t_ht;
        $o_ht = $o_wd;
       }
       $t_im = imageCreateTrueColor($t_wd,$t_ht);
      
       
       imageCopyResampled($t_im, $o_im, 0, 0, 0, 0, $t_wd, $t_ht, $o_wd, $o_ht);
       imageJPEG($t_im, $thumbnails_folder .'/'. $photo_name);
      
       imageDestroy($o_im);
       imageDestroy($t_im);
   }
   return isset($ermsg)?$ermsg:NULL;
}


function show_thumbnail($photo_name, $year, $gallery_folder){
    $thumbnails_folder = $gallery_folder . "/" . THUMBNAILS_FOLDER_NAME;
    $gallery_url = "../$year/" . PHOTOS_FOLDER_NAME;
    $thumbnails_url = $gallery_url . "/" . THUMBNAILS_FOLDER_NAME;
    $thumbnail_url = $thumbnails_url .'/'. $photo_name;
    $photo_url = $gallery_url . "/" . $photo_name;

    if(!file_exists("$thumbnails_folder/$photo_name")) {
        make_thumbnail($photo_name, $gallery_folder, 100);
    }

    echo (
        "\n<a href=\"$photo_url\" class=\"fb\" rel=\"flossCamp$year\">" .
        "<img src=\"$thumbnail_url\" alt=\"poza\" /></a>\n"
        );
}


function show_gallery($year){
    $cols = 4;
    $rows = 4;

    $gallery_folder = getcwd() . "/../$year/" . PHOTOS_FOLDER_NAME;
    $thumbnails_folder = $gallery_folder . "/" . THUMBNAILS_FOLDER_NAME;

    if(!file_exists($thumbnails_folder)) {
        mkdir($thumbnails_folder, 0755);
    }
    chmod($thumbnails_folder, 0755);

    $photos = array();
    $file_count = 0;
    if ($hand = opendir($gallery_folder)) {
        while (false !== ($file2 = readdir($hand))) {
            if (
              $file2 != "index.php" &&
              $file2 != "." &&
              $file2 != ".." &&
              !is_dir($gallery_folder .'/'. $file2)){
                $file_count = $file_count + 1;
                array_push($photos, $file2);
            }
        }
    }

    foreach($photos as $ind => $photo){
        $photo_path = $gallery_folder . "/" . $photo;
        list($width, $height, $type, $attr) = getimagesize($photo_path);
        $fsize = filesize($photo_path);
        $fsize = round($fsize/1024);
        $width2 = $width;
        $height2 = $height;
        show_thumbnail($photo, $year, $gallery_folder);
    }
}
?>
