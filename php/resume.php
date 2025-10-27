<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resume | Folusho Morafa</title>
  <link rel="stylesheet" href="/css/style.css" />
  <script defer src="/javascript/script.js"></script>
</head>

<body>
  
  <header>
    <nav class="navbar">
      <ul>
        <li><a href="/index.html">Home</a></li>
        <li><a href="/about.html">About Me</a></li>
        <li><a href="/php/resume.php" class="active">Resume</a></li>
      </ul>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="resume-container">
    <h1>Resume</h1>

    
    <h2>Education</h2>
    <p><strong>University of Memphis</strong> – Bachelor of Science in Computer Science (Expected May 2026)</p>
    <p>Relevant Coursework: Data Structures, Web Development, Networks, Programming Languages (Java, Python)</p>

    
    <h2>Certifications</h2>
    <table>
      <tr>
        <th>Certification</th>
        <th>Organization</th>
        <th>Year</th>
      </tr>
      <?php
        $sql = "SELECT cert_name, organization, year FROM certifications";
        $result = $conn->query($sql);

        if (!$result) {
          echo "<tr><td colspan='3'>SQL error: {$conn->error}</td></tr>";
        } elseif ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['cert_name']}</td>
                    <td>{$row['organization']}</td>
                    <td>{$row['year']}</td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='3'>No certifications found.</td></tr>";
        }
      ?>
    </table>

    
    <h2>Work Experience</h2>
    <table>
      <tr>
        <th>Job Title</th>
        <th>Company</th>
        <th>Duration</th>
        <th>Description</th>
      </tr>
      <?php
        $sql2 = "SELECT job_title, company, start_date, end_date, description FROM work_experience ORDER BY id DESC";
        $result2 = $conn->query($sql2);

        if (!$result2) {
          echo "<tr><td colspan='4'>SQL error: {$conn->error}</td></tr>";
        } elseif ($result2->num_rows > 0) {
          while ($row = $result2->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['job_title']}</td>
                    <td>{$row['company']}</td>
                    <td>{$row['start_date']} – {$row['end_date']}</td>
                    <td>{$row['description']}</td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No work experience found.</td></tr>";
        }
      ?>
    </table>

    
    <h2>Technical Skills</h2>
    <p><strong>Languages:</strong> Java, Python, JavaScript, HTML, CSS</p>
    <p>IT Support | Networking | Web Development | Troubleshooting | Data Handling</p>
  </main>

  
  <footer>
    <p>&copy; 2025 Folusho Morafa</p>
  </footer>
</body>
</html>

<?php $conn->close(); ?>
