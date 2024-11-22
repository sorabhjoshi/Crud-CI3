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
                <?php 
                $id = 1; 
                if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $id++; ?></td>
                            <td><?php echo htmlspecialchars($user['categorytitle']); ?></td>
                            <td><?php echo htmlspecialchars($user['seotitle']); ?></td>
                            <td><?php echo htmlspecialchars($user['metakeywords']); ?></td>
                            <td><?php echo htmlspecialchars($user['metadesc']); ?></td>
                            <td class="button-cell">
                                <a href="<?= base_url('Edittags/' . $user['id']) ?>" class="edit-btn" title="Edit Category">Edit</a>
                            </td>
                            <td class="button-cell">
                                <a href="<?= base_url('Deletetags/' . $user['id']) ?>" class="delete-btn" 
                                   title="Delete Category" onclick="return confirm('Are you sure you want to delete this category?')">
                                   Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No Blog Categories found.</td>
                    </tr>
                <?php endif; ?>
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
            "paging": true,        
            "searching": true,     
            "ordering": true,      
            "info": true,          
            "pageLength": 6,       
            "lengthChange": false,
            "columnDefs": [
                { "orderable": false, "targets": [5, 6] } 
            ]
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
