<?php include 'Components/Header.php'; ?>

<main>
  <!-- Main container for the dynamic page content -->
  <div class="container my-5">
    <!-- Page Title -->
    <div class="text-center mb-4">
      <h1 class="display-4 fw-bold text-primary"><?= isset($page['title']) ? $page['title'] : 'Page Title' ?></h1>
    </div>
    
    <!-- Page Description -->
    <div class="text-left">
      <p class="lead text-muted fs-4">
        <?= isset($page['description']) ? htmlspecialchars_decode($page['description']) : 'Description content not available.' ?>
      </p>
    </div>
  </div>
  
</main>

<?php include 'Components/Footer.php'; ?>
