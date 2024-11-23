<?php include_once 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Header.php'; ?>
<script src="https://cdn.tiny.cloud/1/2annmeyewpcnpqtixx04jzx2ho7hf6audb1x85cav7o9i85g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#meta_description',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        height: 150
    });
</script>
<main class="content">
    <h2>Add Category</h2>

    <form action="<?= base_url('Addcategorydata') ?>" method="post">
        <label for="Category">Category Title:</label>
        <input type="text" id="seo_tags" name="Category" value="">
        <div class="error-message"><?= form_error('Category') ?></div>

        <label for="seo_tags">SEO Title:</label>
        <input type="text" id="seo_tags" name="seo_tags" value="">
        <div class="error-message"><?= form_error('seo_tags') ?></div>

        <label for="meta_tags">Meta Keywords:</label>
        <input type="text" id="metatags" name="meta_tags" value="" >
        <div class="error-message"><?= form_error('metatags') ?></div>

        <label for="content">Meta Description:</label>
        <textarea id="description" name="content" required></textarea>
        <div class="error-message"><?= form_error('metadesc') ?></div>
    
        <button type="submit">Add</button>
    </form>
</main>
<?php include 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Footer.php'; ?>

<style>
    .content {
        padding: 20px;
        background-color: #f1f1f1;
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
    textarea {
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
    textarea:focus {
        border-color: #4CAF50;
        background-color: #fff;
        outline: none;
    }

    textarea {
        min-height: 80px;
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
