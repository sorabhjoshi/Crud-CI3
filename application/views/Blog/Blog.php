<?php include 'Components/Header.php'; ?>
<main class="content">
    <div class="tablecontainer">
        <div class="addnews">
            <h2>Blogs List</h2>
            <div>
                <a href="Blog_website/Home"><button>View Site</button></a>
                <a href="AddBlog"><button>Add Blog</button></a>
            </div>
        </div>
        
        <table id="blogTable" class="user-table">
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
                $id = 1; 
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

<!-- Include DataTable CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    // Initialize DataTable
    $(document).ready(function () {
        $('#blogTable').DataTable({
            "paging": true,        // Enable pagination
            "searching": true,     // Enable search
            "ordering": true,      // Enable sorting
            "info": true,          // Display table info
            "pageLength": 6,       // Set number of rows per page
            "lengthChange": false, // Disable page length dropdown
            "columnDefs": [
                { "orderable": false, "targets": [6, 7] } // Disable sorting on Edit/Delete columns
            ]
        });
    });
</script>

<style>
/* Styling for the Add Blog and View Site section */
.addnews {
    display: flex;
    margin-bottom: 20px;
    justify-content: space-between;
    align-items: center;
    width: 96.7%;
    background-color: #dddddd;
    padding: 15px;
}

.addnews h2 {
    margin: 0;
    font-size: 24px;
}

.addnews button {
    background-color: #5ca1e3;
    padding: 10px;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin: 0 10px;
    transition: all 0.3s ease;
}

.addnews button:hover {
    background-color: #3681ca;
}

/* Rest of the styles remain unchanged */
.tablecontainer {
    margin: 20px auto;
    width: 90%;
    max-width: 1000px;
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

.edit-btn, .delete-btn {
    padding: 8px 16px;
    font-size: 14px;
    text-decoration: none;
    border-radius: 4px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.edit-btn {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.edit-btn:hover {
    background-color: #45a049;
    border: 1px solid #45a049;
}

.delete-btn {
    background-color: #f44336;
    color: white;
    border: 1px solid #f44336;
}

.delete-btn:hover {
    background-color: #e53935;
    border: 1px solid #e53935;
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
