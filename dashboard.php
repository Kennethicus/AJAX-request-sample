<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Update Total Salary</title>
</head>
<body>
    <h1>Total Salary</h1>
    <div id="total-salary-container">Loading...</div>

    <script>
        function fetchTotalSalary() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_total_salary.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var container = document.getElementById('total-salary-container');
                    container.textContent = 'Total Salary: $' + response.total_salary;

                    // Fetch again after the previous fetch completes
                    fetchTotalSalary();
                }
            };
            xhr.send();
        }

        // Initial fetch
        fetchTotalSalary();
    </script>
</body>
</html>
