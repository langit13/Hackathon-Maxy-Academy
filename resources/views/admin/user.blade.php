<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Dashboard - Lapor Pak</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Lapor Pak</h2>
            <nav>
                <a href="index.html"><i class="icon">🏠</i> Dashboard</a>
                <a href="laporan.html"><i class="icon">📄</i> Reports</a>
                <a href="user.html" class="active"><i class="icon">👤</i> Users</a>
                <a href="setting.html"><i class="icon">⚙️</i> Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header>
                <div class="header-left">
                    <h1>Users Dashboard</h1>
                    <p class="date">Wednesday, November 6, 2024</p>
                </div>
                <div class="profile-section">
                    <i class="notifications">🔔</i>
                    <div class="profile">
                        <img src="profile.jpg" alt="Profile Picture">

                    </div>
                </div>
            </header>

            <!-- Users Table -->
            <section class="user-table">
                <h2>Registered Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr onclick="openUserModal('U001', 'John Doe', 'Admin', 'Active', 'john@example.com')">
                            <td>U001</td>
                            <td>John Doe</td>
                            <td>Admin</td>
                            <td><span class="badge active">Active</span></td>
                            <td>
                                <button class="btn edit">Edit</button>
                                <button class="btn delete">Delete</button>
                            </td>
                        </tr>
                        <tr onclick="openUserModal('U002', 'Jane Smith', 'User', 'Inactive', 'jane@example.com')">
                            <td>U002</td>
                            <td>Jane Smith</td>
                            <td>User</td>
                            <td><span class="badge inactive">Inactive</span></td>
                            <td>
                                <button class="btn edit">Edit</button>
                                <button class="btn delete">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <!-- Modal for User Details -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeUserModal()">&times;</span>
            <h2>User Details</h2>
            <p><strong>User ID:</strong> <span id="userId"></span></p>
            <p><strong>Name:</strong> <span id="userName"></span></p>
            <p><strong>Role:</strong> <span id="userRole"></span></p>
            <p><strong>Status:</strong> <span id="userStatus"></span></p>
            <p><strong>Email:</strong> <span id="userEmail"></span></p>
        </div>
    </div>

    <script>
        function openUserModal(id, name, role, status, email) {
            document.getElementById('userId').innerText = id;
            document.getElementById('userName').innerText = name;
            document.getElementById('userRole').innerText = role;
            document.getElementById('userStatus').innerText = status;
            document.getElementById('userEmail').innerText = email;
            document.getElementById('userModal').style.display = 'block';
        }

        function closeUserModal() {
            document.getElementById('userModal').style.display = 'none';
        }
    </script>

    <style>
        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .badge.active {
            background-color: #2563eb;
        }

        /* Bright Blue for Active */
        .badge.inactive {
            background-color: #e11d48;
        }

        /* Red for Inactive */

        .btn.edit {
            background-color: #1e90ff;
            /* Light Blue for Edit */
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            margin-right: 4px;
            cursor: pointer;
        }

        .btn.delete {
            background-color: #ff4040;
            /* Bright Red for Delete */
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn.edit:hover {
            background-color: #1c86ee;
            /* Darker Blue on Hover */
        }

        .btn.delete:hover {
            background-color: #e11d48;
            /* Darker Red on Hover */
        }
    </style>
</body>

</html>