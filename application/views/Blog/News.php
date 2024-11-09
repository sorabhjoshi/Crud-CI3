<?php include 'Components/Header.php'; ?>

<main class="content">
    <div class="tablecontainer">
        <h2>News List</h2> <a href="AddNews"><button>Add News</button></a>
        
        <table class="user-table">
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
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $id=$id+1; ?></td>
                            <td><?php echo htmlspecialchars($user->user_id); ?></td>
                            <td><?php echo htmlspecialchars($user->Author_name); ?></td>
                            <td><?php echo htmlspecialchars($user->title); ?></td>
                            <td><?php echo htmlspecialchars($user->created_at); ?></td>
                            <td><?php echo htmlspecialchars($user->updated_at); ?></td>
                            <td><a href="<?= base_url('EditNews/' . $user->id) ?>" class="edit-btn">Edit</a></td>
                            <td><a href="<?= base_url('DeleteNews/' . $user->id) ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this news item?')">Delete</a></td>
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

<style>
    .tablecontainer {
        margin: 20px auto;
        width: 90%;
        max-width: 1000px;
    }

    h2 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
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

    .user-table {
        border-radius: 5px;
    }

    .thead-dark th {
        background-color: #333;
        color: #fff;
    }

    .user-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .user-table tr:hover {
        background-color: #f1f1f1;
    }

    .user-table td {
        color: #555;
    }

    .user-table th {
        font-weight: bold;
    }

    /* Edit and Delete button styles */
    .edit-btn, .delete-btn {
        padding: 8px 16px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* Edit button */
    .edit-btn {
        background-color: #66bb6a;  /* Softer green */
        color: white;
        border: 1px solid #66bb6a;
    }

    /* Edit button hover effect */
    .edit-btn:hover {
        background-color: #5caa5b;  /* Slightly darker green */
        border: 1px solid #5caa5b;
    }

    /* Delete button */
    .delete-btn {
        background-color: #ef5350;  /* Softer red */
        color: white;
        border: 1px solid #ef5350;
    }

    /* Delete button hover effect */
    .delete-btn:hover {
        background-color: #e53935;  /* Slightly darker red */
        border: 1px solid #e53935;
    }

    /* Delete button active effect */
    .delete-btn:active {
        background-color: #d32f2f;  /* Even darker red */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .user-table th, .user-table td {
            padding: 8px;
        }

        .edit-btn, .delete-btn {
            font-size: 12px;
        }
    }
</style>
