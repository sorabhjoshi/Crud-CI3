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
    <h2>Edit Blog SEO</h2>
    <div class="blog-info">
        <p><strong>Blog Title:</strong> <?= htmlspecialchars($blog['blog_title']) ?></p>
        <p><strong>Blog ID:</strong> <?= htmlspecialchars($blog['blog_id']) ?></p>
    </div>

    <form action="<?= base_url('UpdateSEO/' . htmlspecialchars($blog['id'])) ?>" method="post">
        <label for="seo_tags">SEO Title:</label>
        <input type="text" id="seo_tags" name="seo_tags" value="<?= htmlspecialchars($blog['seotitle'] ) ?>" required>
        <div class="error-message"><?= form_error('seo_tags') ?></div>

        <label for="meta_tags">Meta Keywords:</label>
        <input type="text" id="metatags" name="meta_tags" value="<?= htmlspecialchars($blog['metakeywords']) ?>" required>
        <div class="error-message"><?= form_error('metatags') ?></div>

        <label for="content">Meta Description:</label>
        <textarea id="description" name="content" required><?= htmlspecialchars($blog['metadesc'] ) ?></textarea>
        <div class="error-message"><?= form_error('metadesc') ?></div>
    
        <button type="submit">Update SEO</button>
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

    /* Blog information styling */
    .blog-info {
        margin-bottom: 20px;
        font-size: 18px;
        color: #555;
        text-align: center;
    }

    .blog-info p {
        margin: 5px 0;
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
    textarea {
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
    textarea:focus {
        border-color: #4CAF50;
        background-color: #fff;
        outline: none;
    }

    /* Textarea for meta description */
    textarea {
        min-height: 100px;
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
