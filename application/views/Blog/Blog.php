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
                    <th>Category</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
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
            "url": "<?= base_url('Welcome/getBlogData') ?>",
            "type": "POST"
        },
        "columns": [
            { "data": 0 }, // ID
            { "data": 1 }, // User ID
            { "data": 2 }, // Author Name
            { "data": 3 }, // Title
            { "data": 4 }, // Category
            { "data": 5, "orderable": false }, // Created Date
            { "data": 6, "orderable": false }, // Updated Date
            { "data": 7, "orderable": false }, // Edit
            { "data": 8, "orderable": false }  // Delete
        ],
        "pageLength": 6,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "order": [[0, 'asc']], // Default ordering (ID column, ascending)
        "info": true
    });
});



</script>
<style>
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
