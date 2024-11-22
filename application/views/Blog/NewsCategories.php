<?php include 'Components/Header.php'; ?>

<main class="content">
    <div class="tablecontainer">
        <div class="addnews">
            <h2>News Categories</h2>
            <div>
                <a href="Blog_website/Home"><button>View Site</button></a>
                <a href="Blog_website/AddNewsCategory"><button>Add News Category</button></a>
            </div>
        </div>
        <table id="categoryTable" class="user-table" >
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
                <?php $id = 1; ?>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $id++; ?></td>
                            <td><?php echo htmlspecialchars($user['categorytitle']); ?></td>
                            <td><?php echo htmlspecialchars($user['seotitle']); ?></td>
                            <td><?php echo htmlspecialchars($user['metakeywords']); ?></td>
                            <td><?php echo htmlspecialchars($user['metadesc']); ?></td>
                            <td class="button-cell">
                                <a href="<?= base_url('Editnewstags/' . $user['id']) ?>" class="edit-btn" title="Edit Category">Edit</a>
                            </td>
                            <td class="button-cell">
                                <a href="<?= base_url('Deletenewstags/' . $user['id']) ?>" 
                                   class="delete-btn" title="Delete Category" 
                                   onclick="return confirm('Are you sure you want to delete this category?')">
                                   Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No categories found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include 'Components/Footer.php'; ?>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Styles -->
<style>
    .dataTables_wrapper {
    padding-top: 20px;
}
    :root {
        --primary-color: #5ca1e3;
        --hover-primary: #3681ca;
        --edit-color: #66bb6a;
        --hover-edit: #5caa5b;
        --delete-color: #ef5350;
        --hover-delete: #e53935;
        --table-header-bg: #2d3e50;
        --table-header-text: #fff;
        --table-striped: #f9f9f9;
        --table-hover: #f1f1f1;
    }

    /* Container Styling */
    .tablecontainer {
        margin: 20px auto;
        width: 90%;
        max-width: 1000px;
    }

    .addnews {
        display: flex;
        
        justify-content: space-between;
        align-items: center;
        background-color: #dddddd;
        padding: 15px;
        padding-bottom: 20px;
    }

    .addnews h2 {
        font-size: 24px;
        margin: 0;
        padding-left: 10px;
    }

    .addnews button {
        background-color: var(--primary-color);
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .addnews button:hover {
        background-color: var(--hover-primary);
    }

    /* Table Styling */
    .user-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 5px;
        overflow: hidden;
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

    /* Button Styling */
    .button-cell {
        text-align: center;
    }

    .edit-btn, .delete-btn {
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        font-size: 14px;
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
    }

    .delete-btn {
        background-color: var(--delete-color);
        color: white;
        border: 1px solid var(--delete-color);
    }

    .delete-btn:hover {
        background-color: var(--hover-delete);
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .user-table th, .user-table td {
            padding: 8px;
        }

        .edit-btn, .delete-btn {
            font-size: 12px;
        }
    }
</style>

<!-- Scripts -->
<script>
    // Initialize DataTables
    $(document).ready(function() {
        $('#categoryTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            pageLength: 5,
            lengthChange: false,
            columnDefs: [
                { orderable: false, targets: [5, 6] } // Make Edit and Delete buttons non-sortable
            ]
        });
    });
</script>
