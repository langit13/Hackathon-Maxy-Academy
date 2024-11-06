<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Dashboard - Lapor Pak</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Lapor Pak</h2>
            <nav>
                <a href="index.html"><i class="icon">🏠</i> Dashboard</a>
                <a href="reports.html" class="active"><i class="icon">📄</i> Reports</a>
                <a href="user.html"><i class="icon">👤</i> Users</a>
                <a href="setting.html"><i class="icon">⚙️</i> Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header>
                <div class="header-left">
                    <h1>Reports Dashboard</h1>
                    <p class="date">Wednesday, November 6, 2024</p>
                </div>
                <div class="profile-section">
                    <i class="notifications">🔔</i>
                    <div class="profile">
                        <img src="profile.jpg" alt="Profile Picture">
                        <span>Admin</span>
                    </div>
                </div>
            </header>

            <!-- Summary Cards for Report Stats -->
            <section class="summary-cards">
                <div class="card">
                    <h3>Total Reports</h3>
                    <p>150</p>
                </div>
                <div class="card">
                    <h3>Pending Reports</h3>
                    <p>35</p>
                </div>
                <div class="card">
                    <h3>Approved Reports</h3>
                    <p>95</p>
                </div>
                <div class="card">
                    <h3>Rejected Reports</h3>
                    <p>20</p>
                </div>
            </section>

            <!-- Report Table -->
            <section class="report-table">
                <h2>Recent Reports</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Report ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            onclick="openModal('001', 'Illegal Parking', 'Pending', '2024-11-05', 'A report about illegal parking near the main square.')">
                            <td>001</td>
                            <td>Illegal Parking</td>
                            <td><span class="badge pending">Pending</span></td>
                            <td>2024-11-05</td>
                            <td>
                                <button class="btn approve">Approve</button>
                                <button class="btn reject">Reject</button>
                            </td>
                        </tr>
                        <tr
                            onclick="openModal('002', 'Broken Street Sign', 'Approved', '2024-11-04', 'Broken street sign on 5th Avenue that needs fixing.')">
                            <td>002</td>
                            <td>Broken Street Sign</td>
                            <td><span class="badge approved">Approved</span></td>
                            <td>2024-11-04</td>
                            <td>
                                <button class="btn approve">Approve</button>
                                <button class="btn reject">Reject</button>
                            </td>
                        </tr>
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <!-- Modal for Report Details -->
    <div id="reportModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Report Details</h2>
            <p><strong>Report ID:</strong> <span id="reportId"></span></p>
            <p><strong>Title:</strong> <span id="reportTitle"></span></p>
            <p><strong>Status:</strong> <span id="reportStatus"></span></p>
            <p><strong>Date:</strong> <span id="reportDate"></span></p>
            <p><strong>Description:</strong></p>
            <p id="reportDescription"></p>
        </div>
    </div>

    <script>
        function openModal(id, title, status, date, description) {
            document.getElementById('reportId').innerText = id;
            document.getElementById('reportTitle').innerText = title;
            document.getElementById('reportStatus').innerText = status;
            document.getElementById('reportDate').innerText = date;
            document.getElementById('reportDescription').innerText = description;
            document.getElementById('reportModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('reportModal').style.display = 'none';
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
    </style>
</body>

</html>