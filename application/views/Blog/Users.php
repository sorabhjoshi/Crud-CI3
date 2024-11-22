<?php include 'Components/Header.php'; ?>

<main class="content">
    <div class="tablecontainer">
        <h2>Users List</h2>
        <table id="userTable" class="user-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>City</th>
                    <th>Phone No.</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $id = $id + 1; ?></td>
                            <td><?php echo htmlspecialchars($user->name); ?></td>
                            <td><?php echo htmlspecialchars($user->email); ?></td>
                            <td><?php echo ($user->UserType == 0 ? 'User' : "Admin"); ?></td>
                            <td><?php echo htmlspecialchars($user->City); ?></td>
                            <td><?php echo htmlspecialchars($user->Phone_no); ?></td>
                            <td class="button-cell"><a href="<?= base_url('EditUser/' . $user->id) ?>" class="edit-btn">Edit</a></td>
                            <td class="button-cell"><a href="<?= base_url('DeleteUser/' . $user->id) ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#userTable').DataTable({
            "paging": true,     
            "searching": true,    
            "ordering": true,     
            "info": true,    
            "pageLength": 6,        
            "columnDefs": [
                { "orderable": false, "targets": [6, 7] } 
            ]
        });
    });
</script>

<style>
    .tablecontainer {
        margin: 20px auto;
        width: 90%;
        max-width: 1000px;
    }

    h2 {
    text-align: left;
    font-size: 24px;
    padding: 20px;
    background-color: #eaeaea;
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
