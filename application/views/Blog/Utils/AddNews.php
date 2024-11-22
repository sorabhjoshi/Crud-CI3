<?php include_once 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Header.php'; ?>
<script src="https://cdn.tiny.cloud/1/2annmeyewpcnpqtixx04jzx2ho7hf6audb1x85cav7o9i85g/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        height: 200
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
    .content {
        padding: 20px;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    h2 {
        text-align: center;
        color: #333;
        font-size: 24px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 90%;
        max-width: 500px;
        padding: 20px;
        background-color: #f7f7f7;
        border-radius: 6px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    label {
        font-size: 16px;
        font-weight: 500;
        color: #333;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"],
    textarea,
    select {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #f9f9f9;
        transition: all 0.3s ease;
        width: 100%;
        box-sizing: border-box;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #4CAF50;
        background-color: #fff;
        outline: none;
    }

    textarea {
        min-height: 150px;
    }

    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    button {
        padding: 12px 22px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    button:hover {
        background-color: #45a049;
        transform: translateY(-2px);
    }

    button:active {
        transform: translateY(1px);
    }

    @media (max-width: 768px) {
        .content {
            padding: 15px;
            width: 100%;
        }

        h2 {
            font-size: 22px;
        }

        button {
            font-size: 14px;
        }
    }
</style>
