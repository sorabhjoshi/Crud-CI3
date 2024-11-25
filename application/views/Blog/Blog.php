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
            <div class="filter-container">
            <h4>Filter</h4>
            <div class="filter">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate">
                <label for="endDate">End Date:</label>
                <input type="date" id="endDate">
                <button id="filterButton">Filter</button>
            </div>
            </div>

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
        const table = $('#blogTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('Welcome/getBlogData') ?>",
                "type": "POST",
                "data": function (d) {
                    d.start_date = $('#startDate').val(); // Pass start date
                    d.end_date = $('#endDate').val();    // Pass end date
                }
            },
            "columns": [
                { "data": 0 },
                { "data": 1 },
                { "data": 2 },
                { "data": 3 },
                { "data": 4 },
                { "data": 5, "orderable": false },
                { "data": 6, "orderable": false },
                { "data": 7, "orderable": false },
                { "data": 8, "orderable": false }
            ],
            "pageLength": 6,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "order": [[0, 'asc']],
            "info": true
        });

        $('#filterButton').on('click', function () {
            table.ajax.reload();
        });
    });
</script>
<style>
    
    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
}
#blogTable{
    padding-top: 5px;
}
.filter-container h4{
    margin: 0;
    padding: 0;
    padding-bottom: 10px;
}
.filter{
    display: flex;
    gap: 10px;
}
    .filter-container {
    display: flex;
    flex-direction: column;
    align-items: start !important;
    justify-content: center;
    background-color: #c3c3c3;
    padding: 20px;
    border-radius: 7px;
    width: 98%;
    gap: 10px;
    margin-bottom: 10px;
}
#newsTable{
    padding-top: 10px;
}

.filter-container label {
    font-size: 16px;
    color: #333;
}

.filter-container input[type="date"] {
    padding: 5px;
    font-size: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    width: auto;
}

.filter-container input[type="date"]:focus {
    border-color: var(--primary-color);
}

.filter-container button {
    padding: 6px 12px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    transition: background-color 0.3s ease;
}

.filter-container button:hover {
    background-color: var(--hover-primary);
}
    .addnews {
        display: flex;
        margin-bottom: 20px;
        justify-content: space-between;
        align-items: center;
        width: 98%;
        background-color: #dddddd;
        padding: 15px;
    }
    .filter-container {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 97%;
    margin-bottom: 10px;
    font-family: Arial, sans-serif;
}

.filter-container label {
    font-size: 16px;
    color: #333;
}

.filter-container input {
    padding: 5px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.filter-container button {
    padding: 6px 10px;
    font-size: 14px;
    background-color: #5ca1e3;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filter-container button:hover {
    background-color: #3681ca;
}

/* Align filter container and search bar */
.dataTables_filter {
    float: right;
    margin-bottom: 10px;
    margin-top: 0;
}

.dataTables_wrapper .filter-container {
    float: left;
    margin-top: 10px;
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

    .user-table th,
    .user-table td {
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

    .edit-btn,
    .delete-btn {
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

        .user-table th,
        .user-table td {
            padding: 8px;
        }

        .edit-btn,
        .delete-btn {
            font-size: 12px;
        }
    }
</style>