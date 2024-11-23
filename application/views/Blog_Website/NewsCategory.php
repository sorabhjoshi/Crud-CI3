<?php include 'Components/Header.php'; ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="bread">
    <h3 style="text-align: right;">News Design</h3>
    <p><a href="<?php echo base_url('Blog_website/NewsArticles')?>">Home</a> >> <a href="<?php echo base_url('Blog_website/NewsArticles')?>">News Design</a>>> <a href="#">Category</a> >><a href="#"><?= htmlspecialchars($users[0]['category']); ?></a></p>
</div>

<main>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-md-3 g-4" id="blogs-container">
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $index => $user): ?>
                            <div class="col featured <?= $index >= 3 ? 'd-none' : ''; ?>">
                                <div class="card h-100 card-custom">
                                    <img src="<?= base_url('uploads/news_images/' . $user['image']); ?>" 
                                         class="card-img-top" 
                                         alt="Image for <?= htmlspecialchars($user['title']); ?>" 
                                         onerror="this.src='path-to-placeholder.jpg';">
                                    <div class="card-body">
                                        <a href="<?= base_url('Blog_website/News/' . $user['category'] . '/' . $user['slug'] . '/' . $user['id']); ?>" 
                                           class="text-decoration-none text-dark">
                                            <h5 class="card-title"><?= htmlspecialchars($user['title']); ?></h5>
                                            <p class="card-text">
                                                <?php
                                                $firstLine =  strip_tags(substr($user['description'],0,100));
                                                echo $firstLine .'...';
                                                ?>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h2>No Blog Posts Found for this Category</h2>
                    <?php endif; ?>
                </div>
                <div class="text-center mt-4">
                    <button id="load-more" class="btn btn-primary" <?= count($users) <= 3 ? 'style="display: none;"' : ''; ?>>Load More</button>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-3">
                <ul class="cats">
                    <h4>Categories</h4>
                    <?php foreach ($tags as $tag): ?>
                        <li class="<?= $tag['categorytitle'] === $users['category'] ? 'active' : ''; ?>">
                            <a href="<?= base_url('Blog_website/News/' . $tag['categorytitle']); ?>">
                                <?= htmlspecialchars($tag['categorytitle']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <img class="img" src="https://colorlib.com/wp/wp-content/uploads/sites/2/colorlib-custom-web-design.png.avif" alt="">

                <div class="socialtags">
                    <h4>Follow Us</h4>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>

                    <ul class="list">
                        <?php foreach (array_slice($users, 0, 4) as $new): ?>
                            <li class="li-container">
                                <img src="<?= base_url('uploads/news_images/' . $new['image']); ?>" 
                                     alt="Image for <?= htmlspecialchars($new['title']); ?>" 
                                     onerror="this.src='path-to-placeholder.jpg';">
                                <a href="<?= base_url('Blog_website/News/' . $new['category'] . '/' . $new['slug'] . '/' . $new['id']); ?>" 
                                   class="text-decoration-none text-dark">
                                    <h5 class="card-title"><?= htmlspecialchars($new['title']); ?></h5>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        let itemsToShow = 3;

        $("#load-more").on("click", function (e) {
            e.preventDefault();
            $(".featured.d-none").slice(0, itemsToShow).removeClass("d-none");

            if ($(".featured.d-none").length === 0) {
                $("#load-more").hide();
            }
        });
    });
</script>

<?php include 'Components/Footer.php'; ?>


<style>
    .bread a {
  color: black; 
  text-decoration: none; 
  font-weight: 600; 
  transition: color 0.3s ease; 
}

.bread a:hover {
  color:#282aa7;
}

    .list {
  width: 100%;
  margin: 0; 
  padding: 0; 
  align-items: start;
}
.cats{
    display: flex;
    flex-direction: column;
    text-decoration: none;
    list-style: none;
    padding-left: 0;
    margin-bottom: 30px;
}
.cats li{
margin: 0;
}
.cats li a{
font-size: 20px;
}
.li-container {
  display: flex;
  align-items: center;  
  text-align: center;
  width: 100%;
  border-top: .5px solid #e9e5e5;
  padding: 10px 0 ;
  margin-left: 0; 
}

.li-container img {
  height: 50px;  
  width: 50px;   
  object-fit: cover;  
  border-radius: 5px; 
  margin-right: 10px;  
}

.li-container h5 {
  font-size: 1rem;
  margin: 0;
  color: #333;
}



.socialtags {
  padding: 20px 0 20px;
}

.list-unstyled {
  display: flex;
  flex-direction: row;
}

ul li a {
  font-size: 1.25rem;
  color: #333;
  text-decoration: none;
  align-items: center;
}

ul li a:hover {
  color: #52adbf;
}
.bread {
    background-color: #e1e1e1;
    padding: 15px;
  }
  .img {
    height: 280px;
    width: 100%;
    margin: 0 auto 0 auto;
  }

ul li a i {
  margin-right: 10px;
}
    /* Global Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f5f5;
        color: #333;
        line-height: 1.7;
    }

    /* Main Container */
    main {
        width: 90%;
        max-width: 1100px;
        margin: 20px auto;
        padding: 10px;
    }

    
    /* Section Title */
    #blogs {
        font-size: 2rem;
        font-weight: 600;
        color: #111;
        margin-bottom: 20px;
    }

    

    /* Blog Cards */
    .card-custom {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* Card Image */
    .card-img-top {
        object-fit: cover;
        height: 200px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        transition: transform 0.3s ease;
    }

    .card-img-top:hover {
        transform: scale(1.1);
    }

    /* Card Body */
    .card-body {
        padding: 20px;
        background-color: #fff;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
    }

    /* Title Styling */
    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
        transition: color 0.3s ease;
    }

    /* Card Text */
    .card-text {
        font-size: 1rem;
        color: #555;
        line-height: 1.5;
        margin-bottom: 15px;
    }

    .card-body h5:hover {
        color: #52adbf;
        transition: all 0.3s ease;
    }
    .card-title:hover{
  color: #52adbf;
}
  
    .card-body p:hover {
        color: #52adbf;
        transition: all 0.3s ease;
    }

    /* Link Styling */
    a {
        text-decoration: none;
        color: inherit;
    }

    a:hover {
        color: inherit;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .card-custom {
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.1rem;
        }

        .card-text {
            font-size: 0.95rem;
        }

        .sidebar {
            margin-bottom: 30px;
        }
    }

    @media (max-width: 576px) {
        #blogs {
            font-size: 1.5rem;
        }

        .card-title {
            font-size: 1rem;
        }

        .card-text {
            font-size: 0.85rem;
        }

        .sidebar {
            padding: 15px;
        }
    }
    .bread{
    background-color: #e1e1e1;
    padding: 20px 20px 20px 105px ;
  }
  .bread {
  width: 100%;
  background-color: #eeeeee;
  padding: 15px 120px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
}

.bread h3 {
  margin: 0;
  text-align: left;
}

.bread p {
  margin: 0;
  text-align: right;
}
</style>
