<?php include_once 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Header.php'; ?>
<script src="https://cdn.tiny.cloud/1/2annmeyewpcnpqtixx04jzx2ho7hf6audb1x85cav7o9i85g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#description',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
      height: 200
    });
</script>
<main class="content">
    <h2>Edit News Categories</h2>
    <form action="<?= base_url('UpdateNewsSeo/' . htmlspecialchars($blog['id'])) ?>" method="post" enctype="multipart/form-data">
        
        <label for="Category">Category Title:</label>
        <input type="text" id="seo_tags" name="Category" value="<?= htmlspecialchars($blog['categorytitle']) ?>">
        <div class="error-message"><?= form_error('Category') ?></div>
    
        <label for="seotitle">SEO Title:</label>
        <input type="text" id="author_name" name="seotitle" value="<?= htmlspecialchars($blog['seotitle']) ?>" >
        <div class="error-message"><?= form_error('author_name') ?></div>

        <label for="metakeywords">Meta Keywords:</label>
        <input type="text" id="title" name="metakeywords" value="<?= htmlspecialchars($blog['metakeywords']) ?>" >
        <div class="error-message"><?= form_error('title') ?></div>

        <label for="metadesc">Meta Description:</label>
        <textarea id="description" name="metadesc"><?= htmlspecialchars($blog['metadesc']) ?></textarea>
        <div class="error-message"><?= form_error('description') ?></div>

        <button type="submit">Update Blog</button>
    </form>
</main>
<?php include 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Footer.php'; ?>

<style>
    .content {
        padding: 20px 10px;
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
        max-width: 400px;
        padding: 20px;
        background-color: #f7f7f7;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
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
        min-height: 120px;
    }

    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    button {
        padding: 12px 20px;
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
            max-width: 100%;
        }

        h2 {
            font-size: 22px;
        }

        button {
            font-size: 14px;
        }
    }
</style>
