<?php include_once 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Header.php'; 
$usertype = ($user['UserType'] == 1) ? 'ADMIN' : 'USER';
?>

<main class="content">
  <form action="<?= base_url('UserDetails/' . htmlspecialchars($this->session->userdata('id'))) ?>" method="post">
    <h2>User Details</h2>
    
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?= $user['name'] ?>" disabled>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?= $user['email'] ?>" disabled>
    </div>
    <div class="form-group">
      <label for="phone_no">Phone Number:</label>
      <input type="text" id="phone_no" name="phone_no" value="<?= $user['Phone_no'] ?>" disabled>
    </div>
    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" id="city" name="city" value="<?= $user['City'] ?>" disabled>
    </div>
    <div class="form-group">
      <label for="state">State:</label>
      <input type="text" id="state" name="state" value="<?= $user['State'] ?>" disabled>
    </div>
    <div class="form-group">
      <label for="country">Country:</label>
      <input type="text" id="country" name="country" value="<?= $user['Country'] ?>" disabled>
    </div>
    <div class="form-group">
      <label for="pincode">Pincode:</label>
      <input type="text" id="pincode" name="pincode" value="<?= $user['Pincode'] ?>" disabled>
    </div>
    <div class="form-group">
      <label for="user_type">User Type:</label>
      <input type="text" id="user_type" name="user_type" value="<?php echo $usertype ?>" disabled>
    </div>
  </form>
</main>

<?php include 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Footer.php'; ?>

<style>
/* Wrapper for the entire content */
.content {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 40px;
    background-color: #f4f4f4; /* Light background */
    min-height: 100vh;
}

/* Form styling */
form {
    width: 100%;
    max-width: 1200px; /* Large form size */
    background-color: transparent; /* Transparent background */
    border-radius: 0; /* No border-radius */
    box-shadow: none; /* Remove shadow */
    padding: 20px 20px 60px 20px;
}

/* Heading styling */
h2 {
    text-align: left;
    font-size: 24px;
    padding: 20px;
    background-color: #eaeaea;
    color: #333;
    margin: 0 0 20px 0 ;
}

/* Form group styling */
.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 25px;
}

/* Label styling */
label {
    font-size: 18px;
    font-weight: bold;
    color: #444;
    margin-bottom: 10px;
}

/* Input styling */
input[type="text"],
input[type="email"] {
    padding: 15px;
    font-size: 18px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease, background-color 0.3s ease;
    width: 100%;
    box-sizing: border-box;
}

/* Input focus effect */
input:focus {
    border-color: #4CAF50;
    background-color: #fff;
    outline: none;
}

/* Responsive form layout */
@media (max-width: 768px) {
    form {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    h2 {
        font-size: 28px;
    }
}
</style>
