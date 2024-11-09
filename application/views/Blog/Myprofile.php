<?php include_once 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Header.php'; 
$usertype= ($user['UserType'] == 1) ? 'ADMIN' : 'USER';
?>


<main class="content">
  <div class="form-container">
    <h2>User Details</h2>
    
    <form action="<?=  base_url('UserDetails/' . htmlspecialchars($this->session->userdata('id'))) ?>" method="post">
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
  </div>
</main>

<?php include 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Footer.php'; ?>

<style>
/* Wrapper for the entire content */
.content {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    background-color: #f3f3f3;
    min-height: 100vh;
}
.error-message {
    color: red;   /* Red color for error messages */
    font-size: 14px;  /* Optional: Adjust the font size */
    margin-top: 5px;  /* Optional: Add some spacing above the error message */
}

/* Inner form container */
.form-container {
    width: 90%;
    max-width: 600px;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Heading styling */
h2 {
    text-align: center;
    color: #333;
    font-size: 26px;
    margin: 0 0 20px 0;
}

/* Form styling */
form {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

/* Label styling */
label {
    font-size: 16px;
    font-weight: bold;
    color: #444;
    margin-bottom: 5px;
}

/* Input styling */
input[type="text"],
input[type="email"],
input[type="number"] {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f4f4f4;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

/* Input focus effect */
input:focus {
    border-color: #4CAF50;
    background-color: #fff;
    outline: none;
}

/* Full-width button */
.full-width {
    grid-column: span 2;
    display: flex;
    justify-content: center;
}

button {
    padding: 12px 24px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Button hover effect */
button:hover {
    background-color: #45a049;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    form {
        grid-template-columns: 1fr;
    }

    h2 {
        font-size: 22px;
    }
}
</style>
