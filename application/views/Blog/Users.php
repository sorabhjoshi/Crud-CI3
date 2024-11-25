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
            </tbody>
        </table>
    </div>
</main>

<?php include 'Components/Footer.php'; ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#userTable').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?php echo base_url('Welcome/getUsersAjax'); ?>",
        "type": "POST"
      },
      "columns": [
        { 
          "data": null, 
          "render": function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1; 
          },
          "orderable": false, 
          "searchable": false 
        },
        { "data": "name" },
        { "data": "email" },
        { "data": "UserType", "render": function(data) { return data == 0 ? 'User' : 'Admin'; } },
        { "data": "City" },
        { "data": "Phone_no" },
        { "data": "edit", "orderable": false, "searchable": false },
        { "data": "delete", "orderable": false, "searchable": false }
      ],
      "pageLength": 6, 
      "lengthChange": false, 
      "searching": true, 
      "ordering": true, 
      "order": [[1, 'asc']], 
      "info": true 
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
