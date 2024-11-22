<?php include_once 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Header.php'; ?> 

<main class="content">
  <div class="form-container">
    <h2>Update Your Details</h2>
    <form method="post" action="<?= base_url('UpdateUserDetails/' . htmlspecialchars($user['id'])) ?>">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" >
        <div class="error-message"><?= form_error('name') ?></div>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" >
        <div class="error-message"><?= form_error('email') ?></div>
      </div>
      <div class="form-group">
        <label for="phone_no">Phone Number:</label>
        <input type="text" id="phone_no" name="phone_no" value="<?= htmlspecialchars($user['Phone_no']) ?>" >
        <div class="error-message"><?= form_error('phone_no') ?></div>
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?= htmlspecialchars($user['City']) ?>" >
        <div class="error-message"><?= form_error('city') ?></div>
      </div>
      <div class="form-group">
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?= htmlspecialchars($user['State']) ?>" >
        <div class="error-message"><?= form_error('state') ?></div>
      </div>
      <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?= htmlspecialchars($user['Country']) ?>" >
        <div class="error-message"><?= form_error('country') ?></div>
      </div>
      <div class="form-group">
        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" value="<?= htmlspecialchars($user['Pincode']) ?>" >
        <div class="error-message"><?= form_error('pincode') ?></div>
      </div>
      <div class="form-group">
        <label for="user_type">User Type:</label>
        <input type="number" id="user_type" name="user_type" value="<?= htmlspecialchars($user['UserType']) ?>" >
        <div class="error-message"><?= form_error('user_type') ?></div>
      </div>
      <div class="form-group full-width">
        <button type="submit">Update Details</button>
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
    align-items: flex-start;
    padding: 20px;
    background-color: #f9f9f9;
    min-height: 100vh;
}

/* Inner form container */
.form-container {
    width: 100%;
    max-width: 600px; /* Smaller form size */
    background-color: #fff;
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
}

/* Heading styling */
h2 {
    text-align: left;
    font-size: 20px;
    padding: 10px;
    background-color: #e0e0e0;
    color: #333;
    margin: 0 0 20px 0;
}

/* Form group styling */
.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

/* Label styling */
label {
    font-size: 16px;
    font-weight: bold;
    color: #555;
    margin-bottom: 8px;
}

/* Input styling */
input[type="text"],
input[type="email"],
input[type="number"] {
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #fafafa;
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

/* Full-width button */
.full-width {
    display: flex;
    justify-content: center;
}

button {
    padding: 10px 20px;
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

/* Error message styling */
.error-message {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .content {
        padding: 10px;
    }
    
    .form-container {
        width: 100%;
        max-width: 100%;
    }

    h2 {
        font-size: 18px;
    }

    label {
        font-size: 14px;
    }

    input, button {
        font-size: 14px;
    }
}
</style>
