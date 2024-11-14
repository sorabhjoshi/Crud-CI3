<?php include 'Components/Header.php'; ?>

<main>

  
  <div class="container my-5">
    <h2 class="text-center mb-4" id="blogs">Our Blogs</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($users as $user): ?>
        <div class="col">
          <div class="card h-100">
            <img src="<?= base_url('uploads/blog_images/' . $user['Image']); ?>" class="card-img-top" alt="<?= $user['Title']; ?>" style="object-fit: cover; height: 200px;">
            <div class="card-body">
              <h5 class="card-title"><?= $user['Title']; ?></h5>
              <p class="card-text">
                <?php
                  
                  $firstLine = explode('.', $user['Description']);
                  $firstLine = trim($firstLine[0]) ;
                  echo $firstLine;
                ?>
              </p>
            </div>
            <div class="card-footer">
              <a href="<?= site_url('blog/view/' . $user['id']); ?>" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  
  
</main>

<?php include 'Components/Footer.php'; ?>
