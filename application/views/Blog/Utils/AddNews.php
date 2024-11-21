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
    <h2>Add News</h2>
    <form action="<?php echo base_url('AddingNews/') . $this->session->userdata('id') ?>" method="post" enctype="multipart/form-data">
        <label for="author_name">Author Name:</label>
        <input type="text" id="author_name" name="author_name">
        <div class="error-message"><?= form_error('author_name') ?></div>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <div class="error-message"><?= form_error('title') ?></div>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
        <div class="error-message"><?= form_error('image') ?></div>

        <label for="content">Content:</label>
        <textarea id="description" name="content"></textarea>
        <div class="error-message"><?= form_error('description') ?></div>

        <label for="Category">Category:</label>
<select id="Category" name="Category" required>
    <option value="" disabled selected>Select Category</option>
    <?php foreach ($tags as $tag): ?>
        <option value="<?= htmlspecialchars($tag['id']) ?>"><?= htmlspecialchars($tag['categorytitle']) ?></option>
    <?php endforeach; ?>
</select>
<div class="error-message"><?= form_error('Category') ?></div>


        <button type="submit">Add News</button>
    </form>
</main>
<?php include 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Footer.php'; ?>

<style>
/* Wrapper for the entire content */
.content {
    padding: 40px 20px;
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

/* Heading styling */
h2 {
    text-align: center;
    color: #333;
    font-size: 32px;
    margin-bottom: 20px;
    font-weight: 600;
}

/* Form styling */
form {
    display: flex;
    flex-direction: column;
    gap: 25px;
    width: 80%;
    padding: 30px;
    background-color: #f7f7f7;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
}

/* Label styling */
label {
    font-size: 18px;
    font-weight: 500;
    color: #333;
    margin-bottom: 8px;
}

/* Input and textarea styling */
input[type="text"],
input[type="file"],
textarea,
select {
    padding: 14px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
    width: 100%;
    box-sizing: border-box;
}

/* Focus effect for inputs */
input:focus,
select:focus,
textarea:focus {
    border-color: #4CAF50;
    background-color: #fff;
    outline: none;
}

/* Content area for the description (TinyMCE) */
textarea {
    min-height: 150px;
}

/* Error message styling */
.error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}

/* Button styling */
button {
    padding: 14px 24px;
    font-size: 18px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Button hover effect */
button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

button:active {
    transform: translateY(1px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .content {
        padding: 20px;
        width: 100%;
        max-width: 100%;
    }

    h2 {
        font-size: 28px;
    }

    button {
        font-size: 16px;
    }
}
</style>
