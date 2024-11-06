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
                <a href="{{ route('admin') }}"><i class="icon">🏠</i> Dashboard</a>
                <a href="laporan.html"><i class="icon">📄</i> Reports</a>
                <a href="{{ route('admin.user') }}" class="active"><i class="icon">👤</i> Users</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf <!-- CSRF Token -->
                    <button type="submit" class="btn logout-btn " style="text-align: left; margin-left: 0;"><i class="icon">&#128682;</i>Log Out</button>
                </form>
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
            <h2 style="text-align: left; margin-left: 0;">Registered Users</h2>
                
                <!-- Button to open Add User Modal -->
                <button class="btn add-user-btn" onclick="openAddUserModal()">Add New User</button>

                <!-- Users Table -->
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <button class="btn edit">Edit</button>
                                    <button class="btn delete">Delete</button>
                                </td>
                            </tr>
                        @endforeach
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

    <!-- Modal for Adding New User -->
<div id="addUserModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAddUserModal()">&times;</span>
        <h2>Add New User</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="userName">Name:</label>
                <input type="text" id="userName" name="name" required>
            </div>
            <div class="form-group">
                <label for="userEmail">Email:</label>
                <input type="email" id="userEmail" name="email" required>
            </div>
            <div class="form-group">
                <label for="userPassword">Password:</label>
                <input type="password" id="userPassword" name="password" required>
            </div>
            <div class="form-group">
                <label for="userRole">Role:</label>
                <label for="userRole">Role:</label>
                <select id="userRole" name="role" required>
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn add">Add User</button>
        </form>
    </div>
</div>

<style>
/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6); /* Background overlay */
}

.modal-content {
    background-color: #f9f9f9;
    margin: 10% auto;
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    animation: slideDown 0.4s ease; /* Add animation */
}

@keyframes slideDown {
    from {transform: translateY(-50px); opacity: 0;}
    to {transform: translateY(0); opacity: 1;}
}

.close {
    color: #aaa;
    font-size: 24px;
    font-weight: bold;
    float: right;
    cursor: pointer;
}

.close:hover {
    color: #333;
}

h2 {
    text-align: center;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #333;
}

input[type="text"], input[type="email"], input[type="password"], select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 14px;
    color: #333;
}

input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, select:focus {
    border-color: #007bff;
    outline: none;
}

.btn.add-user-btn {
    color: #fff;
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-bottom: 15px; /* Jarak bawah */
}

.btn.add-user-btn:hover {
    background-color: #0056b3;
}

/* Logout Button Styling */
.btn.logout-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px 20px;
    background-color: #007bff; /* Warna tombol yang aktif */
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    margin-bottom: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%; /* Memperlebar tombol hingga memenuhi lebar kontainer */
}

.btn.logout-btn:hover {
    background-color: #0056b3; /* Warna hover untuk tombol aktif */
    transform: scale(1.05);
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}

.btn.logout-btn:active {
    background-color: #003f7d; /* Warna saat tombol ditekan */
    transform: scale(1);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
}

/* Styling untuk tombol yang dinonaktifkan */
.btn.logout-btn[disabled] {
    background-color: #6c757d; /* Warna tombol saat dinonaktifkan (abu-abu) */
    color: #adb5bd; /* Warna teks saat tombol dinonaktifkan */
    cursor: not-allowed; /* Ubah kursor menjadi tanda larangan */
    box-shadow: none; /* Hilangkan bayangan tombol */
}

.btn.logout-btn .icon {
    margin-right: 8px;
    font-size: 20px;
}

/* Tooltip Styling */
.btn.logout-btn:hover::after {
    content: 'Click to log out';
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    background-color: #333;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    white-space: nowrap;
}



</style>


    <script>
        // Open the modal to add user
        function openAddUserModal() {
            document.getElementById('addUserModal').style.display = 'block';
        }

        // Close the add user modal
        function closeAddUserModal() {
            document.getElementById('addUserModal').style.display = 'none';
        }

        // Open the modal to view user details
        function openUserModal(id, name, role, status, email) {
            document.getElementById('userId').innerText = id;
            document.getElementById('userName').innerText = name;
            document.getElementById('userRole').innerText = role;
            document.getElementById('userStatus').innerText = status;
            document.getElementById('userEmail').innerText = email;
            document.getElementById('userModal').style.display = 'block';
        }

        // Close the user details modal
        function closeUserModal() {
            document.getElementById('userModal').style.display = 'none';
        }
    </script>
    
</body>

</html>
