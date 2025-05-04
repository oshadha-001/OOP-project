<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard | WedConnect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    header {
      background-color: #343a40;
      color: white;
      padding: 20px 0;
    }
    header h1 {
      text-align: center;
    }
    nav a {
      color: white;
      margin: 0 15px;
    }
    .dashboard-section {
      margin: 30px auto;
      max-width: 90%;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    footer {
      text-align: center;
      padding: 15px;
      margin-top: 30px;
      background-color: #343a40;
      color: white;
    }
  </style>
</head>
<body>

<header>
  <div class="container">
    <h1>Admin Dashboard</h1>
    <nav class="d-flex justify-content-center">
      <a href="#users">Users</a>
      <a href="#orders">Orders</a>
      <a href="#services">Services</a>
      <a href="../LoginPage/login.html">Logout</a>
    </nav>
  </div>
</header>

<main class="container">

  <!-- Users Section -->
  <section id="users" class="dashboard-section">
    <h3>Manage Users</h3>
    <table class="table table-bordered table-striped mt-3">
      <thead class="table-dark">
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="userTable"></tbody>
    </table>
    <button class="btn btn-primary" onclick="downloadUserDetails()">Download User Details</button>
  </section>

  <!-- Orders Section -->
  <section id="orders" class="dashboard-section">
    <h3>Manage Orders</h3>
    <p>Process wedding service orders.</p>
    <button class="btn btn-outline-primary">View Orders</button>
    <button class="btn btn-outline-success">Process Orders</button>
  </section>

  <!-- Services Section -->
  <section id="services" class="dashboard-section">
    <h3>Manage Services</h3>
    <p>Update the list of services available to users.</p>
    <button class="btn btn-outline-primary">Add Service</button>
    <button class="btn btn-outline-warning">Edit Service</button>
    <button class="btn btn-outline-danger">Delete Service</button>
  </section>

</main>

<footer>
  <p>&copy; 2025 WedConnect. All rights reserved.</p>
</footer>

<script>
  function loadUsers() {
    const users = JSON.parse(localStorage.getItem("users")) || [];
    const table = document.getElementById("userTable");
    table.innerHTML = "";

    users.forEach((user, index) => {
      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${user.username}</td>
        <td>${user.email}</td>
        <td><button class="btn btn-danger btn-sm" onclick="deleteUser(${index})">Delete</button></td>
      `;
      table.appendChild(row);
    });
  }

  function deleteUser(index) {
    let users = JSON.parse(localStorage.getItem("users")) || [];
    users.splice(index, 1);
    localStorage.setItem("users", JSON.stringify(users));
    loadUsers();
  }

  function downloadUserDetails() {
    const users = JSON.parse(localStorage.getItem("users")) || [];
    let content = "Username\tEmail\n";
    users.forEach(user => {
      content += `${user.username}\t${user.email}\n`;
    });

    const blob = new Blob([content], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "user_details.txt";
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
  }

  window.onload = loadUsers;
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
