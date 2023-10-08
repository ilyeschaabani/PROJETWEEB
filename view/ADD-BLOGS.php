<?php
$page_titre = "Connection";
include './includes/header.php';
require_once '../config.php'
?>
<?php
$user_id = $_SESSION['id'];

if(!isset($user_id))
{
   header('location:connection.php ');
}

if(isset($_POST['publish'])){

  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $title = $_POST['title'];
  $title = filter_var($title, FILTER_SANITIZE_STRING);
  $content = $_POST['content'];
  $content = filter_var($content, FILTER_SANITIZE_STRING);
  $category = $_POST['category'];
  $category = filter_var($category, FILTER_SANITIZE_STRING);
  $status = 'active';
  
  $image = $_FILES['image']['name'];
  $image = filter_var($image, FILTER_SANITIZE_STRING);
  $image_size = $_FILES['image']['size'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = '../view/uploaded_img'.$image;

  $select_image = $bdd->prepare("SELECT * FROM `posts` WHERE image = ? AND user_id = ?");
  $select_image->execute([$image ,$user_id]);

  if(isset($image)){
     if($select_image->rowCount() > 0 AND $image != ''){
        $message[] = 'image name repeated!';
     }elseif($image_size > 2000000){
        $message[] = 'images size is too large!';
     }else{
        move_uploaded_file($image_tmp_name, $image_folder);
     }
  }else{
     $image = '';
  }

  if($select_image->rowCount() > 0 AND $image != ''){
     $message[] = 'please rename your image!';
  }else{
     $insert_post = $bdd->prepare("INSERT INTO `posts`(user_id, name, title, content, category, image, status) VALUES(?,?,?,?,?,?,?)");
     $insert_post->execute([$user_id, $name, $title, $content, $category, $image, $status]);
     $message[] = 'post published!';
  }
  
}

if(isset($_POST['draft'])){

  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $title = $_POST['title'];
  $title = filter_var($title, FILTER_SANITIZE_STRING);
  $content = $_POST['content'];
  $content = filter_var($content, FILTER_SANITIZE_STRING);
  $category = $_POST['category'];
  $category = filter_var($category, FILTER_SANITIZE_STRING);
  $status = 'deactive';
  
  $image = $_FILES['image']['name'];
  $image = filter_var($image, FILTER_SANITIZE_STRING);
  $image_size = $_FILES['image']['size'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = './uploaded_img'.$image;

  $select_image = $bdd->prepare("SELECT * FROM `posts` WHERE image = ? AND user_id = ?");
  $select_image->execute([$image, $user_id]); 

  if(isset($image)){
     if($select_image->rowCount() > 0 AND $image != ''){
        $message[] = 'image name repeated!';
     }elseif($image_size > 2000000){
        $message[] = 'images size is too large!';
     }else{
        move_uploaded_file($image_tmp_name, $image_folder);
     }
  }else{
     $image = '';
  }

  if($select_image->rowCount() > 0 AND $image != ''){
     $message[] = 'please rename your image!';
  }else{
     $insert_post = $bdd->prepare("INSERT INTO `posts`(user_id, name, title, content, category, image, status) VALUES(?,?,?,?,?,?,?)");
     $insert_post->execute([$user_id, $name, $title, $content, $category, $image, $status]);
     $message[] = 'draft saved!';
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/blogs.css">
    
    <title>BLOGS</title>
</head>
<body>
<div class="navbar-blog">
      <ul>
        <li><a href="BLOGS.php">VIEW POSTS </a></li>
        <li><a href="./ADD-BLOGS.php">ADD POSTS</a></li>
      </ul>
    </div>
<section class="post-editor">

<h1 class="heading">ADD NEW POST</h1>

<form id="formPostB" method="post" enctype="multipart/form-data">
   <p id="message"></p>
   <input type="hidden" name="name" value="<?= $fetch_profile['name']; ?>">
   <p>post title <span>*</span></p>
   <input type="text" name="title" maxlength="100" id="postnameinput" required placeholder="add post title" class="box">
   <p>post content <span>*</span></p>
   <textarea name="content" class="box" id ="postcontentinput" required maxlength="10000" placeholder="write your content..." cols="30" rows="10"></textarea>
   <p>post category <span>*</span></p>
   <select name="category" class="box" required>
      <option value="" selected disabled>-- select category* </option>
      <option value="nature">nature</option>
      <option value="education">education</option>
      <option value="pets and animals">pets and animals</option>
      <option value="technology">technology</option>
      <option value="fashion">fashion</option>
      <option value="entertainment">entertainment</option>
      <option value="movies and animations">movies</option>
      <option value="gaming">gaming</option>
      <option value="music">music</option>
      <option value="sports">sports</option>
      <option value="news">news</option>
      <option value="travel">travel</option>
      <option value="comedy">comedy</option>
      <option value="design and development">design and development</option>
      <option value="food and drinks">food and drinks</option>
      <option value="lifestyle">lifestyle</option>
      <option value="personal">personal</option>
      <option value="health and fitness">health and fitness</option>
      <option value="business">business</option>
      <option value="shopping">shopping</option>
      <option value="animations">animations</option>
   </select>
   <p>post image</p>
   <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
   <div class="flex-btn">
      <button type="submit"  name="publish" id="publishpost" class="btn">publish post</button>
      <input type="submit" value="save draft" name="draft" class="btn">
   </div>
</form>

</section>
<!-- <script>
   document.getElementById("publishpost").addEventListener("click", function() {
    document.getElementById("postnameinput").addEventListener("input", function() {
      // Limit the maximum length of input
      if (this.value.length > 30) {
        this.value = this.value.slice(0, 30);
      }
    });
    
    document.getElementById("postcontentinput").addEventListener("input", function() {
      // Validate minimum length of input
      if (this.value.length < 1000) {
        alert("Post content must be at least 1000 characters long.");
      }
    });
  });
</script> -->
<script src="../assets/js/blogs.js"></script>
</body>
</html>
