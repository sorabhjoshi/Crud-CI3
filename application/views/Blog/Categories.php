<?php include 'Components/Header.php'; ?>

<main class="content">
    <div class="tablecontainer">
        <div class="addnews">
            <h2>Blog Categories</h2> 
            <div>
                <a href="Blog_website/Home"><button>View Site</button></a>
                <a href="Addcategory"><button>Add Category</button></a>
            </div>
        </div>
        <table id="blogTable" class="user-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Category Title</th>
                    <th>SEO Title</th>
                    <th>Meta Keywords</th>
                    <th>Meta Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</main>

<?php include 'Components/Footer.php'; ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
    $('#blogTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('Edit/getblogCat') ?>",
            "type": "POST"
        },
        "columns": [
            { "data": 0 }, 
            { "data": 1 }, 
            { "data": 2 }, 
            { "data": 3 },
            { "data": 4 }, 
            { "data": 5, "orderable": false },
            { "data": 6, "orderable": false }  
        ],
        "pageLength": 6,
        "lengthChange": false,
        "searching": true,
        "ordering": true,   
        "order": [[0, 'asc']],
        "info": true
    });
});

</script>

<style>
    /* CSS Variables */
    :root {
        --primary-color: #5ca1e3;
        --hover-primary: #3681ca;
        --delete-color: #ef5350;
        --hover-delete: #e53935;
        --edit-color: #66bb6a;
        --hover-edit: #5caa5b;
        --table-header-bg: #2d3e50;
        --table-header-text: #fff;
        --table-hover: #f1f1f1;
        --table-striped: #f9f9f9;
    }

    .addnews {
        display: flex;
        margin-bottom: 20px;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 100%;
        background-color: #dddddd;
    }

    .addnews h2 {
        margin: 0;
        font-size: 24px;
    }

    .addnews button {
        background-color: var(--primary-color);
        padding: 10px;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        margin: 7px 20px 7px 0;
        transition: all 0.3s ease;
    }

    .addnews button:hover {
        background-color: var(--hover-primary);
    }

    .tablecontainer {
        margin: 20px auto;
        width: 90%;
        max-width: 1000px;
    }

    h2 {
        text-align: left;
        font-size: 24px;
        padding: 20px;
        color: #333;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .user-table th, .user-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .thead-dark th {
        background-color: var(--table-header-bg);
        color: var(--table-header-text);
    }

    .user-table tr:nth-child(even) {
        background-color: var(--table-striped);
    }

    .user-table tr:hover {
        background-color: var(--table-hover);
    }

    .button-cell {
        text-align: center;
    }

    .edit-btn, .delete-btn {
        padding: 8px 16px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .edit-btn {
        background-color: var(--edit-color);
        color: white;
        border: 1px solid var(--edit-color);
    }

    .edit-btn:hover {
        background-color: var(--hover-edit);
        border: 1px solid var(--hover-edit);
    }

    .delete-btn {
        background-color: var(--delete-color);
        color: white;
        border: 1px solid var(--delete-color);
    }

    .delete-btn:hover {
        background-color: var(--hover-delete);
        border: 1px solid var(--hover-delete);
    }

    @media (max-width: 768px) {
        .user-table th, .user-table td {
            padding: 8px;
        }

        .edit-btn, .delete-btn {
            font-size: 12px;
        }
    }
</style>
