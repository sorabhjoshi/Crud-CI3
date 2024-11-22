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
    padding: 20px;
    background-color: #f9f9f9; /* Lighter background */
    min-height: 100vh;
}

/* Form styling */
form {
    width: 100%;
    max-width: 500px; /* Further reduced form size */
    background-color: transparent;
    border-radius: 8px; /* Slightly rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px 15px;
}

/* Heading styling */
h2 {
    text-align: left;
    font-size: 18px; /* Reduced heading size */
    padding: 10px;
    background-color: #e0e0e0;
    color: #333;
    margin: 0 0 15px 0;
}

/* Form group styling */
.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 12px; /* Reduced spacing between groups */
}

/* Label styling */
label {
    font-size: 15px; /* Slightly smaller font size */
    font-weight: bold;
    color: #555;
    margin-bottom: 6px; /* Reduced margin */
}

/* Input styling */
input[type="text"],
input[type="email"] {
    padding: 8px; /* Smaller padding */
    font-size: 14px; /* Smaller font size */
    border: 1px solid #ddd;
    border-radius: 4px; /* Reduced border-radius */
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
        padding: 20px;
        max-width: 100%;
    }

    .form-group {
        margin-bottom: 10px; /* Reduced spacing for smaller screens */
    }

    h2 {
        font-size: 16px; /* Smaller heading size for mobile */
    }

    label {
        font-size: 14px; /* Adjusted label font size */
    }

    input {
        font-size: 13px; /* Adjusted input font size */
    }
}
</style>
