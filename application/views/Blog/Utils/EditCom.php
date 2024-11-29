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
    <h2>Edit Blog</h2>
    <form action="<?= base_url('Updatecompany/' . htmlspecialchars($blog['id'])) ?>" method="post">

        <label for="Company_name">Company Name:</label>
        <input type="text" id="Company_name" name="Company_name" value="<?= htmlspecialchars($blog['name']) ?>">
        <div class="error-message"><?= form_error('Company_name') ?></div>

        <label for="Email">E-mail:</label>
        <input type="text" id="Email" name="Email"  value="<?= htmlspecialchars($blog['email']) ?>">
        <div class="error-message"><?= form_error('Email') ?></div>

        <label for="Companytype">Company type:</label>
        <input type="text" id="Companytype" name="Companytype" value="<?= htmlspecialchars($blog['type']) ?>">
        <div class="error-message"><?= form_error('Companytype') ?></div>
        <button type="submit">Edit data</button>
    </form>
</main>

<?php include 'C:\xampp\htdocs\CI3\application\views\Blog\Components\Footer.php'; ?>

<style>
    /* Wrapper for the entire content */
    .content {
        padding: 20px;
        background-color: #f1f1f1;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    /* Heading styling */
    h2 {
        text-align: center;
        color: #333;
        font-size: 24px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    /* Form styling */
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

    /* Label styling */
    label {
        font-size: 16px;
        font-weight: 500;
        color: #333;
        margin-bottom: 5px;
    }

    /* Input and textarea styling */
    input[type="text"],
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

    /* Focus effect for inputs */
    input:focus,
    select:focus,
    textarea:focus {
        border-color: #4CAF50;
        background-color: #fff;
        outline: none;
    }

    /* Error message styling */
    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    /* Button styling */
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
