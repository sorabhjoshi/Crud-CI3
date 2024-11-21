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
        <table class="user-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Category Title</th>
                    <th>Seo Title</th>
                    <th>Meta Keywords</th>
                    <th>Meta Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $id=$id+1; ?></td>
                            <td><?php echo $user['categorytitle']; ?></td>
                            <td><?php echo $user['seotitle']; ?></td>
                            <td><?php echo $user['metakeywords']; ?></td>
                            <td><?php echo $user['metadesc']; ?></td>
                            <td class="button-cell"><a href="<?= base_url('Editnewstags/' . $user['id']) ?>" class="edit-btn">Edit</a></td>
                            <td class="button-cell"><a href="<?= base_url('Deletenewstags/' .$user['id']) ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include 'Components/Footer.php'; ?>

<style>
    .addnews {
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    width: 100%;
    max-width: 100%;
    background-color: #dddddd;
}

.addnews h2 {
    margin: 0;
    font-size: 24px;
}

.addnews button {
    background-color: #5ca1e3;
    padding: 10px ;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin: 7px 20px 7px 0;
    transition: all 0.3s ease;
}

.addnews button:hover {
    background-color: #3681ca;
}

    /* Table container */
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
    margin-bottom: 20px;
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
        background-color: #2d3e50;
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

    /* Center the buttons */
    .button-cell {
        text-align: center;
    }

    /* Edit and Delete button styles */
    .edit-btn, .delete-btn {
        padding: 8px 16px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
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
