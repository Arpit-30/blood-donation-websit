<!-- admin_dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <div class="container">
       <?php 
       include("adminheader.php")
       ?>

        <div class="main-content">
            <header>
                <h1>Welcome, Admin!</h1>
                <p>Manage the blood donation system from here.</p>
            </header>

            <section>
                <div class="stats">
                    <div class="card">
                        <h3>Total Users</h3>
                        <p>
                            <?php
                                require 'dbcon.php';
                                $userCountQuery = "SELECT COUNT(*) as total_users FROM user";
                                $result = mysqli_query($conn, $userCountQuery);
                                $data = mysqli_fetch_assoc($result);
                                echo $data['total_users'];
                            ?>
                        </p>
                    </div>
                    <?php 
                    // Database connection
                        require 'dbcon.php';

                        // Update request status if the admin changes it
                        if (isset($_POST['update_status'])) {
                            $request_id = $_POST['request_id'];
                            $new_status = $_POST['status'];

                            $updateQuery = "UPDATE need_blood SET status='$new_status' WHERE id='$request_id'";
                            mysqli_query($conn, $updateQuery);
                        }
                    ?>
                    <div class="card">
                        <h3>Total Donors</h3>
                        <p>
                            <?php
                                $donorCountQuery = "SELECT COUNT(*) as total_donors FROM donate_blood";
                                $result = mysqli_query($conn, $donorCountQuery);
                                $data = mysqli_fetch_assoc($result);
                                echo $data['total_donors'];
                            ?>
                        </p>
                    </div>

                    <div class="card">
                        <h3>Available Blood Units</h3>
                        <p>
                            <?php
                                $bloodCountQuery = "SELECT SUM(quantity) as total_units FROM blood_stock";
                                $result = mysqli_query($conn, $bloodCountQuery);
                                $data = mysqli_fetch_assoc($result);
                                echo $data['total_units'];
                            ?>
                        </p>
                    </div>

                    <div class="card">
                        <h3>Blood Requests</h3>
                        <p>
                            <?php
                                $requestCountQuery = "SELECT COUNT(*) as total_requests FROM blood_requests";
                                $result = mysqli_query($conn, $requestCountQuery);
                                $data = mysqli_fetch_assoc($result);
                                echo $data['total_requests'];
                            ?>
                        </p>
                    </div>
                </div>
            </section>

            <section class="tables">
                <h2>Latest Blood Donation Requests</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Name</th>
                            <th>contact</th>
                            <th>Email</th>
                            <th>Blood Group</th>
                            <th>Location</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $query = "SELECT * FROM need_blood ORDER BY id DESC LIMIT 5";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['blood_type'] . "</td>";
                                echo "<td>" . $row['location'] . "</td>";

                                // Add form for status update
                                echo "<td>";
                                echo "<form method='POST' action=''>";
                                echo "<input type='hidden' name='request_id' value='" . $row['id'] . "'>";
                                echo "<select name='status'>";
                                echo "<option value='Pending'" . ($row['status'] == 'Pending' ? ' selected' : '') . ">Pending</option>";
                                echo "<option value='Fulfilled'" . ($row['status'] == 'Fulfilled' ? ' selected' : '') . ">Fulfilled</option>";
                                echo "</select>";
                                echo "<button type='submit' name='update_status'>Update</button>";
                                echo "</form>";
                                echo "</td>";

                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </section>
            <section class="tables">
                <h2>Latest request for emergency</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Name</th>
                            <th>blood Group</th>
                            <th>Location</th>
                            <th>contact number</th>
                            <th>urgency level</th>
                            <th>additional information</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $query = "SELECT * FROM emergency_requests ORDER BY id DESC LIMIT 5";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['blood_type'] . "</td>";
                                echo "<td>" . $row['location'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['urgency'] . "</td>"; 
                                echo "<td>" . $row['message'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                

                                // Add form for status update
                                echo "<td>";
                                echo "<form method='POST' action=''>";
                                echo "<input type='hidden' name='request_id' value='" . $row['id'] . "'>";
                                echo "<select name='status'>";
                                echo "<option value='Pending'" . ($row['status'] == 'Pending' ? ' selected' : '') . ">Pending</option>";
                                echo "<option value='Fulfilled'" . ($row['status'] == 'Fulfilled' ? ' selected' : '') . ">Fulfilled</option>";
                                echo "</select>";
                                echo "<button type='submit' name='update_status'>Update</button>";
                                echo "</form>";
                                echo "</td>";

                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    
</body>
</html>
