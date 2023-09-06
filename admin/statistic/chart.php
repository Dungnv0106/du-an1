<?php 
// show_array($list_statistic);
    $total_cate = count($list_statistic);
    // echo $total_cate;
    $index = 1;
?>

<!DOCTYPE html>
<html>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<body>
    <div id="myChart" style="width:100%; max-width:600px; height:500px;">
    </div>

    <script>
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            // Set Data
            var data = google.visualization.arrayToDataTable([
                ['Danh Mục', 'Số lượng sản phẩm'],
                <?php
                    foreach($list_statistic as $statistic) {
                        extract($statistic);
                        if($index == $total_cate) {
                            $dauPhay = "";
                        } else {
                            $dauPhay = ",";
                        }
                        echo "
                            ['".$statistic['cate_name']."', ".$statistic['pro_quantity']."]
                        " .$dauPhay;
                ?>
                
                <?php        
                    }
                ?>           
                
            ]);

            // Set Options
            const options = {
                title: 'Thống kê sản phẩm theo danh mục'
            };

            // Draw
            const chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);

        }
    </script>

</body>

</html>