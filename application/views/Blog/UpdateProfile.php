<?php include_once 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Header.php'; ?>


<main class="content">
  <div class="form-container">
    <h2>Update Your Details</h2>
    <form  method="post" action="<?=  base_url('UpdateUserDetails/' . htmlspecialchars($user['id'])) ?>">
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
