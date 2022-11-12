<?php
require('components/db.php');
include('components/function.php');
$post_id = $_GET['id'];

$postQuery = "SELECT * FROM posts WHERE id=$post_id";
$runPQ = mysqli_query($db, $postQuery);
$post = mysqli_fetch_assoc($runPQ);

$currentpage = 0;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$post_per_page = 5;
$result = ($page - 1) * $post_per_page;
$post_per_subpage = 3;


?>
<!DOCTYPE html>
<html>

<head>
  <!--TITLE-->
  <title><?= $post['title'] ?></title>

  <!--SHORTCUT ICON-->
  <link rel="shortcut icon" href="../images/favicon.icon" />

  <!--META TAGS-->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!--FONTAWESOME-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!--GOOGLE FONTS-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />

  <!--STYLE SHEET-->
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="css/blog.css" />
  <style>
    .navbar-nav {
      width: 100%;
    }

    @media(min-width:568px) {
      .end {
        margin-left: auto;
      }
    }

    @media(max-width:768px) {
      #post {
        width: 100%;
      }
    }

    #clicked {
      padding-top: 1px;
      padding-bottom: 1px;
      text-align: center;
      width: 100%;
      background-color: #ecb21f;
      border-color: #a88734 #9c7e31 #846a29;
      color: white;
      border-width: 1px;
      border-style: solid;
      border-radius: 13px;
    }

    #profile {
      background-color: unset;

    }

    #post {
      margin: 10px;
      padding: 6px;
      padding-top: 2px;
      padding-bottom: 2px;
      text-align: center;
      background-color: #fff;
      border-color: #a88734 #9c7e31 #846a29;

      border-width: 1px;
      border-style: solid;
      border-radius: 13px;
      width: 50%;
    }

    body {
      background-color: white;
    }

    #nav-items li a,
    #profile {
      text-decoration: none;
      color: rgb(224, 219, 219);
      background-color: white;
    }


    .comments {
      margin-top: 5%;
      margin-left: 20px;
    }

    .darker {
      border: 1px solid #ecb21f;
      background-color: white;

      border-radius: 5px;
      padding-left: 40px;
      padding-right: 30px;
      padding-top: 10px;
    }

    .comment {
      border: 1px solid rgba(16, 46, 46, 1);
      background-color: rgba(16, 46, 46, 0.973);
      float: left;
      border-radius: 5px;
      padding-left: 40px;
      padding-right: 30px;
      padding-top: 10px;

    }

    .comment h4,
    .comment span,
    .darker h4,
    .darker span {
      display: inline;
    }

    .comment p,
    .comment span,
    .darker p,
    .darker span {
      color: rgb(184, 183, 183);
    }



    label {
      color: rgb(212, 208, 208);
    }

    #align-form {
      margin-top: 20px;
    }



    #checkbx {
      background-color: white;
    }

    #darker img {
      margin-right: 15px;
      position: static;
    }

    .form-group input,
    .form-group textarea {
      background-color: white;
      border: 1px solid rgba(16, 46, 46, 1);
      border-radius: 12px;
    }

    form {

      background-color: white;
      border-radius: 5px;
      padding: 20px;
    }
  </style>

</head>

