<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Pak - Professional Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    </head>

<body>

    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Lapor Pak</h2>
            <nav>
                <a href="index.html" class="active"><i class="icon">&#128200;</i> Dashboard</a>
                <a href="/laporan.html"><i class="icon">&#128221;</i> Reports</a>
                <a href="{{ route('admin.user') }}"><i class="icon">&#128100;</i> Users</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf <!-- CSRF Token -->
                    <button type="submit" class="btn logout-btn " style="text-align: left; margin-left: 0;"><i class="icon">&#128682;</i>Log Out</button>
                </form>            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <div class="header-left">
                    <h1>Dashboard</h1>
                    <span class="date">Wednesday, November 6, 2024</span>
                </div>
                <div class="profile-section">
                    <i class="notifications">🔔</i>
                    <div class="profile">
                        <img src="profile.jpg" alt="Profile Picture">
                    </div>
                </div>
            </header>

            <!-- Summary Cards -->
            <section class="summary-cards">
                <div class="card">
                    <h3>Total Reports</h3>
                    <p>120</p>
                </div>
                <div class="card">
                    <h3>Pending Reports</h3>
                    <p>34</p>
                </div>
                <div class="card">
                    <h3>Approved Reports</h3>
                    <p>68</p>
                </div>
                <div class="card">
                    <h3>Rejected Reports</h3>
                    <p>18</p>
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
                        <tr>
                            <td>001</td>
                            <td>Street Light Issue</td>
                            <td><span class="badge pending">Pending</span></td>
                            <td>2024-10-12</td>
                            <td><button class="btn approve">Approve</button> <button class="btn reject">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Water Leakage</td>
                            <td><span class="badge approved">Approved</span></td>
                            <td>2024-10-10</td>
                            <td><button class="btn approve">Approve</button> <button class="btn reject">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Traffic Signal Malfunction</td>
                            <td><span class="badge rejected">Rejected</span></td>
                            <td>2024-10-08</td>
                            <td><button class="btn approve">Approve</button> <button class="btn reject">Reject</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

</body>

</html>