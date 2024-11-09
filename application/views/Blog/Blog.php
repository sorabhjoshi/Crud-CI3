<?php include 'Components/Header.php'; ?>
<main class="content">
    <div class="tablecontainer">
        <h2>Blogs List</h2>
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
                <?php 
                $id = 1; // Initialize ID counter
                if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $id++; ?></td>
                            <td><?php echo htmlspecialchars($user->User_id); ?></td>
                            <td><?php echo htmlspecialchars($user->Author_name); ?></td>
                            <td><?php echo htmlspecialchars($user->Title); ?></td>
                            <td><?php echo htmlspecialchars($user->Created_date); ?></td>
                            <td><?php echo htmlspecialchars($user->Updated_date); ?></td>
                            <td><a href="<?= base_url('EditBlog/' . $user->id) ?>" class="edit-btn">Edit</a></td>
                            <td><a href="<?= base_url('DeleteBlog/' . $user->id) ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No blogs found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include 'Components/Footer.php'; ?>


<style>
    /* Table container */
.tablecontainer {
    margin: 20px auto;
    width: 90%;
    max-width: 1000px;
}

/* Table heading */
h2 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Table styling */
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

/* Table border rounding */
.user-table {
    border-radius: 5px;
}

/* Header row styling */
.thead-dark th {
    background-color: #333;
    color: #fff;
}

/* Row striping */
.user-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Row hover effect */
.user-table tr:hover {
    background-color: #f1f1f1;
}

/* Table text color */
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
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

/* Edit button hover effect */
.edit-btn:hover {
    background-color: #45a049;
    border: 1px solid #45a049;
}

/* Delete button */
.delete-btn {
    background-color: #f44336;
    color: white;
    border: 1px solid #f44336;
}

/* Delete button hover effect */
.delete-btn:hover {
    background-color: #e53935;
    border: 1px solid #e53935;
}

/* Delete button active effect */
.delete-btn:active {
    background-color: #d32f2f;
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