<body>
  <!--HEADER-->
  <header style="
        background: linear-gradient(rgba(1, 1, 1, 0.5), rgba(1, 1, 1, 0.5)),
          url(./Cover2.jpg);
      ">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent ms-auto">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img style="height: 41px;" src="Logo Alternate.png" alt="" width="" height="48">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end navcontent" id="navbarScroll">
          <div>
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../About Us/AboutUs.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Courses
                </a>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="../TechLearns Blog/blog.php">Blogs</a>
              </li>
              <li class="nav-item" style="margin-right: 0px;">
                <a class="nav-link" href="../about/index.html">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <section>
      <h1 class="title">Our Blog</h1>
      <span><a href="/PRABHUPADAWORLD/">Home</a>
        <i class="fa fa-angle-double-right"></i>
        <a href="#" class="active">Blog</a></span>
    </section>
  </header>

  <!--BLOG SECTION-->
  <div class="blog_container">
    <div class="blog_content">
      <div class="left_content">
        <!--CARD BEGINING-->
        <?php $post_images = getImagesByPost($db, $post['id']);   ?>
        <div class="blog_card">
          <?php
          $c = 1;
          foreach ($post_images as $images) {

          ?>
            <a href="post.php?id=<?= $post['id'] ?>" class="figure">
              <img src="./images/<?= $images['image'] ?>" alt="" loading="lazy" />
              <span class="tag"><?= date('j', strtotime($post['created_at'])) ?><?= date('M', strtotime($post['created_at'])) ?></span>
            </a>

          <?php
            $c++;
          }
          ?>
          <section>
            <a href="post.php?id=<?= $post['id'] ?>" class="title"><?= $post['title'] ?></a>
            <p>
              <?= $post['content'] ?>
            </p>
          </section>
        </div>
        <section>
          <div class="container">
            <div class="row">
              <div class="col-lg-5 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                <form action="components/add_comment.php" method="post" id="algin-form">
                  <div class="form-group">
                    <h4>Leave a comment</h4>
                    <label for="message">Message</label>
                    <textarea name="comment" id="" msg cols="30" rows="5" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="fullname" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <p class="text-secondary">If you have a <a href="#" class="alert-link">gravatar account</a> your address will be used to display your profile picture.</p>
                  </div>
                  <div class="form-inline">
                    <input type="checkbox" name="check" id="checkbx" class="mr-1">
                    <label for="subscribe">Subscribe me to the newlettter</label>
                  </div>
                  <div class="form-group">
                    <p class="form-submit"><input name="addcomment" type="submit" id="submit_comment" class="submit" value="Send message" /> <input type='hidden' name="post_id" value="<?= $post_id ?>" />

                    </p>
                  </div>
                </form>
              </div>
              <?php
              if (isset($_GET['id'])) {

              ?>
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                  <h1>Comments</h1>

                  <?php
                  $comments = getComments($db, $post_id);
                  if (count($comments) < 1) {
                    echo ' <div class="comment-content">
              <p>
              No Comments available to show.
              </p>
            </div>';
                  } else {
                    foreach ($comments as $comment) {
                  ?>

                      <div class="text-justify darker mt-4 float-right" style="word-break: break-all;">
                        <img src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="rounded-circle" width="40" height="40">
                        <h4> <?= $comment['name'] ?></h4>
                        <span>- <?= date('F jS, Y', strtotime($comment['created_at'])) ?></span>
                        <br>
                        <p><?= $comment['comment'] ?></p>
                      </div>
                    <?php
                    }

                    ?>
                <?php
                  }
                }
                ?>
                </div>

            </div>
          </div>
        </section>
      </div>

    </div>

    <div class="blog_content right_content">
      <!--SEARCH COLUMN BEGINING-->

      <!--SEARCH COLUMN ENDS-->
      <!--BOOKS COLUMN BEGINING-->
      <div class="columns books">
        <span class="title">Instagram Posts
          <a href="https://www.instagram.com/techlearnsofficial/" title="Explore More"><i class="fa fa-share"></i></a></span>
        <section>
          <div class="cards">
            <div class="card_part card_part-one" style="
                  background-image: url(./images/3.webp);
                "></div>
            <div class="card_part card_part-two" style="
                  background-image: url(./images/20.webp);
                "></div>
            <div class="card_part card_part-three" style="
                  background-image: url(./images/7.webp);
                "></div>
            <div class="card_part card_part-four" style="
                  background-image: url(./images/11.webp);
                "></div>
            <div class="card_part card_part-five" style="
                  background-image: url(./images/13.webp);
                "></div>
            <div class="card_part card_part-six" style="
                  background-image: url(./images/25.webp);
                "></div>
          </div>
        </section>
      </div>
      <!--BOOKS COLUMN ENDS-->
      <!--CATEGORIES COLUMN BEGINING-->
      <div class="columns categories">
        <span class="title">Categories</span>
        <section>
          <?php
          $categories = getAllCategory($db);
          $count = 1;
          foreach ($categories as $ct) {
          ?>
            <a href="#"><?= $ct['name'] ?></a>
          <?php
            $count++;
          }
          ?>
        </section>
      </div>
      <!--CATEGORIES COLUMN ENDS-->
      <!--POSTS COLUMN BEGINING-->
            <div class="columns posts">
        <span class="title">Recent Posts
</span>
          <section>
            <?php

            $postQuery = "SELECT * FROM posts ORDER BY id DESC LIMIT $result,$post_per_subpage";


            $runPQ = mysqli_query($db, $postQuery);

            while ($post = mysqli_fetch_assoc($runPQ)) {
            ?>
              <a href="post.php?id=<?= $post['id'] ?>" title="<?= $post['title'] ?>"><img src="./images/<?= getPostThumb($db, $post['id']) ?>" alt="" loading="lazy" />
                <p style="word-break: break-all;"><?= $post['title'] ?></p>
              </a>
            <?php

            }
            ?>
          </section>
        
      </div>
 
      <!--POSTS COLUMN ENDS-->
      <!--COMMENTS COLUMN BEGINING-->
      <div class="columns comments">
        <span class="title">
          Recent Updates
        </span>
        <section>
          <marquee direction="up" scrollamount="4" onMouseOver="this.stop()" onMouseOut="this.start()" class="marquee2">
            <p>
              Success is no accident. It is hard work, perseverance, learning, studying, sacrifice and most of all, love of what you are doing or learning to do
            </p>
            <p>
              There are no secrets to success. It is the result of preparation, hard work, and learning from failure.
            </p>
            <p>
              People always say that I didn’t give up my seat because I was tired, but that isn’t true. I was not tired physically… No, the only tired I was, was tired of giving in.
            </p>
          </marquee>
        </section>
      </div>
      <!--COMMENTS COLUMN ENDS-->
      <!--SOCIAL MEDIA ICONS BEGINING-->
      <!-- <div class="columns social_icons">
        <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" title="Instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" title="Youtube"><i class="fa fa-youtube"></i></a>
        <a href="#" title="Whatsapp"><i class="fa fa-whatsapp"></i></a>
        <a href="#" title="Telegram"><i class="fa fa-telegram"></i></a>
      </div> -->
      <!--SOCIAL MEDIA ICONS ENDS-->
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>