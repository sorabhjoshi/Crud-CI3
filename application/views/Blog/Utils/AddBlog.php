<?php include_once 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Header.php'; ?>
<script src="https://cdn.tiny.cloud/1/2annmeyewpcnpqtixx04jzx2ho7hf6audb1x85cav7o9i85g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#description',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
      height: 300
    });
</script>
<main class="content">
    <h2>Add Blog</h2>
    <form action="<?= base_url('AddBlogData/').$this->session->userdata('id') ?>" method="post" enctype="multipart/form-data">
        <label for="author_name">Author Name:</label>
        <input type="text" id="author_name" name="author_name" required>
        <div class="error-message"><?= form_error('author_name') ?></div>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <div class="error-message"><?= form_error('title') ?></div>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>  <!-- Corrected here -->
        <div class="error-message"><?= form_error('image') ?></div>

        <label for="content">Content:</label>
        <textarea id="description" name="content"></textarea>
        <div class="error-message"><?= form_error('content') ?></div>

        <button type="submit">Update Blog</button>
    </form>
</main>
<?php include 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Footer.php'; ?>


<style>



.content {
    
    padding: 10px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.error-message {
    color: red;   /* Red color for error messages */
    font-size: 14px;  /* Optional: Adjust the font size */
    margin-top: 5px;  /* Optional: Add some spacing above the error message */
}

/* Heading for the form */
h2 {
    text-align: center;
    color: #333;
    font-size: 30px;
    margin: 10px;
}

/* Form styling */
form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    border-radius: 8px;
    width: 600px;
    max-width: 600px;
    padding: 20px;
    background-color: #f5f5e1;
}

/* Label styling */
label {
    font-size: 18px;
    font-weight: bold;
    color: #444;
    margin-bottom: 5px;
}

/* Input and textarea styling */
input[type="text"], textarea {
    padding: 14px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 6px;
    background-color: #f4f4f4;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

/* Input and textarea focus effect */
input[type="text"]:focus, textarea:focus {
    border-color: #4CAF50;
    background-color: #fff;
    outline: none;
}

/* Button styling */
button {
    padding: 14px 20px;
    font-size: 18px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Button hover effect */
button:hover {
    background-color: #45a049;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .content {
        padding: 20px;
        max-width: 100%;
    }

    h2 {
        font-size: 26px;
    }

    button {
        font-size: 16px;
    }
}

</style>
