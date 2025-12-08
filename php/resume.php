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
      <li><a href="/projects.html">Projects</a></li>
      <li><a href="/php/resume.php" class="active">Resume</a></li>
      <li><a href="/contact.html">Contact</a></li>
    </ul>
  </nav>
</header>

<main class="resume-container">
  <h1>Resume</h1>

  <section>
    <h2>Professional Summary</h2>
    <p>
      Motivated Computer Science student with experience in IT support, software
      development, and web technologies. Skilled in troubleshooting, building
      modern web applications, and optimizing user experiences. Strong background
      in Python, Java, JavaScript, and full-stack development.
    </p>
  </section>

  <section>
    <h2>Education</h2>
    <p><strong>University of Memphis</strong> – B.S. Computer Science (Expected May 2026)</p>
    <p>Relevant Coursework: Web Development, Data Structures, Networking, Programming Languages</p>
  </section>

  <section>
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
  </section>

  <section>
    <h2>Work Experience</h2>
    <table>
      <tr>
        <th>Job Title</th>
        <th>Company</th>
        <th>Duration</th>
        <th>Description</th>
      </tr>

      <?php
        $sql2 = "SELECT job_title, company, start_date, end_date, description 
                 FROM work_experience ORDER BY id DESC";
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
  </section>

  <section>
    <h2>Technical Skills</h2>
    <p><strong>Languages:</strong> Python, Java, JavaScript, HTML, CSS</p>
    <p><strong>Skills:</strong> Web Development, IT Support, Networking, Troubleshooting</p>
  </section>
</main>

<footer>
  <p>&copy; 2025 Folusho Morafa • fmorafa.com</p>
</footer>

</body>
</html>

<?php $conn->close(); ?>
