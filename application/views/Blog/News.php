<?php include 'Components/Header.php'; ?>

<main class="content">
    <div class="tablecontainer">
        <div class="addnews">
            <h2>News List</h2>
            <div>
                <a href="Blog_website/Home"><button>View Site</button></a>
                <a href="AddNews"><button>Add News</button></a>
            </div>
        </div>
        <table id="newsTable" class="user-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Author Name</th>
                    <th>Title</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
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
                            <td><?php echo htmlspecialchars($user->user_id); ?></td>
                            <td><?php echo htmlspecialchars($user->Author_name); ?></td>
                            <td><?php echo htmlspecialchars($user->title); ?></td>
                            <td><?php echo htmlspecialchars($user->created_at); ?></td>
                            <td><?php echo htmlspecialchars($user->updated_at); ?></td>
                            <td>
                                <a href="<?= base_url('EditNews/' . $user->id) ?>" class="edit-btn" title="Edit News">Edit</a>
                            </td>
                            <td>
                                <a href="<?= base_url('DeleteNews/' . $user->id) ?>" class="delete-btn" 
                                   title="Delete News" onclick="return confirm('Are you sure you want to delete this news item?')">
                                   Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No news found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include 'Components/Footer.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<style>
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const table = document.querySelector("#newsTable");
        if (table) {
            $(table).DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                pageLength: 6, 
                lengthChange: false,
                columnDefs: [
                    { orderable: false, targets: [6, 7] } 
                ]
            });
        }
    });
</script>
<style>
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

    .addnews {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 96.6%;
        background-color: #dddddd;
        padding: 15px;
        margin-bottom: 20px;
    }

    .addnews h2 {
        margin: 0;
        font-size: 24px;
        padding-left: 10px;
    }

    .addnews button {
        background-color: var(--primary-color);
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-right: 10px;
        cursor: pointer;
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

    .edit-btn, .delete-btn {
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        text-align: center;
        font-size: 14px;
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


