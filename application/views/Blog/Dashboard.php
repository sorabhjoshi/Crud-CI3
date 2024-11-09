<?php include 'Components\Header.php'; ?>
         <main class="content">
               <p>Hello <?php print_r($this->session->userdata('name'))?>!</p>
         </main>
<?php include 'Components\Footer.php'; ?>
         
<style>
   .content{
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
      text-align: center;
   }
</style>