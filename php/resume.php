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

  <main class="resume-container">
    <h1>Resume</h1>

    <h2>Education</h2>
    <p><strong>University of Memphis</strong> – Bachelor of Science in Computer Science (Expected May 2026)</p>
    <p>Relevant Coursework: Data Structures, Web Development, Networks, Programming Languages (Java, Python)</p>

    <h2>Certifications (Dynamic from Database)</h2>
    <table>
      <tr>
        <th>Certification</th>
        <th>Organization</th>
        <th>Year</th>
      </tr>
      <?php
        $sql = "SELECT cert_name, organization, year FROM certifications";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
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

        $conn->close();
      ?>
    </table>

    <h2>Work Experience</h2>
    <ul>
      <li><strong>Computer Science TA</strong> – University of Memphis (Jan 2025 – May 2025)</li>
      <li><strong>IT Intern</strong> – Conrad Pearson Clinic (Jun 2022 – Dec 2022)</li>
      <li><strong>Sales Associate</strong> – Home Depot (Dec 2020 – Apr 2021)</li>
    </ul>

    <h2>Technical Skills</h2>
    <p>Languages: Java, Python, JavaScript, HTML, CSS</p>
    <p>Web Development | IT Support | Networking | Troubleshooting | Data Handling</p>
  </main>

  <footer>
    <p>&copy; 2025 Folusho Morafa</p>
  </footer>
</body>
</html>
